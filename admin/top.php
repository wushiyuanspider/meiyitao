<?php 
	require('../include.php');
//p($_COOKIE);
//p($_SESSION);
//	print_r($_SESSION);
?>
<html>
<head>
<title>管理登录页2</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;}
.STYLE1 {color: #FFFFFF;font-weight: bold;font-family: "宋体";font-size: 14px;}
.STYLE2 {color: #FFFFFF;font-family: "宋体";font-size: 12;}
.STYLE9 {font-family: "宋体";font-weight: bold;font-size: 12px;color: #153966;}
.STYLE14 {font-size: 12px; font-family: "宋体"; color: #153966; }
.STYLE17 {color: #153966;font-size: 12;font-family: "宋体";}
.STYLE19 {font-size: 12px;color: #153966;}
.str {font-weight: bold;}
.str_2 {font-weight: bold;margin-left: 450px;}
</style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" background="images/main_02.gif"><img src="images/main_02.gif" width="14" height="7"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="444" align="left" valign="top"><a href="../tpls" target="_blank"><img src="images/main_05.gif" width="444" height="57" alt=""></a></td>
        <td width="719" align="left" valign="top">&nbsp;</td>
        <td width="277" align="left" valign="top"><table width="277" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="277" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40" align="left" valign="top" background="images/main_07_03.gif"><img src="images/main_07_02.gif" width="26" height="27"></td>
                <td width="79" align="left" valign="top"><div align="right"><a href="" target="rightFrame"><img src="images/main_07_05.gif" width="79" height="27" border="0"></a></div></td>
		<td width="79" align="left" valign="top"><div align="right"><a href="" target="rightFrame"><img src="images/main_07_07.gif" width="79" height="27" border="0"></a></div></td>
		<!--退出系统-->
		<td width="79" align="left" valign="top"><div align="right"><a href="action.php?act=logout" target="_parent"><img src="images/main_07_09.gif" width="79" height="27" border="0"></a></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
	<td width="70" height="33" align="left" valign="top" background="images/main_08.gif"><img src="images/main_09.gif" width="60" height="33"></td>
														<!--session  cookie-->
														<td height="33" align="left" valign="middle" background="images/main_08.gif"><span class="STYLE9">您好：
<?php 
	if($_SESSION['adminName'] != "") {
		echo $_SESSION['adminName'];
	}
	else if($_COOKIE['adminName'] != "") {
		echo $_COOKIE['adminName'];
	}

?>！欢迎登录系统！ </span></td>
        <td width="160" align="center" valign="middle" background="images/main_08.gif"><span class="STYLE9">用户组：</span></td>
        <td width="220" align="left" valign="middle" background="images/main_08.gif"><span class="STYLE9">上次登录时间：<?php echo date("Y-m-d H:i:s", $_SESSION['logTime'])?></span><span class="STYLE14"></span></td>
        <td width="180" align="left" valign="middle" background="images/main_08.gif"><span class="STYLE9">上次登录的IP：<?php echo $_SESSION['lastIp']?></span><span class="STYLE14"></span></td>
        <td width="36" height="33" align="center" valign="middle" background="images/main_08.gif"><img src="images/main_11.gif" width="36" height="33"></td>
        <td width="150" align="left" valign="middle" background="images/main_08.gif"><span class="STYLE17"><STRONG>客服热线：</STRONG>400-683-6568</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/main_31.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" height="30"><img src="images/main_28.gif" width="8" height="30" /></td>
        <td width="141" background="images/main_29.gif"><table width="141%" height="30" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="33" align="left" valign="middle">&nbsp;</td>
            <td height="30" align="left" valign="top" class="STYLE19"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="23" align="left" valign="bottom" class="STYLE19">管理菜单</td>
              </tr>
            </table></td>
            <td width="20" align="left" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
        <td width="39"><img src="images/main_30.gif" width="39" height="30" /></td>
        <td>&nbsp;</td>
        <td width="17"><img src="images/main_32.gif" width="17" height="30" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
