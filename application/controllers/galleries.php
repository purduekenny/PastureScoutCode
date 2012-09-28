<?php
class Galleries extends CI_Controller {
	
	function index() {
		
		$this->load->model('gallery');
		
		if ($this->input->post('upload')) {
			$this->gallery->do_upload();
		}
		
		$data['images'] = $this->gallery->get_images();
		
		$this->load->view('gallery', $data);
		
	}
	
}
