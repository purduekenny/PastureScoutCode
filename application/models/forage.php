<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Forage Model
 *
 *
 */
class Forage extends CI_Model{

    /**
     * Create new forage
     *
     * @param   array
     * @return  null
     */
    function create_forage($data){

        $data['created'] = date('Y-m-d H:i:s');
        $data['status'] = 'active';
        $this->db->insert('forages', $data);
        return NULL;
    }

    /**
     * Get forages
     * @param   int
     * @param   int
     * @return  array
     */
    function get_forages($num=5, $start=0){
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
            `allowed_uses`
        ');
        $this->db->where('status', 'active');
        $this->db->limit($num, $start);
        $query = $this->db->get('forages'); 
        return $query->result_array();
    
    }

    /**
     * Get forages by user_id
     *
     * @param   int
     * @param   int
     * @param   int
     * @return  array
     */
    function get_forages_by_user($user_id, $num=0, $start=0){
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
            `photos`,
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
        $query = $this->db->get('forages');
        return $query->result_array();
    
    }

    /**
     * update forage
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function set_forage($forage_id, $data){
        $this->db->where('id', $forage_id);
        $this->db->update('forages', $data);
        return NULL;
    }

    /**
     * get latest forage id from a user. 
     *
     * @param   int
     * @return  null
     */
    function get_latest_forage_id($user_id){
        $this->db->select('`id`');
        $this->db->where('`user_id`', $user_id);
        $this->db->order_by("created", "desc");
        $this->db->limit(1);
        $query = $this->db->get('forages');
        return $query->row_array();
    }


    /**
     * get images
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function get_images($forage_id){
        $this->db->select('`photos`');
        $this->db->where('`id`', $forage_id);
        $query = $this->db->get('forages');
        return $query->row_array();
    }

    /**
     * insert 1 image
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function set_image($forage_id, $name){
        $query = 'UPDATE  `forages` SET `photos` = CONCAT(`photos`, ' ;
        $query .=  "'$name,'";
        $query .= ') WHERE `id` = ' . $forage_id;
        $this->db->query($query);
    }

    /**
     * update images
     *
     * @param   int
     * @param   array
     * @return  null
     */
    function update_images($forage_id, $name){
        $this->db->set('photos', $name);
        $this->db->where('id', $forage_id);
        $this->db->update('forages');
    }


    /**
     * Get a forage by id
     *
     * @param   int
     * @return  array
     */
    function get_forage_by_id($forage_id){
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
        $this->db->where('id', $forage_id);
        $this->db->where('`status`', 'active');
        $query = $this->db->get('forages');
        return $query->row_array();
    }

    /**
     * Archive forage
     *
     * @param   int
     * @return  null
     */
    function archive_forage($forage_id){
        $this->db->set('status', 'archived');
        $this->db->where('id', $forage_id);
        $this->db->update('forages');
    }

    /**
     * Get forages count
     *
     * @return  int
     */
    function get_forages_count(){
        $this->db->select('`id`');
        $this->db->where('`status`', 'active');
        $query = $this->db->get('forages');
        return $query->num_rows();
    }

    /**
     * Get forages count by user_id
     *
     * @param   int
     * @return  int
     */
    function get_forages_count_by_user_id($user_Id){
        $this->db->select('`id`');
        $this->db->where('`status`', 'active');
        $this->db->where('`user_id`', $user_Id);
        $query = $this->db->get('forages');
        return $query->num_rows();
    }

    /**
     * Check to see if forage can be put on a public auction
     *
     * @param   int
     * @return  int
     */
    function public_forage_auction($forage_id){
        $this->db->select('`ipn_orders.id`');
        $this->db->from('ipn_orders');
        $this->db->join('ipn_order_items', 'ipn_order_items.order_id = ipn_orders.id');
        $this->db->where('`custom`', $forage_id);
        $this->db->where('`ipn_order_items.item_name`', 'Public forage Auction');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Check to see if forage can be put on a private auction
     *
     * @param   int
     * @return  int
     */
    function private_forage_auction_check($forage_id){
        $this->db->select('`id`');
        $this->db->where('`custom`', $user_id);
        $this->db->where('`transaction_subject`', 'Private forage Auction');
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
            `photos`,
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
        $query = $this->db->get('forages');
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
        $query = $this->db->get('forages');
        return $query->num_rows();
    }


}

/* End of file users.php */
/* Location: ./application/models/forage.php */
