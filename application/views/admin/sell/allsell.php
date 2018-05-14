<?php $this->load->view('admin/header'); ?>

<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box">
					<div class="box-body">
						<label for="email">Sell LIST:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>BRAND</th>
									<th>MODEL</th>
									<th>COLOR</th>
									<th>ISSUE</th>
									<th>ACCESSORIES</th>
									<th>NAME</th>
									<th>EMAIL</th>
									<th>ADDRESS</th>
									<th>MESSAGE</th>
									<th>PHONE NO</th>
									<th>PRICE</th>
<!--								        <th>ASSIGN TO</th>-->
                                                                        <!--<th>ACTION</th>-->
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
								foreach($allorder as $order){ 
                                                                    $query = $this->db->query("SELECT * FROM vendor WHERE id = '".$order->vendor_id."'");
										$vendor = $query->row();
                                                                    ?>
								<tr>
									<td><?php echo $i; ?></td>
									<?php
										$queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$order->brand."'");
										$rowi = $queryi->result();
										//echo "<pre>"; print_r($rowi);
									?>
									<td><?php echo $rowi[0]->catname; ?></td>
									<?php
										$query = $this->db->query("SELECT * FROM modals WHERE id = '".$order->model."'");
										$row = $query->result();
										//echo "<pre>"; print_r($row);
									?>
									<td><?php echo $row[0]->modalname; ?></td>
									<td><?php echo $order->color; ?></td>
                                                                        
                                                                        
                                                                        <?php
										$query11 = $this->db->query("SELECT * FROM pc_issue WHERE id IN (".$order->issue.")")->result();
                     
                                                                                $issue_total = array();
                                                                                foreach($query11 as $a)
                                                                                {
                                                                                    $issue_total[] = $a->issue_name;
                                                                                }
										//echo "<pre>"; print_r($row);
									?>
                                                                        
									
									<td><?php echo implode(',',$issue_total); ?></td>
                                                                        <td><?php echo $order->accessories; ?></td>
									<td><?php echo $order->cname; ?></td>
									<td><?php echo $order->email; ?></td>
									<td><?php echo $order->address; ?></td>
									<td><?php echo $order->message; ?></td>
									<td><?php echo $order->phone; ?></td>
									<td><?php echo $order->price; ?></td>
									
																
								 <!--td><a href="">EDIT</a>/<a onclick="return confirm('Are you sure?')" href="">DELETE</a></td-->
<!--                                                                 <td><a href="<?php echo base_url(); ?>index.php/admin/order/addVendor/<?php echo $order->id; ?>">
                                                                         <?php
                                                                         if(isset($vendor->fullname))
                                                                         {
//                                                                            echo  $vendor->fullname;
                                                                         }
                                                                         else
                                                                         {
//                                                                             echo 'Add Vendor';
                                                                         }
                                                                         
                                                                     ?>
                                                                     
                                                                     </a></td>-->
                                                                     <!--<td><a href="<?php echo base_url(); ?>index.php/admin/order/chat/<?php echo $order->id; ?>">Message</a></td>-->
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									
									<th>Sr.</th>									
									<th>BRAND</th>
									<th>MODEL</th>
									<th>COLOR</th>
									<th>ISSUE</th>
                                                                        <th>ACCESSORIES</th>
									<th>NAME</th>
									<th>EMAIL</th>
                                                                        <th>ADDRESS</th>
                                                                        <th>MESSAGE</th>
									<th>PHONE NO</th>
                                                                        <th>PRICE</th>
                                                                        <!--<th>ASSIGN TO</th>-->
                                                                     <!--<th>ACTION</th>-->
									
								
								</tr>
							</tfoot>
						</table>
						<?=$pagination?>

                                        </div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('admin/footer'); ?>