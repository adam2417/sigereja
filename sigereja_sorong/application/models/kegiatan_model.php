<?php

class Kegiatan_model extends CI_Model {
	private $id;
	private $nama;
	private $waktu;
	private $tempat;
	private $koordinasi;
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
	
	function setWaktu($waktu){
		$this->waktu = $waktu;
	}
	
	function getWaktu(){
		return $this->waktu;
	}
	
	function setTempat($tempat){
		$this->tempat = $tempat;
	}
	
	function getTempat(){
		return $this->tempat;
	}
	
	function setKoordinasi($koordinasi){
		$this->koordinasi = $koordinasi;
	}
	
	function getKoordinasi(){
		return $this->koordinasi;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}

	// Create class constructor
	function __construct(){
		parent::__construct();
	}
	
	function getKegiatanList(){
		$this->db->select("id,nama,date_format(waktu,'%d %M %Y %H:%m') waktu,tempat,koordinasi,active",false)->
		where(array('active'=>'1'))->where("date_format(waktu,'%d %M %Y') <= now()");
		$query = $this->db->get('t_keg_gereja');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getKegiatanOneSelect(){
		$this->db->select("id,nama,date_format(waktu,'%m/%d/%Y/%H/%i') waktu,tempat,koordinasi,active",false)
		->where(array('active'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_keg_gereja');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function tambahKegiatan(){
		$query = $this->db->query("select max(id) id from t_keg_gereja");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'nama' => $this->getNama(),
			'waktu' => $this->getWaktu(),
			'tempat' => $this->getTempat(),
			'koordinasi' => $this->getKoordinasi(),
			'active' => '1'
		);
		$this->db->insert('t_keg_gereja',$data);
	}
	
	function ubahKegiatan(){
		$data = array(			
			'nama' => $this->getNama(),
			'waktu' => $this->getWaktu(),
			'tempat' => $this->getTempat(),
			'koordinasi' => $this->getKoordinasi(),
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_keg_gereja',$data);
	}
	
	function deleteKegiatan(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_keg_gereja',$data);
	}
    
 }