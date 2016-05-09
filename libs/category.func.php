<?php
	function recursive($cates, $html = "--", $pid = 0, $level = 0) {
	$arr = array();
	foreach($cates as $v) {
		if($v['parent_id'] == $pid) {
			$v['level'] = $level + 1;
			$v['html'] = str_repeat($html, $level);
			$arr[] = $v;
			$arr = array_merge($arr, recursive($cates, $html, $v['cate_id'], $level + 1));	
		}
	}
	return $arr;
	}
?>
