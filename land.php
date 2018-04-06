<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
          <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
              <link rel="stylesheet" type="text/css" href="css/style.css">
			   <script src="js/bookmark.js"></script>
			   
              </head>
              <body>
			  <?php $uname="Login";
			  session_start();
						if(isset($_SESSION['name']))
						{
							$uname=$_SESSION['name'];
						}
				?>		
                <section id="banner">
                  <div class="bg-color">
                    <header id="header">
                      <div class="container">
                        <div id="mySidenav" class="sidenav">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
                          <h1 class="logo-name">News Time</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 text-center marb-35">
                      <h1 class="header-h">
                        <?php
						
						if(isset($_SESSION['name']))
						{

						$_SESSION['auth']="true";
						echo "Welcome back ";
						echo $_SESSION['name'];
						echo ". Hope that you didn't miss us much";
						?>
						</h1>
						<div id="dp">
						<?php
						$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
						$result_img=mysqli_query($link,"select * from images");
						while($row = mysqli_fetch_array($result_img,MYSQLI_ASSOC)){
					
						if($row['id']==$_SESSION['id'])
						{
							echo "<img src='./uploads/".$row['name']."'>"; 
						}}
						?>
						
						</div>
                        </h1>
                      </div>
                    </div>
                  </div>
				  <div class="container">
				  <div class="row">
				  <div class="col-md-12 text-center marb-3">
                    <h2 class="header-h">About</h2>
					</div></div>
					<div class="row">
					<div class="col-md-6" id="dp_name" onclick="edit_dp_name()" style="cursor:pointer"><h4>Name:<span id="dp_name_edit"></span></h4></div>
					<div class="col-md-6"><h4><?php echo $_SESSION['name']?></h4></div>
					</div>
					<div class="row">
					<div class="col-md-6" id="dp_name" onclick="edit_dp_email()" style="cursor:pointer"><h4>Email:<span id="dp_email_edit"></span></h4></div>
					<div class="col-md-6" ><h4><?php echo $_SESSION['mail']?></h4></div>
					</div>
					<div class="row">
					<div class="col-md-12"><a href="ch_pwd.php">Change Password</a></div>
					</div>
					</div>
					<center>
					<div class="dp_form" style="margin-top:20px">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
					<input class="btnnn" value="Edit pic?" onclick="dp_up()" type="button">
					<div id="dp_updiv" style="display:none">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input class="btnnn" type="submit" value="Upload Image" name="submit">
                    <input class="btnnn" type="button" value="Cancel?" onclick="dp_up_can()">
					</div>
                    </form>
					</div>
					</center>
					<div class= "container">
					 <div class="row">
						<div class="col-md-12">
								<div class="header-h">
								Bookmarks
								</div>
						</div>
					</div>
					</div>
					<div class="container">
						<div class="row">
							
								
									<?php $result_bm=mysqli_query($link,"select * from bookmarks");
										while($bm = mysqli_fetch_array($result_bm,MYSQLI_ASSOC))
											{
											if($_SESSION['id']==$bm['id']){
											$b1=$bm['serial'];
											$b3='onclick="display(\''.$b1.'\')"';	
											echo'<div class="col-md-12" '.$b3.'style="cursor:pointer">'.$bm['title'].'
											<a href="delete_bm.php?serial='.$bm['serial'].'"> Delete</a></div>';	
											}
											}
									?>
								
							
						</div>
					 </div> 
					 <div class="container">
					 <div class="row">
					 <div class="col-md-12">
					 <a href="index.php" style="text-decoration:none"><div class="header-h">read more news</div></a>
					 </div>
					 </div>
					</div>
					
                        <br>
                          
                          <?php } 
						  else {
						  header('Location:login.php');
						  }?>
                          <footer class="footer text-center">
                            <div class="footer-top">
                              <div class="row">
                                <div class="col-md-offset-3 col-md-6 text-center">
                                  <div class="widget">
                                    <h4 class="widget-title">News Time</h4>
                                    <div class="social-list">
                                      <a href="#">
                                        <i class="fa fa-twitter"></i>
                                      </a>
                                      <a href="#">
                                        <i class="fa fa-facebook"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </footer>
                          
                          <script src="js/bootstrap.min.js"></script>
                          <script src="js/navigator.js"></script>
                          <script src="js/dp.js"></script>
						 <script src="js/dp_edit.js"></script>
                        </body>
                      </html>