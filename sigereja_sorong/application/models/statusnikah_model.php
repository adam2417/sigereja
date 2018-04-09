<?php
class Statusnikah_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getStatusNikahList(){
		$query = $this->db->get('t_status_nikah');
		return $query->result();
	}
}