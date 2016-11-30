<?php
	session_start();
?>
<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Member Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">LinguiStack Exchange</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="generic.html">About Us</a></li>
											<li><a href="signup.php">Sign Up</a></li>
											<li><a href="#">Log In</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
  						<header>
  							<h2>Welcome, <?php echo $_SESSION["Name"]; ?></h2>
  							<!--<p>We want everyone to have the ability to practice </br> speaking English with a native speaker</p> -->
 							<p style="font-size=10px;">Bringing Accessibility to the English Language</p>
  						</header>
  						<section class="wrapper style5">
  							<div class="inner">
								</p>
								<p>For native English speakers: </br> You can make a Calendar showing available times and what the per hour rate is.</p>
								<p>For learners: </br> You can make a Calendar showing available times and what per hour rate you are willing to pay.</p>
								<p>*We do not set a rate because we find it better for both parties to set their own prices and let the market decide what the value is*</p>
								<p>
									What we ultimately want is for the process of learning the English language to be less burdensome both for the student and the instructor. We want everyone to have the ability to practice speaking English with a native speaker, and thus facilitate a smoother trasition into cultures that speak the English language. We believe that LingustackExchange does exactly that. We're <i>Bringing Accessibilty to the English Language</i>

								</p> 
							</div>
									<div class="inner" style= "text-align: center;">
									<ul class="actions">
										<li><a href="signup.php" class="button special">Sign Up</a></li>
									</ul>
								</div>
						</section>
					</article>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>