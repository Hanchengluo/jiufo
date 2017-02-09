<?php
setSession();
$pageList = 4;

if(!empty($_POST)){
	if(isset($_POST["idArr"])){
		$idarr=$_POST["idArr"];
		foreach($idarr as $id){
			$sql = "DELETE FROM `product` WHERE `id`='$id'";
			$result = mysqli_query($link, $sql);
		}
		$jsonArr = json_encode($_POST["idArr"]);
		//成功的删除了
	}
}

if (!empty($_GET)) {
	$id = $_GET['id'];
	$sql = "DELETE FROM `product` WHERE `id`='$id'";
	//删除图片
	$sql="SELECT `id`, `title`, `type`, `content`, `img` FROM `product` WHERE `id`='$id'";
	$result=mysqli_query($link, $sql);
	$row=mysqli_fetch_assoc($result);
	unlink($row['img']);//删除文件里原来的
	
	//从列表里删除
	$sql = "DELETE FROM `product` WHERE `id`='$id'";
	$result = mysqli_query($link, $sql);
	
	
	if (isset($_GET["p"])) {
		$offNum = $_GET["p"] - 1;
	} else {
		$offNum = 0;
	}
} else {
	$offNum = 0;
}

//查询条目
$sql = "SELECT * FROM `product` WHERE 1";
//sql语句
$result = mysqli_query($link, $sql);
//结果集

$num = mysqli_num_rows($result);

if ($num == 0) {
	$num = 1;
}

//偏移量获取
$pageNum = ceil($num / $pageList);

$p = $offNum + 1;
//表示第几页被点击
$offset = $offNum * $pageList;

//页码显示1234...
$pageNum = ceil($num / $pageList);
$str = '';

$str=pageList($p, $pageNum, 'admin', 'mproduct');//分页字符串



//执行显示
$sql = "SELECT * FROM `product` WHERE 1 ORDER BY `id` DESC LIMIT $offset,$pageList";
$result = mysqli_query($link, $sql);

$resultArr = array();
$resultArrc=array();
while ($rowarr = mysqli_fetch_assoc($result)) {
	$resultArrc[] = $rowarr;
};

$result = mysqli_query($link, $sql);
while ($rowarr = mysqli_fetch_assoc($result)) {
	$rowarr["mktime"]=date('Y-m-d h:i:s',$rowarr["mktime"]);
	$resultArr[] = $rowarr;
};

$jsonArr = array('result' => $resultArr, 'str' => $str,'p'=>$p);

$jsonArr = json_encode($jsonArr);

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	echo $jsonArr;
} else {
	include("protected/template/admin/mproduct.html");
}
	
?>