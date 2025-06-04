<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Situs Perangkat Daerah</title>
	<link rel="stylesheet" href="situs_pd.css">
</head>

<body class="situs-pd-page">
	<main class="main">
		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Situs PD</li>
					</ol>
				</nav>
				<h1>Situs Perangkat Daerah</h1>
			</div>
		</div>

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-4">
					<!-- Sidebar -->
					<div class="col-md-3">
						<ul class="nav flex-column nav-pills sidebar-situs-pd">
							<?php foreach ($menu_kategori as $slug => $label): ?>
								<li class="nav-item">
									<a class="nav-link <?= ($kategori == $label) ? 'active' : '' ?>"
										href="<?= base_url('situs_pd/' . $slug) ?>">
										<?= ucfirst($label) ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Tabel -->
					<div class="col-md-9">
						<h3><?= ucfirst($kategori) ?></h3>
						<div class="table-header">
							<input type="text" class="search-situs-pd" id="searchInput" placeholder="Cari...">
						</div>
						<div class="table-wrapper">
							<table class="table-situs-pd">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama PD</th>
										<th>Alamat</th>
										<th>Telepon</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($list_pd) > 0): ?>
										<?php $i = 1;
										foreach ($list_pd as $pd): ?>
											<tr>
												<td><?= $i++ ?></td>
												<td><?= $pd->nama_pd ?></td>
												<td><?= $pd->alamat ?></td>
												<td><?= $pd->telepon ?></td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="4" class="text-center">
												Tidak ada data tersedia untuk kategori ini.
											</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<p class="table-count">Showing 1 to <?= count($list_pd) ?> of <?= count($list_pd) ?> rows</p>
					</div>
				</div>
			</section>
		</div>
	</main>
