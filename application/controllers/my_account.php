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
        //$this->output->enable_profiler(TRUE);
    }

    function index()
    {
        //check to see if logged in
        if ($this->tank_auth->is_logged_in()) {
            //get user_id
            $user_id = $this->tank_auth->get_user_id();
            $data['info']=$this->user->get_account_info($user_id);

            //get subscription data
            $sign_up_date = $this->user->get_signup_date($user_id);
            $seeking_sub_check = $this->user->seeking_sub($user_id);
            $leasing_sub_check = $this->user->leasing_sub($user_id);
            //Show Pasture Subscription text in sidebar
            $data['subscription_access'] = pasture_subscription_access($user_id, $sign_up_date, $seeking_sub_check, $leasing_sub_check);

            $this->load->view('header/main_view');
            $this->load->view('my_account/nav', $data);
            $this->load->view('my_account/index_top_view', $data);
            //show content based on subscription
            $index_content = index_content($user_id, $sign_up_date, $seeking_sub_check, $leasing_sub_check);
            $this->load->view($index_content, $data);
            $this->load->view('my_account/index_bottom_view', $data);
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
                redirect(base_url() . 'properties');

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }

                $sign_up_date = $this->user->get_signup_date($user_id);
                $seeking_sub_check = $this->user->seeking_sub($user_id);
                $leasing_sub_check = $this->user->leasing_sub($user_id);
                //Show Pasture Subscription text in sidebar
                $data['subscription_access'] = pasture_subscription_access($user_id, $sign_up_date, $seeking_sub_check, $leasing_sub_check);
            }
            $data['info']=$this->user->get_account_info($user_id);
            $this->load->view('header/main_view');
            $this->load->view('my_account/nav', $data);
            $this->load->view('my_account/edit_form');
            $this->load->view('footer/main_view');
        }
    }

    /**
     * Caculate days left until free subscription ends
     *
     * @return int
     */
    function sub_days_left($sign_up_date) {
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
     * Shows subscription in sidebar
     *
     * @return string
     */
    function pasture_subscription_access($user_id, $sign_up_date, $seeking_sub_check, $leasing_sub_check){
        $days_left = sub_days_left($sign_up_date);
        if($leasing_sub_check >= 1){
            return "You are a Pasture Leasing Subscriber";
        } else if ($seeking_sub_check >= 1) {
            return "You are a Pasture Seeking Subscriber";
        } else if ($days_left <= 0) {
            return "Your free subscription has expired.";
        } else {
            return "You have " . $days_left. " day(s) until your free trial ends";
        }
    }

    /**
     * Shows content in index
     *
     * @return string
     */
    function index_content($user_id, $sign_up_date, $seeking_sub_check, $leasing_sub_check){
        $days_left = sub_days_left($sign_up_date);
        if($leasing_sub_check >= 1){
            return 'my_account/index_leaser_view';
        } else if ($seeking_sub_check >= 1) {
            return 'my_account/index_seeker_view';
        } else if ($days_left <= 0) {
            return 'my_account/index_free_view';
        } else {
            return 'my_account/index_free_view';
        }
    }

/* End of file my_account.php */
/* Location: ./application/controllers/my_account.php */