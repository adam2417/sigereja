<?php

class Individu_model extends CI_Model {

    private $id_individu;
    private $nama_individu;
    private $nama_wil;
    private $jenis_kelamin;
    private $tempat_lahir;
    private $tanggal_lahir;
    private $alamat;
    private $telp;
    private $pekerjaan;
    private $status_nikah;
    private $baptis;
    private $sidi;
    private $life;
    private $foto;
    private $status;
    private $gallery_path;
    private $gallery_path_url;

    function setId($id) {
        $this->id_individu = $id;
    }

    function getId() {
        return $this->id_individu;
    }

    function setNama($nama) {
        $this->nama_individu = $nama;
    }

    function getNama() {
        return $this->nama_individu;
    }

    function setWilayah($wilayah) {
        $this->nama_wil = $wilayah;
    }

    function getWilayah() {
        return $this->nama_wil;
    }

    function setJenisKelamin($jenkel) {
        $this->jenis_kelamin = $jenkel;
    }

    function getJenisKelamin() {
        return $this->jenis_kelamin;
    }

    function setTempatLahir($tempat_lahir) {
        $this->tempat_lahir = $tempat_lahir;
    }

    function getTempatLahir() {
        return $this->tempat_lahir;
    }

    function setTanggalLahir($tgl_lahir) {
        $this->tanggal_lahir = $tgl_lahir;
    }

    function getTanggalLahir() {
        return $this->tanggal_lahir;
    }

    function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    function getAlamat() {
        return $this->alamat;
    }

    function setTelp($telpon) {
        $this->telp = $telpon;
    }

    function getTelp() {
        return $this->telp;
    }

    function setPekerjaan($pekerjaan) {
        $this->pekerjaan = $pekerjaan;
    }

    function getPekerjaan() {
        return $this->pekerjaan;
    }

    function setStatusNikah($nikah) {
        $this->status_nikah = $nikah;
    }

    function getStatusNikah() {
        return $this->status_nikah;
    }

    function setBaptis($baptis) {
        $this->baptis = $baptis;
    }

    function getBaptis() {
        return $this->baptis;
    }

    function setSidi($sidi) {
        $this->sidi = $sidi;
    }

    function getSidi() {
        return $this->sidi;
    }

    function setLife($life) {
        $this->life = $life;
    }

    function getLife() {
        return $this->life;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getFoto() {
        return $this->foto;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getStatus() {
        return $this->status;
    }

    function getGalleryPath() {
        return $this->gallery_path;
    }

    function setGalleryPath($gallery_path) {
        $this->gallery_path = $gallery_path;
    }

    function __construct() {
        parent::__construct();
        $this->setGalleryPath(realpath('asset/images/jemaat/'));
        $this->gallery_path_url = base_url() . 'asset/images/jemaat/';
    }

    function getList() {
        $this->db->select("id_individu,nama_individu,t_wilayah.nama nama_wil,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,telp,pekerjaan,status_nikah,baptis,sidi,life,t_status_nikah.status stat_nikah")->join('t_wilayah', 't_individu.nama_wil=t_wilayah.id')->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')
                ->where(array('t_individu.status' => '1'))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getListByName() {
        $this->db->select("id_individu,nama_individu,t_wilayah.nama nama_wil,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,telp,pekerjaan,status_nikah,baptis,sidi,life,t_status_nikah.status stat_nikah")->join('t_wilayah', 't_individu.nama_wil=t_wilayah.id')->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')
                ->where(array('t_individu.status' => '1'))->like(array('nama_individu' => $this->getNama()))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getOneSelect() {
        $this->db->select("id_individu,nama_individu,t_wilayah.nama nama_wil,jenis_kelamin,tempat_lahir,date_format(tanggal_lahir,'%m/%d/%Y') tanggal_lahir,alamat,telp,pekerjaan,status_nikah,baptis,sidi,life,t_status_nikah.status stat_nikah", false)->join('t_wilayah', 't_individu.nama_wil=t_wilayah.id')->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')
                ->where(array('t_individu.status' => '1', 't_individu.id_individu' => $this->getId()));
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getSelectByWilayah() {
        $this->db->select("id_individu,nama_individu,t_wilayah.nama nama_wil,jenis_kelamin,tempat_lahir,alamat,telp,pekerjaan,status_nikah,baptis,sidi,life,foto,t_status_nikah.status stat_nikah")->join('t_wilayah', 't_individu.nama_wil=t_wilayah.id')->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')
                ->where(array('t_individu.status' => '1', 't_individu.nama_wil' => $this->getWilayah()))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getSelectByWilayahAndName() {
        $this->db->select("id_individu,nama_individu,t_wilayah.nama nama_wil,jenis_kelamin,tempat_lahir,alamat,telp,pekerjaan,status_nikah,baptis,sidi,life,foto,t_status_nikah.status stat_nikah")->join('t_wilayah', 't_individu.nama_wil=t_wilayah.id')->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')
                ->where(array('t_individu.status' => '1', 't_individu.nama_wil' => $this->getWilayah()))->like(array('nama_individu' => $this->getNama()))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function ubahIndividu() {
        if ($this->getFoto()) {
            $data = array(
                'nama_individu' => $this->getNama(),
                'nama_wil' => $this->getWilayah(),
                'jenis_kelamin' => $this->getJenisKelamin(),
                'tempat_lahir' => $this->getTempatLahir(),
                'tanggal_lahir' => $this->getTanggalLahir(),
                'alamat' => $this->getAlamat(),
                'telp' => $this->getTelp(),
                'pekerjaan' => $this->getPekerjaan(),
                'status_nikah' => $this->getStatusNikah(),
                'baptis' => $this->getBaptis(),
                'sidi' => $this->getSidi(),
                'life' => $this->getLife(),
                'foto' => $this->getFoto()
            );
        } else {
            $data = array(
                'nama_individu' => $this->getNama(),
                'nama_wil' => $this->getWilayah(),
                'jenis_kelamin' => $this->getJenisKelamin(),
                'tempat_lahir' => $this->getTempatLahir(),
                'tanggal_lahir' => $this->getTanggalLahir(),
                'alamat' => $this->getAlamat(),
                'telp' => $this->getTelp(),
                'pekerjaan' => $this->getPekerjaan(),
                'status_nikah' => $this->getStatusNikah(),
                'baptis' => $this->getBaptis(),
                'sidi' => $this->getSidi(),
                'life' => $this->getLife()
            );
        }
        $this->db->where(array('id_individu' => $this->getId()));
        $this->db->update('t_individu', $data);
    }

    function tambahIndividu() {
        $query = $this->db->query("select max(id_individu) id from t_individu");
        $res = $query->result();
        $this->setId(($res[0]->id) + 1);
        $data = array(
            'id_individu' => $this->getId(),
            'nama_individu' => $this->getNama(),
            'nama_wil' => $this->getWilayah(),
            'jenis_kelamin' => $this->getJenisKelamin(),
            'tempat_lahir' => $this->getTempatLahir(),
            'alamat' => $this->getAlamat(),
            'telp' => $this->getTelp(),
            'tanggal_lahir' => $this->getTanggalLahir(),
            'pekerjaan' => $this->getPekerjaan(),
            'status_nikah' => $this->getStatusNikah(),
            'baptis' => $this->getBaptis(),
            'sidi' => $this->getSidi(),
            'life' => $this->getLife(),
            'foto' => $this->getFoto(),
            'status' => '1'
        );
        $this->db->insert('t_individu', $data);
    }

    function deleteIndividu() {
        $data = array(
            'status' => '0'
        );
        $this->db->where(array('id_individu' => $this->getId()));
        $this->db->update('t_individu', $data);
    }

    function do_upload() {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->getGalleryPath(),
            'max_size' => 2000
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_data = $this->upload->data();

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $this->getGalleryPath() . '/thumbs',
            'maintain_ration' => true,
            'width' => 185,
            'height' => 105
        );

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function get_images() {
        $files = scandir($this->getGalleryPath());
        $files = array_diff($files, array('.', '..', 'thumbs'));

        $images = array();

        $this->db->select("foto", false)->where(array('status' => '1', 'id_individu' => $this->getId()));
        $query = $this->db->get('t_individu');
        $data = $query->result();
        $file = $data[0]->foto;

        return $this->gallery_path_url . 'thumbs/' . $file;
    }

}