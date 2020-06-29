<!DOCTYPE html>
<html>
<head>
	<title>NYOK CTF</title>
	<link rel="icon" type="img/png" href="/template/img/ctf.png">
	<!-- Bootsrap Css -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href="/assets/css/owl.carousel.min.css" rel="stylesheet">
	<!-- Custom Css -->
	<link href="/assets/css/landing.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-targer="#indexNavbar">

	<!-- Navbar -->
	<nav class="navbar navbar-expand-md fixed-top">
		<div class="container">
			<a class="navbar-brand" href=""><img src="/template/img/ctf.png" style="height: 70px;"></a>

			<button class="navbar navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#indexNavbar" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<div class="collapse navbar-collapse" id="indexNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> 
						<a class="nav-link" href="#obrand-intro-area">Home</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="#obrand-intro-area" data-toggle="modal" data-target="#loginModal">Login</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" target="_blank" href="<?= url('register')?>">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
	<section id="home-intro-area" class="offset">
		<div class="space stars1"></div>
		<div class="space stars2"></div>
		<div class="space stars3"></div>
		<div class="home-intro-dark">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<img src="/template/img/ctf.png">
						<div class="detail-intro wow fadeInLeft">
							<br><br>
							<h1 class="word"></h1>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>

	<!-- Modal Login -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h4>Login</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<form action="<?= url('login') ?>" method="POST">
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Your email address...">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Your password...">
							</div>
							<button type="submit" class="btn btn-info btn-block btn-round">Login</button>
						</form>

						<div class="text-center text-muted delimiter"></div>
						<div class="d-flex justify-content-center social-buttons">
						</di>
					</div>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
			</div>
		</div>
	</div>
	<!-- End Modal Login -->	

	<!-- Jquery JS -->
	<script src="/template/vendor/jquery/jquery.min.js"></script>
	
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Bootstrap Js -->
	<script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Counter JS -->
	<script src="/assets/js/counter.js"></script>
	<!-- Corausel JS -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- Wow JS -->
	<script src="/assets/js/wow.min.js"></script>
	<!-- Custom JS -->
	<script src="/assets/js/custom.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			runningText();
		})

		// Swal Alert Login Failed
		<?php 
		if(isset($type)){
			?>
			swal("<?= $title ?>", "<?= $msg ?>", "<?= $type ?>");
			<?php
		}
		?>

		// $(document).ready(function() {          
		// 	$('#loginModal').modal('show');
		// 	$(function () {
		// 		$('[data-toggle="tooltip"]').tooltip()
		// 	})
		// });

		function runningText() {
			var words = [
			'Start Hacking',
			'Come on Try Now',
			'Pentesting Online Labs',
			'Hacking Is Art'
			],
			part,
			i = 0,
			offset = 0,
			len = words.length,
			forwards = true,
			skip_count = 0,
			skip_delay = 20,
			speed = 60;
			var wordflick = function () {
				setInterval(function () {
					if (forwards) {
						if (offset >= words[i].length) {
							++skip_count;
							if (skip_count == skip_delay) {
								forwards = false;
								skip_count = 0;
							}
						}
					}
					else {
						if (offset == 0) {
							forwards = true;
							i++;
							offset = 0;
							if (i >= len) {
								i = 0;
							}
						}
					}
					part = words[i].substr(0, offset);
					if (skip_count == 0) {
						if (forwards) {
							offset++;
						}
						else {
							offset--;
						}
					}
					$('.word').text(part);
				},speed);
			};

			$(document).ready(function () {
				wordflick();
			});	
		}
	</script>
</body>
</html>