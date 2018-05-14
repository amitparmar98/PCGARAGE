<?php $this->load->view('front/header'); ?>
<style>
   .sellinputholder{padding:2% !important;}
   .sellinputholder input{margin:2%}
</style>

<script>
   
   var userId =  '<?php echo $this->session->userdata('site_user_id')?>';
</script>
<main role="main-wrapper" class="inner-page-holder py-70">
   <div class="container">
      <section role="repair-holder" id="pc">
         <!--  mobile box-->
         <div id="srorder_1" class="row mb-5">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4>What would you like to sell today?</h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"  style="height:480px;">
                        <div class="row no-gutters brands" id="BranDS">
                           <?php 
                              $data=$this->db->query('SELECT * FROM brands WHERE pid ="10"')->result();
                              if(count($data) > 0){
                                 foreach($data as $key=>$rm){ ?>
                           <div class="col-md-3 text-left align-self-center getBrandModal" <?php if($key > 7) { ?> style="display: none;" <?php  } ?> data-brandid="<?=$rm->id?>" data-brandName1="<?=$rm->catname?>">
                              <div id="brand_<?=$rm->id?>" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="brand1_img_<?=$rm->id?>" src="<?php echo base_url(); ?>uploads/brands/<?php echo $rm->image; ?>" alt="" />
                                 </span>
                              </div>
                           </div>
                           <?php 
                              }
                              if(count($data) > 8){ ?>
                           <div class="col-md-12 d-flex justify-content-center getBrandModal1">
                              <button type="button" onclick="showBrands();"  style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Show More Brands</button>   
                           </div>
                           <?php 
                              }
                              }else{ ?>
                           <div class="col-md-12 text-center">
                              <div id="" class="repair-box">
                                 <h5>No Data Found</h5>
                              </div>
                           </div>
                           <?php   
                              }
                              ?>                                       
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <!-- <a href="javascript:void(0);" onClick="moveNextPrev(1,2)"><i class="fa fa-angle-left" aria-hidden="true"></i></a> -->
                     <!-- <a href="javascript:void(0);" onClick="moveNextPrev(1,2)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a> -->
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul>
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!--end -->
         <!--- mobile model box --> 
         <div id="srorder_2" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4>Select The Model</h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"   style="height:480px;">
                        <div class="row no-gutters brands" id="ModaLS">
                           <!-- here data by Ajax -->
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" onClick="moveNextPrev(1,2)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);" onClick="moveNextPrev(3,2)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul>
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi" style="">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <!-- <li class="media selectedModalLi" style="display: none;">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                        </li> -->
                  </ul>
               </div>
            </div>
         </div>
         <!--- end -->
         <!--- memory box -->
         <div id="srorder_3" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"  style="min-height:450px;">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>What would you like to sell today?</h4>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 memory" data-memory="8" data-memoryid="1" data-memoryname="8GB">
                              <div id="memory_div_1" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_1" src="<?php echo base_url(); ?>uploads/cards/8gb.png" alt="" id="memory_img_1"/>
                                 </span>
                                 <h5 class="accName_1">8GB</h5>
                              </div>
                           </div>
                           <div class="col-md-3 memory" data-memory="16" data-memoryid="2" data-memoryname="16GB">
                              <div id="memory_div_2" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_2" src="<?php echo base_url(); ?>uploads/cards/16gb.png" alt="" id="memory_img_3"/>
                                 </span>
                                 <h5 class="accName_2">16GB</h5>
                              </div>
                           </div>
                           <div class="col-md-3 memory" data-memory="32" ata-memoryid="3" data-memoryname="32GB">
                              <div id="memory_div_3" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_3" src="<?php echo base_url(); ?>uploads/cards/32gb.png" alt="" id="memory_img_3"/>
                                 </span>
                                 <h5 class="accName_3">32GB</h5>
                              </div>
                           </div>
                           <div class="col-md-3 memory" data-memory="64" ata-memoryid="4" data-memoryname="64GB">
                              <div id="memory_div_4" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_4" src="<?php echo base_url(); ?>uploads/cards/64gb.png" alt="" id="memory_img_4"/>
                                 </span>
                                 <h5 class="accName_4">64GB</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" onClick="moveNextPrev(2,3)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);" onClick="moveNextPrev(4,3)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul class="IssueList">
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!--end-->
         <!---does the mobile switch on-->
         <div id="srorder_4" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"  style="min-height:450px;">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Does the mobile switch on</h4>
                              <h6>Should be able to make and receive calls</h6>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <img src="<?php echo base_url(); ?>uploads/modals/samsung-model.png" alt="mobile-icon"/>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 text-left align-self-center" data-brandid="" data-brandName1="">
                              <button type="button" class="btn btn-primary phoneswitch" style="width:200px;"  name="switch" value="1">Yes</button>  
                              <button type="button" style="width:200px;" class="btn btn-primary phoneswitch" name="switch" value="0">No</button>  
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" onClick="moveNextPrev(3,4)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);" onClick="moveNextPrev(5,4)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul class="IssueList122">
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedMemoryImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedMemoryName">
                           Mobile Phone
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!---end--> 
         <!--- mobile accessories -->
         <div id="srorder_5" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"  style="min-height:450px;">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Do you have the following</h4>
                              <h6>Please select accessories which are available.</h6>
                           </div>
                        </div>
                        <div class="row" id="">
                           <div class="col-md-3 accessories" data-accessoriesid="1" data-accessoryname="Charger">
                              <div id="acc_div_1" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_1" id="acc_img_1" src="<?php echo base_url(); ?>uploads/accessories/charger.jpg" alt="" />
                                 </span>
                                 <h5 class="accName_1">Charger</h5>
                              </div>
                           </div>
                           <div class="col-md-3 accessories" data-accessoriesid="2" data-accessoryname="Earphone">
                              <div id="acc_div_2" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_2" id="acc_img_2" src="<?php echo base_url(); ?>uploads/accessories/earphone.jpg" alt="" />
                                 </span>
                                 <h5 class="accName_2">Earphone</h5>
                              </div>
                           </div>
                           <div class="col-md-3 accessories" data-accessoriesid="3" data-accessoryname="Box">
                              <div id="acc_div_3" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_3" id="acc_img_3" src="<?php echo base_url(); ?>uploads/accessories/box.jpg" alt="" />
                                 </span>
                                 <h5 class="accName_3">Box</h5>
                              </div>
                           </div>
                           <div class="col-md-3 accessories" data-accessoriesid="4" data-accessoryname="Valid Bill">
                              <div id="acc_div_4" class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img class="accImg_4" id="acc_img_4"  src="<?php echo base_url(); ?>uploads/accessories/validbill.jpg" alt="" />
                                 </span>
                                 <h5 class="accName_4">Valid Bill</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" onClick="moveNextPrev(4,5)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);" onClick="moveNextPrev(6,5)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul class="IssueList">
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedMemoryImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedMemoryName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media switchonoff">
                        <img class="d-flex switchonoffimg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body ">
                           Does the mobile switch on
                           <span class="price switchonoffName"></span>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- end-->
         <!--- Physical problem -->       
         <div id="srorder_6" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <section id="examples">
                     <div class="content content-1"  style="min-height:450px;">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Functional or Physical Problems</h4>
                              <h6>Please choose appropriate option(s) to get accurate quote.</h6>
                           </div>
                        </div>
                        <div class="row mb-5" id="IssuES">
                        </div>
                     </div>
                  </section>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" onClick="moveNextPrev(5,6)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);" onClick="moveNextPrev(7,6)" class="active"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul class="IssueList">
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedMemoryImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedMemoryName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media switchonoff">
                        <img class="d-flex switchonoffimg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body ">
                           Does the mobile switch on
                           <span class="price switchonoffName"></span>
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedAccImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedAccName">
                           Mobile Phone
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!--end-->
         <!---Login box-->
         <div id="srorder_7" class="row mb-5 d-none">
            <div class="col-sm-9">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <div class="px-5 mt-5">
                     <div class="row">
                        <div class="col-md-12">
                           <span id="login_error" style="color: red; display: none;">
                              <h4>Invalid Username or Password!</h4>
                           </span>
                           <span id="login_success" style="color: green; display: none;">
                              <h4>Login Successful</h4>
                           </span>
                        </div>
                     </div>
                     <?php if(!$this->session->userdata('site_user_id')):?>
                     <!---form start here -->
                     <div class="row" id="sell_login_div">
                        <div class="col-md-12">
                           <h4>Login</h4>
                        </div>
                        <div class="col-md-12">
                           <form action="#" method="POST" id="sell_login_form">
                              <div class="row">
                                 <div class="col-md-6 sellinputholder">
                                    <input class="form-control form-control1" required="" name="uemail" placeholder="Email" type="email">
                                 </div>
                                 <div class="col-md-6 sellinputholder">
                                    <input class="form-control form-control1" required="" name="upassword" placeholder="Password" type="password">
                                    <a href="<?php echo base_url('login/forgotPassword');?>" style="float: right;" target="_blank">Forgot Password</a>
                                 </div>
                                 <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btnSellLogin" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;">Login</button>                                    
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!--- form end here-->
                     <hr/>
                     <?php endif;?>
                     <!---form start here-->
                     <div class="row" id="reg_form">
                        <form action="<?php echo base_url('sell/saveSell');?>" method="POST" style="width: 100%; margin-bottom: 50px;">
                           <div class="row">
                              <div class="col-md-12">
                                 <h4>Please enter the details below.</h4>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="hidden" name="device"  class="device-n" value="">
                                 <input type="hidden" name="model"  class="modal-n" value="">
                                 <input type="hidden" name="brand"  class="brand-n" value="">
                                 <input type="hidden" name="service"  class="service-n" value="">
                                 <input type="hidden" name="office"  class="office-n" value="">
                                 <input type="hidden" name="memory"  class="memory-n" value="">
                                 <input type="hidden" name="phoneStatus" class="phone-n" value="">
                                 <input type="hidden" name="accessory" id="accessory" value="">
                                 <input type="hidden" name="issue" id="issue" value="">
                                 <input type="hidden" name="site_user_id" id="site_user_id">
                                 <div class="row">
                                    <div class="col-md-6 sellinputholder" >
                                       <input class="form-control form-control1" name="ctitle" id="ctitle" placeholder="Title" type="text" required="">
                                       <input class="form-control form-control1" name="cname" id="cname" placeholder="First Name" type="text" required="">
                                       <input class="form-control form-control1" name="sname" id="sname" placeholder="Surname" type="text">
                                       <input class="form-control form-control1" name="email" id="email" placeholder="E-Mail" type="email" required="">                                   
                                       <input class="form-control form-control1" name="phone" id="phone" placeholder="Phone Number" type="number" required="">
                                    </div>
                                    <div class="col-md-6 sellinputholder">
                                       <input class="form-control form-control1" name="chouseno" id="chouseno" placeholder="House Name/No" type="text" required="">
                                       <input class="form-control form-control1" name="cstreetaddress" id="cstreetaddress" placeholder="Street/Road" type="text" required="">
                                       <input class="form-control form-control1" name="ctown" id="ctown" placeholder="Town/City" type="text" required="">
                                       <input class="form-control form-control1" name="country" id="country" placeholder="Country" type="text" required="">
                                       <input class="form-control form-control1" name="postcode" id="postcode" placeholder="Postcode" type="text" required="">
                                    </div>
                                    <?php if(!$this->session->userdata('site_user_id')):?>
                                    <div class="col-md-12 text-center">
                                       <label>Create new account ?</label>
                                    </div>
                                    <div class="col-md-6 sellinputholder password_div">
                                       <input class="form-control form-control1" name="password"  id ="password" placeholder="Password" type="password" required="">
                                    </div>
                                    <div class="col-md-6 sellinputholder cpassword_div">
                                       <input class="form-control form-control1" name="cpassword" id="cpassword" placeholder="Confirm password" type="password" required="">
                                    </div>
                                    <?php endif;?>
                                    <div class="col-md-12 text-center">
                                       <button type="submit" class="btn btn-primary" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;">SEND</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- form end here-->
                  </div>
               </div>
               <div class="row nxt-prv-buttom text-center p-4">
                  <div class="col-sm-12">
                     <a href="javascript:void(0);" class="active" onClick="moveNextPrev(6,7)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                     <a href="javascript:void(0);"  onClick="moveNextPrev(8,7)" class="d-none repair-tab"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="repair-box-sidebar">
                  <h4>Device information </h4>
                  <ul class="IssueList">
                     <li class="media">
                        <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedDeviceName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedBrandLi">
                        <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedBrandName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedModalName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedMemoryImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedMemoryName">
                           Mobile Phone
                        </div>
                     </li>
                     <li class="media switchonoff">
                        <img class="d-flex switchonoffimg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body ">
                           Does the mobile switch on
                           <span class="price switchonoffName"></span>
                        </div>
                     </li>
                     <li class="media selectedModalLi">
                        <img class="d-flex selectedAccImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="" /> 
                        <div class="media-body selectedAccName">
                           Mobile Phone
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!---end-->          
      </section>
   </div>
</main>
<script src="<?php echo base_url(); ?>lib/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>lib/frontend/js/custom_sell.js"></script>
<script>
   (function($){
      $(window).on("load",function(){
         $(".content-1").mCustomScrollbar({
            setTop:"540px"
         });
      });
   })(jQuery); 
   
   
</script>
<?php $this->load->view('front/footer'); ?>

