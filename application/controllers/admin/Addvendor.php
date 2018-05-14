<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addvendor extends CI_Controller {
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
                    $data['title'] = "All Vendor";
			//$DATAa = $this->adminmodel->adduser();
			$this->load->view('admin/vendor/addvendor',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	 public function addv()
	{
		if($this->session->userdata('loggedUser')){
			$product = $this->adminmodel->addvendor();
                         $data['title'] = "Add Vendor";
				redirect('admin/addvendor/allvendor',$data);
		
		}else{
			redirect('admin/login');
		}
	}	
	public function allvendor()
	{
		if($this->session->userdata('loggedUser')){
//			$alluser['allvendor'] = $this->adminmodel->allvendor();
                        
                        $config['base_url'] = base_url().'/admin/addvendor/allvendor'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_vendor();
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
                        $data['title'] = "All Vendor";
			$this->pagination->initialize($config);
			$data['allvendor'] = $this->adminmodel->allvendor1($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
                        
                        
                        
			$this->load->view('admin/vendor/allvendor',$data);
		}
                else
                    {
			redirect('admin/login');
		}
		
	}
	public function vendoreditform($id)
	{
		if($this->session->userdata('loggedUser')){
			$user = $this->adminmodel->editvendorform($id);
			$this->load->view('admin/vendor/editvendor',$user);
		}else{
			redirect('admin/login');
		}
		
	}
	public function editvendor($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->adminmodel->editvendor($id);
			//echo "<pre>"; print_r($_POST); die();
                        $data['title'] = "All Vendor";
			redirect('admin/addvendor/allvendor',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	public function delvendor($id)
	{
		if($this->session->userdata('loggedUser')){
			$product = $this->adminmodel->delvendor($id);
			//echo "<pre>"; print_r($_POST); die();
			redirect('admin/addvendor/allvendor');
		}else{
			redirect('admin/login');
		}
	} 
	
}
