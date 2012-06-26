<?php
session_start();

class Users extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		
		// validate the data entry
		// required, xss_clean, and trim for SQL injection
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register.php');
		}
		else
		{	
			$this->load->database();
			$this->load->library('email');
			
			$email = $this->db->escape($_POST['email']);
			$password_encrypted = sha1($_POST['password']);
			
			//check to see if the user already exists
			$query = $this->db->query("SELECT email FROM user WHERE email = " . $email . ";");	
			if($query->num_rows() == 0)
			{
				// there are no current users with this e-mail in the database
				$this->db->query("INSERT INTO user (email, password) VALUES (" . $email. ", '" . $password_encrypted . "')");
				// send user a welcome e-mail
				//makes it so it sends line breaks
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('info@pasturescout.com', 'Pasture Scout');
				$this->email->to($email); 
				$this->email->subject('Welcome to PastureScout.com');
				$this->email->message('<html><body>Congratulations! <br /><br /> This e-mail will have fancy information about your account. </body></html>');				
				$this->email->send();		
				$this->load->view('register_success.php');
			}
			else
			{
				// this e-mail is already registered in the database	
				$_SESSION["error"] = $email . " is already registered
				 as a user. Please login, retreive your forgotten password, or register.";
				$this->load->view('register.php');
			} // end else for user verification
				
		} // end else for validation
	}
	
	function login()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login.php');
		}
		else
		{	
			$this->load->database();
			
			$email = $this->db->escape($_POST['email']);
			$password_encrypted = sha1($_POST['password']);
			
			// query database to grab user who has the password and email address entered from the previous page
			$query = $this->db->query("SELECT email, password FROM user WHERE email=" . $email . " AND password='" . $password_encrypted . "';");
			
			
			if($query->num_rows() == 1)
			{
				// is there exactly one row? if there is then it's a succesful login
				$this->load->view('login_success.php');
			}
			else {
				// there was a problem
				$_SESSION["error"] = "Your e-mail and password combination did not match our records.";
				$this->load->view('login.php');
			}
		}
	}

	
	
	
}
?>