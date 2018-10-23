
  <?php
  
//$tanggalsekarang = date("d-m-Y");
     if(!isset($username)|| $username=="" )
   {
    ?>
    <script>
   //alert('Anda belum login');
    window.location.href="<?php echo base_url().'admin/c_login';?>";
    </script>
   <?php  
   }

//var_dump($username);
//die();
   ?>
   <!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tescode Erporate | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/bootstrap/css/bootstrap.min.css';?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css';?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/timepicker/bootstrap-timepicker.min.css';?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/select2/select2.min.css';?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/dist/css/AdminLTE.min.css';?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/dist/css/skins/_all-skins.min.css';?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/iCheck/flat/blue.css';?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/datepicker/datepicker3.css';?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin/plugins/daterangepicker/daterangepicker.css';?>">
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Tescode Erporate</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/admin/dist/img/inven.png';?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $username;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/admin/dist/img/inven.png';?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $username;?>
                  <small><?php echo date("d-m-Y");?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="<?php echo base_url().'admin/c_login/ubahpassword';?>" class="btn btn-default btn-flat">Ubah Password admin</a>
                </div>-->
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/c_login/logout';?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
