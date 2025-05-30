<aside class="right-sidebar">

	<div class="input-group">
		<input class="form-control search-input" type="text" placeholder="Type here">
		<button class="btn btn-search" type="submit">Search</button>
	</div>

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
					<?php if (!empty($sidebar_berita)): ?>
						<?php foreach ($sidebar_berita as $item): ?>
							<li>
								<div class="image-box">
									<img src="<?= $item['gambar'] ?>"
										onerror="this.onerror=null;this.src='<?= base_url('assets/uploads/notfound.jpg') ?>';"
										alt="<?= htmlspecialchars($item['judul_artikel']) ?>">
								</div>
								<div>
									<p>
										<a href="<?= base_url('berita/detail/' . $item['id_artikel']) ?>" class="sidebar-link">
											<?= htmlspecialchars($item['judul_artikel']) ?>
										</a>
									</p>
									<span><?= date('Y-m-d H:i:s', strtotime($item['created_at'])) ?></span>
								</div>
							</li>
							<hr>
						<?php endforeach; ?>
					<?php else: ?>
						<li>Tidak ada berita terbaru.</li>
					<?php endif; ?>
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

	<div class="widget statistics-widget">
		<h5 class="widgetheading">Statistik <strong>Pengunjung</strong></h5>
		<span class="badge statistik hari">Hari ini <?= isset($stats['today']) ? $stats['today'] : 0 ?></span>
		<span class="badge statistik bulan">Bulan ini <?= isset($stats['month']) ? $stats['month'] : 0 ?></span>
		<span class="badge statistik tahun">Tahun ini <?= isset($stats['year']) ? $stats['year'] : 0 ?></span>
	</div>

</aside>