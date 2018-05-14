<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repair extends CI_Controller {
	public function __construct() {	
		parent::__construct();			
		
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	
	public function index($brandid=0,$subbrandid=0){

		//echo '<pre>';print_r($brandid);die;
		$data['brandid'] = $brandid;
		$data['subbrandid'] = $subbrandid;
		$this->load->view('repair',$data);
	}
	
	public function category($id){
		$data['cid']=$id;
		$this->load->view('front/header');
		$this->load->view('front/repair',$data);
		$this->load->view('front/footer');
	}
	public function getBrand(){
		
		$id = $_POST['id'];
		$data=$this->db->query('SELECT * FROM brands WHERE pid ="'.$id.'" order by brands_order asc')->result();
                if(count($data) > 0)
                {
		foreach($data as $key=>$rm){ ?>
            <div class="col-6 col-md-3 text-left align-self-center getBrandModal" id="brandid_<?=$rm->id?>" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-brandid="<?=$rm->id?>" data-brandName1="<?=$rm->catname?>">
				<div id="brand_<?=$rm->id?>" class="repair-box">
                    <span class="d-flex align-content-center flex-wrap justify-content-center">
                        
                  		<img class="brand1_img_<?=$rm->id?>" src="<?php echo base_url(); ?>uploads/brands/<?php echo $rm->image; ?>" alt="<?=$rm->catname?>" />
                 
                    </span>
                </div>
			</div>
		<?php }	?>
			
			 <div class="col-6 col-md-3 text-left align-self-center getBrandModal" id="brandid_<?=$rm->id?>" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-brandid="<?=$rm->id?>" data-brandName1="<?=$rm->catname?>">
				<div id="brand_<?=$rm->id?>" class="repair-box">
                    <span class="d-flex align-content-center flex-wrap justify-content-center">
                       <a href="<?php echo base_url('repair/otherBrand');?>" style="margin-top: 22px;"><img class="brand1_img_60 mCS_img_loaded" src="<?php echo base_url(); ?>uploads/brands/other-logo.png" alt="Other Mobile"></a>      			              		
                    </span>
                </div>
			</div>
		<?php 					
                if(count($data) > 8)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center getBrandModal1">
                         <button type="button" onclick="showBrands();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary showMore">Show More Brands</button>   
                    </div>
                <?php }
                }
                   else
                { ?>
				<div class="col-md-12 text-center">
						<div id="" class="repair-box">
							<h5>No Data</h5> 
						</div>
				</div>

             <?php   }
	}
	
	public function getBrandModal(){
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM modals WHERE brand_id ="'.$pid.'" order by modal_order asc')->result();
                
                if(count($data) > 0)
                {

		foreach($data as $key=>$rm){ ?>
			<div class="col-6 col-md-3 selectModal" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-mbrandid="<?php echo $pid; ?>" data-modalid="<?php echo $rm->id; ?>">
				<div id="MOdal_<?php echo $rm->id; ?>" class="repair-box">
					<span class="d-flex align-content-center flex-wrap justify-content-center">
						<img class="brandModalImg_<?php echo $rm->id; ?>" src="<?php echo base_url(); ?>uploads/modals/<?php echo $rm->image; ?>" alt="<?php echo $rm->modalname; ?>" />
					</span>
					<h5 class="brandModalName_<?php echo $rm->id; ?>"><?php echo $rm->modalname; ?></h5>
				</div>
			</div>
		<?php }
                if(count($data) > 8)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center selectModal1">
                         <button type="button" onclick="showModal();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary showMore">Show More Models</button>   
                    </div>
                <?php }
                }
               /* 
                 else
                { 

                	$this->load->view('otherbrand');
                	?>
			<div class="col-md-12 text-center">
				<div id="" class="repair-box">
					<h5>No Data Found</h5> 
				</div>
			</div>

             <?php   }*/
	}
	
	public function otherBrand()
	{

		if($this->input->post())
		{

			if($this->form_validation->run('otherbrand_validation') == FALSE)
			{
				$this->session->set_flashdata('message',array('message'=> validation_errors(),'class'=>'alert alert-danger'));

				$this->load->view('otherbrand');
			}

			else
			{
				$this->adminmodel->sendOtherOrderToCMS($_POST); /* for leadsqude integration */
				
				$data = array
						(
							'brand_name'	=>	$this->input->post('brand'),
							'model'			=>	$this->input->post('model'),
							'issue'			=>	$this->input->post('issue'),
							'cname'			=>	$this->input->post('cname'),
							'email'			=>	$this->input->post('email'),
							'address'		=>	$this->input->post('address'),
							'phone'			=>	$this->input->post('phone')
						);

				$insert_id = $this->adminmodel->saveOtherBrand($data);

				if($insert_id)
				{	
					$this->load->library('email');					

					/* Customer email start */
					$htmlContent = '<h3>Hi '.$_POST['cname'].'</h3>';
					$htmlContent .= '</br>';
					$htmlContent .= '<p>Your Request is in Process</p>';
					$htmlContent .= '<p>Your Order Number Is:PCG0000'.$insert_id.'</p>';
					$htmlContent .= '</br>';
					$htmlContent .= '<p>If you have any query. Please Visit the following link</p>';
					$htmlContent .= "<a href='".base_url()."repair/otherChat/".$insert_id."'>".base_url()."repair/otherChat/".$insert_id."</a>";
		                    
					$this->email->from('info@pcgarage.uk.com', 'Pcgarage');
					$this->email->to($_POST['email']);
					// $this->email->cc('raj.saini15@gmail.com');
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					$this->email->subject('Request Status');
					$this->email->message($htmlContent);			
					$this->email->send();
					/* Customer email end */

					//$url = base_url();	

					/* customer email start */

					/*$data = array
								(

									'name'		=>	$_POST['cname'],
									'insert_id'	=>	$insert_id,
									'url'		=>	$url,
									'email'		=>	$_POST['email']
								);

					$string = http_build_query($data);		

					$ch = curl_init($url.'sendgrid/otheremail.php');			
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
					# Return response instead of printing.
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
					# Send request.
					$response = curl_exec($ch);
					curl_close($ch);*/

					/* customer email end */	

					/* Admin email start */				

					/*$data = array
								(

									'name'		=>	$_POST['cname'],
									'phone'		=>	$_POST['phone'],							
									'email'		=>	$_POST['email'],
									'brand_name'=>	$_POST['brand'],
									'model_name'=>	$_POST['model'],									
									'insert_id'	=>	$insert_id,
									'issues'	=>	$_POST['issue']								
									

								);

					$string = http_build_query($data);

					//echo $string;die;

					$ch = curl_init($url.'sendgrid/otheradminemail.php');			
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
					# Return response instead of printing.
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
					# Send request.
					$response = curl_exec($ch);
					curl_close($ch);
*/
					/* Admin email end */			
					
					/* Admin email start */

					$this->load->library('email');
					$htmladminemail = '<h3>Hello Admin</h3>';
					$htmladminemail .= '</br>';
					$htmladminemail .= '<p>New request posted on the site with Order Number Is:PCG0000'.$insert_id.'</p>';
					
					$htmladminemail .= '<table><tr><th colspan="2">Customer Detail</th></tr>';
					$htmladminemail .= '<tr><td>Name</td><td>'.$_POST['cname'].'</td></tr>';
					$htmladminemail .= '<tr><td>Phone</td><td>'.$_POST['phone'].'</td></tr>';
					$htmladminemail .= '<tr><td>Email</td><td>'.$_POST['email'].'</td></tr></table>';
					
					$htmladminemail .= '<table><tr><th colspan="2">Order Detail</th></tr>';					
					$htmladminemail .= '<tr><td>Brand name</td><td>'.$_POST['brand'].'</td></tr>';					
					$htmladminemail .= '<tr><td>Model name</td><td>'.$_POST['model'].'</td></tr>';					
					$htmladminemail .= '<tr><td>Issue</td><td>'.$_POST['issue'].'</td></tr>';					
					$htmladminemail .= '<p>You can check the full detail from admin dashboard.</p>';
					$htmladminemail .= '<p>Pcgarage<br/>Thanks</p>';
					
					$this->email->from('repair@pcgarage.uk.com', 'Pcgarage');
					$this->email->to('yuvi.unique@gmail.com');
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					$this->email->subject('Request Status');
					$this->email->message($htmladminemail);			
					$this->email->send();
					/* Admin email end */
					
					$this->session->set_userdata(array('repair_id'=>$insert_id,'uemail'=>$_POST['email']));
					
					$this->load->view('thankyou');
				}
			}
			
		}
		$this->load->view('otherbrand');
	}
	
	public function isssues(){
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM  pc_issue WHERE modal_id ="'.$pid.'"')->result();
		// echo "<pre>"; print_r($data); die;
		?>
		<?php 
                if(count($data) > 0)
                {
                foreach($data as $key=>$ri){ ?>
			<div class="col-6 col-md-4 text-center selectIssue" <?php if($key > 5) { ?> style="display: none;" <?php  } ?> data-missueid="<?php echo $ri->id; ?>" data-missueprice="<?php echo $ri->price; ?>">
				<div id="IssUes_<?php echo $ri->id; ?>" class="repair-box">
					<span class="d-flex align-content-center flex-wrap justify-content-center">
					<img class="selectedIssueImg_<?php echo $ri->id; ?>" src="<?php echo base_url(); ?>uploads/issue/<?php echo $ri->image; ?>" alt="<?php echo $ri->issue_name; ?>" /></span>
					<h5 class="selectedIssueName_<?php echo $ri->id; ?>"><?php echo $ri->issue_name; ?></h5>
					<h6>£ <?php echo $ri->price; ?></h6>
				</div>
			</div>
		<?php }
                if(count($data) > 6)
                {
                ?>
                    <div class="col-md-12 d-flex justify-content-center selectIssue1">
                         <button type="button" onclick="showIssue();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary showMore">Show More Problems</button>   
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
        if($this->input->post())
        {
			$this->adminmodel->sendOrderToCMS($_POST); /* for leadsqude integration */
			// die;
			$query = $this->db->query('SELECT * FROM services WHERE id="'.$_POST['service'].'"')->row();
			$service_price = $query->price;
			$query1 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".implode(',',$_POST['issue']).")")->result();
			 
			$issue_total = array(); 

			foreach($query1 as $a)
			{
				$issue_total[] = $a->price;
			}

			$issue_total1 = array_sum($issue_total);
               
        	/* echo "<pre>"; print_r($_POST); die; */

        	if($this->input->post('site_user_id')){
				$user_id 	=	$this->input->post('site_user_id');
			}else{
				$userData=array(
								'first_name'	=>	$this->input->post('cname'),										
								'email'			=>	strtolower($this->input->post('email')),
								'phone'			=>	$this->input->post('phone'),
								'address'		=>	$this->input->post('address'),										
								'postcode'		=>	$this->input->post('post_code'),
								'password'		=>	md5($this->input->post('password'))
								);

				$user_id 	=$this->adminmodel->insert_site_user($userData);
			}			
                 
			$data = array(
							'device' 			=> $_POST['device'], 
							'model' 			=> $_POST['model'],
							'brand' 			=> $_POST['brand'],
							'service' 			=> $_POST['service'],
							'office' 			=> isset($_POST['office'])?$_POST['office']:'',
							'cname' 			=> $_POST['cname'],
							'phone' 			=> $_POST['phone'],
							'email' 			=> $_POST['email'],
							'color' 			=> $_POST['color'],
							'vendor_id'			=> isset($_POST['branch'])?$_POST['branch']:'',
							'post_code' 		=> isset($_POST['post_code'])?$_POST['post_code']:'',
							'address' 			=> isset($_POST['address'])?$_POST['address']:'',
							'walkingdatetime'	=> isset($_POST['walkingdatetime'])?$_POST['walkingdatetime']:'',
							'price' 			=> $service_price + $issue_total1,
							'service_price' 	=> $service_price,
							'issue_price' 		=> $issue_total1,
							'message' 			=> $_POST['message'],
							'issue' 			=> isset($_POST['issue'])?implode(',',$_POST['issue']):'',
							'site_user_id'		=> $user_id
		
						);
			$this->db->insert('orders', $data);
			$insert_id = $this->db->insert_id();
			

			//$url = base_url();

			//echo '<pre>';print_r($url);die;

			/* customer email start */

			/*$data = array
						(

							'name'		=>	$_POST['cname'],
							'insert_id'	=>	$insert_id,
							'url'		=>	$url,
							'email'		=>	$_POST['email']
						);

			$string = http_build_query($data);		

			$ch = curl_init($url.'sendgrid/index.php');			
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
			# Return response instead of printing.
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			# Send request.
			$response = curl_exec($ch);
			
			curl_close($ch);*/

			/* customer email end */

			/* Admin email start */

		/*	$issue=isset($_POST['issue'])?implode(',',$_POST['issue']):'';
			$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".$issue.")")->result();
            $issue_total = array();

			foreach($query11 as $a)	
			{	
				$issue_total[] 	= 	$a->issue_name;	
			}

			$issues 			=	implode(',',$issue_total);

			$queryi 			= 	$this->db->query("SELECT * FROM brands WHERE id = '".$_POST['brand']."'");
			$rowi 				= 	$queryi->result();

			$brand_name 		= 	isset($rowi[0]->catname) ? $rowi[0]->catname : '';

			$query 				= 	$this->db->query("SELECT * FROM modals WHERE id = '".$_POST['model']."'");
			$row 				= 	$query->result();

			$model_name 		=	isset($row[0]->modalname) ? $row[0]->modalname : '';

			$message 			=	isset($_POST['message']) ? $_POST['message'] : '';

			$data = array
						(

							'name'		=>	$_POST['cname'],
							'phone'		=>	$_POST['phone'],							
							'email'		=>	$_POST['email'],
							'brand_name'=>	$brand_name,
							'model_name'=>	$model_name,
							'color'		=>	$_POST['color'],
							'insert_id'	=>	$insert_id,
							'issues'	=>	$issues,
							'message'	=>	$message
							

						);

			$string = http_build_query($data);

			//echo $string;die;

			$ch = curl_init($url.'sendgrid/sendadminemail.php');			
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
			# Return response instead of printing.
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			# Send request.
			$response = curl_exec($ch);			
			curl_close($ch);
*/
			/* Admin email end */

			// echo '<pre>';print_r($response);die;


			//echo '<pre>';print_r($response);die;
			# Print response.
			//echo "<pre>$result</pre>";die;

			/* customer email start */

			$this->load->library('email');			
			$htmlContent  = '<h3>Hi '.$_POST['cname'].'</h3>';
			$htmlContent .= '</br>';
			$htmlContent .= '<p>Your Request is in Process</p>';
			$htmlContent .= '<p>Your Order Number Is:PCG0000'.$insert_id.'</p>';
			$htmlContent .= '</br>';
			$htmlContent .= '<p>If you have any query. Please Visit the following link</p>';
			$htmlContent .= "<a href='".base_url()."repair/chat/".$insert_id."'>".base_url()."repair/chat/".$insert_id."</a>";
                    
			$this->email->from('info@pcgarage.uk.com', 'Pcgarage');
			$this->email->to($_POST['email']);			
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->subject('Request Status');
			$this->email->message($htmlContent);			
			$this->email->send();

			/* Customer email end */	


			// $issue=isset($_POST['issue'])?implode(',',$_POST['issue']):'';
			// $query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".$issue.")")->result();
            // $issue_total = array();

			// foreach($query11 as $a)	
			// {	
			// 	$issue_total[] = $a->issue_name;	
			// }

			// $issues 	=	implode(',',$issue_total);

			// $queryi 	= $this->db->query("SELECT * FROM brands WHERE id = '".$_POST['brand']."'");
			// $rowi 		= $queryi->result();

			// $brand_name = $rowi[0]->catname;

			// $query = $this->db->query("SELECT * FROM modals WHERE id = '".$_POST['model']."'");
			// $row = $query->result();

			// $model_name 	=	$row[0]->modalname;

			// $message 		=	isset($_POST['message']) ? $_POST['message'] : '';

			
			/* Admin email start */

			$this->load->library('email');
			$htmladminemail  = '<h3>Hello Admin</h3>';
			$htmladminemail .= '</br>';
			$htmladminemail .= '<p>New request posted on the site with Order Number Is:PCG0000'.$insert_id.'</p>';
			
			$htmladminemail .= '<table><tr><th colspan="2">Customer Detail</th></tr>';
			$htmladminemail .= '<tr><td>Name</td><td>'.$_POST['cname'].'</td></tr>';
			$htmladminemail .= '<tr><td>Phone</td><td>'.$_POST['phone'].'</td></tr>';
			$htmladminemail .= '<tr><td>Email</td><td>'.$_POST['email'].'</td></tr></table>';
			
			$htmladminemail .= '<table><tr><th colspan="2">Order Detail</th></tr>';
			$queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$_POST['brand']."'");
			$rowi = $queryi->result();
			$htmladminemail .= '<tr><td>Brand name</td><td>'.$rowi[0]->catname.'</td></tr>';
			$query = $this->db->query("SELECT * FROM modals WHERE id = '".$_POST['model']."'");
			$row = $query->result();
			$htmladminemail .= '<tr><td>Model name</td><td>'.$row[0]->modalname.'</td></tr>';
			$htmladminemail .= '<tr><td>Color</td><td>'.$_POST['color'].'</td></tr>';
			
			$issue=isset($_POST['issue'])?implode(',',$_POST['issue']):'';
			$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".$issue.")")->result();
            $issue_total = array();
			foreach($query11 as $a)	{	$issue_total[] = $a->issue_name;	}
			
			$htmladminemail .= '<tr><td>Issue</td><td>'.implode(',',$issue_total).'</td></tr>';
			$htmladminemail .= '<tr><td>Message</td><td>'.$_POST['message'].'</td></tr></table>';
			
			$htmladminemail .= '<p>You can check the full detail from admin dashboard.</p>';
			$htmladminemail .= '<p>Pcgarage<br/>Thanks</p>';
			
			$this->email->from('info@pcgarage.uk.com', 'Pcgarage');
			$this->email->to('info@pcgarage.uk.com');						
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->subject('Request Status');
			$this->email->message($htmladminemail);			
			$this->email->send();
			
			/* Admin email end */
			
			$this->session->set_userdata(array('repair_id'=>$insert_id,'uemail'=>$_POST['email']));
			
			$this->load->view('thankyou');
		}

		else
		{
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
	}
    public function checkmessage($last_id)
	{
        $chat = $this->db->query('SELECT * FROM messages WHERE is_client="1" AND id > "'.$last_id.'"')->result();
        echo json_encode(array('count'=>count($chat)));
	}    
	public function saveChat()
	{
            if($this->input->post()){
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
			$this->db->insert('messages', $data);
			$insert_id = $this->db->insert_id();
			$data['id'] = $_POST['order_id'];
                        
			if(!$this->input->is_ajax_request()) {
				redirect('repair/chat/'.$_POST['order_id']);
			}else{
                $chat = $this->db->query('SELECT * FROM messages WHERE id="'.$insert_id.'"')->row();
                echo json_encode($chat);
            }
			
		}
		
	}

	public function otherChat($id=0)
	{
		$data['id'] = $id;
        $data['messages'] = $this->db->query('SELECT * FROM other_messages WHERE order_id="'.$id.'"')->result();
        $this->load->view('otherchat',$data);
	}

	public function otherChat1($orderid=0,$last_id=0)
	{
        $chat = $this->db->query('SELECT * FROM other_messages WHERE order_id="'.$orderid.'" AND id > "'.$last_id.'"')->result();
        echo json_encode($chat);
	}

	public function checkOtherMessage($last_id=0)
	{
        $chat = $this->db->query('SELECT * FROM other_messages WHERE is_client="1" AND id > "'.$last_id.'"')->result();
        echo json_encode(array('count'=>count($chat)));
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
				redirect('repair/otherChat/'.$_POST['order_id']);
			}else{
                $chat = $this->db->query('SELECT * FROM other_messages WHERE id="'.$insert_id.'"')->row();
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
		$cemail = $_POST['cemail'];
		
		$htmlContent = '<h3>Hi Admin</h3>';
		$htmlContent .= '</br>';
		$htmlContent .= '<p>'.$_POST['name'].' is request you to call back at his number '.$_POST['phone'].'</p>';
					
		$this->email->from($cemail,$_POST['name']);
		$this->email->to('info@pcgarage.uk.com');	 
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->subject('Request Call Back');
		$this->email->message($htmlContent);		
		$this->email->send();


		/*$url = base_url();		

		$data = array
					(

						'name'		=>	$_POST['name'],
						'phone'		=>	$_POST['phone'],
						'url'		=>	$url,
						'email'		=>	$_POST['cemail']
					);

		$string = http_build_query($data);		

		$ch = curl_init($url.'sendgrid/callbackemail.php');			
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
		# Return response instead of printing.
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		# Send request.
		$response = curl_exec($ch);
		curl_close($ch);*/
		
		
		/*leadsquadeapi calls start*/
		$data_string = '[{"Attribute":"FirstName","Value":"'.$name.'"},{"Attribute":"EmailAddress","Value":"'.$cemail.'"},{"Attribute":"Phone","Value":"'.$phone.'"},{"Attribute":"Source","Value":"Web Form"},{"Attribute": "SearchBy","Value": "Phone"}]';
		try
		{
			$curl = curl_init('https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					"Content-Type:application/json",
					"Content-Length:".strlen($data_string)
					));
			$json_response = curl_exec($curl);
			$laedcaptureapiresp=json_decode($json_response);
			// echo $json_response;
			curl_close($curl);
		} catch (Exception $ex) { 
			curl_close($curl);
		}
		if($laedcaptureapiresp->Status =='Success'){
			$data_string = '{"RelatedProspectId":"'.$laedcaptureapiresp->Message->RelatedId.'","ActivityEvent":201,"Fields":[]}';
			try
			{
			$curl = curl_init('https://api-in21.leadsquared.com/v2/ProspectActivity.svc/Create?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					"Content-Type:application/json",
					"Content-Length:".strlen($data_string)
					));
			$json_response = curl_exec($curl);
			// echo $json_response;
				curl_close($curl);
			} catch (Exception $ex) { 
				curl_close($curl);
			}
		}
		/*leadsquadeapi calls ends*/
	}
	public function getorderstatus()
	{
		$pid = $_GET['id'];
               
                $id = substr($pid,3);
            if (strpos($pid, 'PCG0000') !== false && $id > 0) 
            {
              
                $data = $this->db->query('SELECT * FROM orders WHERE id="'.$id.'"')->row();
      
		        if(isset($data->status))
		        {
		              echo '<p class="alert alert-success">'.ucfirst($data->status).'</p>';
		        }
		        else
		        {
		             echo '<p class="alert alert-danger"> Invalid Order Number</p>';
		        }
		                
               
            }
            else
            {
                echo '<p class="alert alert-danger"> Invalid Order Number</p>';
                
            }
		
	}

	public function modaldetail()
	{
		$pid = $_POST['pid'];
		$data=$this->db->query('SELECT * FROM modals WHERE id ="'.$pid.'"')->result();
		foreach($data as $rm){
		//echo "<pre>"; print_r($data); ?>
		<p> <strong>Model Name: </strong><?php echo $rm->modalname; ?></p>
		<p> <strong> Model Image:  </strong><img src="<?php echo base_url(); ?>uploads/issue/<?php echo $rm->image; ?>" style="height:100px;margin: 10px 1px;" alt="<?php echo $rm->modalname; ?>"></p>
		<?php 
		}
		
	}

	public function getRepairUserDetail()
	{
		
		$data 		=	array
							(
								'site_user.email'		=>	$this->input->post('uemail'),
								'site_user.password'	=>	md5($this->input->post('upassword'))	
							);
		$userDetail = 	$this->adminmodel->getRepairUserDetail($data);

		if($userDetail)
		{
			$userData 	=	array
										(
											'site_user_id'	=>	$userDetail->user_id,
											'userName'		=>	$userDetail->first_name,
											'email'			=>	$userDetail->email,
											'phone'			=>	$userDetail->phone											
										);

			$this->session->set_userdata($userData);	
		}

		echo json_encode($userDetail);die;
		
	}

	public function getRepairUserDetailById()
	{
		$data 		=	array
							(
								'user_id'	=>	$this->input->post('site_user_id')
							);
		$userDetail = 	$this->adminmodel->getRepairUserDetail($data);
		
		echo json_encode($userDetail);die;					

	}	

	public function chkEmailUnique()
	{
		$result = $this->adminmodel->chkEmailUnique($this->input->post('email'));

		echo json_encode($result);die;
	}

	public function repairOrders()
	{

		$data['repairOrder']	=	$this->adminmodel->repairOrder($this->session->userdata('site_user_id'));
		$this->load->view('user/pages/repairorder',$data);
	}
	
}

?>