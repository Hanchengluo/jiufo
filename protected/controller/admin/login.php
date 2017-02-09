<?php
	session_start();
	if(!empty($_POST)){
			$username=$_POST["userName"];
			$password=$_POST["passerWord"];
			if(isset($_POST["remember"])){
				setcookie('username',$username,time()+60*3600*24);
				setcookie("password",$password,time()+60*3600*24);
			}else{
				setcookie('username',"",-1);
				setcookie("password","",-1);
			}
			
			$sql="SELECT * FROM `wpf_student` WHERE `name`='$username' AND `password`='$password'";
			$result=mysqli_query($link,$sql);
			$num=mysqli_num_rows($result);
			if($num>0){
				$_SESSION["name"]=$username;
				header('location:index.php?f=admin&c=index');
			}
			//用户名没有输对
			else{
				echo '<script>alert("用户名或密码有误");</script>';	
			}
	}
	include("protected/template/admin/login.html");
?>

