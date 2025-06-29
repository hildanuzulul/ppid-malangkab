<body class="contact-wrapper">
	<main class="main">
		<!-- Page Title -->
		<?php if ($this->session->flashdata('message')): ?>
			<div id="popup-alert" class="popup-alert">
				<?= $this->session->flashdata('message'); ?>
			</div>
		<?php endif; ?>
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Kontak</li>
					</ol>
				</nav>
				<h1>Kontak</h1>
			</div>
		</div>

		<!-- Contact Section -->
		<section id="contact" class="contact">
			<div class="contact-container" data-aos="fade-up" data-aos-delay="100">

				<!-- Maps -->
				<div class="maps-wrapper mb-5" data-aos="fade-up" data-aos-delay="200">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1598336221728!2d112.63046647500707!3d-7.982423892042944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sen!2sid!4v1742187304853!5m2!1sen!2sid"
						style="width: 100%; height: 400px; border-radius: 8px;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>

				<!-- Form dan Alamat -->
				<div class="row gy-4 mb-5">
					<!-- Form -->
					<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
						<?= form_open('contact'); ?>
						<div class="row gy-4">
							<h3>Ajukan Saran, Kritik, atau Permintaan Informasi</h3>

							<div class="col-md-12">
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
								<?= form_error('nama', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>

							<div class="col-md-12">
								<input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>

							<div class="col-md-12">
								<input type="tel" name="telepon" class="form-control" placeholder="Telepon" pattern="\d+" maxlength="13" value="<?= set_value('telepon'); ?>">
								<?= form_error('telepon', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>

							<div class="col-md-12">
								<textarea name="pesan" rows="6" class="form-control" placeholder="Pesan"><?= set_value('pesan'); ?></textarea>
								<?= form_error('pesan', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>

							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-sm btn-danger w-100">Kirim Pesan</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>


					<!-- Alamat -->
					<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
						<div class="info-item">
							<i class="bi bi-geo-alt"></i>
							<h3>Alamat Kami</h3>
							<p>Jl. Agus Salim, Kiduldalem, <br>Kec. Klojen, Kota Malang, Jawa Timur 65143</p>
						</div>
						<div class="info-item mt-4">
							<i class="bi bi-phone"></i>
							<h3>Telepon</h3>
							<p>(0341) 123456</p>
						</div>
						<div class="info-item mt-4">
							<i class="bi bi-envelope"></i>
							<h3>Email</h3>
							<p>info@malangkab.go.id</p>
						</div>
					</div>
				</div>

				<div class="search-wrapper">
					<div class="search-group">
						<input class="form-control search-input-group" type="text" placeholder="Cari...">
						<button class="btn btn-search-group" type="submit">Search</button>
					</div>
				</div>

				<!-- Tabel Kontak -->
				<div class="col-md-12">
					<table class="contact-table">
						<thead>
							<tr>
								<th>Kontak Kami</th>
							</tr>
						</thead>
						<tbody id="form-results">
							<?php foreach ($kritik_saran as $item) : ?>
								<tr>
									<td>
										<div class="fw-bolder absolute">Pesan <?= $item->nama_pengirim ?></div>
										<div><?= $item->pesan ?></div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

			</div>
		</section>
	</main>