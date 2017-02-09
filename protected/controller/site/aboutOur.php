<?php
	$sql = "SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `title`='关于我们' ORDER BY `id` DESC";
	if(!empty($_GET)){
		if(isset($_GET['s'])){
			$status=$_GET['s'];
			if($status=='about'){
				$sql = "SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `title`='关于我们' ORDER BY `id` DESC";
			}
			if($status=='culture'){
				$sql = "SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `title`='公司文化' ORDER BY `id` DESC";
			}
			if($status=='honor'){
				$sql = "SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `title`='公司荣誉' ORDER BY `id` DESC";
			}
			
		}
	}
	$result = mysqli_query($link, $sql);
	$row=mysqli_fetch_assoc($result);
	include("protected/template/site/aboutOur.html");
?>	