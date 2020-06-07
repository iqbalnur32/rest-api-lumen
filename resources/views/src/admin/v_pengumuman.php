<?= view('src/layouts/header', ['title' => 'Dashboard Admin', 'active' => 'add_pengumuman']) ?>

<div class="container-fluid">
	<div class="jumbotron" style="background-color: #343a40 !important;">
		<div class="container">
			<h1 class="text-center" style="font-size: 2.5rem; line-height: 1.2; color: #fff; font-family: 'Nova Square', cursive";>Pengumuman CTF</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3 class="text-dark text-center" style="font-family: 'Nova Square', cursive;">Add Pengumuman / Notification</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= url('admin/add-pengumuman')?>">
						<div class="form-group">
							<label>Title</label>
							<input class="form-control" type="text" name="title" required>
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea class="content_pengumuman_add form-control" name="content" required></textarea>
						</div>
						<div class="float-right">
							<button class="btn btn-primary btn-xl" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Content</th>
						<th class="text-center"><i class="fas fa-cogs"></i></th>
					</tr>
				</thead>
				<?php $i = 1; foreach ($notif as $key): ?>
					<tbody id="pengumuman">
						<tr id="pengumuman<?=$key->id_pengumuman?>">
							<td class="text-dark"><?= $i++?></td>
							<td class="text-center text-dark"><?= $key->title?></td>
							<td class="text-center text-dark"><?= $key->content?></td>
							<td align="center">
								<button class="btn btn-warning btn-sm open_modal" value="<?=$key->id_pengumuman?>"><i class="fas fa-pencil-alt"></i></button>
								<button class="btn btn-danger btn-sm pengumuman_delete" value="<?=$key->id_pengumuman?>"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					</tbody>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<br>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Pengumuman Form</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="frmProducts" name="frmProducts" novalidate="">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" id="title" type="text" name="title">
						<input type="hidden" id="id_pengumuman" name="id_pengumuman">
					</div>
					<div class="form-group">
						<label>Label</label>
						<textarea class="content_pengumuman_add form-control" id="content_data" name="content"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-save" value="add">Update Data</button>
			</div>
		</div>
	</div>
</div>
<?= view('src/layouts/footer') ?>
<script src="/assets/pengumuman.js"></script>
