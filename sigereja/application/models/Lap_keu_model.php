<?php

class Lap_keu_model extends CI_Model {
	private $id;
	private $tanggal;
	private $jum_pemasukan;
	private $jum_pengeluaran;
	private $saldo_akhir;
	private $keterangan;
	
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
	
	function setJum_pemasukan($jum_pemasukan){
		$this->jum_pemasukan = $jum_pemasukan;
	}
	
	function getJum_pemasukan(){
		return $this->jum_pemasukan;
	}
	
	function setJum_pengeluaran($jum_pengeluaran){
		$this->jum_pengeluaran = $jum_pengeluaran;
	}
	
	function getJum_pengeluaran(){
		return $this->jum_pengeluaran;
	}
	
	function setSaldo_akhir($saldo_akhir){
		$this->saldo_akhir = $saldo_akhir;
	}
	
	function getSaldo_akhir(){
		return $this->saldo_akhir;
	}
	
	function setKeterangan($keterangan){
		$this->keterangan = $keterangan;
	}
	
	function getKeterangan(){
		return $this->keterangan;
	}

	// Create class constructor
	function __construct(){
		parent::__construct();
	}
	
	function getLap_keuList(){
		$this->db->select("id,date_format(tanggal,'%d %M %Y') tanggal,jum_pemasukan,jum_pengeluaran,saldo_akhir,keterangan",false)->where("date_format(tanggal,'%d %M %Y') <= now()");
		$query = $this->db->get('t_rekap_lap_keu');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getLap_keuOneSelect(){
		$this->db->select("id,date_format(tanggal,'%m/%d/%Y') tanggal,jum_pemasukan,jum_pengeluaran,saldo_akhir,keterangan",false)->
		where(array('id'=>$this->getId()));
		$query = $this->db->get('t_rekap_lap_keu');
		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function tambahLap_keu(){
		$query = $this->db->query("select max(id) id from t_rekap_lap_keu");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(		
			'id' => $this->getId(),
			'tanggal' => $this->getTanggal(),
			'jum_pemasukan' => $this->getJum_pemasukan(),
			'jum_pengeluaran' => $this->getJum_pengeluaran(),
			'saldo_akhir' => $this->getSaldo_akhir(),
			'keterangan' => $this->getKeterangan()
		);
		$this->db->insert('t_rekap_lap_keu',$data);
	}
	
	function ubahLap_keu(){
		$data = array(			
			'tanggal' => $this->getTanggal(),
			'jum_pemasukan' => $this->getJum_pemasukan(),
			'jum_pengeluaran' => $this->getJum_pengeluaran(),
			'saldo_akhir' => $this->getSaldo_akhir(),
			'keterangan' => $this->getKeterangan()
		);
		$this->db->where(array('id'=>$this->getId()));
		$this->db->update('t_rekap_lap_keu',$data);
	}
        
        function hapusLaporan(){            
            $this->db->delete('t_rekap_lap_keu',array('id'=>$this->getId()));
        }
}
