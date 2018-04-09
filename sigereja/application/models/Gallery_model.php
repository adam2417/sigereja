<?php
class Gallery_model extends CI_Model {
	private $gallery_path;
	private $gallery_path_url;
	private $id;
	private $gambar;
	private $publish;
	private $judul;
	private $deskripsi;
	private $tanggal;
	private $uploader;
	private $active;
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setGambar($gambar){
		$this->gambar = $gambar;
	}
	
	function getGambar(){
		return $this->gambar;
	}
	
	function setPublish($publish){
		$this->publish = $publish;
	}
	
	function getPublish(){
		return $this->publish;
	}
	
	function setJudul($judul){
		$this->judul = $judul;
	}
	
	function getJudul(){
		return $this->judul;
	}
	
	function setDeskripsi($desc){
		$this->deskripsi = $des;
	}
	
	function getDeskripsi(){
		return $this->deskripsi;
	}
	
	function setTanggal($tanggal){
		$this->tanggal = $tanggal;
	}
	
	function getTanggal(){
		return $this->tanggal;
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
	
	function getGalleryPath(){
		return $this->gallery_path;
	}
	
	function setGalleryPath($gallery_path){
		$this->gallery_path = $gallery_path;
	}
	
	function __construct() {
		parent::__construct();
		$this->setGalleryPath(realpath('asset/images/upload/'));
		$this->gallery_path_url = base_url().'asset/images/upload/';		
	}
        
        function postToDatabase(){
            $query = $this->db->query("select max(id) id from t_galery");
            $res = $query->result();
            $this->setId(($res[0]->id) + 1);
            $data = array(
                    'id' => $this->getId(),		
                    'gambar' => $this->getGambar(),
                    'judul' => $this->getJudul()                   
            );
            $this->db->insert('t_galery',$data);
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
		
		/*foreach ($files as $file) {
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
			);
		}
		
		return $images;(*/
                $this->db->select('gambar,judul');
                $query = $this->db->get('t_galery');
                $data = $query->result();                
                foreach ($data as $file) {                   
                    $images []= array (
                        'url' => $this->gallery_path_url . $file->gambar,
                        'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file->gambar,
                        'judul' => $file->judul
                    );
		}

                return $images;              
	}
}