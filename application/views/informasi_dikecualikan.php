<body class="informasi-page">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Publik</li>
						<li class="breadcrumb-item active" aria-current="page">Informasi Dikecualikan</li>
					</ol>
				</nav>
				<h1>Profil PPID Kabupaten Malang</h1>
			</div>
		</div><!-- End Page Title -->

		<section>
			<div class="container">
				<div class="table-header">
					<input type="text" id="searchInput" placeholder="Cari..." onkeyup="searchTable()">
				</div>
				<div class="table-wrapper">
					<div class="table-container">
						<table class="table-informasi">
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
								<?php $no = 1;
								if (!empty($informasi)):
									foreach ($informasi as $row): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row->judul ?></td>
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
													echo nl2br($row->ringkasan);
												}
												?>
											</td>
											<td><?= $row->pejabat ?></td>
											<td><?= $row->penanggung_jawab ?></td>
											<td><?= $row->waktu_penerbitan ?></td>
											<td><?= $row->bentuk ?></td>
											<td><?= $row->jangka_waktu ?></td>
											<td><a href="<?= $row->berkas ?>"><i class="fas fa-info-circle"></i></a></td>
											<td>
												<?php if (!empty($row->berkas)): ?>
													<a href="<?= base_url('informasi_dikecualikan/download/' . basename($row->berkas)) ?>" title="Download Berkas" target="_blank">
														<i class="fas fa-download"></i>
													</a>
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
						<a href="#" class="disabled">&lt;</a>
						<a href="#" class="current">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">&gt;</a>
					</div>
				</div>
			</div>
		</section>
	</main>