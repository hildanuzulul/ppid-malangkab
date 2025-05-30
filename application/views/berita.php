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
						<div class="container-fluid berita-container">
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
						<div class="pagination-container">
							<div class="pagination-info">
								Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_rows) ?> of <?= $total_rows ?> rows
								<select id="limitSelect" onchange="changeLimit()">
									<?php foreach ([10, 25] as $l): ?>
										<option value="<?= $l ?>" <?= ($limit == $l) ? 'selected' : '' ?>><?= $l ?></option>
									<?php endforeach; ?>
								</select>
								rows per page
							</div>
							<div class="pagination-links">
								<?php
								$base_url = base_url('berita/index');
								$prev_offset = max(0, $offset - $limit);
								$next_offset = $offset + $limit;
								$max_offset = $total_rows - ($total_rows % $limit ?: $limit);
								?>

								<!-- Prev button -->
								<?php if ($offset <= 0): ?>
									<a href="#" class="disabled">&lt;</a>
								<?php else: ?>
									<a href="<?= $base_url . "?limit=$limit&offset=$prev_offset" ?>">&lt;</a>
								<?php endif; ?>

								<!-- Numbered links (from create_links) -->
								<?= $pagination_links ?>
								<!-- Next button -->
								<?php if ($offset + $limit >= $total_rows): ?>
									<a href="#" class="disabled">&gt;</a>
								<?php else: ?>
									<a href="<?= $base_url . "?limit=$limit&offset=$next_offset" ?>">&gt;</a>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>

						<div class="unduhan-section">
							<h2>Unduhan</h2>
							<ul class="unduhan-list">
								<li><a href="link1.pdf" target="_blank">CASCADING 2018</a></li>
								<li><a href="link2.pdf" target="_blank">Indikator Kinerja Individu 2018</a></li>
								<li><a href="link3.pdf" target="_blank">Rencana Kerja (Renja) Tahun 2018</a></li>
								<li><a href="link4.pdf" target="_blank">Perjanjian Kinerja Kepala OPD - Staf Tahun 2018</a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>