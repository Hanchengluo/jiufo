<?php

//进行分页显示
$pageList = 12;
//获取a链接传的页数
if (!empty($_GET)) {
	if (isset($_GET["p"])) {
		$p = $_GET["p"];
	} else {
		$p = 1;
	}
} else {
	$p = 1;
}

//分页开始
//查询条目
$sql = "SELECT * FROM `product` WHERE `type`='产品中心'";
//sql语句
$result = mysqli_query($link, $sql);
//结果集
$num = mysqli_num_rows($result);
if ($num == 0) {
	$num = 1;
}
//页码显示1234...
$pageNum = ceil($num / $pageList);
$offNum=$p - 1;
$offset = $offNum * $pageList;

//分页开始
$str = '';
$str=pageList($p, $pageNum, 'site', 'projectdemo');//分页字符串
//分页结束



//显示数据
$sql = "SELECT * FROM `product` WHERE `type`='产品中心' ORDER BY `id` DESC LIMIT $offset,$pageList";
$resultarr = array();
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$resultarr[] = $row;
}

$jsonArr = array('result' => $resultarr, 'str' => $str,'p'=>$p);

$jsonArr = json_encode($jsonArr);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	echo $jsonArr;
} else {
	include ("protected/template/site/projectdemo.html");
}
?>