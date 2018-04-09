<?php
class Keluarga_model extends CI_Model{
	private $id;
	private $nama;
	private $wilayah;
	private $alamat;
	private $notelp;
	private $active;
	
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
	
	function __construct(){
		parent::__construct();
	}
	
	function getList(){		
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->where(array('t_keluarga.active'=>'1'));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->where(array('t_keluarga.active'=>'1','t_keluarga.id'=>$this->getId()));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function getSelectByWilayah(){
		$this->db->select("t_keluarga.id,t_keluarga.nama,t_keluarga.wilayah,t_wilayah.nama nama_wilayah,alamat,notelp",false)->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->where(array('t_keluarga.active'=>'1','t_keluarga.wilayah'=>$this->getWilayah()));
		$query = $this->db->get('t_keluarga');
		return $query->result();
	}
	
	function ubahKeluarga(){
		$data = array(
			'nama' => $this->getNama(),
			'wilayah' => $this->getWilayah(),
			'alamat' => $this->getAlamat(),
			'notelp' => $this->getNoTelp()			
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
			'active' => '1'
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