<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;

    protected $delete_img_url;

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->helper('file');
        $this->load->model('user');
        $this->load->model('property');
        $this->load->library('pagination');

        //Set relative Path with CI Constant
        $this->setPath_img_upload_folder("files/");
        $this->setPath_img_thumb_upload_folder("thumbnails/");

        
        //Delete img url
        $this->setDelete_img_url(base_url() . 'upload/deleteImage/');


        //Set url img with Base_url()
        $this->setPath_url_img_upload_folder(base_url() . "files/");
        $this->setPath_url_img_thumb_upload_folder(base_url() . "thumbnails/");
    }

    public function index($property_id) {
        if (!$this->tank_auth->is_logged_in()) {                                    
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect(base_url() . 'auth/login');
        } else if ($user_id= ''){
            $this->session->set_flashdata('message', 'oops!');
            redirect(base_url() . 'my_account');
        } else {
            //logged in user
            $user_id = $this->tank_auth->get_user_id();
            //propety record
            $data['property'] = $this->property->get_property_by_id($property_id);
            //owner of pasture
            $property_user_id = $data['property']['user_id'];
            //if current user owns pasture
            
        }
        $this->load->view('header/main_view');
        $this->load->view('properties/image_upload', $data);
        $this->load->view('footer/main_view');
    }

    // Function called by the form
    public function upload_img($property_id) {

        //Format the name
        $name = $_FILES['userfile']['name'];
        $name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

        // replace characters other than letters, numbers and . by _
        $name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);

        //Your upload directory, see CI user guide
        $config['upload_path'] = $this->getPath_img_upload_folder();
  
        $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
        $config['max_size'] = '1000';
        $config['file_name'] = $name;

       //Load the upload library
        $this->load->library('upload', $config);

        if ($this->do_upload()) {
            
            // Codeigniter Upload class alters name automatically (e.g. periods are escaped with an
            //underscore) - so use the altered name for thumbnail
            $data = $this->upload->data();
            $name = $data['file_name'];

            //If you want to resize 
            $config['new_image'] = $this->getPath_img_thumb_upload_folder();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->getPath_img_upload_folder() . $name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 193;
            $config['height'] = 94;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            //Get info 
            $info = new stdClass();
            
            $info->name = $name;
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = $this->getPath_img_upload_folder() . $name;
            $info->thumbnail_url = $this->getPath_img_thumb_upload_folder() . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
            $info->delete_url = $this->getDelete_img_url() . $property_id . '/' . $name;
            $info->delete_type = 'DELETE';

            //upload json to DB
            $this->property->set_image($property_id, $name);
           //Return JSON data
           if (IS_AJAX) {   //this is why we put this in the constants to pass only json data
                echo json_encode(array($info));
                //this has to be the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
            } else {   // so that this will still work if javascript is not enabled
                $file_data['upload_data'] = $this->upload->data();
                echo json_encode(array($info));
            }

            


            // set assoc parameter to TRUE, so returned objects will be converted into associative arrays.

        } else {

           // the display_errors() function wraps error messages in <p> by default and these html chars don't parse in
           // default view on the forum so either set them to blank, or decide how you want them to display.  null is passed.
            $error = array('error' => $this->upload->display_errors('',''));

            echo json_encode(array($error));
        }


       }

    //Function for the upload : return true/false
    public function do_upload() {

        if (!$this->upload->do_upload()) {

            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());

            return true;
        }
    }


    //Function Delete image
    public function deleteImage($property_id) {

        //Get the name in the url
        $file = $this->uri->segment(4);

        $success = unlink($this->getPath_img_upload_folder() . $file);
        $success_th = unlink($this->getPath_img_thumb_upload_folder() . $file);

        //get images from db
        $images = $this->property->get_images($property_id);
        //turn field 'photos' into an array, 
        $image_array = explode(",", $images['photos']);
        //get last item
        $last_item = end(array_values($image_array));
        //remove last item if it doesn't have anything
        if ($last_item == ''){
            //remove last array item
            array_pop($image_array);
        }
        //get key of image
        $image_key = array_search($file, $image_array);
        //remove file from array
        unset($image_array[$image_key]);
        //reset array keys
        $image_array = array_values($image_array);
        //turn array into ',' separated string
        $image_string = implode(',', $image_array);
        //update db
        $this->property->update_images($property_id, $image_string);

        //info to see if it is doing what it is supposed to 
        $info = new stdClass();
        $info->sucess = $success;
        $info->path = $this->getPath_url_img_upload_folder() . $file;
        $info->file = is_file($this->getPath_img_upload_folder() . $file);
        if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {     //here you will need to decide what you want to show for a successful delete
            var_dump($file);
        }
    }


    //Load the files
    public function get_files($property_id) {
        $this->get_scan_files($property_id);
    }

    //Get info from db
    public function get_scan_files($property_id) {
        //get images from db
        $images = $this->property->get_images($property_id);
        //turn field 'photos' into an array, 
        $image_array = explode(",", $images['photos']);
        //get last item
        $last_item = end(array_values($image_array));
        //remove last item if it doesn't have anything
        if ($last_item == ''){
            //remove last array item
            array_pop($image_array);
        }

        $prod_arr = array();
        foreach ($image_array as $image) {
            $file_path = $this->getPath_img_upload_folder() . $image;
            $file = new stdClass();
            $file->name = $image;// here image name goes i do not find image name in your select query
            //$file->size = filesize($file_path);// should be complete path
            $file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
            $file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
            //File name in the url to delete 
            $file->delete_url = $this->getDelete_img_url() . $property_id . '/' . rawurlencode($file->name);
            $file->delete_type = 'DELETE';
            array_push($prod_arr,$file);
        }
        header('Content-type: application/json');
        echo json_encode($prod_arr);
    }

    // protected function get_file_object($file_name) {
    //     $file_path = $this->getPath_img_upload_folder() . $file_name;
    //     if (is_file($file_path) && $file_name[0] !== '.') {

    //         $file = new stdClass();
    //         $file->name = $file_name;
    //         $file->size = filesize($file_path);
    //         $file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
    //         $file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
    //         //File name in the url to delete 
    //         $file->delete_url = $this->getDelete_img_url() . $property_id . '/' . rawurlencode($file->name);
    //         $file->delete_type = 'DELETE';
            
    //         return $file;
    //     }
    //     return null;
    // }

    //Scan
    protected function get_file_objects() {
        return array_values(array_filter(array_map(
             array($this, 'get_file_object'), scandir($this->getPath_img_upload_folder())
                   )));
    }



    // GETTER & SETTER 
    public function getPath_img_upload_folder() {
        return $this->path_img_upload_folder;
    }

    public function setPath_img_upload_folder($path_img_upload_folder) {
        $this->path_img_upload_folder = $path_img_upload_folder;
    }

    public function getPath_img_thumb_upload_folder() {
        return $this->path_img_thumb_upload_folder;
    }

    public function setPath_img_thumb_upload_folder($path_img_thumb_upload_folder) {
        $this->path_img_thumb_upload_folder = $path_img_thumb_upload_folder;
    }

    public function getPath_url_img_upload_folder() {
        return $this->path_url_img_upload_folder;
    }

    public function setPath_url_img_upload_folder($path_url_img_upload_folder) {
        $this->path_url_img_upload_folder = $path_url_img_upload_folder;
    }

    public function getPath_url_img_thumb_upload_folder() {
        return $this->path_url_img_thumb_upload_folder;
    }

    public function setPath_url_img_thumb_upload_folder($path_url_img_thumb_upload_folder) {
        $this->path_url_img_thumb_upload_folder = $path_url_img_thumb_upload_folder;
    }

    public function getDelete_img_url() {
        return $this->delete_img_url;
    }

    public function setDelete_img_url($delete_img_url) {
        $this->delete_img_url = $delete_img_url;
    }


}