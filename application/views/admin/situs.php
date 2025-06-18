<!-- Main Content -->
<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<h3 class="mb-4 fw-bolder">Situs PD</h3>
		<div class="d-flex justify-content-end mb-3">
			<a href="<?= base_url('admin_situs_pd/tambah') ?>" class="btn btn-primary text-white">
				<i class="fas fa-plus"></i> Tambah Situs PD
			</a>
		</div>
		<div class="table-wrapper">
			<div class="table-container">
				<div class="table-responsive">
					<table id="lhkpnTable">
						<thead class="text-center">
							<tr>
								<th>#</th>
								<th>Nama PD</th>
								<th>Kategori</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody class="px-2">
							<?php $no = $offset + 1;
							foreach ($situs as $item): ?>
								<tr>
								<td><?= $no++ ?></td>
									<td><?= $item->nama_pd ?></td>
									<td><?= ucwords(strtolower( $item->kategori))?></td>
									<td><?= $item->alamat ?></td>
									<td><?= $item->telepon ?></td>
									</td>
									<td class="text-center">
										<a href="<?= base_url('admin_situs_pd/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url('admin_situs_pd/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
											<i class="fas fa-trash"></i>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
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
				$base_url = base_url('admin_unduhan/index');
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
</div>
