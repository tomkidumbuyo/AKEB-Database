<!doctype html>
<html lang="en" dir="ltr" ng-app="myApp">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>AKEB database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <!--<script src="<?php echo base_url()?>static/js/require.min.js"></script>-->
    <script>
      //requirejs.config({
          //baseUrl: '<?php echo base_url()?>'
     // });
	base_url = '<?php echo base_url()?>'
	static_url = '<?php echo base_url()?>/static'
    </script>
    
    
	<script src="<?php echo base_url()?>static/js/vendors/jquery-3.2.1.min.js"></script>
    
    
    <!-- Dashboard Core -->
    <link href="<?php echo base_url()?>/static/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>/static/js/dashboard.js"></script>
    
    <script src="<?php echo base_url()?>static/js/core.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/selectize.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery-jvectormap-de-merc.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/jquery-jvectormap-world-mill.js"></script>
    <script src="<?php echo base_url()?>static/js/vendors/circle-progress.min.js"></script>
    
    
	  
     <script src="<?php echo base_url()?>/static/plugins/moment-develop/min/moment.min.js"></script>
	  
	 <!-- ANGULAR APP --> 
	 <script src="<?php echo base_url()?>static/js/angular/angular.min.js"></script>
	 <script src="<?php echo base_url()?>static/js/angular/angular-route.min.js"></script>
	 <script src="<?php echo base_url()?>static/js/angular/angular-sanitize.min.js"></script>
	 <script src="<?php echo base_url()?>static/js/angular/angular-resource.min.js"></script>
	  
	 <script src="<?php echo base_url()?>static/js/angular/app.js"></script>
	 <script src="<?php echo base_url()?>static/js/angular/controllers.js"></script>
     	  
	  
	 <!-- ANGULAR CONTROLLERS -->  
	  <script src="<?php echo base_url()?>static/js/controllers/header.js"></script>
	  <script src="<?php echo base_url()?>static/js/controllers/admin/user.js"></script>
	  <script src="<?php echo base_url()?>static/js/controllers/admin/inventory.js"></script>
	  <script src="<?php echo base_url()?>static/js/controllers/admin/student.js"></script>
      <script src="<?php echo base_url()?>static/js/controllers/admin/promo.js"></script>
      <script src="<?php echo base_url()?>static/js/controllers/admin/subdealer.js"></script>
	  
	  
    
    
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url()?>/static/plugins/charts-c3/plugin.css" rel="stylesheet" />    
    <script src="<?php echo base_url()?>static/plugins/charts-c3/js/d3.v3.min.js"></script>
    <script src="<?php echo base_url()?>static/plugins/charts-c3/js/c3.min.js"></script>
        
    <!-- Google Maps Plugin -->
    <link href="<?php echo base_url()?>/static/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>/static/plugins/maps-google/plugin.js"></script>
    
    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url()?>static/plugins/input-mask/js/jquery.mask.min.js"></script>
    
    <!-- Datetimepicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/plugins/angular-datepicker-master/dist/angular-datepicker.min.css">
	<script src="<?php echo base_url()?>static/plugins/angular-datepicker-master/dist/angular-datepicker.min.js"></script>
    
    
  </head>
  

<body class="fixed-header">
