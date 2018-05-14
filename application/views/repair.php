<?php $this->load->view('front/header');?>

<script>
   
   var site_user_id = '<?php echo $this->session->userdata('site_user_id');?>';
</script>

<main role="main-wrapper" class="inner-page-holder py-70">
   <div class="container">     
         <section role="repair-holder" id="pc">
            <div id="srorder_0">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4>Which Device Need Repair ?</h4>
                     </div>
                  </div>
               </div>
               <div class="row mb-5">
                  <div class="col-sm-12">
                     <div class="white-bg mb-5 mobile-bg">
                        <div class="row no-gutters">
                           <?php								
                              $queryi = $this->db->query("SELECT * FROM brands where pid='0' order by brands_order asc");
                              $allbrands = $queryi->result();
                              // echo "<pre>"; print_r($allbrands); die;
                              foreach($allbrands as $key=>$mainbrand){
                              ?>
                           <div class="col-md-4 text-center selbrand" onClick="getstart(<?=$mainbrand->id?>)">
                              <div class="repair-box">
                                 <span class="d-flex align-content-center flex-wrap justify-content-center">
                                 <img src="<?php echo base_url(); ?>uploads/brands/<?=$mainbrand->image?>" alt="<?=$mainbrand->catname?>" />
                                 </span>
                                 <h5><?=$mainbrand->catname?></h5>
                              </div>
                           </div>
                           <?php 	} ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="srorder_1" class="row mb-5 d-none">
               <div class="col-sm-9">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="heading">
                           <h4>Which Device Need Repair ?</h4>
                        </div>
                     </div>
                  </div>
                  <div class="white-bg mb-5 mobile-bg">
                     <div class="row no-gutters">
                        <?php								
                           $queryi = $this->db->query("SELECT * FROM brands where pid='0' order by brands_order asc");
                           $allbrands = $queryi->result();
                           // echo "<pre>"; print_r($allbrands); die;
                           foreach($allbrands as $key=>$mainbrand){
                           ?>
                        <div class="col-md-4 text-center getChildBrand getChildBrand2" data-brandid="<?=$mainbrand->id?>">
                           <div id="brand_<?=$mainbrand->id?>" class="repair-box">
                              <span class="d-flex align-content-center flex-wrap justify-content-center">
                              <img  class="brand_img_<?=$mainbrand->id?>" src="<?php echo base_url(); ?>uploads/brands/<?=$mainbrand->image?>" alt="<?=$mainbrand->catname?>" />
                              </span>
                              <h5 class="brand_name_<?=$mainbrand->id?>"><?=$mainbrand->catname?></h5>
                           </div>
                        </div>
                        <?php 	} ?>
                     </div>
                  </div>
                  <div class="row nxt-prv-buttom text-center p-4">
                     <div class="col-sm-12">
                        <a href="javascript:void(0);" onClick="moveNextPrev(0,1)" class="active"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);" onClick="moveNextPrev(2,1)" class="nxxtBtn"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 hidden-sm-down">
                  <div class="repair-box-sidebar">
                     <h4>You Have Selected </h4>
                     <ul>
                        <li class="media ">
                           <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>uploads/brands/mobile-icon.png" alt="service icon" /> 
                           <div class="media-body selectedDeviceName">
                              Mobile Phone
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div id="srorder_2" class="row mb-5 d-none">
               <div class="col-sm-9">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="heading">
                           <h4>Select The Brand</h4>
                        </div>
                     </div>
                  </div>
                  <div class="white-bg mb-5">
                     <section id="examples">
                        <div class="content content-1"  style="min-height: 250px;">
                           <div class="row no-gutters brands" id="BranDS">
                              <!-- here data by Ajax -->
                           </div>
                        </div>
                     </section>
                  </div>
                  <div class="row nxt-prv-buttom text-center p-4">
                     <div class="col-sm-12">
                        <a href="javascript:void(0);" onClick="moveNextPrev(1,2)" class="active"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);" onClick="moveNextPrev(3,2)" class="nxxtBtn"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3  hidden-sm-down">
                  <div class="repair-box-sidebar">
                     <h4>You Have Selected </h4>
                     <ul>
                        <li class="media">
                           <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedDeviceName">
                              Mobile Phone
                           </div>
                        </li>
                        <li class="media selectedBrandLi" style="display: none;">
                           <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedBrandName">
                              Mobile Phone
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div id="srorder_3" class="row mb-5 d-none">
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
                        <a href="javascript:void(0);" onClick="moveNextPrev(2,3)" class="active"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);" onClick="moveNextPrev(4,3)" class="nxxtBtn"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 hidden-sm-down">
                  <div class="repair-box-sidebar">
                     <h4>You Have Selected </h4>
                     <ul>
                        <li class="media">
                           <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedDeviceName">
                              Mobile Phone
                           </div>
                        </li>
                        <li class="media selectedBrandLi" style="display: none;">
                           <img class="d-flex selectedBrandImg selectedBrandImg22" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedBrandName">
                              Mobile Phone
                           </div>
                        </li>
                        <li class="media selectedModalLi" style="display: none;">
                           <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedModalName">
                              Mobile Phone
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div id="srorder_4" class="row mb-5 d-none">
               <div class="col-sm-9">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="heading">
                           <h4>What’s The Problem<br><span class="hidden-sm-up" style="font-size: 12px;color: #6fc0f7;">Once done, hit "next" at the page end or use arrows to select more problems</span></h4>
                        </div>
                     </div>
                  </div>
                  <div class="white-bg mb-5">
                     <section id="examples">
                        <div class="content content-1"  style="min-height:450px;">
                           <div class="row" id="IssuES">
                           </div>
                        </div>
                     </section>
                  </div>
                  <div class="row nxt-prv-buttom text-center p-4">
                     <div class="col-sm-12">
                        <a href="javascript:void(0);" onClick="moveNextPrev(3,4)" class="active"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);" onClick="moveNextPrev(5,4)" disabled><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="repair-box-sidebar">
                     <h4>You Have Selected </h4>
                     <ul class="IssueList">
                        <li class="media">
                           <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedDeviceName" id="dType">
                           </div>
                        </li>
                        <li class="media selectedBrandLi" style="display: none;">
                           <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedBrandName" id="dBrand">
                           </div>
                        </li>
                        <li class="media selectedModalLi" style="display: none;">
                           <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedModalName" id="dModal">
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div id="srorder_5" class="row mb-5 d-none">
               <div class="col-sm-9">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="heading">
                           <h4>Let’s Fix It For You</h4>
                        </div>
                     </div>
                  </div>
                  <div class="white-bg mb-5">
                     <!-- client ne hide krarwayea hai -->
                     <div class="row no-gutters py-4 px-0" style="display:none">
                        <div class="col-md-8 m-0">
                           <div class="row lastpage">
                           </div>
                        </div>
                        <div class="col-md-4 m-0 m-0 p-0 px-2">
                           <div class="row">
                              <div class="col-sm-12 m-0 p-0 px-2 sertab tab2" data-serviceid="2">
                                 <a href="javascript:void('0')" class="btn btn-blue w-100 p-2">Estimated Price <span> £ <span class="estimated_price">0<span></span></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row no-gutters trans mb-5">
                        <div class="col-sm-12 p-0 m-0 box-detalis">
                           <div class="row">
                              <div class="col-sm-12 p-2 m-0 box-detalis">
                                 <div class="heading">
                                    <h5>You May Choose</h5>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <?php
                                 $query = $this->db->query('SELECT * FROM services WHERE status="active"');
                                 $allservices= $query->result();
                                 	foreach($allservices as $ser){ ?>
                              <div class="col-sm-6 sertab tab<?php echo $ser->id; ?>" data-serviceid="<?php echo $ser->id; ?>">
                                 <div class="box-detalis-text serboxtab box-tab_<?php echo $ser->id; ?>">
                                    <h6><?php echo $ser->name; ?></h6>
                                    <p><?php echo $ser->short_description; ?></p>
                                    <div class="price">Price <span>£<span class="total_price2"><?php echo $ser->price; ?></span>
                                       <span style="display: none;" class="total_price1"><?php echo $ser->price; ?></span></span>
                                    </div>
                                    <a href="javascript:void('0')" class="btn btn-dark btn-sm px-3"><?php echo $ser->name; ?></a>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row nxt-prv-buttom text-center p-4">
                     <div class="col-sm-12">
                        <a href="javascript:void(0);" class="active" onClick="moveNextPrev(4,5)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);"  onClick="moveNextPrev(6,5)" class="d-none repair-tab"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="repair-box-sidebar">
                     <h4>You Have Selected </h4>
                     <ul class="IssueList">
                        <li class="media">
                           <img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedDeviceName">
                              Mobile Phone
                           </div>
                        </li>
                        <li class="media selectedBrandLi" style="display: none;">
                           <img class="d-flex selectedBrandImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedBrandName">
                              Mobile Phone
                           </div>
                        </li>
                        <li class="media selectedModalLi" style="display: none;">
                           <img class="d-flex selectedModalImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="Dummy" /> 
                           <div class="media-body selectedModalName">
                              Mobile Phone
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <?php     
               $this->load->view('mail_in_sevice');
               ?> 
         </section>    
   </div>
</main>
<?php $this->load->view('front/footer'); ?>
<script src="<?php echo base_url(); ?>lib/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>lib/frontend/js/custom.js"></script>
<script src="<?php echo base_url(); ?>lib/frontend/js/jquery.simple-dtpicker.js"></script>
<script>
   (function($){
   	$(window).on("load",function(){
   		$(".content-1").mCustomScrollbar({
   			setTop:"540px"
   		});
   	});
   	$('.datetimepicker44').appendDtpicker({
   		 "inline": false,
   		"dateFormat": "YYYY-MM-DD hh:mm",
                    "autoclose":true,
                    "onSelect": function(){
   		}                       
   	});
   })(jQuery);
</script>

