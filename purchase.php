<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    /*
        * Home Page - has Sample Buyer credentials, Camera (Product) Details and Instructiosn for using the code sample
    */
    include('apiCallsData.php');
    include('paypalConfig.php');

    //setting the environment for Checkout script
    if(SANDBOX_FLAG) {
        $environment = SANDBOX_ENV;
    } else {
        $environment = LIVE_ENV;
    }
?>
<html>
	<head>
		<title>Make a Purchase</title>
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
  							<h2>Make a Purchase</h2>
  						</header>
  						<section class="wrapper style5">
  						<div class = "inner">
<form id="myContainer" action="startPayment.php" method="POST">
    <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>"/>
    Learn: <select name="Lang" style="width: 25%;">
											<option value="English">English</option>
											<option value="Spanish">Spanish</option>
											<option value="Chinese">Chinese</option>
											<option value="Akan">Akan</option>
										</select>Price: <input style="width: 25%;" type="text" name="service_price" value="250" readonly></input>
    Currency:<input style="width: 25%;" type="text" name="currencyCodeType" value="USD" readonly></input><br/> 
</form> 
								<div style= "text-align: center;" id="myContainer"></div>
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
			<script type="text/javascript">
			     window.paypalCheckoutReady = function () {
			         paypal.checkout.setup('<?php echo(MERCHANT_ID); ?>', {
			             container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
			             environment: '<?php echo($environment); ?>' //or 'production' depending on your environment
			         });
			     };
 			</script>
 			<script src="//www.paypalobjects.com/api/checkout.js" async></script>
	</body>
</html>