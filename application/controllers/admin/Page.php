<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
                   $this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
		$this->load->library('upload');
	}

	public function addpage()
	{
		if(!$this->session->userdata('loggedUser')){
				redirect('admin/login');
		}
                $data['title'] = "Add Page";
			if($this->input->post()){
				$this->db->insert('pages',$_POST); 
				//$this->db->insert('issue',$_POST); 
				redirect('admin/page/allpage');
			}else{
				
				$this->load->view('admin/page/addpage');
				
			}
		
	}
	
	
	public function allpage()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
                  $config['base_url'] = base_url().'/admin/page/allpage'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_page();
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
			$data['allpage'] = $this->adminmodel->allpage($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['file']   = 'admin/page/allpage';
                 $data['title'] = "All Pages";
              
			
		$this->load->view('admin/page/allpage',$data);
		
	}
	
        
      
        public function editpage($id)
	{
		if($this->session->userdata('loggedUser')){
                    $data['title'] = "All Pages";
			if($this->input->post()){
//				$this->upload->initialize($this->set_upload_options_issue());
//				$this->upload->do_upload();
//				$fileName = $_FILES['userfile']['name'];  
			 	$this->adminmodel->editpage($id);
				redirect('admin/page/allpage');
			}else{
				$data['page'] = $this->adminmodel->getpage($id);
				// echo "<pre>"; print_r($data); die;
//				$data['allbrands'] = $this->adminmodel->allbrands();
				$this->load->view('admin/page/editpage',$data);
			}
		}else{
			redirect('admin/login');
		}
	}
	
	
	
}
