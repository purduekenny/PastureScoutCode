<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('user');


    }

    function index()
    {
        //check to see if logged in
        if ($this->tank_auth->is_logged_in()) {
            //get user_id
            $user_id = $this->tank_auth->get_user_id();
            $data['info']=$this->user->get_account_info($user_id);

            //find out days left until subscription ends
            $data['userdata'] = $this->user->get_signup_date($user_id);
            $date_created = date("Y-m-d", strtotime($data['userdata']['created']));
            //Add one month to date created
            $free_end_date = strtotime(date("Y-m-d", strtotime($date_created)) . "+1 month");
            //Right now
            $now = time();
            $time_left = $free_end_date-$now;
            $days_left = round((($time_left/24)/60)/60); //probably...
            $data['userdata']['days_left'] = $days_left;

            //$membership_expiration = $date
            $this->load->view('header/main_view');
            $this->load->view('my_account/nav', $data);
            $this->load->view('my_account/edit_form', $data);
            $this->load->view('footer/main_view');
        } else {
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect('/auth/login/');
        }
    }

    function edit($user_id = '')
    {

        if (!$this->tank_auth->is_logged_in()) {                                    
            // if logged in, not activated              
            $this->session->set_flashdata('message', 'You must be logged in to use this page');
            redirect(base_url() . 'auth/login');
        } else if ($user_id= ''){
            $this->session->set_flashdata('message', 'oops!');
            redirect(base_url() . 'my_account');
        } else {
            $user_id = $this->tank_auth->get_user_id();

            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('street', 'Street', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|');
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required|numeric|max_length[5]');
            $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('home_phone', 'Home Phone', 'trim|xss_clean|max_length[10]');
            $this->form_validation->set_rules('cell_phone', 'Cell Phone', 'trim|xss_clean|max_length[10]');
            $this->form_validation->set_rules('operation_type', 'Operation type', 'trim');
            $this->form_validation->set_rules('livestock_type_owned[]', 'Live Stock Type Owned', 'trim');
            $this->form_validation->set_rules('livestock_number', 'Livestock Number', 'trim');
            $this->form_validation->set_rules('livestock_managing_percent', 'Percent Livestock managed', 'trim');
            $this->form_validation->set_rules('number_years_experience', 'Number of Years Experience', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('largest_lease', 'Largest Lease', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('education', 'Education', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('land_management_training', 'Land Management Traning', 'trim|xss_clean|max_length[100]');
            $data['errors'] = array();  
            if ($this->form_validation->run()) {

                //change dates to be mysql friendly
                $birthday = date('Y-m-d',strtotime($this->form_validation->set_value('birthday')));

                // validation ok
                $data = array(
                    'first_name'                => $this->form_validation->set_value('first_name'),
                    'last_name'                 => $this->form_validation->set_value('last_name'),
                    'email'                     => $this->form_validation->set_value('email'),
                    'street'                    => $this->form_validation->set_value('street'),
                    'city'                      => $this->form_validation->set_value('city'),
                    'state'                     => $this->form_validation->set_value('state'),
                    'zip_code'                  => $this->form_validation->set_value('zip_code'),
                    'birthday'                  => $birthday,
                    'home_phone'                => $this->form_validation->set_value('home_phone'),
                    'cell_phone'                => $this->form_validation->set_value('cell_phone'),
                    'operation_type'            => $this->form_validation->set_value('operation_type'),
                    //turn array into comma separated string
                    'livestock_type_owned'      => implode(",", $this->input->post('livestock_type_owned')),
                    'livestock_number'          => $this->form_validation->set_value('livestock_number'),
                    'livestock_managing_percent'=> $this->form_validation->set_value('livestock_managing_percent'),
                    'number_years_experience'   => $this->form_validation->set_value('number_years_experience'),
                    'largest_lease'             => $this->form_validation->set_value('largest_lease'),
                    'education'                 => $this->form_validation->set_value('education'),
                    'land_management_training'  => $this->form_validation->set_value('land_management_training'),
                );

                
                //update account information
                $this->user->set_account_info($user_id, $data);                             
                //reset session w/ new stuff for menu
                $newdata = array(
                   'email'     => $this->form_validation->set_value('email')
                );
                
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('message', 'You have successfully edited your account');
                redirect(base_url() . 'my_account');

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
                //find out days left until subscription ends
                $data['userdata'] = $this->user->get_signup_date($user_id);
                $date_created = date("Y-m-d", strtotime($data['userdata']['created']));
                //Add one month to date created
                $free_end_date = strtotime(date("Y-m-d", strtotime($date_created)) . "+1 month");
                //Right now
                $now = time();
                $time_left = $free_end_date-$now;
                $days_left = round((($time_left/24)/60)/60); //probably...
                $data['userdata']['days_left'] = $days_left;
            }
            $data['info']=$this->user->get_account_info($user_id);
            $this->load->view('header/main_view');
            $this->load->view('my_account/nav', $data);
            $this->load->view('my_account/edit_form');
            $this->load->view('footer/main_view');
        }
    }

    /**
     * Show info message
     *
     * @param   string
     * @return  void
     */
    function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
    }

/* End of file my_account.php */
/* Location: ./application/controllers/my_account.php */