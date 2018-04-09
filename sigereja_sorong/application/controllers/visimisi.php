<?php
class Visimisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Visimisi_model');
	}

	function index(){
		$datavisimisi = array(
			'page_title' => 'Visi Misi Gereja',
			'name' => $this->session->userdata('name'),
			'datavisimisi' => $this->Visimisi_model->getVisiMisi(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'visimisi/visimisi'			
			);
			$this->template->load('template/def_template',$content,$datavisimisi);
	}

	function modifyDescription(){
		if(isset($_POST['btnSave'])){
			$this->Visimisi_model->setDescription($_POST['elm1']);
			$this->Visimisi_model->setLastEdited(date("Y-m-d H:i:s"));
			$this->Visimisi_model->setEditedBy($this->session->userdata('name'));
				
			$this->Visimisi_model->updateProfile();
				
			redirect('visimisi');
		}else{
			$dataprofile = array(
				'page_title' => 'Edit Profil Gereja',
				'name' => $this->session->userdata('name'),
				'datavisimisi' => $this->Visimisi_model->getVisiMisi(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'visimisi/editvisimisi'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
}