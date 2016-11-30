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
	</head>
	<body>

	<?php 

//mysql server info
	$servername = "localhost";
	$username = "root";
	$password = "password";

	//connect
	$con = mysqli_connect("127.0.0.1", "root", "", "LinguiStack");

	//check
	if(!$con){
		die("Connection failed: " . $conn->connect_error);
	}

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($con,$_POST['Username']);
      $userpassword = mysqli_real_escape_string($con,$_POST['Password']); 
      
      $sql = "SELECT * FROM CurrentClients WHERE Email = '$email' and Password = '$userpassword'";
      $result = mysqli_query($con,$sql);

      $count = mysqli_num_rows($result);
      
      // If result matched $email and $userpassword, table row must be 1 row
		
      if($count == 1) {
         session_start();
         $_SESSION['Name'] = $result->fetch_assoc()["Name"];
         echo "<script>
	 	window.location.replace('member.php')
         </script>";
      }else {
	//I don't think this error does anything right now, you just redirect back onto the login page
         $error = "Your User Name or Password is invalid";
      }
   }

	?>

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
							<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="display: inline-block;
    text-align: center;">
								
								<input type="text" name="Username" placeholder="Username">
								<br/>
								<input type="password" name="Password" placeholder="Password">
								<br/>
								<input type="submit" value="Log In">
							</form>
  						</header>
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