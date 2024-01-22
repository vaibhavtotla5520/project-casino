<?php
require_once "Backend/Config/Constants.php";
require_once "Backend/Config/Crypt.php";
$crypt = new Crypt;
$token = $crypt->encrypt("CashWinTest999");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
	<!-- All stylesheet and icons css  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/icofont.min.css">
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/lightcase.css">
	<link rel="stylesheet" href="assets/css/odometer.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<script src="https://unpkg.com/gsap@3.9.2/dist/gsap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

</head>

<body>
	<!-- preloader start here -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- preloader ending here -->

	<!-- scrollToTop start here -->
	<a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
	<!-- scrollToTop ending here -->

	<!-- ==========shape image Starts Here========== -->
	<div class="body-shape">
		<img src="assets/images/shape/body-shape.png" alt="shape">
	</div>
	<!-- ==========shape image end Here========== -->




	<!-- ==========Header Section Starts Here========== -->
	<header class="header-section style2">
		<div class="container">
			<div class="header-holder d-flex flex-wrap justify-content-between align-items-center">
				<div class="brand-logo d-none d-lg-inline-block py-2">
					<div class="logo">
						<a href="index.php">
							<img src="assets/images/logo/logo.png" alt="logo">
						</a>
					</div>
				</div>
				<div class="header-menu-part">
					<div class="header-top d-none">
						<div class="header-top-area">
							<ul class="left">
								<li>
									<i class="icofont-ui-call"></i> <span>+800-123-4567 6587</span>
								</li>
								<li>
									<i class="icofont-location-pin"></i> Beverley, New York 224 USA
								</li>
							</ul>
							<ul class="social-icons d-flex align-items-center">
								<li>
									<a href="#" class="fb"><i class="icofont-facebook-messenger"></i></a>
								</li>
								<li>
									<a href="#" class="twitter"><i class="icofont-twitter"></i></a>
								</li>
								<li>
									<a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
								</li>
								<li>
									<a href="#" class="skype"><i class="icofont-skype"></i></a>
								</li>
								<li>
									<a href="#" class="rss"><i class="icofont-rss-feed"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="header-bottom">
						<div class="header-wrapper justify-content-lg-end">
							<div class="mobile-logo d-lg-none">
								<a href="index.php"><img src="assets/images/logo/logo.png" alt="logo"></a>
							</div>
							<div class="menu-area">
								<ul class="menu">
									<li>
										<a href="index.php">Home</a>
									</li>
									<li>
										<a href="games.php">Games</a>
									</li>

								</ul>
								<a href="login.php" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a>
								<a href="register1.php" class="signup"><i class="icofont-users"></i> <span>SIGN UP</span></a>

								<!-- toggle icons -->
								<div class="header-bar d-lg-none">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="ellepsis-bar d-lg-none">
									<i class="icofont-info-square"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	<!-- ==========Header Section Ends Here========== -->
