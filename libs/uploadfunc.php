<?php

function imageUpLoad($file,$allowFormat = array('jpeg', 'jpg', 'gif', 'png'),$allowSize = '2097152',$path = './upload'){
		if($file['error']== 0) {
		echo '<script> alert("�ļ��ϴ��ɹ�") </script>';			
		$ext = end(explode('.', $file['name']));
		//echo $ext;
		//�ж��ļ��Ƿ�Ϸ�
		if(!in_array($ext, $allowFormat)) {
			exit('�ļ���ʽ���Ϸ�');	
		}		
		//�ж��ļ���С
		if($file['size'] > $allowSize) {
			exit('�ļ��ߴ����');
		}
		//�ж��Ƿ���ͼƬ
		if(!getimagesize($file['tmp_name'])) {
			exit('�ϴ��Ĳ���ͼƬ');
		}
		//�ж��Ƿ���http post�ύ
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
			exit('����http post�ύ');
		}
	}else {
		switch ($error) {
			case 1: 
				exit('�ļ���С�����������ļ��Ĵ�С');
				break;
			case 2: 
				exit('�ļ���С�����˱����ô�С');
				break;
			case 3: 
				exit('�����ļ����ϴ�');
				break;
			case 4:
				exit('û���ļ����ϴ�');
				break;
			case 6:
				exit('û���ҵ�����Ŀ¼');
				break;
			case 7:
				exit('Ŀ¼����д');
				break;
			case 8:
				exit('PHP��չ������ֹ���ļ��ϴ�');
				break;
		}
	}
}
	//ȡ�����
	function getUniqidName() {
		return md5(uniqid(microtime(true), true));
	}
?>
