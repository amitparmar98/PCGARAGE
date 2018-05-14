<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT VENDER FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/addvendor/editvendor/<?php echo $v->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="fullname" placeholder="NAME" value="<?php echo $v->fullname; ?>" id="fullname" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="business_name">BUSINESS NAME</label>
								<div class="col-sm-10">
									<input type="text" placeholder="BUSINESS NAME" value="<?php echo $v->business_name; ?>" name="business_name" id="business_name" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="emails">Website</label>
								<div class="col-sm-10">
									<input type="text" name="website" placeholder="Website" value="<?php echo $v->website; ?>" id="website" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="emails">EMAIL</label>
								<div class="col-sm-10">
									<input type="email" name="emails" placeholder="EMAIL" value="<?php echo $v->emails; ?>" id="emails" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="phone">PHONE</label>
								<div class="col-sm-10">
									<input type="text" placeholder="PHONE" value="<?php echo $v->phone; ?>" name="phone" id="phone" class="form-control" required>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="address1">ADDRESS 1</label>
								<div class="col-sm-10">
									<input type="text" placeholder="ADDRESS" value="<?php echo $v->address1; ?>" name="address1" id="address1" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="address2">ADDRESS 2</label>
								<div class="col-sm-10">
									<input type="text" placeholder="ADDRESS" value="<?php echo $v->address2; ?>" name="address2" id="address2" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="city">CITY</label>
								<div class="col-sm-10">
									<input type="text" placeholder="CITY" value="<?php echo $v->city; ?>" name="city" id="city" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="state">STATE</label>
								<div class="col-sm-10">
									<input type="text" placeholder="STATE" value="<?php echo $v->state; ?>" name="state" id="state" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="zip">ZIP</label>
								<div class="col-sm-10">
									<input type="text" placeholder="ZIP" value="<?php echo $v->zip; ?>" name="zip" id="zip" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="zip">Location On Map</label>
								<div class="col-sm-10">
                                                                    <textarea placeholder="embed your map from google" name="location_on_map" id="location_on_map" class="form-control" required><?php echo $v->location_on_map; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputEmail3"></label>
								<div class="col-sm-10">
									<button class="btn btn-info pull-left" type="submit">Update</button>
								</div>
							</div>
						</div>
					</form>
				  </div>
			</div>
		</div>
	</section>
</div>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>lib/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php $this->load->view('admin/footer'); ?>