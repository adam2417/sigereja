<?php
class Gallery extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Gallery_model');
	}
	function index() {
		if ($this->input->post('upload')) {
                        $this->Gallery_model->setGambar($_FILES['userfile']['name']);
                        $this->Gallery_model->setJudul($_POST['judul']);
                        
                        $this->Gallery_model->postToDatabase();
                        
			$this->Gallery_model->do_upload();
			$dataprofile = array(
				'page_title' => 'Gallery',
				'name' => $this->session->userdata('name'),
				'images' => $this->Gallery_model->get_images(),
				'role' => $this->session->userdata('role')			
			);
		}else{
			$dataprofile = array(
				'page_title' => 'Gallery',
				'name' => $this->session->userdata('name'),
				'images' => $this->Gallery_model->get_images(),
				'role' => $this->session->userdata('role')			
			);
		}
		$content = array(
			'content' => 'gallery/gallery'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);		
	}
	
}
