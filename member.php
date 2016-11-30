<?php
	session_start();
	if($_SESSION["Name"] == '') {
		echo "<script>
			window.location.replace('logout.php')
		</script>";
	}

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
		<link rel='stylesheet' href='fullcalendar.css' />
		<script src='lib/jquery.min.js'></script>
		<script src='lib/moment.min.js'></script>
		<script src='fullcalendar.js'></script>
		<script type="text/javascript">$
			$(document).ready(function() {

			    $('#calendar').fullCalendar({
			        events: [
				   		 {
				            title  : 'English w/ Bowen',
				            start  : '2016-12-05T19:30:00',
				            allDay : false,
				            color: '#439960'
				        },
				        {
				            title  : 'Akan w/ Kwame',
				            start  : '2016-12-07T12:30:00',
				            allDay : false,
				            color: '#62A0E5'
				        },
				        {
				            title  : 'Open Slot',
				            start  : '2016-12-14T12:30:00',
				            allDay : false,
				            color: '#439960'
				        },
				        {
				            title  : 'Open Slot',
				            start  : '2016-12-10T12:30:00',
				            allDay : false,
				            color: '#62A0E5'
				        }
				    ],

				    eventMouseover: function(event) {
					    $('.fc-event-inner', this).append('<div id=\"'+event.id+'\" class=\"hover-end\">'+event.end+'</div>');
					},

					eventMouseout: function(event) {
					    $('#'+event.id).remove();
					}


				    /*eventClick: function(calEvent, jsEvent, view) {

				        alert('Event: ' + calEvent.title);
				        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				        alert('View: ' + view.name);

				        // change the border color just for fun
				        $(this).css('border-color', 'red');

    				}*/


			    });	

			});
		</script>
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
											<li><a href="generic.php">About Us</a></li>
											<li><a href="lessons.php">Lessons</a></li>
											<li><a href="signup.php">Sign Up</a></li>
											<li><a href="login.php">Log In</a></li>
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
 							<button onclick="window.location.replace('logout.php');">Log Out</button>
  						</header>
  						<section class="wrapper style5">
  							<div class="inner">
								<div id='calendar'></div>
							</div>]
						</section>
					</article>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>