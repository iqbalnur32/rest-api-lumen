<?= view('src/layouts/header', ['title' => 'Dashboard Users', 'active' => 'dashboard_user']) ?>

<div class="container-fluid">
	<h2 class="text-dark">Selamat Datang <?= $_SESSION['username']?></h2>
	<hr>
</div>

<?= view('src/layouts/footer') ?>
<script src="/assets/users_home.js"></script>