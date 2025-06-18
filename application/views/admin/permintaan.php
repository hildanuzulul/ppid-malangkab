<!-- Main Content -->
<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<h3 class="mb-4 fw-bolder">Permintaan Infromasi</h3>
		<div class="table-wrapper">
			<div class="table-container">
				<div class="table-responsive">
					<table id="lhkpnTable">
						<thead class="text-center">
							<tr>
								<th>#</th>
								<th>Permintaan Data</th>
								<th>Pengirim</th>
								<th>Tujuan Penggunaan</th>
								<th>Cara Memperoleh</th>
								<th>Bentuk Salinan</th>
								<th>Kirim Salinan</th>
								<th>Keterangan</th>
								<th>Berkas</th>
								<th style="max-width: 50px;">Tgl Update</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody class="px-2">
							<?php $no = $offset + 1;
							foreach ($permintaan as $item): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $item->permintaan_informasi ?></td>
									<td><?= $item->nama_user ?></td>
									<td><?= $item->tujuan_penggunaan ?></td>
									<td><?= $item->cara_memperoleh ?></td>
									<td><?= $item->bentuk_salinan ?></td>
									<td><?= $item->kirim_salinan ?></td>
									<td><span class="badge rounded-pill 
									<?php if ($item->keterangan == 'ditolak') {
										echo 'bg-secondary';
									} elseif ($item->keterangan == 'selesai') {
										echo 'bg-success';
									} elseif ($item->keterangan == 'disetujui_proses') {
										echo 'bg-warning';
									} else {
										echo 'bg-primary';
									}
									?>" style="font-size: small;"><?= ucwords(str_replace('_', ' ', strtolower($item->keterangan))) ?></span></td>
									</td>
									<?php if ($item->keterangan == 'selesai' && $item->berkas == null): ?>
										<td class="text-center">
											<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fas fa-plus"></i>
											</button>
											<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form id="form-simpan" action="<?= base_url('admin_permintaan_informasi/upload_berkas/' . $item->id) ?>" method="post">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">upload berkas</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>

															<div class="modal-body text-start">
																<div class="mb-3">
																	<label for="berkas" class="form-label">URL berkas</label>
																	<textarea name="berkas" id="berkas" class="form-control" rows="3" required></textarea>
																	<?php echo form_error('berkas', '<small class="text-danger ps-2">', '</small>'); ?>
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
																<button type="button" id="btn-simpan" class="btn btn-primary">Simpan</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									<?php elseif (!$item->berkas == null): ?>
										<td class="text-truncate text-center" style="max-width: 50px;"><a href="<?= $item->berkas ?>" target="_blank"><i class="fas fa-info-circle"></i></a></td>
									<?php else: ?>
										<td class="text-center">-</td>
									<?php endif ?>
									<td style="max-width: 100px;"><?= $item->updated_at ?></td>
									<td class="text-end">
										<?php if ($item->kirim_salinan == 'download' && $item->berkas != null): ?>
											<a title="Kirim Email" href="<?= base_url('admin_permintaan_informasi/kirim_email/' . $item->id) ?>"
												class="btn btn-primary btn-sm"
												title="Kirim email berisi berkas permohonan kepada pemohon">
												<i class="fas fa-paper-plane"></i>
											</a>
										<?php endif; ?>
										<a title="edit" href="<?= base_url('admin_permintaan_informasi/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a title="Hapus" href="<?= base_url('admin_permintaan_informasi/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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