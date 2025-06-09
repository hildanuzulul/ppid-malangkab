<body class="detail_koordinasi_rutin-page">
	<main class="main">
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Koordinasi Rutin</li>
					</ol>
				</nav>
				<h1>Koordinasi Rutin Seputar PPID</h1>
			</div>
		</div>

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<div class="container-fluid detail-container">
							<div class="artikel-detail">
								<!-- Judul Artikel -->
								<h1><?= isset($koordinasi_rutin['judul_artikel']) ? $koordinasi_rutin['judul_artikel'] : '(Tanpa Judul)' ?></h1>

								<!-- Gambar Artikel -->
								<div class="gambar-detail" style="text-align: center;">
									<img src="<?= $koordinasi_rutin['gambar'] ?>" alt="gambar artikel" style="max-width: 60%; height: auto;">
								</div>

								<!-- Informasi Artikel -->
								<div class="meta-info center mt-2 mb-3">
									<i class="bi bi-file-earmark-fill d-block mb-1 text-danger"></i>
									<div>
										Dipost Oleh <span class="text-accent">Admin</span> |
										Pada <span class="text-accent">
											<?= date('d-m-Y H:i:s', strtotime($koordinasi_rutin['created_at'])) ?>
										</span>
									</div>
								</div>

								<!-- Konten Artikel -->
								<div class="konten-detail">
									<?= isset($koordinasi_rutin['konten_artikel']) ? $koordinasi_rutin['konten_artikel'] : '(Konten tidak tersedia)' ?>
								</div>
							</div>

							<!-- Tombol Kembali -->
							<div style="text-align: left; margin-top: 20px;">
								<a href="<?= base_url('koordinasi_rutin') ?>" class="back"><i class="fas fa-angle-left"></i>
									Kembali ke Koordinasi Rutin
								</a>
							</div>
						</div>
					</div>

					<!-- Sidebar -->
					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>
</body>
