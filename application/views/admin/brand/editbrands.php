<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT BRAND FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/brand/editbrandform/<?php echo $brandi->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
							<?php //echo "<pre>"; print_r($allbrands); ?>
								<label class="col-sm-2 control-label" for="fullname">SELECT PARENT</label>
								<div class="col-sm-10">
									<select name="pid" class="form-control">
										<option value="0">Select parent</option>
										<?php 
										foreach($allbrands as $brand){ 
                                                                                    ?>
											<option <?php if($brandi->pid==$brand->id){ echo "selected"; } ?> value="<?php echo $brand->id;?>"><?php  echo $brand->catname;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="catname" placeholder="BRAND NAME" value="<?php echo $brandi->catname; ?>" id="fullname" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">BRAND IMAGE</label>
								<div class="col-sm-10">
									<img src="<?php echo base_url(); ?>uploads/brands/<?php echo $brandi->image; ?>" style="vertical-align:middle;" width="80" height="80">
									<p></p>
									<p><input type="file" class="form-control vov" name="userfile"></p>
								</div>
							</div>							<div class="form-group">								<label class="col-sm-2 control-label" for="order">BRAND PRDER</label>								<div class="col-sm-10">									<input type="text" name="brands_order" placeholder="Order " value="<?php echo $brandi->brands_order; ?>" id="order" class="form-control" required>								</div>							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputEmail3"></label>
								<div class="col-sm-10">
									<button class="btn btn-info pull-left" type="submit">EDIT</button>
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