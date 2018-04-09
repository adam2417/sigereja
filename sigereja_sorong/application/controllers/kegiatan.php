<?php
class Kegiatan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Kegiatan_model');
	}
	
	function index(){
		$dataprofile = array(
			'page_title' => 'Kegiatan Gereja',
			'name' => $this->session->userdata('name'),
			'listkegiatan' => $this->Kegiatan_model->getKegiatanList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'kegiatan/listkegiatan'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function kegiatanOneSelect(){
		$kegiatanId = $this->uri->segment(3);
		$this->Kegiatan_model->setId($kegiatanId);
		$dataprofile = array(
			'page_title' => 'Detail Kegiatan',
			'name' => $this->session->userdata('name'),
			'listkegiatan' => $this->Kegiatan_model->getKegiatanOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'kegiatan/detailkegiatan'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function tambahKegiatan(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tglkeg']) &&
			isset($_POST['nama']) &&
			isset($_POST['elm1']) &&
			!($_POST['tglkeg'] == '') &&
			!($_POST['nama'] == '') &&
			!($_POST['elm1'] == '')){
				$tglkeg = trim($_POST['tglkeg']);
				$jam_keg = trim($_POST['jam']);
			    list($m, $d, $y) = explode('/', $tglkeg);
			    list($h, $min) = explode(':',$jam_keg);
			    $mk = mktime($h, $min, 0, $m, $d, $y);
			    $tglkeg_disp1 = date('Y-m-d H:i',$mk);
			    
				$this->Kegiatan_model->setNama($_POST['nama']);
				$this->Kegiatan_model->setWaktu($tglkeg_disp1);
				$this->Kegiatan_model->setTempat($_POST['elm1']);
				$this->Kegiatan_model->setKoordinasi($_POST['koordinasi']);
				
				$this->Kegiatan_model->tambahKegiatan();			
				
				redirect('kegiatan');
			}else{
				$this->load->model('Majelis_model');			
				$dataprofile = array(
					'page_title' => 'Tambah Kegiatan',
					'name' => $this->session->userdata('name'),
					'role' => $this->session->userdata('role'),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Kegiatan</div>',
					'majelis' => $this->Majelis_model->getAllList()			
				);
				$content = array(
					'content' => 'kegiatan/tambahkegiatan'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{
			$this->load->model('Majelis_model');			
			$dataprofile = array(
				'page_title' => 'Tambah Kegiatan',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'message' => '',
				'majelis' => $this->Majelis_model->getAllList()			
			);
			$content = array(
				'content' => 'kegiatan/tambahkegiatan'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function ubahKegiatan(){
		$idKegiatan = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			$jam_keg = trim($_POST['jam']);
			$tglkeg = trim($_POST['tglkeg']);
		    list($m, $d, $y) = explode('/', $tglkeg);
		    list($h, $min) = explode(':',$jam_keg);
		    $mk = mktime($h, $min, 0, $m, $d, $y);
		    $tglkeg_disp1 = date('Y-m-d H:i',$mk);
					
			$this->Kegiatan_model->setNama($_POST['nama']);
			$this->Kegiatan_model->setWaktu($tglkeg_disp1);
			$this->Kegiatan_model->setTempat($_POST['elm1']);
			$this->Kegiatan_model->setKoordinasi($_POST['koordinasi']);
			$this->Kegiatan_model->setId($idKegiatan);
			
			$this->Kegiatan_model->ubahKegiatan();
			
			redirect('kegiatan');
		}else{			
			$this->Kegiatan_model->setId($idKegiatan);
			$this->load->model('Majelis_model');
			$dataprofile = array(
				'page_title' => 'Edit Kegiatan',
				'name' => $this->session->userdata('name'),
				'listkegiatan' => $this->Kegiatan_model->getKegiatanOneSelect(),
				'majelis' => $this->Majelis_model->getAllList(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'kegiatan/editkegiatan'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}	
	
	function hapusKegiatan(){
		$idKegiatan = $this->uri->segment(3);
		$this->Kegiatan_model->setId($idKegiatan);
		$this->Kegiatan_model->deleteKegiatan();
		redirect('kegiatan');
	}
	
}