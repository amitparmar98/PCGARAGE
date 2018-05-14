<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ADD ISSUE FORM</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/brand/addissue" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT BRAND</label>
								<div class="col-sm-10">
									<select name="brand_id" class="form-control brands" required>
										<option value="">Select brand</option>
										<?php foreach($allbrands as $brand){ ?>
											<option value="<?=$brand->id;?>"><?=$brand->catname;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT Modal</label>
								<div class="col-sm-10">
									<select name="modal_id" class="form-control modal_data" required>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="issue_name" placeholder="ISSUE NAME" value="" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="price">Price</label>
								<div class="col-sm-10">
									<input type="text" name="price" placeholder="Enter Issue Price" value="" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">ISSUE IMAGE</label>
								<div class="col-sm-10">
									<p><input type="file" class="form-control vov" name="userfile"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputEmail3"></label>
								<div class="col-sm-10">
									<button class="btn btn-info pull-left" type="submit">ADD</button>
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
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>lib/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php $this->load->view('admin/footer'); ?>