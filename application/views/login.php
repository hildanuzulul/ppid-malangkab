<body>
	<div class="user-login-wrapper">
		<div class="user-login-container text-center">
			<h2>Login</h2>
			<form>
				<div class="mb-3 text-start">
					<label for="username" class="form-label">Username</label>
					<div class="input-group">
						<span class="input-group-text"><i class="bi bi-person-fill"></i></span>
						<input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda">
					</div>
				</div>

				<div class="mb-3 text-start position-relative">
					<label for="password" class="form-label">Password</label>
					<div class="input-group">
						<span class="input-group-text">
							<i class="bi bi-lock-fill"></i>
						</span>
						<input type="password" class="form-control pe-5" id="password" placeholder="Masukkan Password Anda" required>
					</div>
					<!-- Icon mata -->
					<i id="eyeIcon"
						class="bi bi-eye-fill"
						onclick="togglePassword()"
						style="position: absolute; top: 50%; right: 15px; transform: translateY(20%); cursor: pointer; color: #6c757d; z-index: 10;">
					</i>
				</div>


				<button type="submit" class="btn btn-sm btn-danger w-100">Login</button>
			</form>
		</div>

		<div class="register-container">
			<p>Belum memiliki akun? <a href="registrasi" class="text-danger">Daftar di sini</a></p>
		</div>
	</div>
