<?php
class Laporan_model extends CI_Model{
	private $wilayah;
	private $life;
	
	function setWilayah($wilayah){
		$this->wilayah = $wilayah;
	}
	
	function getWilayah(){
		return $this->wilayah;
	}
	
	function setLife($life){
		$this->life = $life;
	}
	
	function getLife(){
		return $this->life;
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function getDataKelompokUmur(){
		$query = $this->db->query("
			select
			(case
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 5 and 12 then 'Anak-anak'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 30 then 'Pemuda'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 30 and 50 then 'OrangTua'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
				else 'Others'
			end) kelompok_umur,
			ifnull(count(id_individu),0) jumlah
			from t_individu
				where status=1
				and life=1
				group by
				(case
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 5 and 12 then 'Anak-anak'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 31 then 'Pemuda'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 31 and 50 then 'OrangTua'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
					else 'Others'
				end)
		");
		return $query->result();
	}
        
        function getDataKelompokUmurAllData(){
		$query = $this->db->query("
			select
			(case
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 5 and 12 then 'Anak-anak'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 30 then 'Pemuda'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 30 and 50 then 'OrangTua'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
				else 'Others'
			end) kelompok_umur,
			nama_individu
			from t_individu
				where status=1
				and life=1
				group by
				(case
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 5 and 12 then 'Anak-anak'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 31 then 'Pemuda'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 31 and 50 then 'OrangTua'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
					else 'Others'
				end),nama_individu
		");
		return $query->result();
	}
	
	function getDataKelompokUmurByWilayah(){
		$query = $this->db->query("
			select
			(case
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365)  between 5 and 12 then 'Anak-anak'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 30 then 'Pemuda'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 30 and 50 then 'OrangTua'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
				else 'Others'
			end) kelompok_umur,
			ifnull(count(id_individu),0) jumlah,
			t_wilayah.nama nama_wilayah
			from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
				where status=1
				and life=1 and nama_wil = '". $this->getWilayah()."'
				group by
				(case
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365)  between 5 and 12 then 'Anak-anak'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 31 then 'Pemuda'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 31 and 50 then 'OrangTua'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
					else 'Others'
				end)
		");
		return $query->result();
	}
        
        function getDataKelompokUmurByWilayahAllData(){
		$query = $this->db->query("
			select
			(case
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365)  between 5 and 12 then 'Anak-anak'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 30 then 'Pemuda'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 30 and 50 then 'OrangTua'
				when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
				else 'Others'
			end) kelompok_umur,
			nama_individu,
			t_wilayah.nama nama_wilayah
			from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
				where status=1
				and life=1 and nama_wil = '". $this->getWilayah()."'
				group by
				(case
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) < 5 then 'Balita'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365)  between 5 and 12 then 'Anak-anak'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 12 and 20 then 'Remaja'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 20 and 31 then 'Pemuda'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) between 31 and 50 then 'OrangTua'
					when FLOOR(DATEDIFF(now(),tanggal_lahir)/365) > 50 then 'Manula'
					else 'Others'
				end),nama_individu
		");
		return $query->result();
	}
	
	function getDataIndividuAllWilayah(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status=1
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
        
        function getDataIndividuAllWilayahAllData(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,nama_individu from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status=1
			group by t_wilayah.nama,nama_individu
			order by t_wilayah.id");
		return $query->result();
	}
	
	function getDataIndividuAllWilayahByLifeStatus(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status=1 and t_individu.life='". $this->getLife() ."'
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
        
        function getDataIndividuAllWilayahByLifeStatusAllData(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,nama_individu from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status=1 and t_individu.life='". $this->getLife() ."'
			group by t_wilayah.nama,nama_individu
			order by t_wilayah.id");
		return $query->result();
	}
	
	function getDataIndividuByWilayah(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status =1 and t_individu.nama_wil='". $this->getWilayah() ."'
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
        
        function getDataIndividuByWilayahAllData(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,nama_individu from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status =1 and t_individu.nama_wil='". $this->getWilayah() ."'
			group by t_wilayah.nama,nama_individu
			order by t_wilayah.id");
		return $query->result();
	}
	
	function getDataIndividuByWilayahAndLifeStatus(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status =1 and t_individu.nama_wil='". $this->getWilayah() ."'
			and t_individu.life='". $this->getLife() ."'
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
        
        function getDataIndividuByWilayahAndLifeStatusAllData(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,nama_individu from t_individu
			join t_wilayah on t_individu.nama_wil = t_wilayah.id
			where t_individu.status =1 and t_individu.nama_wil='". $this->getWilayah() ."'
			and t_individu.life='". $this->getLife() ."'
			group by t_wilayah.nama,nama_individu
			order by t_wilayah.id");
		return $query->result();
	}
	
	function getDataKeluargaAllWilayah(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_keluarga
			join t_wilayah on t_keluarga.wilayah = t_wilayah.id
			where t_keluarga.active=1
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
	
	function getDataKeluargaByWilayah(){
		$query = $this->db->query("select t_wilayah.nama nama_wilayah,count(*) jumlah from t_keluarga
			join t_wilayah on t_keluarga.wilayah = t_wilayah.id
			where t_keluarga.active =1 and t_keluarga.wilayah='". $this->getWilayah() ."'
			group by t_wilayah.nama
			order by t_wilayah.id");
		return $query->result();
	}
}