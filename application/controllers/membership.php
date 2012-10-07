<?php
session_start();

class Membership extends CI_Controller {

    function index()
    {
        //load homepage view
        $this->load->view('header/homepage_view');
        $this->load->view('homepage/membership_view');
        $this->load->view('footer/homepage_view');
    }
    
}
?>