<?php
session_start();

class Homepage extends CI_Controller {

	function index()
	{
		//load homepage view
		$this->load->view('homepage');
	}
	

	
	
	
}
?>