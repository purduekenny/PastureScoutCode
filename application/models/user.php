<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 *
 */
class User extends CI_Model{

	function __construct(){

		parent::__construct();
		$ci =& get_instance();
	}

	/**
	 * Get last login
	 *
	 * @param	int
	 * @return	array
	 */
	function get_last_login($user_id){

		$this->db->select('`last_login`');
		$this->db->where('id', $user_id);

		$query = $this->db->get('users');
		return $query->result_array();
	}

	/**
	 * Get account information
	 *
	 * @param	int
	 * @return	array
	 */
	function get_account_info($user_id){

		$this->db->select(
				  '`first_name`,
				  `last_name`,
				  `password`,
				  `email`,
				  `paypal`,
				  `street`,
				  `city`,
				  `state`,
				  `zip_code`,
				  `birthday` ,
				  `home_phone`,
				  `cell_phone`,
				  `user_photo`,
				  `accept_terms` ,
				  `current_business`,
				  `operation_type`,
				  `livestock_type_owned`,
				  `livestock_number`,
				  `livestock_managing_percent`,
				  `number_years_experience`,
				  `largest_lease`,
				  `education`,
				  `land_management_training`,
				  `activated`');
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	/**
	 * Set account information
	 *
	 * @param	int
	 * @param	array
	 * @return	null
	 */
	function set_account_info($user_id, $data){

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
		
		return NULL;
	}

	/**
	 * get date signed up.
	 *
	 * @param	int
	 * @return	array
	 */
	function get_signup_date($user_id){
		$this->db->select('`created`');
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	/**
	 * get date signed up for a subscription.
	 *
	 * @param	int
	 * @return	array
	 */
	function get_sub_signup_date($user_id){
		$this->db->select('`created_at`');
		$this->db->where('custom', $user_id);
		$query = $this->db->get('ipn_orders');
		return $query->row_array();
	}

	/**
	 * Check if user is subscribed to Pasture Seeking.
	 *
	 * @param	int
	 * @return	int
	 */
	function seeking_sub($user_id){
		$this->db->select('`id`');
		$this->db->where('`custom`', $user_id);
		$this->db->where('`transaction_subject`', 'Pasture Seeking');
		$query = $this->db->get('ipn_orders');
		return $query->num_rows();
	}


	/**
	 * Check if user is subscribed to Pasture Leasing.
	 *
	 * @param	int
	 * @return	int
	 */
	function leasing_sub($user_id){
		$this->db->select('`id`');
		$this->db->where('`custom`', $user_id);
		$this->db->where('`transaction_subject`', 'Pasture Leasing');
		$query = $this->db->get('ipn_orders');
		return $query->num_rows();
	}

	/**
	 * Get user information based off of Property ID
	 *
	 * @param	int
	 * @return	int
	 */
	function get_user_info_by_property_id($property_id){
		$this->db->select('`first_name`,
						  `last_name`,
						  `email`,
						  `street`,
						  `users.city`,
						  `users.state`,
						  `users.zip_code`,
						  `birthday` ,
						  `home_phone`,
						  `cell_phone`,
						  `current_business`,
						  `operation_type`,
						  `livestock_type_owned`,
						  `livestock_number`,
						  `livestock_managing_percent`,
						  `number_years_experience`,
						  `largest_lease`,
						  `education`,
						  `land_management_training`');
		$this->db->from('users');
		$this->db->join('properties', 'properties.user_id = users.id');
		$this->db->where('`properties.id`', $property_id);
		$query = $this->db->get();
		return $query->row_array();;
	}

	/**
	 * Check if user is subscribed to Forage Seeking.
	 *
	 * @param	int
	 * @return	int
	 */
	function seeking_forage_sub($user_id){
		$this->db->select('`id`');
		$this->db->where('`custom`', $user_id);
		$this->db->where('`transaction_subject`', 'Forage Seeking');
		$query = $this->db->get('ipn_orders');
		return $query->num_rows();
	}

	/**
	 * Check if user is subscribed to Forage Leasing.
	 *
	 * @param	int
	 * @return	int
	 */
	function leasing_forage_sub($user_id){
		$this->db->select('`id`');
		$this->db->where('`custom`', $user_id);
		$this->db->where('`transaction_subject`', 'Forage Leasing');
		$query = $this->db->get('ipn_orders');
		return $query->num_rows();
	}

	/**
	 * Get user information based off of forage ID
	 *
	 * @param	int
	 * @return	int
	 */
	function get_user_info_by_forage_id($forage_id){
		$this->db->select('`first_name`,
						  `last_name`,
						  `email`,
						  `street`,
						  `users.city`,
						  `users.state`,
						  `users.zip_code`,
						  `birthday` ,
						  `home_phone`,
						  `cell_phone`,
						  `current_business`,
						  `operation_type`,
						  `livestock_type_owned`,
						  `livestock_number`,
						  `livestock_managing_percent`,
						  `number_years_experience`,
						  `largest_lease`,
						  `education`,
						  `land_management_training`');
		$this->db->from('users');
		$this->db->join('properties', 'properties.user_id = users.id');
		$this->db->where('`properties.id`', $forage_id);
		$query = $this->db->get();
		return $query->row_array();;
	}





}

/* End of file users.php */
/* Location: ./application/models/users.php */