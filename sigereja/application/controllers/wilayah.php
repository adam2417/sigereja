<?php
class Wilayah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Wilayah_model');
	}
	
	function index(){
		$dataprofile = array(
			'page_title' => 'Daftar Wilayah',
			'name' => $this->session->userdata('name'),
			'wilayahlist' => $this->Wilayah_model->getWilayahList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'wilayah/list'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}	
	
	function tambahWilayah(){
		if(isset($_POST['btnSave'])){			
			$this->Wilayah_model->setNama($_POST['nama']);						
			
			$this->Wilayah_model->insertWilayah();			
			
			redirect('wilayah');
		}else{			
			$dataprofile = array(
				'page_title' => 'Tambah Wilayah',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'wilayah/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function ubahWilayah(){
		$id = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){			
			$this->Wilayah_model->setNama($_POST['nama']);						
			$this->Wilayah_model->setId($id);
			$this->Wilayah_model->editWilayahList();			
			
			redirect('wilayah');
		}else{
			$this->Wilayah_model->setId($id);			
			$dataprofile = array(
				'page_title' => 'Edit Wilayah',
				'name' => $this->session->userdata('name'),
				'wilayahlist' => $this->Wilayah_model->getWilayahOneSelect(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'wilayah/profiledit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function deleteWilayah(){
		$id = $this->uri->segment(3);
		$this->Wilayah_model->setId($id);
		$this->Wilayah_model->hapusWilayah();
		redirect('wilayah');
	}
}