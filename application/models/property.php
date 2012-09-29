<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Property Model
 *
 *
 */
class Property extends CI_Model{

    /**
     * Create new property
     *
     * @param   array
     * @return  null
     */
    function create_property($data){

        $data['created'] = date('Y-m-d H:i:s');
        $data['status'] = 'active';
        $this->db->insert('properties', $data);
        return NULL;
    }

    /**
     * Get properties
     * @param   int
     * @param   int
     * @return  array
     */
    function get_properties($num=5, $start=0){
        $this->db->select('
            `id`, 
            `name`, 
            `location`, 
            `region`, 
            `city`, 
            `state`, 
            `country`, 
            `restricted_stock_type`, 
            `max_head_count`, 
            `min_bid`, 
            `opening_bid_date`, 
            `closing_bid_date`,
            `other_info`,
            `size`,
            `min_lease_term`,
            `lease_availability_date`,
            `features_forage_type`,
            `handling_facilities`,
            `allowed_uses`
        ');
        $this->db->where('status', 'active');
        $this->db->limit($num, $start);
        $query = $this->db->get('properties'); 
        return $query->result_array();
    
    }

    /**
     * Get properties by user_id
     *
     * @param   int
     * @param   int
     * @param   int
     * @return  array
     */
    function get_properties_by_user($user_id, $num=0, $start=0){
        $this->db->select('            
            `id`, 
            `name`, 
            `location`, 
            `region`, 
            `city`, 
            `state`, 
            `country`, 
            `restricted_stock_type`, 
            `max_head_count`, 
            `min_bid`, 
            `opening_bid_date`, 
            `closing_bid_date`,
            `other_info`,
            `size`,
            `min_lease_term`,
            `lease_availability_date`,
            `features_forage_type`,
            `handling_facilities`,
            `allowed_uses`,
            `user_id`
        ');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 'active');
        $this->db->limit($num, $start);
        $query = $this->db->get('properties');
        return $query->result_array();
    
    }

    /**
     * update property
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function set_property($property_id, $data){
        $this->db->where('id', $property_id);
        $this->db->update('properties', $data);
        return NULL;
    }

    /**
     * Get a property by id
     *
     * @param   int
     * @return  array
     */
    function get_property_by_id($property_id){
        $this->db->select('
            `id`, 
            `name`, 
            `location`, 
            `region`, 
            `city`, 
            `state`, 
            `country`, 
            `restricted_stock_type`, 
            `max_head_count`, 
            `min_bid`, 
            `opening_bid_date`, 
            `closing_bid_date`,
            `other_info`,
            `size`,
            `min_lease_term`,
            `lease_availability_date`,
            `features_forage_type`,
            `handling_facilities`,
            `allowed_uses`,
            `user_id`
        ');
        $this->db->where('id', $property_id);
        $this->db->where('`status`', 'active');
        $query = $this->db->get('properties');
        return $query->result_array();
    }

    /**
     * Archive property
     *
     * @param   int
     * @return  null
     */
    function archive_property($property_id){
        $this->db->set('status', 'archived');
        $this->db->where('id', $property_id);
        $this->db->update('properties');
    }

    /**
     * Get properties count
     *
     * @return  int
     */
    function get_properties_count(){
        $this->db->select('`id`');
        $this->db->where('`status`', 'active');
        $query = $this->db->get('properties');
        return $query->num_rows();
    }

    /**
     * Get properties count by user_id
     *
     * @param   int
     * @return  int
     */
    function get_properties_count_by_user_id($user_Id){
        $this->db->select('`id`');
        $this->db->where('`status`', 'active');
        $this->db->where('`user_id`', $user_Id);
        $query = $this->db->get('properties');
        return $query->num_rows();
    }


}

/* End of file users.php */
/* Location: ./application/models/users.php */