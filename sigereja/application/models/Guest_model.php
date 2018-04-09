<?php
class Guest_model extends CI_Model {
	private $id;
	private $pengiriman;
	private $tanggal;
	private $pesan;
	private $terbit;
	private $active;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setPengiriman($pengiriman){
		$this->pengiriman = $pengiriman;
	}
	
	function getPengiriman(){
		return $this->pengiriman;
	}
	
	function setTanggal($tanggal){
		$this->tanggal = $tanggal;
	}
	
	function getTanggal(){
		return $this->tanggal;
	}
	
	function setPesan($pesan){
		$this->pesan = $pesan;
	}
	
	function getPesan(){
		return $this->pesan;
	}
	
	function setTerbit($terbit){
		$this->terbit = $terbit;
	}
	
	function getTerbit(){
		return $this->terbit;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}
	
	// Create model class constructor
	function __construct(){
		parent::__construct();
	}
	
	function getAllGuestList(){
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_buku_tamu');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function insertGuest(){
		$query = $this->db->query("select max(id) last_id from t_buku_tamu");
		$res = $query->result();
		$last_id = $res[0]->last_id;
		$ids = $last_id + 1;
		
		$data = array(
			'id' => $ids,
			'pengiriman' => $this->getPengiriman(),
			'tanggal' => $this->getTanggal(),
			'pesan' => $this->getPesan(),
			'terbit' => $this->getTerbit(),
			'active' => '1'
		);
		$this->db->insert('t_buku_tamu',$data);
	}
	
	function getGuestOne(){
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_buku_tamu');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function hapusBukuTamu(){
		$data = array(
				'active' => '0'
			);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_buku_tamu',$data);
	}
}