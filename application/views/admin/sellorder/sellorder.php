<?php $this->load->view('admin/header'); ?>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <div class="box">
               <div class="box-body">
                  <label for="email">SELL ORDER LIST:</label>
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
                           <th>ACCESSORIES</th>                       
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>CITY</th>  
                           <th>COUNTRY</th>                       
                           <th>PHONE NO</th>  
                           <th>ACTION</th>                                      
                        </tr>
                     </thead>
                     <tbody>

                     	<?php foreach($sellOrder as $rows):?>
	                      <tr>                      	
	                      	<td><?php echo 'PCGSELL'.$rows->sell_id;?></td>
	                      	<td><?php echo  $rows->brand_name;?></td>
	                      	<td><?php echo  $rows->model_name;?></td>
	                      	<td><?php echo  date('d M,Y h:i:a',strtotime($rows->order_date));?></td>
	                      	<td><?php echo  $rows->issues;?></td>
                           <td><?php echo  $rows->accessories;?></td>
	                      	<td><?php echo  $rows->first_name;?></td>
	                      	<td><?php echo  $rows->email;?></td>
	                      	<td><?php echo  $rows->city;?></td>
                           <td><?php echo  $rows->country;?></td>
	                      	<td><?php echo  $rows->phone;?></td>
	                        <td><a href="<?php echo base_url('admin/order/adminSellChat/'.$rows->sell_id);?>">Message</td>
	                      
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
                           <th>ACCESSORIES</th>                       
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>CITY</th>  
                           <th>COUNTRY</th>                       
                           <th>PHONE NO</th>  
                           <th>ACTION</th>   
                            
                        </tr>
                     </tfoot>
                  </table>
                 <?php echo $pagination?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php $this->load->view('admin/footer'); ?>

