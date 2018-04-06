<?php
session_start();
if(isset($_SESSION['id']))
{
$sid=$_SESSION['id'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$name = $_FILES['fileToUpload']['name'];
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
		//$query = "insert into images(name) values('".$name."')";
  //mysqli_query($con,$query);
	$insert=true;
	$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
	
	$result_img=mysqli_query($link,"select * from images");

	
			while($col=mysqli_fetch_array($result_img,MYSQLI_ASSOC))
					{	
						if(($sid=="$col[id]"))
						{ //echo "one";
							$query="update images set name='$name' where id=$sid";
							if(mysqli_query($link,$query)){
								//echo 'sucessfully updated image';
								$insert=false;
							}
						}
					}
					if($insert){
						 //echo "two";
					$query = "insert into images values($sid,'$name')";
					
						if(mysqli_query($link,$query)){
						//echo "sucess  set";
						}
						
					}
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
	
    }
}
	echo "<script>window.location.href='land.php';</script>";
}
else{
	echo "<script>window.location.href='login.php';</script>";
}

?>