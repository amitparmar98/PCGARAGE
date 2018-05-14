<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Repair | PcGarage</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>lib/frontend/css/bootstrap.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/font/gotham/stylesheet.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/font/icomoon-icon/style.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
		<!-- Bootstrap core CSS --> 
		
		<!-- JQuery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.scrollbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.scrollbar.js"></script>
		
	</head>
        <style>
 .repair-box, .serboxtab {
    cursor: pointer;
}
            </style>
       
	<body class="inner-page">
		<header role="mast-head">
			<section role="top-bar"  class="py-3">
				<div class="container">
					<div class="row">
                         <input type="hidden" id="site_url" value="<?php echo base_url(); ?>">
						<input type="hidden" id="brand_id_c" value="<?php echo isset($_GET['brandid'])?$_GET['brandid']:'0'; ?>">
						<input type="hidden" id="subbrand_id_c" value="<?php echo isset($_GET['subbrandid'])?$_GET['subbrandid']:'0'; ?>">
						<div class="col-md-3">
							  <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid logo" alt="" /></a>
						</div>
						<div class="col-md-12 col-lg-4 d-flex align-items-center">
							<p class="tagline mt-2 mt-md-0 mb-0">Fast & low cost repair & IT service since 2002</p>
						</div>
						<div class="col-md-7 col-lg-5 d-flex align-items-center justify-content-end px-lg-0 xs-nav">
							<ul class="right-nav w-100">
								<li class="d-none d-md-inline-block"><i class="fa fa-phone"></i><a href="tel:02072218038">Call @ 02072218038</a></li>
								<li class="d-none d-md-inline-block"><a href="javascript:void(0);" data-toggle="modal" data-target="#RequestCallBack" class="btn"> Request Call Back</a></li>
								<li class="d-inline-block d-md-none"><a href="tel:02072218038" class="btn"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="gothambold d-none d-md-inline-block"><img class="img-fluid mb-1" src="<?php echo base_url(); ?>lib/frontend/img/track-order.png" alt="" /> Track My Order</a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			
			
		</header>
		<main role="main-wrapper" class="inner-page-holder py-70">
			<div class="container">
                             <form method="post" id="orderform" class="orderform" action="<?php echo base_url(); ?>repair/order">
<!--                                                        <input type="hidden" name="device_id"  class="device-n" value="">
                                                        <input type="hidden" name="model_id"  class="modal-n" value="">
                                                        <input type="hidden" name="brand_id"  class="brand-n" value="">
                                                        <input type="hidden" name="service_id"  class="service-n" value="">-->
                                                        
				<section role="repair-holder" id="pc">
					<div id="srorder_0">
						<div class="row">
							<div class="col-sm-12">
								<div class="heading">
									<h4>Which Device Need Unlocking ?</h4>
								</div>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-sm-12">
								<div class="white-bg mb-5 mobile-bg">
									<div class="row no-gutters">
										<div class="col-md-6 text-center selbrand" onclick="getstart(10)">
											<div class="repair-box">
												<span class="d-flex align-content-center flex-wrap justify-content-center">
													<img src="http://ppscloud.com/pcgarage/uploads/brands/mobile-icon.png" alt="">
												</span>
												<h5>Mobile Phone</h5>
											</div>
										</div>
										<div class="col-md-6 text-center selbrand" onclick="getstart(12)">
											<div class="repair-box">
												<span class="d-flex align-content-center flex-wrap justify-content-center">
													<img src="http://ppscloud.com/pcgarage/uploads/brands/laptop.png" alt="">
												</span>
												<h5>Laptop</h5>
											</div>
										</div>
										<div class="col-md-6 text-center selbrand" onclick="getstart(15)">
											<div class="repair-box">
												<span class="d-flex align-content-center flex-wrap justify-content-center">
													<img src="http://ppscloud.com/pcgarage/uploads/brands/tablet.png" alt="">
												</span>
												<h5>Tablet</h5>
											</div>
										</div>
										<div class="col-md-6 text-center selbrand" onclick="getstart(37)">
											<div class="repair-box">
												<span class="d-flex align-content-center flex-wrap justify-content-center">
													<img src="http://ppscloud.com/pcgarage/uploads/brands/desktop.png" alt="">
												</span>
												<h5>Desktop</h5>
											</div>
										</div> 
										
																	
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
												<img  class="brand_img_<?=$mainbrand->id?>" src="<?php echo base_url(); ?>uploads/brands/<?=$mainbrand->image?>" alt="" />
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
										<img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
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
									<div class="content content-1"  style="height:480px;">
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
										<img class="d-flex selectedDeviceImg" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
										<div class="media-body selectedDeviceName">
											Mobile Phone
										</div>
									</li>
									<li class="media selectedBrandLi" style="display: none;">
										<img class="d-flex selectedBrandImg selectedBrandImg22" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
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
					
					
					
					<div id="srorder_4" class="row mb-5 d-none">
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-12">
									<div class="heading">
										<h4>What’s The Problem</h4>
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
						<div class="col-md-3 hidden-sm-down">
							<div class="repair-box-sidebar">
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
								<div class="row no-gutters py-4 px-0">
									<div class="col-md-8 m-0">
										<div class="row lastpage">
<!--											<div class="col-sm-6 m-0">
												<div class="media">
													<img class="d-flex mr-3" style="width:15px;" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
													<div class="media-body">
														Mobile Phone
														<span class="price">£ 23.00</span>
													</div>
												</div>
											</div>
											<div class="col-sm-6 m-0">
												<div class="media">
													<img class="d-flex mr-3" style="width:15px;" src="<?php echo base_url(); ?>lib/frontend/img/service-icon/icon-1.png" alt="" /> 
													<div class="media-body">
														Mobile Phone
														<span class="price">£ 23.00</span>
													</div>
												</div>
											</div>-->
										</div>
									</div>
									<div class="col-md-4 m-0 m-0 p-0 px-2">
										<div class="row">
											<div class="col-sm-12 m-0 p-0 px-2">
                                                <a href="" class="btn btn-blue w-100 p-2">Estimated Price <span> £ <span class="estimated_price">0<span></span></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row no-gutters trans">
									<div class="col-sm-12 p-0 m-0 box-detalis">
										<div class="row">
											<?php
											$query = $this->db->query('SELECT * FROM services');
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
					$this->load->view('mail_in_sevice');
					?> 
				</section>
                            
                </form>
			</div>
		</main>
		 <?php $this->load->view('front/footer'); ?>
		
		<script src="<?php echo base_url(); ?>lib/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="<?php echo base_url(); ?>lib/frontend/js/custom.js"></script>
	
		<script>
			(function($){
				$(window).on("load",function(){
					$(".content-1").mCustomScrollbar({
						setTop:"540px"
					});
				});
			})(jQuery);
		</script>


 