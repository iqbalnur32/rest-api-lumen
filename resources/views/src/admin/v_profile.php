<?= view('src/layouts/header', ['title' => 'Dashboard Admin', 'active' => 'settings']) ?>
<style type="text/css">
	.padding-bottom{
		padding-bottom: 20px;
	}
</style>
<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Setting Profile</h1>
		</div>
	</div>
	<form method="POST" action="<?= url('admin/settings')?>">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"></h3>
					</div>
					<div class="padding-bottom"></div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" value="<?= $users->username?>" name="username">
							<input class="form-control" type="hidden" value="<?= $users->id_users?>" name="id_users">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" value="<?= $users->email?>" name="email">
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input class="form-control" type="text" value="<?= $users->nama?>" name="nama">
						</div>
						<div class="form-group">
							<label>Website</label>
							<input class="form-control" type="text" value="<?= $users->website?>" name="website">
						</div>
					</div>
				</div>
			</div>	
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"></h3>
					</div>
					<div class="padding-bottom"></div>
					<div class="col-lg-12">
						
						<h5 style="color: red; font-weight: 800">! Masukan Password Jika Ingin Menganti Data</h5>

						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" value="<?= $users->password?>" name="password">
						</div>
						<div class="form-group">
							<label>Password Confirmed</label>
							<input class="form-control" type="password" value="" required name="password_confirmation">
						</div>
					</div>
				</div><br><br>
				<div class="float-right">
					<button type="submit" class="btn btn-success btn-xl">Update Data</button>
				</div>
			</div>
		</div>
	</form>
</div>
<br>
<?= view('src/layouts/footer') ?>
<script src="/assets/pengumuman.js"></script>
