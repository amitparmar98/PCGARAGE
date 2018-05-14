<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT MODEL FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/brand/editmodal/<?php echo $modal->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT BRAND</label>
								<div class="col-sm-10">
									<select name="brand_id" class="form-control" required>
										<option value="">Select brand</option>
										<?php 
										foreach($allbrands as $brand){ 
                                                                                      $queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$brand->pid."'");
										$rowi = $queryi->row();
                                                                                    ?>
											<option <?php if($modal->brand_id==$brand->id){ echo "selected"; } ?> value="<?php echo $brand->id;?>"><?php  echo $brand->catname.'&nbsp; &nbsp; ['.$rowi->catname.']';?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="modalname" placeholder="MODAL NAME" value="<?php echo $modal->modalname; ?>" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">MODEL IMAGE</label>
								<div class="col-sm-10">
									<img src="<?php echo base_url(); ?>uploads/modals/<?php echo $modal->image; ?>" style="vertical-align:middle;" width="80" height="80">
									<p></p>
									<p><input type="file" class="form-control vov" name="userfile"></p>
								</div>
							</div>							<div class="form-group">								<label class="col-sm-2 control-label" for="order">MODEL ORDER</label>								<div class="col-sm-10">											<input type="text" name="modal_order" placeholder="Order " value="<?php echo $modal->modal_order; ?>" id="order" class="form-control" required>										</div>								</div>								
							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputEmail3"></label>
								<div class="col-sm-10">
									<button class="btn btn-info pull-left" type="submit">Submit</button>
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