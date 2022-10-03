<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trazabilidad</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="<?php echo base_url()?>dist/js/plotly.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script> -->
  <!-- ChartJS -->
  <script src="<?php echo base_url() ?>dist/plugins/chart.js/Chart.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- jQuery -->
 <script src="<?php echo base_url() ?>dist/plugins/jquery/jquery.min.js"></script> 
  <!-- css template -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/template.css"> 
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/fuente.css"> 
 <!-- <script src="<?php echo base_url() ?>dist/plugins/jquery/jquery-3.5.1.min.js"></script>  -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <!-- <link href="<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Salir Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
          <i class="fas fa-list"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Mi cuenta</span>
          <div class="dropdown-divider"></div>
          <a  class="dropdown-item">
            <i data-toggle="tooltip" data-placement="left" title="Configuración" class="fas fa-envelope mr-2"></i> <?php echo $this->session->userdata('correo')?>
           
          </a>
          <div class="dropdown-divider"></div>
          <button data-toggle="modal" data-target="#cambiar" type="button"   class="dropdown-item">
            <span class="fas fa-key"></span> Cambiar Contraseña 
           
          </button>
         
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>Lo" class="dropdown-item">
            <i class="fas fa-times mr-2"></i> Cerrar Sesión
          </a>
          <div class="dropdown-divider"></div>
          <a  class="dropdown-item dropdown-footer">Buen dia </a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->





 

    