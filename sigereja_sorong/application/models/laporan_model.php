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
    
    function getDataIndividuAll() {
        $this->db->select("id_individu,nama_individu,parm_jenkel.param_desc jenis_kelamin,tempat_lahir,date_format(tanggal_lahir,'%d/%m/%Y') tanggal_lahir,t_individu.baptis baptis_id,parm_baptis.param_desc baptis,t_individu.sidi sidi_id,parm_sidi.param_desc sidi,t_individu.status_nikah, param_stat_nikah.param_desc stat_nikah,t_individu.id_keluarga,t_keluarga.nama nama_keluarga,t_keluarga.wilayah,t_wilayah.nama nama_wil,t_individu.pekerjaan pekerjaan_id,parm_pekerjaan.param_desc pekerjaan,t_individu.gol_darah, parm_gol_darah.param_desc gol_darah,date_format(tanggal_nikah,'%d/%m/%Y') tanggal_nikah,tempat_nikah,t_individu.stat_hub_dlm_kel sta_kel,parm_stat_hub_kel.param_desc stat_hub_dlm_kel,t_individu.pendidikan_terakhir pend_akhir,parm_pendidikan.param_desc pendidikan_terakhir,gelar,asal_gereja,nama_ibu,nama_ayah,suku,t_individu.intra intra_id,parm_intra.param_desc intra,t_individu.status_domisili stat_dom,parm_stat_dom.param_desc status_domisili,parm_life.param_desc life", false)->join('t_param param_stat_nikah', 't_individu.status_nikah=param_stat_nikah.param_val','left')->join('t_keluarga', 't_keluarga.id=t_individu.id_keluarga')->join('t_wilayah','t_keluarga.wilayah=t_wilayah.id')->join('t_param parm_gol_darah','t_individu.gol_darah=parm_gol_darah.param_val','left')->join('t_param parm_pekerjaan','t_individu.pekerjaan=parm_pekerjaan.param_val','left')->join('t_param parm_jenkel','t_individu.jenis_kelamin=parm_jenkel.param_val','left')->join('t_param parm_pendidikan','t_individu.jenis_kelamin=parm_pendidikan.param_val','left')->join('t_param parm_stat_hub_kel','t_individu.stat_hub_dlm_kel=parm_stat_hub_kel.param_val','left')->join('t_param parm_intra','t_individu.intra=parm_intra.param_val','left')->join('t_param parm_stat_dom','t_individu.intra=parm_stat_dom.param_val','left')->join('t_param parm_baptis','t_individu.baptis=parm_baptis.param_val','left')->join('t_param parm_sidi','t_individu.sidi=parm_sidi.param_val','left')->join('t_param parm_life','t_individu.life=parm_life.param_val','left')
                ->where(array('t_individu.status' => '1','parm_gol_darah.param_typ'=>'GOLONGAN_DARAH','parm_pekerjaan.param_typ'=>'PEKERJAAN','param_stat_nikah.param_typ'=>'STATUS_NIKAH','parm_jenkel.param_typ'=>'SEX_TYPE','parm_pendidikan.param_typ'=>'PENDIDIKAN','parm_stat_hub_kel.param_typ'=>'STAT_HUB_KEL','parm_intra.param_typ'=>'INTRA','parm_stat_dom.param_typ'=>'STATUS_DOMISILI','parm_baptis.param_typ'=>'STATUS_BAPTIS','parm_sidi.param_typ'=>'STATUS_SIDI','parm_life.param_typ'=>'STATUS_LIFE'))->order_by('nama_individu', 'ASC');
        $query = $this->db->get('t_individu');
        return $query->result();
    }    
}