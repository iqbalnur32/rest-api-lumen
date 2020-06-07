<?= view('src/layouts/header', ['title' => 'Management User', 'active' => 'management']) ?>

<style type="text/css">
	
	#card .card-title{
		font-size: 20px;
		text-align: center;
		color: black;
		font-weight: 600;
	}

</style>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;"> 
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Managament User</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card" id="card">
				<div class="card-header">
					 <h2 class="card-title">Management User</h2>
					 <div class="float-right">
					 	<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddManagement">Tambah Users</button>
					 </div>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<th>No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Score</th>
							<th>Level</th>
							<th class="text-center"><i class="fas fa-cogs"></i></th>
						</thead>
						<?php $i=1; foreach ($management as $key): ?>
							<tbody id="management">
								<tr id="management<?=$key->id_pengumuman?>">
									<td class="text-dark"><?= $i++?></td>
									<td class="text-dark"><?= $key->username?></td>
									<td class="text-dark"><?= $key->email?></td>
									<td class="text-dark"><?= $key->score?></td>
									<td class="text-dark"><?= $key->name_level?></td>
									<td align="center">
										<button class="btn btn-warning btn-sm open_modal_management" value="<?= $key->id_users?>"><i class="fas fa-pencil-alt"></i></button>
										<button class="btn btn-danger btn-sm delete-management" value="<?= $key->id_users?>"><i class="fas fa-trash"></i></button>
									</td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Management -->
<div class="modal fade" id="modalAddManagement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Management User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card-body">
					<form method="POST" action="<?= url('admin/management-user/add')?>">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" required>
								</div>	
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" type="text" name="nama" required>
								</div>	
								<div class="form-group">
									<label>Level Id</label>
									<select class="form-control" name="level_id">
										<?php foreach ($level as $key): ?>
											<option value="<?= $key->id_level?>"><?= $key->name_level?></option>
										<?php endforeach ?>
									</select>
								</div>	
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" required>
								</div>	
								<div class="form-group">
									<label>Website</label>
									<input class="form-control" type="text" name="website" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="text" name="password" required>
								</div>	
							</div>
						</div>
						<div class="float-right">
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Add Management -->

<!-- Modal Edit Management -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Management Form</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="frmProducts" name="frmProducts" novalidate="">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" id="username" required>
								<input type="hidden" id="id_users" name="id_users">
							</div>	
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" type="text" name="nama" id="nama" required>
							</div>
							<div class="form-group">
								<label>Level Users</label>
								<select class="form-control" id="level_id" name="level_id">
									<?php foreach ($level as $key): ?>
										<option value="<?= $key->id_level?>"><?= $key->name_level?></option>
									<?php endforeach ?>
								</select>
							</div>		
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" type="email" name="email" id="email" required>
							</div>	
							<div class="form-group">
								<label>Website</label>
								<input class="form-control" type="text" name="website" id="website" required>
							</div>
							<div class="form-group">
								<label>Score</label>
								<input class="form-control" type="text" name="score" id="score" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="text" name="password" id="password" required>
							</div>	
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-save" value="add">Update Data</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Edit Management -->
<?= view('src/layouts/footer') ?>
<script type="text/javascript" src="/assets/user_management.js"></script>