<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
	header('location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			background-color: #f8f9fa;
			background-image: url('img/g7.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			height: 100vh;
			display: flex;
			flex-direction: column;
		}

		.navbar-custom {
			/* background: linear-gradient(to right, #6a8daf, #89a9c7);
			background: repeating-linear-gradient(45deg, #6a8daf, #6a8daf 2px, #89a9c7 10px, #89a9c7 20px); */
			background-color: #01153e;
			height: 75px;

			color: white;
		}

		.footer {
			background-color: gray;
			color: white;
			text-align: center;
			padding: 10px;
			position: relative;
			bottom: 0;
			width: 100%;
		}

		.card {
			backdrop-filter: blur(55px);
			transition: transform 0.2s;
			background-color: white;
			/* background-color: #ffc107; */
			align-items: center;

		}

		/* .card:hover {
			transform: none;
		} */

		.card:hover {
			transform: scale(1.05);
			text-decoration: none;
		}

		.card-title {
			align-items: center;

			color: black;
		}


		main {
			flex: 1;
		}

		.text-shadow {
			text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-custom">
		<a class="navbar-brand text-white" href="#">
			<img src="nit.jpeg" width="30" height="30" class="d-inline-block align-top" alt=""
				style="border-radius:10px;">
			NITW - Online Equipment Booking System
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon" style="color: white;"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="password_reset.php" class="btn btn-outline-warning mr-2">Reset Password</a>
				</li>
				<li class="nav-item">
					<a href="logout.php" class="btn btn-outline-danger">Sign Out</a>
				</li>
			</ul>
		</div>
	</nav>

	<main>
		<section class="container mt-5">
			<div class="page-header">
				<h1 class="display-5 text-center text-shadow">Welcome home, <?php echo $_SESSION['username']; ?></h1>
				<h2 class="text-center mt-4 text-shadow"><u>Departments</u></h2>
			</div>
			<div class="row mt-5">
				<div class="col-md-6 col-lg-3 mb-4">
					<a href=".\crif\crif.php" class="card" target="_blank">
						<img src="crif.jpg" class="card-img-top" alt="CRIF">
						<div class="card-body">
							<h5 class="card-title">CRIF</h5>
							<!-- <p class="card-text">Central Research Instrumentation Facility (CRIF) provides high-end
								analytical services for academic and industrial research, it has many lab equipments.
							</p> -->
						</div>
					</a>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<a href=".\biotech\biot.php" class="card" target="_blank">
						<img src="bio.jpg" class="card-img-top" alt="Biotechnology">
						<div class="card-body">
							<h5 class="card-title">Metallurgy</h5>

							<!-- <p class="card-text">Biotechnology engineering is a branch of engineering where technology
								is combined with biology for research & development.</p> -->
						</div>
					</a>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<a href=".\physics\physic.php" class="card" target="_blank">
						<img src="physss.jpg" class="card-img-top" alt="Physics">
						<div class="card-body">
							<h5 class="card-title">Physics</h5>
							<!-- <p class="card-text">The Department of Physics,supports engineering
								courses.It excels in research areas like photonics and nanotechnology.</p> -->
						</div>
					</a>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<a href=".\mathematics\math.php" class="card" target="_blank">
						<img src="mathe.jpeg" class="card-img-top" alt="Mathematics">
						<div class="card-body">
							<h5 class="card-title">Chemistry</h5>
							<!-- <p class="card-text">The Department of Mathematics offers undergraduate, postgraduate, and
								focusing on both pure and applied mathematics.</p> -->
						</div>
					</a>
				</div>
			</div>
		</section>
	</main>

	<footer class="footer">
		<p>&copy; <?php echo date("Y"); ?> Shanker. All rights reserved.</p>
	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>