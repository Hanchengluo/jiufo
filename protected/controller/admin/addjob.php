<?php
	include(MODEL_PATH.'img_fun.php');
	setSession();
	if(!empty($_POST)){
		$title=$_POST['title'];
		$time=$_POST['time'];
		$type=$_POST['type'];
		$pos=$_POST['pos'];
		$num=$_POST['num'];
		//上传图片
		$img=uploadImg('img', 'upload');
		//添加到数据库中
		$sql="INSERT INTO `job`(`title`, `time`, `type`, `pos`, `num`, `img`) VALUES ('$title','$time','$type','$pos','$num','$img')";
		$result=mysqli_query($link, $sql);//添加成功
		$num=mysqli_affected_rows($link);
		if($num){
			echo "<script>alert('上传成功')</script>";
			header("location:index.php?f=admin&c=job");
		}
	}
	
	
	include("protected/template/admin/addjob.html");
?>>