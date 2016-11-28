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
	$nameErr = $emailErr = $addrErr = $cityErr = $stateErr = $zipErr = $ccnErr = $expmoErr = $expyrErr = $cvvErr = '';

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
	$ccn = $_POST["CCN"];
	$expmo = $_POST["expmo"];
	$expyr = $_POST["expyr"];
	$cvv = $_POST["CVV"];
	


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
	if(!preg_match("/^[0-9]{16}$/", $ccn)){
		$ccnErr = 'Properly Formatted Zip Code Required';
	}
	if(!preg_match("/^[0-9]{3}$/", $cvv)){
		$cvvErr = 'Properly Formatted Zip Code Required';
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
											<li><a href="generic.php">About Us</a></li>
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
									<h3>Personal Informaiton</h3>
									<table>
									<tr style="background-color: #fff">
										<td style="width: 50%;">
										Name <span class='err'><?php echo $nameErr; ?></span><br/>
										<input type="text" name="Name">
										
										Email <span class='err'><?php echo $emailErr; ?></span><br/>
										<input type="text" name="Email">
										
										Address <span class='err'><?php echo $addrErr; ?></span><br/>
										<input type="text" name="Address">
										
										City <span class='err'><?php echo $cityErr; ?></span><br/>
										<input type="text" name="City">
										
										</td>
										<td style="width: 50%;">
										State <span class='err'><?php echo $stateErr; ?></span><br/>
										<input type="text" name="State" id="state_entry" onkeyup="valueEntered()">
										
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
									</table><!--<br/>-->
									<!-- Alter the front end of the form that you created on your signup page to allow for the collection of credit card information (number, expiration date, and CVV number). This will involve adding new text boxes to your old form. It may be smart to divide the form into two groups with the use of headers or titles, such as ‘Personal Information’ and ‘Banking Information’. -->

									<h3>Banking Informaiton</h3>
									<table>
									<tr style="background-color: #fff">
										<td style="width: 33.3%;">
										Card Number <span class='err'><?php echo $nameErr; ?></span><br/>
										<input type="text" name="CCN">
										</td>
										<td style="width: 16.65%;">
										Expiration <span class='err'><?php echo $expmoErr; ?></span><br/>
										<select name="expmo">
											<option value="1">01</option>
											<option value="2">02</option>
											<option value="3">03</option>
											<option value="4">04</option>
											<option value="5">05</option>
											<option value="6">06</option>
											<option value="7">07</option>
											<option value="8">08</option>
											<option value="9">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>								
										</select>
										</td>
										<td style="width: 16.65%;">
										<span class='err'><?php echo $expyrErr; ?></span><br/>
										<select name="expyr">
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>								
										</select>
										</td>
										<td style="width: 33.3%;">
										CVV <span class='err'><?php echo $cityErr; ?></span><br/>
										<input type="text" name="CVV">
										</td>
									</tr>
									</table>

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

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="signup.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<?php
					$sql = '';
					if($_SERVER["REQUEST_METHOD"] == "POST"){
						if($nameErr === '' && $emailErr === '' && $addrErr === '' && $cityErr === '' && $stateErr === '' && $zipErr === '' && $ccnErr === '' && $cvvErr === ''){
							$sql = "INSERT INTO `CurrentClients`(`Name`, `Email`, `Address`, `City`, `State`, `Zip`, `Language Teach`, `Language Learn`, `CCN`, `ExpMo`, `ExpYr`, `CVV`) VALUES ('$name', '$email', '$addr', '$city', '$state', '$zip', '$langt', '$langl', '$ccn', '$expmo', '$expyr', '$cvv');";
							if(mysqli_query($con, $sql)){
								session_start();
								$_SESSION["Name"] = $name;
								$_SESSION["Email"] = $email;
								$_SESSION["Address"] = $addr;
								$_SESSION["City"] = $city;
								$_SESSION["State"] = $state;
								$_SESSION["Zip"] = $zip;
								$_SESSION["Langt"] = $langt;
								$_SESSION["Langl"] = $langl;
								echo "<script>
										window.location.replace('member.php')
									</script>";
							} else {
								echo "Error: " . $sql . "<br>" .  $con->error;
							}
							//header('Location: http://localhost/CS-4753-project/login.html');
						}
					}

			?>
	</body>
</html>