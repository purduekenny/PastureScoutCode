<?php
session_start();

class Homepage extends CI_Controller {

	function index()
	{
		//load helpers
		$this->load->helper('html');
		$this->load->helper('url');
		//load homepage view
		$this->load->view('homepage');
	}
	

	
	
	
}
?>