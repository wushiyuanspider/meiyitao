<html>
<head>
<style type="text/css">
    body {margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;overflow:hidden;}
    .navPoint { COLOR: white; CURSOR: pointer; FONT-FAMILY: Webdings; FONT-SIZE: 9pt }
</style>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
	$("#switchPoint").click(function(){
	    var ssrc = $("#img1").attr("src");
	    if (ssrc=="images/main_55.gif")
	    {
		$("#img1").attr("src","images/main_55_1.gif");
		$("#frmTitle").css("display","none");
	    }
	    else
	    {
		$("#img1").attr("src","images/main_55.gif");
		$("#frmTitle").css("display","");
	    }
	});
    });
</script>
</head>
<body>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8" bgcolor="#4184b9">&nbsp;</td>
    <td width="147" valign="top" noWrap id="frmTitle" name="fmTitle"><iframe height="100%" width="100%" border="0" frameborder="0" src="left.php" name="leftFrame" id="leftFrame"></iframe></td>
    <td width="6" bgcolor="#749BA7"><span class="navPoint"
id="switchPoint" title="关闭/打开左栏"><img src="images/main_55.gif" name="img1" width=6 height=40 id=img1></span></td>
    <td valign="top"><iframe height="100%" width="100%" border="0" frameborder="0" src="right.php" name="rightFrame" id="rightFrame"></iframe></td>
    <td width="8" bgcolor="#4184b9">&nbsp;</td>
  </tr>
</table>
</body>
</html>
