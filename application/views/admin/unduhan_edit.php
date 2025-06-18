<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_unduhan') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Edit Dokumen Unduhan</h3>

		<form action="<?= base_url('admin_unduhan/update/' . $unduhan->id) ?>" method="post" enctype="multipart/form-data"><div class="mb-3 text-start">
			<label for="nama_file" class="form-label">Nama File</label>
			<input type="text" id="nama_file" name="nama_file" class="form-control" placeholder="Masukkan Nama File"
				value="<?= htmlspecialchars($unduhan->nama_file) ?>">
			<?php echo form_error('nama_file', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="keterangan" class="form-label">Keterangan</label>
			<input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan keterangan"
				value="<?= htmlspecialchars($unduhan->keterangan) ?>">
			<?php echo form_error('keterangan', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3 text-start">
			<label for="file" class="form-label">File Unduhan</label>
			<input type="text" id="file" name="file" class="form-control" placeholder="file unduhan (URL file)"
				value="<?= htmlspecialchars($unduhan->url_download) ?>">
			<?php echo form_error('file', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="d-flex justify-content-end">
				<a href="<?= base_url('admin_unduhan') ?>" class="btn btn-secondary me-2">Batal</a>
				<button type="submit" class="btn btn-primary text-white">Simpan Perubahan</button>
			</div>
		</form>
	</div>

</div>
