<?php
class Renungan_model extends CI_Model {
	private $id;
	private $tanggal;
	private $judul;
	private $bacaan;
	private $renungan;
	private $penulis;
	private $active;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setTanggal($tanggal){
		$this->tanggal = $tanggal;
	}
	
	function getTanggal(){
		return $this->tanggal;
	}
	
	function setJudul($judul){
		$this->judul = $judul;
	}
	
	function getJudul(){
		return $this->judul;
	}
	
	function setBacaan($bacaan){
		$this->bacaan = $bacaan;
	}
	
	function getBacaan(){
		return $this->bacaan;
	}
	
	function setRenungan($renungan){
		$this->renungan = $renungan;
	}
	
	function getRenungan(){
		return $this->renungan;
	}
	
	function setPenulis($penulis){
		$this->penulis = $penulis;
	}
	
	function getPenulis(){
		return $this->penulis;
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
	
	function getRenunganList(){
		$this->db->select("t_renungan.id id,date_format(tanggal,'%d %M %Y') tanggal,judul,bacaan,renungan,t_individu.nama_individu penulis,active",false)->
			join("t_pendeta","t_pendeta.id = t_renungan.penulis")->join("t_individu","t_pendeta.nama=t_individu.id_individu")->where(array('active'=>'1'))->where("date_format(tanggal,'%d %M %Y') <= now()");
		$query = $this->db->get('t_renungan');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getRenunganOneSelect(){
		$this->db->select("t_renungan.id id,date_format(tanggal,'%d %M %Y') tanggal,judul,bacaan,renungan,t_individu.nama_individu penulis,active",false)->
                        join("t_pendeta","t_pendeta.id = t_renungan.penulis")->join("t_individu","t_pendeta.id=t_individu.id_individu")->where(array('t_renungan.active'=>'1','t_renungan.id'=>$this->getId()));
		$query = $this->db->get('t_renungan');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getRenunganFindByDate(){
		$this->db->select("t_renungan.id id,date_format(tanggal,'%d %M %Y') tanggal,judul,bacaan,renungan,t_individu.nama_individu penulis,active",false)->
		join("t_pendeta","t_pendeta.id = t_renungan.penulis")->join("t_individu","t_pendeta.id=t_individu.id_individu")->where(array('active'=>'1'))->where("date_format(tanggal,'%Y-%m-%d') = '".$this->getTanggal()."'");
		$query = $this->db->get('t_renungan');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function tambahRenungan(){
		$query = $this->db->query("select max(id) id from t_renungan");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'tanggal' => $this->getTanggal(),
			'judul' => $this->getJudul(),
			'bacaan' => $this->getBacaan(),
			'renungan' => $this->getRenungan(),
			'penulis' => $this->getPenulis(),
			'active' => '1'
		);
		$this->db->insert('t_renungan',$data);
	}
	
	function ubahRenungan(){
		$data = array(			
			'tanggal' => $this->getTanggal(),
			'judul' => $this->getJudul(),
			'bacaan' => $this->getBacaan(),
			'renungan' => $this->getRenungan(),
			'penulis' => $this->getPenulis()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_renungan',$data);
	}
	
	function deleteRenungan(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_renungan',$data);
	}
}