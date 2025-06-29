<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Informasi Permohonan</title>
	<style>
		:root {
			--default-font: "Open Sans", sans-serif;
			--heading-font: "Open Sans", sans-serif;
			--nav-font: "Open Sans", sans-serif;
		}

		:root {
			--background-color: #ffffff;
			--default-color: #444444;
			--heading-color: #545454;
			--accent-color: #e96b56;
			--second-color: #b22222;
			--surface-color: #ffffff;
			--contrast-color: #ffffff;
		}

		body {
			font-family: var(--default-font);
			background-color: var(--background-color);
			color: var(--heading-color);
			margin: 0;
			padding: 0;
		}

		.email-container {
			max-width: 600px;
			margin: auto;
			background-color: var(--background-color);
			padding: 30px;
			border: 1px solid #ddd;
			border-radius: 8px;
		}

		.header {
			border-bottom: 2px solid var(--second-color);
			padding-bottom: 10px;
			margin-bottom: 20px;
		}

		.header h2 {
			color: var(--second-color);
			margin: 0;
		}

		.content p {
			line-height: 1.6;
		}

		.btn {
			display: inline-block;
			padding: 12px 20px;
			margin-top: 20px;
			background-color: var(--second-color);
			color: white;
			text-decoration: none;
			border-radius: 5px;
		}

		.btn:link,
		.btn:visited,
		.btn:hover,
		.btn:active {
			background-color: #fff;
			color: var(--second-color);
			text-decoration: none;
		}

		.footer {
			margin-top: 30px;
			font-size: 12px;
			color: #777;
			border-top: 1px solid #eee;
			padding-top: 10px;
		}
	</style>
</head>

<body>
	<div class="email-container">
		<div class="header">
			<h2>PPID Kabupaten Malang</h2>
			<p>Website Resmi: <a href="https://ppid.malangkab.go.id">ppid.malangkab.go.id</a></p>
		</div>
		<div class="content">
			<p>Kepada Yth.</p>
			<p><strong><?= $nama_pemohon ?></strong><br>
				di Tempat</p>

			<p>Dengan hormat,</p>

			<p>Menindaklanjuti permohonan informasi yang telah Anda ajukan melalui layanan PPID Kabupaten Malang, bersama ini kami sampaikan berkas informasi yang Anda minta.</p>

			<p><strong>Judul Permohonan:</strong><br>
				<?= $judul_permohonan ?></p>

			<p>Silakan klik tombol berikut untuk mengunduh berkas permohonan Anda:</p>

			<a href="<?= $link_berkas ?>" target="_blank" class="btn">Unduh Berkas</a>

			<p>Apabila terdapat pertanyaan lebih lanjut, silakan menghubungi kami melalui laman resmi atau kontak layanan PPID.</p>

			<p>Terima kasih atas perhatian Anda.</p>

			<p>Hormat kami,<br>
				<strong>Pejabat Pengelola Informasi dan Dokumentasi (PPID)</strong><br>
				Kabupaten Malang
			</p>
		</div>
		<div class="footer">
			Email ini dikirim secara otomatis oleh sistem PPID Kabupaten Malang. Mohon untuk tidak membalas ke alamat email ini.
		</div>
	</div>
</body>
</html>
