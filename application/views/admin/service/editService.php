<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT SERVICE FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/brand/editService/<?php echo $allservice->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="name" placeholder="Service Name" value="<?php echo $allservice->name; ?>" class="form-control" required>
								</div>
							</div>
                                                    <div class="form-group">
								<label class="col-sm-2 control-label" for="price">Price</label>
								<div class="col-sm-10">
									<input type="text" name="price" placeholder="Enter Service Price" value="<?php echo $allservice->price; ?>" class="form-control" required>
								</div>
							</div>
                                                    <div class="form-group">
								<label class="col-sm-2 control-label" for="price">Description</label>
								<div class="col-sm-10">
									<input type="text" name="description" placeholder="Enter Description" value="<?php echo $allservice->description; ?>" class="form-control" required>
								</div>
							</div>
                                                    <div class="form-group">
								<label class="col-sm-2 control-label" for="price">Short Description</label>
								<div class="col-sm-10">
									<input type="text" name="short_description" placeholder="Enter Short Description" value="<?php echo $allservice->short_description; ?>" class="form-control" required>
								</div>
							</div>
							<div class="form-group">								<label class="col-sm-2 control-label" for="fullname">Status</label>								<div class="col-sm-10">									<select name="status" class="form-control brands" required>										<option value="Active" <?php if($allservice->status=='Active') echo 'selected'; ?>>Active</option>										<option value="De-active" <?php if($allservice->status=='De-active') echo 'selected'; ?>>De-active</option>									</select>								</div>							</div>
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
 <script>
          $(function () {
             
             
            });
                $('.brands').change(function() {	
				var bid=$(this).val();
                       $.ajax({
         url: "<?php echo base_url(); ?>admin/brand/getmodal/"+bid,
          type:"get",
          dataType: 'json',
          success: function(result)
          {
              var data = result;
                    $(".modal_data").html('');
              $(".modal_data").append('<option>Please Select</option>');
                    $.each(data, function (i, v)
                    {
                        $(".modal_data").append("<option value=" + v.id + ">" + v.modalname + "</option>");
                    });
          }
      });
      });

      </script>
<script src="<?php echo base_url(); ?>lib/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php $this->load->view('admin/footer'); ?>