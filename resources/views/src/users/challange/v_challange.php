<?= view('src/layouts/header', ['title' => 'Challange CTF', 'active' => 'challange']) ?>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Challanges CTF</h1>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12 col-md-12" style="padding-bottom: 15px;">
			<div class="container-fluid">
				<h4 class="h3 mb-0 text-gray-900" style="font-family: 'Nova Square', cursive;">Reversing Engineering</h4>
				<div class="buttom-top" style="padding-bottom: 15px;"></div>
				<?php foreach ($task->chunk(4) as $items): ?>
					<div class="row">
						<?php foreach ($items as $key): ?>
							<?php if ($key->id_category == 1): ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<button class="btn btn-sm" data-toggle="modal" id="select" data-target="#data_reversing" 
													data-id_task="<?= $key->id_task ?>"
													data-name_task="<?= $key->name_task ?>"
													data-bonus="<?= $key->task_point ?>"
													data-hint="<?= $key->hint ?>"
													data-author="<?= $key->author ?>"
												>
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $key->name_task?></div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $key->task_point?></div>
													</div>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-12 col-md-12" style="padding-bottom: 15px;">
			<div class="container-fluid">
				<h4 class="h3 mb-0 text-gray-900" style="font-family: 'Nova Square', cursive;">Cryptography</h4>
				<div class="buttom-top" style="padding-bottom: 15px;"></div>
				<?php foreach ($task->chunk(4) as $items): ?>
					<div class="row">
						<?php foreach ($items as $key): ?>
							<?php if ($key->id_category == 2): ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<button class="btn btn-sm" data-toggle="modal" id="select" data-target="#data_reversing" 
													data-id_task="<?= $key->id_task ?>"
													data-name_task="<?= $key->name_task ?>"
													data-bonus="<?= $key->task_point ?>"
													data-hint="<?= $key->hint ?>"
													data-author="<?= $key->author ?>"
												>
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $key->name_task?></div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $key->task_point?></div>
													</div>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-12 col-md-12" style="padding-bottom: 15px;">
			<div class="container-fluid">
				<h4 class="h3 mb-0 text-gray-900" style="font-family: 'Nova Square', cursive;">Web</h4>
				<div class="buttom-top" style="padding-bottom: 15px;"></div>
				<?php foreach ($task->chunk(4) as $items): ?>
					<div class="row">
						<?php foreach ($items as $key): ?>
							<?php if ($key->id_category == 3): ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<button class="btn btn-sm" data-toggle="modal" id="select" data-target="#data_reversing" 
													data-id_task="<?= $key->id_task ?>"
													data-name_task="<?= $key->name_task ?>"
													data-bonus="<?= $key->task_point ?>"
													data-hint="<?= $key->hint ?>"
													data-author="<?= $key->author ?>"
												>
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $key->name_task?></div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $key->task_point?></div>
													</div>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-12 col-md-12" style="padding-bottom: 15px;">
			<div class="container-fluid">
				<h4 class="h3 mb-0 text-gray-900" style="font-family: 'Nova Square', cursive;">Miscellaneous</h4>
				<div class="buttom-top" style="padding-bottom: 15px;"></div>
				<?php foreach ($task->chunk(4) as $items): ?>
					<div class="row">
						<?php foreach ($items as $key): ?>
							<?php if ($key->id_category == 4): ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<button class="btn btn-sm" data-toggle="modal" id="select" data-target="#data_reversing" 
													data-id_task="<?= $key->id_task ?>"
													data-name_task="<?= $key->name_task ?>"
													data-bonus="<?= $key->task_point ?>"
													data-hint="<?= $key->hint ?>"
													data-author="<?= $key->author ?>"
												>
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $key->name_task?></div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $key->task_point?></div>
													</div>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="container-fluid">
				<h4 class="h3 mb-0 text-gray-900" style="font-family: 'Nova Square', cursive;">Forensics</h4>
				<div class="buttom-top" style="padding-bottom: 15px;"></div>
				<?php foreach ($task->chunk(4) as $items): ?>
					<div class="row">
						<?php foreach ($items as $key): ?>
							<?php if ($key->id_category == 5): ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<button class="btn btn-sm" data-toggle="modal" id="select" data-target="#data_reversing" 
													data-id_task="<?= $key->id_task ?>"
													data-name_task="<?= $key->name_task ?>"
													data-bonus="<?= $key->task_point ?>"
													data-hint="<?= $key->hint ?>"
													data-author="<?= $key->author ?>"
												>
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $key->name_task?></div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $key->task_point?></div>
													</div>
												</button>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="data_reversing" tabindex="-1" role="dialog" aria-labelledby="data_reversing" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title">
					<ul class="nav nav-tabs" id="myTab">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabOne">Soal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabTwo">Solved</a>
						</li>
					</ul>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab-content pt-3" id="myTabContent">
					<div class="tab-pane fade active show challange" id="tabOne">
						<h2 class="text-center text-gray-900" id="name_task"></h2>
						<h3 class="text-center text-gray-900" id="bonus"></h3><br>
						<div class="container-fluid">
							<p class="text-gray-900" id="hint"></p>
							<p class="text-gray-900">Author: <span id="author"></span></p>
							<div class="padding-bottom" style="padding-bottom: 15px;">
								<form id="frmProducts" name="frmProducts" novalidate="">
									<div class="row">
										<div class="col-lg-10">
											<input class="form-control" type="hidden" id="id_task" name="id_task" required="">	
											<input class="form-control" type="text" name="flag" required="" id="flag">	
										</div>
										<div class="col-lg-2">
											<div class="">
												<button class="btn btn-md btn-outline-secondary" id="btn-save">SUBMIT</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabTwo">Tab Two Content</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= view('src/layouts/footer') ?>
<!-- Js Challange -->
<script src="/assets/challange.js"></script>