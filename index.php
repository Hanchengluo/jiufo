<?php

	//1.定义常量，文件路径，文件根目录
	//定义MVC的路径
	define('MODEL_PATH','protected/model/');
	define('VIEW_PATH','protected/template/');
	define('CONTROLLER_PATH','protected/controller/');
	header("Content-type: text/html; charset=utf-8"); 
		
	
	$f = isset($_GET['f'])?$_GET['f']:'site';// 模块名
	$c = isset($_GET['c'])?$_GET['c']:'index';// 控制器名
	
	
	date_default_timezone_set('Asia/Shanghai');//设置时区
	
	include(MODEL_PATH.'init.php');
	include(MODEL_PATH.'page_fun.php');
	
	
	include(CONTROLLER_PATH.$f.'/'.$c.'.php');	
?>