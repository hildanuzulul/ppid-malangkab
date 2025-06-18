<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_sop') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Edit SOP</h3>

		<form action="<?= base_url('admin_sop/update/' . $sop->id) ?>" method="post" enctype="multipart/form-data">
			<div class="mb-3 text-start">
				<label for="nama_sop" class="form-label">Nama SOP</label>
				<input type="text" id="nama_sop" name="nama_sop" class="form-control" placeholder="Masukkan Nama SOP"
					value="<?= htmlspecialchars($sop->nama_sop) ?>">
				<?php echo form_error('nama_sop', '<small class="text-danger ps-2">', '</small>'); ?>
			</div>
			<div class="mb-3 text-start">
				<label for="tahun" class="form-label">Tahun</label>
				<input type="text" id="tahun" name="tahun" class="form-control" placeholder="Masukkan Tahun"
					value="<?= htmlspecialchars($sop->tahun) ?>">
				<?php echo form_error('tahun', '<small class="text-danger ps-2">', '</small>'); ?>
			</div>

			<div class="mb-3 text-start">
				<label for="file" class="form-label">File SOP</label>
				<input type="text" id="file" name="file" class="form-control" placeholder="file informasi (URL file)"
					value="<?= htmlspecialchars($sop->file_sop) ?>">
				<?php echo form_error('file', '<small class="text-danger ps-2">', '</small>'); ?>
			</div>
			<div class="d-flex justify-content-end">
				<a href="<?= base_url('admin_sop') ?>" class="btn btn-secondary me-2">Batal</a>
				<button type="submit" class="btn btn-primary text-white">Simpan Perubahan</button>
			</div>
		</form>
	</div>

</div>
