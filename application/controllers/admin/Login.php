<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {	
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	public function index(){
		if($this->session->userdata('loggedUser')){
			redirect('admin/dashboard');
		}else{
			if($this->input->post()){
				$pass  = $this->input->post('password');
				$uname  = $this->input->post('username');
				$userexist = $this->adminmodel->dologin($uname,$pass);
				if($userexist != 0){
					$where = array("username" => $this->input->post('username'),"password" => $pass);
					$user = $this->adminmodel->getuser("users",$where);
					$this->session->set_userdata('loggedUser',$user);
					redirect('admin/dashboard');
				}else{
					$this->session->set_flashdata("error_message","<p class='err'>Error: Invalid Username/Password.</p>");
					redirect('admin/login');
				}
			}else{
				$this->load->view('admin/login');
			}
		} 
	}
	public function logout(){
		$this->session->unset_userdata('loggedUser');
		redirect("admin/login");
	}
}