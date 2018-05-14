<?php $this->load->view('front/header'); ?>
	<main role="main-wrapper" class="inner-page-holder">
		<div class="container">
		<div class="row">
			
			<div class="col-md-12">
				<div class="how-it-work-box" style="text-align: center;padding-top: 100px;">
					<h2><?php echo $page->page_title; ?> </h2>
				</div>
			</div>
		</div>
		<section role="repair-holder">
			<div class="row">
				<div class="col-md-12">
					<div class="white_bg_custom">
						<p><?php echo $page->page_content; ?> </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="white_bg_custom">
						<div class="px-5 mt-5">
							<div class="heading text-center">
								<?php if($thanksmessg!=''){ ?> <h4 style="margin-bottom:10px;color:green"><?php echo $thanksmessg ?> </h4> <?php } ?>
								<h4 style="margin-bottom:10px;">Please use this form to let us know about your problems and our team will get in touch with you shortly. </h4>
							</div>
							  <form role="service-form" method="post" class="orderform" id="orderform" action="<?php echo base_url(); ?>repair-in-bulk/">
								<div class="row">
									<div class="col-md-12">
									   <input class="form-control" name="cname" required="" placeholder="Name*" type="text">
									</div>
									<div class="col-md-12">
										<input class="form-control" name="address" placeholder="Address" type="text">
									</div>
									
									<div class="col-md-6">
										<input class="form-control" name="phone" required="" placeholder="Mobile *" type="number">
									</div>
									<div class="col-md-6">
										<input class="form-control" name="email" placeholder="E-Mail *" required="" type="email">
									</div>
									<div class="col-md-6">
										<input class="form-control" name="device" placeholder="Device *" type="text" required>
									</div>
									<div class="col-md-6">
										<input class="form-control" name="numberofdevices" placeholder="Number of Devices *" type="text" required>
									</div>
									<div class="col-md-12">
										<textarea class="form-control" name="message" placeholder="Detail"></textarea>
									</div>
									<div class="col-md-12 text-center">
										<button type="submit" name="submit" class="btn btn-blue">SEND</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	</main>
 <?php $this->load->view('front/footer'); ?>