<?php
class Keluarga extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Keluarga_model');
		$this->load->model('Wilayah_model');
	}
	
	function index(){
		if(isset($_POST['btnview'])){
			$wilayah = $_POST['wilayah'];
			$this->Keluarga_model->setWilayah($wilayah);
			$dataprofile = array(
				'page_title' => 'Daftar Keluarga',
				'name' => $this->session->userdata('name'),
				'keluargalist' => $this->Keluarga_model->getSelectByWilayah(),
				'wilayahlist' => $this->Wilayah_model->getWilayahList(),
				'role' => $this->session->userdata('role')			
			);
		}else{
			$dataprofile = array(
				'page_title' => 'Daftar Keluarga',
				'name' => $this->session->userdata('name'),
				'keluargalist' => $this->Keluarga_model->getList(),
				'wilayahlist' => $this->Wilayah_model->getWilayahList(),
				'role' => $this->session->userdata('role')			
			);
		}
		$content = array(
			'content' => 'keluarga/list'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function getDetailKeluarga(){
		$idKeluarga = $this->uri->segment(3);
		$this->Keluarga_model->setId($idKeluarga);
		$dataprofile = array(
			'page_title' => 'Detail Keluarga',
			'name' => $this->session->userdata('name'),
			'keluargalist' => $this->Keluarga_model->getOneSelect(),
			'wilayahlist' => $this->Wilayah_model->getWilayahList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'keluarga/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function ubahKeluarga(){
		$idKeluarga = $this->uri->segment(3);
		if(isset($_POST['btnSave'])){
			$this->Keluarga_model->setNama($_POST['nama']);
			$this->Keluarga_model->setWilayah($_POST['wilayah']);
			$this->Keluarga_model->setAlamat($_POST['almt']);
			$this->Keluarga_model->setNoTelp($_POST['notelp']);
			$this->Keluarga_model->setId($idKeluarga);
			
			$this->Keluarga_model->ubahKeluarga();
			
			redirect('keluarga');
		}else{			
			$this->Keluarga_model->setId($idKeluarga);
			$dataprofile = array(
				'page_title' => 'Detail Keluarga',
				'name' => $this->session->userdata('name'),
				'keluargalist' => $this->Keluarga_model->getOneSelect(),
				'wilayahlist' => $this->Wilayah_model->getWilayahList(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'keluarga/edit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function tambahKeluarga(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['nama']) &&
			isset($_POST['almt']) &&
			isset($_POST['notelp']) &&
			!($_POST['nama'] == '') &&
			!($_POST['almt'] == '') &&
			!($_POST['notelp'] == '')){
				$this->Keluarga_model->setNama($_POST['nama']);
				$this->Keluarga_model->setWilayah($_POST['wilayah']);
				$this->Keluarga_model->setAlamat($_POST['almt']);
				$this->Keluarga_model->setNoTelp($_POST['notelp']);
				
				$this->Keluarga_model->tambahKeluarga();
				
				redirect('keluarga');
			}else{
				$dataprofile = array(
					'page_title' => 'Tambah Data Keluarga',
					'name' => $this->session->userdata('name'),
					'role' => $this->session->userdata('role'),
					'wilayahlist' => $this->Wilayah_model->getWilayahList(),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Keluarga</div>'			
				);
				$content = array(
					'content' => 'keluarga/tambah'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{			
			$dataprofile = array(
				'page_title' => 'Tambah Data Keluarga',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'wilayahlist' => $this->Wilayah_model->getWilayahList(),
				'message' => ''			
			);
			$content = array(
				'content' => 'keluarga/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function hapusKeluarga(){
		$idKeluarga = $this->uri->segment(3);
		$this->Keluarga_model->setId($idKeluarga);
		$this->Keluarga_model->deleteKeluarga();
		redirect('keluarga');
	}
}