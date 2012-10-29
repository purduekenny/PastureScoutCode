<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Properties extends CI_Controller
{
    function __construct()
    {
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
    }

    /**
     * view all properties
     *
     * @return void
     */
    function index($start=0)
    {
        //check to see if logged in
        if ($this->tank_auth->is_logged_in()) {
            //get user_id
            $user_id = $this->tank_auth->get_user_id();

            //pagination configuration
            $config['base_url'] = base_url().'properties/index/';
            $config['total_rows'] = $this->property->get_properties_count();
            $config['per_page'] = 5;
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            //make pagination happen
            $data['properties'] = $this->property->get_properties(5, $start);

            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();

            //load views
            $this->load->view('header/main_view');
            //load nav view based off of permissions
            $this->_nav_view($user_id);
            $this->load->view('properties/all_view', $data);
            $this->load->view('footer/main_view');
        } else {
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect('/auth/login/');
        }
    }

    /**
     * view properties by user_id
     *
     * @return void
     */
    function my_properties($start=0){
        //check to see if logged in
        if ($this->tank_auth->is_logged_in()) {
            //get user_id
            $user_id = $this->tank_auth->get_user_id();

            //pagination configuration
            $config['base_url'] = base_url().'properties/my_properties/index/';
            $config['total_rows'] = $this->property->get_properties_count_by_user_id($user_id);
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            //if number of property rows less than 5
            if ($config['total_rows'] < 5){
                $config['per_page'] = $config['total_rows'];
            }else{
                $config['per_page'] = 5;
            }

            $data['properties'] = $this->property->get_properties_by_user($user_id, $config['per_page'], $start);
            
            //make pagination happen
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();

            $this->load->view('header/main_view');
            //load nav view based off of permissions
            $this->_nav_view($user_id);
            $this->load->view('properties/my_view', $data);
            $this->load->view('footer/main_view');
        } else {
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect('/auth/login/');
        }


    }

    /**
     * Create new property
     *
     * @return void
     */
    function create()
    {
        if (!$this->tank_auth->is_logged_in()) {                                    
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect(base_url() . 'auth/login');
        } else if ($user_id= ''){
            $this->session->set_flashdata('message', 'oops!');
            redirect(base_url() . 'my_account');
        } else if ($this->_check_permissions($this->tank_auth->get_user_id()) == 'leaser' || $this->_check_permissions($this->tank_auth->get_user_id()) == "free_trial"){
            $user_id = $this->tank_auth->get_user_id();

            //form validation
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|max_length[300]');
            $this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[300]');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|max_length[30]');
            $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[50]');
            $this->form_validation->set_rules('max_head_count', 'Max Head Count', 'trim|numeric|xss_clean|max_length[100]');
            $this->form_validation->set_rules('restricted_stock_type', 'Restricted Stock Type', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('other_info', '', 'trim|xss_clean|max_length[500]');
            $this->form_validation->set_rules('size', 'Size', 'trim|numeric|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('min_lease_term', 'Minimum Lease Term', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('lease_availability_date', 'Lease Availability Date', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('features_forage_type', 'Features: Forage Type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('handling_facilities', 'Handling Facilities', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('allowed_uses[]', 'Allowed Uses', 'trim|required|xss_clean');
            $data['errors'] = array();

            if ($this->form_validation->run()) {                                        
                // validation ok prep data to be put in database
                //change dates to be mysql friendly
                $opening_bid_date = date('Y-m-d',strtotime($this->form_validation->set_value('opening_bid_date')));
                $closing_bid_date = date('Y-m-d',strtotime($this->form_validation->set_value('closing_bid_date')));
                $lease_availability_date = date('Y-m-d',strtotime($this->form_validation->set_value('lease_availability_date')));

                $data = array(
                    'user_id'                => $user_id,
                    'name'                   => $this->form_validation->set_value('name'),
                    'location'               => $this->form_validation->set_value('location'),
                    'region'                 => $this->form_validation->set_value('region'),
                    'city'                   => $this->form_validation->set_value('city'),
                    'state'                  => $this->form_validation->set_value('state'),
                    'country'                => $this->form_validation->set_value('country'),
                    'size'                   => $this->form_validation->set_value('size'),
                    'min_lease_term'         => $this->form_validation->set_value('min_lease_term'),
                    'lease_availability_date'=> $lease_availability_date,
                    'features_forage_type'   => $this->form_validation->set_value('features_forage_type'),
                    'handling_facilities'    => $this->form_validation->set_value('handling_facilities'),
                    'allowed_uses'           => implode(",", $this->input->post('allowed_uses')),
                    'restricted_stock_type'  => $this->form_validation->set_value('restricted_stock_type'),
                    'max_head_count'         => $this->form_validation->set_value('max_head_count'),
                    'min_bid'                => $this->form_validation->set_value('min_bid'),
                );

                //call model and create new property
                $this->property->create_property($data);                                

                //message
                $this->session->set_flashdata('message', 'You have successfully added a new property');
                redirect(base_url() . 'properties/my_properties');

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
        } else {
            $this->session->set_flashdata('message', 'You must be a Leaser to view this page.');
            redirect(base_url() . 'my_account');
        }
        //get user_id
        $user_id = $this->tank_auth->get_user_id();

        $this->load->view('header/main_view');
        $this->load->view('properties/add_form');
        $this->load->view('footer/main_view');
    }

    /**
     * Edit property
     *
     * @return void
     */
    function edit($property_id)
    {

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
            if($user_id == $property_user_id){
                //form validation
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|max_length[200]');
                $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|max_length[300]');
                $this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[300]');
                $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|max_length[30]');
                $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[50]');
                $this->form_validation->set_rules('restricted_stock_type', 'Restricted Stock Type', 'trim|xss_clean|max_length[100]');
                $this->form_validation->set_rules('max_head_count', 'Max Head Count', 'trim|numeric|xss_clean|max_length[100]');
                $this->form_validation->set_rules('min_bid', 'Mininum Bid', 'trim|numeric|xss_clean|max_length[100]');
                //$this->form_validation->set_rules('opening_bid_date', 'Opening Bid Date', 'trim|required|xss_clean|max_length[100]');
                //$this->form_validation->set_rules('closing_bid_date', 'Closing Bid Date', 'trim|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('other_info', 'Other Info', 'trim|xss_clean|max_length[500]');
                $this->form_validation->set_rules('size', 'Size', 'trim|numeric|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('min_lease_term', 'Minimum Lease Term', 'trim|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('lease_availability_date', 'Lease Availability Date', 'trim|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('features_forage_type', 'Features: Forage Type', 'trim|required|xss_clean');
                $this->form_validation->set_rules('handling_facilities', 'Handling Facilities', 'trim|required|xss_clean|max_length[100]');
                $this->form_validation->set_rules('allowed_uses[]', 'Allowed Uses', 'trim|required|xss_clean');
                $data['errors'] = array();               

                if ($this->form_validation->run()) {                                        
                    // validation ok prep data to be put in database
                    //change dates to be mysql friendly
                    //$opening_bid_date = date('Y-m-d',strtotime($this->form_validation->set_value('opening_bid_date')));
                    //$closing_bid_date = date('Y-m-d',strtotime($this->form_validation->set_value('closing_bid_date')));
                    $lease_availability_date = date('Y-m-d',strtotime($this->form_validation->set_value('lease_availability_date')));

                    $data = array(
                        'name'                   => $this->form_validation->set_value('name'),
                        'location'               => $this->form_validation->set_value('location'),
                        'region'                 => $this->form_validation->set_value('region'),
                        'city'                   => $this->form_validation->set_value('city'),
                        'state'                  => $this->form_validation->set_value('state'),
                        'country'                => $this->form_validation->set_value('country'),
                        'size'                   => $this->form_validation->set_value('size'),
                        'min_lease_term'         => $this->form_validation->set_value('min_lease_term'),
                        'lease_availability_date'=> $lease_availability_date,
                        'features_forage_type'   => $this->form_validation->set_value('features_forage_type'),
                        'handling_facilities'    => $this->form_validation->set_value('handling_facilities'),
                        'allowed_uses'           => implode(",", $this->input->post('allowed_uses')),
                        'restricted_stock_type'  => $this->form_validation->set_value('restricted_stock_type'),
                        'max_head_count'         => $this->form_validation->set_value('max_head_count'),
                        'min_bid'                => $this->form_validation->set_value('min_bid'),
                        'other_info'             => $this->form_validation->set_value('other_info'),
                        'modified'               => date('d/m/Y H:i:s', strtotime('today'))
                    );

                    //edit property
                    $this->property->set_property($property_id, $data);                             

                    //message
                    $this->session->set_flashdata('message', 'You have successfully edited your property');
                    redirect(base_url() . 'properties/my_properties');

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            } else {
                $this->session->set_flashdata('message', 'You are not authorized to edit this property');
                redirect(base_url() . 'properties/my_properties');
            }
        }
        $this->load->view('header/main_view');
        $this->load->view('properties/edit_form', $data);
        $this->load->view('footer/main_view');
    }

    /**
     * View individual Properties pages
     *
     * @return void
     */
    function view($property_id)
    {
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
            //put image array into property array to be passed to a view
            $data['property']['images'] = $image_array;
            //get leaser information
            $data['user'] = $this->user->get_user_info_by_property_id($property_id);

            $user_info_view = ($this->_check_permissions($user_id) == 'seeker') ? 'properties/view_user_info' : 'properties/view_nothing';
        }

        $this->load->view('header/main_view');
        //load nav view based off of permissions
        $this->_nav_view($user_id);
        $this->load->view('properties/view', $data);
        $this->load->view($user_info_view, $data);
        $this->load->view('properties/view_bottom', $data);
        $this->load->view('footer/main_view');
    }

    /**
     * View User Properties pages
     *
     * @return void
     */
    function view_mine($property_id)
    {
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
            //put images into data array to be used in the view
            $data['property']['images'] = $image_array;
            //calculate how much to charge for paypal
            if ($data['property']['size'] * .1 > 100){
                $data['property']['paypal_calculation'] = $data['property']['size'] * .1;
            } else {
                $data['property']['paypal_calculation'] = 100;
            }    
            
        }
        
        $this->load->view('header/main_view');
        //load nav view based off of permissions
        $this->_nav_view($user_id);
        $this->load->view('properties/view_mine', $data);
        $this->load->view('properties/view_mine_bottom', $data);
        $this->load->view('footer/main_view');
    }

    /**
     * Archive property
     *
     * @return void
     */
    function archive($property_id)
    {
        if (!$this->tank_auth->is_logged_in()) {                                    
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect(base_url() . 'auth/login');
        } else if ($user_id= ''){
            $this->session->set_flashdata('message', 'oops!');
            redirect(base_url() . 'my_account');
        } else {
            //$this->load->view('properties/alert');
            $this->property->archive_property($property_id);
            redirect(base_url() . 'properties/my_properties');
        }
        $this->load->view('header/main_view');
        $this->load->view('properties/edit_form', $data);
        $this->load->view('footer/main_view');
    }

    /** Search
    *
    * @return void
    */
    function search($start=0) {
        if (!$this->tank_auth->is_logged_in()) {                                    
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect(base_url() . 'auth/login');
        } else if ($user_id= ''){
            $this->session->set_flashdata('message', 'oops!');
            redirect(base_url() . 'my_account');
        } else {
            $user_id = $this->tank_auth->get_user_id();

            $state = $this->input->post('state');
            $size = $this->input->post('size');
            $cattle = $this->input->post('allowed_uses');


            // if all of the search terms aren't empty
            // then query the database
            if(!empty($state) || !empty($size) || !empty($cattle))
            {
                
                //pagination configuration
                $config['base_url'] = base_url().'properties/my_properties/index/';
                $config['total_rows'] = $this->property->get_properties_count_by_user_id($user_id);
                $config['full_tag_open'] = '<div class="pagination"><ul>';
                $config['full_tag_close'] = '</ul></div>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['last_link'] = 'Last';
                $config['next_link'] = '&gt;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&lt;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                //if number of property rows less than 5
                if ($config['total_rows'] < 5){
                    $config['per_page'] = $config['total_rows'];
                }else{
                    $config['per_page'] = 5;
                }

                $data['properties'] = $this->property->search($state, $size, $cattle);
                
                //make pagination happen
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            }
        }

        $this->load->view('header/main_view');
        //load nav view based off of permissions
        $this->_nav_view($user_id);
        $this->load->view('properties/search');
        $this->load->view('footer/main_view');
    }

    /**
     * Caculate days left until free subscription ends
     *
     * @return int
     */
    private function _sub_days_left($sign_up_date) {
        $date_created = date("Y-m-d", strtotime($sign_up_date['created']));
        //Add one month to date created
        $free_end_date = strtotime(date("Y-m-d", strtotime($date_created)) . "+1 month");
        //Right now
        $now = time();
        $time_left = $free_end_date - $now;
        $days_left = round((($time_left/24)/60)/60); 
        return $days_left;
    }

    /**
     * Load navigation views based off of permissions
     *
     * @return string
     */
    private function _nav_view($user_id){
        $permission_check = $this->_check_permissions($user_id);
        //must be a pasture leaser to view create button
        $nav_bottom = ($permission_check == 'leaser' || $permission_check == 'free_trial') ? 'properties/nav_subscriber_bottom' : 'properties/nav_not_subscriber_bottom';

        $this->load->view('properties/nav');
        $this->load->view($nav_bottom);
    }

    /**
     * Check permissions 
     *
     * @return string
     */
    private function _check_permissions($user_id){
        $sign_up_date = $this->user->get_signup_date($user_id);
        $days_left = $this->_sub_days_left($sign_up_date);
        $seeking_sub_check = $this->user->seeking_sub($user_id);
        $leasing_sub_check = $this->user->leasing_sub($user_id);

        if ($days_left >= 1){
            return 'free_trial';
        } else if ($seeking_sub_check >= 1) {
            return 'seeker';
        } else if ($leasing_sub_check >= 1) {
            return 'leaser';
        } else {
            return 'something went wrong';
        }
    }


    
    

}



/* End of file properties.php */
/* Location: ./application/controllers/properties.php */