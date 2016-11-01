<?php
    /*
        * Payment Confirmation page : has call to execute the payment and displays the Confirmation details
    */
    if (session_id() == "")
        session_start();

    include('utilFunctions.php');
    include('paypalFunctions.php');


    if( isset($_GET['paymentId']) && isset($_GET['PayerID'])){ //Proceed to Checkout or Mark flow

        //call to execute payment
        $response = doPayment(filter_input( INPUT_GET, 'paymentId', FILTER_SANITIZE_STRING ), filter_input( INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING ), NULL);

    } else { //Express checkout flow

        if(verify_nonce()){
            $expressCheckoutFlowArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
                    /*$expressCheckoutFlowArray['transactions'][0]['amount']['total'] = (float)$expressCheckoutFlowArray['transactions'][0]['amount']['total'] + (float)$_POST['shipping_method'] - (float)$expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'];
                    $expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'] = $_POST['shipping_method'];*/
                    $transactionAmountUpdateArray = $expressCheckoutFlowArray['transactions'][0];
                    $_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutFlowArray);

                    //call to execute payment with updated shipping and overall amount details
                    $response = doPayment($_SESSION['paymentID'], $_SESSION['payerID'], $transactionAmountUpdateArray);
        } else {
            die('Session expired');
        }
    }
	
	// REST validation; route non-HTTP 200 to error page
	if ($response['http_code'] != 200 && $response['http_code'] != 201) {		
		$_SESSION['error'] = $response;
		header( 'Location: error.php');
		
		// need exit() here to maintain session data after redirect to error page
		exit();
	}
	
	$json_response = $response['json']; 
	
    $paymentID= $json_response['id'];
    $paymentState = $json_response['state'];
    $finalAmount = $json_response['transactions'][0]['amount']['total'];
    $currency = $json_response['transactions'][0]['amount']['currency'];
    $transactionID= $json_response['transactions'][0]['related_resources'][0]['sale']['id'];

    $payerEmail = filter_var($json_response['payer']['payer_info']['email'],FILTER_SANITIZE_SPECIAL_CHARS);
    $payerFirstName = filter_var($json_response['payer']['payer_info']['first_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $payerLastName = filter_var($json_response['payer']['payer_info']['last_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipientName= filter_var($json_response['payer']['payer_info']['shipping_address']['recipient_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine1= filter_var($json_response['payer']['payer_info']['shipping_address']['line1'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine2 = (isset($json_response['payer']['payer_info']['shipping_address']['line2']) ? filter_var($json_response['payer']['payer_info']['shipping_address']['line2'],FILTER_SANITIZE_SPECIAL_CHARS) :  "" );
    $city= filter_var($json_response['payer']['payer_info']['shipping_address']['city'],FILTER_SANITIZE_SPECIAL_CHARS);
    $state= filter_var($json_response['payer']['payer_info']['shipping_address']['state'],FILTER_SANITIZE_SPECIAL_CHARS);
    $postalCode = filter_var($json_response['payer']['payer_info']['shipping_address']['postal_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    $countryCode= filter_var($json_response['payer']['payer_info']['shipping_address']['country_code'],FILTER_SANITIZE_SPECIAL_CHARS);
	
    //include('header.php');
?>



<html>
    <head>
        <title>Purchase Confirmed</title>
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
                            <h2>Purchase Made</h2>
                        </header>
                        <section class="wrapper style5">
                        <div class = "inner">

            <h4>
                <?php echo($payerFirstName.' '.$payerLastName.', Thank you for your Order!');?><br/>
                An e-mail has been sent to confirm your transaction<br/>
                Billing Address: </h4>
                <?php echo($recipientName);?><br/>
                <?php echo($addressLine1);?><br/>
                <?php echo($addressLine2);?><br/>
                <?php echo($city);?><br/>
                <?php echo($state.'-'.$postalCode);?><br/>
                <?php echo($countryCode);?>

                <h4>Payment ID: <?php echo($paymentID);?> <br/>
		Transaction ID : <?php echo($transactionID);?> <br/>
                State : <?php echo($paymentState);?> <br/>
                Total Amount: <?php echo($finalAmount);?> &nbsp;  <?php echo($currency);?> <br/>
            </h4>
            <br/>
            Return to the <a href="index.html">Home Page</a>.
</div>
</section>
</article>
</div>
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
</html>




<?php
    include('email.php');
    if (session_id() !== "") {
               session_unset();
               session_destroy();
            }
?>

