<?php
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-Master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "linguistackexchange@gmail.com";
$mail->Password = "Ecommerce";


//Change these to variables
$mail->addAddress('cns5za@virginia.edu', 'Caleb Smith');
$mail->Subject = 'LinguiStackExchange Payment';
$mail->Body = 'Thank you for using our service! You have been charged $5 for this past session.'; //change this 

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}