<?php
class Atestasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Atestasi_model');
	}
	
	function index(){
		$dataprofile = array(
			'page_title' => 'Daftar Surat Atestasi',
			'name' => $this->session->userdata('name'),
			'listatestasi' => $this->Atestasi_model->getList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'atestasi/list'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function atestasiOneSelect(){
		$atestasiId = $this->uri->segment(3);
		$this->Atestasi_model->setId($atestasiId);
		$dataprofile = array(
			'page_title' => 'Detail Surat Atestasi',
			'name' => $this->session->userdata('name'),
			'listatestasi' => $this->Atestasi_model->getOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'atestasi/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function tambahAtestasi(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tglsurat']) &&
			isset($_POST['tglatestasi']) &&
			isset($_POST['tglmasukkeluar']) &&
			isset($_POST['gereja_tujuanasal']) &&
			isset($_POST['almttinggal']) &&
			($_POST['tglsurat'] != '') &&
			($_POST['tglatestasi'] != '') &&
			($_POST['tglmasukkeluar'] != '') &&
			($_POST['gereja_tujuanasal'] != '') &&
			($_POST['almttinggal'] != '')){			
				$tglsurat = trim($_POST['tglsurat']);
			    list($m, $d, $y) = explode('/', $tglsurat);
			    $mk = mktime(0, 0, 0, $m, $d, $y);
			    $tglsurat_disp1 = date('Y-m-d',$mk);
			    
			    $tglatestasi = trim($_POST['tglatestasi']);
			    list($m, $d, $y) = explode('/', $tglatestasi);
			    $bs = mktime(0, 0, 0, $m, $d, $y);
			    $tglatestasi_disp1 = date('Y-m-d',$bs );
			    
			    $tglmasukkeluar = trim($_POST['tglmasukkeluar']);
			    list($m, $d, $y) = explode('/', $tglmasukkeluar);
			    $bs = mktime(0, 0, 0, $m, $d, $y);
			    $tglmasukkeluar_disp1 = date('Y-m-d',$bs );
			    
				$this->Atestasi_model->setTanggalSurat($tglsurat_disp1);
				$this->Atestasi_model->setTanggalAtestasiKeluarMasuk($tglatestasi_disp1);
				$this->Atestasi_model->setGerejaTujuanAsal($_POST['gereja_tujuanasal']);
				$this->Atestasi_model->setAlamatGerejaTujuanAsal($_POST['almtgerejatujuanasal']);
				$this->Atestasi_model->setAlamatTinggal($_POST['almttinggal']);
				$this->Atestasi_model->setTanggalMasukKeluar($tglmasukkeluar_disp1);
				$this->Atestasi_model->setIndividu($_POST['individu']);
				$this->Atestasi_model->setKeluarga($_POST['keluarga']);
	
				$tipeAtestasi = $_POST['tipe'];
				if($tipeAtestasi == '0'){
					$this->load->model('Individu_model');
					$this->Individu_model->setId($_POST['individu']);
					$this->Individu_model->deleteIndividu();
					
					$this->load->model('Keluarga_model');
					$this->Keluarga_model->setId($_POST['keluarga']);
					$this->Keluarga_model->deleteKeluarga();
				}
				
				$this->Atestasi_model->tambahAtestasi();			
				
				redirect('atestasi');
			}else{
				$this->load->model('Individu_model');
				$this->load->model('Keluarga_model');			
				$dataprofile = array(
					'page_title' => 'Tambah Surat Atestasi',
					'name' => $this->session->userdata('name'),
					'individu' => $this->Individu_model->getList(),
					'keluarga' => $this->Keluarga_model->getList(),
					'role' => $this->session->userdata('role'),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Surat Atestasi</div>'			
				);
				$content = array(
					'content' => 'atestasi/tambah'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{
			$this->load->model('Individu_model');
			$this->load->model('Keluarga_model');			
			$dataprofile = array(
				'page_title' => 'Tambah Surat Atestasi',
				'name' => $this->session->userdata('name'),
				'individu' => $this->Individu_model->getList(),
				'keluarga' => $this->Keluarga_model->getList(),
				'message' => '',
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'atestasi/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function ubahAtestasi(){
		$atestasiId = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			$tglsurat = trim($_POST['tglsurat']);
		    list($m, $d, $y) = explode('/', $tglsurat);
		    $mk = mktime(0, 0, 0, $m, $d, $y);
		    $tglsurat_disp1 = date('Y-m-d',$mk);
		    
		    $tglatestasi = trim($_POST['tglatestasi']);
		    list($m, $d, $y) = explode('/', $tglatestasi);
		    $bs = mktime(0, 0, 0, $m, $d, $y);
		    $tglatestasi_disp1 = date('Y-m-d',$bs );
		    
		    $tglmasukkeluar = trim($_POST['tglmasukkeluar']);
		    list($m, $d, $y) = explode('/', $tglmasukkeluar);
		    $bs = mktime(0, 0, 0, $m, $d, $y);
		    $tglmasukkeluar_disp1 = date('Y-m-d',$bs );
		    
		    $this->Atestasi_model->setId($atestasiId);
			$this->Atestasi_model->setTanggalSurat($tglsurat_disp1);
			$this->Atestasi_model->setTanggalAtestasiKeluarMasuk($tglatestasi_disp1);
			$this->Atestasi_model->setGerejaTujuanAsal($_POST['gereja_tujuanasal']);
			$this->Atestasi_model->setAlamatGerejaTujuanAsal($_POST['almtgerejatujuanasal']);
			$this->Atestasi_model->setAlamatTinggal($_POST['almttinggal']);
			$this->Atestasi_model->setTanggalMasukKeluar($tglmasukkeluar_disp1);			
			
			$this->Atestasi_model->ubahAtestasi();
			
			redirect('atestasi');
		}else{			
			$this->Atestasi_model->setId($atestasiId);
			$dataprofile = array(
				'page_title' => 'Edit Surat Atestasi',
				'name' => $this->session->userdata('name'),
				'listatestasi' => $this->Atestasi_model->getOneSelect(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'atestasi/edit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function hapusAtestasi(){
		$sidibaptisId = $this->uri->segment(3);
		$this->Atestasi_model->setId($sidibaptisId);
		$this->Atestasi_model->deleteAtestasi();
		redirect('atestasi');
	}
}