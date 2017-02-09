<?php
	setSession();
	if(!empty($_GET)){
		$id=$_GET['id'];
		if($_GET['id']=='23'){
			unset($id);
			$_GET['id']=-1;
			unset($_GET['id']);
			echo "<script>alert('admin管理员不能删');window.location.href='index.php?f=admin&c=manager';</script>";
		}
		$sql="DELETE FROM `wpf_student` WHERE `id`='$id'";
		$result=mysqli_query($link, $sql);
	}//要删除的get数据
	
	$sql="SELECT * FROM `wpf_student` WHERE 1";//查询到了所有的数据
	$result=mysqli_query($link, $sql);//
	//var_dump($result);//链接到了数据库
	include("protected/template/admin/manager.html");
?>