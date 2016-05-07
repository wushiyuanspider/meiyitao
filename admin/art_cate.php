<!DOCTYPE HTML public>
<?php
require('../include.php');
$sql = "select * from em_category";
$res = getAll($sql);
//p($res);
//die;
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="css/as.css" />
<script src="./js/jquery"></script>
<style type="text/css">
.action-span {
    float: right;
    padding-left: 10px;
}
.action-span a {
    color: #666;
    font-size: 12px;
    font-weight: 400;
    text-decoration: none;
    display: block;
    padding: 2px 5px 2px 23px;
    border-width: 1px 2px 2px 1px;
    border-style: solid;
    border-color: #278296;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    background: url("images/icon_add.gif") no-repeat scroll 3px center #DDEEF2;
}
</style>
</head>
<body>
<div class="main">
    <table cellpadding="0" cellspacing="0" class="ti">
        <tr>
            <th class="title" colspan="8">
                <form method="get" action="main.php">
                    用户名：
                    <input type="text" name="u_name" value="" style="width:120px;" />
                    所属代理商：
                    <input type="text" name="a_name" value="" style="width:120px;" />
                    <input type="hidden" name="exp" id="exp" value="0" />
                    <input type="hidden" name="act" id="act" value="user_list" />
                    <input type="submit" value="查询" onclick="document.getElementById('exp').value='0';" />
                    <input type="submit" value="导出" onclick="document.getElementById('exp').value='1';" />
                </form>
                <span class="action-span"><a href="edite_cate.php">添加分类</a></span>
            </th>
            
           <!--  <th colspan="1" style="color:#fff;border-bottom:none;"><a href="{:U('Admin/Index/Add_User')}" style="color:#fff;margin-left:25px;">添加用户</a></th> -->
        </tr>
        <tr>
            <th>分类ID</th>
            <th>分类名称</th>
            <th>是否显示导航</th>
            <th>是否显示</th>
            <th>排序</th>
            <th>链接地址</th>
            <th>操作</td>
	</tr>
	<?php if(!empty($res)) {?>
		<?php foreach($res as $val) {?>
      			  <tr>
	   			 <td><?php echo $val['cate_id']?></td>
				 <td><?php echo $val['cate_name']?></td>
				<?php if($val['show_in_nav'] == 1) {?>
					<td class="show_in_nav"><img src="images/no.gif"/></td>
				<?php }?>
				<?php if($val['show_in_nav'] == 0) {?>
					<td class="show_in_nav"><img src="images/yes.gif"/></td>
				<?php }?>	
				<?php if($val['is_show'] == 1) {?>
					<td class="is_show"><img src="images/no.gif"/></td>
				<?php }?>
				<?php if($val['is_show'] == 0) {?>
					<td class="is_show"><img src="images/yes.gif"/></td>
				<?php }?>
	   			 <td class="sort_order"><?php echo $val['sort_order']?></td>
	   			 <td><?php echo $val['link']?></td>
           			 <td height="30px" align="center" valign="middle">
           			 <a href="">分配权限</a>　
	   			 <span style="margin-left:10px;"><a href="edite_cate.php?cateid=<?php echo $val['cate_id']?>" id="mod">修改</a></span>
	   			 <span style="margin-left:20px;"><a href="action.php?act=delcate&cateid=<?php echo $val['cate_id']?>">删除</a></span>
         			 </td>
	 		 </tr>
		  <?php }?>
	<?php }?>
	<script>
		$(function() {
			$("#mod").click(function() {
				alert('sucess');
			})
		})
	</script>
        <tr><td  colspan="9" align="center">暂无查询结果</td></tr>
        <!-- {v:/if} -->

        <tr><td  colspan="2" class="left"></td>
        <td  colspan="7" class="right">
        <span class="technorati" style="height:21px;">		
		</span>
        </td></tr>
    </table>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jeditable.js"></script>
<script type="text/javascript" src="js/jquery.ld.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $("#search_form").submit(function(){
            if (Date.parse($('#s_time').val().replace("-","/"))>Date.parse($('#e_time').val().replace("-","/")))
            {
                alert("开始日期应小于结束日期！");
                return false;
            }
    });
    
	$(".ti tr").mouseover(function(){ //如果鼠标移到class为ti的表格的tr上时，执行函数
		$(this).addClass("over");}).mouseout(function(){ //给这行添加class值为over，并且当鼠标一出该行时执行函数
		$(this).removeClass("over");}) //移除该行的class
		$(".ti  tr:odd").addClass("alt"); //给class为ti的表格的奇数行添加class值为alt
		
//nav是否显示
$(".show_in_nav").click(function(){
    var v = ($("img", $(this)).attr("src").match(/yes.gif/i))? 1 : 0;
     if(v==0){
        $("img", $(this)).attr("src", "./images/yes.gif");
    }else{
         $("img", $(this)).attr("src", "./images/no.gif");
    }
    var cateid = $.trim($(this).parent().children().eq(0).text()); 
    $.getJSON("action.php?act=cate_nav",{num:v,id:cateid},function(json){
         //alert(json);return false;
                if(json==1){
                    //alert("修改成功！"); 
                }else{
                    alert("修改失败！"); 
                    return;  
                }       
            });
});
//show是否显示
$(".is_show").click(function(){
    var v = ($("img", $(this)).attr("src").match(/yes.gif/i))? 1 : 0;
     if(v==0){
        $("img", $(this)).attr("src", "./images/yes.gif");
    }else{
         $("img", $(this)).attr("src", "./images/no.gif");
    }
    var cateid = $.trim($(this).parent().children().eq(0).text()); 
    $.getJSON("action.php?act=cate_show",{num:v,id:cateid},function(json){
         //alert(json);return false;
                if(json==1){
                    //alert("修改成功！"); 
                }else{
                    alert("修改失败！"); 
                    return;  
                }       
            });
});
//修改sort_order
$(".sort_order").click(function() { 
    var td = $(this); 
    var txt = td.text(); 
    var cateid = $.trim(td.parent().children().eq(0).text()); 
    var input = $("<input type='text' value='" + txt + "' size='5'/>"); 
    td.html(input); 
    input.click(function() { return false; }); 
    //获取焦点 
    input.trigger("focus"); 
    //文本框失去焦点后提交内容，重新变为文本 
    input.blur(function() { 
    var newtxt = $(this).val(); 
    //判断文本有没有修改 
    if (newtxt != txt) { 
    td.html(newtxt); 

    $.getJSON("action.php?act=sort",{sort_order:newtxt,cate_id:cateid},function(json){
         //alert(json);return false;
                    if(json==1){
                        td.html(newtxt);   
                    }else{
                        alert("修改失败！"); 
                        td.html(txt); 
                        return;  
                    }       
                });
    } 
    else 
    { 
    td.html(newtxt); 
    } 
    }); 
}); 
});
</script>
</body>
</html>

