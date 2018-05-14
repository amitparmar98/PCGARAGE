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
							<label for="email">ISSUE LIST:</label>
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
						<form action="" method="post">
							<div class="input-group">
								<input class="form-control" name="search" placeholder="Search by Issue name" aria-describedby="basic-addon2" type="text" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default btn-flat">Find</button>
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
									<th>Brand</th>
									<th>Model</th>
									<th>Issue</th>
									<th>IMAGE</th>
									<th>Price</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
								
								foreach($allissue as $issue){ ?>
								<tr>
									<td><?php echo $i; ?></td> 
									<td>
									<?php  
										$catquery = $this->db->select("catname")->from('brands')->where('id',$issue->brand_id)->get()->row();
										echo $catquery->catname; 
									?>
									</td>
									<td>
									<?php  
										$modalquery = $this->db->select("modalname")->from('modals')->where('id',$issue->modal_id)->get()->row();
										echo $modalquery->modalname; 
									?>
									</td>
									<td><?php echo $issue->issue_name; ?></td>
									<td><img style="height:60px;" src="<?php echo base_url(); ?>/uploads/issue/<?php echo $issue->image; ?>" alt=""/></td>
									<td><?php echo $issue->price; ?></td>
									 <td><a href="<?php echo base_url(); ?>index.php/admin/brand/editissue/<?php echo $issue->id; ?>">EDIT</a>/<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/brand/delissue/<?php echo $issue->id; ?>">DELETE</a></td>
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Sr.</th>									
									<th>Brand</th>
									<th>Model</th>
									<th>Issue</th>
									<th>IMAGE</th>
									<th>Price</th>
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