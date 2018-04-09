<?php
class Sidibaptis_model extends CI_Model{
	private $id;
	private $tanggal_surat;
	private $tanggal_baptis_sidi;
	private $nama;
	private $tempat_sidibaptis;
	private $pendeta;
	private $tipe;
	private $keterangan;
	private $active;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setTanggalSurat($tanggalsurat){
		$this->tanggal_surat = $tanggalsurat;
	}
	
	function getTanggalSurat(){
		return $this->tanggal_surat;
	}
	
	function setTanggalBaptisSidi($tglBaptisSidi){
		$this->tanggal_baptis_sidi = $tglBaptisSidi;
	}
	
	function getTanggalBaptisSidi(){
		return $this->tanggal_baptis_sidi;
	}
	
	function setNama($nama){
		$this->nama = $nama;
	}
	
	function getNama(){
		return $this->nama;
	}
	
	function setTempatBaptisSidi($tempatBaptiSidi){
		$this->tempat_sidibaptis = $tempatBaptiSidi;
	}
	
	function getTempatBaptisSidi(){
		return $this->tempat_sidibaptis;
	}
	
	function setPendeta($pendeta){
		$this->pendeta = $pendeta;
	}
	
	function getPendeta(){
		return $this->pendeta;
	}
	
	function setTipe($tipe){
		$this->tipe = $tipe;
	}
	
	function getTipe(){
		return $this->tipe;
	}
	
	function setKeterangan($keterangan){
		$this->keterangan = $keterangan;
	}
	
	function getKeterangan(){
		return $this->keterangan;
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
		$this->db->select("t_suratbaptisidi.id,date_format(tanggal_surat,'%m/%d/%Y')tanggal_surat,date_format(tanggal_baptis_sidi,'%m/%d/%Y')tanggal_baptis_sidi,t_suratbaptisidi.nama,tempat_sidibaptis,t_individu.nama_individu pendeta,(case(tipe) when 0 then 'Baptis' when 1 then 'Sidi' end) tipe,keterangan,t_suratbaptisidi.active",false)->
                        join("t_pendeta","t_pendeta.id=t_suratbaptisidi.pendeta")->join("t_individu","t_pendeta.nama=t_individu.id_individu")->where(array('t_suratbaptisidi.active'=>'1'));
		$query = $this->db->get('t_suratbaptisidi');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("t_suratbaptisidi.id,date_format(tanggal_surat,'%m/%d/%Y')tanggal_surat,date_format(tanggal_baptis_sidi,'%m/%d/%Y')tanggal_baptis_sidi,t_suratbaptisidi.nama,tempat_sidibaptis,t_individu.nama_individu pendeta,(case(tipe) when 0 then 'Baptis' when 1 then 'Sidi' end) tipe,keterangan,t_suratbaptisidi.active",false)->
                        join("t_pendeta","t_pendeta.id=t_suratbaptisidi.pendeta")->join("t_individu","t_pendeta.nama=t_individu.id_individu")->where(array('t_suratbaptisidi.active'=>'1','t_suratbaptisidi.id'=>$this->getId()));
		$query = $this->db->get('t_suratbaptisidi');
		return $query->result();
	}
	
	function ubahSidiBaptis(){
		$data = array(
			'tanggal_surat' => $this->getTanggalSurat(),
			'tanggal_baptis_sidi' => $this->getTanggalBaptisSidi(),
			'nama' => $this->getNama(),
			'tempat_sidibaptis' => $this->getTempatBaptisSidi(),
			'pendeta' => $this->getPendeta(),
			'tipe' => $this->getTipe(),
			'keterangan' => $this->getKeterangan()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_suratbaptisidi',$data);
	}
	
	function tambahSidiBaptis(){
		$query = $this->db->query("select max(id) id from t_suratbaptisidi");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'tanggal_surat' => $this->getTanggalSurat(),
			'tanggal_baptis_sidi' => $this->getTanggalBaptisSidi(),
			'nama' => $this->getNama(),
			'tempat_sidibaptis' => $this->getTempatBaptisSidi(),
			'pendeta' => $this->getPendeta(),
			'tipe' => $this->getTipe(),
			'keterangan' => $this->getKeterangan(),
			'active' => '1'
		);
		$this->db->insert('t_suratbaptisidi',$data);
	}
	
	function deleteSidiBaptis(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_suratbaptisidi',$data);
	}
}