<!-- Main Content -->
<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<h3 class="mb-4 fw-bolder">SOP</h3>
		<div class="d-flex justify-content-end mb-3">
			<a href="<?= base_url('admin_sop/tambah') ?>" class="btn btn-primary text-white">
				<i class="fas fa-plus"></i> Tambah SOP
			</a>
		</div>
		<div class="table-wrapper">
			<div class="table-container">
				<div class="table-responsive">
					<table id="lhkpnTable">
						<thead class="text-center">
							<tr>
								<th>Tahun</th>
								<th>Nama SOP</th>
								<th>File</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sop as $item): ?>
								<tr>
									<td><?= $item->tahun ?></td>
									<td><?= $item->nama_sop ?></td>
									<td class="text-center">
										<a href="<?= $item->file_sop ?>" class="btn btn-primary btn-sm" target="_blank">detail</a>
									</td>
									<td class="text-center">
										<a href="<?= base_url('admin_sop/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url('admin_sop/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
	</div>
</div>
</div>
