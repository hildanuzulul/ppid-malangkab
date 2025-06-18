<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_sop') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Form SOP</h3>

		<?php echo form_open('admin_sop/tambah'); ?>
		<div class="mb-3 text-start">
			<label for="nama_sop" class="form-label">Nama SOP</label>
			<input type="text" id="nama_sop" name="nama_sop" class="form-control" placeholder="Masukkan Nama SOP"
				value="<?php echo set_value('nama_sop'); ?>">
			<?php echo form_error('nama_sop', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="tahun" class="form-label">Tahun</label>
			<input type="text" id="tahun" name="tahun" class="form-control" placeholder="Masukkan Tahun"
				value="<?php echo set_value('tahun'); ?>">
			<?php echo form_error('tahun', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3 text-start">
			<label for="file" class="form-label">File SOP</label>
			<input type="text" id="file" name="file" class="form-control" placeholder="file informasi (URL file)"
				value="<?php echo set_value('file'); ?>">
			<?php echo form_error('file', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<button type="submit" class="btn btn-primary mt-2 ">Simpan</button>
		</form>
	</div>

</div>
