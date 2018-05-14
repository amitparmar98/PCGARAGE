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
		<div class="row">
			
			<div class="col-md-12">
				<div class="how-it-work-box" style="margin-bottom:100px">
					<p><?php echo $page->page_content; ?> </p>
				</div>
			</div>
		</div>
	</div>
	</main>
 <?php $this->load->view('front/footer'); ?>