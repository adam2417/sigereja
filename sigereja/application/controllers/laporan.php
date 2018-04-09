<?php

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Wilayah_model');
    }

    function index() {
        
    }

    function getDataLaporanUsia() {
        if (isset($_POST['btnview'])) {
            if (isset($_POST['wilayah'])) {
                if (!($_POST['wilayah'] == 'all')) {
                    $this->Laporan_model->setWilayah($_POST['wilayah']);
                    $data = $this->Laporan_model->getDataKelompokUmurByWilayah();
                    $data2 = $this->Laporan_model->getDataKelompokUmurByWilayahAllData();
                    $wil_data = $_POST['wilayah'];
                    $this->Wilayah_model->setId($wil_data);
                    $wils = $this->Wilayah_model->getWilayahOneSelect();

                    $dataprofile = array(
                        'page_title' => 'Laporan Data Usia',
                        'name' => $this->session->userdata('name'),
                        'listlaporandatausia' => $data,
                        'listlaporandatausiaAll' => $data2,
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'wil' => $wils[0]->nama,
                        'role' => $this->session->userdata('role')
                    );
                } else {
                    $dataprofile = array(
                        'page_title' => 'Laporan Data Usia',
                        'name' => $this->session->userdata('name'),
                        'listlaporandatausia' => $this->Laporan_model->getDataKelompokUmur(),
                        'listlaporandatausiaAll' => $this->Laporan_model->getDataKelompokUmurAllData(),
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'wil' => 'All Wilayah',
                        'role' => $this->session->userdata('role')
                    );
                }
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Laporan Data Usia',
                'name' => $this->session->userdata('name'),
                'listlaporandatausia' => $this->Laporan_model->getDataKelompokUmur(),
                'listlaporandatausiaAll' => $this->Laporan_model->getDataKelompokUmurAllData(),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'wil' => 'All Wilayah',
                'role' => $this->session->userdata('role')
            );
        }
        $content = array(
            'content' => 'laporan/listlaporandatausia'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function getDataLaporanIndividu() {
        if (isset($_POST['btnview'])) {
            if (isset($_POST['wilayah']) && ($_POST['statushidup'] == 'empty')) {
                if (!($_POST['wilayah'] == 'all')) {
                    $this->Laporan_model->setWilayah($_POST['wilayah']);
                    $data = $this->Laporan_model->getDataIndividuByWilayah();
                    $wil_data = $_POST['wilayah'];
                    $this->Wilayah_model->setId($wil_data);
                    $wils = $this->Wilayah_model->getWilayahOneSelect();
                    $dataprofile = array(
                        'page_title' => 'Laporan Data Jema\'at',
                        'name' => $this->session->userdata('name'),
                        'listlaporandataindividu' => $data,
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'listlaporandataindividuAll' => $this->Laporan_model->getDataIndividuByWilayahAllData(),
                        'wil' => $wils[0]->nama,
                        'role' => $this->session->userdata('role')
                    );
                } else {
                    $dataprofile = array(
                        'page_title' => 'Laporan Data Jema\'at',
                        'name' => $this->session->userdata('name'),
                        'listlaporandataindividu' => $this->Laporan_model->getDataIndividuAllWilayah(),
                        'listlaporandataindividuAll' => $this->Laporan_model->getDataIndividuAllWilayahAllData(),
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'wil' => 'All Wilayah',
                        'role' => $this->session->userdata('role')
                    );
                }
            } else if (isset($_POST['statushidup']) && ($_POST['wilayah'] == 'all')) {
                $this->Laporan_model->setLife($_POST['statushidup']);
                $data = $this->Laporan_model->getDataIndividuAllWilayahByLifeStatus();
                $wil = 'All Wilayah';
                $dataprofile = array(
                    'page_title' => 'Laporan Data Jema\'at',
                    'name' => $this->session->userdata('name'),
                    'listlaporandataindividu' => $data,
                    'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                    'listlaporandataindividuAll' => $this->Laporan_model->getDataIndividuAllWilayahByLifeStatusAllData(),
                    'wil' => $wil,
                    'role' => $this->session->userdata('role')
                );
            } else if (isset($_POST['wilayah']) && isset($_POST['statushidup'])) {
                $this->Laporan_model->setWilayah($_POST['wilayah']);
                $this->Laporan_model->setLife($_POST['statushidup']);
                $data = $this->Laporan_model->getDataIndividuByWilayahAndLifeStatus();
                $wil_data = $_POST['wilayah'];
                $this->Wilayah_model->setId($wil_data);
                $wils = $this->Wilayah_model->getWilayahOneSelect();
                $dataprofile = array(
                    'page_title' => 'Laporan Data Jema\'at',
                    'name' => $this->session->userdata('name'),
                    'listlaporandataindividuAll' => $this->Laporan_model->getDataIndividuByWilayahAndLifeStatusAllData(),
                    'listlaporandataindividu' => $data,
                    'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                    'wil' => $wils[0]->nama,
                    'role' => $this->session->userdata('role')
                );
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Laporan Data Jema\'at',
                'name' => $this->session->userdata('name'),
                'listlaporandataindividu' => $this->Laporan_model->getDataIndividuAllWilayah(),
                'listlaporandataindividuAll' => $this->Laporan_model->getDataIndividuAllWilayahAllData(),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'wil' => 'All Wilayah',
                'role' => $this->session->userdata('role')
            );
        }
        $content = array(
            'content' => 'laporan/laporanindividujemaat'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

    function getDataLaporanKeluarga() {
        if (isset($_POST['btnview'])) {
            if (isset($_POST['wilayah'])) {
                if (!($_POST['wilayah'] == 'all')) {
                    $this->Laporan_model->setWilayah($_POST['wilayah']);
                    $data = $this->Laporan_model->getDataKeluargaByWilayah();
                    $wil_data = $_POST['wilayah'];
                    $this->Wilayah_model->setId($wil_data);
                    $wils = $this->Wilayah_model->getWilayahOneSelect();
                    $dataprofile = array(
                        'page_title' => 'Laporan Data Keluarga',
                        'name' => $this->session->userdata('name'),
                        'listlaporandatakeluarga' => $data,
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'wil' => $wils[0]->nama,
                        'role' => $this->session->userdata('role')
                    );
                } else {
                    $dataprofile = array(
                        'page_title' => 'Laporan Data Keluarga',
                        'name' => $this->session->userdata('name'),
                        'listlaporandatakeluarga' => $this->Laporan_model->getDataKeluargaAllWilayah(),
                        'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                        'wil' => 'All Wilayah',
                        'role' => $this->session->userdata('role')
                    );
                }
            }
        } else {
            $dataprofile = array(
                'page_title' => 'Laporan Data Keluarga',
                'name' => $this->session->userdata('name'),
                'listlaporandatakeluarga' => $this->Laporan_model->getDataKeluargaAllWilayah(),
                'wilayahlist' => $this->Wilayah_model->getWilayahList(),
                'wil' => 'All Wilayah',
                'role' => $this->session->userdata('role')
            );
        }
        $content = array(
            'content' => 'laporan/laporankeluarga'
        );
        $this->template->load('template/def_template', $content, $dataprofile);
    }

}

?>