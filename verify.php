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
                        <a href="index.php">Home</a>
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
 
<center>
  <div class="container" style="min-height:80%;width:50%">
		<div class="row">
		<div class="col-md-6">
    
        <!-- start PHP code -->
        <?php
		
		$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
			if(isset($_POST['USR_PWD']) && !empty($_POST['USR_PWD']) AND isset($_POST['USR_RPWD']) && !empty($_POST['USR_RPWD'])){
				$email = mysqli_real_escape_string($link,$_GET['email']);
				if($_POST['USR_PWD']==$_POST['USR_RPWD']){
				$pwd=$_POST['USR_PWD'];
				if(mysqli_query($link,"UPDATE users SET password='$pwd' where email= '$email' AND active='0'")){
				 // Set email variable
				$hash = mysqli_real_escape_string($link,$_GET['hash']); // Set hash variable
				if(mysqli_query($link,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'"))
				{
				
				echo "<script>alert('sucess account activated');window.location.href='login.php'</script>";}
				}
				}
			}

		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		// Verify data
		
		$email = mysqli_real_escape_string($link,$_GET['email']); // Set email variable
		$hash = mysqli_real_escape_string($link,$_GET['hash']); // Set hash variable
		
		$search = mysqli_query($link,"SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
		$match  = mysqli_num_rows($search);
		if($match > 0){
		// We have a match, activate the account
				?>
		
		<form method="POST" action="">
		<label style="margin-top:20%;">Password</label>
		</div>
		<div class="col-md-6">
		<br><br><input type="password" name="USR_PWD">
		</div></div><br>
		<div class="row">
		<div class="col-md-6">
		<label style="margin-top:20%">Re-Password</label>
		</div>
		<div class="col-md-6">
		<br><br><input type="password" name="USR_RPWD"><br>
		</div>
		</div>
		<br>
		<input type="submit" value="submit" class="btnn">
		</form>
		<?php
		}else{
			// No match -> invalid url or account has already been activated.
			echo '<h1><div class="statusmsg">The url is either invalid or you already have activated your account.</div></h1>';
 
		}
		}else{
			// Invalid approach
			echo '<h1><div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div></h1>';
		}
             
        ?>
        <!-- stop PHP Code -->
		</div>
        
		</center>
    <!-- end wrap div --> 
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