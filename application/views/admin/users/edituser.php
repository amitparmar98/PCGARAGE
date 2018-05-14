<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT USER FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/adduser/edituser/<?php echo $u->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="fullname" placeholder="NAME" value="<?php echo $u->fullname; ?>" id="fullname" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="USERNAME">USERNAME</label>
								<div class="col-sm-10">
									<input type="text" name="username" placeholder="USERNAME" value="<?php echo $u->username; ?>" id="username" class="form-control" required readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="emails">EMAIL</label>
								<div class="col-sm-10">
									<input type="email" placeholder="EMAIL" value="<?php echo $u->email; ?>" name="email" id="email" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="password">PASSWORD</label>
								<div class="col-sm-10">
									<input type="password" placeholder="PASSWORD" value="<?php echo $u->password; ?>" name="password" id="password" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="phone">PHONE</label>
								<div class="col-sm-10">
									<input type="text" placeholder="PHONE" value="<?php echo $u->phone; ?>" name="phone" id="phone" class="form-control" required>
								</div>
							</div>							
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