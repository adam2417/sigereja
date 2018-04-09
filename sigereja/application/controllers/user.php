<?php
class User extends CI_Controller{
	
	// Calling a class constructor
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');		
	}
	
	function index(){                
		$data = array(
			'page_title'=>'User List',
			'name'=>$this->session->userdata('name'),
			'userlist' => $this->User_model->getListdata(),
			'role' => $this->session->userdata('role')
		);
		$content = array(
			'content' => 'user/user'			
		);		
		$this->template->add_js('alert("test");','embed');
		$this->template->load('template/def_template',$content,$data);
	}
	
	function userProfileById(){
		$id = $this->uri->segment(3);
		$this->User_model->setId($id);
		$queryData = array(
			'page_title' => 'Profil User',
			'userloop' => $this->User_model->getProfileById(),
			'name' => $this->session->userdata('name')
		);
		$content = array(
			'content' => 'user/user_profile'
		);
		$this->template->load('template/def_template',$content,$queryData);
	}

	function userProfile(){
		$this->User_model->setUname($this->session->userdata('username'));
		$queryData = array(
			'page_title' => 'Profil User',
			'userloop' => $this->User_model->getProfileByUname(),
			'name' => $this->session->userdata('name')
		);
		$content = array(
			'content' => 'user/user_profile'
		);
		$this->template->load('template/def_template',$content,$queryData);
	}
	
	function editProfile(){		
		if(isset($_POST['btnSave'])){
			$username = $_POST['username'];			
			$fullname = $_POST['fname'];
			$role = $_POST['role'];			
			
			$id = $this->uri->segment(3);
			if($id){
				$this->User_model->setId($id);
			}
			
			$this->User_model->setUname($username);
			$this->User_model->setFullName($fullname);			
			$this->User_model->setRole($role);
						
			$this->User_model->modifyUserName();
			$this->User_model->modifyFullname();
			
			if(isset($_POST['password'])){
				$password = $_POST['password'];
				$this->User_model->setPassword($password);
				$this->User_model->modifyPassword();
			}			
			$this->User_model->modifyRole();
			
			redirect('user');
		}else{
			$id = $this->uri->segment(3);
			if(!$id){
				$this->load->model('Role_model');			
				$this->User_model->setUname($this->session->userdata('username'));		
				$queryData = array(
					'page_title' => 'Edit Profil User',
					'userloop' => $this->User_model->getProfileByUname(),
					'name' => $this->session->userdata('name'),
					'datacombo' => $this->Role_model->getRoleData()
				);
			}else{				
				$this->User_model->setId($id);
				$this->load->model('Role_model');	
				$queryData = array(
					'page_title' => 'Edit Profil User',
					'userloop' => $this->User_model->getProfileById(),
					'name' => $this->session->userdata('name'),
					'datacombo' => $this->Role_model->getRoleData()
				);
			}
			$content = array(
				'content' => 'user/modifyuser'
			);
			$this->template->load('template/def_template',$content,$queryData);
		}
	}
	
	function tambahUser(){		
		if(isset($_POST['btnSave'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fname'];
			$role = $_POST['role'];
			
			$this->User_model->setUname($username);
			$this->User_model->setPassword(md5($password));
			$this->User_model->setFullName($fullname);
			$this->User_model->setRole($role);
			
			$this->User_model->tambahUser();
			
			redirect('user');
		}else{
			$this->load->model('Role_model');		
			$queryData = array(
				'page_title' => 'Tambah User',
				'userloop' => $this->User_model->getProfileByUname(),
				'name' => $this->session->userdata('name'),
				'datacombo' => $this->Role_model->getRoleData()
			);
			$content = array(
				'content' => 'user/add'
			);
			$this->template->load('template/def_template',$content,$queryData);
		}
	}
	
	function deleteUser(){
		$id = $this->uri->segment(3);
		$this->User_model->setId($id);
		$this->User_model->deleteProfile();
		redirect('user');
	}
	
	function logout()
	{		
                $array_currsession = array('userid'=>'','username'=>'','role'=>'','name'=>'');
                $this->session->unset_userdata($array_currsession);             
		$data['message'] = 'Anda telah logout dari sistem.';
		$this->load->view('login/login',$data);
	}
}