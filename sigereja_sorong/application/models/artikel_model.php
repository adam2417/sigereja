<?php
class Artikel_model extends CI_Model {
	private $id;
	private $tanggal;
	private $judul_artikel;
	private $deskripsi;
	private $uploader;
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
	
	function setJudulArtikel($judul){
		$this->judul_artikel = $judul;
	}
	
	function getJudulArtikel(){
		return $this->judul_artikel;
	}
	
	function setDeskripsi($deskripsi){
		$this->deskripsi = $deskripsi;
	}
	
	function getDeskripsi(){
		return $this->deskripsi;
	}
	
	function setUploader($uploader){
		$this->uploader = $uploader;
	}
	
	function getUploader(){
		return $this->uploader;
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
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_artikel');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("id,date_format(tanggal,'%d %M %Y')tanggal_upload,judul_artikel,deskripsi,uploader,active",false)->where(array('active'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_artikel');
		return $query->result();
	}
	
	function getArtikelFindByDate(){
		$this->db->select("id,date_format(tanggal,'%m/%d/%Y')tanggal_upload,judul_artikel,deskripsi,uploader,active",false)->
		where(array('active'=>'1'))->where("date_format(tanggal,'%Y-%m-%d') = '".$this->getTanggal()."'");
		$query = $this->db->get('t_artikel');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function ubahArtikel(){
		$data = array(
			'judul_artikel' => $this->getJudulArtikel(),
			'deskripsi' => $this->getDeskripsi()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_artikel',$data);
	}
	
	function tambahArtikel(){
		$query = $this->db->query("select max(id) id from t_artikel");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'tanggal' => $this->getTanggal(),
			'judul_artikel' => $this->getJudulArtikel(),
			'deskripsi' => $this->getDeskripsi(),
			'uploader' => $this->getUploader(),
			'active' => '1'
		);
		$this->db->insert('t_artikel',$data);
	}
	
	function deleteArtikel(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_artikel',$data);
	}
}