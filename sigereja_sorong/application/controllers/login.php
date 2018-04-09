<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');		
	}
	
	function index(){
		$this->load->view('login/login');
	}
	
	function loginProcess(){
		if(isset($_POST['login'])){
			$rule_config = array(
				array(
					'field'=>'username',
					'label'=>'User Name',
					'rules'=>'trim|required|xss_clean|encode_php_tags|prep_for_form'
				),
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'trim|required|xss_clean|encode_php_tags|prep_for_form'
				)
			);
			$this->form_validation->set_rules($rule_config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if($this->form_validation->run() == false){
				$this->load->view('login/login');
			}else{
				$this->User_model->setUname($_POST['username']);
				$this->User_model->setPassword($_POST['password']);
				if($this->User_model->userLogin()){
					$arr_sess = array(
						'userid' => $this->User_model->getId(),
						'username' => $this->User_model->getUname(),
						'role' => $this->User_model->getRole(),
						'name' => $this->User_model->getFullName()
					);
					$array_currsession = array('userid'=>'','username'=>'','role'=>'','name'=>'');
					$this->session->unset_userdata($array_currsession);
					$this->session->set_userdata($arr_sess);
					$this->User_model->setLastLogin(date('Y-m-d H:i:s'));
					$this->User_model->modifyLastLogin();
					
					$data = array(
						'page_title' => 'Home',
						'name' => $this->User_model->getFullName(),
						'last_log' => $this->User_model->getLastLogin()						
					);
					$partials = array(
						'content'=> 'home/home'
					);
					$this->template->load('template/def_template',$partials,$data);
				}else{
					$data['message'] = "Maaf Username Dan Password Login Anda Salah";
					$this->load->view('login/login',$data);
				}
			}
		}
	}	
}