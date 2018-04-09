<?php

class Pa_model extends CI_Model {
	private $id;
	private $wilayah;
	private $keluarga;
	private $tgl_kebaktian;
	private $pemimpin;
	private $pendamping;	
	private $status;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setWilayah($wilayah){
		$this->wilayah = $wilayah;
	}
	
	function getWilayah(){
		return $this->wilayah;
	}
	
	function setKeluarga($keluarga){
		$this->keluarga = $keluarga;
	}
	
	function getKeluarga(){
		return $this->keluarga;
	}
	
	function setTgl_kebaktian($tgl_kebaktian){
		$this->tgl_kebaktian = $tgl_kebaktian;
	}
	
	function getTgl_kebaktian(){
		return $this->tgl_kebaktian;
	}
	
	function setPemimpin($pemimpin){
		$this->pemimpin = $pemimpin;
	}
	
	function getPemimpin(){
		return $this->pemimpin;
	}
	
	function setPendamping($pendamping){
		$this->pendamping = $pendamping;
	}
	
	function getPendamping(){
		return $this->pendamping;
	}
	
	function setStatus($status){
		$this->status = $status;
	}
	
	function getStatus(){
		return $this->status;
	}

	// Create class constructor
	function __construct(){
		parent::__construct();
	}
	
	function getPaList(){
		$this->db->select("t_pa.id,t_wilayah.nama,t_keluarga.nama keluarga,date_format(tgl_kebaktian,'%d %M %Y') tgl_kebaktian,t_individu.nama_individu pemimpin,pendamping",false)->
		from('t_pa')->join('t_wilayah','t_pa.wilayah=t_wilayah.id')->join('t_keluarga','t_pa.keluarga=t_keluarga.id')->join('t_majelis','t_pa.pemimpin=t_majelis.id')->
                        join('t_individu','t_individu.id_individu=t_majelis.nama')->where(array('t_pa.status'=>'1'))->where("date_format(tgl_kebaktian,'%d %M %Y') <= now()");
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getPaOneSelect(){
		$query = $this->db->query("
                        SELECT t_pa.id id_pa, t_wilayah.id id_wil, t_wilayah.nama nama_wil, t_keluarga.nama keluarga, date_format(tgl_kebaktian, '%m/%d/%Y') tgl_kebaktian,date_format(tgl_kebaktian, '%H:%i') waktu_kebaktian,t_mj.nama pemimpin,t_pa.pemimpin pemimpin_id,t_mji.nama pendamping,t_pa.pendamping pendamping_id
                        FROM (`t_pa`)
                        JOIN `t_wilayah` ON `t_pa`.`wilayah`=`t_wilayah`.`id` 
                        JOIN `t_keluarga` ON `t_pa`.`keluarga`=`t_keluarga`.`id`
                        join (select t_majelis.id,nama_individu nama from t_individu join t_majelis on t_individu.id_individu = t_majelis.nama) t_mj on t_mj.id = t_pa.pemimpin
                        join (select t_majelis.id,nama_individu nama from t_individu join t_majelis on t_individu.id_individu = t_majelis.nama) t_mji on t_mji.id = t_pa.pendamping
                        WHERE `t_pa`.`status` = '1' AND `t_pa`.`id` = '". $this->getId() ."'
                    ");		
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
    
	function tambahPa(){
		$query = $this->db->query("select max(id) id from t_pa");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'wilayah' => $this->getWilayah(),
			'keluarga' => $this->getKeluarga(),
			'tgl_kebaktian' => $this->getTgl_kebaktian(),
			'pemimpin' => $this->getPemimpin(),
			'pendamping' => $this->getPendamping(),
			'status' => '1'
		);
		$this->db->insert('t_pa',$data);
	}
	
	function ubahPa(){
		$data = array(			
			'wilayah' => $this->getWilayah(),
			'keluarga' => $this->getKeluarga(),
			'tgl_kebaktian' => $this->getTgl_kebaktian(),
			'pemimpin' => $this->getPemimpin(),
			'pendamping' => $this->getPendamping()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_pa',$data);
	}
	
	function deletePa(){
		$data = array(			
			'status' => '0'
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_pa',$data);
	}
 }
 
 ?>