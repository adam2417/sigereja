<?php
class Keluarga_model extends CI_Model{
	private $id;
	private $nama;
	private $wilayah;
	private $alamat;
	private $notelp;
	private $active;
    private $prop;
    private $kab;
    private $distrik;
    private $klasis;
    private $lingk;
    private $jemaat;
    private $sektor;
	
	function setId($id){
		$this->id = $id;	
	}
	
	function getId(){
		return $this->id;
	}
	
	function setNama($nama){
		$this->nama = $nama;
	}
	
	function getNama(){
		return $this->nama;
	}
	
	function setWilayah($wilayah){
		$this->wilayah = $wilayah;
	}
	
	function getWilayah(){
		return $this->wilayah;
	}
	
	function setAlamat($alamat){
		$this->alamat = $alamat;
	}
	
	function getAlamat(){
		return $this->alamat;
	}
	
	function setNoTelp($notelp){
		$this->notelp = $notelp;
	}
	
	function getNoTelp(){
		return $this->notelp;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}
    
    function setPropinsi($prop){
		$this->prop = $prop;
	}
	
	function getPropinsi(){
		return $this->prop;
	}
    
    function setKabupaten($kab){
		$this->kab = $kab;
	}
	
	function getKabupaten(){
		return $this->kab;
	}
    
    function setDistrik($distrik){
		$this->distrik = $distrik;
	}
	
	function getDistrik(){
		return $this->distrik;
	}
    
    function setKlasis($klasis){
		$this->klasis = $klasis;
	}
	
	function getKlasis(){
		return $this->klasis;
	}
    
    function setLingkungan($lingk){
		$this->lingk = $lingk;
	}
	
	function getLingkungan(){
		return $this->lingk;
	}
    
    function setJemaat($jemaat){
		$this->jemaat = $jemaat;
	}
	
	function getJemaat(){
		return $this->jemaat;
	}
    
    function setSektor($sektor){
		$this->sektor = $sektor;
	}
	
	function getSektor(){
		return $this->sektor;
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function getList(){
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp,t_keluarga.id_prop,t_propinsi.pdesc,t_keluarga.id_kab_kota,t_kabupaten_kota.pdesc kabdesc,t_keluarga.id_distrik,t_distrik.pdesc ddesc,t_keluarga.id_klasis,t_klasis.pdesc kdesc,t_keluarga.id_lingkungan,t_lingkungan.pdesc ldesc,t_keluarga.id_jemaat,t_jemaat.pdesc jdesc,t_keluarga.id_sektor,t_sektor.pdesc sdesc",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_propinsi','t_keluarga.id_prop=t_propinsi.id')->join('t_kabupaten_kota','t_keluarga.id_kab_kota=t_kabupaten_kota.id')->join('t_distrik','t_keluarga.id_distrik=t_distrik.id')->join('t_klasis','t_keluarga.id_klasis=t_klasis.id')->join('t_lingkungan','t_keluarga.id_lingkungan=t_lingkungan.id')->join('t_jemaat','t_keluarga.id_jemaat=t_jemaat.id')->join('t_sektor','t_keluarga.id_sektor=t_sektor.id')->where(array('t_keluarga.active'=>'1'));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp,t_keluarga.id_prop,t_propinsi.pdesc,t_keluarga.id_kab_kota,t_kabupaten_kota.pdesc kabdesc,t_keluarga.id_distrik,t_distrik.pdesc ddesc,t_keluarga.id_klasis,t_klasis.pdesc kdesc,t_keluarga.id_lingkungan,t_lingkungan.pdesc ldesc,t_keluarga.id_jemaat,t_jemaat.pdesc jdesc,t_keluarga.id_sektor,t_sektor.pdesc sdesc",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_propinsi','t_keluarga.id_prop=t_propinsi.id')->join('t_kabupaten_kota','t_keluarga.id_kab_kota=t_kabupaten_kota.id')->join('t_distrik','t_keluarga.id_distrik=t_distrik.id')->join('t_klasis','t_keluarga.id_klasis=t_klasis.id')->join('t_lingkungan','t_keluarga.id_lingkungan=t_lingkungan.id')->join('t_jemaat','t_keluarga.id_jemaat=t_jemaat.id')->join('t_sektor','t_keluarga.id_sektor=t_sektor.id')->where(array('t_keluarga.active'=>'1','t_keluarga.id'=>$this->getId()));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function getSelectByWilayah(){
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp,t_keluarga.id_prop,t_propinsi.pdesc,t_keluarga.id_kab_kota,t_kabupaten_kota.pdesc kabdesc,t_keluarga.id_distrik,t_distrik.pdesc ddesc,t_keluarga.id_klasis,t_klasis.pdesc kdesc,t_keluarga.id_lingkungan,t_lingkungan.pdesc ldesc,t_keluarga.id_jemaat,t_jemaat.pdesc jdesc,t_keluarga.id_sektor,t_sektor.pdesc sdesc",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_propinsi','t_keluarga.id_prop=t_propinsi.id')->join('t_kabupaten_kota','t_keluarga.id_kab_kota=t_kabupaten_kota.id')->join('t_distrik','t_keluarga.id_distrik=t_distrik.id')->join('t_klasis','t_keluarga.id_klasis=t_klasis.id')->join('t_lingkungan','t_keluarga.id_lingkungan=t_lingkungan.id')->join('t_jemaat','t_keluarga.id_jemaat=t_jemaat.id')->join('t_sektor','t_keluarga.id_sektor=t_sektor.id')->where(array('t_keluarga.active'=>'1','t_keluarga.wilayah'=>$this->getWilayah()));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function ubahKeluarga(){
		$data = array(
			'nama' => $this->getNama(),
			'wilayah' => $this->getWilayah(),
			'alamat' => $this->getAlamat(),
			'notelp' => $this->getNoTelp(),            
            'id_prop' => $this->getPropinsi(),
            'id_kab_kota' => $this->getKabupaten(),
            'id_distrik' => $this->getDistrik(),
            'id_klasis' => $this->getKlasis(),
            'id_lingkungan' => $this->getLingkungan(),
            'id_jemaat' => $this->getJemaat(),
            'id_sektor' => $this->getSektor()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_keluarga',$data);
	}
	
	function tambahKeluarga(){
		$query = $this->db->query("select max(id) id from t_keluarga");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'nama' => $this->getNama(),
			'wilayah' => $this->getWilayah(),            
			'alamat' => $this->getAlamat(),
			'notelp' => $this->getNoTelp(),
			'active' => '1',
            'id_prop' => $this->getPropinsi(),
            'id_kab_kota' => $this->getKabupaten(),
            'id_distrik' => $this->getDistrik(),
            'id_klasis' => $this->getKlasis(),
            'id_lingkungan' => $this->getLingkungan(),
            'id_jemaat' => $this->getJemaat(),
            'id_sektor' => $this->getSektor()
		);
		$this->db->insert('t_keluarga',$data);
	}
	
	function deleteKeluarga(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_keluarga',$data);
	}
}