<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(isset($title)){ echo $title;} ?></title>
<!-- Core CSS - Include with every page -->
<link href="<?php echo base_url();?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/main-style.css" rel="stylesheet" />
<!-- Page-Level CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/kendo.common-material.min.css" />
<link rel="styleshee" type="text/css" href="<?php echo base_url();?>assets/kendo.material.min.css" />
<link href="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/plugins/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/kendo.all.min.js"></script>




  
<style>
.error{
	color:red;
}
</style>
</head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
				<!-- navbar-header -->
				<div class="navbar-header">
					 <a class="navbar-brand col-lg-12 col-lg-push-7" href="<?php echo base_url('recruiter/dashboard');?>" style="margin-left:0px;    margin-top: -10px;">
						<img src="<?php echo base_url();?>assets/img/logo.png" alt="" />
					</a>
				</div>
				<!-- end navbar-header -->
				<div class="sidebar-search col-lg-4 col-lg-push-2" style="margin-top:0px;">
							<!-- search section-->
							<div class="input-group custom-search-form ">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
					<!--end search section-->
				</div>
				<!-- navbar-top-links -->
				<ul class="nav navbar-top-links navbar-right" style="margin-top:-10px;">
					<!-- main dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
						</a>
						<!-- dropdown-messages -->
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<a href="#">
									<div>
										<strong><span class=" label label-danger">Andrew Smith</span></strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong><span class=" label label-info">Jonney Depp</span></strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong><span class=" label label-success">Jonney Depp</span></strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>Read All Messages</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- end dropdown-messages -->
					</li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
						</a>
						<!-- dropdown tasks -->
						<ul class="dropdown-menu dropdown-tasks">
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 1</strong>
											<span class="pull-right text-muted">40% Complete</span>
										</p>
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												<span class="sr-only">40% Complete (success)</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 2</strong>
											<span class="pull-right text-muted">20% Complete</span>
										</p>
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 3</strong>
											<span class="pull-right text-muted">60% Complete</span>
										</p>
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												<span class="sr-only">60% Complete (warning)</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 4</strong>
											<span class="pull-right text-muted">80% Complete</span>
										</p>
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												<span class="sr-only">80% Complete (danger)</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>See All Tasks</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- end dropdown-tasks -->
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
						</a>
						<!-- dropdown alerts-->
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="#">
									<div>
										<i class="fa fa-comment fa-fw"></i>New Comment
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-twitter fa-fw"></i>3 New Followers
										<span class="pull-right text-muted small">12 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-envelope fa-fw"></i>Message Sent
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-tasks fa-fw"></i>New Task
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-upload fa-fw"></i>Server Rebooted
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- end dropdown-alerts -->
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-3x"></i>
						</a>
						<!-- dropdown user-->
						<ul class="dropdown-menu dropdown-user">
						
							<li><a href="#"><i class="fa fa-user fa-fw"></i>
							<?php   if($this->session->userdata('sessionName') != '')
							{  
							$usertype = $this->session->userdata('sessionName')->user_type;
							if($usertype == '2')
							{ 
								$sessionLogin = $this->session->userdata('sessionName'); 
								$username = $sessionLogin->username; 
								$id= $sessionLogin->user_id;
							} ?> 
							<?php echo $username; ?></a>
							<?php } ?>
							</li>
							
							<li><a href="<?php echo base_url('recruiter/changePassword');?>"><i class="fa fa-gear fa-fw"></i>Change Password</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url("martrick/Logout");?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
						</ul>
						<!-- end dropdown-user -->
					</li>
					<!-- end main dropdown -->
				</ul>
				<!-- end navbar-top-links -->
			</nav>
			<!-- end navbar top -->
        <!-- navbar side -->
		<!--  page-wrapper -->
	<div id="page-wrapper">
	<?php   if($this->session->userdata('sessionName') != '')
							{  
							$usertype = $this->session->userdata('sessionName')->user_type;
							if($usertype == '2')
							{ ?>
		<section id="menu">
			<div class="container" style="width:100%;">
				<div class="menu-area col-lg-12 " style="margin-top:18px;">
					<!-- Navbar -->
					<div class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>          
						</div>
						<div class="navbar-collapse collapse" style="background-color:#000;">
						
							<ul class="nav navbar-nav col-md-12 " style="padding-left:47px;">
								<li><a href="<?php echo base_url('martrick/dashboard');?>" style="color:#fff;">Home</a></li>
								<li><a href="<?php echo base_url('martrick/recruiterList');?>" style="color:#fff;">Manage Recruiters </a></li>
								<li><a href="<?php echo base_url('martrick/editProfile');?>/?zxcvbnm=<?php echo base64_encode($id); ?>" style="color:#fff;">Manage Profile</a></li>
								<li><a href="<?php echo base_url('martrick/candidateList');?>" style="color:#fff;">Manage Candidates</a></li>
							</ul>
						</div>
					</div>       
				</div>
			</div>
		</section>
							<?php }}?>