<div class="main-content" style="color:#545454;">
	<div class="container-fluid py-4 mx-3 pe-5">
		<a href="<?= base_url('admin_informasi_dikecualikan') ?>" class="btn btn-secondary text-white mb-3">
			<i class="fas fa-arrow-left"></i> Kembali
		</a>
		<h3 class="mb-5 fw-bolder">Form Informasi</h3>

		<?php echo form_open_multipart('admin_informasi/tambah'); ?>
		<div class="row">
			<div class="col-6">
				<div class="mb-3 text-start">
					<label for="judul" class="form-label">Judul</label>
					<input type="text" id="judul" name="judul" class="form-control" placeholder="Judul informasi"
						value="<?php echo set_value('judul'); ?>">
					<?php echo form_error('judul', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
				<div class="mb-3 text-start">
					<label for="pejabat" class="form-label">Pejabat yang Menguasai Informasi</label>
					<input type="text" id="pejabat" name="pejabat" class="form-control" placeholder="Nama pejabat"
						value="<?php echo set_value('pejabat'); ?>">
					<?php echo form_error('pejabat', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>

				<div class="mb-3 text-start">
					<label for="penanggung_jawab" class="form-label">Penanggung Jawab Pembuatan Informasi</label>
					<input type="text" id="penanggung_jawab" name="penanggung_jawab" class="form-control" placeholder="Nama penanggung jawab"
						value="<?php echo set_value('penanggung_jawab'); ?>">
					<?php echo form_error('penanggung_jawab', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>

				<div class="mb-3 text-start">
					<label for="waktu_penerbitan" class="form-label">Waktu Pembuatan/Penerbitan Informasi</label>
					<input type="date" id="waktu_penerbitan" name="waktu_penerbitan" class="form-control"
						value="<?php echo set_value('waktu_penerbitan'); ?>">
					<?php echo form_error('waktu_penerbitan', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
				<div class="mb-3 text-start">
					<label for="bentuk" class="form-label">Bentuk informasi</label>
					<select id="bentuk" name="bentuk" class="form-control form-select" placeholder="Pilih Kategori">
						<option value="">Pilih Bentuk File</option>
						<option value="Soft Copy">Soft Copy</option>
						<option value="Hard Copy">Hard Copy</option>
						<option value="Soft dan Hard Copy">Soft dan Hard Copy</option>
					</select>
					<?php echo form_error('bentuk', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
				<div class="mb-3 text-start">
					<label for="kategori" class="form-label">Kategori</label>
					<select id="kategori" name="kategori" class="form-control form-select" placeholder="Pilih Kategori">
						<option value="">Pilih Kategori</option>
						<option value="dikecualikan">Dikecualikan</option>
						<option value="setiap_saat">Setiap Saat</option>
						<option value="berkala">Berkala</option>
					</select>
					<?php echo form_error('kategori', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
			</div>
			<div class="col-6">
				<div class="mb-3 text-start">
					<label for="jangka_waktu" class="form-label">Jangka Waktu Penyampaian</label>
					<input type="text" id="jangka_waktu" name="jangka_waktu" class="form-control" placeholder="Contoh: 1 minggu, 1 bulan, Permanen"
						value="<?php echo set_value('jangka_waktu'); ?>">
					<?php echo form_error('jangka_waktu', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>

				<div class="mb-3 text-start">
					<label for="media" class="form-label">Jenis Media yang Memuat Informasi</label>
					<input type="text" id="media" name="media" class="form-control" placeholder="URL media informasi"
						value="<?php echo set_value('media'); ?>">
					<?php echo form_error('media', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>

				<div class="mb-3 text-start">
					<label for="judul" class="form-label">Berkas</label>
					<input type="text" id="berkas" name="berkas" class="form-control" placeholder="Berkas informasi (URL file)"
						value="<?php echo set_value('berkas'); ?>">
					<?php echo form_error('berkas', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
				<div class="mb-3 text-start">
					<label for="ringkasan" class="form-label">Ringkasan Isi Informasi</label>
					<textarea id="ringkasan" name="ringkasan" class="form-control" rows="3" placeholder="Ringkasan isi informasi"><?php echo set_value('ringkasan'); ?></textarea>
					<?php echo form_error('ringkasan', '<small class="text-danger ps-2">', '</small>'); ?>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary mt-2">Simpan</button></div>
		</form>
	</div>

</div>
