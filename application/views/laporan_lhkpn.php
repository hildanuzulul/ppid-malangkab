<body class="lhkpn-page">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil</li>
						<li class="breadcrumb-item active" aria-current="page">Laporan LHKPN</li>
					</ol>
				</nav>
				<h1>Standart Operasional Prosedur (SOP) PPID</h1>
			</div>
		</div><!-- End Page Title -->

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row">
					<div class="col-md-8">
						<div class="table-header">
							<input type="text" class="search-lhkpn" id="searchInput" placeholder="Cari...">
						</div>

						<form method="GET" action="<?= base_url('laporan_lhkpn') ?>" id="filterForm">
							<div class="filter-container d-flex flex-wrap gap-3 align-items-center">
								<div class="filter-group">
									<label for="tahun">Tahun :</label>
									<select class="choices" name="tahun" id="tahunFilter">
										<option value="Semua">Semua</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<?php foreach ($list_tahun as $row): ?>
											<option value="<?= $row->tahun ?>" <?= $tahun_terpilih == $row->tahun ? 'selected' : '' ?>><?= $row->tahun ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="filter-group">
									<label for="unit_kerja">Unit Kerja :</label>
									<select name="unit_kerja" id="unitKerjaFilter" class="choices">
										<option value="Semua">Tampil Semua</option>
										<?php foreach ($list_unit as $row): ?>
											<option value="<?= $row->unit_kerja ?>" <?= $unit_terpilih == $row->unit_kerja ? 'selected' : '' ?>>
												<?= $row->unit_kerja ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</form>

						<div class="table-responsive">
							<table class="tableLhkpn" id="lhkpnTable">
								<thead>
									<tr>
										<th>Tahun</th>
										<th>Nama Pejabat</th>
										<th>Jabatan</th>
										<th>File</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($lhkpn as $item): ?>
										<tr>
											<td><?= $item->tahun ?></td>
											<td><?= $item->nama ?></td>
											<td><?= $item->jabatan ?></td>
											<td>
												<!-- <a href="<?= $item->file_lhkpn ?>" class="btn btn-warning btn-sm" target="_blank">detail</a> -->
												<a href="<?= $item->file_lhkpn ?>" class="my-custom-button" target="_blank">detail</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

							<p style="font-family: var(--default-font); font-size: 14px;color: var(--heading-color);">
								Showing 1 to <?= count($lhkpn) ?> of <?= count($lhkpn) ?> rows
							</p>
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