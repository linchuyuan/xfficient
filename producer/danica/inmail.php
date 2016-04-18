<?php
$title = $_POST['subject'];
$body = $_POST['message'];
$email = $_POST['email'];
$message = str_replace("\n", "<br>", $body);
require("../phpmailer/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication       
$mail->Port = 587;                                    // Set the SMTP port    
$mail->SMTPSecure = 'tls';
$mail->Username = "xfficient@gmail.com";  // SMTP username
$mail->Password = "xfficient2015"; // SMTP password
$mail->SMTPDebug = 0;
$mail->From = "xfficient@gmail.com";
$mail->FromName = "xfficient->danica";
$mail->AddAddress("lin.chu@yahoo.com");
$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $title;
$mail->Body    = "From: $email<br><br>$message";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>

