<?php $this->load->view('front/header'); ?>
<main role="main-wrapper" class="inner-page-holder">
	<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div class="how-it-work-box" style="min-height: 400px;text-align: center;padding-top: 150px;">

				<h3>Thank You. Your Request has been Submited Successfully.</h3>		<br/>				
				<h4>Your Repair ID : PCG0000<?php echo $this->session->userdata('repair_id'); $this->session->unset_userdata('repair_id'); ?>.</h4>
				<h5>You will receive status update on this Email : <?php echo $this->session->userdata('uemail'); $this->session->unset_userdata('uemail'); ?>.</h5>
			</div>
		</div>
	</div>
</div>
</main>
<?php $this->load->view('front/footer'); ?>
