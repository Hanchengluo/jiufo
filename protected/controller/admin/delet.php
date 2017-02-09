<?php
setSession();

$pageList = 4;
if (!empty($_POST)) {
	if (isset($_POST["idArr"])) {
		$idarr = $_POST["idArr"];
		foreach ($idarr as $id) {
			$sql = "DELETE FROM `news` WHERE `id`='$id'";
			$result = mysqli_query($link, $sql);
		}
		//成功的删除了
		$p = intval($_POST["cid"]);
		$offNum=$p-1;
	}
}

//查询条目
$sql = "SELECT * FROM `news` WHERE 1";
//sql语句
$result = mysqli_query($link, $sql);
//结果集

$num = mysqli_num_rows($result);

if ($num == 0) {
	$num = 1;
}

//偏移量获取
$pageNum = ceil($num / $pageList);

//表示第几页被点击
$offset = $offNum * $pageList;

//页码显示1234...
$pageNum = ceil($num / $pageList);
$str = '';

if ($pageNum >= 3) {
	$str .= '<a href="index.php?p=1" title="First Page">&laquo; 首页</a>';
	$nt = ceil($p / 3) * 3;
	if ($p > 3) {
		$pk = (ceil($p / 3) - 1) * 3 + 1;
	} else {
		$pk = 1;
	}

	if ($nt > 3) {
		$str .= '<a href="index.php?p=' . ($nt - 5) . '" title="Previous Three Page">&laquo; 上三页</a>';
	}
	if ($p != 1) {
		$str .= '<a href="index.php?p=' . ($p - 1) . '" title="Previous Page">&laquo; 上一页</a>';
		//关键思路，每次都赋予当前get值得前一个值
	}
	for ($i = $pk; $i <= $pk + 2; $i++) {
		if ($p == $i) {
			$str .= '<a href="index.php?p=' . $i . '" class="number current" title="' . $i . '">' . $i . '</a>';
		} else {
			$str .= '<a href="index.php?p=' . $i . '" class="number" title="' . $i . '">' . $i . '</a>';
		}
	}
	if ($p != $pageNum) {
		$str .= '<a href="index.php?p=' . ($p + 1) . '" title="Next Page">下一页 &raquo;</a>';
	}

	if ($nt < $pageNum) {
		$str .= '<a href="index.php?p=' . ($nt + 1) . '" title="Next Three Page">下三页 &raquo;</a>';
	}

	$str .= '<a href="index.php?p=' . $pageNum . '" title="Last Page">最后一页 &raquo;</a>';
} else {
	$str .= '<a href="index.php?p=1" title="First Page">&laquo; 首页</a>';
	if ($p != 1) {
		$str .= '<a href="index.php?p=' . ($p - 1) . '" title="Previous Page">&laquo; 上一页</a>';
		//关键思路，每次都赋予当前get值得前一个值
	}
	for ($i = 1; $i <= $pageNum; $i++) {
		if ($p == $i) {
			$str .= '<a href="index.php?p=' . $i . '" class="number current" title="' . $i . '">' . $i . '</a>';
		} else {
			$str .= '<a href="index.php?p=' . $i . '" class="number" title="' . $i . '">' . $i . '</a>';
		}
	}
	if ($p != $pageNum) {
		$str .= '<a href="index.php?p=' . ($p + 1) . '" title="Next Page">下一页 &raquo;</a>';
	}
	$str .= '<a href="index.php?p=' . $pageNum . '" title="Last Page">最后一页 &raquo;</a>';
}

//执行显示
$sql = "SELECT * FROM `news` WHERE 1 ORDER BY `id` DESC LIMIT $offset,$pageList";
$str .= '<a href="index.php?p=' + $pageNum + '" title="First Page">&laquo; First</a>';
$result = mysqli_query($link, $sql);
//var_dump($result);//链接到了数据库

$resultArr = array();
$resultArrc = array();
while ($rowarr = mysqli_fetch_assoc($result)) {
	$resultArrc[] = $rowarr;
};

$result = mysqli_query($link, $sql);
while ($rowarr = mysqli_fetch_assoc($result)) {
	$rowarr["mktime"] = date('Y-m-d h:i:s', $rowarr["mktime"]);
	$resultArr[] = $rowarr;
};

$jsonArr = array('result' => $resultArr, 'str' => $str, 'p' => $p);

$jsonArr = json_encode($jsonArr);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	echo $jsonArr;
} else {
	include ("template/index.html");
}
?>