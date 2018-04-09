<?php
class Strukorg_model extends CI_Model {
	private $description;
	private $last_edited;
	private $image;
	private $edited_by;
	private $gallery_path_url;
	
	function setDescription($description){
		$this->description = $description;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function setLastEdited($lastedited){
		$this->last_edited = $lastedited;
	}
	
	function getLastEdited(){
		return $this->last_edited;
	}
	
	function setEditedBy($editedBy){
		$this->edited_by = $editedBy;
	}
	
	function getEditedBy(){
		return $this->edited_by;
	}
	
	function setStrukOrgImage($img){
		$this->image = $img;
	}
	
	function getStrukOrgImage(){
		return $this->image;
	}
	
	function __construct(){
		parent::__construct();
		$this->setStrukOrgImage(realpath('asset/images/strukorg/'));
		$this->gallery_path_url = base_url().'asset/images/strukorg/';
	}
	
	function getStrukOrg(){
		$this->db->select("description,date_format(last_edited,'%d %M %Y %H:%i') last_edited,edited_by",false);
		$query = $this->db->get('t_strukturorg');
		return $query->result();
	}
	
	function updateProfile(){
		$data = array(
			'description' => $this->getDescription(),
			'last_edited' => $this->getLastEdited(),
			'edited_by' => $this->getEditedBy()
		);		
		$this->db->update('t_strukturorg',$data);
	}
	
	function do_upload() {		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->getStrukOrgImage(),
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->getStrukOrgImage() . '/thumbs',
			'maintain_ration' => true,
			'width' => 185,
			'height' => 105
		);
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		
	}
	
	function get_images() {
		$files = scandir($this->getStrukOrgImage());
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		foreach ($files as $file) {
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
			);
		}
		
		return $images;
	}
}