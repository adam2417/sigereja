<?php

class Pendeta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pendeta_model');
    }

    function index() {
        $dataprofile = array(
            'page_title' => 'Daftar Pendeta',
            'name' => $this->session->userdata('name'),
            'pendetalist' => $this->Pendeta_model->getPendetaList(),
            'role' => $this->session->userdata('role')
        );
        $content = array(
            'content' => 'pendeta/pendetalist'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function getDetailPendeta() {
        $idPendeta = $this->uri->segment(3);
        $this->Pendeta_model->setId($idPendeta);
        $dataprofile = array(
            'page_title' => 'Detail Pendeta',
            'name' => $this->session->userdata('name'),
            'pendetalist' => $this->Pendeta_model->getPendetaOneSelect(),
            'foto' => $this->Pendeta_model->get_images(),
            'role' => $this->session->userdata('role')
        );
        $content = array(
            'content' => 'pendeta/detail'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function ubahPendeta() {
        $idPendeta = $this->uri->segment(3);
        if (isset($_POST['btnSave'])) {
            $this->Pendeta_model->setId($idPendeta);
            $tgltahbis = trim($_POST['tgltahbis']);
            list($m, $d, $y) = explode('/', $tgltahbis);
            $mk = mktime(0, 0, 0, $m, $d, $y);
            $tgltahbis_disp1 = date('Y-m-d', $mk);

            $emiritus = trim($_POST['emiritus']);
            list($m, $d, $y) = explode('/', $emiritus);
            $emiritus = mktime(0, 0, 0, $m, $d, $y);
            $emiritus_disp1 = date('Y-m-d', $emiritus);

            $this->Pendeta_model->setTanggalTahbis($tgltahbis_disp1);
            $this->Pendeta_model->setEmiritus($emiritus_disp1);
            $this->Pendeta_model->setBiografi($_POST['elm1']);

            if (isset($_FILES['userfile'])) {
                $this->Pendeta_model->setFoto($_FILES['userfile']['name']);
            }
            $this->Pendeta_model->do_upload();
            $this->Pendeta_model->ubahPendeta();

            redirect('pendeta');
        } else {
            $this->Pendeta_model->setId($idPendeta);
            $dataprofile = array(
                'page_title' => 'Edit Pendeta',
                'name' => $this->session->userdata('name'),
                'pendetalist' => $this->Pendeta_model->getPendetaOneSelect(),
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'pendeta/profiledit'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function tambahPendeta() {
        if (isset($_POST['btnSave'])) {
        	if(isset($_POST['tgltahbis']) &&
        	isset($_POST['emiritus']) &&
        	isset($_POST['nama']) &&
        	isset($_POST['elm1']) &&
        	!($_POST['tgltahbis'] == '') &&
        	!($_POST['emiritus'] == '') &&
        	!($_POST['nama'] == '') &&
        	!($_POST['elm1'] == '')){
	            $tgltahbis = trim($_POST['tgltahbis']);
	            list($m, $d, $y) = explode('/', $tgltahbis);
	            $mk = mktime(0, 0, 0, $m, $d, $y);
	            $tgltahbis_disp1 = date('Y-m-d', $mk);
	
	            $emiritus = trim($_POST['emiritus']);
	            list($m, $d, $y) = explode('/', $emiritus);
	            $emiritus = mktime(0, 0, 0, $m, $d, $y);
	            $emiritus_disp1 = date('Y-m-d', $emiritus);
	
	            $this->Pendeta_model->setNama($_POST['nama']);
	            $this->Pendeta_model->setTanggalTahbis($tgltahbis_disp1);
	            $this->Pendeta_model->setEmiritus($emiritus_disp1);
	            $this->Pendeta_model->setBiografi($_POST['elm1']);
	            $this->Pendeta_model->setFoto($_FILES['userfile']['name']);
	
	            $this->Pendeta_model->do_upload();
	            $this->Pendeta_model->tambahPendeta();
	
	            redirect('pendeta');
        	}else{
        		$this->load->model('Individu_model');
	            $dataprofile = array(
	                'page_title' => 'Tambah Pendeta',
	                'name' => $this->session->userdata('name'),
	                'individu' => $this->Individu_model->getList(),
	                'role' => $this->session->userdata('role'),
	            	'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Pendeta</div>'
	            );
	            $content = array(
	                'content' => 'pendeta/tambah'
	            );
	            $this->template->load('template/def_template', $content, $dataprofile);
        	}
        } else {
            $this->load->model('Individu_model');
            $dataprofile = array(
                'page_title' => 'Tambah Pendeta',
                'name' => $this->session->userdata('name'),
                'individu' => $this->Individu_model->getList(),
            	'message' => '',
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'pendeta/tambah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function hapusPendeta() {
        $idPendeta = $this->uri->segment(3);
        $this->Pendeta_model->setId($idPendeta);
        $this->Pendeta_model->hapusPendeta();
        redirect('pendeta');
    }

}