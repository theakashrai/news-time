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
$uname = "Login";
if (isset($_SESSION['name'])) {
    $uname = $_SESSION['name'];
}
?>
                        <section id="banner">
         <div class="bg-color">
            <header id="header">
               <div class="container">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                      <a href="javascript:void(0)" class="backnavbtn" onclick="backnav()">&lt;</a>
                     <div id="mySidenavcat">
                        <?php
if ($uname == "Login") {
    echo '<a href="login.php">';
    echo $uname;
    echo '</a>';
} else {
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
      <section id="about" class="section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center marb-35">
                  <h1 class="header-h element-animation">Change Password</h1>
               </div>
            </div>
         </div>
      </section>
                        <?php

if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];
    $id   = $_SESSION['id'];
    $link = mysqli_connect('localhost', 'root', 'Atlantis@123', 'news_time');
    $res  = mysqli_query($link, "select * from users where email='$mail' AND id =$id ");
    while ($row = (mysqli_fetch_array($res, MYSQLI_ASSOC))) {
        $or = $row['password'];
        
    }
    if (isset($_POST['OR']) && !empty($_POST['OR']) AND isset($_POST['RNW']) && !empty($_POST['RNW']) AND isset($_POST['NW']) && !empty($_POST['NW'])) {
        $OR_PWD  = mysqli_real_escape_string($link, $_POST['OR']);
        $NW_PWD  = mysqli_real_escape_string($link, $_POST['NW']);
        $RNW_PWD = mysqli_real_escape_string($link, $_POST['RNW']);
        
        if ($or == $OR_PWD) {
            if ($NW_PWD == $RNW_PWD) {
                $res_pwd = mysqli_query($link, "update users set password='$NW_PWD' where email='$mail' AND id= $id");
                if ($res_pwd) {
                    echo "<script>alert('Password changed successfully!');window.location.href='land.php';</script>";
                }
            } else {
                echo "new passwords doesn't match";
            }
        } else {
            echo "old password isn't correct";
        }
    } else {
?>
   <center>
    <form action="" method="POST">
    <label style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;Old :&nbsp;</label><input type="password" name="OR"><br><br>
    <label style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;New :&nbsp;</label><input type="password" name="NW"><br><br>
    <label style="float:none">Re-New :</label>
    <input type="password" name="RNW"><br><br>
    <input type="submit" class="btnn" value="Submit"><br><br>
    
    </form>
    </center>
<?php
    }
} else {
    echo "<script>window.location.href='login.php';</script>";
}
?>
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
      <!-- / footer -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/navigator.js"></script>
      
   </body>
</html>