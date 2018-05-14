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
        <script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/sellchat.js"></script>

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
								<li class="d-none d-md-inline-block" style="font-size: 14px;"><i class="fa fa-phone"></i><a href="tel:02072218038">&nbsp; <strong>02072218038</strong></a></li>
								<li class="d-none d-md-inline-block"><a href="javascript:void(0);" data-toggle="modal" data-target="#RequestCallBack" class="btn"> Request Call Back</a></li>
								<li class="d-inline-block d-md-none"><a href="tel:02072218038" class="btn"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="gothambold d-md-inline-block"><img class="img-fluid mb-1" src="<?php echo base_url(); ?>lib/frontend/img/track-order.png" alt="Track My Order" /> <span class="hidden-sm-down">Track My Order</span></a></li>
							</ul>
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
									<th>Memory</th>
									<th>Problems</th>
								</tr>
							</thead>
							<tbody>

                                <?php $i=1;foreach($sellOrder as $rows):?>
                                    <tr>                                        
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $rows->brand_name;?></td>
                                        <td><?php echo $rows->model_name;?></td>
                                        <td><?php echo $rows->memory.'GB';?></td>
                                        <td><?php echo $rows->issues;?></td>
                                    </tr>
                                    <?php $i++;?>
                                <?php endforeach;?>								
                               
							</tbody>
						</table>
                   </div>
				</div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12">
                        <?php if(isset($messages)):?>
                            <ol class="chat">
                                <?php
                                 $last_id = 0;
                                foreach($messages as $m){ 
                                    $last_id = $m->id;
                                    if($m->is_client == 1)
                                    { ?>
    									<li class="self">
    										<div class="avatar"><img src="http://52.19.129.128/lib/frontend/img/user1.png" draggable="false"/></div>
    										<div class="msg">
    											<p><?php echo $m->message; ?></p>
    											<time><?php echo $m->time; ?></time>
    										</div>
    									</li>
                            <?php   } else { ?>
    									<li class="other">
    										<div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
    										<div class="msg">
    										   <p style="font-size: 12px;"><?php echo $m->message; ?></p>
    											<time style="font-size:11px;"><?php echo $m->time; ?></time>
    										</div>
    									</li>
                            <?php 	}    
                                } 
    						?>
                            </ol>
                        <?php endif;?>
                        <form class="" role="form" method="POST" id='sell_chat_form' action="#">
                            <input class="lastId" type="hidden" name="" value="<?php echo $last_id; ?>"/>
                            <input class="url" type="hidden" name="url" value="<?php echo base_url(); ?>"/>
                            <input class="sell_id" type="hidden" name="sell_id" value="<?php echo $id; ?>"/>
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
