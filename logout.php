<?php
session_start();
if(isset($_SESSION['name'])){
session_destroy();
$warn="You have been logged out";
echo "<script>alert('".$warn."');
window.location.href='login.php';</script>";
}
else{
$warn="You must login first!!";
echo "<script>alert('".$warn."');
window.location.href='login.php';</script>";
}
?>