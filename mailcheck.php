<?php 
	$name="Akash";
	$password="kk";
	$email='arakashrai@gmail.com';
	$to      = $email; // Send email to our user
	$subject = 'Signup | Verification'; // Give the email a subject 
	$message = '
	 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	Username: '.$name.'
	Password: '.$password.'
	------------------------
	 
	Please click this link to activate your account:
	http://localhost/verify.php?email='.$email.'&hash='.$hash.'
	 
	'; // Our message above including the link
	//ini_set("SMTP","smtp.gmail.com");
	ini_set("SMTP","ssl://smtp.gmail.com");
	ini_set("smtp_port","465");
	ini_set("sendmail_from","newstime364@gmail.com");
	ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
			 
	$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
	if(mail($to, $subject, $message, $headers))
	{
		echo "mail sent";
	}else{
		echo "mail not sent";
	}
?>