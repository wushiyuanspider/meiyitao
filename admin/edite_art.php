<?php
require("../include.php");
$atrId = intval($_GET['artid']);
//echo $cateId;
if(!empty($atrId)){
  $sql = "select * from em_article where art_id = {$atrId}";
  $result = getOne($sql);

//  p($cates);
}
  $sqlAll = "select * from em_article";
  $resAll = mysql_query($sqlAll);
  while(!false == ($res = mysql_fetch_assoc($resAll))) {
    $art[] = $res;
  }
  // $cates = recursive($arr);
 //  p($art);
   // die;
//  p($cates);
//  die;
//p($result);
?>

<html>
<head>
<link href="css/project.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/singleImageShow.js"></script>
<meta charset="utf-8"></meta>
<script type="text/javascript" charset="utf-8" src="../plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
  <!-- 实例化编辑器 -->
    <script type="text/javascript">
  <!-- 
        window.onload = function(){
            var ue = UE.getEditor('content',{
            UEDITOR_HOME_URL:'../plugins/ueditor/',
        });
        }
  //-->
  </script>
<style type="text/css">
table{border-collapse:collapse;}
select{width:120px;}
table{font-size:12px;}
body tr td { border:#a8c7ce 1px solid;}
a:link, a:visited, a:hover, a:active{ color:#204155;}
/* 头部表格 */
.clst { margin-bottom: 5px; width: 98%; margin-top:5px; border: 1px solid #a8c7ce; line-height: 32px; font-size:12px;}
.clst td{border: 1px solid #a8c7ce;}
.clst .tleft { width:60%; background: #fafafa; text-align: left;}
.clst .tleft a { color: #000;}
.clst .tleft a:hover { color: #f00; text-decoration:underline;}
.clst .tright { width:40%;  padding-right: 10px; background: #fafafa; text-align: right;}
.but1 { background:#d3eaef; color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px; margin-right: 1px !important; margin-right: 0;}
.but11 { background:#d3eaef; color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px; margin-right: 1px !important; margin-right: 0;}
.but111 { background:#d3eaef; color: #000; padding: 3px 9px 2px 9px !important; padding: 6px 8px 5px 9px; margin-right: 1px !important; margin-right: 0;}
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
      <form method="post" action="action.php?act=editeArt" id="form" name="form" enctype="multipart/form-data">
      <table width="98%" border="1" cellpadding="0" cellspacing="0" class="clst">
        <tr>
    <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">文章标题：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
    <input type="text" name="art_title" id="art_title" style="width:185px;height:26px;" value="<?php echo $result['art_title']?>" />
          </td>
        </tr>
        <tr>
    <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">文章作者：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
    <input type="text" name="art_author" id="art_author" style="width:185px;height:26px;" value="<?php echo $result['art_author']?>" />
          </td>
        </tr>
        <tr>
    <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">上传图片：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
    <input type="file" name="art_img" id="art_img" onchange="previewImage(this,'fm_pic','320','240')"/>
          </td>
        </tr>
        <!--图片预览-->
        <tr>
    <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">图片预览：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
          <div  id="fm_pic"><img id="div___0_img"  src="images/default.jpg"/></div>
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">级别：</span></td>
    <td height="30" align="left" valign="middle" style="padding-left:10px;">  
    </td>
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">是否显示：</span></td>
    <td height="30" align="left" valign="middle" style="padding-left:10px;">
      <input type="radio" name="art_open" value="0" <?php if(!empty($artId)) {if($result['art_open'] == 0) {echo 'checked';}}else {echo 'checked';}?>/>显示
    <input type="radio" name="art_open" value="1" <?php if(!empty($artId)) {if($result['art_open'] == 1) {echo 'checked';}}?>/>不显示
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">文章简介：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
      <textarea cols="50" rows="10" name="description"><?php echo $result['description']?></textarea>
          </td>
        </tr>
        <tr>
          <td width="150" height="30" align="left" valign="middle"><span class="STYLE1">文章内容：</span></td>
          <td height="30" align="left" valign="middle" style="padding-left:10px;">
      <textarea cols="100" rows="30" name="content" id="content" style="width: 800px; height: 500px;"><?php echo $result['content']?></textarea>
          </td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center">
            <input name="submit" type="submit" value="保存" class="button_b" />
    <input name="reset" type="reset" value="重置" class="button_b" />
    <!--隐藏域，传递cateid-->
    <input name="art_id" type="hidden" value="<?php echo $result['art_id']?>"/>
          </td>
        </tr>
      </table>
      </form>
      <br /></td>
  </tr>
</table>
</body>
</html>

