<body class="struktur_organisasi-page">

	<main class="main">
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil</li>
						<li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
					</ol>
				</nav>
				<h1>Struktur Organisasi</h1>
			</div>
		</div>

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<img src="<?= base_url('assets/img/ppidkominfo-baganppid.jpg') ?>" width="100%" alt="Struktur Organisasi">
					</div>
					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>

	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
