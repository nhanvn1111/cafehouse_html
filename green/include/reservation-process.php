<?php

$recipient = "your-email@gmail.com";
$date = $_POST['datepicker'];
$time = $_POST['time'];
$persons = $_POST['persons'];
$author = $_POST['author'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$mess = $_POST['message'];

if (isset($_POST['email'])) {	
	if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
		$msg = 'E-mail address is valid';
	} else {
		$msg = 'Invalid email address';
	}

  $ip = getenv('REMOTE_ADDR');
  $host = gethostbyaddr($ip);	
  $message .= "Date: ".$date."\n";
  $message .= "Time: ".$time."\n";
  $message .= "Number of persons: ".$persons."\n";
  $message .= "Name: ".$author."\n";
  $message .= "Email: ".$email."\n";
  $message .= "Phone: ".$phone."\n";
  $message .= "Message: ".$mess."\n\n";
  $message .= "IP:".$ip." HOST: ".$host."\n";
  
  $headers .= "Reservation: <".$email.">\r\n"; 
  $title .= "Restaurant Reservation";
  
  $sent = mail($recipient, $title, $message, $headers); 
  

$text = "Thanks for contacting us! We will check your message within a few hours.";
	
echo '<xml>	<someText>'.$text.'</someText> </xml>';

} else {
	die('Invalid entry!');
}


?>