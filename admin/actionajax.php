<?php
	//处理ajax请求
	require("../include.php");
	$user = $_GET['user'];
//	echo $user;

	$sql = "select * from em_admin where name = '{$user}'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)) {
		echo "用户名已经存在";
	}	
?>
