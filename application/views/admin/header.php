<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<!-- Top Navigation -->
		<nav class="navbar navbar-dark bg-dark-red fixed-top">
			<div class="container-fluid">
				<button class="navbar-toggler sidebar-toggler" type="button">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand ms-3" href="#">Halaman Admin</a>
			</div>
		</nav>

		<!-- Sidebar -->