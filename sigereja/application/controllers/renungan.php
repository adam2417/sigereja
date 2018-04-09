<?php
class Renungan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Renungan_model');
    }

    function index() {
        if (isset($_POST["btnview"])) {
            if (isset($_POST['searchDate']) && !($_POST['searchDate'] == '')) {
                $tglrenungan = trim($_POST['searchDate']);
                list($m, $d, $y) = explode('/', $tglrenungan);
                $mk = mktime(0, 0, 0, $m, $d, $y);
                $tgltahbis_disp1 = date('Y-m-d', $mk);

                $this->Renungan_model->setTanggal($tgltahbis_disp1);

                $dataprofile = array(
                    'page_title' => 'Daftar Renungan',
                    'name' => $this->session->userdata('name'),
                    'renunganlist' => $this->Renungan_model->getRenunganFindByDate(),
                    'role' => $this->session->userdata('role')
                );
                $content = array(
                    'content' => 'renungan/renunganlist'
                );
            } else {
                $dataprofile = array(
                    'page_title' => 'Daftar Renungan',
                    'name' => $this->session->userdata('name'),
                    'renunganlist' => $this->Renungan_model->getRenunganList(),
                    'role' => $this->session->userdata('role')
                );
                $content = array(
                    'content' => 'renungan/renunganlist'
                );
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Daftar Renungan',
                'name' => $this->session->userdata('name'),
                'renunganlist' => $this->Renungan_model->getRenunganList(),
                'role' => $this->session->userdata('role'),
				'message' => ''
            );
            $content = array(
                'content' => 'renungan/renunganlist'
            );
        }
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function renunganOneSelect() {
        $renunganId = $this->uri->segment(3);
        $this->Renungan_model->setId($renunganId);
        $dataprofile = array(
            'page_title' => 'Detail Renungan',
            'name' => $this->session->userdata('name'),
            'renunganlist' => $this->Renungan_model->getRenunganOneSelect(),
            'role' => $this->session->userdata('role')
        );
        $content = array(
            'content' => 'renungan/detail'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function tambahRenungan() {
        if (isset($_POST['btnSave'])) {
            if (isset($_POST['judul']) &&
                    isset($_POST['bacaan']) &&
                    isset($_POST['renungan']) &&
                    !($_POST['judul'] == '') &&
                    !($_POST['bacaan'] == '') &&
                    !($_POST['renungan'] == '')) {
                $dateNow = date('Y-m-d H:i:s');
                $this->Renungan_model->setJudul($_POST['judul']);
                $this->Renungan_model->setTanggal($dateNow);
                $this->Renungan_model->setBacaan($_POST['bacaan']);
                $this->Renungan_model->setRenungan($_POST['renungan']);
                $this->Renungan_model->setPenulis($_POST['penulis']);

                $this->Renungan_model->tambahRenungan();

                redirect('renungan');
            } else {
                $this->load->model("Pendeta_model");
                $dataprofile = array(
                    'page_title' => 'Tambah Renungan',
                    'name' => $this->session->userdata('name'),
                    'pendeta' => $this->Pendeta_model->getPendetaList(),
                    'role' => $this->session->userdata('role'),
                    'message' => '<div style="color:red;font-size:9pt;font-weight:bold;">Lengkapi Form Di Bawah Untuk Menambah Renungan</div>'
                );
                $content = array(
                    'content' => 'renungan/tambah'
                );
                $this->template->load('template/def_template', $content, $dataprofile);
            }
        } else {
            $this->load->model("Pendeta_model");
            $dataprofile = array(
                'page_title' => 'Tambah Renungan',
                'name' => $this->session->userdata('name'),
                'pendeta' => $this->Pendeta_model->getPendetaList(),
                'message' => '',
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'renungan/tambah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function ubahRenungan() {
        $idrenungan = $this->uri->segment(3);
        if (isset($_POST['btnSave'])) {
            $dateNow = date('Y-m-d H:i:s');
            $this->Renungan_model->setId($idrenungan);
            $this->Renungan_model->setJudul($_POST['judul']);
            $this->Renungan_model->setTanggal($dateNow);
            $this->Renungan_model->setBacaan($_POST['bacaan']);
            $this->Renungan_model->setRenungan($_POST['renungan']);
            $this->Renungan_model->setPenulis($_POST['penulis']);

            $this->Renungan_model->ubahRenungan();

            redirect('renungan');
        } else {
            $this->Renungan_model->setId($idrenungan);
            $this->load->model("Pendeta_model");
            $dataprofile = array(
                'page_title' => 'Edit Renungan',
                'name' => $this->session->userdata('name'),
                'renunganlist' => $this->Renungan_model->getRenunganOneSelect(),
                'pendeta' => $this->Pendeta_model->getPendetaList(),
                'role' => $this->session->userdata('role')
            );
            $content = array(
                'content' => 'renungan/ubah'
            );
            $this->template->load('template/def_template', $content, $dataprofile);
        }
    }

    function hapusRenungan() {
        $idrenungan = $this->uri->segment(3);
        $this->Renungan_model->setId($idrenungan);
        $this->Renungan_model->deleteRenungan();
        redirect('renungan');
    }

}