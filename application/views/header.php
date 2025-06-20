<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>PPID Kabupaten Malang</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<!-- Favicons -->
	<link href="<?= base_url('assets/img/logo.png'); ?>" rel="icon">
	<link href="<?= base_url('assets/img/logo.png'); ?>" rel="apple-touch-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"><!--icon for card beranda -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"><!--icon for card beranda -->
	<link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">

	<!-- Main CSS File -->
	<link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">

</head>

<body class="index-page">

	<header id="header" class="header sticky-top">
		<!-- <div class="topbar d-flex align-items-center dark-background"> -->
		<div class="topbar d-flex align-items-center dark-background py-4">
			<div class="container d-flex justify-content-center justify-content-md-between">
				<!-- <div class="social-links d-none d-md-flex align-items-center"> -->
				<div class="social-links d-flex align-items-center">

					<a href="https://www.facebook.com/Diskominfo.Malangkab/" class="facebook" target="_blank" rel="noopener noreferrer" title="Facebook">
						<i class="bi bi-facebook"></i>
					</a>
					<a href="https://x.com/kominfokabmlg" class="twitter" target="_blank" rel="noopener noreferrer" title="Twitter">
						<i class="bi bi-twitter-x"></i>
					</a>
					<a href="https://www.instagram.com/kominfokabmlg" class="instagram" target="_blank" rel="noopener noreferrer" title="Instagram">
						<i class="bi bi-instagram"></i>
					</a>
					<a href="https://www.youtube.com/channel/UCPo6b6DOnJvve7ORpDUbkXA" class="youtube" target="_blank" rel="noopener noreferrer" title="YouTube">
						<i class="bi bi-youtube"></i>
					</a>
				</div>

				<div class="text-right">
					<a href="<?= base_url('permintaan_data'); ?>" class="btn btn-sm btn-danger">Permintaan Data</a>
					<?php if ($this->session->userdata('nama_user')) : ?>
						<div class="dropdown">
							<div class="text-light fs-6 pt-1 ms-3" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
								<?= htmlspecialchars($user['nama_user']); ?>
							</div>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<li><a class="dropdown-item" href="profile">Profile</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item text-danger" href="login/logout">Logout</a></li>
							</ul>
						</div>
					<?php else : ?>
						<a href="<?= base_url('registrasi'); ?>" class="btn btn-sm btn-danger">Register</a>
						<a href="<?= base_url('login'); ?>" class="btn btn-sm btn-danger">Login</a>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- End Top Bar -->

		<div class="branding">

			<div class="container position-relative d-flex align-items-center justify-content-between">
				<a href="#" class="logo d-flex align-items-center">
					<img src="<?= base_url('assets/img/logo.png'); ?>" alt="PPID Kab. Malang">
					<h1 class="sitename">
						<strong style="color: #E96B56;">PPID</strong><br>
						<span style="font-size: 16px;">Kabupaten <span style="color: #E96B56;">Malang</span></span>
					</h1>
				</a>

				<nav id="navmenu" class="navmenu">
					<ul>
						<li><a href="<?= base_url('beranda'); ?>" class="active">Beranda</a></li>
						<li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?= base_url('profil'); ?>">Profil PPID Kabupaten Malang</a></li>
								<li><a href="<?= base_url('visi_misi'); ?>">Visi Misi PPID Kabupaten Malang</a></li>
								<li><a href="<?= base_url('struktur_organisasi'); ?>">Struktur Organisasi</a></li>
								<li><a href="<?= base_url('dasar_hukum'); ?>">Dasar Hukum</a></li>
								<li><a href="<?= base_url('maklumat_pelayanan'); ?>">Maklumat Pelayanan</a></li>
								<li><a href="<?= base_url('tugas_wewenang'); ?>">Tugas Wewenang</a></li>
								<li><a href="<?= base_url('laporan_lhkpn'); ?>">LHKPN</a></li>
								<li><a href="<?= base_url('sop_ppid'); ?>">SOP</a></li>
							</ul>
						<li class="dropdown"><a href="#"><span>Informasi Publik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?= base_url('informasi_serta_merta'); ?>">Informasi Serta Merta</a></li>
								<li><a href="<?= base_url('informasi_berkala'); ?>">Informasi Berkala</a></li>
								<li><a href="<?= base_url('informasi_setiap_saat'); ?>">Informasi Setiap Saat</a></li>
								<li><a href="<?= base_url('informasi_dikecualikan'); ?>">Informasi Dikecualikan</a></li>
							</ul>
						<li><a href="<?= base_url('situs_pd'); ?>">Situs PD</a></li>
						<li><a href="<?= base_url('berita'); ?>">Berita</a></li>
						<li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?= base_url('mekanisme_permohonan_informasi'); ?>">Mekanisme Permohonan Informasi</a></li>
								<li><a href="<?= base_url('permohonan_keberatan'); ?>">Mekanisme Permohonan Keberatan</a></li>
								<li><a href="<?= base_url('interaksi_masyarakat'); ?>">Interaksi Masyarakat</a></li>
								<li><a href="<?= base_url('koordinasi_rutin'); ?>">Koordinasi Rutin</a></li>
								<li><a href="<?= base_url('sengketa'); ?>">Mekanisme Permohonan Penyelesaian Sengketa...</a></li>
								<li><a href="<?= base_url('permintaan_data'); ?>">Permohonan Informasi</a></li>
								<li><a href="<?= base_url('login'); ?>">Permohonan Keberatan Informasi</a></li>
							</ul>
						<li><a href="<?= base_url('unduhan'); ?>">Unduhan</a></li>
						<li><a href="<?= base_url('contact'); ?>">Kontak Kami</a></li>
					</ul>
					<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
				</nav>

			</div>

		</div>

	</header>
