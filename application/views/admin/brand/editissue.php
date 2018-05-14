<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">EDIT ISSUE FORM</h3>
					</div>					
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/brand/editissue/<?php echo $issue->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT BRAND</label>
								<div class="col-sm-10">
									<select name="brand_id" class="form-control brands" required>
										<option value="">Select brand</option>
										<?php 
										foreach($allbrands as $brand){ ?>
											<option <?php if($issue->brand_id==$brand->id){ echo "selected"; } ?> value="<?php echo $brand->id;?>"><?php  echo $brand->catname;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT Modal</label>
								<div class="col-sm-10">
									<select name="modal_id" class="form-control modal_data" required>
                                        <?php
											$query = $this->db->query('SELECT * FROM modals WHERE brand_id="'.$issue->brand_id.'"');
                                            $allmodals= $query->result();
                                                                              
										foreach($allmodals as $modl){ ?>
											<option <?php if($issue->modal_id==$modl->id){ echo "selected"; } ?> value="<?php echo $modl->id;?>"><?php  echo $modl->modalname;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">NAME</label>
								<div class="col-sm-10">
									<input type="text" name="issue_name" placeholder="ISSUE NAME" value="<?php echo $issue->issue_name; ?>" class="form-control" required>
								</div>
							</div>
                                                    <div class="form-group">
								<label class="col-sm-2 control-label" for="price">Price</label>
								<div class="col-sm-10">
									<input type="text" name="price" placeholder="Enter Issue Price" value="<?php echo $issue->price; ?>" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">ISSUE IMAGE</label>
								<div class="col-sm-10">
								<img src="<?php echo base_url(); ?>uploads/issue/<?php echo $issue->image; ?>" style="vertical-align:middle;" width="80" height="80">
									<p></p>
									<p><input type="file" class="form-control vov" name="userfile"></p>
								</div>
							</div>
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