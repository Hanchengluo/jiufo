<?php
	setSession();
	
	
	if(!empty($_GET)){
		$id=$_GET["id"];
		$sql="SELECT * FROM `hfnews` WHERE `id`='$id' ";
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_assoc($result);
		$id=$row["id"];
		$title=$row['title'];
		$mkTime=date('Y-m-d',$row['mktime']);
		$content=$row['content'];
	}
	if(!empty($_POST)){
		$ID=$_POST["id"];
		$Title=$_POST["title"];
		$mktime=time();
		$content=$_POST['content'];
		$sql2="UPDATE `hfnews` SET `title`='$Title',`type`='new',`content`='$content',`mktime`='$mktime' WHERE `id`='$ID'";
		$result=mysqli_query($link, $sql2);
		header('location:index.php?f=admin&c=index');
	}
//	die;
include("protected/template/admin/reEdit.html");
?>