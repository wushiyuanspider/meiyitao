var isIe=(document.all)?true:false;
//设置select的可见状态
function setSelectState(state)
{
	var objl=document.getElementsByTagName('select');
	for(var i=0;i<objl.length;i++)
	{
		objl[i].style.visibility=state;
	}
}

function mousePosition(ev)
{
	if(ev.pageX || ev.pageY)
	{
		return {x:ev.pageX, y:ev.pageY};
	}
	return {
		x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,y:ev.clientY + document.body.scrollTop - document.body.clientTop
	};
}
//弹出方法
function showMessageBox(wTitle,content,pos,wWidth)
{
	closeWindow();
	var bWidth=parseInt(document.documentElement.scrollWidth);
	var bHeight=parseInt(document.documentElement.scrollHeight);
 
	if(isIe){
		setSelectState('hidden');
	}
	if(document.getElementById('back')!=null) //如果弹出层存在
	{
		document.getElementById('back').style.display = ""; //就让弹出层显示出来
	}
	else{
		var back=document.createElement("div");       //否则就创建新的层
		back.id="back";
		//var styleStr="top:0px;left:0px;position:absolute;background:#666;width:"+bWidth+"px;height:"+bHeight+"px;";
		//A.s ie6兼容性
		var styleStr="top:0px;left:0px;position:fixed;background:#666;width:100%;height:100%;_position:absolute;_width:"+bWidth+"px;_height:"+bHeight+"px;";
		styleStr+=(isIe)?"filter:alpha(opacity=0);":"opacity:0;";
		back.style.cssText=styleStr;
		document.body.appendChild(back);
		showBackground(back,50);
	}
	var mesW=document.createElement("div");
	mesW.id="mesWindow";
	mesW.className="mesWindow";
	mesW.innerHTML=content;
	var v_top=(document.body.clientHeight-mesW.clientHeight)/2;
	v_top+=document.documentElement.scrollTop;
	document.body.appendChild(mesW);
	//A.s ie6兼容性
	styleStr="top:"+(document.body.clientHeight/2-mesW.clientHeight/2)+"px;left:"+(document.body.clientWidth/2-mesW.clientWidth/2)+"px;position:fixed;left:50%; top:50%; z-index:9999; margin-left:-"+(mesW.offsetWidth / 2)+"px; margin-top:-"+(mesW.offsetHeight / 2)+"px;_position:relative; _top:-20%; _left:50%;";
	mesW.style.cssText=styleStr;
}
//让背景渐渐变暗
function showBackground(obj,endInt)
{
	if(isIe)
	{
		obj.filters.alpha.opacity+=5;
		if(obj.filters.alpha.opacity<endInt)
		{
			setTimeout(function(){showBackground(obj,endInt)},5);
		}
	}
	else
	{
		var al=parseFloat(obj.style.opacity);al+=0.05;
		obj.style.opacity=al;
		if(al<(endInt/100))
		{
			setTimeout(function(){showBackground(obj,endInt)},5);
		}
	}
}

//关闭窗口
function closeWindow()
{ 
	if(document.getElementById('back')!=null)
	{
		document.getElementById('back').style.display="none";
	}
	if(document.getElementById('mesWindow')!=null)
	{
		document.getElementById('mesWindow').parentNode.removeChild(document.getElementById('mesWindow'));
	}
	if(isIe)
	{
		setSelectState('');
	}
}

//现提
function xt_Box(ev, price, gift)
{
	var objPos = mousePosition(ev);
	messContent="<div class='error_pop'><form action='order.php?act=xt' method='POST'><span class='title'>合计：￥" + price + " 元 + " + gift + " 礼金币</span><span class='txt'>用户名：<input type='text' style='width:130px;' name='u_name' id='u_name' /><input type='button' style='margin:0;padding:0;' value='读卡' onclick='return read_card();'  /></span><span class='txt'>密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type='password' style='width:130px;' name='u_pwd' id='u_pwd' /><input type='button' style='margin:0;padding:0;' value='输入密码' onclick='enter_pwd()'  /></span><span class='txt'><input type='hidden' name='xt_price' value='"+price+"' /><input type='hidden' name='xt_gift' value='"+gift+"' /><input type='submit' value='提货' />&nbsp;&nbsp;<input type='button' value='礼金币余额' onclick='get_gift();' />&nbsp;&nbsp;<input type='button' onclick='closeWindow();' value='关闭' /></span></form></div>";
	showMessageBox('窗口标题',messContent,objPos,350);
}

//图片
function pic_Box(ev, pic, url)
{
	var objPos = mousePosition(ev);
	messContent="<div class='error_pop_img'><a href='"+url+"' target='_blank'><img src='http://www.wlttl.com/"+pic+"' /></a><br /><a href='"+url+"' target='_blank'>访问</a> | <a href='#' onclick='closeWindow();'>关闭</a></div>";
	showMessageBox('窗口标题',messContent,objPos,350);
}