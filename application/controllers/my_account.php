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
			$this->load->view('header/header_main');
			$this->load->view('my_account/edit_form', $data);
			$this->load->view('footer/footer_main');
		} else {
			// if logged in, not activated				
			$this->_show_message('You must be logged in to view this page');
			redirect('/auth/login/');
		}
	}

	function edit($user_id = '')
	{

		if (!$this->tank_auth->is_logged_in()) {									
			// if logged in, not activated				
			$this->_show_message('You must be logged in to view this page');
			redirect(base_url() . 'auth/login');
		} else if ($user_id= ''){
			$this->_show_message('Oops!');
			redirect(base_url() . 'my_account');
		} else {
			$user_id = $this->tank_auth->get_user_id();

			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[100]|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[100]|alpha_dash');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required|numeric');


			$data['errors'] = array();

			if ($this->form_validation->run()) {										
				// validation ok
				
				// validation ok
				$data = array(
					'username'	=> $this->form_validation->set_value('username'),
					'email'		=> $this->form_validation->set_value('email'),
					'zip_code'	=> $this->form_validation->set_value('zip_code'),
					'first_name'=> $this->form_validation->set_value('first_name'),
					'last_name'	=> $this->form_validation->set_value('last_name')
				);

				$this->user->set_account_info($user_id, $data);								
				// success

				//reset session w/ new stuff
				$newdata = array(
                   'username'  => $this->form_validation->set_value('username'),
                   'email'     => $this->form_validation->set_value('email')
                );
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('message', 'You have successfully edited your account');
				redirect(base_url() . 'my_account');

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$data['info']=$this->user->get_account_info($user_id);
			$this->load->view('header/header_main');
			$this->load->view('my_account/edit_form');
			$this->load->view('footer/footer_main');
		}
	}

	/**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		$this->session->set_flashdata('message', $message);
	}

/* End of file my_account.php */
/* Location: ./application/controllers/my_account.php */