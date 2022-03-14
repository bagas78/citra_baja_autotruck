<?php $level = $this->session->userdata('level'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CBA | <?php echo $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/gambar/icon.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/font-awesome/css/font-awesome.min.css"> 
  <!-- Ionicons -->  
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/Ionicons/css/ionicons.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/skins/skin-black.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Data Table -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/select2/dist/css/select2.min.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>adminLTE/bower_components/jquery/dist/jquery.min.js"></script>


<style type="text/css">
  .pt{
    color: white; 
    font-size: 18px; 
    padding: 15px 15px; 
    float: left; 
    margin-left: 35%;
  }

  @media (max-width: 767px) {
    .pt{
      color: white; 
      font-size: 18px; 
      padding: 15px 15px; 
      float: left; 
      margin-left: 0;
    }
  }

  /*timer*/
  .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }

</style>

</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper"> 

  <header class="main-header">
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <span class="pt"><i class="fa fa-truck"></i>&#160;&#160; PT.&#160; CITRA&#160; BAJA&#160; AUTOTRUCK</span>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if (@$this->session->userdata('foto') == ''): ?>
                <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="user-image" alt="User Image">
              <?php else: ?>
                <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="user-image" alt="User Image">
              <?php endif ?>

              <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <?php if (@$this->session->userdata('foto') == ''): ?>
                  <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="img-circle" alt="User Image">
                <?php else: ?>
                  <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">
                <?php endif ?>

                <p>
                  <span id="date"></span>
                  <small id="clock" style="color: #23427F; background-color: white; margin-top: 4%;"></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url() ?>profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="top: -40px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

          <?php if ($this->session->userdata('foto') == ''): ?>
            <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="img-circle" alt="User Image"  style="height: 45px;">
          <?php else: ?>
            <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image"  style="height: 45px;">
          <?php endif ?>
          
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('name'); ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

           <li <?php echo @$dashboard; ?>>
            <a href="<?php echo base_url() ?>dashboard">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>

          <?php if ($level == 1): ?>
  
            <li <?php echo @$user; ?>>
              <a href="<?php echo base_url() ?>user">
                <i class="fa fa-plus"></i> <span>User Control</span>
              </a>
            </li>
  
          <?php endif ?>
          
          <li <?php echo @$profile; ?>>
            <a href="<?php echo base_url() ?>profile">
              <i class="fa fa-user-circle-o"></i> <span>Profile</span>
            </a>
          </li>

          <?php if ($level > 1): ?>
          
          <li <?php echo @$karyawan; ?>>
            <a href="<?php echo base_url() ?>karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>

          <?php endif ?>

          <?php if ($level == 2): ?>

          <li class="treeview <?php echo @$ahp; ?>" style="height: auto;">
            <a href="#">
              <i class="fa fa-th-large"></i> <span>Penilaian AHP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url("ahp/kriteria") ?>"><i class="fa fa-circle-o"></i> Kriteria</a></li>
              <li><a href="<?php echo base_url("ahp/sub") ?>"><i class="fa fa-circle-o"></i> Sub Kriteria</a></li> 
              <li><a href="<?php echo base_url("penilaian") ?>"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            </ul>
          </li>

          <!-- <li <?php echo @$rangking; ?>>
            <a href="<?php echo base_url() ?>rangking">
              <i class="fa fa-star"></i> <span>Hasil Rangking AHP</span>
            </a>
          </li> -->

          <li class="treeview <?php echo @$pm; ?>" style="height: auto;">
            <a href="#">
              <i class="fa fa-th-large"></i> <span>Penilaian PM</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url("pm/aspek") ?>"><i class="fa fa-circle-o"></i> Aspek</a></li>
              <li><a href="<?php echo base_url("pm/faktor") ?>"><i class="fa fa-circle-o"></i> Faktor</a></li> 
              <li><a href="<?php echo base_url("pm/penilaian") ?>"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            </ul>
          </li>

          <?php endif ?>

          <?php if ($level > 1): ?>

          <li <?php echo @$rangking; ?>>
            <a href="<?php echo base_url('pm/hasil_rangking') ?>">
              <i class="fa fa-trophy"></i> <span>Hasil Rangking</span>
            </a>
          </li>

        <?php endif ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    
        
  
  