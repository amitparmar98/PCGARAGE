<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	public function index()
	{
		if($this->session->userdata('loggedUser')){
			$this->load->view('admin/dashboard');
		}else{
			redirect('admin/login');
		}
		
	}
}
