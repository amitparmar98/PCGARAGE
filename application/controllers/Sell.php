<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
	
	public function index(){
		$this->load->view('sell');
	}
	
	public function category($id){
		$data['cid']=$id;
		$this->load->view('front/header');
		$this->load->view('front/repair',$data);
		$this->load->view('front/footer');
	}
	public function getBrand(){
		
		$id = $_POST['id'];
		$data=$this->db->query('SELECT * FROM brands WHERE pid ="'.$id.'"')->result();
                if(count($data) > 0)
                {
					foreach($data as $key=>$rm){ ?>
                        <div class="col-md-3 text-left align-self-center getBrandModal" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-brandid="<?=$rm->id?>" data-brandName1="<?=$rm->catname?>">
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
	
	public function getBrandModal()
	{
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM modals WHERE brand_id ="'.$pid.'"')->result();
                
	    if(count($data) > 0)
	    {                
			foreach($data as $key=>$rm){ ?>
				<div class="col-md-3 selectModal" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-mbrandid="<?php echo $pid; ?>" data-modalid="<?php echo $rm->id; ?>">
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
	
	
	public function isssues()
	{
		$pid = $_POST['id'];
		$data=$this->db->query('SELECT * FROM  pc_issue WHERE modal_id ="'.$pid.'"')->result();
		
		?>
		<?php 
            if(count($data) > 0)
            {
	            foreach($data as $key=>$ri){ ?>
				<div class="col-md-4 text-center selectIssue" <?php if($key > 5) { ?> style="display: none;" <?php  } ?> data-missueid="<?php echo $ri->id; ?>" data-missueprice="<?php echo $ri->price; ?>" data-missuename="<?php echo $ri->issue_name;?>">
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
				'price' => $issue_total1,
				
				'issue_price' => $issue_total1,
				'message' => $_POST['message'],
				'issue' => isset($_POST['issue'])?implode(',',$_POST['issue']):'',
				'accessories' => isset($_POST['issue'])?implode(',',$_POST['accessories']):'',
		
			);
                        
                     
			$this->db->insert('sells', $data);
			$insert_id = $this->db->insert_id();	
			
                
//			$this->db->insert('orders', $_POST);
//			$insert_id = $this->db->insert_id();
			 $this->load->view('sell_thankyou');
		}else{
			redirect('home');
			
		}
		
	}
	public function thanku()
	{
            $this->load->view('thankyou');
		
	}
	public function sellChat($id)
	{		
       $data['id'] = $id;
      // $data['messages'] = $this->db->query('SELECT * FROM messages WHERE order_id="'.$id.'"')->result();
       $data['messages']	=	$this->adminmodel->getMessages($id);
       $data['sellOrder']	=	$this->adminmodel->sellOrderById($id);

       $this->load->view('sellchat',$data);
		
	}
	public function sellChat1($sellId,$last_id)
	{
           $chat = $this->db->query('SELECT * FROM sell_messages WHERE sell_id="'.$sellId.'" AND id > "'.$last_id.'"')->result();
           echo json_encode($chat);		
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

	public function saveSell()
	{
		if($this->input->post())
		{

			if($this->input->post('site_user_id'))
			{
				$user_id 	=	$this->input->post('site_user_id');

				$data 		=	array
									(
										'title'			=>	$this->input->post('ctitle'),
										'surname'		=>	$this->input->post('sname'),
										'house_no'		=>	$this->input->post('chouseno'),
										'street'		=>	$this->input->post('cstreetaddress'),
										'city'			=>	$this->input->post('ctown'),
										'country'		=>	$this->input->post('country')

									);
				$result 	=	$this->adminmodel->updateSiteUser($user_id,$data);

				if($result)
				{
					$this->adminmodel->sendSellOrderToCMS($_POST); /* for leadsqude integration */
				}
			}

			else
			{
				$this->adminmodel->sendSellOrderToCMS($_POST); /* for leadsqude integration */
				
				$userData		=	array
									(
										'title'			=>	$this->input->post('ctitle'),
										'first_name'	=>	$this->input->post('cname'),
										'surname'		=>	$this->input->post('sname'),
										'email'			=>	strtolower($this->input->post('email')),
										'phone'			=>	$this->input->post('phone'),
										'house_no'		=>	$this->input->post('chouseno'),
										'street'		=>	$this->input->post('cstreetaddress'),
										'city'			=>	$this->input->post('ctown'),
										'country'		=>	$this->input->post('country'),
										'postcode'		=>	$this->input->post('postcode'),
										'password'		=>	md5($this->input->post('password'))
									);

				$user_id 		=	$this->adminmodel->insert_site_user($userData);
			}			

			if($user_id)
			{

				$sellData 	= array
							(
								'brand_id'		=>	$this->input->post('brand'),
								'model_id'		=>	$this->input->post('model'),
								'memory'		=>	$this->input->post('memory'),
								'phone_status'	=>	$this->input->post('phoneStatus'),
								'accessories'	=>	$this->input->post('accessory'),
								'issues'		=>	$this->input->post('issue'),
								'site_user_id'	=>	$user_id
							);	

				$sell_id	=	$this->adminmodel->insertion($sellData);		

				if($sell_id)
				{
					/* Customer email start */
					
					$this->load->library('email');					
					$htmlContent = '<h3>Hi '.$this->input->post('cname').'</h3>';
					$htmlContent .= '</br>';
					$htmlContent .= '<p>Your Request is in Process</p>';
					$htmlContent .= '<p>Your Order Number Is:PCGSELL'.$sell_id.'</p>';
					$htmlContent .= '</br>';
					$htmlContent .= '<p>If you have any query. Please Visit the following link</p>';
					$htmlContent .= "<a href='".base_url()."sell/sellChat/".$sell_id."'>".base_url()."sell/chat/".$sell_id."</a>";
		                    
					$this->email->from('repair@pcgarage.uk.com', 'Pcgarage');
					$this->email->to($this->input->post('email'));
					// $this->email->cc('raj.saini15@gmail.com');
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					$this->email->subject('Request Status');
					$this->email->message($htmlContent);			
					$this->email->send();

					/* Customer email end */

					//$url = base_url();

					/* Customer email start */

					/*$data = array
								(

									'name'		=>	$this->input->post('cname'),
									'sell_id'	=>	$sell_id,
									'url'		=>	$url,
									'email'		=>	$this->input->post('email')
								);

					$string = http_build_query($data);		

					$ch = curl_init($url.'sendgrid/sellemail.php');			
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
					# Return response instead of printing.
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
					# Send request.
					$response = curl_exec($ch);
					curl_close($ch);*/
					/* Customer email end   */

					/* Admin email start */				

					/*$queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$this->input->post('brand')."'");
					$rowi = $queryi->result();

					$brand_name 		= 	isset($rowi[0]->catname) ? $rowi[0]->catname : '';

					$query = $this->db->query("SELECT * FROM modals WHERE id = '".$this->input->post('model')."'");
					$row = $query->result();

					$model_name 		=	isset($row[0]->modalname) ? $row[0]->modalname : '';					

					$data = array
								(
									'name'		=>	$this->input->post('cname'),
									'phone'		=>	$this->input->post('phone'),							
									'email'		=>	$this->input->post('email'),
									'brand_name'=>	$brand_name,
									'model_name'=>	$model_name,									
									'issues'	=>	$this->input->post('issue')		

								);

					$string = http_build_query($data);

					//echo $string;die;

					$ch = curl_init($url.'sendgrid/selladminemail.php');			
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $string);			
					# Return response instead of printing.
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
					# Send request.
					$response = curl_exec($ch);
					curl_close($ch);*/

					/* Admin email end   */


					/* Admin email start */

					$this->load->library('email');

					$htmladminemail = '<h3>Hello Admin</h3>';
					$htmladminemail .= '</br>';
					$htmladminemail .= '<p>New request posted on the site with Sell Order Number Is:PCGSELL'.$sell_id.'</p>';
					
					$htmladminemail .= '<table><tr><th colspan="2">Customer Detail</th></tr>';
					$htmladminemail .= '<tr><td>Name</td><td>'.$this->input->post('cname').'</td></tr>';
					$htmladminemail .= '<tr><td>Phone</td><td>'.$this->input->post('phone').'</td></tr>';
					$htmladminemail .= '<tr><td>Email</td><td>'.$this->input->post('email').'</td></tr></table>';
					
					$htmladminemail .= '<table><tr><th colspan="2">Order Detail</th></tr>';
					$queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$this->input->post('brand')."'");
					$rowi = $queryi->result();
					$htmladminemail .= '<tr><td>Brand name</td><td>'.$rowi[0]->catname.'</td></tr>';
					$query = $this->db->query("SELECT * FROM modals WHERE id = '".$this->input->post('model')."'");
					$row = $query->result();
					$htmladminemail .= '<tr><td>Model name</td><td>'.$row[0]->modalname.'</td></tr>';				
					$htmladminemail .= '<tr><td>Problems</td><td>'.$this->input->post('issue').'</td></tr>';		
					$htmladminemail .= '<p>You can check the full detail from admin dashboard.</p>';
					$htmladminemail .= '<p>Pcgarage<br/>Thanks</p>';
					
					$this->email->from('repair@pcgarage.uk.com', 'Pcgarage');
					$this->email->to('info@pcgarage.uk.com');					
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					$this->email->subject('Sell Request Order');
					$this->email->message($htmladminemail);			
					$this->email->send();

					/* Admin email end */

					$this->session->set_userdata(array('repair_id'=>$sell_id,'uemail'=>$this->input->post('email')));

					$this->load->view('sell_thankyou');
				}		

			}			
		}

	}

	public function getUserDetail()
	{
		$data 		=	array
							(
								'email'		=>	$this->input->post('uemail'),
								'password'	=>	md5($this->input->post('upassword'))	
							);
		$userDetail = 	$this->adminmodel->getUserDetail($data);

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

	public function getUserDetailById()
	{
		$userDetail = $this->adminmodel->getUserDetailById($this->input->post('userId'));

		if($userDetail)
		{
			echo json_encode($userDetail);die;
		}
	}

	public function sellOrder()
	{
		$data['sellOrder']	=	$this->adminmodel->sellOrderById($this->session->userdata('site_user_id'));

		$this->load->view('user/pages/sellorder',$data);
	}

	public function getRepairUserDetailById()
	{
		if($this->session->userdata('site_user_id'))
		{
			$userId = $this->session->userdata('site_user_id');
		}

		else
		{
			$userId =0;
		}
		
		$data 		=	array
							(
								'user_id'	=>	$userId
							);
		$userDetail = 	$this->adminmodel->getRepairUserDetail($data);
		
		echo json_encode($userDetail);die;					

	}		
	
}
?>