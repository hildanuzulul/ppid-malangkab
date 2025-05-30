<body class="index-page">

	<main class="main">

		<!-- Hero Section -->
		<section id="hero" class="hero section">

			<div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

				<!-- Slide 1 -->
				<div class="carousel-item active">
					<img src="assets/img/hero-carousel/hero-carousel-4.webp" alt="" class="slide-image">
					<div class="carousel-container">
						<div class="row">
							<div class="col-md-5 d-none d-md-block">
								<img src="assets/img/logo.png" alt="" class="logo-image animated bounceInDown delay1">
							</div>
							<div class="col-md-7">
								<h2>Layanan Online Bagi Pemohon <span style="color:#B22222">Informasi Publik</span></h2>
								<p class="d-none d-md-block">Sebagai salah satu wujud pelaksanaan keterbukaan informasi publik di Kabupaten Malang</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="carousel-item">
					<img src="assets/img/hero-carousel/hero-carousel-4.webp" alt="" class="slide-image">
					<div class="carousel-container">
						<div class="row">
							<div class="col-md-8">
								<h2>Permohonan <span style="color:#B22222">Informasi</span></h2>
								<p class="d-none d-md-block">Anda dapat mengajukan permohonan informasi</p>
								<p class="d-none d-md-block"> dimanapun dan kapanpun</p>
								<a href="http://ppid.malangkab.go.id/ppid/permohonan/create" class="btn-get-started d-none d-md-inline-block">
									<i class="bi bi-link-45deg"></i> Detail
								</a>
							</div>
							<div class="col-md-4 d-none d-md-block">
								<img src="assets/img/logo2.webp" alt="" class="logo-image animated bounceInDown delay1">
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 3 -->
				<div class="carousel-item">
					<img src="assets/img/hero-carousel/hero-carousel-4.webp" alt="" class="slide-image">
					<div class="carousel-container">
						<div class="row">
							<div class="col-md-5 d-none d-md-block">
								<img src="assets/img/logo.png" alt="" class="logo-image animated bounceInDown delay1">
							</div>
							<div class="col-md-7">
								<h2>Permohonan Keberatan Informasi</h2>
								<p class="d-none d-md-block">Anda dapat mengajukan permohonan informasi</p>
								<p class="d-none d-md-block"> dimanapun dan kapanpun</p>
								<a href="http://ppid.malangkab.go.id/ppid/keberatan/create" class="btn-get-started d-none d-md-inline-block">
									<i class="bi bi-link-45deg"></i> Detail
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 4 -->
				<div class="carousel-item">
					<img src="assets/img/hero-carousel/hero-carousel-4.webp" alt="" class="slide-image">
					<div class="carousel-container">
						<div class="row">
							<div class="col-md-8">
								<h2>Mekanisme Permohonan Informasi</h2>
								<p class="d-none d-md-block">Tata cara permohonan informasi</p>
								<a href="http://ppid.malangkab.go.id/ppid/permohonan/create" class="btn-get-started d-none d-md-inline-block">
									<i class="bi bi-link-45deg"></i> Detail
								</a>
							</div>
							<div class="col-md-4 d-none d-md-block">
								<img src="assets/img/logo3.webp" alt="" class="logo-image animated bounceInDown delay1">
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 5 -->
				<div class="carousel-item">
					<img src="assets/img/hero-carousel/hero-carousel-4.webp" alt="" class="slide-image">
					<div class="carousel-container">
						<div class="row">
							<div class="col-md-5 d-none d-md-block">
								<img src="assets/img/logo3.webp" alt="" class="logo-image animated bounceInDown delay1">
							</div>
							<div class="col-md-7">
								<h2>Daftar Informasi Publik</h2>
								<p class="d-none d-md-block">List informasi publik sebagai transparansi pemerintah</p>
								<p class="d-none d-md-block"> terhadap masyarakat</p>
								<a href="http://ppid.malangkab.go.id/ppid/keberatan/create" class="btn-get-started d-none d-md-inline-block">
									<i class="bi bi-link-45deg"></i> Detail
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Navigation Controls -->
				<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
				</a>

				<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</section><!-- /Hero Section -->

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<div class="container-fluid berita-container">
							<h2 class="section-title">Berita <strong>Terbaru</strong></h2>
							<?php foreach ($berita as $item): ?>
								<div class="berita-item">
									<div class="gambar">
										<img src="<?= $item['gambar'] ?>" alt="gambar berita">
									</div>

									<div class="konten">
										<h3>
											<a href="<?= base_url('berita/detail/' . $item['id_artikel']) ?>">
												<?= isset($item['judul_artikel']) ? $item['judul_artikel'] : '(Tanpa Judul)' ?>
											</a>
										</h3>

										<div class="meta-info">
											<i class="bi bi-file-earmark-fill"></i>
											<span>Dipost Oleh <span class="text-accent">Admin</span></span>
											<span class="meta-separator">Pada</span>
											<span class="text-accent">
												<?= isset($item['created_at']) ? date('d-m-Y H:i:s', strtotime($item['created_at'])) : '(Tanggal tidak tersedia)' ?>
											</span>
										</div>
									</div>

									<div class="full-content">
										<?php
										$content = strip_tags($item['konten_artikel']);
										$short = strlen($content) > 300 ? substr($content, 0, 275) . '...' : $content;
										?>
										<p><?= $short ?></p>
										<a class="read-more" href="<?= base_url('berita/detail/' . $item['id_artikel']) ?>">Read More <i class="fas fa-angle-right"></i></a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

					</div>
					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>

		<!-- <section id="content"> -->
		<div class="container beranda" data-aos="fade-up" data-aos-delay="100">
			<h2 class="text-left mb-3">INFORMASI PUBLIK</h2>
			<div class="row justify-content-start">

				<!-- Dokumen -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-primary">
								<i class="fa-solid fa-book"></i>
							</div>
							<h3 class="mt-2">10,116</h3>
							<p class="text-danger fw-bold">Dokumen</p>
						</div>
					</div>
				</div>

				<!-- Informasi -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-success">
								<i class="fa-solid fa-info-circle"></i>
							</div>
							<h3 class="mt-2">200</h3>
							<p class="text-danger fw-bold">Informasi</p>
						</div>
					</div>
				</div>

				<!-- Artikel -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-orange">
								<i class="fa-solid fa-file-alt"></i>
							</div>
							<h3 class="mt-2">33,287</h3>
							<p class="text-danger fw-bold">Artikel</p>
						</div>
					</div>
				</div>

				<!-- Galeri -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-warning">
								<i class="fa-solid fa-image"></i>
							</div>
							<h3 class="mt-2">13,757</h3>
							<p class="text-danger fw-bold">Galeri</p>
						</div>
					</div>
				</div>

			</div>

			<!-- Layanan Permohonan Informasi PPID -->
			<h2 class="text-left mb-3 mt-4">LAYANAN PERMOHONAN INFORMASI PPID</h2>
			<div class="row justify-content-start">

				<!-- Permohonan Informasi -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-primary">
								<i class="fa-solid fa-book"></i>
							</div>
							<h3 class="mt-2">2</h3>
							<p class="text-danger fw-bold">Permohonan Informasi</p>
						</div>
					</div>
				</div>

				<!-- Pengajuan Baru -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-success">
								<i class="fa-solid fa-pen-to-square"></i>
							</div>
							<h3 class="mt-2">2</h3>
							<p class="text-danger fw-bold">Pengajuan Baru</p>
						</div>
					</div>
				</div>

				<!-- Diproses -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-secondary">
								<i class="fa-solid fa-gears"></i>
							</div>
							<h3 class="mt-2">0</h3>
							<p class="text-danger fw-bold">Diproses</p>
						</div>
					</div>
				</div>

				<!-- Disetujui -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-danger">
								<i class="fa-solid fa-square-check"></i>
							</div>
							<h3 class="mt-2">0</h3>
							<p class="text-danger fw-bold">Disetujui</p>
						</div>
					</div>
				</div>

				<!-- Ditolak -->
				<div class="col-md-3 col-sm-6 mb-4 me-3">
					<div class="card text-center shadow-sm">
						<div class="card-body">
							<div class="icon-circle bg-warning">
								<i class="fa fa-xmark"></i>
							</div>
							<h3 class="mt-2">0</h3>
							<p class="text-danger fw-bold">Ditolak</p>
						</div>
					</div>
				</div>
			</div>
			<!-- </div> -->
		</div>

	</main>