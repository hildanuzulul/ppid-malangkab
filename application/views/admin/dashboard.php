<!-- Main Content -->
<div class="main-content">
	<div class="container-fluid py-4 mx-3">
		<h2 class="mb-4">Dashboard</h2>

		<!-- Cards -->
		<div class="container mt-4">
			<div class="row">
				<!-- Card Jumlah User -->
				<div class="col-md-4 mb-4">
					<div class="dashboard-card card-user">
						<h5>Jumlah User</h5>
						<p class="dashboard-count"><?= $total_user ?></p>
					</div>
				</div>

				<!-- Card Jumlah Permintaan Data -->
				<div class="col-md-4 mb-4">
					<div class="dashboard-card card-permintaan">
						<h5>Permintaan Data</h5>
						<p class="dashboard-count"><?= $total_permintaan ?></p>
					</div>
				</div>

				<!-- Card Kritik & Saran -->
				<div class="col-md-4 mb-4">
					<div class="dashboard-card card-kritik">
						<h5>Kritik & Saran</h5>
						<p class="dashboard-count"><?= $total_kritik_saran ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-4">
			<div class="card-header bg-red text-red">
				<h5 class="mb-0">Jumlah Permintaan per Bulan</h5>
			</div>
			<div class="card-body" style="height: 320px;">
				<canvas id="permintaanChart"></canvas>
			</div>
		</div>


		<!-- Chart.js CDN -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<script>
			const ctx = document.getElementById('permintaanChart').getContext('2d');
			const permintaanChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: <?= $chart_bulan ?>,
					datasets: [{
						label: 'Jumlah Permintaan',
						data: <?= $chart_jumlah ?>,
						backgroundColor: '#b22222'
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false
						},
						tooltip: {
							callbacks: {
								label: function(context) {
									return 'Jumlah: ' + context.parsed.y;
								}
							}
						}
					},
					scales: {
						y: {
							beginAtZero: true,
							ticks: {
								precision: 0,
								stepSize: 1
							}
						}
					}
				}
			});
		</script>
	</div>
</div>