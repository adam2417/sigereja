<?php
class Jabatan_model extends CI_Model{
	private $id;
	private $nama;
	private $description;
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
	
	function setDescription($desc){
		$this->description = $desc;
	}
	
	function getDescription(){
		return $this->description;
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
	
	function getAllList(){
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_jabatan');
		return $query->result();
	}
}