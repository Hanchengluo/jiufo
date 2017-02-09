<?php
/**
 * 分页函数
 * @param  $p  		 num      当前页
 * @param  $pageNum  num      总页数
 * @param  $f 		 string   文件名
 * @param  $c        string   控制器名
 * @return $str      string   返回的分页字符串
 */
function pageList($p,$pageNum,$f,$c){
	$str='';
	$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=1" title="First Page">首页</a>';
	if ($p != 1) {
		$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=' . ($p - 1) . '" title="Previous Page">上一页</a>';
		//关键思路，每次都赋予当前get值得前一个值
	}
	for ($i = 1; $i <= $pageNum; $i++) {
		if ($p == $i) {
			$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=' . $i . '" class="number current" title="' . $i . '">' . $i . '</a>';
		} else {
			$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=' . $i . '" class="number" title="' . $i . '">' . $i . '</a>';
		}
	}
	if ($p != $pageNum) {
		$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=' . ($p + 1) . '" title="Next Page">下一页 </a>';
	}
	$str .= '<a href="index.php?f='.$f.'&c='.$c.'&p=' . $pageNum . '" title="Last Page">最后一页 </a>';
	return $str;
}

?>