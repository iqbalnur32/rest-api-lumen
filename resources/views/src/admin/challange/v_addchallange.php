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
						<div class="form-group">
							<label>Author CTF</label>
							<input class="form-control" type="text" name="author" required>
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
						<div class="form-group">
							<label class="text-dark">Hint CTF</label>
							<textarea class="form-control" name="hint"></textarea>
						</div>
						<div class="float-right">
							<button class="btn btn-primary btn-xl" type="submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<br>
<?= view('src/layouts/footer') ?>