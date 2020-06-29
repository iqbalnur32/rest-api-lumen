<?= view('src/layouts/header', ['title' => 'Dashboard Users', 'active' => 'dashboard_user']) ?>
<style type="text/css">
	.padding-bottom{
		padding-bottom: 30px;
	}

	.panel li{
		text-align: left;
	}

	.panel-header h3{
		font-weight: 800;
		color: #fff;
	}

	.panel-header{
		background-color: #343a40 !important;
	}
</style>
<div class="container-fluid">
	<h2 class="text-dark">Selamat Datang <?= $_SESSION['username']?></h2>
	<hr>
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesentase Task Solved</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= floor($total_persentase)?> % </div>
						</div>
						<div class="col-auto">
							<i class="fas fa-percent fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="padding-bottom"></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header panel-header">
					<h3 class="card-title text-center">Petunjuk</h3>
				</div>
				<div class="card-body">
					<div class="panel">
						<ul>
							<li>CTF By NYOK-CTF</li>
							<li>Terdapat Challange Yang Bisa Kalian Selesaikan</li>
							<li>Scoreboard Dan Petunjuk</li>
							<li>Patuhi Rules</li>
							<li>Dilarang Merusak Sistem</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="padding-bottom"></div>
	<div class="row">	
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header" style="background-color: #343a40 !important;">
					<h3 class="text-center" style="color: white;">Solved Challange</h3>
				</div>
				<div class="card-body">	
					<div class="row">
						<div class="col-lg-12">
							<div class="container-fluid">
								<table class="table">  
									<thead>
										<tr>
											<th>No</th>
											<th class="text-center text-dark">Task Name</th>
											<th class="text-center text-dark">Task Points</th>
											<th class="text-center text-dark">Tanggal</th>
										</tr>
									</thead>
									<?php $i = 1;  foreach ($solved as $key): ?>
									<tbody>
										<?php if($key == null): ?>
											<h3>Kosong</h3>
											<?php else: ?>
												<?php $temp = explode(" ", $key->created_at)?>
												<tr>
													<td><?=$i++?></td>
													<td class="text-center text-dark"><?=$key->name_task?></td>
													<td class="text-center text-dark"><?=$key->task_point?></td>
													<td class="text-center text-dark"><?=$temp[0]?></td>
												</tr>
											<?php endif; ?>
										</tbody>
									<?php endforeach ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= view('src/layouts/footer') ?>
	<script src="/assets/users_home.js"></script>