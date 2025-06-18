<!-- Main Content -->
<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4">
		<h3 class="mb-4 fw-bolder">Kritik dan Saran</h3>

		<!-- Recent Orders Table -->
		<div class="table-wrapper">
			<div class="table-container">
				<table class="table-informasi table-responsive">
					<thead>
						<tr class="text-secondary-emphasis">
							<th>#</th>
							<th>Nama Pengirim</th>
							<th>Email</th>
							<th>Telepon</th>
							<th>Pesan</th>
							<th>Tanggal Dibuat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = $offset + 1;
						if (!empty($kritik)):
							foreach ($kritik as $row): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $row->nama_pengirim ?></td>
									<td><?= $row->email ?></td>
									<td><?= $row->telepon ?></td>
									<td class="text-truncate" style="max-width: 200px;"><?= $row->pesan ?> </td>
									<td><?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?></td>
									<td class="text-center">
										<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
											<i class="fas fa-eye"></i>
										</button>
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Detail Pesan</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body text-start">
														<p><strong>Nama Pengirim:</strong> <?= $row->nama_pengirim ?></p>
														<p><strong>Email:</strong> <?= $row->email ?></p>
														<p><strong>Telepon:</strong> <?= $row->telepon ?></p>
														<p><strong>Pesan:</strong> <?= nl2br(htmlspecialchars($row->pesan)) ?></p>
														<p><strong>Tanggal Dibuat:</strong> <?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?></p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<a href="<?= base_url('admin_kritik_saran/delete/' . $row->id) ?>"
											class="btn btn-danger btn-sm"
											onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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