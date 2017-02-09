<?php
	include(MODEL_PATH.'img_fun.php');
	setSession();
	if(!empty($_POST)){
		$title=$_POST['name'];
		$type=$_POST['type'];
		$content=$_POST['content'];
		$imgsrc=$_POST['imgsrc'];
		//上传图片
		if($imgsrc==""){
			$img=uploadImg('img', 'upload');
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
				echo $img;die;
			}
		}else{
			//添加到数据库中
			
			$sql="INSERT INTO `product`(`title`, `type`, `content`, `img`) VALUES ('$title','$type','$content','$imgsrc')";
			$result=mysqli_query($link, $sql);//添加成功
			$num=mysqli_affected_rows($link);
			if($num){
				header("location:index.php?f=admin&c=mproduct");
			}
		}
	}
	include("protected/template/admin/product.html");
?>