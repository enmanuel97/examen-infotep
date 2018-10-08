<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->title?></title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/sweetalert2/sweetalert.css">
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/proccess.js"></script>
    <script src="<?php echo base_url()?>assets/js/dom.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/sweetalert2/sweetalert.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard')?>">Examen</a>
    <!--<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">-->
    <!--<i class="fas fa-bars"></i>-->
    <!--</button>-->
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> <?php echo $this->email?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('logout')?>">Cerrar Sesi&oacute;n</a>
            </div>
        </li>
    </ul>
</nav>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <?php if ($this->session->userdata('typeId') == 1):?>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('dashboard')?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php endif;?>
        <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-fw fa-table"></i>
                <span>Tickets</span>
            </a>
            <div class="dropdown-menu show" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url('turns/turns_admin')?>">Turnos en cola</a>
                <a class="dropdown-item" href="<?php echo base_url('turns/turns_admin_proccess')?>">Turnos en proceso</a>
            </div>
        </li>
        <?php if ($this->session->userdata('typeId') == 1):?>
        <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-fw fa-table"></i>
                <span>Reportes</span>
            </a>
            <div class="dropdown-menu show" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url('reports/turno_en_cola')?>">Turnos en cola</a>
                <a class="dropdown-item" href="<?php echo base_url('reports/turno_atendidos')?>">Turnos atendidos</a>
                <a class="dropdown-item" href="<?php echo base_url('reports/turno_atendidos_por_servicio')?>">Turnos A. por servicio</a>
                <a class="dropdown-item" href="<?php echo base_url('reports/turno_atendidos_por_ejecutivo')?>">Turnos A. por ejecutivo</a>
                <div class="dropdown-divider"></div>
            </div>
        </li>
        <?php endif;?>
    </ul>