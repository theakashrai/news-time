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
                       
                        <div id="sourceCat">
                           <a href="#about" onclick="fudu();">Category</a>
                        </div>
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
                  <h1 class="header-h element-animation">Latest News</h1>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-sm-6">
                  <span id="image"></span> 
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="about-info">
                     <h2 class="heading"><span id="title"></span></h2>
                     <p id="des" style="overflow:auto">
					 </p>
					
                  </div>
               </div>
            </div>
			<div id="next_btn" onclick="next_change();">&gt;</div>
			<div id="prev_btn" onclick="prev_change();">&lt;</div>
			<center><input type="button" class="btnny" value="Update" style="margin-top:20px" onclick="requestNewsJSON(urlGenerator('the-times-of-india'))"></center>
         </div>
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
      <script src="js/slave.js"></script>
   </body>
</html>