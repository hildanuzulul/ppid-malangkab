<body class="berita-page">

	<main class="main">
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Berita</li>
					</ol>
				</nav>
				<h1>Berita Seputar PPID</h1>
			</div>
		</div>

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<div class="container-fluid detail-container">
							<!-- <div class="container detail-container"> -->
							<div class="artikel-detail">
								<!-- Judul Artikel -->
								<h1><?= isset($berita['judul_artikel']) ? $berita['judul_artikel'] : '(Tanpa Judul)' ?></h1>

								<!-- Gambar Artikel -->
								<div class="gambar-detail" style="text-align: center;">
									<img src="<?= $berita['gambar'] ?>" alt="gambar artikel" style="max-width: 60%; height: auto;">
								</div>

								<!-- Informasi Artikel -->
								<div class="meta-info center">
									<i class="bi bi-file-earmark-fill d-block mb-1 text-danger"></i>
									<div>
										Dipost Oleh <span class="text-accent">Admin</span> |
										Pada <span class="text-accent">
											<?= date('d-m-Y H:i:s', strtotime($berita['created_at'])) ?>
										</span>
									</div>
								</div>

								<!-- Konten Artikel -->
								<div class="konten-detail">
									<?= isset($berita['konten_artikel']) ? $berita['konten_artikel'] : '(Konten tidak tersedia)' ?>
								</div>

							</div>

							<div style="text-align: left; margin-top: 20px;">
								<a href="<?= base_url('berita') ?>" class="back"><i class="fas fa-angle-left"></i>
									Kembali ke Berita
								</a>
							</div>

						</div>

					</div>
					<div class=" col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>

	<!-- Bootstrap JavaScript -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>