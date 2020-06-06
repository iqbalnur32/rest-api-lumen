<?= view('src/layouts/header', ['title' => 'Challange CTF', 'active' => 'profile']) ?>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";><?= $data->username?></h1>
			<h1 class="text-center text-white"><?= $data->score?> points</h1>
		</div>
	</div>
	<form method="POST" action="<?= url('users/profile/update')?>">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #343a40; font-family: 'Nova Square', cursive">
					<h4 class="text-center" style="color: white;"> User Profile </h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-dark">Username</label>
								<input name='id_users' type="hidden" class="form-control" value="<?= $edit[0]->id_users?>" required>
								<input name='username' type="text" class="form-control" value="<?= $edit[0]->username?>" required>
							</div>
							<div class="form-group">
								<label class="text-dark">Nama</label>
								<input name='nama' type="text" class="form-control" value="<?= $edit[0]->nama?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-dark">Email</label>
								<input name='email' type="text" class="form-control" value="<?= $edit[0]->email?>" required>
							</div>
							<div class="form-group">
								<label class="text-dark">Website</label>
								<input name='website' type="text" class="form-control" value="<?= $edit[0]->website?>" required>
							</div>
							<div class="float-right">
								<button class="btn btn-primary btn-xl" type="submit">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?= view('src/layouts/footer') ?>
<!-- Js Challange -->
<script src="/assets/challange.js"></script>