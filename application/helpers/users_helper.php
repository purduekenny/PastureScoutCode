<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Caculate days left until free subscription ends
 *
 * @access private
 * @return string
 */
private function _sub_days_left($user_id) {
    $data['userdata'] = $this->user->get_signup_date($user_id);
    $date_created = date("Y-m-d", strtotime($data['userdata']['created']));
    //Add one month to date created
    $free_end_date = strtotime(date("Y-m-d", strtotime($date_created)) . "+1 month");
    //Right now
    $now = time();
    $time_left = $free_end_date-$now;
    $days_left = round((($time_left/24)/60)/60); 
    return $days_left;
}

/**
 * Check to see if leaser has a subscription
 *
 * @access public
 * @return string
 */
public function pasture_leasing_access($user_id){
    $days_left = _sub_days_left($user_id);

    if($days_left <= 0){
        return ""
    }
}

