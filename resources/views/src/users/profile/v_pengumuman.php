<?= view('src/layouts/header', ['title' => 'Notification', 'active' => 'notif']) ?>
<style type="text/css">
	.padding{
		padding-bottom: 30px;
		/*border-radius: 0;*/
	}
</style>

<div class="row">
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="padding">	
				<div class="jumbotron" style="background-color: #343a40 !important;">
					<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Notification</h1>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<?php foreach ($notif->chunk(3) as $notifs): ?>
				<div class="row">
					<?php foreach ($notifs as $key): ?>
						<div class="col-lg-4">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary"><?= $key->title?></h6>
								</div>
								<div class="card-body">
									<blockquote>
										<p class="text-dark" style="font-weight: bold">
											<?= $key->content?>
										</p>
									</blockquote>
									<p>
										<?= $key->created_at?>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<?= view('src/layouts/footer') ?>