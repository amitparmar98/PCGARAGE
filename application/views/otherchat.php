<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>lib/frontend/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>lib/frontend/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>lib/frontend/css/chat.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>lib/frontend/font/gotham/stylesheet.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>lib/frontend/font/icomoon-icon/style.css" rel="stylesheet" />
        <!-- Bootstrap core CSS --> 

        <!-- JQuery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/otherchat.js"></script>

        <script>
            
            var user_image_url = '<?php echo base_url('lib/frontend/img/user1.png')?>';
            var admin_image_url = '<?php echo base_url('lib/frontend/img/support.png');?>';
        </script>

    </head>
    <body class="inner-page">
        <header role="mast-head">
			<section role="top-bar"  class="py-3">
				<div class="container">
					<div class="row">
                         <input type="hidden" id="site_url" value="<?php echo base_url(); ?>">
						<input type="hidden" id="brand_id_c" value="<?php echo isset($_GET['brandid'])?$_GET['brandid']:'0'; ?>">
						<input type="hidden" id="subbrand_id_c" value="<?php echo isset($_GET['subbrandid'])?$_GET['subbrandid']:'0'; ?>">
						<div class="col-md-3">
							  <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid logo" alt="Site Logo" /></a>
						</div>
						<div class="col-md-12 col-lg-4 d-flex align-items-center">
							<p class="tagline mt-2 mt-md-0 mb-0">Fastest & low cost repair & IT service since 2007</p>
						</div>
						<div class="col-md-7 col-lg-5 d-flex align-items-center justify-content-end px-lg-0 xs-nav">
							<ul class="right-nav w-100">
								<li class="d-none d-md-inline-block" style="font-size: 18px;"><i class="fa fa-phone"></i><a href="tel:02037705252">&nbsp; <strong>02037705252</strong></a></li>
								<li class="d-none d-md-inline-block"><a href="javascript:void(0);" data-toggle="modal" data-target="#RequestCallBack" class="btn"> Request Call Back</a></li>
								<li class="d-inline-block d-md-none"><a href="tel:02037705252" class="btn"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="gothambold d-md-inline-block"><img class="img-fluid mb-1" src="<?php echo base_url(); ?>lib/frontend/img/track-order.png" alt="Track My Order" /> <span class="hidden-sm-down">Track My Order</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section role="menu-bar" class="py-0 py-md-2" style="background:#005DA4">
				<div class="container">
					<div class="row">
						<div class="col-md-11 align-items-center">
							<nav class="navbar navbar-toggleable-sm p-0">
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav mr-auto w-100 gothambold">
										<li><a href="<?php echo base_url(); ?>iphone-repair">iPhone Repair</a></li>
										<li><a href="<?php echo base_url(); ?>mobile-repair">Mobile Repair </a></li>
										<li><a href="<?php echo base_url(); ?>laptop-repair">Laptop Repair</a></li>
										<li><a href="<?php echo base_url(); ?>pc-repair">PC Repair</a></li>
										<li><a href="<?php echo base_url(); ?>tablet-repair">Tablet</a></li>
										<li><a href="http://mypcgarage.co.uk/" target="_blank">Shop</a></li>

										<?php if($this->session->userdata('site_user_id')):?>
											<ul class="nav navbar-nav">												
												<li class="dropdown user user-menu">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">														
														<span class="hidden-xs">My Profile</span>
													</a>
													<ul class="dropdown-menu">	
														<li class="">
															<div class="">
																<a href="<?php echo base_url('repair/repairOrders');?>" class="btn btn-default">Repair Orders</a>
															</div>
														</li>
														<li class="">
															<div class="">
																<a href="<?php echo base_url('sell/sellOrder');?>" class="btn btn-default">Sell Orders</a>
															</div>
														</li>														
														<li class="">
															<div class="">
																<a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default">Sign Out</a>
															</div>
														</li>
													</ul>
												</li>
											</ul>

										<?php else:?>
											<li><a href="<?php echo base_url('login');?>">Login</a></li>
										<?php endif;?>
									</ul>
								</div>
							</nav>
						</div>

					</div>
				</div>
			</section>
		</header>
        <main role="main-wrapper" class="inner-page-holder py-70">
            <div class="container">
                <div class="box">
					<div class="box-body">
						<label for="email">ORDER DETAIL:</label>
					</div>
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>									
									<th>BRAND</th>
									<th>MODEL</th>
									<!-- <th>COLOR</th> -->
									<th>ISSUE</th>
								</tr>
							</thead>
							<tbody>
								<?php								
								$i=1;
                                    $query11 = $this->db->query("SELECT * FROM other_orders WHERE other_id = '".$id."'");
										$order = $query11->row();
                                    /*$query = $this->db->query("SELECT * FROM vendor WHERE id = '".$order->vendor_id."'");
										$vendor = $query->row();*/									
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
                                if($m->is_client == 1)
                                { ?>
									<li class="self">
										<div class="avatar"><img src="<?php echo base_url('lib/frontend/img/user1.png')?>" draggable="false"/></div>
										<div class="msg">
											<p><?php echo $m->message; ?></p>
											<time><?php echo $m->time; ?></time>
										</div>
									</li>
                        <?php   } else { ?>
									<li class="other">
										<div class="avatar"><img src="<?php echo base_url('lib/frontend/img/support.png');?>" draggable="false"/></div>
										<div class="msg">
										   <p style="font-size: 12px;"><?php echo $m->message; ?></p>
											<time style="font-size:11px;"><?php echo $m->time; ?></time>
										</div>
									</li>
                        <?php 	}    
                            } 
						?>
                        </ol>
                        <form class="" role="form" method="POST" id='other_chat_form' action="#">
                            <input class="lastId" type="hidden" name="" value="<?php echo $last_id; ?>"/>
                            <input class="url" type="hidden" name="url" value="<?php echo base_url(); ?>"/>
                            <input class="order_id" type="hidden" name="order_id" value="<?php echo $id; ?>"/>
                            <input class="" type="hidden" name="is_admin" value="0"/>
                            <input class="" type="hidden" name="is_client" value="1"/>
                             <div class="row">
                                <div class="col-md-11">
                                    <textarea class="textarea chat_form_input form-control" type="text" name="msg" placeholder="Type here!"/></textarea>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" style="height: 48px;" class="btn btn-primary">Submit</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer role="footer-area" class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-item">
                            <li><a href="">How It Works</a></li>
                            <li><a href="">Repair in Bulk</a></li>
                            <li><a href="">Book a Repair</a></li>
                            <li><a href="">Wireless Setup</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-item">
                            <li><a href="">About Company</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Our Team</a></li>
                            <li><a href="">Corporate accounts</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-item">
                            <h6 class="gothambold mb-3">Where to Repair</h6>
                            <li><a href="">Ladbroke Grove</a></li>
                            <li><a href="">Nottingham</a></li>
                            <li><a href="">Bridge House</a></li>
                            <li><a href="">Littlehampton</a></li>
                            <li><a href="">Camden Town</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid" alt="" />
                        <ul class="list-item-inline mt-4">
                            <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <section role="copy-right">
                © 2017 PC Garage Ltd. All Rights Reserved
            </section>
        </footer>
    </body>
</html>
