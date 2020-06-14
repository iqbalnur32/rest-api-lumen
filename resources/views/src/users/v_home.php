<?= view('src/layouts/header', ['title' => 'Dashboard Users', 'active' => 'dashboard_user']) ?>

<div class="container-fluid">
	<h2 class="text-dark">Selamat Datang <?= $_SESSION['username']?></h2>
	<hr>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header" style="background-color: #343a40 !important;">
				<h3 class="text-center" style="color: white;">Solved Task <?= $_SESSION['username']?></h3>
			</div>
			<div class="card-body">	
				<div class="row">
					<div class="col-lg-12">
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
								<?php $temp = explode(" ", $key->created_at)?>
								<tr>
									<td><?=$i++?></td>
									<td class="text-center text-dark"><?=$key->name_task?></td>
									<td class="text-center text-dark"><?=$key->task_point?></td>
									<td class="text-center text-dark"><?=$temp[0]?></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?= view('src/layouts/footer') ?>
<script src="/assets/users_home.js"></script>