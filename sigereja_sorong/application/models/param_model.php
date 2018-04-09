<?php
class Param_model extends CI_Model {
	private $param_typ;
	private $param_desc;
	private $active;
	
	function setParamType($type){
		$this->param_typ = $type;	
	}
	
	function getParamType(){
		return $this->param_type;
	}
	
	function setParamDesc($desc){
		$this->param_desc = $desc;
	}
	
	function getParamDesc(){
		return $this->param_desc;
	}
	
	function setActive($active){
		$this->active = $active;
	}
	
	function getActive(){
		return $this->active;
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function getParamList(){
		$this->db->where(array('active'=>'1'));
		$query = $this->db->get('t_param');
		return $query->result();
	}
    
    function getParamListWithParam($paramType){
		$this->db->where(array('active'=>'1','param_typ'=>$paramType));
		$query = $this->db->get('t_param');
		return $query->result();
	}
	
	function getParamOneSelect(){
		$this->db->where(array('active'=>'1','param_typ'=>$this->getParamType()));
		$query = $this->db->get('t_param');
		return $query->result();
	}
	
	function editParamList(){
		$data = array(
			'param_desc' => $this->getParamDesc()
		);
		$this->db->where(array('active'=>'1','id'=>$this->getParamType()));
		$this->db->update('t_param',$data);
	}
	
	function insertParam(){
		$query = $this->db->query("select max(id) id from t_param");
		$res = $query->result();
		$last_id = $res[0]->id;
		$next_id = $last_id + 1;
		
		$data = array(
			'id' => $next_id,
			'param_desc' => $this->getNama(),
			'active' => '1'
		);
		$this->db->insert('t_param',$data);		
	}
	
	function hapusParam(){
		$data = array(
			'active' => '0'
		);
		$this->db->where(array('id'=>$this->getParamType()));
		$this->db->update('t_param',$data);
	}
}