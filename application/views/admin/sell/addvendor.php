<?php $this->load->view('admin/header'); ?>
 <?php $queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$v->brand."'");
										$rowi = $queryi->result();
										//echo "<pre>"; print_r($rowi);
									?>
 <?php $queryi1 = $this->db->query("SELECT * FROM modals WHERE id = '".$v->model."'");
										$row = $queryi1->result();
										//echo "<pre>"; print_r($rowi);
									?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ADD VENDER</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/order/saveVendor/<?php echo $v->id; ?>" enctype="multipart/form-data">
						<div class="box-body">
                                                    
							<div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">Brand</label>
								<div class="col-sm-10">
                                                                    <input type="text" name="fullname" readonly placeholder="NAME" value="<?php echo $rowi[0]->catname; ?>" id="fullname" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="emails">Model</label>
								<div class="col-sm-10">
									<input type="email" name="emails" readonly placeholder="Model" value="<?php echo isset($row[0]->modalname)?$row[0]->modalname:''; ?>" id="emails" class="form-control" required>
								</div>
							</div>
                                                    
							<div class="form-group">
								<label class="col-sm-2 control-label" for="business_name">Color</label>
								<div class="col-sm-10">
									<input type="text" readonly placeholder="Color" value="<?php echo $v->color; ?>" name="business_name" id="business_name" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="address1">Issue</label>
								<div class="col-sm-10">
                                                                    
                                                                     <?php
										$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".$v->issue.")")->result();
                     
                                                                                $issue_total = array();
                                                                                foreach($query11 as $a)
                                                                                {
                                                                                    $issue_total[] = $a->issue_name;
                                                                                }
										//echo "<pre>"; print_r($row);
									?>
                                                                        
									
									<input type="text" readonly placeholder="Issue" value="<?php echo implode(',',$issue_total); ?>" name="address1" id="address1" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="address2">Name</label>
								<div class="col-sm-10">
									<input type="text" readonly placeholder="ADDRESS" value="<?php echo $v->cname; ?>" name="address2" id="address2" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="city">Email</label>
								<div class="col-sm-10">
									<input type="text" readonly placeholder="CITY" value="<?php echo $v->email; ?>" name="city" id="city" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="state">Phone</label>
								<div class="col-sm-10">
									<input type="text" readonly placeholder="STATE" value="<?php echo $v->phone; ?>" name="state" id="state" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="zip">Price</label>
								<div class="col-sm-10">
									<input type="text" readonly placeholder="price" value="<?php echo $v->price; ?>" name="zip" id="zip" class="form-control" required>
								</div>
							</div>
                                                    <div class="form-group">
								<label class="col-sm-2 control-label" for="fullname">SELECT VENDOR</label>
								<div class="col-sm-10">
									<select name="vid" class="form-control">
										<option value="0">Select Vendor</option>
										<?php foreach($allvendor as $a){ ?>
											<option <?=$a->id == $v->vendor_id?'selected="selected"':'';?> value="<?=$a->id;?>"><?=$a->fullname;?></option>
										<?php } ?>
									</select>
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
<script src="<?php echo base_url(); ?>lib/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php $this->load->view('admin/footer'); ?>