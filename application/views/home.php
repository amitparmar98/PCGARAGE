<?php $this->load->view('user/common/header'); ?>

		<section role="slider-area">
			<div id="main-banner" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item object-fit active">
						<img class="" src="<?php echo base_url(); ?>lib/frontend/img/slide-img.jpg" alt="slider image">
						<div class="carousel-caption">
							<h1>No Payment Unless Fixed </h1>
							<p>UK’s Most Trusted Doorstep Service</p>
							<a href="<?php echo base_url(); ?>repair" class="btn-repair gothambold ">
								<img style="width: 45px;" src="<?php echo base_url(); ?>lib/frontend/img/btn-repair.png" alt="Repair My Device">  <span>Repair My Device</span>
							</a>
						</div> 
					</div>
				</div>
			</div>
				<div class="cat-tab hidden-sm-down">
				<a href="<?php echo base_url(); ?>mobile-repair"><i></i><span>Mobile</span></a>
				<a href="<?php echo base_url(); ?>pc-repair"><i></i><span>PC</span></a>
				<a href="<?php echo base_url(); ?>laptop-repair"><i></i><span>Laptop</span></a>
				<a href="<?php echo base_url(); ?>tablet-repair"><i></i><span>Tablet</span></a>
				<a href="<?php echo base_url(); ?>repair/otherBrand"><i></i><span>Other</span></a>
			</div>
		</section><!--/slider area-->
		<main role="main-wrapper">
			<section role="how-it-works" class="py-50 text-center">
				<h1 role="site-title" class="white gothambold">Get Your Device Repaired In 4 Easy Steps</h1>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
							<img src="<?php echo base_url(); ?>lib/frontend/img/yourrissue.png" alt="What’s Your Issue">
							<h3>1. Tell us your Issue</h3>
							<p>Help us detailing  the device problem to get it working properly again.</p>
						</div>
						<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
							<img src="<?php echo base_url(); ?>lib/frontend/img/repairestimate.png" alt="Repair Estimate">
							<h3>2. Get repair estimate</h3>
							<p>Check the repair Price estimate.</p>
						</div>
						<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
							<img src="<?php echo base_url(); ?>lib/frontend/img/bringorcourrrier.png" alt="Bring or Courier">
							<h3>3. Bring or Courier device</h3>
							<p>Handover your device at our Local Store or chooses device pickup, courier and a doorstep service.</p>
						</div>
						<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
							<img src="<?php echo base_url(); ?>lib/frontend/img/repairedordeliverd.png" alt="Repaired or Delivered">
							<h3 style="margin-bottom: 5px;">4. Collect or choose a delivery</h3>
							<p>When repaired, collect it or have it delivered. Make payment on receiving the device. </p>
						</div>
					</div>
				</div>
			</section><!--/how-it-work area-->
			<section role="garange-advantage" class="py-50 text-center">
				<h1 role="site-title" class="gothambold">PC Garage Advantage</h1>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="garange-advantage-box active">
								<div class="icon-holder d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>lib/frontend/img/reliable&secure.png" alt="Reliable & Secure">
								</div>
								<h3>Reliable & Secure</h3>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="garange-advantage-box">
								<div class="icon-holder d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>lib/frontend/img/procerti.png" alt="6 Months Warranty On Repairs">
								</div>
								<h3>6 Months Warranty On Repairs</h3>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="garange-advantage-box">
								<div class="icon-holder d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>lib/frontend/img/fastestservices.png" alt="Fastest Service">
								</div>
								<h3>Fastest Service</h3> 
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="garange-advantage-box">
								<div class="icon-holder d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>lib/frontend/img/lowestcost.png" alt="Lowest Cost">
								</div>
								<h3>Lowest Cost</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!--/garange-advantage area-->
			<section role="video-section" class="py-50">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2 class="gothambold mb-3" style="font-size:36px;color: #292B2C;">Customer Video</h2>
							<iframe width="525" height="315" src="https://www.youtube.com/embed/H1KRDYZIOaw" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="col-md-6">
							<h2 class="gothambold mb-3" style="font-size:36px;color: #292B2C;">Workshop Tour</h2>
							<iframe width="525" height="315" src="https://www.youtube.com/embed/cjH3bjyznfg" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</section><!--/video-section area-->
			<section role="ask-us" class="py-50 ">
				<h1 role="site-title" class="white gothambold text-center">Ask Us & Consider It Done</h1>
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6  mb-3 mb-lg-0">
							<div class="media">
								<img class="d-flex align-self-center mr-2" src="<?php echo base_url(); ?>lib/frontend/img/sellyourdevice.png" alt="Sell Your Device in minutes">
								<div class="media-body d-flex align-self-center">
                                    <a style="color:white;" href="<?php echo base_url(); ?>sell">Sell Your <br />Device in minutes</a> 
                                    <!-- <a style="color:white;" href="<?php echo base_url(); ?>sell-your-device">Sell Your <br />Device in minutes</a> -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
							<div class="media">
								<img class="d-flex align-self-center mr-3" src="<?php echo base_url(); ?>lib/frontend/img/buyasscories.png" alt="Buy Accessories">
								<div class="media-body d-flex align-self-center">
									 <a style="color:white;" href="http://mypcgarage.co.uk/" target="_blank">Buy Accessories</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
							<div class="media">
								<img class="d-flex align-self-center mr-3" src="<?php echo base_url(); ?>lib/frontend/img/networkingunlocking.png" alt="Network Unlocking">
								<div class="media-body d-flex align-self-center">
									 <a style="color:white;" href="#">Network <br />Unlocking</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
							<div class="media">
								<img class="d-flex align-self-center mr-3" src="<?php echo base_url(); ?>lib/frontend/img/datarecovery.png" alt="Data Recovery">
								<div class="media-body d-flex align-self-center">
									<a style="color:white;" href="<?php echo base_url(); ?>data-recovery">Data Recovery</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!--/video-section area-->
			<section role="garange-advantage" class="py-50 text-center">
				<h1 role="site-title" class="gothambold">PC Garage Google Reviews</h1>
				<div class="container">
					<div class="row">
						
						<div class="col-md-12">
						
						<div id="google-reviews"></div>
						<link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
						<script src="https://cdn.rawgit.com/stevenmonson/googleReviews/6e8f0d79/google-places.js"></script>
						<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBgLFblCCm-rN9bGALxQVDi4C4uWNruD7c&signed_in=true&libraries=places"></script>
						<script>
						jQuery(document).ready(function( $ ) {
						   $("#google-reviews").googlePlaces({
								placeId: 'ChIJy7YFnx8QdkgRsjNbZnRR3u8' //Find placeID @: https://developers.google.com/places/place-id
							  , render: ['reviews']
							  , min_rating: 5
							  , max_rows:4
						   });
						});
						</script>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a class="btn btn-primary" href="https://www.google.co.in/search?q=pcgarage+ladbrokegrove&ie=utf-8&oe=utf-8&client=firefox-b&gfe_rd=cr&dcr=0&ei=jd6oWrC2N8jy8AfejbTIBg#gfe_rd=cr&lrd=0x4876101f9f05b6cb:0xefde5174665b33b2,1,,," target="_blank">See All Google Reviews</a>
						</div>
					</div>
					
				</div>
			</section>
		</main><!--/main-wrapper area-->
<?php $this->load->view('user/common/footer'); ?>
		
