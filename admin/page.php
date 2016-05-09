<?php
	require("../include.php");
	$size = 10;
	$page = (isset($_REQUEST['page']))? $_REQUEST['page'] : 1; 
	global $page;
	if($page <= 0 || $page == null || !is_numeric($page)) {
		$page = 1;
	}
	$sql = "select * from em_category";
	$totalNum = mysql_num_rows(mysql_query($sql));		//数据总数
	$totalPage = ceil($totalNum/$size);			//总页数
	//echo $num;
	$offset = ($page - 1) * $size;
	$sql = "select * from em_category limit {$offset}, {$size}";
	$result = getall($sql);
	//p($_SERVER);
	p($result);

	$url = $_SERVER[PHP_SELF];

	$index = ($page == 1)? "" : "<a href='{$url}?page=1'>首页</a>";				//首页
	$prev = ($page == 1)? "" : "<a href=".$url."?page=".($page-1).">上一页</a>";		//上一页
	$next = ($page == $totalPage)? "" : "<a href=".$url."?page=".($page+1).">下一页</a>";	//下一页
	$last = ($page == $totalPage)? "" : "<a href='{$url}?page={$totalPage}'>尾页</a>";	//尾页
	for($i=1; $i <= $totalPage; $i++) {
		if($i == $page) {
			$p .= "[{$i}]";	
		}else {
			$p .= "<a href='{$url}?page={$i}'>$i</a>";
		}
	}
	echo $index.$prev.$p.$next.$last;
?>
