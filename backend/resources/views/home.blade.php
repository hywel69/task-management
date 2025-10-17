<x-templete_top :data="$data" />
<style>
h1 {
  color: #373a39;
  font-weight: 300;
  font-size: 100px;
  text-transform: uppercase;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  pointer-events: none;
}

.center {
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 50%;
}
</style>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Overview - Aktivitas Mingguan</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<canvas id="tasksLineChart" height="150"></canvas>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Distribusi Tugas per Tim</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<canvas id="tasksBarChart" height="150"></canvas>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Daftar Tugas (Dummy Data)</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<p class="mb-3">Selamat Datang di Aplikasi Task Management System. Berikut contoh tabel tugas untuk tampilan demo.</p>

				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Judul Tugas</th>
								<th>Penanggung Jawab</th>
								<th>Deadline</th>
								<th>Status</th>
								<th style="width:200px;">Progress</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Design Landing Page</td>
								<td>Ani</td>
								<td>2025-10-25</td>
								<td><span class="badge badge-success">Selesai</span></td>
								<td>
									<div class="progress" style="height:10px;">
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Integrasi API</td>
								<td>Budi</td>
								<td>2025-10-28</td>
								<td><span class="badge badge-warning">Dalam Proses</span></td>
								<td>
									<div class="progress" style="height:10px;">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 65%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Penulisan Dokumen</td>
								<td>Citra</td>
								<td>2025-11-02</td>
								<td><span class="badge badge-info">Menunggu Review</span></td>
								<td>
									<div class="progress" style="height:10px;">
										<div class="progress-bar bg-info" role="progressbar" style="width: 40%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Testing & QA</td>
								<td>Dedi</td>
								<td>2025-11-10</td>
								<td><span class="badge badge-danger">Tertunda</span></td>
								<td>
									<div class="progress" style="height:10px;">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 10%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Deploy ke Produksi</td>
								<td>Elisa</td>
								<td>2025-11-15</td>
								<td><span class="badge badge-secondary">Terjadwal</span></td>
								<td>
									<div class="progress" style="height:10px;">
										<div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;"></div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
	// Line chart: aktivitas mingguan (dummy)
	const ctxLine = document.getElementById('tasksLineChart').getContext('2d');
	new Chart(ctxLine, {
		type: 'line',
		data: {
			labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
			datasets: [
				{
					label: 'Tugas Selesai',
					data: [5, 7, 8, 6, 9, 10, 12],
					borderColor: '#28a745',
					backgroundColor: 'rgba(40,167,69,0.08)',
					fill: true,
					tension: 0.3,
					pointRadius: 4
				},
				{
					label: 'Tugas Dibuat',
					data: [6, 5, 9, 7, 11, 8, 10],
					borderColor: '#007bff',
					backgroundColor: 'rgba(0,123,255,0.06)',
					fill: true,
					tension: 0.3,
					pointRadius: 4
				}
			]
		},
		options: {
			responsive: true,
			plugins: {
				legend: { position: 'top' }
			},
			scales: {
				y: { beginAtZero: true, ticks: { stepSize: 2 } }
			}
		}
	});

	// Bar chart: distribusi per tim (dummy)
	const ctxBar = document.getElementById('tasksBarChart').getContext('2d');
	new Chart(ctxBar, {
		type: 'bar',
		data: {
			labels: ['Frontend', 'Backend', 'QA', 'Design', 'DevOps'],
			datasets: [
				{
					label: 'Jumlah Tugas',
					data: [12, 18, 9, 7, 5],
					backgroundColor: ['#17a2b8', '#6f42c1', '#ffc107', '#fd7e14', '#20c997'],
					borderRadius: 6
				}
			]
		},
		options: {
			responsive: true,
			plugins: {
				legend: { display: false }
			},
			scales: {
				y: { beginAtZero: true, ticks: { stepSize: 5 } }
			}
		}
	});
});
</script>
<x-templete_bottom />