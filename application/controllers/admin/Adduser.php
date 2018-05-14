<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adduser extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
                  $this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	public function index()
	{
		if($this->session->userdata('loggedUser')){
			//$DATAa = $this->adminmodel->adduser();
                    $data['title'] = "All User";
			$this->load->view('admin/users/adduser',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	public function add()
	{
		if($this->session->userdata('loggedUser')){
                    $data['title'] = "Add User";
			$product = $this->adminmodel->adduser();
				redirect('admin/adduser/allusers',$data);
		
		}else{
			redirect('admin/login');
		}
	}	
	public function allusers()
	{
		if($this->session->userdata('loggedUser')){
//			$allusers['alluser'] = $this->adminmodel->alluser();
                        
                          $config['base_url'] = base_url().'/admin/adduser/allusers'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_users();
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 4;  
			$config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
			$config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li><span><b>";
			$config['cur_tag_close'] = "</b></span></li>";
			$offset = $this->uri->segment(4,0);
			$this->pagination->initialize($config);
			$data['alluser'] = $this->adminmodel->alluser1($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
                        $data['title'] = "All User";
                        
			$this->load->view('admin/users/allusers',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	public function usereditform($id)
	{
		if($this->session->userdata('loggedUser')){
			$user = $this->adminmodel->edituserform($id);
                       
			$this->load->view('admin/users/edituser',$user);
		}else{
			redirect('admin/login');
		}
		
	}
	public function edituser($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->adminmodel->edituser($id);
			//echo "<pre>"; print_r($_POST); die();
                        $data['title'] = "All User";
			redirect('admin/adduser/allusers',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	public function deluser($id)
	{
		if($this->session->userdata('loggedUser')){
			$product = $this->adminmodel->deluser($id);
			//echo "<pre>"; print_r($_POST); die();
			redirect('admin/adduser/allusers');
		}else{
			redirect('admin/login');
		}
	}
	
}
