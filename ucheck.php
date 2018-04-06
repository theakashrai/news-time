<?php
session_start();
if(isset($_SESSION['auth'])){
session_unset();
if(isset($_POST['USR_MAIL']) && !empty($_POST['USR_MAIL']) AND isset($_POST['USR_PWD']) && !empty($_POST['USR_PWD'])){
        $mysqli = new mysqli("localhost", "root", "Atlantis@123", "news_time");
		$email =$mysqli->real_escape_string($_POST['USR_MAIL']);
		$pwd = $mysqli->real_escape_string($_POST['USR_PWD']);
		$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
		$match=false;
		$result=mysqli_query($link,"select * from users where email='$email' and password='$pwd'");
		if(!$result) echo mysqli_error($link);
		else{
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				if($row['email']==$email){
					if($row['password']==$pwd){
					$match="true";
					$name=$row['username'];
					$id=$row['id'];
					}else
					{
						echo "lol";
					}
				}
			}
		if($match=="true"){
		echo $name.$pwd.$email;
		session_start();
		$_SESSION['name']=$name;
		$_SESSION['auth']="true";
		$_SESSION['pwd']=$pwd;
		$_SESSION['mail']=$email;
		$_SESSION['id']=$id;
		
		header('Location:land.php');
		}else{
		$warn="Password or Username incorrect. Failed to log in. Please enter correct information ";
		echo "<script>alert('".$warn."');
		window.location.href='login.php';</script>";
		session_unset();
		}
			
		}
		
}
}
else
{ 
$warn="You must login first!!";
echo "<script>alert('".$warn."');
window.location.href='login.php';</script>";
}
?>