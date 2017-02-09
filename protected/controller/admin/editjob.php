<?php
	include(MODEL_PATH.'img_fun.php');
	setSession();
	if(!empty($_POST)){
		$title=$_POST['title'];
		$time=$_POST['time'];
		$type=$_POST['type'];
		$pos=$_POST['pos'];
		$num=$_POST['num'];
		$id=$_POST['id'];
		//先取一下
		$sql="SELECT * FROM `job` WHERE `id`='$id'";
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_assoc($result);
		unlink($row['img']);//删除文件里原来的
		
		//上传
		$img=uploadImg('img', 'upload');
		//更改
		$sql="UPDATE `job` SET `title`='$title',`time`='$time',`type`='$type',`pos`='$pos',`num`='$num',`img`='$img' WHERE `id`='$id'";
		$result=mysqli_query($link, $sql);//添加成功
		$num=mysqli_affected_rows($link);
		if($num){
			header("location:index.php?f=admin&c=job");
		}
	}
	

	if(!empty($_GET)){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			//取数据
			$sql="SELECT * FROM `job` WHERE `id`='$id'";
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);	
		}	
	}
	include("protected/template/admin/editjob.html");
?>