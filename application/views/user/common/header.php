<!DOCTYPE html>
<html lang="en">	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PCGarage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>lib/frontend/img/favicon.ico" type="image/x-icon">
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>lib/frontend/css/bootstrap.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/font/gotham/stylesheet.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>lib/frontend/font/icomoon-icon/style.css" rel="stylesheet" />
		<!-- Bootstrap core CSS --> 
		
		<!-- JQuery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/bootstrap.js"></script>
		<!-- TrustBox script -->
		<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
		<!-- End Trustbox script -->
		
	</head>
        <style>
            main[role="main-wrapper"] section[role="how-it-works"] h3 {
    font-size: 18px;
}
.trustpilot{position: absolute;right: 0px;top: 21px;}
main[role="main-wrapper"] section[role="how-it-works"] p {
    font-size: 16px;
}
            </style>
	<body>
	<!-- begin olark code -->
<script type="text/javascript" async> ;(function(o,l,a,r,k,y){if(o.olark)return; r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0]; y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r); y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)}; y.extend=function(i,j){y("extend",i,j)}; y.identify=function(i){y("identify",k.i=i)}; y.configure=function(i,j){y("configure",i,j);k.c[i]=j}; k=y._={s:[],t:[+new Date],c:{},l:a}; })(window,document,"static.olark.com/jsclient/loader.js");
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('7539-909-10-1057');</script>
<!-- end olark code -->
		<header role="mast-head">
			<section role="top-bar"  class="py-3">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<button class="d-inline-block d-md-none p-0 mr-2 align-middle navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<img style="width:30px;"  src="<?php echo base_url(); ?>lib/frontend/img/top-menu-btn.png" alt="top menu btn" />
							</button>
							 <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid logo" alt="Site logo" /></a>
						</div>
						<div class="col-md-12 col-lg-4 d-flex align-items-center">
							<p class="tagline mt-2 mt-md-0 mb-0">Fastest & low cost repair & IT service since 2007</p>
						</div>
						<div class="col-md-7 col-lg-5 d-flex align-items-center justify-content-end px-lg-0 xs-nav">
							<ul class="right-nav w-100">
								<li class="d-none d-md-inline-block" style="font-size: 18px;"><i class="fa fa-phone"></i><a href="tel:02037705252">&nbsp; <strong>02037705252</strong></a></li>
								<li class="d-none d-md-inline-block"><a href="javascript:void(0);" data-toggle="modal" data-target="#RequestCallBack" class="btn"> Request Call Back</a></li>
								<li class="d-inline-block d-md-none"><a href="tel:02037705252" class="btn"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="gothambold d-md-inline-block"><img class="img-fluid mb-1" src="<?php echo base_url(); ?>lib/frontend/img/track-order.png" alt="Track order" /> <span class="hidden-sm-down">Track My Order</span></a></li>
							</ul>
						</div>
					</div> 
				</div>
				<div class="trustpilot">
					<!-- TrustBox widget - Micro Review Count -->
					<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5a1bdaeb0000ff0005b1a5ab" data-style-height="20px" data-style-width="100%" data-theme="dark">
					  <a href="https://www.trustpilot.com/review/www.pcgarage.uk.com" target="_blank">Trustpilot</a>
					</div>
					<!-- End TrustBox widget -->
				</div>
			</section>
			<section role="menu-bar" class="py-0 py-md-2">
				<div class="container">
					<div class="row">
						<div class="col-md-11 align-items-center">
							<nav class="navbar navbar-toggleable-sm p-0">
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav mr-auto w-100 gothambold">
										<li><a href="<?php echo base_url(); ?>iphone-repair">iPhone Repair</a></li>
										<li><a href="<?php echo base_url(); ?>mobile-repair">Mobile Repair </a></li>
										<li><a href="<?php echo base_url(); ?>laptop-repair">Laptop Repair</a></li>
										<li><a href="<?php echo base_url(); ?>pc-repair">PC Repair</a></li>
										<li><a href="<?php echo base_url(); ?>tablet-repair">Tablet</a></li>
										<li><a href="http://mypcgarage.co.uk/" target="_blank">Shop</a></li>

										<?php if($this->session->userdata('site_user_id')):?>
											<ul class="nav navbar-nav">												
												<li class="dropdown user user-menu">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">														
														<span class="hidden-xs">My Profile</span>
													</a>
													<ul class="dropdown-menu">	
														<li class="">
															<div class="">
																<a href="<?php echo base_url('repair/repairOrders');?>" class="btn btn-default">Repair Orders</a>
															</div>
														</li>
														<li class="">
															<div class="">
																<a href="<?php echo base_url('sell/sellOrder');?>" class="btn btn-default">Sell Orders</a>
															</div>
														</li>														
														<li class="">
															<div class="">
																<a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default">Sign Out</a>
															</div>
														</li>
													</ul>
												</li>
											</ul>

										<?php else:?>
											<li><a href="<?php echo base_url('login');?>">Login</a></li>
										<?php endif;?>
									</ul>
								</div>
							</nav>
						</div>

					</div>
				</div>
			</section>
		</header><!--/header ends here-->