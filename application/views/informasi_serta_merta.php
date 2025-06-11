<body class="interaksi_masryarakat-page">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Publik</li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Serta Merta</li>
					</ol>
				</nav>
				<h1>Informasi Serta Merta</h1>
			</div>
		</div>

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<div class="table-header">
				<input type="text" id="searchInput" class="search-informasiSM" placeholder="Cari...">
			</div>

			<?php if (!empty($informasi)): ?>
				<?php foreach ($informasi as $item): ?>
					<div class="informasi-item d-flex mb-4">
						<div class="image me-3">
							<img src="<?= htmlspecialchars($item['gambar']) ?>" alt="gambar" />
						</div>
						<div class="content">
							<h5><strong><?= htmlspecialchars($item['judul_artikel']) ?></strong></h5>
							<p><strong>Pejabat yang Menguasai Informasi:</strong> Bagian Protokol & Komunikasi Pimpinan</p>
							<p><strong>Penanggung Jawab:</strong> Bagian Protokol & Komunikasi Pimpinan</p>
							<p> <strong>Waktu Penerbitan:</strong> <?= htmlspecialchars($item['created_at']) ?> </p>

							<a href="<?= base_url('informasi_serta_merta/detail/' . $item['id_artikel']) ?>" class="btn btn-warning">Lihat Informasi</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Tidak ada data informasi tersedia saat ini.</p>
			<?php endif; ?>

			<!-- Pagination -->
			<div class="pagination-container">
				<div class="pagination-info">
					Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_rows) ?> of <?= $total_rows ?> rows
					<select id="limitSelect" onchange="changeLimit()">
						<?php foreach ([5, 10, 25] as $l): ?>
							<option value="<?= $l ?>" <?= ($limit == $l) ? 'selected' : '' ?>><?= $l ?></option>
						<?php endforeach; ?>
					</select>
					rows per page
				</div>
				<div class="pagination-links">
					<?php
					$base_url = base_url('informasi_serta_merta/index');
					$prev_offset = max(0, $offset - $limit);
					$next_offset = $offset + $limit;
					?>
					<?php if ($offset <= 0): ?>
						<a href="#" class="disabled">&lt;</a>
					<?php else: ?>
						<a href="<?= $base_url . "?limit=$limit&offset=$prev_offset" ?>">&lt;</a>
					<?php endif; ?>
					<?= $pagination_links ?>
					<?php if ($offset + $limit >= $total_rows): ?>
						<a href="#" class="disabled">&gt;</a>
					<?php else: ?>
						<a href="<?= $base_url . "?limit=$limit&offset=$next_offset" ?>">&gt;</a>
					<?php endif; ?>
				</div>
			</div>
			<br>
		</div>
	</main>
