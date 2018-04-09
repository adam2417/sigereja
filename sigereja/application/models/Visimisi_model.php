<?php
class Visimisi_model extends CI_Model {
private $description;
	private $last_edited;
	private $edited_by;
	
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
	
	function __construct(){
		parent::__construct();
	}
	
	function getVisiMisi(){
		$this->db->select("description,date_format(last_edited,'%d %M %Y %H:%i') last_edited,edited_by",false);
		$query = $this->db->get('t_visimisi');
		return $query->result();
	}
	
	function updateProfile(){
		$data = array(
			'description' => $this->getDescription(),
			'last_edited' => $this->getLastEdited(),
			'edited_by' => $this->getEditedBy()
		);		
		$this->db->update('t_visimisi',$data);
	}
}