<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>物联商盟—商务管理系统平台</title>
<style type="text/css">
    body {margin:0px;padding:0px;font-size: 12px;}
    html{overflow-x: hidden; overflow-y: auto;}
    #navigation {margin:0px;padding:0px;width:147px;}
    #navigation a.head {cursor:pointer;background:url(images/main_34.gif) no-repeat scroll;display:block;font-weight:bold;margin:0px;padding:5px 0 5px;text-align:center;font-size:12px;text-decoration:none;}
    #navigation ul {border-width:0px;margin:5px 0px;padding:0px;text-indent:0px;}
    #navigation li {list-style:none; display:inline;}
    #navigation li li a {display:block;font-size:12px;text-decoration:none;text-align:left;padding:3px;color:#033}
    #navigation li li a img {margin:0 10px 0 10px;}
    #navigation li li a:hover {background:url(images/tab_bg.gif) repeat-x;}
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
    
    <li> <a class="head" onClick="showsubmenu(1)" id="imgmenu1" title="用户管理">用户管理</a>
      <ul id="submenu1">

                <li><a href="user_list.php" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">会员管理</a></li>
   
      </ul>
    </li>
    

    
    <li> <a class="head" onClick="showsubmenu(2)" id="imgmenu2" title="文章管理">文章管理</a>
      <ul id="submenu2">
        
                <li><a href="art_list.php" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">文章列表</a></li>
            
                <li><a href="art_cate.php" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">文章分类</a></li>
           
      </ul>
    </li>

    <li> <a class="head" onClick="showsubmenu(3)" id="imgmenu3" title="日志管理">幻灯片管理</a>
      <ul id="submenu3">
       
                <li><a href="ppt_list.php" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">幻灯片列表</a></li>
           
      </ul>
    </li>
   
    <li> <a class="head" onClick="showsubmenu(3)" id="imgmenu3" title="日志管理">日志管理</a>
      <ul id="submenu3">
       
                <li><a href="main.php?act=log_manage" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">日志列表</a></li>
           
      </ul>
    </li>
   
	<li> <a class="head" onClick="showsubmenu(5)" id="imgmenu5" title="参数配置">参数配置</a>
      <ul id="submenu5">
      
                <li><a href="main.php?act=param_config" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">参数配置</a></li>
          
      </ul>
    </li>
   
    <li> <a class="head" onClick="showsubmenu(6)" id="imgmenu6" title="推广联盟">推广联盟</a>
      <ul id="submenu6">
       
                <li><a href="main.php?act=extend_link" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">推广链接</a></li>
          
                <li><a href="main.php?act=extend_users&tag=2" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">推广用户</a></li>
           
                <li><a href="main.php?act=shop_application" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">申请开店</a></li>
         
                <li><a href="main.php?act=store_manage" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">店铺管理</a></li>
           
                <li><a href="main.php?act=company_info" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">付款方式</a></li>
         
      </ul>
    </li>
  
    <li> <a class="head" onClick="showsubmenu(7)" id="imgmenu7" title="权限管理">权限管理</a>
      <ul id="submenu7">
      
                <li><a href="main.php?act=admin_list" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">管理员列表</a></li>
          
                <li><a href="main.php?act=role_list" target="rightFrame"><img src="images/left.gif" border="0" width="10" height="10">角色管理</a></li>
          
      </ul>
    </li>
   
  </ul>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		showsubmenu = function(sid)
		{
			if ( $("#submenu"+sid).css("display") == "none")
			{
				$("#submenu"+sid).animate({opacity: 'toggle'}, 500).css({display:"block"});
			}
			else
			{
				$("#submenu"+sid).animate({opacity: 'toggle'}, 500).css({display:"none"});
			}
		}
	});
</script>
</html>
