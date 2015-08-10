<?php
include_once("Mail.php");
  
$From = "Sender's name <sender@yourdomain.com>";
$To = "sachi.maharana@gmail.com";
$Subject = "Send Email using SMTP authentication";
$Message = "This example demonstrates how you can send email with PHP using SMTP authentication";
  
$Host = "mail.smtp.com";
$Username = "smtp_username";
$Password = "smtp_password";
  
// Do not change bellow
  
$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject);
$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true,
'username' => $Username, 'password' => $Password));
  
$mail = $SMTP->send($To, $Headers, $Message);
  
if (PEAR::isError($mail)){
echo($mail->getMessage());
} else {
echo("Email Message sent!");
}
?>