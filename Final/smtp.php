<?php 

$user = "gupteshmaster@gmail.com";

$to_email = $user;

$subject = "Forget Password : HRMS";

$body = "Hi, greetings from HRMS team. Your new password will be conveyed by your manager shortly.\n Stay updated.";

$headers = "From: aman030904@gmail.com";

if(mail($to_email, $subject, $body, $headers)){
	echo "Email successfully sent to $to_email...";
}
else{
	echo "Email sending failed...";
}

?>