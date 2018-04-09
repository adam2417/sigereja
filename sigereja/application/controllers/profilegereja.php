<?php
class Profilegereja extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Profilgereja_model');
	}

	function index(){
		$dataprofile = array(
			'page_title' => 'Profil Gereja',
			'name' => $this->session->userdata('name'),
			'dataprofile' => $this->Profilgereja_model->getProfile(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'profilegereja/profil'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);		
	}
	
	function modifyDescription(){		
		if(isset($_POST['btnSave'])){
			$dateNow = date('Y-m-d H:i:s');			
			$this->Profilgereja_model->setDescription($_POST['elm1']);
			$this->Profilgereja_model->setLastEdited($dateNow);
			$this->Profilgereja_model->setEditedBy($this->session->userdata('name'));
			
			$this->Profilgereja_model->updateProfile();
			
			redirect('profilegereja');
		}else{
			$dataprofile = array(
				'page_title' => 'Edit Profil Gereja',
				'name' => $this->session->userdata('name'),
				'dataprofile' => $this->Profilgereja_model->getProfile(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'profilegereja/profiledit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}	
}