<?php
require('../include.php');
//ajax验证添加用户名是否重复

//if(!empty($name)) {
	$name = $_GET['user'];
	$sqlName = "select * from em_admin where name = '{$name}'";
	$result = getOne($sqlName);
	if($result) {
		echo "用户名已存在";
	}	
//}
$act = empty($_GET['act'])? "": $_GET['act'];
switch($act) {
	//用户登陆
	case 'login':
	//	p($_POST);
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$verify = $_POST['verify'];	
		$verifySer = $_SESSION['verify'];
		$autoFlag = $_POST['autoflag'];
	//	echo $verifySer.'<br />';
	//	echo $verify;
		if ($verify !== $verifySer) {
		//	echo 'aaa';
			showMsg("验证码不正确", "index.php");
		}else {
			$sql = "select * from em_admin where name = '{$username}' and pwd = '{$password}'";
			$result = getOne($sql);
		//	var_dump($result);
		//	die;
			if($result) {
				if(!empty($autoFlag)) {	
					setcookie("adminName", $result['name'], time()+7*3600*24);
					setcookie("adminId", $result['id'], time()+7*3600*24);
					echo "<script>alert('设置cookie！')</script>";
				}
				//保存登录信息
				$_SESSION['adminName'] = $result['name'];
				$_SESSION['adminId'] = $result['id'];
				$_SESSION['logTime'] = $result['login_time'];
				$_SESSION['lastIp'] = $result['last_ip'];
				//修改登录信息
				$arr = array('login_time'=>time(), 'visit_count'=>$result['visit_count']+1, 'last_ip'=>get_server_ip());
				update("em_admin", $arr, "id = {$result['id']}");
				showMsg("登录成功", "main.php");
			}else {
				showMsg("登录失败", "index.php");
			}

		}
		break;

	//退出
	case 'logout':
	//	p($_SESSION);
	//	p($_COOKIE);
		$_SESSION = array();
		session_destroy();
		if(isset($_COOKIE['adminName']))
			setcookie("adminName", "", time()-1);
		if(isset($_COOKIE['adminId']))
			setcookie('adminId', "", time()-1);
		if(isset($_COOKIE[session_name()]))
			setcookie(session_name(), "", time()-1);
		p($_SESSION);
		p($_COOKIE);
	
		header("location:index.php");
		break;
	//添加用户
	case 'adduser':
		$id = $_POST['id'];
	//	echo $id;
	//	die;
		//p($_POST);
		//添加用户信息
		$_SESSION['username'] = $_POST['r_name'];
		$info = array('name'=>$_POST['r_name'], 'pwd'=>$_POST['r_password'], 'email'=>$_POST['r_email'], 'tel'=>$_POST['r_tel'], 'login_time'=>'', 'visit_count'=>'', 'last_ip'=>'', 'role'=>$_POST['role_select'], 'reg_time'=>date("Y-m-d H:i:s",time()));
		if(empty($id)){
			insert('em_admin', $info);
			showMsg('增加用户成功！', 'user_list.php');
		}else {
			$result = update("em_admin", $info, "id = {$id}");
		//	var_dump($result);
			showMsg('更新用户成功！', 'user_list.php');	
		}
		break;
	//删除用户
	case 'del':
		$id = $_GET['id'];
		//	echo "<script> confirm('确认删除吗？'); </script>";
	//	echo "";
		del('em_admin', "id={$id}");	
		showMsg("删除用户成功！", 'user_list.php');
	//	header("loaction.href='user.list.php'");
		break;
	//添加分类
	case 'addCate':
		$cateId = $_POST['cate_id'];
	//	p($_POST);
		$cateInfo = array("cate_name"=>$_POST['cate_name'], "parent_id"=>$_POST['parent_id'], "sort_order"=>'', "show_in_nav"=>$_POST['show_in_nav'], "is_show"=>$_POST['is_show'], "link"=>$_POST['link']);
		if(empty($cateId)) {
			insert("em_category", $cateInfo);
			showMsg("添加分类成功！", "art_cate.php");
		}else {
			$result = update('em_category', $cateInfo, "cate_id = {$cateId}");
		//	var_dump($result);
		//	die;
			showMsg('更新分类成功！', "art_cate.php");
		}
		break;
	//删除分类
	case 'delcate':
		$cateId = $_GET['cateid'];
		echo $cateId;
		$result = del('em_category', "cate_id = {$cateId}");
		//var_dump($result);
		showMsg('删除分类成功！', "art_cate.php");
		break;
	//修改nav显示
	case 'cate_nav';
		$id = $_GET['id'];
		$num = $_GET['num'];
		$arr = array("show_in_nav"=>$num);
		$result = update("em_category", $arr, "cate_id = {$id}");
		if($result) {
			echo 1;
		}else {
			echo 0;
		}
		break;
	//修改分类是否显示
	case 'cate_show':
		$id = $_GET['id'];
		$num = $_GET['num'];
		$arr = array("is_show"=>$num);
		$result = update("em_category", $arr, "cate_id = {$id}");
		if($result) {
			echo 1;
		}else {
			echo 0;
		}
		break;
	//修改排序
	case 'sort':
	$id = $_GET['cate_id'];
		$sort_order = $_GET['sort_order'];
		$arr = array("sort_order"=>$sort_order);
		$result = update("em_category", $arr, "cate_id = {$id}");
		if($result) {
			echo 1;
		}else {
			echo 0;
		}
		break;
	case 'editeArt':
	//	p($_POST);
		// p($_FILES);
		// die;
		$img_files = $_FILES['art_img'];
		// die;
		$artId = $_POST['art_id'];

		imageUpLoad($img_files);

		$artInfo = array("art_title"=>$_POST['art_title'], "cat_id"=>'', "art_author"=>$_POST['art_author'], "art_sort"=>'', "art_img"=>"$newName", "art_open"=>$_POST['art_open'], "description"=>$_POST["description"], "content"=>$_POST['content'], "click_count"=>'', "add_time"=>time());
		if(empty($artId)) {
			insert("em_article", $artInfo);
			// die;
			showMsg("添加文章成功！", "art_list.php");
		}else {
			// unlink("./upload/".$newName);
			$result = update('em_article', $artInfo, "art_id= {$artId}");
			// var_dump($result);
			// die;
			showMsg('更新文章成功！', "art_list.php");
		}
		break;
	case 'delart':
		$artId = $_GET['artid'];
		$sql = "select * from em_article where art_id = {$artId}";
		$result = getOne($sql);
		// p($result);
		// die;
		del('em_article', "art_id={$artId}");
		unlink("./upload/".$result['art_img']);	
		// die;
		showMsg("删除文章成功！", 'art_list.php');
		break;

	case 'editePpt':
		// p($_POST);
		// die;
		$img_files = $_FILES['sd_img'];
		// die;
		$sdId = $_POST['sd_id'];

		imageUpLoad($img_files);

		$pptInfo = array("sd_name"=>$_POST['sd_name'],"sd_cate"=>$_POST['sd_cate'],"sd_img"=>$newName,"sd_show"=>$_POST['sd_show'],"sd_description"=>$_POST['sd_description'], "sd_content"=>$_POST['sd_content']);
		if(empty($sdId)) {
			insert("em_slide", $pptInfo);
			// die;
			showMsg("添加幻灯片成功！", "ppt_list.php");
		}else {
			// unlink("./upload/".$newName);
			$result = update('em_slide', $pptInfo, "sd_id= {$sdId}");
			// var_dump($result);
			// die;
			showMsg('更新幻灯片成功！', "ppt_list.php");
		}
		break;

	case 'delPpt':
		$sdId = $_GET['sdid'];
		$sql = "select * from em_slide where sd_id = {$sdId}";
		$result = getOne($sql);
		// p($result);
		// die;
		del('em_slide', "sd_id={$sdId}");
		// unlink("./upload/".$result['sd_img']);	
		// die;
		showMsg("删除幻灯片成功！", 'ppt_list.php');
		break;
}


