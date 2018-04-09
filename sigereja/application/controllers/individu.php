<?php

class Individu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Individu_model');
        $this->load->model('Wilayah_model');
        $this->load->model('Statusnikah_model');
    }

    function index() {
        if (isset($_POST['btnview'])) {
            if (isset($_POST['wilayah'])) {
                if (!($_POST['wilayah'] == 'all')) {
                    if (isset($_POST['search_name']) && !($_POST['search_name'] == '')) {
                        $individu = $_POST['search_name'];
                        $wilayah = $_POST['wilayah'];
                        $this->Individu_model->setNama($individu);
                        $this->Individu_model->setWilayah($wilayah);
                        $dataprofile = array(
                            'page_title' => 'Daftar Individu',
                            'name' => $this->session->userdata('name'),
                            'individulist' => $this->Individu_model->getSelectByWilayahAndName(),
                            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                            'role' => $this->session->userdata('role')
                        );
                    } else {
                        $wilayah = $_POST['wilayah'];
                        $this->Individu_model->setWilayah($wilayah);
                        $dataprofile = array(
                            'page_title' => 'Daftar Individu',
                            'name' => $this->session->userdata('name'),
                            'individulist' => $this->Individu_model->getSelectByWilayah(),
                            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                            'role' => $this->session->userdata('role')
                        );
                    }
                } else {
                    if (isset($_POST['search_name']) && !($_POST['search_name'] == '')) {
                        $individu = $_POST['search_name'];
                        $this->Individu_model->setNama($individu);
                        $dataprofile = array(
                            'page_title' => 'Daftar Individu',
                            'name' => $this->session->userdata('name'),
                            'individulist' => $this->Individu_model->getListByName(),
                            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                            'role' => $this->session->userdata('role')
                        );
                    } else if ($_POST['wilayah'] == 'all') {
                        $dataprofile = array(
                            'page_title' => 'Daftar Individu',
                            'name' => $this->session->userdata('name'),
                            'individulist' => $this->Individu_model->getList(),
                            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                            'role' => $this->session->userdata('role')
                        );
                    } else {
                        $wilayah = $_POST['wilayah'];
                        $this->Individu_model->setWilayah($wilayah);
                        $dataprofile = array(
                            'page_title' => 'Daftar Individu',
                            'name' => $this->session->userdata('name'),
                            'individulist' => $this->Individu_model->getSelectByWilayah(),
                            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                            'role' => $this->session->userdata('role')
                        );
                    }
                }
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Daftar Individu',
                'name' => $this->session->userdata('name'),
                'individulist' => $this->Individu_model->getList(),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'role' => $this->session->userdata('role')
            );
        }
        $content = array(
            'content' => 'individu/list'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function getDetailIndividu() {
        $idIndividu = $this->uri->segment(3);
        $this->Individu_model->setId($idIndividu);

        $dataprofile = array(
            'page_title' => 'Detail Individu',
            'name' => $this->session->userdata('name'),
            'individulist' => $this->Individu_model->getOneSelect(),
            'wilayahlist' => $this->Wilayah_model->getWilayahList(),
            'status_nikah' => $this->Statusnikah_model->getStatusNikahList(),
            'foto' => $this->Individu_model->get_images(),
            'role' => $this->session->userdata('role')
        );
        $content = array(
            'content' => 'individu/detail'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function ubahIndividu() {
        $idIndividu = $this->uri->segment(3);
        if (isset($_POST['btnSave'])) {
            $this->Individu_model->setNama($_POST['nama']);
            $this->Individu_model->setWilayah($_POST['wilayah']);
            $this->Individu_model->setAlamat($_POST['almt']);
            $this->Individu_model->setJenisKelamin($_POST['jenkel']);

            $tgllhr = trim($_POST['tgllahir']);
            list($m, $d, $y) = explode('/', $tgllhr);
            $mk = mktime(0, 0, 0, $m, $d, $y);
            $tgllhr_disp1 = date('Y-m-d', $mk);
            $this->Individu_model->setTanggalLahir($tgllhr_disp1);

            $this->Individu_model->setTempatLahir($_POST['tmplahir']);
            $this->Individu_model->setPekerjaan($_POST['pekerjaan']);
            $this->Individu_model->setStatusNikah($_POST['statusnikah']);
            $this->Individu_model->setBaptis($_POST['baptis']);
            $this->Individu_model->setSidi($_POST['sidi']);
            $life = isset($_POST['wafat']) ? '0' : '1';
            $this->Individu_model->setLife($life);

            if (isset($_FILES['userfile'])) {
                $this->Individu_model->setFoto($_FILES['userfile']['name']);
            }

            $this->Individu_model->setTelp($_POST['notelp']);
            $this->Individu_model->setId($idIndividu);

            $this->Individu_model->do_upload();
            $this->Individu_model->ubahIndividu();

            redirect('individu');
        } else {
            $this->Individu_model->setId($idIndividu);
            $dataprofile = array(
                'page_title' => 'Detail Individu',
                'name' => $this->session->userdata('name'),
                'individulist' => $this->Individu_model->getOneSelect(),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'status_nikah' => $this->Statusnikah_model->getStatusNikahList(),
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'individu/edit'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function tambahIndividu() {
        if (isset($_POST['btnSave'])) {
            if (isset($_POST['nama']) &&
                    isset($_POST['almt']) &&
                    isset($_POST['tmplahir']) &&
                    isset($_POST['pekerjaan']) &&
                    !($_POST['nama'] == '') &&
                    !($_POST['almt'] == '') &&
                    !($_POST['tmplahir'] == '') &&
                    !($_POST['pekerjaan'] == '')) {
                $this->Individu_model->setNama($_POST['nama']);
                $this->Individu_model->setWilayah($_POST['wilayah']);
                $this->Individu_model->setAlamat($_POST['almt']);
                $this->Individu_model->setJenisKelamin($_POST['jenkel']);
                $this->Individu_model->setTempatLahir($_POST['tmplahir']);

                $tgllhr = trim($_POST['tgllahir']);
                list($m, $d, $y) = explode('/', $tgllhr);
                $mk = mktime(0, 0, 0, $m, $d, $y);
                $tgllhr_disp1 = date('Y-m-d', $mk);
                $this->Individu_model->setTanggalLahir($tgllhr_disp1);

                $this->Individu_model->setPekerjaan($_POST['pekerjaan']);
                $this->Individu_model->setStatusNikah($_POST['statusnikah']);
                $this->Individu_model->setBaptis($_POST['baptis']);
                $this->Individu_model->setSidi($_POST['sidi']);
                $life = isset($_POST['wafat']) ? '0' : '1';
                $this->Individu_model->setLife($life);
                $this->Individu_model->setFoto($_FILES['userfile']['name']);
                $this->Individu_model->setTelp($_POST['notelp']);

                $this->Individu_model->do_upload();
                $this->Individu_model->tambahIndividu();

                redirect('individu');
            } else {
                $dataprofile = array(
                    'page_title' => 'Tambah Data Individu',
                    'name' => $this->session->userdata('name'),
                    'role' => $this->session->userdata('role'),
                    'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                    'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Individu Jema\'at</div>',
                    'status_nikah' => $this->Statusnikah_model->getStatusNikahList()
                );
                $content = array(
                    'content' => 'individu/tambah'
                );
                $this->template->load('template/def_template', $content, $dataprofile);
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Tambah Data Individu',
                'name' => $this->session->userdata('name'),
                'role' => $this->session->userdata('role'),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'message' => '',
                'status_nikah' => $this->Statusnikah_model->getStatusNikahList()
            );
            $content = array(
                'content' => 'individu/tambah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function hapusIndividu() {
        $idIndividu = $this->uri->segment(3);
        $this->Individu_model->setId($idIndividu);
        $this->Individu_model->deleteIndividu();
        redirect('individu');
    }

}