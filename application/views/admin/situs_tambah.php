<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_situs_pd') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Form Situs PD</h3>

		<?php echo form_open('admin_situs_pd/tambah'); ?>
		<div class="mb-3 text-start">
			<label for="nama_pd" class="form-label">Nama PD</label>
			<input type="text" id="nama_pd" name="nama_pd" class="form-control" placeholder="Masukkan Nama PD"
				value="<?php echo set_value('nama_pd'); ?>">
			<?php echo form_error('nama_pd', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="kategori" class="form-label">Kategori</label>
			<select id="kategori" name="kategori" class="form-control form-select" placeholder="Pilih Kategori">
				<option value="">Pilih kategori</option>
				<?php foreach ($kategori as $kat): ?>
					<option value="<?= $kat->kategori ?>" <?= set_select('kategori', $kat->kategori) ?>><?= ucwords(strtolower($kat->kategori)) ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('kategori', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="telepon" class="form-label">No Telepon</label>
			<input type="text" id="telepon" name="telepon" class="form-control" placeholder="081xxxxxx/+62/XXX/XXXX"
				value="<?php echo set_value('telepon'); ?>">
			<?php echo form_error('telepon', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>
		<div class="mb-3 text-start">
			<label for="alamat" class="form-label">Alamat</label>
			<textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Alamat"><?php echo set_value('alamat'); ?></textarea>
			<?php echo form_error('alamat', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<button type="submit" class="btn btn-primary mt-2 ">Simpan</button>
		</form>
	</div>

</div>
