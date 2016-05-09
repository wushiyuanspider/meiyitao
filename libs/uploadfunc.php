<?php

function imageUpLoad($file,$allowFormat = array('jpeg', 'jpg', 'gif', 'png'),$allowSize = '2097152',$path = './upload'){
		if($file['error']== 0) {
		echo '<script> alert("文件上传成功") </script>';			
		$ext = end(explode('.', $file['name']));
		//echo $ext;
		//判断文件是否合法
		if(!in_array($ext, $allowFormat)) {
			exit('文件格式不合法');	
		}		
		//判断文件大小
		if($file['size'] > $allowSize) {
			exit('文件尺寸过大');
		}
		//判断是否是图片
		if(!getimagesize($file['tmp_name'])) {
			exit('上传的不是图片');
		}
		//判断是否是http post提交
		if(!file_exists($path)) {
			mkdir($path, 0777, true);
			chmod ($path, 0777);
		}
		global $newName;
		$newName = getUniqidName().'.'.$ext;
		$detpath = $path.'/'.$newName;
		if(is_uploaded_file($file['tmp_name'])) {
			var_dump(move_uploaded_file($file['tmp_name'], $detpath));
			echo $detpath;
		}else{
			exit('不是http post提交');
		}
	}else {
		switch ($error) {
			case 1: 
				exit('文件大小超过了配置文件的大小');
				break;
			case 2: 
				exit('文件大小超过了表单配置大小');
				break;
			case 3: 
				exit('部分文件被上传');
				break;
			case 4:
				exit('没有文件被上传');
				break;
			case 6:
				exit('没有找到缓存目录');
				break;
			case 7:
				exit('目录不可写');
				break;
			case 8:
				exit('PHP扩展程序阻止了文件上传');
				break;
		}
	}
}
	//取随机名
	function getUniqidName() {
		return md5(uniqid(microtime(true), true));
	}
?>
