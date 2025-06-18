
        <!-- Main Content -->
        <div class="main-content"  style="color:#545454;">
        	<div class="container-fluid py-4">
        		<h3 class="mb-4 fw-bolder">Informasi</h3>
        		<div class="d-flex justify-content-end mb-3">
        			<a href="<?= base_url('admin_informasi/tambah') ?>" class="btn btn-primary text-white">
        				<i class="fas fa-plus"></i> Tambah Informasi
        			</a>
        		</div>

        		<!-- Recent Orders Table -->
        		<div class="table-wrapper">
        			<div class="table-container">
        				<table class="table-informasi table-responsive">
        					<thead>
        						<tr class="text-secondary-emphasis">
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
        							<th>Tanggal Unggah</th>
        							<th style="white-space: nowrap; width:1%;">Aksi</th>
        						</tr>
        					</thead>
        					<tbody>
        						<?php $no = $offset + 1;
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
											<td style="white-space: nowrap; text-align: center;">
												<a href="<?= base_url('admin_informasi/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">
													<i class="fas fa-edit"></i>
												</a>
												<a href="<?= base_url('admin_informasi/hapus/' . $row->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
													<i class="fas fa-trash"></i>
												</a>
											</td>
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
						$base_url = base_url('admin_informasi_dikecualikan/index');
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
        </div>
