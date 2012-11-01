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
     * get images
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function get_images($property_id){
        $this->db->select('`photos`');
        $this->db->where('`id`', $property_id);
        $query = $this->db->get('properties');
        return $query->row_array();
    }

    /**
     * insert 1 image
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function set_image($property_id, $name){
        $query = 'UPDATE  `properties` SET `photos` = CONCAT(`photos`, ' ;
        $query .=  "'$name,'";
        $query .= ') WHERE `id` = ' . $property_id;
        $this->db->query($query);
    }

    /**
     * update images
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function update_images($property_id, $name){
        $this->db->set('photos', $name);
        $this->db->where('id', $property_id);
        $this->db->update('properties');
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
            `photos`,
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
        return $query->row_array();
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

    /**
     * Check to see if Pasture can be put on a public auction
     *
     * @param   int
     * @return  int
     */
    function public_pasture_auction($property_id){
        $this->db->select('`ipn_orders.id`');
        $this->db->from('ipn_orders');
        $this->db->join('ipn_order_items', 'ipn_order_items.order_id = ipn_orders.id');
        $this->db->where('`custom`', $property_id);
        $this->db->where('`ipn_order_items.item_name`', 'Public Pasture Auction');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Check to see if Pasture can be put on a private auction
     *
     * @param   int
     * @return  int
     */
    function private_pasture_auction_check($property_id){
        $this->db->select('`id`');
        $this->db->where('`custom`', $user_id);
        $this->db->where('`transaction_subject`', 'Private Pasture Auction');
        $query = $this->db->get('`ipn_orders`');
        return $query->num_rows();
    }

    /**
     * Search
     *
     * @param   string
     * @param   int
     * @param   int
     * @param   string
     * @param   int
     * @param   int
     * 
     * @return  array
     */
    function search($state, $size, $max_head_count, $cattle, $num=0, $start=0){
        $this->db->select('
            `id`, 
            `name`, 
            `state`, 
            `city`,
            `country`,
            `other_info`,
            `restricted_stock_type`, 
            `max_head_count`, 
            `size`,
            `min_lease_term`,
            `lease_availability_date`,
            `features_forage_type`,
            `handling_facilities`,
            `allowed_uses`,
            `user_id`
        ');

        if($state != "NO"){
            $this->db->where('`state`', $state);
        }
        if(!empty($size)){
            $this->db->where('size <=', $size);
            $this->db->where('size !=', 0);
        }
        if(!empty($max_head_count)){
            $this->db->where('max_head_count >=', $max_head_count);
            $this->db->where('max_head_count !=', 0);
        }
        if($cattle != "NO"){
            $this->db->like('`allowed_uses`', $cattle);
        }
        $this->db->where('`status`', 'active');
        $this->db->limit($num, $start);
        $query = $this->db->get('properties');
        return $query->result_array();
    }

    /**
     * Get search results number for search pagination
     * 
     * @param   string
     * @param   int
     * @param   int
     * @param   string
     * 
     * @return  int
     */
    function search_results_count($state, $size, $max_head_count, $cattle){
        $this->db->select('`id`');

        if($state != "NO"){
            $this->db->where('`state`', $state);
        }
        if(!empty($size)){
            $this->db->where('size <=', $size);
            $this->db->where('size !=', 0);
        }
        if(!empty($max_head_count)){
            $this->db->where('max_head_count <=', $max_head_count);
            $this->db->where('max_head_count !=', 0);
        }
        if($cattle != "NO"){
            $this->db->like('`allowed_uses`', $cattle);
        }
        $this->db->where('`status`', 'active');
        $query = $this->db->get('properties');
        return $query->num_rows();
    }


}

/* End of file users.php */
/* Location: ./application/models/property.php */
