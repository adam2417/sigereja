<?php
class Pendeta_model extends CI_Model{
	private $id;
	private $nama;
	private $tgl_tahbis;
	private $emiritus;
	private $biografi;
	private $status;
	private $foto;
	private $gallery_path;
	private $gallery_path_url;
	
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
	
	function setTanggalTahbis($tglTahbis){
		$this->tgl_tahbis = $tglTahbis;
	}
	
	function getTanggalTahbis(){
		return $this->tgl_tahbis;
	}
	
	function setEmiritus($emiritus){
		$this->emiritus = $emiritus;
	}
	
	function getEmiritus(){
		return $this->emiritus;
	}
	
	function setBiografi($biografi){
		$this->biografi = $biografi;
	}
	
	function getBiografi(){
		return $this->biografi;
	}
	
	function setStatus($status){
		$this->status = $status;
	}
	
	function getStatus(){
		return $this->status;
	}
	
	function setFoto($foto){
		$this->foto = $foto;
	}
	
	function getFoto(){
		return $this->foto;
	}
	
	function getGalleryPath(){
		return $this->gallery_path;
	}
	
	function setGalleryPath($gallery_path){
		$this->gallery_path = $gallery_path;
	}
	
	//Create class constructor
	function __construct(){
		parent::__construct();
		$this->setGalleryPath(realpath('asset/images/pendeta/'));
		$this->gallery_path_url = base_url().'asset/images/pendeta/';
	}
	
	function getPendetaList(){
		$this->db->select("t_pendeta.id id,t_individu.nama_individu nama,date_format(tgl_pentahbisan,'%m/%d/%Y') tgl_pentahbisan,date_format(emiritus,'%m/%d/%Y') emiritus,biografi,t_pendeta.status",false)->
                        join("t_individu","t_individu.id_individu=t_pendeta.nama")->where(array('t_pendeta.status'=>'1'));
		$query = $this->db->get('t_pendeta');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function getPendetaOneSelect(){
		$this->db->select("t_pendeta.id id,t_individu.nama_individu nama,date_format(tgl_pentahbisan,'%m/%d/%Y') tgl_pentahbisan,date_format(emiritus,'%m/%d/%Y') emiritus,biografi",false)->
                        join("t_individu","t_individu.id_individu=t_pendeta.nama")->where(array('t_pendeta.status'=>'1','t_pendeta.id'=>$this->getId()));
		$query = $this->db->get('t_pendeta');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function ubahPendeta(){
		if($this->getFoto()){
			$data = array(
				'tgl_pentahbisan' => $this->getTanggalTahbis(),
				'emiritus' => $this->getEmiritus(),
				'biografi' => $this->getBiografi(),
				'foto' => $this->getFoto()
			);			
		}else{
			$data = array(
				'tgl_pentahbisan' => $this->getTanggalTahbis(),
				'emiritus' => $this->getEmiritus(),
				'biografi' => $this->getBiografi()
			);
		}
		$query = $this->db->where('id',$this->getId());		
		$this->db->update('t_pendeta',$data);		
	}
	
	function tambahPendeta(){
		$query = $this->db->query("select max(id) id from t_pendeta");
		$res = $query->result();
		$this->setId(($res[0]->id) + 1);
		$data = array(
			'id' => $this->getId(),
			'nama' => $this->getNama(),
			'tgl_pentahbisan' => $this->getTanggalTahbis(),
			'emiritus' => $this->getEmiritus(),
			'biografi' => $this->getBiografi(),
			'foto' => $this->getFoto(),
			'status' => '1'
		);
		$this->db->insert('t_pendeta',$data);
	}
	
	function hapusPendeta(){
		$data = array(
			'status' => '0'
		);
		$this->db->where('id',$this->getId());
		$this->db->update('t_pendeta',$data);
	}
	
	function do_upload() {		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->getGalleryPath(),
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->getGalleryPath() . '/thumbs',
			'maintain_ration' => true,
			'width' => 185,
			'height' => 105
		);
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();		
	}
	
	function get_images() {
		$files = scandir($this->getGalleryPath());
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		$this->db->select("foto")->where(array('status'=>'1','id'=>$this->getId()));
		$query = $this->db->get('t_pendeta');
		$data = $query->result();
		$file = $data[0]->foto;
				
		return $this->gallery_path_url . 'thumbs/' . $file;
	}
}