<!-- Main Content -->
<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<h3 class="mb-4 fw-bolder">LHKPN</h3>
		<div class="d-flex justify-content-end mb-3">
			<a href="<?= base_url('admin_lhkpn/tambah') ?>" class="btn btn-primary text-white">
				<i class="fas fa-plus"></i> Tambah LHKPN
			</a>
		</div>
		<div class="table-wrapper">
			<div class="table-container">
				<div class="table-responsive">
					<table id="lhkpnTable">
						<thead class="text-center">
							<tr>
								<th>Tahun</th>
								<th>Nama Pejabat</th>
								<th style="white-space: nowrap; width: 50%;">Jabatan</th>
								<th style="white-space: nowrap; width: 10%;">File</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($lhkpn as $item): ?>
								<tr>
									<td><?= $item->tahun ?></td>
									<td><?= $item->nama ?></td>
									<td><?= $item->jabatan ?></td>
									<td style="white-space: nowrap; text-align: center;">
										<a href="<?= $item->file_lhkpn ?>" class="btn btn-primary btn-sm" target="_blank">detail</a>
									</td>
									<td style="white-space: nowrap; text-align: center;">
										<a href="<?= base_url('admin_lhkpn/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url('admin_lhkpn/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
											<i class="fas fa-trash"></i>
										</a>
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
							$base_url = base_url('admin_lhkpn');
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
		</div>
	</div>
</div>
</div>
