<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<!--
-->

<html>
	<head>
		<title>Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<style>
		.err{
			color: #ff0000;
		}
	</style>
	<body>

	<?php 

//mysql server info
	$servername = "localhost";
	$username = "root";
	$password = "password";

//Error Message Variables
	$nameErr = $emailErr = $addrErr = $cityErr = $stateErr = $zipErr = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	//POST Variables
	$name = $_POST["Name"];
	$email = $_POST["Email"];
	$addr = $_POST["Address"];
	$city = $_POST["City"];
	$state = $_POST["State"];
	$zip = $_POST["Zip"];
	$langt = $_POST["Langt"];
	$langl = $_POST["Langl"];


	$states = Array("AK","AL","AR","AZ","CA","CO","CT","DC","DE","FL","GA","GU","HI","IA","ID", "IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY", "OH","OK","OR","PA","PR","PW","RI","SC","SD","TN","TX","UT","VA","VI","VT","WA","WI","WV","WY");


	if(!preg_match("/^[a-zA-Z ]+$/", $name)){
		$nameErr = 'Properly Formatted Name Required';
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
		$emailErr = 'Valid Email Required';
	}
	if(!preg_match("/^[0-9]+[a-zA-Z ]+$/", $addr)){
		$addrErr = 'Properly Formatted Address Required';
	}
	if(!preg_match("/^[a-zA-Z ]+$/", $city)){
		$cityErr = 'Properly Formatted City Required';
	}
	if(!in_array($state, $states)){
		$stateErr = 'Properly Formatted State Required';
	}
	if(!preg_match("/^[0-9]{5}$/", $zip)){
		$zipErr = 'Properly Formatted Zip Code Required';
	}

	}
	//connect
	$con = new mysqli("127.0.0.1", "root", "password", "LinguiStack");

	//check
	if(!$con){
		die("Connection failed: " . $conn->connect_error);
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
  							<h2>Sign Up</h2>
  							<!--<p>We want everyone to have the ability to practice </br> speaking English with a native speaker</p> -->
 							<p style="font-size=10px;">Enter Some Basic Information Below</p>
  						</header>
  						<section class="wrapper style5">
  							<div class="inner" style="margin: auto;">
								<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<table>
									<tr style="background-color: #fff">
										<td>
										Name <span class='err'><?php echo $nameErr; ?></span><br/>
										<input type="text" name="Name">
										
										Email <span class='err'><?php echo $emailErr; ?></span><br/>
										<input type="text" name="Email">
										
										Address <span class='err'><?php echo $addrErr; ?></span><br/>
										<input type="text" name="Address">
										
										City <span class='err'><?php echo $cityErr; ?></span><br/>
										<input type="text" name="City">
										
										</td>
										<td>
										State <span class='err'><?php echo $stateErr; ?></span><br/>
										<input type="text" name="State">
										
										Zip <span class='err'><?php echo $zipErr; ?></span><br/>
										<input type="text" name="Zip">
										
										Language You Want to Teach<br/>
										<select name="Langt">
											<option value="English">English</option>
											<option value="Spanish">Spanish</option>
											<option value="Chinese">Chinese</option>
											<option value="Akan">Akan</option>
										</select>
										Language You Want to Learn<br/>
										<select name="Langl">
											<option value="English">English</option>
											<option value="Spanish">Spanish</option>
											<option value="Chinese">Chinese</option>
											<option value="Akan">Akan</option>
										</select>
										</td>
									</tr>
									</table>
									<!--<table>
										<tr>
											<td>
												Name<br/>
												<input type="" name="Name"><br/>
											</td>
											<td>
												State<br/>
												<input type="" name="State"><br/>
											</td>
										</tr>
										<tr>
											<td>
												Address<br/>
												<input type="" name="Address"><br/>
											</td>
											<td>
												Zip<br/>
												<input type="" name="Zip"><br/>
											</td>
										</tr>
										<tr>
											<td>
												City<br/>
												<input type="" name="City"><br/>
											</td>
											<td>
												Language You Want to Teach<br/>
												<input type="" name="Language To Teach"><br/>
											</td>
											<td>
												Language You Want to Learn<br/>
												<input type="" name="Languge To Learn"><br/>
											</td>
										</tr>
									</table> -->
								<div>
									<div class="inner" style= "text-align: center;">
									<ul class="actions">
										<li><input type="submit" class="button special"></a></li>
									</ul>
								</div>
							</form>
							</div>
						</section>
					</article>
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<?php
					$sql = '';

					if($nameErr === '' && $emailErr === '' && $addrErr === '' && $cityErr === '' && $stateErr === '' && $zipErr === ''){
						$sql = "INSERT INTO `CurrentClients`(`Name`, `Email`, `Address`, `City`, `State`, `Zip`, `Language Teach`, `Language Learn`) VALUES ('$name', '$email', '$addr', '$city', '$state', '$zip', '$langt', '$langl');";
						if(mysqli_query($con, $sql)){
							echo "";
						} else {
							echo "Error: " . $sql . "<br>" .  $con->error;
						}
						//header('Location: http://localhost/CS-4753-project/login.html');
					}

			?>
	</body>
</html>