<!DOCTYPE html>
<html lang="en">
   <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>News Time</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
	<?php
						session_start();
						$uname="Login";
						if(isset($_SESSION['name']))
						{
							$uname=$_SESSION['name'];
						}
						else
						{
							echo "<script>window.location.href='login.php';</script>";
						}
	?>
      <!--banner-->
      <section id="banner">
         <div class="bg-color">
            <header id="header">
               <div class="container">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					  <a href="javascript:void(0)" class="backnavbtn" onclick="backnav()">&lt;</a>
                     <div id="mySidenavcat">
						<?php if($uname=="Login")
						{
							echo '<a href="login.php">';
							echo $uname;
							echo '</a>';
						}else
						{
							echo '<a href="land.php">';
							echo $uname;
							echo '</a>';
							echo '<a href="logout.php">Logout</a>';
						}
						?>
                        <a href="#about">About</a>
                        </div>
                  </div>
                  <!-- Use any element to open the sidenav -->
                  <span onclick="openNav()" class="pull-right menu-icon">☰</span>
               </div>
            </header>
            <div class="container">
               <div class="row">
                  <div class="inner text-center">
                     <h1 class="logo-name"><a href="index.php" class="reset-a">News Time</a></h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- / banner -->
      <!--about-->
    <section id="about" class="section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center marb-35">
                  <h1 class="header-h element-animation">EDIT</h1>
               </div>
            </div>
			<?php $id=$_SESSION['id'];
			$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
			if(isset($_POST['uid']) && !empty($_POST['uid']) AND isset($_POST['hash']) && !empty($_POST['hash']) ){
		$email = $_SESSION['temp_mail']; // Set email variable
		$hash = mysqli_real_escape_string($link,$_POST['hash']); // Set hash variable
		$uid=mysqli_real_escape_string($link,$_POST['uid']);
		
		$search = mysqli_query($link,"SELECT id, hash, active FROM users WHERE id='".$uid."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
		$match  = mysqli_num_rows($search);
		
		if($match > 0){
			$query="update users set email='$email' where id=$uid";
			mysqli_query($link,"update users set active=1 where id=$uid");
					if($email!=null)
					if(mysqli_query($link,$query))
					{
						echo "<script>alert('sucess');</script>";
						$_SESSION['mail']=$email;
						echo "<script>window.location.href='land.php';</script>";
					}else{
						echo "email already exists update failed";
					}
		}else{
			// No match -> invalid url or account has already been activated.
			echo '<h1><div class="statusmsg">The url is either invalid or you already have activated your account.</div></h1>';
 
		}}?>
			<div class="row">
			<center><form method="POST" action="edit.php">
            <?php
			if(isset($_POST['USR_NAME'])){
			$name=$_POST['USR_NAME'];
			echo "hello";
			$query="update users set username='$name' where id=$id";
					if($name!=null)
					if(mysqli_query($link,$query))
					{
						echo "<script>alert('sucess');</script>";
						$_SESSION['name']=$name;
						echo "<script>window.location.href='land.php';</script>";
						
					}
				}
			if(isset($_GET['mode'])){
			if($_GET['mode']==1){	
			echo '<label style="float:none">Name:</label><input type="text" name="USR_NAME">';
			}
			if($_GET['mode']==2){
			echo '<label style="float:none">Email:</label><input type="text" name="USR_EMAIL">';
			}
			?>
			<br>
			<br>
			<input type="submit" value="submit" class="btnnn">
			</form></center>
			</div>
			</div>
			<?php
			}
			
			if(isset($_POST['USR_EMAIL'])){
			$email=mysqli_real_escape_string($link,$_POST['USR_EMAIL']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Invalid email format');
			window.location.href='edit.php?mode=2';</script>"; 
			}
			$_SESSION['temp_mail']=$email;
			$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
			$query_one="update users set active=0 where id=$id";
			$hash = ( rand(1000,10000) );
			$query_three="update users set hash=$hash where id=$id";
			mysqli_query($link,$query_three);
			mysqli_query($link,$query_one);
			
			ini_set("SMTP","ssl://smtp.gmail.com");
			ini_set("smtp_port","465");
					ini_set("sendmail_from","newstime364@gmail.com");
					ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
					$to      = $email; // Send email to our user
					$subject = 'Email | Verification'; // Give the email a subject 
				$message = '
				 
				To reset email
				this is your
				------------------------
				Token = '.$id.'
				OTP: '.$hash.'
				------------------------
				 
				
				 
				'; // Our message above including the link
				//ini_set("SMTP","smtp.gmail.com");
				
				$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
				if(mail($to, $subject, $message, $headers))
				{
					echo '<script>alert("Mail sent OTP:'.$hash.' and Token:'.$id.'");</script>';
					
				}else{
					echo '<script>alert("Mail sent OTP:'.$hash.' and Token:'.$id.'");</script>';
				}
				
				?>
				<center><form action="edit.php" method="POST">
				<label style="float:none">Token:&nbsp;&nbsp;</label><input type="text" name ="uid"><br>
				<label style="float:none">OTP:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name ="hash"><br>
				<br><input type="submit" value="submit" class="btnnn">
				</form></center><?php
				}
				?>
			
         
      </section>
      <!--/about-->
      <footer class="footer text-center">
         <div class="footer-top">
            <div class="row">
               <div class="col-md-offset-3 col-md-6 text-center">
                  <div class="widget">
                     <h4 class="widget-title"><a href="index.php" class="reset-a">News Time</a></h4>
                     <div class="social-list">
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- / footer -->
      <script src="js/bootstrap.min.js"></script>
	  <script src="js/navigator.js"></script>
   </body>
</html>