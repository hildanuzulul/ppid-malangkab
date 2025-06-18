<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<div class="user-permintaan_data-wrapper">
			<a href="<?= base_url('admin_permintaan_informasi') ?>" class="btn btn-secondary text-white mb-3">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
			<div class="user-permintaan_data-container text-start">
				<h2>Permintaan Informasi</h2>


				<!-- form_open di-nonaktifkan agar tidak terkirim -->
				<form action="<?= base_url('admin_permintaan_informasi/update/' . $permintaan->id) ?>" method="post" enctype="multipart/form-data">

					<div class="mb-3">
						<label for="permintaan_informasi" class="form-label">Informasi yang diinginkan</label>
						<textarea id="permintaan_informasi" class="form-control" rows="2" readonly><?= htmlspecialchars($permintaan->permintaan_informasi) ?></textarea>
					</div>

					<div class="mb-3">
						<label for="berkas" class="form-label">Tujuan Penggunaan Informasi</label>
						<textarea id="berkas" class="form-control" rows="2" readonly><?= htmlspecialchars($permintaan->tujuan_penggunaan) ?></textarea>
					</div>

					<div class="mb-3">
						<label for="cara_memperoleh" class="form-label">Cara Memperoleh Informasi</label>
						<select id="cara_memperoleh" class="form-control form-select" disabled>
							<option value="">-- Pilih --</option>
							<option value="membaca" <?= set_select('cara_memperoleh', 'membaca') ?> <?= ($permintaan->cara_memperoleh == 'membaca') ? 'selected' : '' ?>>Membaca</option>
							<option value="melihat/mendengar" <?= set_select('cara_memperoleh', 'melihat/mendengar') ?> <?= ($permintaan->cara_memperoleh == 'melihat/mendengar') ? 'selected' : '' ?>>Melihat/Mendengar</option>
							<option value="mendapatkan_salinan" <?= set_select('cara_memperoleh', 'mendapatkan_salinan') ?><?= ($permintaan->cara_memperoleh == 'mendapatkan_salinan') ? 'selected' : '' ?>>Mendapatkan Salinan</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="bentuk_salinan" class="form-label">Mendapatkan Salinan Informasi</label>
						<select id="bentuk_salinan" class="form-control form-select" disabled>
							<option value="">-- Pilih --</option>
							<option value="softcopy" <?= set_select('bentuk_salinan', 'softcopy') ?><?= ($permintaan->bentuk_salinan == 'softcopy') ? 'selected' : '' ?>>Softcopy</option>
							<option value="hardcopy" <?= set_select('bentuk_salinan', 'hardcopy') ?><?= ($permintaan->bentuk_salinan == 'hardcopy') ? 'selected' : '' ?>>Hardcopy</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="kirim_salinan" class="form-label">Cara Mendapatkan Salinan</label>
						<select id="kirim_salinan" class="form-control form-select" disabled>
							<option value="">-- Pilih --</option>
							<option value="download" <?= set_select('kirim_salinan', 'download') ?><?= ($permintaan->kirim_salinan == 'download') ? 'selected' : '' ?>>Download</option>
							<option value="email" <?= set_select('kirim_salinan', 'email') ?><?= ($permintaan->kirim_salinan == 'email') ? 'selected' : '' ?>>Email</option>
							<option value="langsung" <?= set_select('kirim_salinan', 'langsung') ?><?= ($permintaan->kirim_salinan == 'langsung') ? 'selected' : '' ?>>Pengambilan Langsung</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="keterangan" class="form-label">Keterangan</label>
						<select id="keterangan" name="keterangan" class="form-control form-select">
							<option value="">-- Pilih --</option>
							<option value="ditinjau" <?= set_select('keterangan', 'ditinjau') ?><?= ($permintaan->keterangan == 'ditinjau') ? 'selected' : '' ?>>Ditinjau</option>
							<option value="disetujui_proses" <?= set_select('keterangan', 'disetujui_proses') ?><?= ($permintaan->keterangan == 'disetujui_proses') ? 'selected' : '' ?>>Disetujui Dalam Proses</option>
							<option value="ditolak" <?= set_select('keterangan', 'ditolak') ?><?= ($permintaan->keterangan == 'ditolak') ? 'selected' : '' ?>>Ditolak</option>
							<option value="selesai" <?= set_select('keterangan', 'selesai') ?><?= ($permintaan->keterangan == 'selesai') ? 'selected' : '' ?>>Selesai</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="berkas" class="form-label">Berkas</label>
						<textarea id="berkas" class="form-control" rows="2"><?= htmlspecialchars($permintaan->berkas) ?></textarea>
					</div>
					<div class="d-flex justify-content-end">
						<a href="<?= base_url('admin_permintaan_informasi') ?>" class="btn btn-secondary me-2">Batal</a>
						<button type="submit" class="btn btn-primary text-white">Simpan Perubahan</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>