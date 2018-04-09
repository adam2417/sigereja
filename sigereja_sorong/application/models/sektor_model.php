<?php
class Sektor_model extends CI_Model {
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
	
	function getSektorList(){
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_sektor');
		return $query->result();
	}
	
	function getSektorOneSelect(){
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_sektor');
		return $query->result();
	}
	
	function editSektorList(){
		$data = array(
			'pdesc' => $this->getNama()
		);
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$this->db->update('t_sektor',$data);
	}
	
	function insertSektor(){
		$query = $this->db->query("select max(id) id from t_sektor");
		$res = $query->result();
		$last_id = $res[0]->id;
		$next_id = $last_id + 1;
		
		$data = array(
			'id' => $next_id,
			'pdesc' => $this->getNama(),
			'active' => '1'
		);
		$this->db->insert('t_sektor',$data);		
	}
	
	function hapusSektor(){
		$data = array(
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_sektor',$data);
	}
}