<?php
require("../include.php");
$cateId = intval($_GET['cateid']);
//echo $cateId;
if(!empty($cateId)){
	$sql = "select * from em_category where cate_id = {$cateId}";
	$result = getOne($sql);

//	p($cates);
}
	$sqlAll = "select * from em_category";
	$resAll = mysql_query($sqlAll);
	while(!false == ($res = mysql_fetch_assoc($resAll))) {
		$cates[] = $res;
	}
//	p($cates);
//	die;
//p($result);
?>

<html>
<head>
<link href="css/project.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<meta charset="utf-8"></meta>
<style type="text/css">
table{border-collapse:collapse;}
select{width:120px;}
table{font-size:12px;}
body tr td { border:#a8c7ce 1px solid;}
a:link, a:visited, a:hover, a:active{ color:#204155;}
/* 头部表格 */
.clst {	margin-bottom: 5px;	width: 98%;	margin-top:5px;	border: 1px solid #a8c7ce; line-height: 32px; font-size:12px;}
.clst td{border: 1px solid #a8c7ce;}
.clst .tleft { width:60%; background: #fafafa; text-align: left;}
.clst .tleft a { color: #000;}
.clst .tleft a:hover { color: #f00; text-decoration:underline;}
.clst .tright {	width:40%;	padding-right: 10px; background: #fafafa; text-align: right;}
.but1 {	background:#d3eaef;	color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px;	margin-right: 1px !important; margin-right: 0;}
.but11 { background:#d3eaef; color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px; margin-right: 1px !important; margin-right: 0;}
.but111 { background:#d3eaef; color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px; margin-right: 1px !important;	margin-right: 0;}
.STYLE1 {color: #204155;margin-left:15px;}
.STYLE2 {color: #FF0000;margin-left:10px;}
.STYLE3 {color: #FFFFFF}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" align="left" valign="top"  style="padding-top:5px;padding-bottom: 5px;">　<img src="images/tb.gif" width="14" height="14" align="absmiddle"/><span class="fons">文章管理</span></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle" bgcolor="#d3eaef" style="border-bottom:none;"><span class="STYLE3"></span></td>
    <td width="100px" align="left" valign="middle" bgcolor="4682b4" style="border-bottom:none;"><a href="user_list.php" style="color:#fff;margin-left:25px;">文章列表</a></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td align="center" valign="top"><br />
      <form method="post" action="action.php?act=addCate" id="form" name="form">
      <table width="98%" border="1" cellpadding="0" cellspacing="0" class="clst">
        <tr>
	  <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">分类名称：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
	  <input type="text" name="cate_name" id="cate_name" style="width:185px;height:26px;" value="<?php echo $result['cate_name']?>" />
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">级别：</span></td>
	  <td height="30" align="left" valign="middle" style="padding-left:10px;">  
		 <select name="parent_id" id="parent_id" value="<?php echo $result['parent_id']?>">				
			<!--循环级别-->
			<option value="0">顶级分类</option>
			<?php if(!empty($cates)) {foreach($cates as $catename) {?>
				<option <?php if($result['parent_id'] == $catename['cate_id']) {echo 'selected';}?> value="<?php echo $catename['cate_id']?>"><?php echo $catename['cate_name']?></option>
			<?php }}?>
		</select>
	  </td>
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">导航显示：</span></td>
	  <td height="30" align="left" valign="middle" style="padding-left:10px;">
		  <input type="radio" name="show_in_nav" value="0" <?php if(!empty($cateId)) {if($result['show_in_nav'] == 0) {echo 'checked';}}else {echo 'checked';}?>/>显示
	 	<input type="radio" name="show_in_nav" value="1" <?php if(!empty($cateId)) {if($result['show_in_nav'] == 1) {echo 'checked';}}?>/>不显示
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">是否显示：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
	 	<input type="radio" name="is_show" value="0" <?php if(!empty($cateId)) {if($result['is_show'] == 0) {echo 'checked';}}else {echo 'checked';}?>/>显示
	 	<input type="radio" name="is_show" value="1" <?php if(!empty($cateId)) {if($result['is_show'] == 1) {echo 'checked';}}?>/>不显示
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">链接地址：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
		  <input type="text" name="link" id="link" style="width:185px;height:26px;" value="<?php echo $result['link']?>"/>
          </td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center">
          	<input name="submit" type="submit" value="保存" class="button_b" />
		<input name="reset" type="reset" value="重置" class="button_b" />
		<!--隐藏域，传递cateid-->
		<input name="cate_id" type="hidden" value="<?php echo $result['cate_id']?>"/>
          </td>
        </tr>
      </table>
      </form>
      <br /></td>
  </tr>
</table>
</body>
</html>

