<?php

class Artikel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
    }

    function index() {
        if (isset($_POST["btnview"])) {
            if (isset($_POST['searchDate']) && !($_POST['searchDate'] == '')) {
                $tglartikel = trim($_POST['searchDate']);
                list($m, $d, $y) = explode('/', $tglartikel);
                $mk = mktime(0, 0, 0, $m, $d, $y);
                $tglartikel_disp1 = date('Y-m-d', $mk);

                $this->Artikel_model->setTanggal($tglartikel_disp1);

                $dataprofile = array(
                    'page_title' => 'Daftar Artikel',
                    'name' => $this->session->userdata('name'),
                    'artikellist' => $this->Artikel_model->getArtikelFindByDate(),
                    'role' => $this->session->userdata('role')
                );
                $content = array(
                    'content' => 'artikel/list'
                );
            } else {
                $dataprofile = array(
                    'page_title' => 'Daftar Artikel',
                    'name' => $this->session->userdata('name'),
                    'artikellist' => $this->Artikel_model->getList(),
                    'role' => $this->session->userdata('role')
                );
                $content = array(
                    'content' => 'artikel/list'
                );
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Daftar Artikel',
                'name' => $this->session->userdata('name'),
                'artikellist' => $this->Artikel_model->getList(),
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'artikel/list'
            );
        }
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function artikelOneSelect() {
        $artikelId = $this->uri->segment(3);
        $this->Artikel_model->setId($artikelId);
        $dataprofile = array(
            'page_title' => 'Detail Artikel',
            'name' => $this->session->userdata('name'),
            'artikellist' => $this->Artikel_model->getOneSelect(),
            'role' => $this->session->userdata('role')
        );
        $content = array(
            'content' => 'artikel/detail'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function tambahArtikel() {
        if (isset($_POST['btnSave'])) {
            if (isset($_POST['judul']) && isset($_POST['deskripsi']) && !($_POST['judul'] == "") && !($_POST['deskripsi'] == "")) {
                $dateNow = date('Y-m-d H:i:s');
                $this->Artikel_model->setJudulArtikel($_POST['judul']);
                $this->Artikel_model->setTanggal($dateNow);
                $this->Artikel_model->setDeskripsi($_POST['deskripsi']);
                $this->Artikel_model->setUploader($this->session->userdata('name'));

                $this->Artikel_model->tambahArtikel();

                redirect('artikel');
            } else {
                $dataprofile = array(
                    'page_title' => 'Tambah Artikel',
                    'name' => $this->session->userdata('name'),
                    'role' => $this->session->userdata('role'),
                    'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Artikel</div>'
                );
                $content = array(
                    'content' => 'artikel/tambah'
                );
                $this->template->load('template/def_template', $content, $dataprofile);
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Tambah Artikel',
                'name' => $this->session->userdata('name'),
                'role' => $this->session->userdata('role'),
                'message' => ''
            );
            $content = array(
                'content' => 'artikel/tambah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function ubahArtikel() {
        $idartikel = $this->uri->segment(3);
        if (isset($_POST['btnSave'])) {
            $this->Artikel_model->setId($idartikel);
            $this->Artikel_model->setJudulArtikel($_POST['judul']);
            $this->Artikel_model->setDeskripsi($_POST['deskripsi']);

            $this->Artikel_model->ubahArtikel();

            redirect('artikel');
        } else {
            $this->Artikel_model->setId($idartikel);
            $dataprofile = array(
                'page_title' => 'Edit Renungan',
                'name' => $this->session->userdata('name'),
                'artikellist' => $this->Artikel_model->getOneSelect(),
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'artikel/ubah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function hapusArtikel() {
        $idartikel = $this->uri->segment(3);
        $this->Artikel_model->setId($idartikel);
        $this->Artikel_model->deleteArtikel();
        redirect('artikel');
    }

}