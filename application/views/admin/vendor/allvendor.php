<?php $this->load->view('admin/header'); ?>
<style>
	#example1 tr th{text-align:center}
	#example1 tr td{text-align:center}
	.addneworder input{width:18%;display:inline-block}
	.addneworder select{width:18%;display:inline-block}
	.addneworder button{ vertical-align: top; width:8%}
	
	.file-form{
		padding:20px 0;
	}
	.btn-csutom{
		color:inherit !important
	}
</style>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="box">
					<div class="box-body">
						<label for="email">All VENDOR LIST:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<!--th>TYPE</th-->									
									<th>NAME</th>
									<th>EMAIL</th>
									<th>Website</th>
									<th>BUSINESS NAME</th>
									<th>ADDRESS</th>
									<th>CITY</th>
									<th>STATE</th>
									<th>ZIP</th>
									<th>PHONE</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//echo "<pre>"; print_r($orders); die();
								
								$i=1;foreach($allvendor as $vendor){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<!--td><?php //echo $user->type; ?></td-->
									<td><?php echo $vendor->fullname; ?></td>
									<td><?php echo $vendor->emails; ?></td>
									<td><?php echo $vendor->website; ?></td>
									<td><?php echo $vendor->business_name; ?></td>
									<td><?php echo $vendor->address1.' '.$vendor->address2; ?></td>
									<td><?php echo $vendor->city; ?></td>	
									<td><?php echo $vendor->state; ?></td>	
									<td><?php echo $vendor->zip; ?></td>	
									<td><?php echo $vendor->phone; ?></td>	
																
								 <td><a href="<?php echo base_url(); ?>index.php/admin/addvendor/vendoreditform/<?php echo $vendor->id; ?>">EDIT</a>/<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/addvendor/delvendor/<?php echo $vendor->id; ?>">DELETE</a></td>
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Sr.</th>									
									<!--th>TYPE</th-->									
									<th>NAME</th>
									<th>EMAIL</th>
									<th>Website</th>
									<th>BUSINESS NAME</th>
									<th>ADDRESS</th>
									<th>CITY</th>
									<th>STATE</th>
									<th>ZIP</th>
									<th>PHONE</th>
									<th>ACTION</th>
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