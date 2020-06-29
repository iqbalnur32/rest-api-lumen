<?= view('src/layouts/header', ['title' => 'Dashboard Admin', 'active' => 'master_data_challange']) ?>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Add Challanges CTF</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="<?= url('admin/add-challange')?>">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label class="text-dark">Kategori CTF</label>
							<select class="form-control" name="id_category">
								<?php foreach ($kategori as $key): ?>
									<option value="<?= $key->id_category?>"><?= $key->category_name?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Points</label>
							<input class="form-control" type="number" name="task_point" required>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="text-dark">Nama Task</label>
							<input name='name_task' type="text" class="form-control" placeholder="Reversing Me !!" required >
							<!-- <small style="color: red;">* </small> -->
						</div>
						<div class="form-group">
							<label class="text-dark">Flag Task</label>
							<input name='flag' type="text" class="form-control" placeholder="flag_ctf{aku_dimana}" required >
							<!-- <small style="color: red;">* </small> -->
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Author CTF</label>
					<input class="form-control" type="text" name="author" required >
					<small style="color: red;">* Author Berdasarkan Username Anda</small>
				</div>
				<div class="form-group">
					<label class="text-dark">Hint CTF</label>
					<textarea class="form-control Challanges" name="hint"></textarea>
				</div>
				<div class="float-right">
					<button class="btn btn-primary btn-xl" type="submit">Submit</button>
				</div>
			</form>
		</div>
		<div class="col-lg-12" style="padding-bottom: 12px;">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Name Task</th>
							<th>Flag Task</th>
							<th>Points tags</th>
							<th class="text-center"><i class="fas fa-cogs"></i></th>
						</tr>
					</thead>
					<?php $i = 1; foreach ($task as $key): ?>
						<tbody id="task">
							<tr id="task<?=$key->id_task?>">
								<td><?= $i++?></td>
								<td><?= $key->name_task?></td>
								<td><?= $key->flag?></td>
								<td><?= $key->task_point?></td>
								<td align="center">
									<button class="btn btn-warning btn-sm open_challange" value="<?=$key->id_task?>"><i class="fas fa-pencil-alt"></i></button>
									<button class="btn btn-danger btn-sm task_delete" value="<?=$key->id_task?>"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<br>

<!-- Modal Edit -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Pengumuman Form</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="frmProducts" name="frmProducts" novalidate="">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Name Task</label>
								<input class="form-control" id="name_task" type="text" name="name_task">
								<input type="hidden" id="id_task" name="id_task">
							</div>
							<div class="form-group">
								<label>Category CTF</label>
								<select class="form-control" id="id_category" name="id_category">
									<?php foreach ($kategori as $key): ?>
										<option value="<?= $key->id_category?>"><?= $key->category_name?></option>
									<?php endforeach ?>
								</select>
							</div>	
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Task Point</label>
								<input class="form-control" type="number" name="task_point" id="task_point">
							</div>
							<div class="form-group">
								<label>Flag</label>
								<input class="form-control" type="text" name="flag" id="flag">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Author Task</label>
						<input class="form-control" id="author" type="text" name="author">
					</div>
					<div class="form-group">
						<label>Hint</label>
						<textarea class="form-control Challanges" name="hint" id="hint"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-save" value="add">Update Data</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Edit -->
<?= view('src/layouts/footer') ?>
<script type="text/javascript" src="/assets/add_challange.js"></script>