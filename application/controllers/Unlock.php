<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unlock extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	
	public function index(){
		$this->load->view('network_unlocking');
	}
	
	public function category($id){
		$data['cid']=$id;
		$this->load->view('front/header');
		$this->load->view('front/repair',$data);
		$this->load->view('front/footer');
	}
	public function getBrand(){
		
		$id = $_POST['id'];
		$data=$this->db->query('SELECT * FROM brands WHERE pid ="'.$id.'" order by brands_order desc')->result();
                if(count($data) > 0)
                {
		foreach($data as $key=>$rm){ ?>
            <div class="col-6 col-md-3 text-left align-self-center getBrandModal" id="brandid_<?=$rm->id?>" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-brandid="<?=$rm->id?>" data-brandName1="<?=$rm->catname?>">
				<div id="brand_<?=$rm->id?>" class="repair-box">
                                    <span class="d-flex align-content-center flex-wrap justify-content-center">
					<img class="brand1_img_<?=$rm->id?>" src="<?php echo base_url(); ?>uploads/brands/<?php echo $rm->image; ?>" alt="" />
                                    </span>
                                </div>
			</div>
		<?php }
                if(count($data) > 8)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center getBrandModal1">
                         <button type="button" onclick="showBrands();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Show More Brands</button>   
                    </div>
                <?php }
                }
                   else
                { ?>
<div class="col-md-12 text-center">
				<div id="" class="repair-box">
					<h5>No Data Found</h5> 
				</div>
			</div>

             <?php   }
	}
	
	public function getBrandModal(){
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM modals WHERE brand_id ="'.$pid.'" order by brands_order desc')->result();
                
                if(count($data) > 0)
                {
                
		foreach($data as $key=>$rm){ ?>
			<div class="col-6 col-md-3 selectModal" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-mbrandid="<?php echo $pid; ?>" data-modalid="<?php echo $rm->id; ?>">
				<div id="MOdal_<?php echo $rm->id; ?>" class="repair-box">
					<span class="d-flex align-content-center flex-wrap justify-content-center">
						<img class="brandModalImg_<?php echo $rm->id; ?>" src="<?php echo base_url(); ?>uploads/modals/<?php echo $rm->image; ?>" alt="" />
					</span>
					<h5 class="brandModalName_<?php echo $rm->id; ?>"><?php echo $rm->modalname; ?></h5>
				</div>
			</div>
		<?php }
                if(count($data) > 8)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center selectModal1">
                         <button type="button" onclick="showModal();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Show More Models</button>   
                    </div>
                <?php }
                }
                   else
                { ?>
<div class="col-md-12 text-center">
				<div id="" class="repair-box">
					<h5>No Data Found</h5> 
				</div>
			</div>

             <?php   }
	}
	
	
	public function isssues(){
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM  pc_issue WHERE modal_id ="'.$pid.'"')->result();
		//echo "<pre>"; print_r($data);
		?>
		<?php 
                if(count($data) > 0)
                {
                foreach($data as $key=>$ri){ ?>
			<div class="col-6 col-md-4 text-center selectIssue" <?php if($key > 5) { ?> style="display: none;" <?php  } ?> data-missueid="<?php echo $ri->id; ?>" data-missueprice="<?php echo $ri->price; ?>">
				<div id="IssUes_<?php echo $ri->id; ?>" class="repair-box">
					<span class="d-flex align-content-center flex-wrap justify-content-center">
					<img class="selectedIssueImg_<?php echo $ri->id; ?>" src="<?php echo base_url(); ?>uploads/issue/<?php echo $ri->image; ?>" alt="" /></span>
					<h5 class="selectedIssueName_<?php echo $ri->id; ?>"><?php echo $ri->issue_name; ?></h5>
				</div>
			</div>
		<?php }
                if(count($data) > 6)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center selectIssue1">
                         <button type="button" onclick="showIssue();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Show More Problems</button>   
                    </div>
                <?php }
                }
                else
                { ?>
<div class="col-md-12 text-center">
				<div id="" class="repair-box">
					<h5>No Data Found</h5> 
				</div>
			</div>

             <?php   }
		
	} 
	public function order()
	{
            if($this->input->post()){
                    
                    
                     $query = $this->db->query('SELECT * FROM services WHERE id="'.$_POST['service'].'"')->row();
                     $service_price = $query->price;
                     $query1 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".implode(',',$_POST['issue']).")")->result();
                     
                    $issue_total = array(); 
                    foreach($query1 as $a)
                    {
                        $issue_total[] = $a->price;
                    }
                    $issue_total1 = array_sum($issue_total);
                   
                    
                     
			$data = array(
				'device' => $_POST['device'], 
				'model' => $_POST['model'],
				'brand' => $_POST['brand'],
				'service' => $_POST['service'],
				'office' => isset($_POST['office'])?$_POST['office']:'',
				'cname' => $_POST['cname'],
				'phone' => $_POST['phone'],
				'email' => $_POST['email'],
				'color' => $_POST['color'],
				'vendor_id' => isset($_POST['branch'])?$_POST['branch']:'',
				'post_code' => isset($_POST['post_code'])?$_POST['post_code']:'',
				'address' => isset($_POST['address'])?$_POST['address']:'',
				'price' => $service_price + $issue_total1,
				'service_price' => $service_price,
				'issue_price' => $issue_total1,
				'message' => $_POST['message'],
				'issue' => isset($_POST['issue'])?implode(',',$_POST['issue']):'',
		
			);
			$this->db->insert('orders', $data);
			$insert_id = $this->db->insert_id();
			$this->load->library('email');
                        $htmlContent = '<h3>Hi '.$_POST['cname'].'</h3>';
                    $htmlContent .= '</br>';
                    $htmlContent .= '<p>Your Request is in Process</p>';
                    $htmlContent .= '<p>Your Order Number Is:PCG'.$insert_id.'</p>';
                    $htmlContent .= '</br>';
                    $htmlContent .= '<p>If you have any query. Please Visit the following link</p>';
//                    $htmlContent .= "<a href='".base_url()."/pcgarage/repair/".$insert_id."'>Chat</a>";
                    $htmlContent .= "<a href='http://ppscloud.com/pcgarage/repair/chat/".$insert_id."'>http://ppscloud.com/pcgarage/repair/chat/".$insert_id."</a>";
                    
                    
                    
                    $this->email->from('gurpreet.avis7@gmail.com', 'Pcgarage');
                    $this->email->to($_POST['email']);
                 
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->subject('Request Status');
                    $this->email->message($htmlContent);
                    
                    $this->email->send();
//			$this->db->insert('orders', $_POST);
//			$insert_id = $this->db->insert_id();
			 $this->load->view('thankyou');
		}else{
			redirect('home');
			
		}
		
	}
	public function thanku()
	{
            $this->load->view('thankyou');
		
	}
	public function chat($id)
	{
            $data['id'] = $id;
           $data['messages'] = $this->db->query('SELECT * FROM messages WHERE order_id="'.$id.'"')->result();
            $this->load->view('chat',$data);
		
	}
	public function chat1($orderid,$last_id)
	{
           $chat = $this->db->query('SELECT * FROM messages WHERE order_id="'.$orderid.'" AND id > "'.$last_id.'"')->result();
           echo json_encode($chat);
          
//           print_r($chat);
		
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
                        
                           if(!$this->input->is_ajax_request()) {
                            redirect('repair/chat/'.$_POST['order_id']);
                            }
                            else
                            {
                $chat = $this->db->query('SELECT * FROM messages WHERE id="'.$insert_id.'"')->row();
                echo json_encode($chat);
                            }
			
		}
		
	}
	public function brandname()
	{
		$pid = $_POST['pid'];
		$data=$this->db->query('SELECT * FROM brands WHERE id ="'.$pid.'"')->result();
		foreach($data as $rm){
		//echo "<pre>"; print_r($data); ?>
		<p> <strong>Brand Name: </strong><?php echo $rm->catname;  ?></p>
			
	<?php
		}
		
	}
	public function callbackrequest(){
		$this->load->library('email');
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		
		   $htmlContent = '<h3>Hi Admin</h3>';
			$htmlContent .= '</br>';
			$htmlContent .= '<p>'.$_POST['name'].' is request you to call back at his number '.$_POST['phone'].'</p>';
						
			$this->email->from('amit@pcgarage.uk.com', 'Pcgarage');
			$this->email->to('avistcengg@gmail.com');
		 
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->subject('Request Call Back');
			$this->email->message($htmlContent);
			
			$this->email->send();
	}
	public function getorderstatus()
	{
		$pid = $_GET['id'];
               
                $id = substr($pid,3);
            if (strpos($pid, 'PCG') !== false && $id > 0) {
              
                $data = $this->db->query('SELECT * FROM orders WHERE id="'.$id.'"')->row();
      
        if(isset($data->status))
        {
              echo ucfirst($data->status);
        }
        else
        {
             echo '<span style="color:red;"> Invalid Order Number</span>';
        }
                
               
            }
            else
            {
                echo '<span style="color:red;"> Invalid Order Number</span>';
                
            }
               
	
		
	}
	public function modaldetail()
	{
		$pid = $_POST['pid'];
		$data=$this->db->query('SELECT * FROM modals WHERE id ="'.$pid.'"')->result();
		foreach($data as $rm){
		//echo "<pre>"; print_r($data); ?>
		<p> <strong>Model Name: </strong><?php echo $rm->modalname; ?></p>
		<p> <strong> Model Image:  </strong><img src="<?php echo base_url(); ?>uploads/issue/<?php echo $rm->image; ?>" style="height:100px;margin: 10px 1px;"></p>
		<?php 
		}
		
	}
	
	
}
?>