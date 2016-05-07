<?php
/**
 * 连接数据库
 * @return
 */
//测试
$test3 = 3;
function connect(){
	$con = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_NAME);
    return $con;
}

/**
 * 数据库插入操作
 * @param  [type] $table
 * @param  [type] $array
 * @return [type] 
 */
function insert($table,$array){
	$keys = join(",",array_keys($array));
	$vals = "'".join("','",array_values($array))."'";//exit($sql);
	$sql = "insert into {$table}({$keys}) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
}

/**
 * 修改操作
 * @param  [type] $table
 * @param  [type] $array
 * @param  [type] $where
 * @return [type]
 */
function update($table,$array,$where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
	$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
   // exit($sql);
	$result = mysql_query($sql);
	if($result){
		return mysql_affected_rows();
	}else{
		return false;
	}
}
/**
 * 删除操作
 * @param  [type] $table
 * @param  [type] $where
 */
function del($table,$where=null){
	$sql="delete from {$table}".($where==null?null:" where ".$where);
	mysql_query($sql);
	return mysql_affected_rows();
}

/**
 * 查询单条数据
 * @param  [type] $sql
 * @param  [type] $result_type
 */
function getOne($sql){
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	return $row;  
}
/**
 * 查询多条数据
 * @param  [type] $sql
 * @param  [type] $result_type
 */
function getAll($sql,$result_type=MYSQL_ASSOC){
    $result = mysql_query($sql);
    while(@$row=mysql_fetch_array($result,$result_type)) {
    	$rows[]=$row;
    }
    return $rows;  
}
/**
 * 得到结果数量
 * @param  [type] $sql [description]
 * @return [type]      [description]
 */
function getResultNum($sql){
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}
