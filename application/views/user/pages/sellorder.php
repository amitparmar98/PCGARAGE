<?php $this->load->view('front/header'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
<main role="main-wrapper" class="inner-page-holder">
   <div class="container">
      <div class="row">
      	<div class="col-md-12">
      		 <h2 align="center">Repair Order List</h2>
      	</div>
         <div class="col-md-12">
            <table id="repairOrderTable" class="table table-striped table-bordered" style="width:100%;margin: auto;">
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
          						<th>ACTION</th>					
										   
                  </tr>
               </thead>
               <tbody>
               	<?php foreach($sellOrder as $rows):?>
                  <tr>
                    <td><?php echo 'PCGSELL'.$rows->sell_id;?></td>
                    <td><?php echo $rows->brand_name;?></td>
                    <td><?php echo $rows->model_name;?></td>
                    <td><?php echo date("d M,Y h:i:a", strtotime($rows->created_at));?></td>
          					<td><?php echo $rows->issues; ?></td>
          					<td><?php echo $rows->accessories;?></td>
          					<td><?php echo $rows->first_name;?></td>
          					<td><?php echo $rows->email;?></td>          				
          					<td><a href="<?php echo base_url('sell/chat/'.$rows->sell_id);?>">Message</td>
					
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
          						<th>ACTION</th>					
										   
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</main>
<?php $this->load->view('front/footer'); ?>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
      $('#repairOrderTable').DataTable();
   } );
</script>

