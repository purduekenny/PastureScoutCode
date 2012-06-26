<?php
session_start();

class Viral extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('viral');
		}
		else
		{	
			$this->load->database();
			$this->load->library('email');
			
			$email = $this->db->escape($_POST['email']);
			// load e-mail address with unique ID and date into pscout_viral db
			$this->db->query("INSERT INTO viral (email) VALUES (" . $email. ")");
			// send user a welcome e-mail
			
			
			
			//makes it so it sends line breaks
			$config['mailtype'] = 'html';
			$config['protocol'] = 'sendmail';
			$this->email->initialize($config);
			
			$this->email->from('info@pasturescout.com', 'Pasture Scout');
			$this->email->to($_POST['email']); 
			// $this->email->bcc('merrillj42@gmail.com'); 
			$this->email->subject('We\'ll contact you shortly...');
			$this->email->message('<html><body>Congratulations! <br /><br /> You\'ve taken the first step towards finding or securing a pasture lease! You\'ll receive an e-mail from us when PastureScout.com is up and running. <br /><br /> We are excited that you\'re a part of the next evolution in pasture leasing! <br /><br /> PastureScout Founders <br /> info@pasturescout.com</body></html>');				
			$this->email->send();	
			$this->load->view('viral_success');
		}
	}
	

	
	
	
}
?>