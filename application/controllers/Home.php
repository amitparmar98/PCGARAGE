<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
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
		//$this->load->view('front/home');
		if($this->input->post()){
		 $rts = $this->adminmodel->contact();
		//$strs = 'product/index/'.$_POST['pid'];
		$this->session->set_flashdata("successmessage",'<p class="green" style="border-radius: 3px;color: rgb(255, 255, 255);font-weight: bold;padding: 4px;">Message SUCCESSFULLY Send</p>');
		redirect('home');
		}else{
		$this->load->view('home');	
		}
	}
	public function frontform()
	{
		//$this->load->view('front/home');
		if($this->input->post()){
		 $rts = $this->adminmodel->frontform();
		//$strs = 'product/index/'.$_POST['pid'];
		$this->session->set_flashdata("successmessage",'<p class="green" style="border-radius: 3px;color: rgb(255, 255, 255);font-weight: bold;padding: 4px;">Message SUCCESSFULLY Send</p>');
		redirect('home');
		}else{
		$this->load->view('front/home');	
		}
	}
}