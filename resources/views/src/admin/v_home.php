<?= view('src/layouts/header', ['title' => 'Dashboard Admin', 'active' => 'dashboard_admin']) ?>
<style type="text/css">
	.padding-buttom{
		padding-bottom: 20px;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header" style="background-color: #343a40 !important;">
					<h3 class="text-center" style="font-weight: 800; color: #fff;">Last Login Monitoring</h3>
					<input type="date" id="dateLastLogin" value="<?= date('Y-m-d')?>">
				</div>
				<div class="card-body">
					<div style="height: 250px;" id="chartLastLogin"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="padding-buttom"></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header" style="background-color: #343a40 !important;">
					<h3 class="text-center" style="font-weight: 800; color: #fff;">Tops Users Score CTF</h3>
				</div>
				<div class="card-body">
					<table class="table">
						<thead style="">
							<tr>
								<th>Ranked</th>
								<th>Username</th>
							</tr>
						</thead>
						<?php $i=1; foreach ($top_score as $key): ?>
							<tbody>
								<tr>
									<td class="text-dark"><?= $i++?></td>
									<td class="text-dark"><?= $key?></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
					<ul id="ul">

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?= view('src/layouts/footer') ?>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
<!--   <script src="https://www.gstatic.com/firebasejs/7.15.4/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.15.4/firebase-analytics.js"></script> -->
	<!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script> -->
<script src="/assets/admin.js"></script>