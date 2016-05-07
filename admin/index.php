<?php
require("../include.php");

//p($_SEEION);
//p($_COOKIE);
	if($_SESSION['adminId'] != "" || $_COOKIE['adminId'] != ""){
		header("location: main.php");
	}
?>
<html>
<head>
<title>后台登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
form{ padding:0; margin:0;}
img{ border:0;}
.STYLE1 {font-size: 12px;font-family: "宋体";color: #0886b6;}
.STYLE2 {font-size: 12px}
.textfield1 { width:199px; height:24px; background:url(images/index_11.gif);line-height:23px; border:0; padding-left:5px;}
.textfield2 {  width:199px; height:24px; background:url(images/index_12.gif); line-height:23px;border:0;  padding-left:5px;}
.textfield3 { width:109px; height:24px; background:url(images/index_14.gif); line-height:23px;border:0;  padding-left:5px;}
#tips{font-size: 12px;}
#tips_1{font-size:12px;}
body {	background-color: #015082;}
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="1000" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" background="images/index_08.gif" bgcolor="#015183"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><img src="images/index_02.gif" width="1000" height="100"></td>
      </tr>
    </table>
    <form name="login" action="action.php?act=login" method="post" id="form1">
      <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="308" align="left" valign="top"><img src="images/index_03.gif" width="308" height="205"></td>
              <td width="407" align="left" valign="top" background="images/index_04.gif"><table width="407" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td height="40" align="center" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="65" height="40" align="center" valign="middle"><span class="STYLE1">用户名：</span></td>
                      <td width="336" height="40" align="left" valign="middle">
                          <input type="text" name="username" id="username" class="textfield1" maxlength="30" /><span id="tips"></span>
                      </td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="40" align="center" valign="top"><table width="402" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="65" height="40" align="center" valign="middle"><span class="STYLE1">密　码：</span></td>
                      <td width="334" height="40" align="left" valign="middle">
                          <input type="password" name="password" id="password" class="textfield2" maxlength="50" /><span id="tips_1"></span>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="40" align="left" valign="top"><table width="403" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="65" height="40" align="center" valign="middle"><span class="STYLE1">验证码：</span></td>
                      <td width="95" height="40" align="left" valign="middle">
                          <input type="text" name="verify" id="verity" class="textfield3" maxlength="4" style="text-transform:uppercase;" />
                      </td>
                      <td width="233" align="left">
                                <a href="javascript:void(null)" style="margin-left:7px;">
                                    <img src="verify.php" width="85" height="20px" alt="CAPTCHA"  onclick= this.src="verify.php?t="+Math.random() style="cursor: pointer;" title="点击切换" />
                                </a>
                            <span id="tips_2"></span>
			  
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="40" align="left" valign="top"><table width="407" height="40" border="0" cellpadding="0" cellspacing="0">
                    <tr>
		      <td  style="font-size:12px" width="84" align="center" valign="middle">&nbsp;<input type="radio" name="autoflag" value="1"/>自动登陆</td>
                      <td width="134" align="center" valign="middle">
                          <input type="image" name="submit" id="submit" src="images/index_09.gif" border="0">
                      </td>
                      <td width="189" align="left" valign="middle">
                          <img src="images/index_10.gif" width="76" height="26" border="0" cursor="pointer" onClick="freset();">
                      </td>
                    </tr>
                  </table></td>
                </tr>

              </table></td>
              <td width="285" align="left" valign="top"><img src="images/index_05.gif" width="285" height="205"></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </form>
      <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><img src="images/index_06.gif" width="1000" height="21"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<script src="js/jquery.js"></script>
<script type="text/javascript">
function freset()
{
    document.getElementById('form1').reset();
}

$(document).ready(function(){
    $("#username").focus();
    $("form").submit(function(e){
        var username = $("#username").val();
        var password = $("#password").val();
        var validator = $("#verity").val();

        if (username == '')
        {
           $('#tips').html('<font color="red"><strong>&nbsp;账号不能为空！</strong></font>');
           $("#username").focus();
           return false;
        }
        else
        {
            $("span").remove("#tips");
        }
        if (password == '')
        {
            $("#tips_1").html('<font color="red"><strong>&nbsp;密码不能为空！</strong></font>');
            $("#password").focus();
            return false;
        }
        else
        {
             $("span").remove("#tips_1");
        }
        if (validator == '')
        {
            $("#tips_2").html('<font color="red"><strong>&nbsp;验证码不能为空！</strong></font>');
            $("#verity").focus();
            return false;
        }
        else
        {
             $("span").remove("#tips_2");
        }
    });
})
</script>
</body>
</html>
