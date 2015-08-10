<?php
require_once "mail.php";
echo 'Thank you ';
$name=$_POST['your-name'];
echo $name;
$email=$_POST['your-email'];
//$phone=$_POST['phone'];
$message=$_POST['your-message'];

$ToEmail = 'sachi.maharana@gmail.com';//"findaks001@gmail.com";
$ToSubject = 'Contact Form sachi';

$EmailBody =   "Name: $name\n
Email: $email\n
Message: $message\n";

$Message = $EmailBody;


//$headers .= "Content-type: text; charset=iso-8859-1\r\n";
//$headers .= "From:".$email."\r\n";

$retval = mail($ToEmail,$ToSubject,$Message);//, $headers);
   if( $retval == true )
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }
//echo "Thank you for sending us feedback";
?>