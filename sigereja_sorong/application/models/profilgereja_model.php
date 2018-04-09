<?php
class ProfilGereja_model extends CI_Model{
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
	
	// Create class constructor
	function __construct(){
		parent::__construct();
	}
	
	function insertProfileGereja(){
		$data = array(
			'description' => $this->getDescription(),
			'last_edited' => $this->getLastEdited(),
			'edited_by' => $this->getEditedBy()				
		);
		$this->db->insert('t_profilgereja',$data);
	}
	
	function getProfile(){		
		$query = $this->db->query("select tp.description,date_format(tp.last_edited,'%d %M %Y %H:%i') last_edited,tp.edited_by from t_profilgereja tp");
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	function editProfile(){
		$data = array(
			'description' => $this->getDescription(),
			'last_edited' => $this->getLastEdited(),
			'edited_by' => $this->getEditedBy()
		);
		$this->db->update('t_profilgereja',$data);
	}
	
	function updateProfile(){
		$data = array(
			'description' => $this->getDescription(),
			'last_edited' => $this->getLastEdited(),
			'edited_by' => $this->getEditedBy()
		);		
		$this->db->update('t_profilgereja',$data);
	}
}