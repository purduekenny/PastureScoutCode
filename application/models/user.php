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
	 * Get account information
	 *
	 * @param	int
	 * @return	array
	 */
	function get_account_info($user_id){

		$this->db->select('`id`, `first_name`, `last_name`, `username`, `email`, `zip_code`');
		$this->db->where('id', $user_id);

		$query = $this->db->get('users');
		return $query->result_array();
	}

	/**
	 * Set account information
	 *
	 * @param	int
	 * @param	array
	 * @return	array
	 */
	function set_account_info($user_id, $data){

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
		
		return NULL;
	}


}

/* End of file users.php */
/* Location: ./application/models/users.php */