<?php
	class Adminmodel extends CI_model{
		function dologin($uname,$pass){
			$query = $this->db->query('SELECT * FROM users WHERE username = "'.$uname.'" AND password = "'.$pass.'"');
			$this->db->last_query();
			return $query->num_rows(); 
		}
		function getuser($table,$condition){
			$this->db->select("*");
			$this->db->from($table);
			$this->db->where($condition);
			$query = $this->db->get()->row();
			return $query;
		}
		
		function adduser(){
			$data = array(
				'fullname' => $_POST['fullname'], 
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
		
			);
			$this->db->insert('users', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		} 
		function alluser(){
			$query = $this->db->query('SELECT * FROM users');
			return $query->result();
		}
		
		function allbrands(){
			$query = $this->db->query('SELECT * FROM brands');
			return $query->result();
		}
		function allParentbrands(){
			$query = $this->db->query('SELECT * FROM brands Where pid="0"');
			return $query->result();
		}
		function allSubbrands(){
			$query = $this->db->query('SELECT * FROM brands Where pid >= "1"');
			return $query->result();
		}
		function allModals(){
			$query = $this->db->query('SELECT * FROM modals');
			return $query->result();
		}
		function allissue(){
			$query = $this->db->query('SELECT * FROM pc_issue');
			return $query->result();
		}
		function edituserform($id){
			$query = $this->db->query('SELECT * FROM users WHERE id="'.$id.'"');
			$row['u'] = $query->row();
			return $row;
		}
		function edituser($id){
			$data = array(
				'fullname' => $_POST['fullname'], 
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
			);
			$this->db->where('id',$id);
			$this->db->update('users',$data);
		}
		
		function getmodal($id){
			$this->db->select("*");
			$this->db->from('modals');
			$this->db->where('id',$id);
			$query = $this->db->get()->row();
			return $query;
		}
		function searchmodel($skey){
			$this->db->select("*");
			$this->db->from('modals');
			$this->db->like('modalname',$skey, 'after');
			$query = $this->db->get()->result();
			return $query;
		}
		
		function getpage($id){
			$this->db->select("*");
			$this->db->from('pages');
			$this->db->where('id',$id);
			$query = $this->db->get()->row();
			return $query;
		}
		function editmodal($id,$fileName){
			if($fileName!=''){
				$data = array(
					'modalname' => $_POST['modalname'], 
					'brand_id' => $_POST['brand_id'], 
					'modal_order' => $_POST['modal_order'], 
					'image'=>$fileName
				);
			}else{
				$data = array(
					'modalname' => $_POST['modalname'], 
					'brand_id' => $_POST['brand_id'],
					'modal_order' => $_POST['modal_order']
				);
			}
			$this->db->where('id',$id);
			$this->db->update('modals',$data);
		}
		function editpage($id){
		
				$data = array(
					'page_title' => $_POST['page_title'], 
					'page_content' => $_POST['page_content']
					
				);
			
			
			$this->db->where('id',$id);
			$this->db->update('pages',$data);
		}
		
		function getbrand($id){
			$this->db->select("*");
			$this->db->from('brands');
			$this->db->where('id',$id);
			$query = $this->db->get()->row();
			return $query;
		}		
		function editbrand($id,$fileName){
		
			if($fileName!=''){
				$data = array(
					'pid' => $_POST['pid'], 
					'catname' => $_POST['catname'], 
					'image'=>$fileName,
					'brands_order'=>$_POST['brands_order'],
				);
			}else{
				$data = array(
					'pid' => $_POST['pid'], 
					'catname' => $_POST['catname'],
					'brands_order'=>$_POST['brands_order'],
				);
			}
			$this->db->where('id',$id);
			$this->db->update('brands',$data);
		}
		function getissue($id){
			$this->db->select("*");
			$this->db->from('pc_issue');
			$this->db->where('id',$id);
			$query = $this->db->get()->row();
			return $query;
		}
		function searchissue($skey){
			$this->db->select('pi.*, m.modalname, b.catname');
			$this->db->from('pc_issue pi');
			$this->db->join('modals m', 'pi.modal_id = m.id');
			$this->db->join('brands b', 'pi.brand_id = b.id');
			$this->db->like('pi.issue_name',$skey, 'after');
			$query = $this->db->get()->result();
			return $query;
		}		
		function editissue($id,$fileName){
			/* echo $fileName;
			echo "<pre>"; print_r($_POST); die; */
			if($fileName!=''){
				$data = array(
					'brand_id' => $_POST['brand_id'], 
                                    'modal_id' => $_POST['modal_id'],
                                    'price' => $_POST['price'],
					'issue_name' => $_POST['issue_name'], 
					'image'=>$fileName
				);
			}else{
				$data = array(
					'brand_id' => $_POST['brand_id'], 
					'issue_name' => $_POST['issue_name'],
                                    'modal_id' => $_POST['modal_id'],
                                    'price' => $_POST['price'],
				);
			}
			$this->db->where('id',$id);
			$this->db->update('pc_issue',$data);
		}
		
		function deluser($id){
			$query = $this->db->query('DELETE FROM users WHERE id="'.$id.'"');
		}
		
		function addvendor(){
			$data = array(
				'fullname' => $_POST['fullname'], 
				'emails' => $_POST['emails'],
				'website' => $_POST['website'],
				'business_name' => $_POST['business_name'],
				'address1' => $_POST['address1'],
				'address2' => $_POST['address2'],
				'city' => $_POST['city'],
				'state' => $_POST['state'],
				'zip' => $_POST['zip'],
				'phone' => $_POST['phone'],
				'location_on_map' => $_POST['location_on_map'],
		
			);
			$this->db->insert('vendor', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		function allvendor(){
			$query = $this->db->query('SELECT * FROM vendor');
			return $query->result();
		}
		
		function editvendorform($id){
			$query = $this->db->query('SELECT * FROM vendor WHERE id="'.$id.'"');
			$row['v'] = $query->row();
			return $row;
		}
		function editvendor($id){
			$data = array(
				'fullname' => $_POST['fullname'], 
				'emails' => $_POST['emails'],
				'website' => $_POST['website'],
				'business_name' => $_POST['business_name'],
				'address1' => $_POST['address1'],
				'address2' => $_POST['address2'],
				'city' => $_POST['city'],
				'state' => $_POST['state'],
				'zip' => $_POST['zip'],
				'phone' => $_POST['phone'],
				'location_on_map' => $_POST['location_on_map'],
		
			);
			$this->db->where('id',$id);
			$this->db->update('vendor',$data);
		}
		function delvendor($id){
			$query = $this->db->query('DELETE FROM vendor WHERE id="'.$id.'"');
		}
		
		function contact(){
			
			$data = array(
				'names' => $_POST['names'], 
				'emails' => $_POST['emails'],
				'phones' => $_POST['phones'],
				'call_time' => $_POST['call_time'],
			);
			$this->db->insert('contact_info', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		function frontform(){
			
			$data = array(
				'brand' => $_POST['brand'], 
				'modal' => $_POST['modal'],
				'age_of_device' => $_POST['age_of_device'],
				'color' => $_POST['color'],
				'purchase_price' => $_POST['purchase_price'],
				'exp_price' => $_POST['exp_price'],
			);
			$this->db->insert('home_form', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		function addOrder(){
			
			$data = array(
				'brand' => $_POST['brand'], 
				'model' => $_POST['model'],
				'color' => $_POST['color'],
				'issue' => $_POST['issue'],
				'cname' => $_POST['cname'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'call_time' => $_POST['call_time'],
			);
			$this->db->insert('orders', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
                
            public function record_count_order(){
			return $this->db->count_all('orders');
		}
                public function record_count_sell(){
			return $this->db->count_all('sells');
		}

		public function record_count_sellorder()
		{
			return $this->db->count_all('sell');
		}

		public function record_count_otherOrder()
		{
			return $this->db->count_all('other_orders');
		}
                
        public function allorders($limit, $offset)
        {
			$query = $this->db->order_by('id','desc')->get('orders', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                public function allsells($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('sells', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                public function alluser1($limit, $offset){
			$query = $this->db->get('users', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                public function allModals1($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('modals', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                public function allbrands1($limit, $offset){
			$query = $this->db->order_by('brands_order','desc')->where('pid','0')->get('brands', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                
                function allpage($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('pages', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                
                public function subBrands1($id){
               
			$query = $this->db->where('pid',$id)->get('brands');
			$result = $query->result();
                    
			return $result;
		}
		
        public function allissue1($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('pc_issue', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                
                public function allservice1($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('services', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                
                public function allvendor1($limit, $offset){
			$query = $this->db->order_by('id','desc')->get('vendor', $limit, $offset);
			$result = $query->result();
			return $result;
		}
                
          	function getService($id){
			$this->db->select("*");
			$this->db->from('services');
			$this->db->where('id',$id);
			$query = $this->db->get()->row();
			return $query;
		}
                
		function editService($id){
			
				$data = array(
					'name' => $_POST['name'],
					'price' => $_POST['price'],
					'description' => $_POST['description'],
					'short_description' => $_POST['short_description'],
					'status' => $_POST['status'],
				);
			
			$this->db->where('id',$id);
			$this->db->update('services',$data);
		}
           
                 public function record_count_modal(){
			return $this->db->count_all('modals');
		}
                 public function record_count_users(){
			return $this->db->count_all('users');
		}
                 public function record_count_brands(){
			return $this->db->count_all('brands');
		}
                 public function record_count_brands_allbrand(){
					 $query = $this->db->query('SELECT * FROM brands Where pid=0');
			return count($result = $query->result());
		}
                 public function record_count_page(){
			return $this->db->count_all('pages');
		}
                   public function record_count_subbrands($id){
			return $this->db->where('pid',$id)->count_all('brands');
		}
                 public function record_count_issue(){
			return $this->db->count_all('pc_issue');
		}
                
                 public function record_count_service(){
			return $this->db->count_all('services');
		}
                
                 public function record_count_vendor(){
			return $this->db->count_all('vendor');
		}
                
                
                function allbrands11(){
                    
			$query = $this->db->query('SELECT * FROM brands Where pid!=0');
			return $query->result();
                        
		}
                
                 function getmodal1($id){
                    
			$query = $this->db->query('SELECT * FROM modals WHERE brand_id="'.$id.'"');
			return $query->result();
                        
		}
                
                function savevendor($id){
			$data = array(
				'vendor_id' => $_POST['vid'], 
				'status' => $_POST['status'], 
				
		
			);
			$this->db->where('id',$id);
			$this->db->update('orders',$data);
		}
                
        

		
        public function sendOtherOrderToCMS($postdata){
			
			$postdata['message']="N/A";
			$postdata['color']="N/A";
			$shop='N/A';
			


			/* making data string of the user request to send it in api call */
			$data_string = '[{"Attribute":"FirstName","Value":"'.$postdata['cname'].'"},{"Attribute":"mx_Street1","Value":"'.$postdata['address'].'"},{"Attribute":"EmailAddress","Value":"'.$postdata['email'].'"},{"Attribute":"Phone","Value":"'.$postdata['phone'].'"},{"Attribute":"Notes","Value":"'.$postdata['message'].'"},{"Attribute":"mx_Color","Value":"'.$postdata['color'].'"},{"Attribute":"mx_Location","Value":"'.$shop.'"},{"Attribute":"Source","Value":"Web Form"},{"Attribute": "SearchBy","Value": "Phone"}]';
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
				
				//echo $json_response;
				curl_close($curl);
			} catch (Exception $ex) { 
				curl_close($curl);
			}
			if($laedcaptureapiresp->Status =='Success'){
				
				$data_string = '{"RelatedProspectId":"'.$laedcaptureapiresp->Message->RelatedId.'","ActivityEvent":200,"Fields":[{"SchemaName":"mx_Custom_1","Value":"Device"},{"SchemaName":"mx_Custom_2","Value":"'.$postdata['brand'].'"},{"SchemaName":"mx_Custom_3","Value":"'.$postdata['model'].'"},{"SchemaName":"mx_Custom_4","Value":"'.$postdata['issue'].'"},{"SchemaName":"mx_Custom_5","Value":"Walk In Service"}]}';
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
					//echo $json_response; 
					curl_close($curl);
				} catch (Exception $ex) { 
					curl_close($curl);
				}
			}		
			
		}

		public function sendSellOrderToCMS($postdata)
		{
			//echo "<pre>"; print_r($postdata); die;
			/* getting data start*/

			$postdata['message']="N/A";
			$postdata['color']="N/A";			

			if(isset($postdata['branch'])){
				$query = $this->db->query("SELECT * FROM vendor WHERE id = '".$postdata['branch']."'");
				$vendor = $query->row();
				$shop=$vendor->fullname;
			}else{
				$shop='N/A';
			}
			
			$query = $this->db->query("SELECT * FROM brands WHERE id = '".$postdata['brand']."'");
			$brand = $query->row();
			
			$query = $this->db->query("SELECT * FROM brands WHERE id = '".$brand->pid."'");
			$ptype = $query->row();
			
			$query = $this->db->query("SELECT * FROM modals WHERE id = '".$postdata['model']."'");
			$modal = $query->row();
			
			/*$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".implode(',',$postdata['issue']).")")->result();
			$issue_total = array();
			foreach($query11 as $a)
			{
				$issue_total[] = $a->issue_name;
			}*/
			
			/*$query = $this->db->query("SELECT * FROM services WHERE id = '".$postdata['service']."'");
			$service = $query->row();*/
			
			/* getting data ends */
			
			
			/* making data string of the user request to send it in api call */
			$data_string = '[{"Attribute":"FirstName","Value":"'.$postdata['cname'].'"},{"Attribute":"mx_Street1","Value":"'.$postdata['country'].'"},{"Attribute":"EmailAddress","Value":"'.$postdata['email'].'"},{"Attribute":"Phone","Value":"'.$postdata['phone'].'"},{"Attribute":"Notes","Value":"'.$postdata['message'].'"},{"Attribute":"mx_Color","Value":"'.$postdata['color'].'"},{"Attribute":"mx_Location","Value":"'.$shop.'"},{"Attribute":"Source","Value":"Web Form"},{"Attribute": "SearchBy","Value": "Phone"}]';
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
				
				//echo $json_response;
				curl_close($curl);
			} catch (Exception $ex) { 
				curl_close($curl);
			}
			if($laedcaptureapiresp->Status =='Success'){
				
				$data_string = '{"RelatedProspectId":"'.$laedcaptureapiresp->Message->RelatedId.'","ActivityEvent":200,"Fields":[{"SchemaName":"mx_Custom_1","Value":"'.$ptype->catname.'"},{"SchemaName":"mx_Custom_2","Value":"'.$brand->catname.'"},{"SchemaName":"mx_Custom_3","Value":"'.$modal->modalname.'"},{"SchemaName":"mx_Custom_4","Value":"'.$postdata['issue'].'"},{"SchemaName":"mx_Custom_5","Value":"Walk In Service"}]}';
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
					//echo $json_response; 
					curl_close($curl);
				} catch (Exception $ex) { 
					curl_close($curl);
				}
			}
		}

        public function sendOrderToCMS($postdata){
			
			/* echo "<pre>"; print_r($postdata); die; */
			/* getting data start*/
			if(isset($postdata['branch'])){
				$query = $this->db->query("SELECT * FROM vendor WHERE id = '".$postdata['branch']."'");
				$vendor = $query->row();
				$shop=$vendor->fullname;
			}else{
				$shop='N/A';
			}
			
			$query = $this->db->query("SELECT * FROM brands WHERE id = '".$postdata['brand']."'");
			$brand = $query->row();
			
			$query = $this->db->query("SELECT * FROM brands WHERE id = '".$brand->pid."'");
			$ptype = $query->row();
			
			$query = $this->db->query("SELECT * FROM modals WHERE id = '".$postdata['model']."'");
			$modal = $query->row();
			
			$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".implode(',',$postdata['issue']).")")->result();
			$issue_total = array();
			foreach($query11 as $a)
			{
				$issue_total[] = $a->issue_name;
			}
			
			$query = $this->db->query("SELECT * FROM services WHERE id = '".$postdata['service']."'");
			$service = $query->row();
			
			/* getting data ends */
			
			
			/* making data string of the user request to send it in api call */
			$data_string = '[{"Attribute":"FirstName","Value":"'.$postdata['cname'].'"},{"Attribute":"mx_Street1","Value":"'.$postdata['address'].'"},{"Attribute":"EmailAddress","Value":"'.$postdata['email'].'"},{"Attribute":"Phone","Value":"'.$postdata['phone'].'"},{"Attribute":"Notes","Value":"'.$postdata['message'].'"},{"Attribute":"mx_Color","Value":"'.$postdata['color'].'"},{"Attribute":"mx_Location","Value":"'.$shop.'"},{"Attribute":"Source","Value":"Web Form"},{"Attribute": "SearchBy","Value": "Phone"}]';
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
				
				//echo $json_response;
				curl_close($curl);
			} catch (Exception $ex) { 
				curl_close($curl);
			}
			if($laedcaptureapiresp->Status =='Success'){
				
				$data_string = '{"RelatedProspectId":"'.$laedcaptureapiresp->Message->RelatedId.'","ActivityEvent":200,"Fields":[{"SchemaName":"mx_Custom_1","Value":"'.$ptype->catname.'"},{"SchemaName":"mx_Custom_2","Value":"'.$brand->catname.'"},{"SchemaName":"mx_Custom_3","Value":"'.$modal->modalname.'"},{"SchemaName":"mx_Custom_4","Value":"'.implode(',',$issue_total).'"},{"SchemaName":"mx_Custom_5","Value":"'.$service->name.'"}]}';
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
					 //echo $json_response; 
					curl_close($curl);
				} catch (Exception $ex) { 
					curl_close($curl);
				}
			}
			
		}

		public function saveOtherBrand($data = array())
		{
			$this->db->insert('other_orders',$data);
			return $this->db->insert_id();
		}

		public function otherOrderSave($limit=0,$offset=0)
		{
			$this->db->select('other_orders.*,vendor.fullname');
			$this->db->from('other_orders');
			$this->db->join('vendor','vendor.id = other_orders.vendor_id','left');
			$this->db->limit($limit,$offset);	
			$this->db->order_by('other_id','DESC');	

			$query = $this->db->get();
			return $query->result();
		}

		public function getAllOtherOrders($otherOrderId=0)
		{
			$this->db->select('*');
			$this->db->from('other_orders');
			$this->db->where('other_id',$otherOrderId);

			$query = $this->db->get();
			return $query->row();
		}

		public function saveOtherVendor($otherId=0, $data=array())
		{
			$this->db->set($data);
			$this->db->where('other_id',$otherId);
			return $this->db->update('other_orders');
		}

		public function insertion($data=array())
		{
			$this->db->insert('sell',$data);
			return $this->db->insert_id();
		}

		public function getUserDetail($data=array())
		{
			$this->db->select('*');
			$this->db->from('site_user');
			$this->db->where($data);

			$query = $this->db->get();
			return $query->row();
		}

		public function getUserDetailById($userId=0)
		{
			$this->db->select('*');
			$this->db->from('site_user');
			$this->db->where('user_id',$userId);

			$query = $this->db->get();
			return $query->row();
		}

		public function getRepairUserDetail($data=array())
		{
			$this->db->select('site_user.*,site_user.postcode as post_code,orders.*,vendor.fullname');
			$this->db->from('site_user');
			$this->db->join('orders','orders.site_user_id = site_user.user_id','left');
			$this->db->join('vendor','vendor.id = orders.vendor_id','left');
			$this->db->where($data);

			$query = $this->db->get();
			return $query->row();
		}

		public function insert_site_user($data=array())
		{
			$this->db->insert('site_user',$data);
			return $this->db->insert_id();
		}

		public function sellOrder($limit=0,$offset=0)
		{
			$this->db->select('sell.*,sell.created_at as order_date,brands.catname as brand_name, modals.modalname as model_name,site_user.first_name,site_user.email,site_user.country,site_user.phone,site_user.city');
			$this->db->from('sell');
			$this->db->join('site_user','site_user.user_id = sell.site_user_id');
			$this->db->join('brands','brands.id = sell.brand_id');
			$this->db->join('modals','modals.id = sell.model_id');
			$this->db->where('sell.status',1);
			$this->db->limit($limit,$offset);
			$this->db->order_by('sell.sell_id','DESC');

			$query = $this->db->get();
			return $query->result();
		}

		public function sellOrderById($id=0)
		{
			$this->db->select('sell.*,brands.catname as brand_name, modals.modalname as model_name,site_user.first_name,site_user.email,site_user.city,site_user.country,site_user.phone');
			$this->db->from('sell');			
			$this->db->join('brands','brands.id = sell.brand_id');
			$this->db->join('modals','modals.id = sell.model_id');
			$this->db->join('site_user','site_user.user_id = sell.site_user_id');
			$this->db->where('sell_id',$id);
			$this->db->where('sell.status',1);
			$this->db->order_by('sell.sell_id','DESC');


			$query = $this->db->get();
			return $query->result();
		}

		public function getMessages($id=0)
		{
			$this->db->select('*');
			$this->db->from('sell_messages');
			$this->db->where('sell_id',$id);

			$query = $this->db->get();
			return $query->result();
		}

		public function chkLogin($data=array())
		{
			$this->db->select('*');
			$this->db->from('site_user');
			$this->db->where($data);

			$query = $this->db->get();
			return $query->row();
		}

		public function chkEmailUnique($email='')
		{
			$this->db->select('*');
			$this->db->from('site_user');
			$this->db->where('email',$email);

			$query = $this->db->get();
			return $query->row();
		}

		public function repairOrder($site_user_id=0)
		{
			$this->db->select('orders.*,brands.catname as brand_name,modals.modalname as model_name,services.name as service_name');
			$this->db->from('orders');
			$this->db->join('brands','brands.id = orders.brand');
			$this->db->join('modals','modals.id = orders.model');
			$this->db->join('services','services.id = orders.service');			
			$this->db->where('orders.site_user_id',$site_user_id);
			$this->db->order_by('orders.id','DESC');

			$query = $this->db->get();
			return $query->result();

		}

		public function savePassword($email='',$data=array())
		{
			$this->db->set($data);
			$this->db->where('email',$email);

			return $this->db->update('site_user');
		}

		public function updateSiteUser($userId = 0, $data=array())
		{
			$this->db->set($data);
			$this->db->where('user_id',$userId);
			return $this->db->update('site_user');
		}
		
	}
	
?>