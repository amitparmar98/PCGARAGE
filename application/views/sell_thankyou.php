<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PCGARAGE</title>
		
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
		
	</head>
	<body class="inner-page">
		<header role="mast-head">
			<section role="top-bar"  class="py-3">
				<div class="container">
					<div class="row">
                                             <input type="hidden" id="site_url" value="<?php echo base_url(); ?>">
						<input type="hidden" id="brand_id_c" value="<?php echo isset($_GET['brandid'])?$_GET['brandid']:'0'; ?>">
						<div class="col-md-3">
                                                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid" alt="" /></a>
						</div>
						<div class="col-md-4 d-flex align-items-center">
							<p class="mb-0">Fast & low cost repair & IT service since 2002</p>
						</div>
						<div class="col-md-5 d-flex align-items-center justify-content-end px-0">
							<ul class="right-nav w-100">
								<li><i class="fa fa-phone"></i> Call @ 02072218038</li>
								<li><a href="" class="btn">Request Call Back</a></li>
								<li><img class="img-fluid mb-1" src="<?php echo base_url(); ?>lib/frontend/img/track-order.png" alt="" /> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="gothambold">Track My Order</a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			
			
		</header><!--/header ends here-->
		<main role="main-wrapper" class="inner-page-holder">
			<div class="container">
			<div class="row">
				
				<div class="col-md-12">
					<div class="how-it-work-box" style="min-height: 400px;text-align: center;padding-top: 150px;">

						<!-- <h2>We will send you a quote in a moment.</h2> -->
						<h3>Thank You. Your Request has been Submited Successfully.</h3>		<br/>				
						<h4>Your Sell ID : PCGSELL<?php echo $this->session->userdata('repair_id'); $this->session->unset_userdata('repair_id'); ?>.</h4>
						<h5>You will receive status update on this Email : <?php echo $this->session->userdata('uemail'); $this->session->unset_userdata('uemail'); ?>.</h5>
					</div>
				</div>
			</div>
		</div>
		</main>
		 <?php $this->load->view('front/footer'); ?>