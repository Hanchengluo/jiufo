<?php
	setSession();

	if(!empty($_POST)){
		
		$title=$_POST["title"];
		$mktime=time();
		$content=$_POST["content"];
		
		$sql="INSERT INTO `hfnews`( `title`, `type`, `content`, `mktime`) VALUES ('$title','new','$content','$mktime')";
		$result=mysqli_query($link, $sql);
		
		if(mysqli_affected_rows($link)){
			header('location:index.php?f=admin&c=index');
		}
}
include("protected/template/admin/add.html");
?>