<?php
	session_start();
	unset($_SESSION["name"]);
	setcookie('username',"",-1);
	setcookie("password","",-1);
	header('location:login.php');
?>