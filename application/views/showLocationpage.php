<?php $this->load->view('front/header'); ?>
	<main role="main-wrapper" class="inner-page-holder py-70">
		<div class="container">
			<section role="repair-holder" id="pc">
				<div id="srorder1_2" class="row mb-5">
						<div class="col-md-12">
							<div class="white_bg_custom">
								<div class="heading text-center">
									<h1><?php echo $page->fullname; ?></h1>
									<p>You can take your device to our workshop, the fastest way to get your device repaired. Most servicing and repair are done while you wait. If it requires a more technical repair, we aim to reunite you within 1 working day, after fully tested it. </p>
								</div>
								<div class="row mt-5" role="Walk_in_Service_tabs">
									<div class="col-sm-12">
										<div class="tab-content">
                                            <div id="stab_6" class="tab-pane fade show  active " role="tabpanel">
												<div class="tab-inner">
													<div class="row">
														<div class="col-md-4">
															<div class="media">
																<i class="fa fa-map-marker d-flex mr-4" aria-hidden="true"></i>
																<div class="media-body">
																	<strong><?php echo $page->business_name; ?>  (Head Office)</strong> <br />
																	<?php echo $page->address1; ?><br />
																	<?php echo $page->city; ?> | <?php echo $page->zip; ?>
																</div>
															</div>
															<div class="media">
																<i class="fa fa-phone d-flex mr-4" aria-hidden="true"></i>
																<div class="media-body">
																	<?php echo $page->phone; ?>
																</div>
															</div>
															<div class="media">
																<i class="fa fa-envelope-o d-flex mr-4" aria-hidden="true"></i>
																<div class="media-body">
																	<a href=""><?php echo $page->emails; ?></a>
																</div>
															</div>
															<div class="media">
																<i class="fa fa-desktop d-flex mr-4" aria-hidden="true"></i>
																<div class="media-body">
																	<a href=""><?php echo $page->website; ?></a>
																</div>
															</div>
														</div>
														<div class="col-md-8">
															<?php echo $page->location_on_map; ?>													
														</div>
													</div>
												</div>
											</div>
                                        </div>
									</div>
								</div>
								<hr>
							</div>
						</div>
				</div>
			</section>  
		</div>
	</main>
<?php $this->load->view('front/footer'); ?>