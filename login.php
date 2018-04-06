<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section id="banner">
         <div class="bg-color">
            <header id="header">
               <div class="container">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					    <div id="mySidenavcat">
						<a href="login.php">Login</a>
						<a href="index.php">Home</a>
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
	<div class="container">
		<div class="row">
				   <div class="col-md-12 text-center marb-35">
					  <h1 class="header-h">Sign in</h1>
				   </div>
		</div>
	</div>
	<center>

			<form method ="post" action ="ucheck.php">
				
						<div><label style="float:none">E-mail</label></div>
					
						<div><input type="text" name= "USR_MAIL" class="focus"></div><br><br>
					
						<label style="float:none">Password:</label>
					
						<div>
						<input type="PASSWORD" name="USR_PWD" class="focus"><br>
						</div>
	
						<br>
						<br><input class="btnn" type="Submit" value="Login" >
					
			</form>
					<br>
					<a id ="up" href ="signup.php">Sign up</a>
				
	</center>
	
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
	<?php session_start();
	$_SESSION['auth']="true";
	?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/navigator.js"></script>
</body>
</html>