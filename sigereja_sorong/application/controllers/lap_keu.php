<?php
class Lap_keu extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Lap_keu_model');
	}
	
	function index(){
		$dataprofile = array(
			'page_title' => 'Rekap Laporan Keuangan',
			'name' => $this->session->userdata('name'),
			'listlap_keu' => $this->Lap_keu_model->getLap_keuList(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'laporan_keuangan/list'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function lap_keuOneSelect(){
		$lap_keuId = $this->uri->segment(3);
		$this->Lap_keu_model->setId($lap_keuId);
		$dataprofile = array(
			'page_title' => 'Detail Laporan Keuangan',
			'name' => $this->session->userdata('name'),
			'listlap_keu' => $this->Lap_keu_model->getLap_keuOneSelect(),
			'role' => $this->session->userdata('role')			
		);
		$content = array(
			'content' => 'laporan_keuangan/detail'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
	
	function tambahLap_keu(){
		if(isset($_POST['btnSave'])){
			if(isset($_POST['tgllap_keu']) &&
			isset($_POST['jum_pemasukan']) &&
			isset($_POST['jum_pengeluaran']) &&
			isset($_POST['saldo_akhir']) &&
			isset($_POST['elm1']) &&
			!($_POST['tgllap_keu'] == '') &&
			!($_POST['jum_pemasukan'] == '') &&
			!($_POST['jum_pengeluaran'] == '') &&
			!($_POST['saldo_akhir'] == '') &&
			!($_POST['elm1'] == '')){		
				$tgllap_keu = trim($_POST['tgllap_keu']);
			    list($m, $d, $y) = explode('/', $tgllap_keu);
			    $mk = mktime(0, 0, 0, $m, $d, $y);
			    $tgllap_keu_disp1 = date('Y-m-d',$mk);
							
				$this->Lap_keu_model->setTanggal($tgllap_keu_disp1);
				$this->Lap_keu_model->setJum_pemasukan($_POST['jum_pemasukan']);
				$this->Lap_keu_model->setJum_pengeluaran($_POST['jum_pengeluaran']);
				$this->Lap_keu_model->setSaldo_akhir($_POST['saldo_akhir']);
				$this->Lap_keu_model->setKeterangan($_POST['elm1']);
				
				$this->Lap_keu_model->tambahLap_keu();			
				
				redirect('lap_keu');
			}else{
				$dataprofile = array(
					'page_title' => 'Tambah Rekap Laporan Keungan',
					'name' => $this->session->userdata('name'),
					'role' => $this->session->userdata('role'),
					'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Data Laporan Keuangan</div>'			
				);
				$content = array(
					'content' => 'laporan_keuangan/tambah'			
				);
				$this->template->load('template/def_template',$content,$dataprofile);
			}
		}else{			
			$dataprofile = array(
				'page_title' => 'Tambah Rekap Laporan Keungan',
				'name' => $this->session->userdata('name'),
				'role' => $this->session->userdata('role'),
				'message' => ''			
			);
			$content = array(
				'content' => 'laporan_keuangan/tambah'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
	
	
	function ubahLap_keu(){
		$idLap_keu = $this->uri->segment(3);		
		if(isset($_POST['btnSave'])){
			
			$tgllap_keu = trim($_POST['tgllap_keu']);
		    list($m, $d, $y) = explode('/', $tgllap_keu);
		    $mk = mktime(0, 0, 0, $m, $d, $y);
		    $tgllap_keu_disp1 = date('Y-m-d',$mk);
					
			$this->Lap_keu_model->setTanggal($tgllap_keu_disp1);
			$this->Lap_keu_model->setJum_pemasukan($_POST['jum_pemasukan']);
			$this->Lap_keu_model->setJum_pengeluaran($_POST['jum_pengeluaran']);
			$this->Lap_keu_model->setSaldo_akhir($_POST['saldo_akhir']);
			$this->Lap_keu_model->setKeterangan($_POST['elm1']);
			$this->Lap_keu_model->setId($idLap_keu);
			
			$this->Lap_keu_model->ubahLap_keu();
			
			redirect('lap_keu');
		}else{			
			$this->Lap_keu_model->setId($idLap_keu);
			$dataprofile = array(
				'page_title' => 'Edit Laporan Keuangan',
				'name' => $this->session->userdata('name'),
				'listlap_keu' => $this->Lap_keu_model->getLap_keuOneSelect(),
				'role' => $this->session->userdata('role')			
			);
			$content = array(
				'content' => 'laporan_keuangan/edit'			
			);
			$this->template->load('template/def_template',$content,$dataprofile);
		}
	}
        
        function hapus(){
            $idLap_keu = $this->uri->segment(3);
            $this->Lap_keu_model->setId($idLap_keu);
            $this->Lap_keu_model->hapusLaporan();
            redirect('lap_keu');
        }
		
}

