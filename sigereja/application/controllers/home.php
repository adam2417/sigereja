<?php
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
        if(!($this->session == null)){    
			$this->session->sess_destroy();
		}
		$dataprofile = array(
			'page_title' => 'Home',
			'name' => $this->session->userdata('name')			
		);
		//var_dump($this->session->userdata['name']);exit;
		$arr_sess = array(			
			'name' => 'Guest'
		);
		$this->session->set_userdata($arr_sess);
		
		$content = array(
			'content' => 'home/home'			
		);
		$this->template->load('template/def_template',$content,$dataprofile);
	}
}