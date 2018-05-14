<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/morris/morris.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/daterangepicker/daterangepicker-bs3.css">
		<!--<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>lib/admin/style.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!--<script src="<?php echo base_url(); ?>lib/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>-->
                <script type="text/javascript" src="<?php echo base_url(); ?>lib/frontend/js/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?php echo base_url(); ?>lib/admin/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>lib/admin/custom.js"></script>
		<script src="<?php echo base_url(); ?>lib/admin/jscolor.js"></script>
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a class="logo">
					<span class="logo-mini"><b>ALTE</b></span>
					<span class="logo-lg"><b>AdminLTE</b></span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<?php $res=$this->db->query('SELECT id FROM messages WHERE status="unread" order by id desc limit 1')->result(); ?>
						<input id="msglastId" type="hidden" value="<?php echo $res[0]->id; ?>"/>
						<input id="site_url" type="hidden" value="<?php echo base_url(); ?>"/>
						<ul class="nav navbar-nav">
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <i class="fa fa-envelope-o"></i>
								  <span class="label label-success msgCount"></span>
								</a>
								<ul class="dropdown-menu">
								  <li>
									<ul class="menu">
									  <li>
										<a href="#">
										  <div class="pull-left">
											<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										  </div>
										  <h4>
											Support Team
											<small><i class="fa fa-clock-o"></i> 5 mins</small>
										  </h4>
										  <p>Why not buy a new awesome theme?</p>
										</a>
									  </li>
									</ul>
								  </li>
								  <li class="footer"><a href="#">See All Messages</a></li>
								</ul>
							</li>
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url(); ?>lib/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
									<span class="hidden-xs">Admin</span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?php echo base_url(); ?>lib/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										<p>Admin</p>
									</li>
									<li class="user-footer">
										<div class="pull-right">
											<a href="<?php echo base_url(); ?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
									</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="header" style="color:#fff">NAVIGATION</li>
					<li class="active treeview">
						<a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>
					<li class="treeview <?php if(isset($title) && ($title == 'All User' || $title == 'Add User')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>USERS</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All User')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/adduser/allusers"><i class="fa fa-circle-o"></i> ALL USERS</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add User')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/adduser"><i class="fa fa-edit"></i></i> ADD USER</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && ($title == 'All Vendor' || $title == 'Add Vendor')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>VENDOR</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Vendor')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/addvendor/allvendor"><i class="fa fa-edit"></i></i> ALL VENDOR</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add Vendor')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/addvendor"><i class="fa fa-circle-o"></i> ADD VENDOR</a></li>
						</ul>
					</li>
					<li class="treeview  <?php if(isset($title) && ($title == 'All Brand' || $title == 'Add Brand')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>BRAND</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Brand')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand"><i class="fa fa-edit"></i></i> ALL BRAND</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add Brand')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/add"><i class="fa fa-circle-o"></i> ADD BRAND</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && ($title == 'All Modal' || $title == 'Add Modal')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>MODAL</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Modal')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/modal"><i class="fa fa-edit"></i></i> ALL MODAL</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add Modal')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/addmodal"><i class="fa fa-circle-o"></i> ADD MODAL</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && ($title == 'All Issue' || $title == 'Add Issue')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>ISSUE</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Issue')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/issue"><i class="fa fa-edit"></i></i> ALL ISSUE</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add Issue')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/addissue"><i class="fa fa-circle-o"></i> ADD ISSUE</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && $title == 'ALL ORDERS') { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>ORDER</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && $title == 'ALL ORDERS') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/order"><i class="fa fa-edit"></i></i> ALL ORDERS</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && $title == 'ALL OTHER ORDERS') { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>OTHER ORDER</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && $title == 'ALL OTHER ORDERS') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/order/otherOrder');?>"><i class="fa fa-edit"></i></i> ALL ORDERS</a></li>
						</ul>
					</li>
					<li class="treeview <?php if(isset($title) && $title == 'Sell Request') { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>Sell Request</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && $title == 'Sell Request') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/sell"><i class="fa fa-edit"></i></i> Sell Request</a></li>
						</ul>
					</li>
					<li class="treeview  <?php if(isset($title) && ($title == 'All Service' || $title == 'Add Service')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>Service</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Service')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/allService"><i class="fa fa-edit"></i></i> ALL Service</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add Service')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/brand/addService"><i class="fa fa-circle-o"></i> ADD Service</a></li>
						</ul>
					</li>
					<li class="treeview  <?php if(isset($title) && ($title == 'All Pages' || $title == 'Add Page')) { echo 'active'; } ?>">
						<a href="#">
						<i class="fa fa-dashboard"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if(isset($title) && ($title == 'All Pages')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/page/allpage"><i class="fa fa-edit"></i></i> ALL Pages</a></li>
							<li class="<?php if(isset($title) && ($title == 'Add page')) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/page/addpage"><i class="fa fa-circle-o"></i> ADD Page</a></li>
						</ul>
					</li>
				</ul>
			</section>
		</aside>