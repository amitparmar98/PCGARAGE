<?php $this->load->view('admin/header'); ?>
<link href="<?php echo base_url(); ?>lib/frontend/css/chat.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>lib/js/otherchat.js"></script>
<script>            
	var user_image_url = '<?php echo base_url('lib/frontend/img/user1.png')?>';
	var admin_image_url = '<?php echo base_url('lib/frontend/img/support.png');?>';
</script>
<style>
	.wysihtml5-toolbar{
		display: none;
	}
	.textarea1{
		position: fixed;
		bottom: 0px;
		left: 0px;
		right: 0px;
		width: 100%;
		height: 50px;
		z-index: 99;
		background: #fafafa;
		border: 1px solid #e2e2e2;
		outline: none;
		padding-left: 11px;
		padding-right: 55px;
		color: #666;
		font-weight: 400;
	}
</style>
 <div class="content-wrapper">
	<section class="content">
            <div class="box">
					<div class="box-body">
						<label for="email">ORDER Detail:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>BRAND</th>
									<th>MODEL</th>								
									<th>ISSUE</th>
									<!-- <th>NAME</th>
									<th>EMAIL</th>
									<th>ADDRESS</th>
									<th>PHONE NO</th>
									<th>PRICE</th> -->
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
							 $query11 = $this->db->query("SELECT * FROM other_orders WHERE other_id = '".$id."'");
										$order = $query11->row();                              
                                 ?>
								<tr>
									<td><?php echo $i; ?></td>									
									<td><?php echo $order->brand_name; ?></td>									
									<td><?php echo $order->model; ?></td>
									<td><?php echo $order->issue; ?></td>
								
								</tr>
								
							</tbody>
							
						</table>
						

                                        </div>
				</div>
            
                <div class="row d-flex justify-content-center">

                    <div class="col-sm-12">

                        <ol class="chat">


                            <?php 
                            $last_id = 0;
                            foreach($messages as $m){ 
                                 $last_id = $m->id;
                                 
                                if($m->is_admin == 1)
                                {
								?>
		                            <li class="self">
		                                <div class="avatar"><img src="<?php echo base_url('lib/frontend/img/support.png');?>" draggable="false"/></div>
		                                <div class="msg">
		                                    <p style="font-size: 12px;"><?php echo $m->message; ?></p>
		                                    <time style="font-size:11px;"><?php echo $m->time; ?></time>
		                                </div>
		                            </li>
                            <?php } else { ?>

		                            <li class="other">
		                                <div class="avatar"><img src="<?php echo base_url('lib/frontend/img/user1.png');?>" draggable="false"/></div>
		                                <div class="msg">
		                                    <p style="font-size: 12px;"><?php echo $m->message; ?></p>
		                                    <time style="font-size:11px;"><?php echo $m->time; ?></time>
		                                </div>
		                            </li>

                            <?php } } ?>

                        </ol>
                        <form class="" role="form" method="POST" id='other_chat_form' action="#">

                               <input class="lastId" type="hidden" name="" value="<?php echo $last_id; ?>"/>
                            <input class="url" type="hidden" name="url" value="<?php echo base_url(); ?>"/>
                            <input class="order_id" type="hidden" name="order_id" value="<?php echo $id; ?>"/>
                            <input class="" type="hidden" name="is_admin" value="1"/>
                            <input class="" type="hidden" name="is_client" value="0"/>
                            <div class="row">
                                <div class="col-md-11">
                            <input class="textarea chat_form_input" type="text" name="msg" placeholder="Type here!"/>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" style="height: 48px;" class="btn btn-primary">Submit</button> 
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
        </section>
         </div>

<?php $this->load->view('admin/footer'); ?>
