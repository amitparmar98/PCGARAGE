<?php
   $query = $this->db->query('SELECT * FROM services');
   $allservices= $query->result();
   
   $query1 = $this->db->query('SELECT * FROM vendor');
   $allvendor= $query1->result();
   
   foreach($allservices as $ser){ 
   	
   if($ser->name == 'Walk-in Service')              
   {
   ?>
<style>
   .form-control1 {
   border: 1px solid #ececec;
   font-size: 12px;
   margin-bottom: 15px;
   height: calc(2.25rem + 2px);
   }
   .btn1 {
   background: #002948;
   border-radius: 10px;
   color: #fff;
   display: inline-block;
   padding: 6px 50px;
   }
</style>
<div id="srorder1_<?php echo $ser->id; ?>" class="row mb-5 d-none">
   <div class="col-md-9">
      <div class="white_bg_custom">
        <div class="heading text-center">
            <h1><?php echo $ser->name; ?></h1>
            <p><?php echo $ser->description; ?></p>
        </div>       
		
		<div class="px-5 mt-5">
	      	<div class="row">
	      	 	<div class="col-md-12">
	          	 	<span id="login_error" style="color: red; display: none;"><h4 align="center">Invalid Username or Password!</h4></span>
	                <span id="login_success" style="color: green; display: none;"><h4 align="center">Login Successful</h4></span>
	         	</div>
	     	   </div>
         <?php if(!$this->session->userdata('site_user_id')):?>
		   <!---form start here -->
	         <div class="row" id="repair_login_div">
	            <div class="col-md-12">                          
	               <h2 align="center">Login</h2>
	            </div> 

   			 	<div class="col-md-12">
	                 <form action="#" method="POST" id="repair_login_form">
	                    <div class="row">
	                       <div class="col-md-6 sellinputholder">
	                          <input class="form-control form-control1" required="" name="uemail" placeholder="Email" type="email">
	                       </div>
	                       <div class="col-md-6 sellinputholder">
	                          <input class="form-control form-control1" required="" name="upassword" placeholder="Password" type="password">
                             <a href="<?php echo base_url('login/forgotPassword');?>" style="float: right;" target="_blank">Forgot Password</a>
	                       </div>
	                       <div class="col-md-12 text-center">
	                          <button type="submit" class="btn btn-blue btn1 btnRepairLogin">Login</button>                             
	                       </div>
	                    </div>
	                 </form>
   			 	</div>
		      </div>
          <!--- form end here-->

         <?php endif;?>

		   </div>
        
         <hr/>
         <div class="px-5 mt-5">
            <div class="heading text-center">
               <h4>Please fill the form to get your reference number for walk in service! </h4>
            </div>
            <form role="service-form" method="post" class="orderform" id="orderform" action="<?php echo base_url(); ?>repair/order">
               <input type="hidden" name="device"  class="device-n" value="">
               <input type="hidden" name="model"  class="modal-n" value="">
               <input type="hidden" name="brand"  class="brand-n" value="">
               <input type="hidden" name="service"  class="service-n" value="">
               <input type="hidden" name="site_user_id" class="site_user_id">
               <input type="hidden" name="office"  class="office-n" value="<?php echo isset($office_id)?$office_id:''; ?>">
               <div class="row">
                  <div class="col-md-6">
                     <input class="form-control form-control1 cname" required name='cname' placeholder="Name*" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 phone" name='phone' required placeholder="Mobile*" type="number">
                     <i class="form-control-feedback phone_error" data-fv-icon-for="" style="display: none; color: red;">Phone No should be 10 digit!</i>
                  </div>
                  <div class="col-md-12">
                     <input class="form-control form-control1 email" required name='email' placeholder="E-Mail *" type="email">
                     <i class="form-control-feedback email_error" data-fv-icon-for="email" style="display: none; color: red;">Email Already Exists!</i>
                     <small class="help-block" data-fv-validator="emailAddress" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">Invalid Email Address!</small>
                  </div>
                  <div class="col-md-12">
                     <input class="form-control form-control1 address" name='address' placeholder="Address" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 post_code" name='post_code' placeholder="Postcode" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 datetimepicker44 walkingdatetime" name='walkingdatetime' required  placeholder="Date & Time">
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control form-control1 color" name='color'>
                        <option>White</option>
                        <option>Black</option>
                        <option>Grey</option>
                        <option>Gold</option>
                     </select>                    
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control form-control1 branch" name='branch'>
                        <?php foreach($allvendor as $key=>$aa) {?>	
                        <option value="<?php echo $aa->id; ?>"><?php echo $aa->business_name; ?></option>
                        <?php } ?>
                     </select>                     
                  </div>

                  <div class="col-md-12">
                     <textarea class="form-control form-control1 message" name='message' style="height: 100px;" placeholder="Message"></textarea>
                  </div>
                  
                   <?php if(!$this->session->userdata('site_user_id')):?>

                     <div class="col-md-6 sellinputholder password_div">
                     	 <input class="form-control form-control1 password" name="password" placeholder="Password" type="password" required="">
                     </div>

                    <div class="col-md-6 sellinputholder cpassword_div">
                      <input class="form-control form-control1 cpassword" name="cpassword" placeholder="Confirm password" type="password" required="">
                    </div>

                   <?php endif;?>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="btn btn-blue btn1">SEND</button>
                  </div>
               </div>
            </form>
         </div>
         <hr />
         <div class="row mt-5" role="Walk_in_Service_tabs">
            <div class="col-sm-12">
               <ul class="nav nav-tabs main-tabs nav-justified" role="tablist" style="">
                  <?php foreach($allvendor as $key=>$a) { ?>
                  <li class="nav-item">
                     <a class="<?php if($key==0) { ?> active <?php } ?>" onclick="serviceOffice(<?php echo $a->id; ?>);" href="#stab_<?php echo $a->id; ?>" role="tab" data-toggle="tab"><?php echo isset($a->business_name)?$a->business_name:''; ?></a>
                  </li>
                  <?php } ?>
               </ul>
               <div class="tab-content">
                  <?php foreach($allvendor as $key=>$a) { ?>
                  <div id="stab_<?php echo $a->id; ?>" class="tab-pane fade show <?php if($key==0) { $office_id = $a->id; ?> active <?php } ?>" role="tabpanel">
                     <div class="tab-inner">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="media">
                                 <i class="fa fa-map-marker d-flex mr-4" aria-hidden="true"></i>
                                 <div class="media-body">
                                    <strong><?php echo $a->business_name; ?>  (Head Office)</strong> <br />
                                    <?php echo $a->address1; ?><br />
                                    <?php echo $a->city; ?> | <?php echo $a->zip; ?>
                                 </div>
                              </div>
                              <div class="media">
                                 <i class="fa fa-phone d-flex mr-4" aria-hidden="true"></i>
                                 <div class="media-body">
                                    <?php echo $a->phone; ?>
                                 </div>
                              </div>
                              <div class="media">
                                 <i class="fa fa-envelope-o d-flex mr-4" aria-hidden="true"></i>
                                 <div class="media-body">
                                    <a href=""><?php echo $a->emails; ?></a>
                                 </div>
                              </div>
                              <div class="media">
                                 <i class="fa fa-desktop d-flex mr-4" aria-hidden="true"></i>
                                 <div class="media-body">
                                    <a href=""><?php echo $a->website; ?></a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <?php echo $a->location_on_map; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row nxt-prv-buttom text-center p-4">
         <div class="col-sm-12">
            <a href="javascript:void(0);" onClick="moveNextPrev1(5,<?php echo $ser->id; ?>)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="repair-box-sidebar m-0">
         <h4>You Have Selected </h4>
         <ul class="IssueList">
            <li class="media">
               <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedDeviceName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedBrandLi" style="display: none;">
               <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedBrandName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedModalLi" style="display: none;">
               <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedModalName">
                  Mobile Phone
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
<?php }
   if($ser->name == 'Mail-in Repair Service') {
   ?>
<div id="srorder1_<?php echo $ser->id; ?>" class="row mb-5 d-none">
   <div class="col-md-9">
      <div class="white_bg_custom">
         <div class="heading text-center">
            <h1>Mail-in Repair Service</h1>
            <p><?php echo $ser->short_description; ?></p>
         </div>
         <div class="row mt-5 text-center service-boxes">
            <div class="col-md-4">
               <span><img src="img/service-icon-1.png" alt="" /></span>
               <p>Book your repair , write the reference number and IMEI number on paper and enclose it with your device.</p>
            </div>
            <div class="col-md-4">
               <span><img src="img/service-icon-2.png" alt="" /></span>
               <p>Package your device in padded/bubble envelop and send it to us. </p>
            </div>
            <div class="col-md-4">
               <span><img src="img/service-icon-3.png" alt="" /></span>
               <p>Repair will be done by our expert technicians and, the item will be dispatched back to you through Royal Mail Special next day recorded special delivery within 24 hours. </p>
            </div>
         </div>
         <hr />
         <div class="px-5 mt-5">
            <div class="heading text-center">
               <h4 style="margin-bottom:10px;">Please fill the form to get your reference
                  number for mail in repair service ! 
               </h4>
               <div class="mb-5">(inc. postal charges)</div>
            </div>
            <form role="service-form" method="post" class="orderform" id="orderform" action="<?php echo base_url(); ?>repair/order">
                <input type="hidden" name="device"  class="device-n" value="">
               <input type="hidden" name="model"  class="modal-n" value="">
               <input type="hidden" name="brand"  class="brand-n" value="">
               <input type="hidden" name="service"  class="service-n" value="">
               <input type="hidden" name="site_user_id" class="site_user_id">
               <input type="hidden" name="office"  class="office-n" value="<?php echo isset($office_id)?$office_id:''; ?>">
                <div class="row">
                  <div class="col-md-6">
                     <input class="form-control form-control1 cname" required name='cname' placeholder="Name*" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 phone" name='phone' required placeholder="Mobile*" type="number">
                     <i class="form-control-feedback phone_error" data-fv-icon-for="" style="display: none; color: red;">Phone No should be 10 digit!</i>
                  </div>
                  <div class="col-md-12">
                     <input class="form-control form-control1 email" required name='email' placeholder="E-Mail *" type="email">
                     <i class="form-control-feedback email_error" data-fv-icon-for="email" style="display: none; color: red;">Email Already Exists!</i>
                     <small class="help-block" data-fv-validator="emailAddress" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">Invalid Email Address!</small>
                  </div>
                  <div class="col-md-12">
                     <input class="form-control form-control1 address" name='address' placeholder="Address" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 post_code" name='post_code' placeholder="Postcode" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control form-control1 datetimepicker44 walkingdatetime" name='walkingdatetime' required  placeholder="Date & Time">
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control form-control1 color" name='color'>
                        <option>White</option>
                        <option>Black</option>
                        <option>Grey</option>
                        <option>Gold</option>
                     </select>                    
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control form-control1 branch" name='branch'>
                        <?php foreach($allvendor as $key=>$aa) {?>   
                        <option value="<?php echo $aa->id; ?>"><?php echo $aa->business_name; ?></option>
                        <?php } ?>
                     </select>                     
                  </div>

                  <div class="col-md-12">
                     <textarea class="form-control form-control1 message" name='message' style="height: 100px;" placeholder="Message"></textarea>
                  </div>
                  
                   <?php if(!$this->session->userdata('site_user_id')):?>

                     <div class="col-md-6 sellinputholder password_div">
                         <input class="form-control form-control1 password" name="password" placeholder="Password" type="password" required="">
                     </div>

                    <div class="col-md-6 sellinputholder cpassword_div">
                      <input class="form-control form-control1 cpassword" name="cpassword" placeholder="Confirm password" type="password" required="">
                    </div>

                   <?php endif;?>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="btn btn-blue btn1">SEND</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="row nxt-prv-buttom text-center p-4">
         <div class="col-sm-12">
            <a href="javascript:void(0);" onClick="moveNextPrev1(5,<?php echo $ser->id; ?>)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <!--<a href="java<script></script>:void(0);" onClick="moveNextPrev(5,4)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>-->
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="repair-box-sidebar m-0">
         <h4>You Have Selected </h4>
         <ul class="IssueList">
            <li class="media">
               <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedDeviceName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedBrandLi" style="display: none;">
               <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedBrandName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedModalLi" style="display: none;">
               <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedModalName">
                  Mobile Phone
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
<?php   } 
   if($ser->name == 'Call Out Service') {
   ?>
<div id="srorder1_<?php echo $ser->id; ?>" class="row mb-5 d-none">
   <div class="col-md-9">
      <div class="white_bg_custom">
         <div class="heading text-center">
            <h1>Call Out Service</h1>
            <p>we'll come to you anywhere in city of London to repair your phone in front of you. Repair is done in just 30-40 minutes while you wait.we'll charge you once repair is done successfully.</p>
            <div class="fix"style="color: #7f7f7f;">No Fix No Fee.</div>
         </div>
         <div class="row mt-5 text-center service-boxes">
         </div>
         <hr />
         <div class="px-5 mt-5">
            <div class="heading text-center">
               <h4 style="margin-bottom:10px;">Please fill the form to get your reference
                  number for mail in repair service ! 
               </h4>
               <div class="mb-5">(inc. postal charges)</div>
            </div>
            <form role="service-form" method="post" class="orderform" id="orderform" action="<?php echo base_url(); ?>repair/order">
               <input type="hidden" name="device"  class="device-n" value="">
               <input type="hidden" name="model"  class="modal-n" value="">
               <input type="hidden" name="brand"  class="brand-n" value="">
               <input type="hidden" name="service"  class="service-n" value="">
               <div class="row">
                  <div class="col-md-12">
                     <input class="form-control" name='cname' required placeholder="Name*" type="text">
                  </div>
                  <div class="col-md-12">
                     <input class="form-control" name='address' placeholder="Address" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control"   name='phone' required placeholder="Mobile *" type="number">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" name='email' required placeholder="E-Mail *" type="email">
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control" name='color'>
                        <option>White</option>
                        <option>Black</option>
                        <option>Grey</option>
                        <option>Gold</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" name='post_code' placeholder="Postcode *" type="text">
                  </div>
                  <div class="col-md-12">
                     <textarea class="form-control" name='message' placeholder="Message"></textarea>
                  </div>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="btn btn-blue">SEND</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="row nxt-prv-buttom text-center p-4">
         <div class="col-sm-12">
            <a href="javascript:void(0);" onClick="moveNextPrev1(5,<?php echo $ser->id; ?>)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <!--<a href="javascript:void(0);" onClick="moveNextPrev(5,4)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>-->
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="repair-box-sidebar m-0">
         <h4>You Have Selected </h4>
         <ul class="IssueList">
            <li class="media">
               <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedDeviceName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedBrandLi" style="display: none;">
               <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedBrandName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedModalLi" style="display: none;">
               <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedModalName">
                  Mobile Phone
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
<?php }
   if($ser->name == 'Collect My Device Service') {
   ?>
<div id="srorder1_<?php echo $ser->id; ?>" class="row mb-5 d-none">
   <div class="col-md-9">
      <div class="white_bg_custom">
         <div class="heading text-center">
            <h1>Collect My Device Service</h1>
            <p>We offer courier service within City of London area. Our courier will come to you to collect the smart phone, tablet or laptop, and return it same day to you. All of our service comes with full 12 months warranty.</p>
         </div>
         <div class="row mt-5 text-center service-boxes">
         </div>
         <hr />
         <div class="px-5 mt-5">
            <div class="heading text-center">
               <h4 style="margin-bottom:10px;">Please fill the form to get your reference
                  number for collect my device service ! 
               </h4>
               <div class="mb-5">(inc. collecting charges)</div>
            </div>
            <form role="service-form" method="post" class="orderform" id="orderform" action="<?php echo base_url(); ?>repair/order">
               <input type="hidden" name="device" class="device-n" value="">
               <input type="hidden" name="model" class="modal-n" value="">
               <input type="hidden" name="brand" class="brand-n" value="">
               <input type="hidden" name="service" class="service-n" value="">
               <div class="row">
                  <div class="col-md-12">
                     <input class="form-control" name='cname' placeholder="Name*" required type="text">
                  </div>
                  <div class="col-md-12">
                     <input class="form-control" name='address' placeholder="Address" type="text">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control"   name='phone' placeholder="Mobile *" required type="number">
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" name='email' placeholder="E-Mail *" required type="email">
                  </div>
                  <div class="col-md-6">
                     <select class="custom-select form-control" name='color'>
                        <option>White</option>
                        <option>Black</option>
                        <option>Grey</option>
                        <option>Gold</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" name='post_code' placeholder="Postcode *" type="text">
                  </div>
                  <div class="col-md-12">
                     <textarea class="form-control" name='message' placeholder="Message"></textarea>
                  </div>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="btn btn-blue">SEND</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="row nxt-prv-buttom text-center p-4">
         <div class="col-sm-12">
            <a href="javascript:void(0);" onClick="moveNextPrev1(5,<?php echo $ser->id; ?>)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <!--<a href="javascript:void(0);" onClick="moveNextPrev(5,4)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>-->
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="repair-box-sidebar m-0">
         <h4>You Have Selected </h4>
         <ul class="IssueList">
            <li class="media">
               <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedDeviceName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedBrandLi" style="display: none;">
               <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedBrandName">
                  Mobile Phone
               </div>
            </li>
            <li class="media selectedModalLi" style="display: none;">
               <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
               <div class="media-body selectedModalName">
                  Mobile Phone
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
<?php  
   }
             }
   
   ?>

