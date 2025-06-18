<?= $this->session->flashdata('message') ?>
<div class="user-permintaan_data-wrapper">
	<div class="user-permintaan_data-container text-start">
		<h2>Permohonan Informasi</h2>

		<?= form_open('permintaan_data') ?> <!-- ganti dengan controller/metode kamu -->

		<div class="mb-3">
			<label for="permintaan_informasi" class="form-label">Informasi yang diinginkan</label>
			<textarea id="permintaan_informasi" name="permintaan_informasi" class="form-control" rows="2" placeholder="Tuliskan informasi yang Anda butuhkan"><?= set_value('permintaan_informasi') ?></textarea>
			<?= form_error('permintaan_informasi', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3">
			<label for="tujuan_penggunaan" class="form-label">Tujuan Penggunaan Informasi</label>
			<textarea id="tujuan_penggunaan" name="tujuan_penggunaan" class="form-control" rows="2" placeholder="Tuliskan tujuan Anda menggunakan informasi ini"><?= set_value('tujuan_penggunaan') ?></textarea>
			<?= form_error('tujuan_penggunaan', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3">
			<label for="cara_memperoleh" class="form-label">Cara Memperoleh Informasi</label>
			<select id="cara_memperoleh" name="cara_memperoleh" class="form-control form-select">
				<option value="">-- Pilih --</option>
				<option value="membaca" <?= set_select('cara_memperoleh', 'membaca') ?>>Membaca</option>
				<option value="melihat/mendengar" <?= set_select('cara_memperoleh', 'melihat/mendengar') ?>>Melihat/Mendengar</option>
				<option value="mendapatkan_salinan" <?= set_select('cara_memperoleh', 'mendapatkan_salinan') ?>>Mendapatkan Salinan</option>
			</select>
			<?= form_error('cara_memperoleh', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3">
			<label for="bentuk_salinan" class="form-label">Mendapatkan Salinan Informasi</label>
			<select id="bentuk_salinan" name="bentuk_salinan" class="form-control form-select">
				<option value="">-- Pilih --</option>
				<option value="softcopy" <?= set_select('bentuk_salinan', 'softcopy') ?>>Softcopy</option>
				<option value="hardcopy" <?= set_select('bentuk_salinan', 'hardcopy') ?>>Hardcopy</option>
			</select>
			<?= form_error('bentuk_salinan', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<div class="mb-3">
			<label for="kirim_salinan" class="form-label">Cara Mendapatkan Salinan</label>
			<select id="kirim_salinan" name="kirim_salinan" class="form-control form-select">
				<option value="">-- Pilih --</option>
				<option value="download" <?= set_select('kirim_salinan', 'download') ?>>Download</option>
				<option value="email" <?= set_select('kirim_salinan', 'email') ?>>Email</option>
				<option value="langsung" <?= set_select('kirim_salinan', 'langsung') ?>>Pengambilan Langsung</option>
			</select>
			<?= form_error('kirim_salinan', '<small class="text-danger ps-2">', '</small>'); ?>
		</div>

		<button type="submit" class="btn btn-sm btn-danger w-100">Kirim</button>

		<?= form_close(); ?>
	</div>
</div>
