<?= view('src/layouts/header', ['title' => 'Challange CTF', 'active' => 'scoreboard']) ?>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Scoreboards</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="sidebar-brand-text mx-3">#</th>
						<th class="sidebar-brand-text mx-3">Username</th>
						<th class="sidebar-brand-text mx-3">Score</th>
					</tr>
				</thead>
				<?php $no = 1; foreach ($score as $key): ?>
					<tbody>
						<tr>
							<td class="text-dark sidebar-brand-text mx-3"><?= $no++?></td>
							<td class="text-dark sidebar-brand-text mx-3"><?= $key->username ?></td>
							<td class="text-dark sidebar-brand-text mx-3"><?= $key->score ?></td>
						</tr>
					</tbody>
				<?php endforeach ?>
			</table>
		</div>
	</div>
	<br>
</div>
<?= view('src/layouts/footer') ?>
<!-- Js Challange -->
<script src="/assets/challange.js"></script>