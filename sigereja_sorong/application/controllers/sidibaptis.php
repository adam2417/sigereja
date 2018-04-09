<?php
class Sidibaptis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sidibaptis_model');
	}
	
	function index(){                
		$dataprofile = array(
			'page_title' => 'Daftar Surat Sidi dan Baptis',
			'name' => $this->session->userdata('name'),
			'listsidibaptis' => $this->Sidibaptis_model->getList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'sidibaptis/list'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function sidibaptisOneSelect(){
		$sidibaptisId = $this->uri->segment(3);
		$this->Sidibaptis_model->setId($sidibaptisId);                
		$dataprofile = array(
			'page_title' => 'Detail Surat Baptis/Sidi',
			'name' => $this->session->userdata('name'),
			'listsidibaptis' => $this->Sidibaptis_model->getOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'sidibaptis/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function tambahSidiBaptis(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tglsurat']) &&
			isset($_POST['tglbaptissidi']) &&
			isset($_POST['nama']) &&
			isset($_POST['tempat_sidibaptis']) &&
			isset($_POST['elm1']) &&
			!($_POST['tglsurat'] == '') &&
			!($_POST['tglbaptissidi'] == '') &&
			!($_POST['nama'] == '') &&
			!($_POST['tempat_sidibaptis'] == '') &&
			!($_POST['elm1'] == '')){			
				$tglsurat = trim($_POST['tglsurat']);
			    list($m, $d, $y) = explode('/', $tglsurat);
			    $mk = mktime(0, 0, 0, $m, $d, $y);
			    $tglsurat_disp1 = date('Y-m-d',$mk);
			    
			    $tglbaptissidi = trim($_POST['tglbaptissidi']);
			    list($m, $d, $y) = explode('/', $tglbaptissidi);
			    $bs = mktime(0, 0, 0, $m, $d, $y);
			    $tglbaptissidi_disp1 = date('Y-m-d',$bs );
			    
				$this->Sidibaptis_model->setNama($_POST['nama']);
				$this->Sidibaptis_model->setTanggalSurat($tglsurat_disp1);
				$this->Sidibaptis_model->setTanggalBaptisSidi($tglbaptissidi_disp1);
				$this->Sidibaptis_model->setTempatBaptisSidi($_POST['tempat_sidibaptis']);
				$this->Sidibaptis_model->setPendeta($_POST['pendeta']);
				$this->Sidibaptis_model->setTipe($_POST['tipe']);
				$this->Sidibaptis_model->setKeterangan($_POST['elm1']);			
				
				$this->Sidibaptis_model->tambahSidiBaptis();			
				
				redirect('sidibaptis');
			}else{
				$this->load->model("Pendeta_model");
                    $this->load->model("Individu_model");
                    $dataprofile = array(
                            'page_title' => 'Tambah Surat Sidi/Baptis',
                            'name' => $this->session->userdata('name'),
                            'pendeta' => $this->Pendeta_model->getPendetaList(),
                            'individu' => $this->Individu_model->getList(),
                            'role' => $this->session->userdata('role'),
                    		'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Surat Sidi/Baptis.</div>'			
                    );
                    $content = array(
                            'content' => 'sidibaptis/tambah'			
                    );
                    $this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{
                    $this->load->model("Pendeta_model");
                    $this->load->model("Individu_model");
                    $dataprofile = array(
                            'page_title' => 'Tambah Surat Sidi/Baptis',
                            'name' => $this->session->userdata('name'),
                            'pendeta' => $this->Pendeta_model->getPendetaList(),
                            'individu' => $this->Individu_model->getList(),
                            'role' => $this->session->userdata('role'),
                    		'message' => ''			
                    );
                    $content = array(
                            'content' => 'sidibaptis/tambah'			
                    );
                    $this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function ubahSidiBaptis(){
		$sidibaptisId = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			
			$tglsurat = trim($_POST['tglsurat']);
		    list($m, $d, $y) = explode('/', $tglsurat);
		    $mk = mktime(0, 0, 0, $m, $d, $y);
		    $tglsurat_disp1 = date('Y-m-d',$mk);
		    
		    $tglbaptissidi = trim($_POST['tglbaptissidi']);
		    list($m, $d, $y) = explode('/', $tglbaptissidi);
		    $bs = mktime(0, 0, 0, $m, $d, $y);
		    $tglbaptissidi_disp1 = date('Y-m-d',$bs);
					
			$this->Sidibaptis_model->setNama($_POST['nama']);
			$this->Sidibaptis_model->setTanggalSurat($tglsurat_disp1);
			$this->Sidibaptis_model->setTanggalBaptisSidi($tglbaptissidi_disp1);
			$this->Sidibaptis_model->setTempatBaptisSidi($_POST['tempat_sidibaptis']);
			$this->Sidibaptis_model->setPendeta($_POST['pendeta']);
			$this->Sidibaptis_model->setTipe($_POST['tipe']);
			$this->Sidibaptis_model->setKeterangan($_POST['elm1']);
			$this->Sidibaptis_model->setId($sidibaptisId);
			
			$this->Sidibaptis_model->ubahSidiBaptis();
			
			redirect('sidibaptis');
		}else{			
                    $this->load->model("Pendeta_model");
                    $this->Sidibaptis_model->setId($sidibaptisId);
                    $dataprofile = array(
                        'page_title' => 'Edit Surat Sidi/Baptis',
                        'name' => $this->session->userdata('name'),
                        'listsidibaptis' => $this->Sidibaptis_model->getOneSelect(),
                        'pendeta' => $this->Pendeta_model->getPendetaList(),
                        'role' => $this->session->userdata('role')			
                    );
                    $content = array(
                            'content' => 'sidibaptis/edit'			
                    );
                    $this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function hapusSidiBaptis(){
		$sidibaptisId = $this->uri->segment(3);
		$this->Sidibaptis_model->setId($sidibaptisId);
		$this->Sidibaptis_model->deleteSidiBaptis();
		redirect('sidibaptis');
	}
}