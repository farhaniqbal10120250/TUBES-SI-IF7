<?php 

require_once '_config/config.php';

if(!isset($_SESSION['admin'])) {
	header("Location: auth/login.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Aplikasi - Rumah Sakit</title>

	<!-- Bootstrap core CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Custom styles for this template -->
	<link href="<?= base_url('_assets/css/simple-sidebar.css') ?>" rel="stylesheet">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('_assets/libs/datatables/datatables.min.css'); ?>">

</head>
<body>

<!-- Sidebar -->
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Rumah Sakit </div>
      <div class="list-group list-group-flush">
        <a href="<?= base_url('dashboard/') ?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?= base_url('pasien/') ?>" class="list-group-item list-group-item-action bg-light">Data Pasien</a>
        <a href="<?= base_url('dokter/') ?>" class="list-group-item list-group-item-action bg-light">Data Dokter</a>
        <a href="<?= base_url('poliklinik/') ?>" class="list-group-item list-group-item-action bg-light">Data Poliklinik</a>
        <a href="<?= base_url('obat/') ?>" class="list-group-item list-group-item-action bg-light">Data Obat - Obatan</a>
        <a href="<?= base_url('rekam-medis/') ?>" class="list-group-item list-group-item-action bg-light">Rekam Medis</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <div id="page-content-wrapper">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars"></i></button>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
			    <li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      	<i class="fa fa-user-circle"></i> <?= ucwords($_SESSION['admin']); ?>
			      </a>
			      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			        <a class="dropdown-item" href="<?= base_url('auth/logout.php'); ?>" onclick="return confirm('Apakah Ingin Logout ?')">Logout</a>
			      </div>
			    </li>
			  </ul>
			</div>
		</nav>
	<!-- end sidebar -->
