<body class="contact-wrapper">
	<main class="main">

		<!-- Page Title -->
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Contact</li>
					</ol>
				</nav>
				<h1>Contact</h1>
			</div>
		</div><!-- End Page Title -->

		<!-- Contact Section -->
		<section id="contact" class="contact">
			<div class="contact-container" data-aos="fade-up" data-aos-delay="100">
				<hr class="separator">

				<!-- ROW 1: Maps dan Form -->
				<div class="row gy-4 mb-5">
					<!-- Maps -->
					<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1598336221728!2d112.63046647500707!3d-7.982423892042944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sen!2sid!4v1742187304853!5m2!1sen!2sid"
							style="width: 100%; height: 100%; border: 0;" allowfullscreen="" loading="lazy"
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
					</div>

					<!-- Form -->
					<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
						<form class="php-email-form">
							<div class="row gy-4">
								<div class="col-md-6">
									<input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
								</div>
								<div class="col-md-6">
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="col-md-12">
									<input type="text" name="subject" class="form-control" placeholder="Telepon" required>
								</div>
								<div class="col-md-12">
									<textarea name="message" rows="6" class="form-control" placeholder="Pesan" required></textarea>
								</div>
								<div class="col-md-12 text-center">
									<div class="loading">Loading</div>
									<div class="error-message"></div>
									<div class="sent-message">Your message has been sent. Thank you!</div>
									<button type="submit" class="btn btn btn-sm btn-danger w-100">Send Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Tabel Hasil Form -->
				<div class="col-md-12">
					<table class="contact-table">
						<thead>
							<tr>
								<th>Kontak Kami</th>
							</tr>
						</thead>
						<tbody id="form-results">
							<!-- Data dari form akan ditambahkan di sini -->
						</tbody>
					</table>
				</div>

			</div>
		</section>
	</main>