<body class="unduh-page">
	<main class="main">

		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Unduh Dokumen</li>
					</ol>
				</nav>
				<h1>Unduh Dokumen</h1>
			</div>
		</div><!-- End Page Title -->

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<div class="table-header">
							<input type="text" class="search-sop" id="searchInput" placeholder="Cari...">
						</div>
						<div class="tableunduh-wrapper">
							<div class="tableunduh-responsive">
								<table class="tableunduh" id="unduhTable">
									<thead>
										<tr>
											<th>Nama File</th>
											<th>Keterangan</th>
											<th>File</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($dokumen as $item): ?>
											<tr>
												<td><?= htmlspecialchars($item->nama_file) ?></td>
												<td><?= htmlspecialchars($item->keterangan) ?></td>
												<td>
													<a href="<?= htmlspecialchars($item->url_download) ?>" class="my-custom-button btn btn-sm" target="_blank">Download</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

								<div class="pagination-container" style="margin-bottom: 50px;">
									<div class="pagination-info">
										Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_rows) ?> of <?= $total_rows ?> rows
										<select id="limitSelect" onchange="changeLimit()">
											<?php foreach ([10, 25, 50] as $l): ?>
												<option value="<?= $l ?>" <?= ($limit == $l) ? 'selected' : '' ?>><?= $l ?></option>
											<?php endforeach; ?>
										</select> rows per page
									</div>
									<div class="pagination-links">
										<?php
										$base_url = base_url('laporan_lhkpn');
										$prev_offset = max(0, $offset - $limit);
										$next_offset = $offset + $limit;
										?>
										<?php if ($offset > 0): ?>
											<a href="<?= $base_url . "?limit=$limit&offset=$prev_offset&tahun=$tahun_terpilih&unit_kerja=$unit_terpilih" ?>">&lt;</a>
										<?php else: ?>
											<a href="#" class="disabled">&lt;</a>
										<?php endif; ?>

										<?= $pagination_links ?>

										<?php if ($offset + $limit < $total_rows): ?>
											<a href="<?= $base_url . "?limit=$limit&offset=$next_offset&tahun=$tahun_terpilih&unit_kerja=$unit_terpilih" ?>">&gt;</a>
										<?php else: ?>
											<a href="#" class="disabled">&gt;</a>
										<?php endif; ?>
									</div>
								</div>

							</div>
						</div>
						<p style="font-family: var(--default-font); font-size: 14px;color: var(--heading-color); margin-top: 8px;">Showing 1 to <?= count($sop) ?> of <?= count($sop) ?> rows</p>
					</div>

					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>