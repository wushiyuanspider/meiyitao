<?php
require("../include.php");
$id = intval($_GET['id']);
if(!empty($id)){
	$sql = "select * from em_admin where id = {$id}";
	$result = getOne($sql);
}
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
    <td colspan="2" align="left" valign="top"  style="padding-top:5px;padding-bottom: 5px;">　<img src="images/tb.gif" width="14" height="14" align="absmiddle"/><span class="fons">添加管理员</span></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle" bgcolor="#d3eaef" style="border-bottom:none;"><span class="STYLE3"></span></td>
    <td width="100px" align="left" valign="middle" bgcolor="4682b4" style="border-bottom:none;"><a href="user_list.php" style="color:#fff;margin-left:25px;">管理员列表</a></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td align="center" valign="top"><br />
      <form method="post" action="action.php?act=adduser" id="form" name="form">
      <table width="98%" border="1" cellpadding="0" cellspacing="0" class="clst">
        <tr>
	  <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">用户名：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
	  <input type="text" name="r_name" id="r_name" onchange="checkUserName(this.value)" style="width:185px;height:26px;" value="<?php echo $result['name']?>" /><span id="nameMsg">这里显示提示消息</span>
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">Email地址：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
	  <input type="text" name="r_email" style="width:185px;height:26px;" value="<?php echo $result['email']?>" />
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">手机号码：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
	  <input type="text" name="r_tel" id="r_mobile" maxlength="11" style="width:185px;height:26px;" value="<?php echo $result['tel']?>" />
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">密  码：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
            <input type="password" name="r_passwd" id="r_passwd" style="width:185px;height:26px;" />
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">确认密码：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
            <input type="password" name="r_passwd2" id="r_passwd2" style="width:185px;height:26px;" /><span class="STYLE2">*</span>
          </td>
        </tr>
         <tr>  
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">角色选择：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
          	<label><select name="role_select" id="role_select" value="">
              <option value="0" SELECTED="SELECTED">请选择</option>	
            	<!-- {my:foreach $role_name as $val} -->
              <option value="0">普通用户</option>
              <option value="1">管理员</option>
              <!-- 	{my:/foreach} -->
            </select></label>
          </td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center">
          	<input name="submit" type="submit" value="保存" class="button_b" />
		<input name="reset" type="reset" value="重置" class="button_b" />
		<!--隐藏域，传递id-->
		<input name="id" type="hidden" value="<?php echo $result['id']?>"/>
          </td>
        </tr>
      </table>
      </form>
      <br /></td>
  </tr>
</table>
	<script>
		function checkUserName(value) {
			var xmlhttp;
			//创建XMLHttpRequest对象
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			//向服务器发送请求
			xmlhttp.open("GET", "actionajax.php?user="+value, true);
			xmlhttp.send();
			//状态
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("nameMsg").innerHTML = xmlhttp.responseText;
				}
			}
		} 
	</script>
</body>
</html>
