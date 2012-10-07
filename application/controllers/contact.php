<?php
session_start();

class Contact extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('tank_auth');
    }

    function index()
    {
        //load homepage view
        $this->load->view('header/homepage_view');
        $this->load->view('homepage/contact_view');
        $this->load->view('footer/homepage_view');
    }

    function email(){
        //form validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('farm', 'Farm', 'trim|xss_clean|max_length[300]');
        $this->form_validation->set_rules('zip', 'Zip Code', 'trim|required|numeric|xss_clean|max_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[30]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|max_length[50]');
        $this->form_validation->set_rules('message', 'Message', 'trim|xss_clean|max_length[500]');
        $data['errors'] = array();

        if ($this->form_validation->run()) {    

            $data = array(
                'name'    => $this->form_validation->set_value('name'),
                'farm'    => $this->form_validation->set_value('farm'),
                'zip'     => $this->form_validation->set_value('zip'),
                'email'   => $this->form_validation->set_value('email'),
                'phone'   => $this->form_validation->set_value('phone'),
                'subject' => $this->form_validation->set_value('subject'),
                'message' => $this->form_validation->set_value('message')
            );


            $this->load->library('email');

            $this->email->from($data['email'], $data['name']);
            $this->email->to('angeline.e.tran@gmail.com'); 

            $this->email->subject($data['subject']);
            $this->email->message($this->load->view('email/contact-html', $data, TRUE));  

            $this->email->send();
                                                          

            //message
            $this->session->set_flashdata('message', 'Thank you for contacting us.');
            redirect(base_url() . 'contact/');

            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
            }
        $this->load->view('header/homepage_view');
        $this->load->view('homepage/contact_view');
        $this->load->view('footer/homepage_view');
    }
}