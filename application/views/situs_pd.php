<body class="sop-page">
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
						<ul class="nav flex-column nav-pills kategori-situs-pd">
							<?php foreach ($menu_kategori as $item): ?>
								<li class="nav-item">
									<a class="nav-link <?= ($item == $kategori) ? 'active' : '' ?>"
										href="<?= base_url('situs_pd/index/' . $item) ?>">
										<?= ucfirst($item) ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Tabel -->
					<div class="col-md-9">
						<h3><?= ucfirst($kategori) ?></h3>
						<div class="table-responsive">
							<table class="table table-bordered custom-situs-table">
								<thead>
									<tr>
										<th style="width: 5%;">#</th>
										<th style="width: 28%;">Nama PD</th>
										<th style="width: 52%;">Alamat</th>
										<th style="width: 15%;">Telepon</th>
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
											<td colspan="4" class="text-center" style="padding: 20px; color: #888;">
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
</body>
