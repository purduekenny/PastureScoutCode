<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Property Model
 *
 *
 */
class Property extends CI_Model{

	/**
	 * Get account information
	 *
	 * @param	string
	 * @return	object
	 */
	function get_account_info($login){

		$this->db->select('`id`, `username`, `email`, `zip_code`');
		$this->db->where('LOWER(username)=', strtolower($login));

		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file users.php */
/* Location: ./application/models/users.php */