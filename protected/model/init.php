<?php
	header("content-type:text/html;charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	error_reporting(0);
	#第一步、连接到服务器
	$link=mysqli_connect('localhost','root','123','lanou');//连接到服务器
	#第二步、数据库连接错误时给出的提示
	if(mysqli_connect_errno($link)){
	    die(mysqli_connect_error($link));//发生错误不会运行,给出错误信息
	}
	#第三步、设置数据库的传输编码
	mysqli_query($link,"set names utf8");
	
	
	
	
	function setSession(){
		session_start();
		if (empty($_SESSION)) {
			header("content-type:text/html;charset=utf-8");
			echo '<script>alert("请先登录");window.location.href="index.php?f=admin&c=login&";</script>';
			die ;
		}
	}
?>