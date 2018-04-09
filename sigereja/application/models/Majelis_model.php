<?php
class Majelis_model extends CI_Model {
	private $id;
	private $nama;
	private $wilayah;
	private $jabatan;
	private $tgl_pentahbisan;
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
	
	function setJabatan($jabatan){
		$this->jabatan = $jabatan;
	}
	
	function getJabatan(){
		return $this->jabatan;
	}
	
	function setTanggalTahbis($tglTahbis){
		$this->tgl_pentahbisan = $tglTahbis;
	}
	
	function getTanggalTahbis(){
		return $this->tgl_pentahbisan;
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
		$this->db->select("t_majelis.id,t_individu.nama_individu nama,date_format(tgl_pentahbisan,'%m/%d/%Y') tgl_pentahbisan,t_wilayah.nama nama_wilayah",false)->		
		join('t_individu','t_majelis.nama=t_individu.id_individu')->join('t_wilayah','t_majelis.wilayah=t_wilayah.id')
		->where(array('t_majelis.active'=>'1','t_wilayah.active'=>'1'));
		$query = $this->db->get('t_majelis');
		return $query->result();
	}
        
        function getAllListByWilayah(){
		$this->db->select("t_majelis.id,t_individu.nama_individu nama,date_format(tgl_pentahbisan,'%m/%d/%Y') tgl_pentahbisan,t_wilayah.nama nama_wilayah",false)->		
		join('t_individu','t_majelis.nama=t_individu.id_individu')->join('t_wilayah','t_majelis.wilayah=t_wilayah.id')
		->where(array('t_majelis.active'=>'1','t_wilayah.active'=>'1','t_wilayah.id'=>$this->getWilayah()));
		$query = $this->db->get('t_majelis');
		return $query->result();
	}
	
	function getOneSelect(){
		$this->db->select("t_majelis.id,t_individu.nama_individu nama,wilayah,jabatan,date_format(tgl_pentahbisan,'%m/%d/%Y')tgl_pentahbisan,t_wilayah.nama nama_wilayah",false)->		
		join('t_individu','t_majelis.nama=t_individu.id_individu')->join('t_wilayah','t_majelis.wilayah=t_wilayah.id')
		->where(array('t_majelis.active'=>'1','t_wilayah.active'=>'1','t_majelis.id'=>$this->getId()));
		$query = $this->db->get('t_majelis');
		return $query->result();
	}
	
	function editProfile(){		
		$data = array(			
			'wilayah' => $this->getWilayah(),
			'jabatan' => '',
			'tgl_pentahbisan' => $this->getTanggalTahbis()			
		);
		$this->db->where(array('active'=>'1','id'=>$this->getId()));
		$this->db->update('t_majelis',$data);
	}
	
	function tambahProfile(){
		$query = $this->db->query("select max(id) id from t_majelis");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'nama' => $this->getNama(),
			'wilayah' => $this->getWilayah(),
			'jabatan' => '',
			'tgl_pentahbisan' => $this->getTanggalTahbis(),
			'active' => '1'
		);
		$this->db->insert('t_majelis',$data);
	}
	
	function deleteProfile(){
		$data = array(			
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_majelis',$data);
	}
}