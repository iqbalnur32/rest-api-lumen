<?= view('src/layouts/header', ['title' => 'Dashboard Admin', 'active' => 'master_data_challange']) ?>

<div class="container-fluid">
	<!-- <div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Add Challanges CTF</h1>
		</div>
	</div> -->
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h3 class="text-dark text-center" style="font-family: 'Nova Square', cursive">Add Category CTF</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= url('admin/ctf-category')?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark">ID Category</label>
									<input name='flag' type="id_category" class="form-control" placeholder="example : 1" required >
									<!-- <small style="color: red;">* </small> -->
								</div>
								<div class="form-group">
									<label class="text-dark">Category Nama</label>
									<input name='category_name' type="text" class="form-control" placeholder="Cryptopgrapy" required >
								</div>
								<div class="form-group">
									<label class="text-dark">Description</label>
									<input name='description' type="description" class="form-control" placeholder="Cryptopgrapy" required >
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
		<div class="col-lg-6">
			<table  class="table" id="myTable">
				<thead>
					<tr>
						<th class="text-dark text-center">ID</th>
						<th class="text-dark text-center">Category Name</th>
						<th class="text-dark text-center">Description</th>
						<th class="text-dark text-center"><i class="fas fa-fw fa-cogs"></i></th>
					</tr>
				</thead>
				<?php $i = 1; foreach ($kategory as $key): ?>
					<tbody id="category">
						<tr id="category<?= $key->id_category?>">
							<td class="text-dark text-center"><?= $i++?></td>
							<td class="text-dark text-center"><?= $key->category_name?></td>
							<td class="text-dark text-center"><?= $key->description?></td>
							<td align="center">
								<button class="btn btn-warning btn-sm open_modal_category" value="<?=$key->id_category?>"><i class="fas fa-pencil-alt"></i></button>
								<button class="btn btn-danger btn-sm delete-category" value="<?= $key->id_category?>"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					</tbody>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal Edit Category -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Category Form</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="frmProducts" name="frmProducts" novalidate="">
					<div class="form-group">
						<label>Category</label>
						<input class="form-control" id="category_name" name="category_name" type="text">
						<input type="hidden" id="id_category" name="id_category">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" id="description" name="description"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-save" value="add">Update Data</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Edit Category -->
<?= view('src/layouts/footer') ?>
<script type="text/javascript" src="/assets/category_ctf.js"></script>