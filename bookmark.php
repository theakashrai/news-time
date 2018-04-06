 <?php  
 session_start();
 if(isset($_SESSION['name']))
	{
		$id=$_SESSION['id'];
		$title=$_POST['tit'];
		$des=$_POST['des'];
		$url=$_POST['co_url'];
		$link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time");
		$query="insert into bookmarks (id,title,des,url) values($id,'".mysqli_real_escape_string($link,$title)."','".mysqli_real_escape_string($link,$des)."','".mysqli_real_escape_string($link,$url)."')";
		if($link = mysqli_connect("localhost", "root", "Atlantis@123", "news_time")){
		if(mysqli_query($link,$query))
		{
			echo "done";
		}}
	}
	
 ?>




