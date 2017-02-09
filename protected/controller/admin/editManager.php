<?php
	//选中要编辑的那一条，由manager传来的
	setSession();
	if(!empty($_GET)){
		$id=$_GET["id"];
		echo $id;
		$sql="SELECT * FROM `wpf_student` WHERE `id`='$id' ";
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_assoc($result);
		$id=$row["id"];
		$name=$row['name'];
		$age=$row['age'];
		$sex=$row['sex'];
	}
		
	//更新上传
	if(!empty($_POST)){
		$id=$_POST["id"];
		$name=$_POST["name"];
		$age=$_POST['age'];
		$mktime=time();
		$sex=$_POST['sex'];
		$password=$_POST["password"];
		$sql2="UPDATE `wpf_student` SET `name`='$name',`age`='$age',`sex`='$sex',`password`='$password',`mktime`='$mktime' WHERE `id`='$id' ";
		$result=mysqli_query($link, $sql2);
		header('location:index.php?f=admin&c=manager');
	}
include("protected/template/admin/editManager.html");
?>