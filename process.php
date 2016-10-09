<?php
	
	//mysql server info
	$servername = "localhost";
	$username = "root";
	$password = "password";

	//POST Variables
	$name = $_POST["Name"];
	$email = $_POST["Email"];
	$addr = $_POST["Address"];
	$city = $_POST["City"];
	$state = $_POST["State"];
	$zip = $_POST["Zip"];

	//Error Message Variables
	$nameErr = $emailErr = $addrErr = $cityErr = $stateErr = $zipErr = '';

	$states = Array('AL','AK','CA','CT','DE','FL','GA','HI','LA','ME','NH','NJ','NY','NC','OR','MD','MA','MS','RI','SC','TX','VA','WA');

	if(!preg_match("/^[a-zA-Z ]+$/", $name)){
		$nameErr = 'Properly Formatted Name Required';
	}
	if(!preg_match("/^[a-zA-Z ]+.*@[a-zA-Z].[a-zA-Z]$/", $email)){ //may just use FILTER_VALIDATE_EMAIL here
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
	//connect
	$con = new mysqli("127.0.0.1", "root", "password", "LinguiStack");

	//check
	if(!$con){
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = '';

	if($nameErr === '' && $emailErr === '' && $addrErr === '' && $cityErr === '' && $stateErr === '' && $zipErr === ''){
		$sql = "INSERT INTO `CurrentClients`(`Name`, `Email`, `Address`, `City`, `State`, `Zip`, `Language Teach`, `Language Learn`) VALUES ('$name', '$email', '$addr', '$city', '$state', '$zip', NULL, NULL);";
		if(mysqli_query($con, $sql)){
			echo "Value Entered";
		} else {
			echo "Error: " . $sql . "<br>" .  $con->error;
		}
	}

?>
<!--[AL,AK,AZ,AR,CA,CO,CT,DE FL GA HI ID IL IN IA KS KY LA ME MD MA MI MN MS MO MT NE NV NH NJ NM NY NC ND OH OK OR PA RI SC SD TN TX UT VT VA WA WV WI WY]--> 
<!--<html>
<body>

Welcome <?php echo $_POST["Name"]; ?>!

</body>
</html> -->