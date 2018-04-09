<?php
class Atestasi_model extends CI_Model {
	private $id;
	private $tanggal_surat;
	private $tanggal_atestasi_keluarmasuk;
	private $gereja_tujuanasal;
	private $alamat_gereja_tujuanasal;
	private $alamat_tinggal;
	private $tanggal_masukkeluar;
	private $individu;
	private $keluarga;
	private $active;
	private $tipe;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setTipe($tipe){
		$this->tipe = $tipe;
	}
	
	function getTipe(){
		return $this->tipe;
	}
	
	function setTanggalSurat($tgl_surat){
		$this->tanggal_surat = $tgl_surat;
	}
	
	function getTanggalSurat(){
		return $this->tanggal_surat;
	}
	
	function setTanggalAtestasiKeluarMasuk($tgl_atestasi){
		$this->tanggal_atestasi_keluarmasuk = $tgl_atestasi;
	}
	
	function getTanggalAtestasiKeluarMasuk(){
		return $this->tanggal_atestasi_keluarmasuk;
	}
	
	function setGerejaTujuanAsal($gereja){
		$this->gereja_tujuanasal = $gereja;
	}
	
	function getGerejaTujuanAsal(){
		return $this->gereja_tujuanasal;
	}
	
	function setAlamatGerejaTujuanAsal($alamatgereja){
		$this->alamat_gereja_tujuanasal = $alamatgereja;
	}
	
	function getAlamatGerejaTujuanAsal(){
		return $this->alamat_gereja_tujuanasal;
	}
	
	function setAlamatTinggal($alamattinggal){
		$this->alamat_tinggal = $alamattinggal;
	}
	
	function getAlamatTinggal(){
		return $this->alamat_tinggal;
	}
	
	function setTanggalMasukKeluar($tgl_masukkeluar){
		$this->tanggal_masukkeluar = $tgl_masukkeluar;
	}
	
	function getTanggalMasukKeluar(){
		return $this->tanggal_masukkeluar;
	}
	
	function setIndividu($individu){
		$this->individu = $individu;
	}
	
	function getIndividu(){
		return $this->individu;
	}
	
	function setKeluarga($keluarga){
		$this->keluarga = $keluarga;
	}
	
	function getKeluarga(){
		return $this->keluarga;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}

	function __construct(){
		parent::__construct();
	}
	
	function getList(){		
		$this->db->select("t_suratatestasi.id,date_format(tanggal_surat,'%m/%d/%Y')tanggal_surat,date_format(tanggal_atestasi_keluarmasuk,'%m/%d/%Y')tanggal_atestasi_keluarmasuk,gereja_tujuanasal,alamat_gereja_tujuanasal,alamat_tinggal,date_format(tanggal_masukkeluar,'%m/%d/%Y')tanggal_masukkeluar,t_individu.nama_individu individu,t_keluarga.nama keluarga",false)->
		join("t_individu","t_individu.id_individu=t_suratatestasi.individu")->join("t_keluarga","t_keluarga.id=t_suratatestasi.keluarga")->where(array('t_suratatestasi.active'=>'1'));
		$query = $this->db->get('t_suratatestasi');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("t_suratatestasi.id id,date_format(tanggal_surat,'%m/%d/%Y')tanggal_surat,date_format(tanggal_atestasi_keluarmasuk,'%m/%d/%Y')tanggal_atestasi_keluarmasuk,gereja_tujuanasal,alamat_gereja_tujuanasal,alamat_tinggal,date_format(tanggal_masukkeluar,'%m/%d/%Y')tanggal_masukkeluar,t_individu.nama_individu individu,t_keluarga.nama keluarga",false)->
		join("t_individu","t_individu.id_individu=t_suratatestasi.individu")->join("t_keluarga","t_keluarga.id=t_suratatestasi.keluarga")->where(array('t_suratatestasi.active'=>'1','t_suratatestasi.id'=>$this->getId()));
		$query = $this->db->get('t_suratatestasi');
		return $query->result();
	}
	
	function ubahAtestasi(){
		$data = array(
			'tanggal_surat' => $this->getTanggalSurat(),
			'tanggal_atestasi_keluarmasuk' => $this->getTanggalAtestasiKeluarMasuk(),
			'gereja_tujuanasal' => $this->getGerejaTujuanAsal(),
			'alamat_gereja_tujuanasal' => $this->getAlamatGerejaTujuanAsal(),
			'alamat_tinggal' => $this->getAlamatTinggal(),
			'tanggal_masukkeluar' => $this->getTanggalMasukKeluar()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_suratatestasi',$data);
	}
	
	function tambahAtestasi(){
		$query = $this->db->query("select max(id) id from t_suratatestasi");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'tanggal_surat' => $this->getTanggalSurat(),
			'tanggal_atestasi_keluarmasuk' => $this->getTanggalAtestasiKeluarMasuk(),
			'gereja_tujuanasal' => $this->getGerejaTujuanAsal(),
			'alamat_gereja_tujuanasal' => $this->getAlamatGerejaTujuanAsal(),
			'alamat_tinggal' => $this->getAlamatTinggal(),
			'tanggal_masukkeluar' => $this->getTanggalMasukKeluar(),
			'individu' => $this->getIndividu(),
			'keluarga' => $this->getKeluarga(),
			'active' => '1'
		);
		$this->db->insert('t_suratatestasi',$data);
	}
	
	function deleteAtestasi(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_suratatestasi',$data);
	}
}