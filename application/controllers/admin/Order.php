<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
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
//		$data['allorder'] = $this->adminmodel->allorders();
                
                
            $config['base_url'] = base_url().'/admin/order/index'; // use test/test and it works
			$config['total_rows'] = $this->adminmodel->record_count_order();
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
			$data['allorder'] = $this->adminmodel->allorders($config['per_page'], $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['file']   = 'admin/order/allorder';
//			$this->load->view('admin/order/allorder',$data);
                        $data['title'] = "ALL ORDERS";
                
		$this->load->view('admin/order/allorder',$data);
		
	}
        
        public function addVendor($id)
	{
		if(!$this->session->userdata('loggedUser'))
                    {
			redirect('admin/login');
		}
                        $data = array();
                        $query = $this->db->query('SELECT * FROM orders WHERE id="'.$id.'"');
			$data['v'] = $query->row();
                        
                        $query = $this->db->query('SELECT * FROM orders WHERE id="'.$id.'"');
			$data['v'] = $query->row();
			$data['allvendor'] = $this->adminmodel->allvendor();
                          $data['title'] = "ALL ORDERS";
			$this->load->view('admin/order/addvendor',$data);
		
		
	}
        public function saveVendor($id)
	{
		if(!$this->session->userdata('loggedUser'))
                    {
			redirect('admin/login');
                       }
                        $data = array();
                         $this->adminmodel->savevendor($id);
//			$this->load->view('admin/order/addVendor/'.$id);
		redirect('admin/order/addVendor/'.$id);
		
	}
        
    public function chat($id)
	{
        $data['id'] = $id;
        $data['messages'] = $this->db->query('SELECT * FROM messages WHERE order_id="'.$id.'"')->result();
          
        $this->load->view('admin/order/chat',$data);
		
	}

	public function chat1($orderid,$last_id)
	{
        $chat = $this->db->query('SELECT * FROM messages WHERE order_id="'.$orderid.'" AND id > "'.$last_id.'"')->result();
        echo json_encode($chat);
	}
        
    public function saveChat()
	{
            if($this->input->post()){
              $data = array(
				'order_id' => $_POST['order_id'], 
				'message' => $_POST['msg'],
				'status' => 'unread',
				'date' => date("Y-m-d"),
				'time' => date("H:i:s"),
				'mdate' => date("Y-m-d H:i:s"),
				'is_client' => $_POST['is_client'],
				'is_admin' => $_POST['is_admin'],
				
		
			);
			$this->db->insert('messages', $data);
			$insert_id = $this->db->insert_id();
			$data['id'] = $_POST['order_id'];
			
                        if (!$this->input->is_ajax_request()) {
                                    redirect('admin/order/chat/'.$_POST['order_id']);
                            }
                            else
                            {
                                $chat = $this->db->query('SELECT * FROM messages WHERE id="'.$insert_id.'"')->row();
                                echo json_encode($chat);
                            }
		}
	}

	public function otherChat($id=0)
	{
        $data['id'] = $id;
        $data['messages'] = $this->db->query('SELECT * FROM other_messages WHERE order_id="'.$id.'"')->result();
          
        $this->load->view('admin/order/otherchat',$data);
		
	}

	public function otherChat1($orderid=0,$last_id=0)
	{
        $chat = $this->db->query('SELECT * FROM other_messages WHERE order_id="'.$orderid.'" AND id > "'.$last_id.'"')->result();
        echo json_encode($chat);
	}
	
	public function saveOtherChat()
	{
		
        if($this->input->post())
        {
            	$data 			= array(
				'order_id' 		=> $_POST['order_id'], 
				'message' 		=> $_POST['msg'],
				'status' 		=> 'unread',
				'date' 			=> date("Y-m-d"),
				'time' 			=> date("H:i:s"),
				'mdate' 		=> date("Y-m-d H:i:s"),
				'is_client' 	=> $_POST['is_client'],
				'is_admin' 		=> $_POST['is_admin'],
			
			);
			$this->db->insert('other_messages', $data);
			$insert_id = $this->db->insert_id();
			$data['id'] = $_POST['order_id'];
                        
			if(!$this->input->is_ajax_request()) {
				redirect('order/otherChat/'.$_POST['order_id']);
			}else{
                $chat = $this->db->query('SELECT * FROM other_messages WHERE id="'.$insert_id.'"')->row();
                echo json_encode($chat);
            }
			
		}
		
	} 


	public function otherOrder()
	{
		if(!$this->session->userdata('loggedUser'))
                    {
			redirect('admin/login');
		}

		$config['base_url'] = base_url().'/admin/order/otherOrder'; // use test/test and it works
		$config['total_rows'] = $this->adminmodel->record_count_otherOrder();
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
		//$data['allorder'] = $this->adminmodel->allorders($config['per_page'], $offset);


		$data['otherOrder'] 	=	$this->adminmodel->otherOrderSave($config['per_page'], $offset);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = "ALL OTHER ORDERS";
		$this->load->view('admin/otherorder/otherorder', $data);

	}

	public function otherAddVendor($otherOrderId=0)
	{
		if(!$this->session->userdata('loggedUser'))
                    {
			redirect('admin/login');
		}

		$data['otherOrders'] = 	$this->adminmodel->getAllOtherOrders($otherOrderId);
		$data['vendors']	=	$this->adminmodel->allvendor();

		$this->load->view('admin/otherorder/otheraddvendor', $data);
		
	}

	public function saveOtherVendor()
	{

		if(!$this->session->userdata('loggedUser'))
        {
			redirect('admin/login');
		}
		if($this->input->post())
		{
			$data = array
						(

							'vendor_id' => 	$this->input->post('vendor'),
							'status'	=>	$this->input->post('status')
						);

			$result = $this->adminmodel->saveOtherVendor($this->input->post('other_id'),$data);

			if($result)
			{
				redirect('admin/order/otherOrder');
			}
		}
	}

	public function sellOrder()
	{
		if(!$this->session->userdata('loggedUser'))
        {
			redirect('admin/login');
		}

		$config['base_url'] = base_url().'/admin/order/sellOrder'; // use test/test and it works
		$config['total_rows'] = $this->adminmodel->record_count_sellorder();
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
		//$data['allorder'] = $this->adminmodel->allorders($config['per_page'], $offset);
		

		$data['sellOrder'] 		=	$this->adminmodel->sellOrder($config['per_page'], $offset);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] 			= 	"SELL ORDERS";				
		$this->load->view('admin/sellorder/sellorder', $data);
	}

	public function adminSellChat($sellId=0)
	{

		$data['id'] = $sellId;      
       	$data['messages']	=	$this->adminmodel->getMessages($sellId);
       	$data['sellOrder']	=	$this->adminmodel->sellOrderById($sellId);

       //	echo '<pre>';print_r($data);die;

       $this->load->view('admin/sellorder/adminsellchat',$data);
	}

	public function sellChat1($sellId,$last_id)
	{
           $chat = $this->db->query('SELECT * FROM sell_messages WHERE sell_id="'.$sellId.'" AND id > "'.$last_id.'"')->result();
           echo json_encode($chat);
          
//           print_r($chat);
		
	}
        
    public function saveSellChat()
	{	
			
        if($this->input->post())
        {        	
        	$data = array
        				(
						'sell_id' 	=> $_POST['sell_id'], 
						'message' 	=> $_POST['msg'],
						'status' 	=> 'unread',
						'date' 		=> date("Y-m-d"),
						'time' 		=> date("H:i:s"),
						'mdate'		=> date("Y-m-d H:i:s"),
						'is_client' => $_POST['is_client'],
						'is_admin' 	=> $_POST['is_admin'],			
				
						);
			$this->db->insert('sell_messages', $data);
			$insert_id = $this->db->insert_id();
			$data['id'] = $_POST['sell_id'];
                    
            if (!$this->input->is_ajax_request()) 
            {

                redirect('sell/chat/'.$_POST['sell_id']);
            }

            else
            {
                $chat = $this->db->query('SELECT * FROM sell_messages WHERE id="'.$insert_id.'"')->row();
				echo json_encode($chat);
            }		
			
		}
		
	}
	
	
}
