<?php
class Strukturorg extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Strukorg_model');
	}

	function index(){
		$datavisimisi = array(
			'page_title' => 'Struktur Organisasi Gereja',
			'name' => $this->session->userdata('name'),
			'datastrukorg' => $this->Strukorg_model->getStrukOrg(),
			'images' => $this->Strukorg_model->get_images(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'strukorg/struk'			
		);
		$this->template->load('template/def_template',$content,$datavisimisi);
	}

	function modifyDescription(){
		if ($this->input->post('upload')) {
			$this->Strukorg_model->do_upload();
		}
		if(isset($_POST['btnSave'])){
			$this->Strukorg_model->setDescription($_POST['elm1']);
			$this->Strukorg_model->setLastEdited(date("Y-m-d H:i:s"));
			$this->Strukorg_model->setEditedBy($this->session->userdata('name'));
				
			$this->Strukorg_model->updateProfile();
				
			redirect('strukturorg');
		}else{
			$dataprofile = array(
				'page_title' => 'Edit Struktur Organisasi Gereja',
				'name' => $this->session->userdata('name'),
				'datastrukorg' => $this->Strukorg_model->getStrukOrg(),				
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'strukorg/editstrukorg'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
    
    function uploadImages(){
        json_encode(array('location'=>'/asset/images/tinymce/'));
    }
}