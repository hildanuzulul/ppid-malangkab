<body class="lhkpn-page">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil</li>
						<li class="breadcrumb-item active" aria-current="page">Laporan LHKPN</li>
					</ol>
				</nav>
				<h1>Laporan LHKPN</h1>
			</div>
		</div>

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
										<option value="Semua" <?= $tahun_terpilih == 'Semua' ? 'selected' : '' ?>>Semua</option>
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
												<a href="<?= $item->file_lhkpn ?>" class="my-custom-button" target="_blank">detail</a>
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

					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>
