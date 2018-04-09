<?php
class Wilayah_model extends CI_Model {
	private $id;
	private $nama;
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
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function getWilayahList(){
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_wilayah');
		return $query->result();
	}
	
	function getWilayahOneSelect(){
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_wilayah');
		return $query->result();
	}
	
	function editWilayahList(){
		$data = array(
			'nama' => $this->getNama()
		);
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$this->db->update('t_wilayah',$data);
	}
	
	function insertWilayah(){
		$query = $this->db->query("select max(id) id from t_wilayah");
		$res = $query->result();
		$last_id = $res[0]->id;
		$next_id = $last_id + 1;
		
		$data = array(
			'id' => $next_id,
			'nama' => $this->getNama(),
			'active' => '1'
		);
		$this->db->insert('t_wilayah',$data);		
	}
	
	function hapusWilayah(){
		$data = array(
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_wilayah',$data);
	}
}