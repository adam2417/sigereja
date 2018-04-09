<?php

class Individu_model extends CI_Model {

    private $id_individu;
    private $nama_individu;
    private $pendidikan_terakhir;
    private $jenis_kelamin;
    private $tempat_lahir;
    private $tanggal_lahir;
    private $golongan_darah;
    private $tanggal_nikah;
    private $tempat_nikah;
    private $pekerjaan;
    private $status_nikah;
    private $baptis;
    private $sidi;
    private $life;
    private $foto;
    private $status;
    private $gallery_path;
    private $gallery_path_url;
    private $idkel;
    private $stat_hub_kel;
    private $gelar;
    private $gereja_asal;
    private $nama_ibu;
    private $nama_ayah;
    private $intra;
    private $status_domisili;
    private $sukur;
    private $wilayah;

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

    function setPendidikanTerakhir($pend_akhir) {
        $this->pendidikan_terakhir = $pend_akhir;
    }

    function getPendidikanTerakhir() {
        return $this->pendidikan_terakhir;
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

    function setGolonganDarah($goldar) {
        $this->golongan_darah = $goldar;
    }

    function getGolonganDarah() {
        return $this->golongan_darah;
    }

    function setTanggalNikah($tgl_nikah) {
        $this->tanggal_nikah = $tgl_nikah;
    }

    function getTanggalNikah() {
        return $this->tanggal_nikah;
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
    
    function getKeluarga() {
        return $this->idkel;
    }

    function setKeluarga($kel) {
        $this->idkel = $kel;
    }
    
    function getTempatNikah() {
        return $this->tempat_nikah;
    }

    function setTempatNikah($tmptnikah) {
        $this->tempat_nikah = $tmptnikah;
    }
    
    function getStatusHubunganDalamKeluarga() {
        return $this->stat_hub_kel;
    }

    function setStatusHubunganDalamKeluarga($hubkel) {
        $this->stat_hub_kel = $hubkel;
    }
    
    function getGelar() {
        return $this->gelar;
    }

    function setGelar($gelar) {
        $this->gelar = $gelar;
    }
    
    function getAsalGereja() {
        return $this->gereja_asal;
    }

    function setAsalGereja($asal_gereja) {
        $this->gereja_asal = $asal_gereja;
    }
    
    function getNamaIbu() {
        return $this->nama_ibu;
    }

    function setNamaIbu($nama_ibu) {
        $this->nama_ibu = $nama_ibu;
    }
    
    function getNamaAyah() {
        return $this->nama_ibu;
    }

    function setNamaAyah($nama_ayah) {
        $this->nama_ayah = $nama_ayah;
    }
    
    function getIntra() {
        return $this->intra;
    }

    function setIntra($intra) {
        $this->intra = $intra;
    }
    
    function getStatusDomisili() {
        return $this->status_domisili;
    }

    function setStatusDomisili($stat_dom) {
        $this->status_domisili = $stat_dom;
    }
    
    function getSuku() {
        return $this->suku;
    }

    function setSuku($suku) {
        $this->suku = $suku;
    }
    
    function getWilayah() {
        return $this->wilayah;
    }

    function setWilayah($wilayah) {
        $this->wilayah = $wilayah;
    }

    function __construct() {
        parent::__construct();
        $this->setGalleryPath(realpath('asset/images/jemaat/'));
        $this->gallery_path_url = base_url() . 'asset/images/jemaat/';
    }

    function getList() {
        $this->db->select("id_individu,nama_individu,jenis_kelamin,tempat_lahir,tanggal_lahir,pekerjaan,status_nikah,baptis,sidi,t_status_nikah.status stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga")->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')
                ->where(array('t_individu.status' => '1'))->order_by('id_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getListByName() {
        $this->db->select("id_individu,nama_individu,jenis_kelamin,tempat_lahir,tanggal_lahir,pekerjaan,status_nikah,baptis,sidi,t_status_nikah.status stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga")->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')
                ->where(array('t_individu.status' => '1'))->like(array('nama_individu' => $this->getNama()))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getOneSelect() {
        $this->db->select("id_individu,nama_individu,parm_jenkel.param_desc jenis_kelamin,tempat_lahir,date_format(tanggal_lahir,'%m/%d/%Y') tanggal_lahir,t_individu.baptis baptis_id,parm_baptis.param_desc baptis,t_individu.sidi sidi_id,parm_sidi.param_desc sidi,t_individu.status_nikah, param_stat_nikah.param_desc stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga,t_keluarga.wilayah,t_wilayah.nama nama_wil,t_individu.pekerjaan pekerjaan_id,parm_pekerjaan.param_desc pekerjaan,t_individu.gol_darah, parm_gol_darah.param_desc gol_darah,date_format(tanggal_nikah,'%m/%d/%Y') tanggal_nikah,tempat_nikah,t_individu.stat_hub_dlm_kel sta_kel,parm_stat_hub_kel.param_desc stat_hub_dlm_kel,t_individu.pendidikan_terakhir pend_akhir,parm_pendidikan.param_desc pendidikan_terakhir,gelar,asal_gereja,nama_ibu,nama_ayah,suku,t_individu.intra intra_id,parm_intra.param_desc intra,t_individu.status_domisili stat_dom,parm_stat_dom.param_desc status_domisili,parm_life.param_desc life", false)->join('t_param param_stat_nikah', 't_individu.status_nikah=param_stat_nikah.param_val','left')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_param parm_gol_darah','t_individu.gol_darah=parm_gol_darah.param_val','left')->join('t_param parm_pekerjaan','t_individu.pekerjaan=parm_pekerjaan.param_val','left')->join('t_param parm_jenkel','t_individu.jenis_kelamin=parm_jenkel.param_val','left')->join('t_param parm_pendidikan','t_individu.jenis_kelamin=parm_pendidikan.param_val','left')->join('t_param parm_stat_hub_kel','t_individu.stat_hub_dlm_kel=parm_stat_hub_kel.param_val','left')->join('t_param parm_intra','t_individu.intra=parm_intra.param_val','left')->join('t_param parm_stat_dom','t_individu.intra=parm_stat_dom.param_val','left')->join('t_param parm_baptis','t_individu.baptis=parm_baptis.param_val','left')->join('t_param parm_sidi','t_individu.sidi=parm_sidi.param_val','left')->join('t_param parm_life','t_individu.life=parm_life.param_val','left')
                ->where(array('t_individu.status' => '1', 't_individu.id_individu' => $this->getId(),'parm_gol_darah.param_typ'=>'GOLONGAN_DARAH','parm_pekerjaan.param_typ'=>'PEKERJAAN','param_stat_nikah.param_typ'=>'STATUS_NIKAH','parm_jenkel.param_typ'=>'SEX_TYPE','parm_pendidikan.param_typ'=>'PENDIDIKAN','parm_stat_hub_kel.param_typ'=>'STAT_HUB_KEL','parm_intra.param_typ'=>'INTRA','parm_stat_dom.param_typ'=>'STATUS_DOMISILI','parm_baptis.param_typ'=>'STATUS_BAPTIS','parm_sidi.param_typ'=>'STATUS_SIDI','parm_life.param_typ'=>'STATUS_LIFE'));
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getSelectByWilayah() {
        $this->db->select("id_individu,nama_individu,parm_jenkel.param_desc jenis_kelamin,tempat_lahir,date_format(tanggal_lahir,'%m/%d/%Y') tanggal_lahir,t_individu.baptis baptis_id,parm_baptis.param_desc baptis,t_individu.sidi sidi_id,parm_sidi.param_desc sidi,t_individu.status_nikah, param_stat_nikah.param_desc stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga,t_keluarga.wilayah,t_wilayah.nama nama_wil,t_individu.pekerjaan pekerjaan_id,parm_pekerjaan.param_desc pekerjaan,t_individu.gol_darah, parm_gol_darah.param_desc gol_darah,date_format(tanggal_nikah,'%m/%d/%Y') tanggal_nikah,tempat_nikah,t_individu.stat_hub_dlm_kel sta_kel,parm_stat_hub_kel.param_desc stat_hub_dlm_kel,t_individu.pendidikan_terakhir pend_akhir,parm_pendidikan.param_desc pendidikan_terakhir,gelar,asal_gereja,nama_ibu,nama_ayah,suku,t_individu.intra intra_id,parm_intra.param_desc intra,t_individu.status_domisili stat_dom,parm_stat_dom.param_desc status_domisili,parm_life.param_desc life", false)->join('t_param param_stat_nikah', 't_individu.status_nikah=param_stat_nikah.param_val','left')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_param parm_gol_darah','t_individu.gol_darah=parm_gol_darah.param_val','left')->join('t_param parm_pekerjaan','t_individu.pekerjaan=parm_pekerjaan.param_val','left')->join('t_param parm_jenkel','t_individu.jenis_kelamin=parm_jenkel.param_val','left')->join('t_param parm_pendidikan','t_individu.jenis_kelamin=parm_pendidikan.param_val','left')->join('t_param parm_stat_hub_kel','t_individu.stat_hub_dlm_kel=parm_stat_hub_kel.param_val','left')->join('t_param parm_intra','t_individu.intra=parm_intra.param_val','left')->join('t_param parm_stat_dom','t_individu.intra=parm_stat_dom.param_val','left')->join('t_param parm_baptis','t_individu.baptis=parm_baptis.param_val','left')->join('t_param parm_sidi','t_individu.sidi=parm_sidi.param_val','left')->join('t_param parm_life','t_individu.life=parm_life.param_val','left')
                ->where(array('t_individu.status' => '1', 't_keluarga.wilayah' => $this->getWilayah(),'parm_gol_darah.param_typ'=>'GOLONGAN_DARAH','parm_pekerjaan.param_typ'=>'PEKERJAAN','param_stat_nikah.param_typ'=>'STATUS_NIKAH','parm_jenkel.param_typ'=>'SEX_TYPE','parm_pendidikan.param_typ'=>'PENDIDIKAN','parm_stat_hub_kel.param_typ'=>'STAT_HUB_KEL','parm_intra.param_typ'=>'INTRA','parm_stat_dom.param_typ'=>'STATUS_DOMISILI','parm_baptis.param_typ'=>'STATUS_BAPTIS','parm_sidi.param_typ'=>'STATUS_SIDI','parm_life.param_typ'=>'STATUS_LIFE'))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }
    
    function getSelectByKeluarga() {
        $this->db->select("id_individu,nama_individu,parm_jenkel.param_desc jenis_kelamin,tempat_lahir,date_format(tanggal_lahir,'%m/%d/%Y') tanggal_lahir,t_individu.baptis baptis_id,parm_baptis.param_desc baptis,t_individu.sidi sidi_id,parm_sidi.param_desc sidi,t_individu.status_nikah, param_stat_nikah.param_desc stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga,t_keluarga.wilayah,t_wilayah.nama nama_wil,t_individu.pekerjaan pekerjaan_id,parm_pekerjaan.param_desc pekerjaan,t_individu.gol_darah, parm_gol_darah.param_desc gol_darah,date_format(tanggal_nikah,'%m/%d/%Y') tanggal_nikah,tempat_nikah,t_individu.stat_hub_dlm_kel sta_kel,parm_stat_hub_kel.param_desc stat_hub_dlm_kel,t_individu.pendidikan_terakhir pend_akhir,parm_pendidikan.param_desc pendidikan_terakhir,gelar,asal_gereja,nama_ibu,nama_ayah,suku,t_individu.intra intra_id,parm_intra.param_desc intra,t_individu.status_domisili stat_dom,parm_stat_dom.param_desc status_domisili,parm_life.param_desc life", false)->join('t_param param_stat_nikah', 't_individu.status_nikah=param_stat_nikah.param_val','left')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_param parm_gol_darah','t_individu.gol_darah=parm_gol_darah.param_val','left')->join('t_param parm_pekerjaan','t_individu.pekerjaan=parm_pekerjaan.param_val','left')->join('t_param parm_jenkel','t_individu.jenis_kelamin=parm_jenkel.param_val','left')->join('t_param parm_pendidikan','t_individu.jenis_kelamin=parm_pendidikan.param_val','left')->join('t_param parm_stat_hub_kel','t_individu.stat_hub_dlm_kel=parm_stat_hub_kel.param_val','left')->join('t_param parm_intra','t_individu.intra=parm_intra.param_val','left')->join('t_param parm_stat_dom','t_individu.intra=parm_stat_dom.param_val','left')->join('t_param parm_baptis','t_individu.baptis=parm_baptis.param_val','left')->join('t_param parm_sidi','t_individu.sidi=parm_sidi.param_val','left')->join('t_param parm_life','t_individu.life=parm_life.param_val','left')
                ->where(array('t_individu.status' => '1', 't_individu.id_keluarga' => $this->getKeluarga(),'parm_gol_darah.param_typ'=>'GOLONGAN_DARAH','parm_pekerjaan.param_typ'=>'PEKERJAAN','param_stat_nikah.param_typ'=>'STATUS_NIKAH','parm_jenkel.param_typ'=>'SEX_TYPE','parm_pendidikan.param_typ'=>'PENDIDIKAN','parm_stat_hub_kel.param_typ'=>'STAT_HUB_KEL','parm_intra.param_typ'=>'INTRA','parm_stat_dom.param_typ'=>'STATUS_DOMISILI','parm_baptis.param_typ'=>'STATUS_BAPTIS','parm_sidi.param_typ'=>'STATUS_SIDI','parm_life.param_typ'=>'STATUS_LIFE'))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function getSelectByWilayahAndName() {
        $this->db->select("id_individu,nama_individu,jenis_kelamin,tempat_lahir,pekerjaan,status_nikah,baptis,sidi,foto,t_status_nikah.status stat_nikah")->join('t_status_nikah', 't_individu.status_nikah=t_status_nikah.id')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')
                ->where(array('t_individu.status' => '1', 't_keluarga.wilayah' => $this->getWilayah()))->like(array('nama_individu' => $this->getNama()))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }

    function ubahIndividu() {
        if ($this->getFoto()) {
            $data = array(
                'nama_individu' => $this->getNama(),
                'id_keluarga' => $this->getKeluarga(),
                'jenis_kelamin' => $this->getJenisKelamin(),
                'tempat_lahir' => $this->getTempatLahir(),
                'gol_darah' => $this->getGolonganDarah(),
                'tanggal_nikah' => $this->getTanggalNikah(),
                'tanggal_lahir' => $this->getTanggalLahir(),
                'pekerjaan' => $this->getPekerjaan(),
                'status_nikah' => $this->getStatusNikah(),
                'baptis' => $this->getBaptis(),
                'sidi' => $this->getSidi(),
                'life' => $this->getLife(),
                'foto' => $this->getFoto(),
                'status' => '1',
                'tempat_nikah' => $this->getTempatNikah(),
                'stat_hub_dlm_kel' => $this->getStatusHubunganDalamKeluarga(),
                'pendidikan_terakhir' => $this->getPendidikanTerakhir(),
                'gelar' => $this->getGelar(),
                'asal_gereja' => $this->getAsalGereja(),
                'nama_ibu' => $this->getNamaIbu(),
                'nama_ayah' => $this->getNamaAyah(),
                'suku' => $this->getSuku(),
                'intra' => $this->getIntra(),
                'status_domisili' => $this->getStatusDomisili()
            );
        } else {
            $data = array(
                'nama_individu' => $this->getNama(),
                'id_keluarga' => $this->getKeluarga(),
                'jenis_kelamin' => $this->getJenisKelamin(),
                'tempat_lahir' => $this->getTempatLahir(),
                'gol_darah' => $this->getGolonganDarah(),
                'tanggal_nikah' => $this->getTanggalNikah(),
                'tanggal_lahir' => $this->getTanggalLahir(),
                'pekerjaan' => $this->getPekerjaan(),
                'status_nikah' => $this->getStatusNikah(),
                'baptis' => $this->getBaptis(),
                'sidi' => $this->getSidi(),
                'life' => $this->getLife(),            
                'status' => '1',
                'tempat_nikah' => $this->getTempatNikah(),
                'stat_hub_dlm_kel' => $this->getStatusHubunganDalamKeluarga(),
                'pendidikan_terakhir' => $this->getPendidikanTerakhir(),
                'gelar' => $this->getGelar(),
                'asal_gereja' => $this->getAsalGereja(),
                'nama_ibu' => $this->getNamaIbu(),
                'nama_ayah' => $this->getNamaAyah(),
                'suku' => $this->getSuku(),
                'intra' => $this->getIntra(),
                'status_domisili' => $this->getStatusDomisili()
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
            'id_keluarga' => $this->getKeluarga(),
            'jenis_kelamin' => $this->getJenisKelamin(),
            'tempat_lahir' => $this->getTempatLahir(),
            'gol_darah' => $this->getGolonganDarah(),
            'tanggal_nikah' => $this->getTanggalNikah(),
            'tanggal_lahir' => $this->getTanggalLahir(),
            'pekerjaan' => $this->getPekerjaan(),
            'status_nikah' => $this->getStatusNikah(),
            'baptis' => $this->getBaptis(),
            'sidi' => $this->getSidi(),
            'life' => $this->getLife(),
            'foto' => $this->getFoto(),
            'status' => '1',
            'tempat_nikah' => $this->getTempatNikah(),
            'stat_hub_dlm_kel' => $this->getStatusHubunganDalamKeluarga(),
            'pendidikan_terakhir' => $this->getPendidikanTerakhir(),
            'gelar' => $this->getGelar(),
            'asal_gereja' => $this->getAsalGereja(),
            'nama_ibu' => $this->getNamaIbu(),
            'nama_ayah' => $this->getNamaAyah(),
            'suku' => $this->getSuku(),
            'intra' => $this->getIntra(),
            'status_domisili' => $this->getStatusDomisili()
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