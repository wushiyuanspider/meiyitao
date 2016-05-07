/*
 * 判断输入的汉字长度
 *
 * @param string fData 输入的内容
 * @return int 汉子长度
 */
function DataLength(fData)
{
    var intLength = 0
    var m = /^[\u4e00-\u9faf]+$/;   //汉字

    if ( m.test(fData) )
    {
        for ( var i=0;i<fData.length;i++ )
        {
            if ( (fData.charCodeAt(i) < 0) || (fData.charCodeAt(i) > 255) )
            {
                intLength = intLength+2;
            }
            else
            {
                intLength = intLength+1;
            }
        }
    }

    return intLength;
}

/*
 *
 * ajax调用-生成代理商选择列表
 *
 *@param url url地址
 */
function ajax_trans(url)
{
     $.ajax({
            type: "get",
            dataType:"text",
            url: url,
            success: function(data){
                if (data == '')
                {
                    $("#gggg").hide();
                    $("#ag-select").empty();
                    alert('该区域没有代理商!');
                }
                else
                {
                    $("#gggg").show();
                    $("#ag-select").empty();
                    $("#ag-select").append("<option value=''>请选择代理商</option>"+data);
                }
            },
            error: function()
            {
                $("#ag-select").empty();
                $("#gggg").hide();
            }
       });
}

/*
 *
 * 点击复制内容
 *
 * @param url url地址
 */
function copyToClipboard(txt)
{
    if(window.clipboardData)
    {
        window.clipboardData.clearData();
        window.clipboardData.setData("Text", txt);
        alert("复制成功!\r你可以粘贴在QQ/MSN里发给你的好友，邀请他们一起来注册");
    }
    else if(navigator.userAgent.indexOf("Opera") != -1)
    {
        window.location = txt;
    }
//    else if(navigator.userAgent.indexOf("Opera") == -1)
//    {
//    	alert("你使用的浏览器暂不支持一键复制，请手动选择复制！");
//    }
    else if (window.netscape)
    {
        try
        {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        }
        catch (e)
        {
            alert("被浏览器拒绝！\r请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");
        }
	    var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
	    if (!clip)
	        return;
	    var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
	    if (!trans)
	        return;
	    trans.addDataFlavor('text/unicode');
	    var str = new Object();
	    var len = new Object();
	    var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
	    var copytext = txt;
	    str.data = copytext;
	    trans.setTransferData("text/unicode",str,copytext.length*2);
	    var clipid = Components.interfaces.nsIClipboard;
	    if (!clip)
	        return false;
	    clip.setData(trans,null,clipid.kGlobalClipboard);
	    alert("复制成功!\r你可以粘贴在QQ/MSN里发给你的好友，邀请他们一起来注册");
    }
}