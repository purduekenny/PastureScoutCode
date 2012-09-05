<?php
	session_start();

	class Register extends CI_Controller {

		function index()
		{
			//load helpers
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->helper('form');
			//load homepage view
			$this->load->view('header/header_main');
			$this->load->view('register');
			$this->load->view('footer/footer_main');
		}

		function submit()
		{
			
		}
	}