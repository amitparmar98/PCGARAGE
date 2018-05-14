
<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title">ADD VENDER</h3>
               </div>
               <form class="form-horizontal" method="post" action="<?php echo base_url('admin/order/saveOtherVendor');?>" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="orderNo">Order No</label>
                        <div class="col-sm-10">
                           <input type="text" name="orderNo" id="orderNo" readonly value="<?php echo 'PCG'.$otherOrders->other_id; ?>" class="form-control" required>
                           <input type="hidden" name="other_id" value="<?php echo $otherOrders->other_id; ?>" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="brand">Brand</label>
                        <div class="col-sm-10">
                           <input type="text" name="brand" id="brand" readonly value="<?php echo $otherOrders->brand_name; ?>" class="form-control" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="model">Model</label>
                        <div class="col-sm-10">
                           <input type="email" name="model" readonly value="<?php echo $otherOrders->model; ?>" id="model" class="form-control" required>
                        </div>
                     </div>                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="issue">Issue</label>
                        <div class="col-sm-10">                          
                           <input type="text" readonly value="<?php echo $otherOrders->issue; ?>" name="issue" id="issue" class="form-control" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="cname">Name</label>
                        <div class="col-sm-10">
                           <input type="text" readonly value="<?php echo $otherOrders->cname; ?>" name="cname" id="cname" class="form-control" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">Email</label>
                        <div class="col-sm-10">
                           <input type="text" readonly value="<?php echo $otherOrders->email; ?>" name="email" id="email" class="form-control" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="address">Address</label>
                        <div class="col-sm-10">
                           <textarea name="address" id="address" cols="30" rows="10" style="height: 100px;" readonly class="form-control"><?php echo $otherOrders->address; ?></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="phone">Phone</label>
                        <div class="col-sm-10">
                           <input type="text" readonly value="<?php echo $otherOrders->phone; ?>" name="phone" id="phone" class="form-control" required>
                        </div>
                     </div>
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="fullname">SELECT VENDOR</label>
                        <div class="col-sm-10">
                           <select name="vendor" class="form-control">
                              <option value="">Select Vendor</option>
	                            <?php foreach($vendors as $rows): ?>
	                            
	                            <option value="<?php echo $rows->id;?>" <?php echo ($rows->id == $otherOrders->vendor_id) ? 'selected="selected"' : '';?>><?php echo $rows->fullname;?></option>
	                            <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="fullname">SELECT STATUS</label>
                        <div class="col-sm-10">
                           <select name="status" class="form-control">
                              <option value="0">Select Status</option>
	                             <option <?= 'pending' == $otherOrders->status?'selected="selected"':'';?> value="pending">Pending</option>
	                             <option <?= 'process' == $otherOrders->status?'selected="selected"':'';?> value="process">Process</option>
	                             <option <?= 'complete' == $otherOrders->status?'selected="selected"':'';?> value="complete">Complete</option>
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

