<?php
class Keluarga extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Keluarga_model');
		$this->load->model('Wilayah_model');
        $this->load->model('Propinsi_model');
        $this->load->model('Kabupaten_model');
        $this->load->model('Distrik_model');
        $this->load->model('Klasis_model');
        $this->load->model('Individu_model');
        $this->load->model('Lingkungan_model');
        $this->load->model('Jemaat_model');
        $this->load->model('Sektor_model');
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
        $this->Individu_model->setKeluarga($idKeluarga);
		$dataprofile = array(
			'page_title' => 'Detail Keluarga',
			'name' => $this->session->userdata('name'),
			'keluargalist' => $this->Keluarga_model->getOneSelect(),
			'wilayahlist' => $this->Wilayah_model->getWilayahList(),
            'propinsilist' => $this->Propinsi_model->getPropinsiList(),
            'kabkotalist' => $this->Kabupaten_model->getKabupatenList(),
            'distriklist' => $this->Distrik_model->getDistrikList(),
            'klasislist' => $this->Klasis_model->getKlasisList(),
            'lingklist' => $this->Lingkungan_model->getLingkunganList(),
            'jemaatlist' => $this->Jemaat_model->getJemaatList(),
            'sektorlist' => $this->Sektor_model->getSektorList(),
            'individulist' => $this->Individu_model->getSelectByKeluarga(),
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
            $this->Keluarga_model->setKabupaten($_POST['kab']);
			$this->Keluarga_model->setAlamat($_POST['almt']);
			$this->Keluarga_model->setNoTelp($_POST['notelp']);
            $this->Keluarga_model->setPropinsi($_POST['prop']);
            $this->Keluarga_model->setKabupaten($_POST['kab']);
            $this->Keluarga_model->setDistrik($_POST['distrik']);
            $this->Keluarga_model->setKlasis($_POST['klasis']);
            $this->Keluarga_model->setLingkungan($_POST['lingkungan']);
            $this->Keluarga_model->setJemaat($_POST['jemaat']);
            $this->Keluarga_model->setSektor($_POST['sektor']);
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
                'propinsilist' => $this->Propinsi_model->getPropinsiList(),
                'kabkotalist' => $this->Kabupaten_model->getKabupatenList(),
                'distriklist' => $this->Distrik_model->getDistrikList(),
                'klasislist' => $this->Klasis_model->getKlasisList(),
                'lingklist' => $this->Lingkungan_model->getLingkunganList(),
                'jemaatlist' => $this->Jemaat_model->getJemaatList(),
                'sektorlist' => $this->Sektor_model->getSektorList(),
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
                $this->Keluarga_model->setPropinsi($_POST['prop']);
                $this->Keluarga_model->setKabupaten($_POST['kab']);
                $this->Keluarga_model->setDistrik($_POST['distrik']);
                $this->Keluarga_model->setKlasis($_POST['klasis']);
                $this->Keluarga_model->setLingkungan($_POST['lingkungan']);
                $this->Keluarga_model->setJemaat($_POST['jemaat']);
                $this->Keluarga_model->setSektor($_POST['sektor']);
				
				$this->Keluarga_model->tambahKeluarga();
				
				redirect('keluarga');
			}else{
				$dataprofile = array(
					'page_title' => 'Tambah Data Keluarga',
					'name' => $this->session->userdata('name'),
					'role' => $this->session->userdata('role'),
					'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                    'propinsilist' => $this->Propinsi_model->getPropinsiList(),
                    'kabkotalist' => $this->Kabupaten_model->getKabupatenList(),
                    'distriklist' => $this->Distrik_model->getDistrikList(),
                    'klasislist' => $this->Klasis_model->getKlasisList(),
                    'lingklist' => $this->Lingkungan_model->getLingkunganList(),
                    'jemaatlist' => $this->Jemaat_model->getJemaatList(),
                    'sektorlist' => $this->Sektor_model->getSektorList(),
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
                'propinsilist' => $this->Propinsi_model->getPropinsiList(),
                'kabkotalist' => $this->Kabupaten_model->getKabupatenList(),
                'distriklist' => $this->Distrik_model->getDistrikList(),
                'klasislist' => $this->Klasis_model->getKlasisList(),
                'lingklist' => $this->Lingkungan_model->getLingkunganList(),
                'jemaatlist' => $this->Jemaat_model->getJemaatList(),
                'sektorlist' => $this->Sektor_model->getSektorList(),
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