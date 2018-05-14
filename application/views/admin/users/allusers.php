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
						<label for="email">USER LIST:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<!--th>TYPE</th-->									
									<th>NAME</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>EMAIL</th>
									<th>PHONE</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//echo "<pre>"; print_r($orders); die();
								
								$i=1;foreach($alluser as $user){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<!--td><?php //echo $user->type; ?></td-->
									<td><?php echo $user->fullname; ?></td>
									<td><?php echo $user->username; ?></td>
									<td><?php echo $user->password; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->phone; ?></td>	
																
								 <td><a href="<?php echo base_url(); ?>index.php/admin/adduser/usereditform/<?php echo $user->id; ?>">EDIT</a><?php if($user->status =='1'){ ?>	<?php }else{ ?>/<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/adduser/deluser/<?php echo $user->id; ?>">DELETE</a></td>
								<?php  } ?>
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Sr.</th>									
									<!--th>TYPE</th-->									
									<th>NAME</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>EMAIL</th>
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