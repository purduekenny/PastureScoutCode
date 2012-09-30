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
			$this->load->view('header/main_view');
			$this->load->view('register');
			$this->load->view('footer/main_view');
		}

		function submit()
		{
			
		}
	}