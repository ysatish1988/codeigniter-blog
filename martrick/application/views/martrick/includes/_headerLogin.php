<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(isset($title)){ echo $title; }?> </title>
<!-- Core CSS - Include with every page -->
<link href="<?php echo base_url();?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/main-style.css" rel="stylesheet" />
<style>
.form-control{
height:50px;
}
.forgot:hover{
color:red;
}
.error{
	color:red;
}
</style>
</head>
<body class="body-Login-back">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="<?php echo base_url();?>assets/img/logo.png" width="300px;" height="100px;" alt=""/>
             </div>
			<div class="container">