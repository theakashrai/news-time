<html lang="en">
   <head>
      <title>Sign Up</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
   <?php

	if(isset($_POST['USR_NAME']) && !empty($_POST['USR_NAME']) AND isset($_POST['USR_MAIL']) && !empty($_POST['USR_MAIL'])){
		$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
        $mysqli = new mysqli("localhost", "root", "Atlantis@123", "news_time");
		$name =$mysqli->real_escape_string($_POST['USR_NAME']);
		$email = $mysqli->real_escape_string($_POST['USR_MAIL']);
		$check_email_sql="select email from users where email = '".$email."'";
		$check_email=mysqli_query($link,$check_email_sql)or die(mysqli_error());
		$chk_res = mysqli_num_rows($check_email);
		if($chk_res>0)
		{
			echo "<script>alert('E-mail already registered. Please Sign In.');
		window.location.href='signup.php';</script>";
		}
		$hash = ( rand(1000,10000) );
		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");
		ini_set("sendmail_from","newstime364@gmail.com");
		ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('Invalid email format');
		window.location.href='signup.php';</script>"; 
		}
		else{
				mysqli_query($link,"INSERT INTO users (username, email, hash) VALUES(
'". mysqli_real_escape_string($link,$name) ."', 
'". mysqli_real_escape_string($link,$email) ."', 
'". mysqli_real_escape_string($link,$hash) ."') ") or die(mysqli_error());

	$to      = $email; // Send email to our user
	$subject = 'Signup | Verification'; // Give the email a subject 
	$message = '
	 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	Username: '.$name.'
	OTP: '.$hash.'
	------------------------
	 
	Please click this link to activate your account:
	http://localhost/verify.php?email='.$email.'&hash='.$hash.'
	 
	'; // Our message above including the link
	//ini_set("SMTP","smtp.gmail.com");
	
	$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
	if(mail($to, $subject, $message, $headers))
	{
		echo "mail sent otp:".$hash." ";
		echo 'http://localhost/news time/verify.php?email='.$email.'&hash='.$hash;
	}else{
		echo "mail not sent otp:".$hash." ";
		echo 'http://localhost/news time/verify.php?email='.$email.'&hash='.$hash;
	}
		}
	
		
	
	}
	
	
?>
      <section id="banner">
         <div class="bg-color">
            <header id="header">
               <div class="container">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <div id="mySidenavcat">
                        <a href="login.php">Login</a>
                        <a href="index.php">Home</a>
                        
                     </div>
                  </div>
                  <!-- Use any element to open the sidenav -->
                  <span onclick="openNav()" class="pull-right menu-icon">☰</span>
               </div>
            </header>
            <div class="container">
               <div class="row ">
                  <div class="inner ">
                     <h1 class="logo-name text-center">News Time</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="container">
         <div class="row ">
            <div class="col-md-12 text-center marb-35">
               <h1 class="header-h element-animation">Sign Up</h1>
            </div>
         </div>
      </div>
      <center>
			<form method ="POST" action="">
                    <label style="float:none">Name:</label>
					<input class="focus"type="text" name= "USR_NAME"><br><br>
					<label style="float:none">E-mail:</label>
					<input class="focus" type="text" name= "USR_MAIL">
				
				<br>
				<br>
				<input class="btnn" type="submit" value="Sign up">
				
            </form>
			
            <br><br>
                  <a id ="up" href ="login.php">Login</a>
			</center>
               
	  <footer class="footer text-center">
		 <div class="footer-top">
			<div class="row">
			   <div class="col-md-offset-3 col-md-6 text-center">
				  <div class="widget">
					 <h4 class="widget-title">News Time</h4>
					 <div class="social-list">
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	</footer>
     <?php 
    if(isset($msg)){  // Check if $msg is not empty
        echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/navigator.js"></script>
   </body>
</html>

