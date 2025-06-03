<body class="informasi-page">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Publik</li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Setiap Saat</li>
					</ol>
				</nav>
				<h1>Informasi Setiap Saat</h1>
			</div>
		</div><!-- End Page Title -->

		<section>
			<div class="container">
				<div class="table-header">
					<input type="text" id="searchInput" class="search-informasi" placeholder="Cari...">
				</div>
				<div class="table-wrapper">
					<div class="table-container">
						<table class="table-informasi" id="informasiTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Judul</th>
									<th>Ringkasan Isi Informasi</th>
									<th>Pejabat yang Menguasai Informasi</th>
									<th>Penanggung Jawab Pembuatan Informasi</th>
									<th>Waktu Pembuatan/Penerbiatan Informasi</th>
									<th>Bentuk Informasi yang Tersedia</th>
									<th>Jangka Waktu Penyampaian</th>
									<th class="media-icon">Jenis Media yang Memuat Informasi</th>
									<th class="berkas-icon">Berkas </th>
									<th>Tgl Unggah</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = $offset + 1;
								if (!empty($informasi)):
									foreach ($informasi as $row): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= htmlspecialchars($row->judul) ?></td>
											<td>
												<?php
												if (strpos($row->ringkasan, 'a.') !== false) {
													$items = preg_split("/(?=\s?[a-z]\.)/", $row->ringkasan);
													foreach ($items as $item) {
														if (trim($item) !== '') {
															echo trim($item) . '<br>';
														}
													}
												} else {
													echo nl2br(htmlspecialchars($row->ringkasan));
												}
												?>
											</td>
											<td><?= htmlspecialchars($row->pejabat) ?></td>
											<td><?= htmlspecialchars($row->penanggung_jawab) ?></td>
											<td><?= htmlspecialchars($row->waktu_penerbitan) ?></td>
											<td><?= htmlspecialchars($row->bentuk) ?></td>
											<td><?= htmlspecialchars($row->jangka_waktu) ?></td>
											<td>
												<?php if (!empty($row->media)): ?>
													<?= htmlspecialchars($row->media) ?>
												<?php else: ?>
													<span>-</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if (!empty($row->berkas)): ?>
													<a href="<?= base_url('informasi_setiap_saat/download/' . basename($row->berkas)) ?>"
														target="_blank"><i class="fas fa-download"></i></a>
												<?php else: ?>
													<span>-</span>
												<?php endif; ?>
											</td>
											<td><?= date('d-m-Y', strtotime($row->tanggal_unggah)) ?></td>
										</tr>
									<?php endforeach;
								else: ?>
									<tr>
										<td colspan="11">Tidak ada data tersedia.</td>
									</tr>
								<?php endif; ?>
							</tbody>

						</table>
					</div>
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
						$base_url = base_url('informasi_setiap_saat/index');
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
		</section>
	</main>