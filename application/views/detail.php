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
						<div class="container detail-container">
							<div class="artikel-detail">
								<!-- Judul Artikel -->
								<h1><?= isset($berita['judul_artikel']) ? $berita['judul_artikel'] : '(Tanpa Judul)' ?></h1>

								<!-- Gambar Artikel -->
								<div class="gambar-detail" style="text-align: center;">
									<img src="<?= isset($berita['artikel_image_url']) ? base_url('assets/uploads/' . $berita['artikel_image_url']) : 'https://ppid.malangkab.go.id/assets/uploads/notfound.jpg' ?>" alt="gambar artikel" style="max-width: 80%; height: auto;">
								</div>

								<!-- Informasi Artikel -->
								<p><strong>Dipost Oleh:</strong> Admin | <strong>Pada:</strong> <?= isset($berita['created_at']) ? $berita['created_at'] : '(Tanggal tidak tersedia)' ?></p>

								<!-- Konten Artikel -->
								<div class="konten-detail">
									<p><?= isset($berita['konten_artikel']) ? nl2br($berita['konten_artikel']) : '(Konten tidak tersedia)' ?></p>
								</div>
							</div>

							<!-- Tombol Kembali -->
							<a href="<?= base_url('berita') ?>" class="btn btn-secondary">Kembali ke Berita</a>
						</div>

					</div>
					<div class="col-md-4">
						<aside class="right-sidebar">

							<!-- Widget Pencarian -->
							<div class="input-group">
								<input class="form-control search-input" type="text" placeholder="Type here">
								<button class="btn btn-search" type="submit">Search</button>
							</div>

							<!-- Tabs -->
							<div class="widget tab-widget">
								<ul class="nav nav-tabs custom-tabs">
									<li class="nav-item">
										<a class="nav-link active" href="#one" data-bs-toggle="tab">
											<i class="bi bi-star"></i> Album Galeri
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link pengumuman-tab" href="#two" data-bs-toggle="tab">Pengumuman</a>
									</li>
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade show active" id="one">
										<ul class="gallery-list">
											<li>
												<div class="image-box">
													<img src="https://inspektorat.malangkab.go.id/uploads/galeri/inspektorat-opd@3507-WhatsApp Image 2024-12-18 at 10.16.11.png"
														onerror="this.onerror=null;this.src='https://ppid.malangkab.go.id/assets/uploads/notfound.jpg';"
														alt="Logo Kabupaten Malang">
												</div>
												<div>
													<p>Menerima Kunjungan Kerja Inspektorat Daerah Provinsi Kalimantan Utara</p>
													<span>2024-12-18 13:42:14</span>
												</div>
											</li>
											<hr>
											<li>
												<div class="image-box">
													<img src="https://inspektorat.malangkab.go.id/uploads/galeri/inspektorat-opd@3507-WhatsApp Image 2024-12-18 at 10.16.11.png"
														onerror="this.onerror=null;this.src='https://ppid.malangkab.go.id/assets/uploads/notfound.jpg';"
														alt="Logo Kabupaten Malang">
												</div>
												<div>
													<p>Menerima Kunjungan Kerja Inspektorat Daerah Provinsi Kalimantan Utara</p>
													<span>2024-12-18 13:42:14</span>
												</div>
											</li>
											<hr>
											<li>
												<div class="image-box">
													<img src="https://inspektorat.malangkab.go.id/uploads/galeri/inspektorat-opd@3507-WhatsApp Image 2024-12-18 at 10.16.11.png"
														onerror="this.onerror=null;this.src='https://ppid.malangkab.go.id/assets/uploads/notfound.jpg';"
														alt="Logo Kabupaten Malang">
												</div>
												<div>
													<p>Menerima Kunjungan Kerja Inspektorat Daerah Provinsi Kalimantan Utara</p>
													<span>2024-12-18 13:42:14</span>
												</div>
											</li>
											<hr>
											<li>
												<div class="image-box">
													<img src="https://inspektorat.malangkab.go.id/uploads/galeri/inspektorat-opd@3507-WhatsApp Image 2024-12-18 at 10.16.11.png"
														onerror="this.onerror=null;this.src='https://ppid.malangkab.go.id/assets/uploads/notfound.jpg';"
														alt="Logo Kabupaten Malang">
												</div>
												<div>
													<p>Sosialisasi Upaya Pencegahan Tindak Pidana Korupsi dan Pungli pada Pemerintahan Desa Kabupaten Malang Tahun 2024 di Wilayah Kecamatan Donomulyo dan Pagak</p>
													<span>2024-12-18 13:42:14</span>
												</div>
											</li>
											<hr>
											<li>
												<div class="image-box">
													<img src="https://inspektorat.malangkab.go.id/uploads/galeri/inspektorat-opd@3507-WhatsApp Image 2024-12-18 at 10.16.11.png"
														onerror="this.onerror=null;this.src='https://ppid.malangkab.go.id/assets/uploads/notfound.jpg';"
														alt="Logo Kabupaten Malang">
												</div>
												<div>
													<p>Sosialisasi Upaya Pencegahan Tindak Pidana Korupsi dan Pungli pada Pemerintahan Desa Kabupaten Malang Tahun 2024 di Wilayah Kecamatan Donomulyo dan Pagak</p>
													<span>2024-12-18 13:42:14</span>
												</div>
											</li>
										</ul>

									</div>
									<div class="tab-pane fade" id="two">
										<ul class="announcement-list">
											<li><i class="bi bi-check"></i>
												<p><a href="https://drive.google.com/file/d/1tMn7W-eCYixbVhjoreowJhT-5k_E4gMa/view?usp=sharing" target="_blank">Pengumuman Hasil Seleksi Administrasi</a></p>
											</li>
											<li><i class="bi bi-check"></i>
												<p><a href="https://drive.google.com/file/d/1rYWi2bFiUMYZTT2IxA8jyvhJEM9jFqWa/view?usp=sharing" target="_blank">Pemilihan Mitra Kerja Sama Pemanfaatan Taman Wisata Air Wendit Kabupaten Malang</a></p>
											</li>
											<li><i class="bi bi-check"></i>
												<p><a href="https://drive.google.com/file/d/1gzXZnUul5GK0OU1m6m5saI_6ZWtnOedo/view?usp=sharing" target="_blank">Pengumuman Hasil Akhir Seleksi Calon Dewan Pengawas Perumda Tirta Kanjuruhan Dari Unsur Independen</a></p>
											</li>
											<li><i class="bi bi-check"></i>
												<p><a href="https://drive.google.com/file/d/1jk8OXyMIL4DucXYdeaMYDgZsD-55OSeB/view?usp=sharing" target="_blank">Pengumuman Hasil Uji Kelayakan dan Kepatutan Calon Dewan Pengawas Perumda Tirta Kanjuruhan Dari Jalur Independen 2023</a></p>
											</li>
											<li><i class="bi bi-check"></i>
												<p><a href="https://drive.google.com/file/d/17EPbs5j9l2xM3ryTQDJ5BcxAe6B-h1WA/view?usp=sharing" target="_blank">Pengumuman Hasil Seleksi Administrasi Dewan Pengawas Perumda Tirta Kanjuruhan 2023</a></p>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<!-- Statistik -->
							<div class="widget statistics-widget">
								<h5 class="widgetheading">Statistik <strong>Pengunjung</strong></h5>
								<span class="badge statistik hari">Hari ini 290</span>
								<span class="badge statistik bulan">Bulan ini 12.229</span>
								<span class="badge statistik tahun">Tahun ini 24.786</span>
							</div>

						</aside>
					</div>
				</div>
			</section>
		</div>
	</main>

	<!-- Bootstrap JavaScript -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
