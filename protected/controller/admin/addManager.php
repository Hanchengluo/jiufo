<?php	
	setSession();
	if(!empty($_POST)){
		//点击提交的时候一个添加
		$name=$_POST["name"];
		$password=$_POST["password"];
		$mktime=time();
		$age=$_POST["age"];
		$sex=$_POST["sex"];
		
		//这里是验证
		$sqlc="SELECT * FROM `wpf_student` WHERE `name`='$name' ";
		$resultc=mysqli_query($link, $sqlc);
		$num=mysqli_num_rows($resultc);
		if($num>0){
			$statu=1;
		}
		else{
			//这里是添加
			$sql="INSERT INTO `wpf_student`( `name`, `age`, `sex`, `password`, `mktime`) VALUES ('$name','$age','$sex','$password','$mktime')";
			$result=mysqli_query($link, $sql);
			$statu=0;
		}		
	}
	
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		echo $statu;
	} else {
		include("protected/template/admin/addManager.html");
	}
?>