<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ADD Page</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/page/addpage" enctype="multipart/form-data">
						<div class="box-body">
						
						
							<div class="form-group">
								<label class="col-sm-1 control-label" for="fullname">Page Title</label>
								<div class="col-sm-11">
									<input type="text" name="page_title" placeholder="NAME" value="" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label" for="price">Page Content</label>
								<div class="col-sm-11">
                                                                    <textarea name="page_content" placeholder="Enter Page Content" id='editor1' value="" class="form-control"></textarea>
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
              CKEDITOR.replace('editor1')
             
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