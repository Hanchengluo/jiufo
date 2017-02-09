<?php
	include(MODEL_PATH.'img_fun.php');
	setSession();
	if(!empty($_POST)){
		$title=$_POST['name'];
		$type=$_POST['type'];
		$content=$_POST['content'];
		$id=$_POST['id'];
		$imgsrc=$_POST['imgsrc'];
		//先取一下
			$sql="SELECT `id`, `title`, `type`, `content`, `img` FROM `product` WHERE `id`='$id'";
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);
			unlink($row['img']);//删除文件里原来的
		if($imgsrc==""){
			$img=uploadImg('img', 'upload');
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
				echo $img;die;
			}
		}else{
			//更改
			$sql="UPDATE `product` SET `title`='$title',`type`='$type',`content`='$content',`img`='$imgsrc' WHERE `id`='$id'";
			$result=mysqli_query($link, $sql);//添加成功
			$num=mysqli_affected_rows($link);
			if($num){
				header("location:index.php?f=admin&c=mproduct");
			}
		}
			
	}
	

	if(!empty($_GET)){
		
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			//取数据
			$sql="SELECT `id`, `title`, `type`, `content`, `img` FROM `product` WHERE `id`='$id'";
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);
			
		}
			
	}
	include("protected/template/admin/editproduct.html");
?>