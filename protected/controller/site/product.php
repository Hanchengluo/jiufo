<?php
	if(!empty($_GET)){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$sql="SELECT * FROM `product` WHERE `id`='$id'";
		}elseif(isset($_GET['key'])){
			$key=$_GET['key'];
			$sql="SELECT * FROM `product` WHERE `title` LIKE '%$key%' ORDER BY `id` DESC";
		}else{
			$sql="SELECT * FROM `product` WHERE `type`='产品详情' ORDER BY `id` DESC";
			
		}
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_assoc($result);//看看是不是为空
	}
	include("protected/template/site/product.html");
?>