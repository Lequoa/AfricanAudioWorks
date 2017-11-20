<?php

// $email and $message are the data that is being
// posted to this page from our html contact form
$name = $_REQUEST['name'];
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'darkmoon.webspacebar.co.za';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@africanaudioworks.co.za';                 // SMTP username
$mail->Password = 'info123+';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 995;                                    // TCP port to connect to

$mail->setFrom($email, $name);
$mail->addAddress('walter@africanaudioworks.co.za', 'Walter User');     // Add a recipient
$mail->addAddress('andile@africanaudioworks.co.za');               // Name is optional
$mail->addReplyTo($email, 'Information');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Request';
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
