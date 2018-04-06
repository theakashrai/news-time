<?php
		session_start();
		if(isset($_SESSION['name'])){
		$serial=$_GET['serial'];
		$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
		$result_bm=mysqli_query($link,"select * from bookmarks");
		while($row = mysqli_fetch_array($result_bm,MYSQLI_ASSOC)){
			if($row['serial']==$serial)				
				{
					if($row['id']==$_SESSION['id'])
					{
						mysqli_query($link,"delete from bookmarks where serial=".$serial);
						echo "<script>alert('done');window.location.href='land.php';</script>";
					}
				}	
		}
		}else{
			echo "<script>alert('you must login first');window.location.href='login.php#bm';</script>";
		}
		
?>