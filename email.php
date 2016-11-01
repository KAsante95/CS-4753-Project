<?php
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-Master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2; //debugging messages disabled

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "linguistackexchange@gmail.com";
$mail->Password = "Ecommerce";


//Change these to variables
$mail->addAddress($payerEmail, $payerFirstName.' '.$payerLastName);
$mail->Subject = 'LinguiStackExchange Payment';
$mail->Body = $payerFirstName.' '.$payerLastName.", Thank you for your Order!\n".
                "An e-mail has been sent to confirm your transaction\n".
                'Billing Address: '.$recipientName."\n".
                $addressLine1."\n".
                $addressLine2."\n".
                $city."\n".
                $state.'-'.$postalCode."\n".
                $countryCode."\n".
                $paymentID."\n".
				'Transaction ID : '.$transactionID."\n".
                'State : '.$paymentState."\n".
                'Total Amount: '.$finalAmount.' '.$currency;
  
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "";
}