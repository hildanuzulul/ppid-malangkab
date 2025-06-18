<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_lhkpn') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Form LHKPN</h3>

		<?php echo form_open_multipart('admin_lhkpn/tambah'); ?>
		<div class="mb-3 text-start">
			<label for="nama_pejabat" class="form-label">Nama Pejabat</label>
			<input type="text" id="nama_pejabat" name="nama_pejabat" class="form-control" placeholder="Nama Pejabat"
				value="<?php echo set_value('nama_pejabat'); ?>">
			<?php echo form_error('nama_pejabat', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="tahun" class="form-label">Tahun</label>
			<input type="text" id="tahun" name="tahun" class="form-control" placeholder="Tahun"
				value="<?php echo set_value('tahun'); ?>">
			<?php echo form_error('tahun', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>


		<div class="mb-3 text-start">
			<label for="jabatan" class="form-label">Jabatan</label>
			<input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan"
				value="<?php echo set_value('jabatan'); ?>">
			<?php echo form_error('jabatan', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3 text-start">
			<label for="unit_kerja" class="form-label">Unit Kerja</label>
			<select id="unit_kerja" name="unit_kerja" class="form-control form-select" placeholder="Pilih Kategori">
				<option value="">Pilih unit_kerja File</option>
				<?php foreach ($unit_kerja as $unit): ?>
					<option value="<?php echo $unit->unit_kerja; ?>" <?php echo set_select('unit_kerja', $unit->unit_kerja); ?>>
						<?php echo $unit->unit_kerja; ?>
					</option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('unit_kerja', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3 text-start">
			<label for="file" class="form-label">File</label>
			<input type="text" id="file" name="file" class="form-control" placeholder="file informasi (URL file)"
						value="<?php echo set_value('file'); ?>">
			<?php echo form_error('file', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>


		<button type="submit" class="btn btn-primary mt-2">Simpan</button>
		</form>
	</div>

</div>
