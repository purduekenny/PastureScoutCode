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
			//make pagination happen
			$data['properties'] = $this->property->get_properties(5, $start);

			
			$this->pagination->initialize($config);
			$data['pages'] = $this->pagination->create_links();
			//load views
			$this->load->view('header/header_main');
			$this->load->view('properties/properties_nav');
			$this->load->view('properties/properties_all_view', $data);
			$this->load->view('footer/footer_main');
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

			$this->load->view('header/header_main');
			$this->load->view('properties/properties_nav');
			$this->load->view('properties/properties_my_view', $data);
			$this->load->view('footer/footer_main');
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
		} else {
			$user_id = $this->tank_auth->get_user_id();

			//form validation
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|max_length[200]');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|max_length[300]');
			$this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[300]');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
			$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|max_length[30]');
			$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[50]');
			$this->form_validation->set_rules('max_head_count', 'Max Head Count', 'trim|numeric|xss_clean|max_length[100]');
			$this->form_validation->set_rules('min_bid', 'Mininum Bid', 'trim|numeric|xss_clean|max_length[100]');
			$this->form_validation->set_rules('opening_bid_date', 'Opening Bid Date', 'trim|required|xss_clean|max_length[100]');
			$this->form_validation->set_rules('closing_bid_date', 'Closing Bid Date', 'trim|required|xss_clean|max_length[100]');
			$this->form_validation->set_rules('other_info', '', 'trim|xss_clean|max_length[500]');
			$data['errors'] = array();

			if ($this->form_validation->run()) {										
				// validation ok prep data to be put in database
				//change dates to be mysql friendly
				$opening_bid_date = date('Y-m-d',strtotime(str_replace("/",".", $this->form_validation->set_value('opening_bid_date'))));
				$closing_bid_date = date('Y-m-d',strtotime(str_replace("/",".", $this->form_validation->set_value('closing_bid_date'))));

				$data = array(
					'user_id'				=> $user_id,
					'name'					=> $this->form_validation->set_value('name'),
					'location'				=> $this->form_validation->set_value('location'),
					'region'				=> $this->form_validation->set_value('region'),
					'city'					=> $this->form_validation->set_value('city'),
					'state'					=> $this->form_validation->set_value('state'),
					'country'				=> $this->form_validation->set_value('country'),
					'restricted_stock_type'	=> $this->form_validation->set_value('restricted_stock_type'),
					'max_head_count'		=> $this->form_validation->set_value('max_head_count'),
					'min_bid'				=> $this->form_validation->set_value('min_bid'),
					'opening_bid_date'		=> $opening_bid_date,
					'closing_bid_date'		=> $closing_bid_date,
					'other_info'			=> $this->form_validation->set_value('other_info')
				);

				//call model and create new property
				$this->property->create_property($data);								

				//message
				$this->session->set_flashdata('message', 'You have successfully added a new property');
				redirect(base_url() . 'properties/my_properties');

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
		}
		//get user_id
		$user_id = $this->tank_auth->get_user_id();
		$data['info']=$this->user->get_account_info($user_id);
		$this->load->view('header/header_main');
		$this->load->view('properties/properties_add_form');
		$this->load->view('footer/footer_main');
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
			$property_user_id = $data['property'][0]['user_id'];
			//if current user owns pasture
			if($user_id == $property_user_id){
				//form validation
				$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|max_length[200]');
				$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|max_length[300]');
				$this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[300]');
				$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[100]');
				$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean|max_length[30]');
				$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[50]');
				$this->form_validation->set_rules('max_head_count', 'Max Head Count', 'trim|numeric|xss_clean|max_length[100]');
				$this->form_validation->set_rules('min_bid', 'Mininum Bid', 'trim|numeric|xss_clean|max_length[100]');
				$this->form_validation->set_rules('opening_bid_date', 'Opening Bid Date', 'trim|required|xss_clean|max_length[100]');
				$this->form_validation->set_rules('closing_bid_date', 'Closing Bid Date', 'trim|required|xss_clean|max_length[100]');
				$this->form_validation->set_rules('other_info', '', 'trim|xss_clean|max_length[500]');
				$data['errors'] = array();

				if ($this->form_validation->run()) {										
					// validation ok prep data to be put in database
					//change dates to be mysql friendly
					$opening_bid_date = date('Y-m-d',strtotime(str_replace("/",".", $this->form_validation->set_value('opening_bid_date'))));
					$closing_bid_date = date('Y-m-d',strtotime(str_replace("/",".", $this->form_validation->set_value('closing_bid_date'))));

					$data = array(
						'name'					=> $this->form_validation->set_value('name'),
						'location'				=> $this->form_validation->set_value('location'),
						'region'				=> $this->form_validation->set_value('region'),
						'city'					=> $this->form_validation->set_value('city'),
						'state'					=> $this->form_validation->set_value('state'),
						'country'				=> $this->form_validation->set_value('country'),
						'restricted_stock_type'	=> $this->form_validation->set_value('restricted_stock_type'),
						'max_head_count'		=> $this->form_validation->set_value('max_head_count'),
						'min_bid'				=> $this->form_validation->set_value('min_bid'),
						'opening_bid_date'		=> $opening_bid_date,
						'closing_bid_date'		=> $closing_bid_date,
						'other_info'			=> $this->form_validation->set_value('other_info'),
						'modified'				=> date('d/m/Y H:i:s', strtotime('today'))
					);

					//edit property
					$this->property->set_property($property_id, $data);								

					//message
					$this->session->set_flashdata('message', 'You have successfully edited your property');
					redirect(base_url() . 'properties/my_properties');

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			} else {
				$this->session->set_flashdata('message', 'You are not authorized to edit this property');
				redirect(base_url() . 'properties/my_properties');
			}
		}
		$this->load->view('header/header_main');
		$this->load->view('properties/properties_edit_form', $data);
		$this->load->view('footer/footer_main');
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
		$this->load->view('header/header_main');
		$this->load->view('properties/properties_edit_form', $data);
		$this->load->view('footer/footer_main');
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

}

/* End of file properties.php */
/* Location: ./application/controllers/properties.php */