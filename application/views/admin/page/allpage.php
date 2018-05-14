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
						<label for="email">PAGE LIST:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>PAGE TITLE</th>
									<th>PAGE CONTENT</th>
									<th>ACTION</th>
									
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
								foreach($allpage as $issue){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $issue->page_title; ?></td>
									<td><?php echo substr($issue->page_content, 0, 70); ?></td>
									
									 <td><a href="<?php echo base_url(); ?>index.php/admin/page/editpage/<?php echo $issue->id; ?>">EDIT</a></td>
								</tr>
								<?php $i++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Sr.</th>									
									<th>PAGE TITLE</th>
									<th>PAGE CONTENT</th>
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