<?php
session_start();

class Membership extends CI_Controller {

    function index()
    {
        //load homepage view
        $this->load->view('homepage/header_view');
        $this->load->view('homepage/membership_view');
        $this->load->view('homepage/footer_view');
    }
    
}
?>