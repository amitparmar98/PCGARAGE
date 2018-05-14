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
			<div class="col-sm-12">
				<div class="box">
					<div class="box-body">
						<label for="email">SERVICE LIST:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>NAME</th>
									<th>Price</th>
									<th>Description</th>
									<th>Short Description</th>									<th>Status</th>									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
								foreach($allservice as $a){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $a->name; ?></td>
									<td><?php echo $a->price; ?></td>
									<td><?php echo $a->description; ?></td>
									<td><?php echo $a->short_description; ?></td>									<td><?php echo $a->status; ?></td>
									
									 <td><a href="<?php echo base_url(); ?>index.php/admin/brand/editService/<?php echo $a->id; ?>">EDIT</a>/<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/brand/delService/<?php echo $a->id; ?>">DELETE</a></td>
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
                                                                    <th>Sr.</th>	
									<th>NAME</th>
									<th>Price</th>
									<th>Description</th>
									<th>Short Description</th>
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