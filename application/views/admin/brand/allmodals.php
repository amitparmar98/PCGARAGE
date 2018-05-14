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
						<div class="col-md-4">
							<label for="email">MODEL LIST:</label>
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
						<form action="" method="post">
							<div class="input-group">
								<input class="form-control" name="search" placeholder="Search by madel name" aria-describedby="basic-addon2" type="text" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default btn-flat">Find Model</button>
								</span>
							</div>
						</form>	
						</div>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>NAME</th>
									<th>IMAGE</th>
									<th>Brand</th><th>Order</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
								foreach($allmodals as $modal){ 
                                        $queryi = $this->db->query("SELECT * FROM brands WHERE id = '".$modal->brand_id."'");
										$rowi = $queryi->row();
                                                                    ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $modal->modalname; ?></td>
									<td><img style="height:100px;" src="<?php echo base_url(); ?>/uploads/modals/<?php echo $modal->image; ?>" alt=""/></td>							
                                                                        <td><?php echo isset($rowi->catname)?$rowi->catname:''; ?></td>                                                                        <td><?php echo $modal->modal_order; ?></td>
                                                                        <td><a href="<?php echo base_url(); ?>index.php/admin/brand/editmodal/<?php echo $modal->id; ?>">EDIT</a>/<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/brand/delmodal/<?php echo $modal->id; ?>">DELETE</a></td>
								
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Sr.</th>									
									<th>NAME</th>
									<th>IMAGE</th>
									<th>Brand</th>									<th>Order</th>
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