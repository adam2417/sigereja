<?php
class Pa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Pa_model');
		$this->load->model('Wilayah_model');
                $this->load->model('Keluarga_model');
	}
	
	function index(){            
		$dataprofile = array(
			'page_title' => 'PA',
			'name' => $this->session->userdata('name'),
			'listpa' => $this->Pa_model->getPaList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'pa/listpa'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function paOneSelect(){
		$paId = $this->uri->segment(3);
		$this->Pa_model->setId($paId);
		$dataprofile = array(
			'page_title' => 'Detail PA',
			'name' => $this->session->userdata('name'),
			'listpa' => $this->Pa_model->getPaOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'pa/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function tambahPa(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tglpa']) &&
			!($_POST['tglpa'] == '')){			
				$tglpa = trim($_POST['tglpa']);
				$jampa = trim($_POST['jam']);
			    list($m, $d, $y) = explode('/', $tglpa);
			    list($h, $min) = explode(':',$jampa);
			    $mk = mktime($h, $min, 0, $m, $d, $y);
			    $tglpa_disp1 = date('Y-m-d H:i',$mk);
							
				$this->Pa_model->setWilayah($_POST['wilayah']);
				$this->Pa_model->setKeluarga($_POST['keluarga']);
				$this->Pa_model->setTgl_kebaktian($tglpa_disp1);
				$this->Pa_model->setPemimpin($_POST['pemimpin']);
				$this->Pa_model->setPendamping($_POST['pendamping']);
				
				$this->Pa_model->tambahPa();			
				
				redirect('pa');
			}else{
				$this->load->model('Majelis_model');			
				$dataprofile = array(
					'page_title' => 'Tambah Pa',
					'name' => $this->session->userdata('name'),
					'combowilayah' => $this->Wilayah_model->getWilayahList(),
					'role' => $this->session->userdata('role'),
	                'combokeluarga' => $this->Keluarga_model->getList(),
					'majelis' => $this->Majelis_model->getAllList(),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Kegiatan PA</div>'			
				);
				$content = array(
					'content' => 'pa/tambah'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{
			$this->load->model('Majelis_model');			
			$dataprofile = array(
				'page_title' => 'Tambah Pa',
				'name' => $this->session->userdata('name'),
				'combowilayah' => $this->Wilayah_model->getWilayahList(),
				'role' => $this->session->userdata('role'),
                'combokeluarga' => $this->Keluarga_model->getList(),
				'majelis' => $this->Majelis_model->getAllList(),
				'message' => ''	
			);
			$content = array(
				'content' => 'pa/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function ubahPa(){
		$idPa = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			$tglpa = trim($_POST['tglpa']);
			$jampa = trim($_POST['jam']);
		    list($m, $d, $y) = explode('/', $tglpa);
		    list($h, $min) = explode(':',$jampa);
		    $mk = mktime($h, $min, 0, $m, $d, $y);
		    $tglpa_disp1 = date('Y-m-d H:i',$mk);
					
			$this->Pa_model->setWilayah($_POST['wilayah']);
			$this->Pa_model->setKeluarga($_POST['keluarga']);
			$this->Pa_model->setTgl_kebaktian($tglpa_disp1);
			$this->Pa_model->setPemimpin($_POST['pemimpin']);
			$this->Pa_model->setPendamping($_POST['pendamping']);
			$this->Pa_model->setId($idPa);
			
			$this->Pa_model->ubahPa();
			
			redirect('pa');
		}else{			
			$this->Pa_model->setId($idPa);
			$this->load->model('Majelis_model');
			$dataprofile = array(
				'page_title' => 'Edit Pa',
				'name' => $this->session->userdata('name'),
				'listpa' => $this->Pa_model->getPaOneSelect(),
				'combowilayah' => $this->Wilayah_model->getWilayahList(),
				'majelis' => $this->Majelis_model->getAllList(),
                'combokeluarga' => $this->Keluarga_model->getList(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'pa/edit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	function hapusPa(){
		$idPa = $this->uri->segment(3);
		$this->Pa_model->setId($idPa);
		$this->Pa_model->deletePa();
		redirect('pa');
	}
	
}

?>