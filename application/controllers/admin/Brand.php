<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends CI_Controller {
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
	public function index()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
                
//		$data['allbrands'] = $this->adminmodel->allbrands();
                
            $config['base_url'] = base_url().'/admin/brand/index'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_brands_allbrand();
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
			$data['allbrands'] = $this->adminmodel->allbrands1($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
			
                          $data['title'] = "All Brand";
                                
		$this->load->view('admin/brand/allbrands',$data);
		
	}
	public function viewsubbrand($id)
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
              $data['allbrands'] = $this->adminmodel->allbrands();
               	$data['allbrands'] = $this->adminmodel->subBrands1($id);
                        $queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$id."'");
			$data['brand'] = $queryi->row();
			$data['title'] = "All Brand";
              $this->load->view('admin/brand/allsubbrands',$data);
		
	}
	
	public function addmodal()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
                 $data['title'] = "Add Modal";
		if($this->input->post()){
			$this->upload->initialize($this->set_upload_options_modals());
			$this->upload->do_upload();
			$_POST['image']=$_FILES['userfile']['name'];
			$this->db->insert('modals',$_POST); 
			redirect('admin/brand/modal');
		}else{
			$data['allbrands']=$this->adminmodel->allSubbrands();
                        
			$this->load->view('admin/brand/addmodal',$data);
		}	
		
	}
	public function editmodal($id)
	{
		if($this->session->userdata('loggedUser')){
                     $data['title'] = "All Modal";
			if($this->input->post()){
				$this->upload->initialize($this->set_upload_options_modals());
				$this->upload->do_upload();
				$fileName = $_FILES['userfile']['name'];  
				$data = $this->adminmodel->editmodal($id,$fileName);
				redirect('admin/brand/modal');
			}else{
				$data['modal'] = $this->adminmodel->getmodal($id);
				//print_r($user); die();
				$data['allbrands'] = $this->adminmodel->allSubbrands();
                              
				$this->load->view('admin/brand/editmodals',$data);
			}
		}else{
			redirect('admin/login');
		}
	}
	public function getmodal($id)
	{
//		$id = $_POST['bid'];
//		$id = '6';
         
		$data = $this->adminmodel->getmodal1($id);
                
            header('Content-Type: application/json');
                echo json_encode( $data );
//		return json_encode($data);
		
	}
	public function delmodal($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->db->query('DELETE FROM modals WHERE id="'.$id.'"');
			redirect('admin/brand/modal');
		}else{
			redirect('admin/login');
		}
	}
	
	
	public function add()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
		if($this->input->post()){
			$this->upload->initialize($this->set_upload_options_brands());
			$this->upload->do_upload();
			$_POST['image']=$_FILES['userfile']['name'];
			$this->db->insert('brands',$_POST); 
			redirect('admin/brand');
		}else{
			$data['allbrands']=$this->adminmodel->allParentbrands();
                        $data['title'] = "Add Brand";
			$this->load->view('admin/brand/add',$data);
			
		}	
	}
	public function editbrandform($id)
	{
		if($this->session->userdata('loggedUser')){
			if($this->input->post()){
				$this->upload->initialize($this->set_upload_options_brands());
				$this->upload->do_upload();
				$fileName = $_FILES['userfile']['name'];  
			 	$this->adminmodel->editbrand($id,$fileName);
				redirect('admin/brand'); 
			}else{
				$data['brandi'] = $this->adminmodel->getbrand($id);
				// echo "<pre>"; print_r($data); die;
				$data['allbrands'] = $this->adminmodel->allParentbrands();
                                 $data['title'] = "All Brand";
				$this->load->view('admin/brand/editbrands',$data);
			}
		}else{
			redirect('admin/login');
		}
	}
	public function delbrand($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->db->query('DELETE FROM brands WHERE id="'.$id.'"');
			redirect('admin/brand');
		}else{
			redirect('admin/login');
		}
	}
	
	public function issue()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
        if(isset($_POST['search']) && !empty($_POST['search'])) {
			$data['allissue'] = $this->adminmodel->searchissue($_POST['search']);
			$data['pagination'] = '';
		}else{        
            $config['base_url'] = base_url().'/admin/brand/issue'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_issue();
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
			$data['allissue'] = $this->adminmodel->allissue1($config['per_page'], $offset);
		}	
			// echo "<pre>"; print_r($data['allissue']); die;
			$data['title'] = "All Issue";
			$data['pagination'] = $this->pagination->create_links();
                        
//		$data['allissue'] = $this->adminmodel->allissue();
		$this->load->view('admin/brand/allissue',$data);
		
	}
	public function addissue()
	{
		if(!$this->session->userdata('loggedUser')){
				redirect('admin/login');
		}
                $data['title'] = "Add Issue";
			if($this->input->post()){
				$this->upload->initialize($this->set_upload_options_issue());
				$this->upload->do_upload();
				$_POST['image']=$_FILES['userfile']['name'];
				$this->db->insert('pc_issue',$_POST); 
				//$this->db->insert('issue',$_POST); 
				redirect('admin/brand/issue');
			}else{
				$data['allbrands']=$this->adminmodel->allbrands11();
				$this->load->view('admin/brand/addissue',$data);
				
			}
		
	}
	
	public function editissue($id)
	{
		if($this->session->userdata('loggedUser')){
                    $data['title'] = "All Issue";
			if($this->input->post()){
				$this->upload->initialize($this->set_upload_options_issue());
				$this->upload->do_upload();
				$fileName = $_FILES['userfile']['name'];  
			 	$this->adminmodel->editissue($id,$fileName);
				redirect('admin/brand/issue');
			}else{
				$data['issue'] = $this->adminmodel->getissue($id);
				// echo "<pre>"; print_r($data); die;
				$data['allbrands'] = $this->adminmodel->allbrands11();
				$this->load->view('admin/brand/editissue',$data);
			}
		}else{
			redirect('admin/login');
		}
	}
	
	public function delissue($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->db->query('DELETE FROM pc_issue WHERE id="'.$id.'"');
			redirect('admin/brand/issue');
		}else{
			redirect('admin/login');
		}
	}
	public function modal()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		} 
		
		if(isset($_POST['search']) && !empty($_POST['search'])) {
			$data['allmodals'] = $this->adminmodel->searchmodel($_POST['search']);
			$data['pagination'] = '';
		}else{
			$config['base_url'] = base_url().'/admin/brand/modal'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_modal();
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
			$data['allmodals'] = $this->adminmodel->allModals1($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
	
		}
        
		$data['title'] = "All Modal";
        $this->load->view('admin/brand/allmodals',$data);
		
	}
	
	
	public function addissues()
	{
		if(!$this->session->userdata('loggedUser')){
				redirect('admin/login');
		}
                $data['title'] = "Add Issue";
			if($this->input->post()){
				//echo "<pre>"; print_r($_POST); die;
				$this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload();
				$fileName = $_FILES['userfile']['name'];  
				$data = $this->adminmodel->addissue($fileName);
				//echo "<pre>"; print_r($data); die;
				//$this->db->insert('issue',$_POST); 
				redirect('admin/brand/allservice');
			}else{
				$data['allbrands']=$this->db->query('SELECT * FROM brands WHERE pid = 0')->result();
				$this->load->view('admin/brand/addissue',$data);
				
			}
		
		
		
	}
        
        public function allservice()
	{
		if(!$this->session->userdata('loggedUser')){
			redirect('admin/login');
		}
                
                  $config['base_url'] = base_url().'/admin/brand/allservice'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_service();
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
                        $data['title'] = "All Service";
			$this->pagination->initialize($config);
			$data['allservice'] = $this->adminmodel->allservice1($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
                        
//		$data['allissue'] = $this->adminmodel->allissue();
		$this->load->view('admin/service/allservice',$data);
		
	}
        
        public function addService()
	{
		if(!$this->session->userdata('loggedUser')){
				redirect('admin/login');
		}
                $data['title'] = "Add Service";
			if($this->input->post()){
//				$this->upload->initialize($this->set_upload_options());
//				$this->upload->do_upload();
//				$_POST['image']=$_FILES['userfile']['name'];
				$this->db->insert('services',$_POST); 
				//$this->db->insert('issue',$_POST); 
				redirect('admin/brand/allservice');
			}
                        else{
				
				$this->load->view('admin/service/addService',$data);
				
			}
		
	}
        public function editService($id)
	{
		if($this->session->userdata('loggedUser')){
                    $data['title'] = "All Service";
			if($this->input->post()){
//				$this->upload->initialize($this->set_upload_options_issue());
//				$this->upload->do_upload();
//				$fileName = $_FILES['userfile']['name'];  
			 	$this->adminmodel->editService($id);
				redirect('admin/brand/allservice');
			}else{
				$data['allservice'] = $this->adminmodel->getService($id);
				// echo "<pre>"; print_r($data); die;
//				$data['allbrands'] = $this->adminmodel->allbrands();
				$this->load->view('admin/service/editService',$data);
			}
		}else{
			redirect('admin/login');
		}
	}
	
	public function delService($id)
	{
		if($this->session->userdata('loggedUser')){
			$this->db->query('DELETE FROM services WHERE id="'.$id.'"');
			redirect('admin/brand/allservice');
		}else{
			redirect('admin/login');
		}
	}

	private function set_upload_options_brands(){
		$config = array(
			'upload_path' => "./uploads/brands",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "",
			'max_height' => "",
			'max_width' => ""
		);
		return $config;
	}
	private function set_upload_options_modals(){
		$config = array(
			'upload_path' => "./uploads/modals",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "",
			'max_height' => "",
			'max_width' => ""
		);
		return $config;
	}
	private function set_upload_options_issue(){
		$config = array(
			'upload_path' => "./uploads/issue",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "",
			'max_height' => "",
			'max_width' => ""
		);
		return $config;
	}
	
}
