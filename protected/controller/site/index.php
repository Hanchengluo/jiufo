<?php

//首页的新闻展示
$sql = "SELECT `id`, `title`, `type`, `content`, `mktime` FROM `hfnews` WHERE `type`='new' ORDER BY `id` DESC";
$resultarr = array();
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$row["mktime"] = date('Y-m-d', $row["mktime"]);
	$resultarr[] = $row;
}

//进行分页显示
$pageList = 7;
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
$sql = "SELECT * FROM `product` WHERE `type`='主页展示'";
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
$str=pageList($p, $pageNum, 'site', 'index');//分页字符串
//分页结束


//显示数据
$sql = "SELECT * FROM `product` WHERE `type`='主页展示' ORDER BY `id` DESC LIMIT $offset,$pageList";
$resultarrc= array();
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$resultarrc[] = $row;
}

$jsonArr = array('result' => $resultarrc, 'str' => $str,'p'=>$p);

$jsonArr = json_encode($jsonArr);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	echo $jsonArr;
} else {
	include ("protected/template/site/index.html");
}
?>