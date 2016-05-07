<?php
//这个文件写一些常用的函数

//原型打印函数
function p($data) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}
//跳转提示
function showMsg($msg,$url){
   // echo "<script>alert('{$msg}')</script>";
   // echo "<script>location.href='{$url}'</script>";
   echo '<script src="../admin/js/jquery.js"></script>';
   echo '<script src="../admin/js/sweetalert.min.js"></script>';
   echo '<link rel="stylesheet" type="text/css" href="../admin/css/sweetalert.css">';
   echo "<script>$(function(){ swal({title: '{$msg}',type: 'warning'},function() {location.href='{$url}';} );})</script>";
}

/**
* 获取服务器端IP地址
 * @return string
 */
function get_server_ip() { 
    if (isset($_SERVER)) { 
        if($_SERVER['SERVER_ADDR']) {
            $server_ip = $_SERVER['SERVER_ADDR']; 
        } else { 
            $server_ip = $_SERVER['LOCAL_ADDR']; 
        } 
    } else { 
        $server_ip = getenv('SERVER_ADDR');
    } 
    return $server_ip; 
}
/**
 * 检查主目录权限
 * @return [type]
 */
function checkUser(){
	if($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == ""){
		showMsg("您还没有登录，请先登录","index.php");
	}
}


//测试
$test2 = 2;

?>
