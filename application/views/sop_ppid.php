<body class="sop-page">
	<main class="main">

		<div class="page-title" data-aos="fade">
			<div class="container">
				<nav class="breadcrumbs">
					<ol>
						<li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil</li>
						<li class="breadcrumb-item active" aria-current="page">Standart Operasional Prosedur</li>
					</ol>
				</nav>
				<h1>Standart Operasional Prosedur (SOP) PPID</h1>
			</div>
		</div><!-- End Page Title -->

		<div class="container content" data-aos="fade-up" data-aos-delay="100">
			<hr class="separator">
			<section id="content">
				<div class="row g-5">
					<div class="col-md-8">
						<div class="table-header">
							<input type="text" class="search-sop" id="searchInput" placeholder="Cari...">
						</div>
						<div class="tablesop-wrapper">
							<div class="tablesop-responsive">
								<table class="tablesop" id="sopTable">
									<thead>
										<tr>
											<th>Tahun</th>
											<th>NAMA SOP</th>
											<th>File</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($sop as $item): ?>
											<tr>
												<td><?= $item->tahun ?></td>
												<td><?= $item->nama_sop ?></td>
												<td>
													<a href="<?= $item->file_sop ?>" class="my-custom-button btn btn-warning btn-sm" target="_blank">Detail</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<p style="font-family: var(--default-font); font-size: 14px;color: var(--heading-color); margin-top: 8px;">Showing 1 to <?= count($sop) ?> of <?= count($sop) ?> rows</p>
					</div>

					<div class="col-md-4">
						<?php $this->load->view('informasi_samping'); ?>
					</div>
				</div>
			</section>
		</div>
	</main>
