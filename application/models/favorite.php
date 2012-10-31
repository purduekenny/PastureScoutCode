<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Favorites Model
 *
 *
 */
class Favorite extends CI_Model{

    /**
     * favorite a property
     *
     * @param   int
     * @param   int
     *
     * @return  null
     */
    function add_favorite($user_id, $property_id){
        $data = array(
           'user_id' =>  $user_id,
           'property_id' => $property_id,
        );

        $this->db->insert('favorites', $data); 
    }

    /**
     * unfavorite a property
     *
     * @param   int
     * @param   int
     *
     * @return  null
     */
    function unfavorite($user_id, $property_id){
        $data = array(
           'user_id' =>  $user_id,
           'property_id' => $property_id,
        );

        $this->db->delete('favorites', $data); 
    }

    /**
     * List favorites
     *
     * @param   int
     * @param   int
     * @param   int
     *
     * @return  array
     */
    function list_favorites($user_id, $num=0, $start=0){
        $this->db->select('
            `P.id`, 
            `P.name`, 
            `P.state`, 
            `P.city`,
            `P.country`,
            `P.other_info`,
            `P.restricted_stock_type`, 
            `P.max_head_count`, 
            `P.size`,
            `P.min_lease_term`,
            `P.lease_availability_date`,
            `P.features_forage_type`,
            `P.handling_facilities`,
            `P.allowed_uses`,
            `P.user_id`
        ');
        $this->db->from('favorites F');
        $this->db->join('properties P', 'P.id = F.property_id');
        $this->db->where('`F.user_id`', $user_id);
        $this->db->limit($num, $start);
        $query = $this->db->get();
        return $query->result_array(); 
    }

    /**
     * Get favorite count by user_id
     *
     * @param   int
     * @return  int
     */
    function get_favorite_count_by_user_id($user_id){
        $this->db->select('`id`');
        $this->db->where('`user_id`', $user_id);
        $query = $this->db->get('favorites');
        return $query->num_rows();
    }


}