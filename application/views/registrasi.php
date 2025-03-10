<body>
	<div class="user-register-wrapper">
		<div class="user-register-container text-center">
			<h2>Register</h2>
			<form>
				<div class="row">
					<!-- Kolom Kiri -->
					<div class="col-md-6 pe-md-3">
						<div class="mb-3 text-start">
							<label for="kategori" class="form-label">Kategori</label>
							<select id="kategori" class="form-control form-select" placeholder="Pilih Kategori">
								<!-- <option value="">Pilih Kategori</option> -->
								<option value="perorangan">Perorangan</option>
								<option value="Lembaga/Organisasi">Lembaga/Organisasi</option>
							</select>
						</div>

						<div class="mb-3 text-start">
							<label for="nik" class="form-label">NIK</label>
							<input type="text" id="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
						</div>

						<div class="mb-3 text-start">
							<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
							<input type="text" id="nama_lengkap" class="form-control" placeholder="Nama lengkap sesuai KTP">
						</div>

						<div class="mb-3 text-start">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" id="alamat" class="form-control" placeholder="Alamat lengkap">
						</div>

						<div class="mb-3 text-start">
							<label for="telp" class="form-label">No Telp / WA</label>
							<input type="text" id="telp" class="form-control" placeholder="08xxxxxxxxxx">
						</div>

						<div class="mb-3 text-start">
							<label for="pekerjaan" class="form-label">Pekerjaan</label>
							<input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan">
						</div>

						<div class="mb-3 text-start">
							<label for="email" class="form-label">Email</label>
							<input type="email" id="email" class="form-control" placeholder="Email aktif">
						</div>
					</div>

					<!-- Kolom Kanan -->
					<div class="col-md-6 ps-md-3">
						<div class="mb-3 text-start">
							<label for="nama_user" class="form-label">Nama User</label>
							<input type="text" id="nama_user" class="form-control" placeholder="Nama user">
						</div>

						<div class="mb-3 text-start">
							<label for="password" class="form-label">Password</label>
							<div class="position-relative">
								<input type="password" class="form-control pr-5" id="password" placeholder="Masukkan Password Anda" required>
								<i id="eyeIcon" class="bi bi-eye-fill" onclick="togglePassword()"
									style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #6c757d;">
								</i>
							</div>
						</div>

						<div class="mb-3 text-start">
							<label for="foto" class="form-label">Foto Profil</label>
							<input type="file" class="form-control" id="foto" accept="image/*" onchange="handleFileName(event, 'fileNameFoto', 'previewFoto')">
							<p id="fileNameFoto" style="color:#b22222; cursor: pointer; font-size: 14px; margin-top: 5px;" onclick="togglePreview('previewFoto')">
								<!-- Nama file akan muncul di sini -->
							</p>
							<img id="previewFoto" src="#" alt="Preview Foto" style="display: none; max-width: 100px; border-radius: 6px;" />
						</div>

						<div class="mb-3 text-start">
							<label for="ektp" class="form-label">Upload E-KTP</label>
							<input type="file" class="form-control" id="ektp" accept="image/*" onchange="handleFileName(event, 'fileNameEktp', 'previewEktp')">
							<!-- Nama file yang bisa diklik -->
							<p id="fileNameEktp"
								style="color:#b22222; cursor: pointer; font-size: 14px; margin-top: 5px;"
								onclick="togglePreview('previewEktp')">
								<!-- Nama file akan ditampilkan di sini -->
							</p>
							<!-- Preview gambar -->
							<img id="previewEktp"
								src="#" alt="Preview E-KTP" style="display: none; max-width: 100px; border-radius: 6px; border: 1px solid #ccc;" />
						</div>

					</div>
				</div>
				<button type="submit" class="btn btn-sm btn-danger w-100 mt-2">Daftar</button>
			</form>
		</div>
		<div class="login-container">
			<p>Sudah punya akun? <a href="login" class="text-danger">Login di sini</a></p>
		</div>

	</div>
