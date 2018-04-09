<?php
class Majelis extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Majelis_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Jabatan_model');
	}
	
	function index(){
            if(isset($_POST['btnview'])){
                    if(isset($_POST['wilayah'])){
                        if(!($_POST['wilayah'] == 'all')){
                            $wilayah = $_POST['wilayah'];
                            $this->Majelis_model->setWilayah($wilayah);                            
                            $dataprofile = array(
                                    'page_title' => 'Daftar Majelis',
                                    'name' => $this->session->userdata('name'),
                                    'role' => $this->session->userdata('role'),
                                    'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                                    'datamajelis' => $this->Majelis_model->getAllListByWilayah()
                            );
                        }else{
                            $dataprofile = array(
                                    'page_title' => 'Daftar Majelis',
                                    'name' => $this->session->userdata('name'),
                                    'role' => $this->session->userdata('role'),
                                    'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                                    'datamajelis' => $this->Majelis_model->getAllList()
                            );
                        }
                    }
            }else{                
		$dataprofile = array(
			'page_title' => 'Daftar Majelis',
			'name' => $this->session->userdata('name'),
			'role' => $this->session->userdata('role'),
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
			'datamajelis' => $this->Majelis_model->getAllList()
		);
            }            
            $content = array(
                    'content' => 'majelis/list'
            );
            $this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function details(){
		$idMajelis = $this->uri->segment(3);
		$this->Majelis_model->setId($idMajelis);
		$dataprofile = array(
			'page_title' => 'Detail Majelis',
			'name' => $this->session->userdata('name'),
			'majelislist' => $this->Majelis_model->getOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'majelis/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function edit(){
		$idmajelis = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			$tgltahbis = trim($_POST['tgltahbis']);
		    list($m, $d, $y) = explode('/', $tgltahbis);
		    $mk = mktime(0, 0, 0, $m, $d, $y);
		    $tgltahbis_disp1 = date('Y-m-d',$mk);
		    
			$this->Majelis_model->setId($idmajelis);				
			//$this->Majelis_model->setNama($_POST['nama']);
			$this->Majelis_model->setTanggalTahbis($tgltahbis_disp1);
			$this->Majelis_model->setWilayah($_POST['wilayah']);
			//$this->Majelis_model->setJabatan($_POST['jabatan']);
			
			$this->Majelis_model->editProfile();
			
			redirect('majelis');
		}else{			
			$this->Majelis_model->setId($idmajelis);
			$dataprofile = array(
				'page_title' => 'Edit Majelis',
				'name' => $this->session->userdata('name'),
				'majelislist' => $this->Majelis_model->getOneSelect(),
				'combowilayah' => $this->Wilayah_model->getWilayahList(),
				'combojabatan' => $this->Jabatan_model->getAllList(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'majelis/edit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function addMajelis(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tgltahbis']) &&
			isset($_POST['nama']) &&
			!($_POST['tgltahbis']) &&
			!($_POST['nama'])){
				$tgltahbis = trim($_POST['tgltahbis']);
			    list($m, $d, $y) = explode('/', $tgltahbis);
			    $mk = mktime(0, 0, 0, $m, $d, $y);
			    $tgltahbis_disp1 = date('Y-m-d',$mk);		    
								
				$this->Majelis_model->setNama($_POST['nama']);
				$this->Majelis_model->setTanggalTahbis($tgltahbis_disp1);
				$this->Majelis_model->setWilayah($_POST['wilayah']);
				//$this->Majelis_model->setJabatan($_POST['jabatan']);			
				
				$this->Majelis_model->tambahProfile();			
				
				redirect('majelis');
			}else{
				$this->load->model('Individu_model');			
				$dataprofile = array(
					'page_title' => 'Tambah Majelis',
					'name' => $this->session->userdata('name'),
					'combowilayah' => $this->Wilayah_model->getWilayahList(),
					'combojabatan' => $this->Jabatan_model->getAllList(),
					'individu' => $this->Individu_model->getList(),
					'role' => $this->session->userdata('role'),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Majelis</div>'			
				);
				$content = array(
					'content' => 'majelis/tambah'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{
			$this->load->model('Individu_model');			
			$dataprofile = array(
				'page_title' => 'Tambah Majelis',
				'name' => $this->session->userdata('name'),
				'combowilayah' => $this->Wilayah_model->getWilayahList(),
				'combojabatan' => $this->Jabatan_model->getAllList(),
				'individu' => $this->Individu_model->getList(),
				'role' => $this->session->userdata('role'),
				'message' => ''			
			);
			$content = array(
				'content' => 'majelis/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function hapusProfileMajelis(){
		$idPendeta = $this->uri->segment(3);
		$this->Majelis_model->setId($idPendeta);
		$this->Majelis_model->deleteProfile();
		redirect('majelis');
	}
}