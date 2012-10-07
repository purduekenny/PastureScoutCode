<?php
session_start();

class About extends CI_Controller {

    function index()
    {
        //load homepage view
        $this->load->view('header/homepage_view');
        $this->load->view('homepage/about_view');
        $this->load->view('footer/homepage_view');
    }
    

    
    
    
}
?>