<?php
	setSession();
	if(!empty($_POST)){
		$title=$_POST["title"];
		$content=$_POST["editorValue"];
		$mktime=time();
		$sql="UPDATE `hfnews` SET `title`='$title',`type`='about',`content`='$content',`mktime`='$mktime' WHERE `title`='公司文化'";
		$result=mysqli_query($link, $sql);
	}
	
	$sql="SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `title`='公司文化'";
	$result=mysqli_query($link, $sql);
	$row=mysqli_fetch_assoc($result);
	include("protected/template/admin/culture.html");
?>