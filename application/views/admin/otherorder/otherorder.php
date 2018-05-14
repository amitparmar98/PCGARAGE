<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="box">
               <div class="box-body">
                  <label for="email">OTHER ORDER LIST:</label>
               </div>
               <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>ORDER NO.</th>
                           <th>BRAND</th>
                           <th>MODEL</th>
                           <th>ORDER DATE</th>                           
                           <th>ISSUE</th>                          
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>ADDRESS</th>                         
                           <th>PHONE NO</th>  
                           <th>ASSIGN TO</th>  
                           <th>ACTION</th>                        
                        </tr>
                     </thead>
                     <tbody>

                     	<?php foreach($otherOrder as $rows):?>
	                      <tr>                      	
	                      	<td><?php echo 'PCG'.$rows->other_id;?></td>
	                      	<td><?php echo  $rows->brand_name;?></td>
	                      	<td><?php echo  $rows->model;?></td>
	                      	<td><?php echo  date('d M,Y h:i:a',strtotime($rows->created_at));?></td>
	                      	<td><?php echo  $rows->issue;?></td>
	                      	<td><?php echo  $rows->cname;?></td>
	                      	<td><?php echo  $rows->email;?></td>
	                      	<td><?php echo  $rows->address;?></td>
	                      	<td><?php echo  $rows->phone;?></td>
	                      	<td><a href="<?php echo base_url('admin/order/otherAddVendor/'.$rows->other_id);?>"><?php echo isset($rows->vendor_id) ? $rows->fullname : 'Add Vendor'?></td>
                           <td><a href="<?php echo base_url('admin/order/otherChat/'.$rows->other_id); ?>">Message</a></td>
	                      	<!-- <td><a href=""><?php echo $rows->status?></td> -->
	                      </tr>
	                    <?php endforeach;?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>ORDER NO.</th>
                           <th>BRAND</th>
                           <th>MODEL</th>
                           <th>ORDER DATE</th>                           
                           <th>ISSUE</th>                          
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>ADDRESS</th>                         
                           <th>PHONE NO</th> 
                           <th>ASSIGN TO</th>   
                           <th>ACTION</th>  
                        </tr>
                     </tfoot>
                  </table>
                 <?php echo $pagination;?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php $this->load->view('admin/footer'); ?>

