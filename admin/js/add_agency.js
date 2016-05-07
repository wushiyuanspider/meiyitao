/**
 * 开设代理商
 *
 * @package		WLBS
 * @author		mike gesner <mike.gesner@qq.com>
 * @copyright		Copyright (c) 2010 All rights reserved. 物联商盟商务管理系统
 *
 */

function agency_checked(power_all,jiangxi_pro,groups_id)
{
    $("#user_type").change(function(){
        $('#user_type_tips').empty();
        var ut_value = $("#user_type").val();

        if(power_all == 1)
        {
             var jx = 1;
        }
        else
        {
            if (jiangxi_pro != '' || jiangxi_pro != 'undefined')
            {
                var jx = jiangxi_pro;
            }
            else
            {
                var jx = 0;
            }
        }
        //alert(jx);
        // 默认，取消所有不该显示的
        if( ut_value == 0 )
        {
            $("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#dt1,#dt2,#dt3,#dt4,#dt4_c,#dt5,#dt6").hide();
        }


        // 开设省级代理商
        if( ut_value == 1 )
        {
            $(".ld-select-1").ld({ajaxOptions : {"url" : "region.php?act="+jx},defaultParentId : 1,style : {"width" : 100}});

            $("#dt1").show();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#dt2,#dt3,#dt4,#dt4_c,#dt5,#dt6").hide();

            $("#p_office_name_tips").empty();
            if($("#province").val() == 0)
            {
		$("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city").val() == 0)
            {
                $("#pro_1").empty();
		$("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else
            {
                $("#pro_1").html("此处的'城市'只说明该代理商所在的地域范围！");
            }
        }

        // 开设市级代理商
        else if ( ut_value == 2 )
        {
            if ( groups_id == 1 || groups_id == 9)     //admin
            {
                $(".ld-select-2").ld({ajaxOptions : {"url" : "region.php?act="+jx},defaultParentId : 1,style : {"width" : 100}});
            }
            else
            {
               $("#up_agency").hide();
               rid = $("#agency_pro_id").val();
               $(".ld-select-2").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
            }
            $("#dt2").show();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#dt1,#dt3,#dt4,#dt4_c,#dt5,#dt6").hide();

            $("#p_office_name_tips").empty();
            if($("#province2").val() == 0)
            {
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city2").val() == 0)
            {
                $("#pro_2").empty();
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county2").val() == 0)
            {
                $("#pro_2").empty();
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_2").html("此处的'县区'只说明该代理商所在的地域范围！");
            }
        }

        // 开设县区级代理商
        else if ( ut_value == 3 )
        {
            if ( groups_id == 1 || groups_id == 9)     //admin
            {
                $(".ld-select-3").ld({ajaxOptions : {"url" : "region.php?act="+jx},defaultParentId : 1,style : {"width" : 100}});
            }
            else
            {
               $("#up_agency").hide();
               rid = $("#city3").val();
               $(".ld-select-3").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
            }
            $("#dt3").show();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#dt2,#dt1,#dt4,#dt4_c,#dt5,#dt6").hide();

            va_select = $("#up_select").val();
            if($("#province3").val() == 0)
            {
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city3").val() == 0)
            {
                $("#pro_3").empty();
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county3").val() == 0)
            {
                $("#pro_3").empty();
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_3").empty();
            }

            if (va_select == 0)
            {
                $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
                return false;
            }
            else
            {
                $("#pro_up").empty();
            }
        }

        // 开设省级旗舰店
        else if ( ut_value == 4 )
        {
            if ( groups_id == 2 )
            {
                rid = $("#province4").val();
                $(".ld-select-4").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
            }
            else
            {
                rid = $("#city4").val();
                $(".ld-select-4").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
            }

            $("#dt4").show();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#dt2,#dt3,#dt1,#dt4_c,#dt5,#dt6").hide();
        }

        // 开设实体店
        else if ( ut_value == 6 )
        {
            if ( groups_id == 2 )    //省级管理中心
            {
                var rid = $("#province5").val();
                $(".ld-select-5").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
                url = "dispose.php?act=region&aid="+rid+"&gid="+5+"&uid="+groups_id+"&tag=1&dist=4";
            }
            else if ( groups_id == 3 )    //市级管理中心
            {
                var rid = $("#city5").val();
                $(".ld-select-5").ld({ajaxOptions : {"url" : "region.php"},defaultParentId : rid,style : {"width" : 100}});
                url = "dispose.php?act=region&aid="+rid+"&gid="+5+"&uid="+groups_id+"&tag=1&dist=4";
            }
            $("#dt5").show();
            $("#c1,#c2,#c3,#c4,#c5,#c6").show();
            $("#up_agency").hide();
            $("#have_agency").hide();
            $("#dt2,#dt3,#dt4,#dt1,#dt6").hide();
        }

        // 开设宣传客
        else if ( ut_value == 7 )
        {
            $("#c1,#c2,#c3,#c4,#c5,#c6,#up_agency,#have_agency").hide();
            $("#dt1,#dt2,#dt3,#dt4,#dt5,#dt6").hide();
        }
        
        // 开设市场总监
        else if ( ut_value == 8 )
        {
            $(".ld-select-6").ld({ajaxOptions : {"url" : "region.php?act="+jx},defaultParentId : 1,style : {"width" : 100}});

            $("#dt6").show();
            $("#c1,#c3,#c4,#c5,#c6").hide();
            $("#dt1,#dt2,#dt3,#dt4,#dt4_c,#dt5,#up_agency,#have_agency").hide();
        }
    });
}

// admin -- 添加省级代理 查询当前省已有代理商
$("#province").change( function () {
    va = $("#province").val();
    if (va == 0)
    {
        $("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
    }
    else
    {
        $("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    url = "dispose.php?act=region&aid="+va+"&gid="+2+"&dist=0&rand="+Math.random();
    admin_ajax_tran(url,0);
});

// 当选择城市后，替换该处的提示信息(在未选择而提交后的提示信息)
$("#city").change(function (){
    va_city = $("#city").val();
    if (va_city == 0)
    {
        $("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_1").html("此处的'城市'只说明该代理商所在的地域范围！");
    }
});

// admin -- 添加市级代理 查询当前省是否已有代理商供选择
$("#province2").change( function () {
    va_province2 = $("#province2").val();
    if (va_province2 == 0)
    {
        $("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
    }
    else
    {
        $("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
        $("#pro_up").empty();
    }
    url = "dispose.php?act=region&aid="+va_province2+"&gid="+2+"&tag=1&dist=0&rand="+Math.random();
    admin_ajax_tran(url,1,1);
});

// admin -- 添加市级代理 查询当前市已有的代理商
$("#city2").change( function () {
    va_city2 = $("#city2").val();
    if (va_city2 == 0)
    {
        $("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    url = "dispose.php?act=region&aid="+va_city2+"&gid="+3+"&tag=0&dist=1&Rand="+Math.random();
    admin_ajax_tran(url,2);
});

$("#county2").change( function () {
    va_county2 = $("#county2").val();
    if (va_county2 == 0)
    {
        $("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
        $("#pro_up").empty();
    }
    else
    {
        $("#pro_2").html("此处的'县区'只说明该代理商所在的地域范围！");
        va_select = $("#up_select").val();
        if (va_select == 0)
        {
            $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
        }
    }
});

$("#up_select").change( function () {
    va_select = $("#up_select").val();
    if (va_select == 0)
    {
        $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
    }
    else
    {
        $("#pro_up").empty();
    }
});

// admin -- 添加县区级代理 查询当前省是否已开通代理商
$("#province3").change( function () {
    va_province3 = $("#province3").val();
    if (va_province3 == 0)
    {
        $("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
    }
    else
    {
        $("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
        $("#pro_up").empty();
    }
    url = "dispose.php?act=region&aid="+va_province3+"&gid="+2+"&tag=1&dist=0&rand="+Math.random();
    admin_ajax_tran(url,1,2);
    $("#up_agency").hide();
    $("#have_agency").hide();
});

// admin -- 添加县区级代理 查询当前市已有的县区级代理商
$("#city3").change( function () {
    va_city3 = $("#city3").val();
    if (va_city3 == 0)
    {
        $("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    url = "dispose.php?act=region&aid="+va_city3+"&gid="+3+"&tag=1&dist=1&Rand="+Math.random();
    admin_ajax_tran(url,3);
});

// admin -- 添加县区级代理 查询当前县已有的代理商
$("#county3").change( function () {
    va_county3 = $("#county3").val();
    if (va_county3 == 0)
    {
        $("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
        $("#pro_up").empty();
    }
    else
    {
        $("#pro_3").empty();
        va_select = $("#up_select").val();
        if (va_select == 0)
        {
            $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
        }
    }
    url = "dispose.php?act=region&aid="+va_county3+"&gid="+4+"&tag=0&dist=2&Rand="+Math.random();
    admin_ajax_tran(url,4);
});

// 省、市级代理 -- 添加旗舰店
 $("#city4").change( function () {
    va_city4 = $("#city4").val();
    if (va_city4 == 0)
    {
        $("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    $("#up_agency").hide();
    $("#have_agency").hide();
});

// 省、市级代理 -- 添加旗舰店 查询县区已有旗舰店
 $("#county4").change( function () {
    va_county4 = $("#county4").val();
    if (va_county4 == 0)
    {
        $("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    else
    {
        $("#pro_4").html("(此处的区域只说明该代理商所在的地域范围！)");
    }
    url = "dispose.php?act=region&aid="+va_county4+"&gid="+5+"&tag=0&dist=2&rand="+Math.random();
    admin_ajax_tran(url,4);
});

// 省、市级代理 -- 添加实体店
 $("#city5").change( function () {
    va_city5 = $("#city5").val();
    if (va_city5 == 0)
    {
        $("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    $("#up_agency").hide();
    $("#have_agency").hide();
});

// 省、市级代理 -- 添加实体店 查询县区已有实体店
 $("#county5").change( function () {
    va_county5 = $("#county5").val();
    if (va_county5 == 0)
    {
        $("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
    }
    else
    {
        $("#pro_5").html("此处的'县区'只说明该代理商所在的地域范围！");
    }
    url = "dispose.php?act=region&aid="+va_county5+"&gid="+6+"&tag=0&dist=2&rand="+Math.random();
    admin_ajax_tran(url,4);
});

// admin -- 添加市场总监时 查询当前省是否已开通市场总监
$("#province6").change( function () {
    va_province6 = $("#province6").val();
    if (va_province6 == 0)
    {
        $("#pro_6").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
    }
    else
    {
        $("#pro_6").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
        $("#pro_up").empty();
    }
    url = "dispose.php?act=region&aid="+va_province6+"&gid="+8+"&tag=1&dist=0&rand="+Math.random();
    admin_ajax_tran(url,1,3);
    $("#up_agency").hide();
    $("#have_agency").hide();
});

$("#city6").change(function () {
    va_city6 = $("#city6").val();
    if (va_city6 == 0)
    {
        $("#pro_6").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
    }
    else
    {
        $("#pro_6").html("(此处的'城市'只说明该市场总监所在的地域范围！)");
    }
});

function admin_ajax_tran(url,c,ptag)
{
    $.ajax({
            type: "get",
            dataType:"text",
            url: url,
            success: function(data){
                if (data != '')
                {
                    /* admin -- 添加省级代理 查询当前省已有代理商 */
                    if ( c == 0 )
                    {
                        //上级代理商设为空，并隐藏
                        $("#up_select").empty();
                        $("#up_agency").hide();
                        // 清空当前已有代理商值，并显示
                        $("#have_agency_tips").empty();
                        $("#have_agency").show();
                        $("#have_agency_tips").append(data);
                    }

                    /* admin -- 查询当前省已有代理商供选择 */
                    else if( c == 1 )
                    {
                        // 隐藏当前已有代理商值
                        $("#have_agency").hide();
                        switch(ptag)
                        {
                            // 添加市级代理时
                            case 1:
                                // 上级代理商清空并显示
                                $("#up_select").empty();
                                $("#up_agency").show();
                                $("#up_select").append("<option value='0'>请选择省级代理</option>"+data);
                                $("#city2").show();
                                $("#county2").show();
                                break;
                            // 添加县区代理商时
                            case 2:
                                $("#city3").show();
                                $("#county3").show();
                                break;
                            case 3:
                                // 清空当前已有代理商值
                                $("#have_agency").show();
                                $("#have_agency_tips").empty();
                                $("#have_agency_tips").append(data);
                                break;
                            default:
                                 break;
                        }
                    }

                    /* admin -- 添加市级代理 查询当前市已有的代理商 */
                    else if ( c == 2 )
                    {
                        // 清空当前已有代理商值
                        $("#have_agency").show();
                        $("#have_agency_tips").empty();
                        $("#have_agency_tips").append(data);
                    }

                    /* admin -- 添加县区级代理 查询当前市已有的县区级代理商 */
                    else if ( c == 3 )
                    {
                        $("#have_agency").hide();
                        $("#up_select").empty();
                        $("#up_agency").show();
                        $("#county3").show();
                        $("#up_select").append("<option value='0'>请选择市级代理</option>"+data);
                    }

                    /* admin -- 添加县区级代理 查询当前县已有的代理商 */
                    else if ( c == 4 )
                    {
                        $("#have_agency_tips").empty();
                        $("#have_agency").show();
                        $("#have_agency_tips").append(data);
                    }
                }
                else
                {
                    if( c == 0 )
                    {
                        $("#up_agency").hide();
                        $("#have_agency").hide();
                        $("#have_agency_tips").empty();
                    }
                    else if( c == 1 )
                    {
                        $("#up_agency").hide();
                        $("#have_agency").hide();
                        $("#up_select").empty();

                        switch(ptag)
                        {
                            case 1:
                                $("#pro_2").empty();
                                $("#city2").hide();
                                $("#county2").hide();
                                alert("该省尚未开通省级代理!");
                                break;
                            case 2:
                                $("#city3").hide();
                                $("#county3").hide();
                                alert("该省尚未开通省级代理!");
                                break;
                             default:
                                 break;
                        }
                    }
                    else if ( c == 2 )
                    {
                        $("#have_agency").hide();
                        $("#have_agency_tips").empty();
                    }
                    else if ( c == 3 )
                    {
                        $("#have_agency").hide();
                        $("#up_agency").hide();
                        $("#up_select").empty();
                        $("#county3").hide();
                        alert("该市尚未开通市级代理");
                    }
                    else if ( c == 4 )
                    {
                        $("#have_agency").hide();
                    }
                }
            },
            error: function(){
                $("#have_agency_tips").empty();
                $("#up_select").empty();
                $("#have_agency").hide();
                $("#up_agency").hide();
            }
        });
}

/***************************************************************************************************************************/
//      登录验证
/***************************************************************************************************************************/
$("#form").submit(function(e)
{
        var m = /^[\u4e00-\u9faf]+$/;   // 汉字
        var u = /^[A-Za-z0-9_]+$/;       // 用户名
        var p = /^1[3458]\d{9}$/;       // 手机号码
        var t = /^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/; // 电话
        var q = /^[0-9]+$/  //数字
        var i = /^[0-9]*[1-9][0-9]*$/   // 正整数
        var i2 = /^[-0-9]*[1-9][0-9]*$/     //整数
        var mo = /^([1-9]\d*|0|)\.\d{2}$/   //货币，eg:1.33
        var e = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i;    // email

        /*  添加代理商-模块  */
        var p_office_name       = $("#p_office_name").val();      // 公司名称
        var p_office_address    = $("#p_office_address").val();   // 公司地址
        var p_office_tel        = $("#p_office_tel").val();       // 办公电话
        var p_office_fax        = $("#p_office_fax").val();       // 公司传真
        var p_username          = $("#p_username").val();          // 用户名
        var p_passwd            = $("#p_passwd").val();            // 密码
        var p_passwd_confirm    = $("#p_passwd_confirm").val();    // 确认密码
        var p_phone             = $("#p_phone").val();             // 手机号码
        var p_real_name         = $("#p_real_name").val();         // 真实姓名
        var item = $('input[name=p_sex]:checked').val();
        var ut_value = $("#user_type").val();

        // 判断代理商类型是否选择
        if ( ut_value == 0)
        {
            $("#user_type_tips").html('<span style="margin-left:5px;color:red;">请先选择创建类型!</span>');
            return false;
        }
        // 创建省级代理商的JS判断
        if(ut_value == 1)
        {
            if($("#province").val() == 0)
            {
		$("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city").val() == 0)
            {
                $("#pro_1").empty();
		$("#pro_1").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else
            {
                $("#pro_1").html("此处的'城市'只说明该代理商所在的地域范围！");
            }

        }
        // 创建市级代理商的JS判断
        if(ut_value == 2)
        {
            va_select = $("#up_select").val();

            if($("#province2").val() == 0)
            {
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city2").val() == 0)
            {
                $("#pro_2").empty();
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county2").val() == 0)
            {
                $("#pro_2").empty();
		$("#pro_2").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_2").html("此处的'县区'只说明该代理商所在的地域范围！");
            }

            if (va_select == 0)
            {
                $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
                return false;
            }
            else
            {
                $("#pro_up").empty();
            }
        }
        // 创建县区级代理商的JS判断
        if(ut_value == 3)
        {
            va_select = $("#up_select").val();
            if($("#province3").val() == 0)
            {
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city3").val() == 0)
            {
                $("#pro_3").empty();
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county3").val() == 0)
            {
                $("#pro_3").empty();
		$("#pro_3").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_3").empty();
            }

            if (va_select == 0)
            {
                $("#pro_up").html('<span style="margin-left:5px;color:red;">请选择上级代理商!</span>');
                return false;
            }
            else
            {
                $("#pro_up").empty();
            }
        }
        // 创建旗舰店的JS判断
        if(ut_value == 4)
        {
            if($("#province4").val() == 0)
            {
		$("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city4").val() == 0)
            {
                $("#pro_4").empty();
		$("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county4").val() == 0)
            {
                $("#pro_4").empty();
		$("#pro_4").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_4").empty();
            }
        }
        // 创建实体店的JS判断
        if(ut_value == 6)
        {
            if($("#province5").val() == 0)
            {
		$("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city5").val() == 0)
            {
                $("#pro_5").empty();
		$("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else if($("#county5").val() == 0)
            {
                $("#pro_5").empty();
		$("#pro_5").html('<span style="margin-left:5px;color:red;">请先选择县区!</span>');
		return false;
            }
            else
            {
                $("#pro_5").empty();
            }
        }
        // 创建市场总监的JS判断
        if(ut_value == 8)
        {
            if($("#province6").val() == 0)
            {
		$("#pro_6").html('<span style="margin-left:5px;color:red;">请先选择省份!</span>');
		return false;
            }
            else if($("#city6").val() == 0)
            {
                $("#pro_6").empty();
		$("#pro_6").html('<span style="margin-left:5px;color:red;">请先选择城市!</span>');
		return false;
            }
            else
            {
                $("#pro_6").empty();
            }
        }

        // 宣传客\市场总监不需要判断公司信息
        if ( ut_value == 1 || ut_value == 2 ||  ut_value == 3 ||  ut_value == 4 || ut_value == 5 || ut_value == 6 || ut_value == 9 )
        {
            //判断公司名称是否为空
            if ( p_office_name.length < 2 )
            {
                $("#p_office_name_tips").html('<span style="color:red;margin-left:5px;"> 公司名称太短！</span>');
                $("#p_office_name").focus();
                return false;
            }
            else
            {
                 $("span").remove("#p_office_name_tips");
            }

            //判断公司地址是否为空
            if ( p_office_address.length < 6 )
            {
                $("#p_office_address_tips").html('<span style="color:red;margin-left:5px;"> 公司地址太短！</span>');
                $("#p_office_address").focus();

                return false;
            }
            else
            {
                 $("span").remove("#p_office_address_tips");
            }

            //判断输入的办公电话是否合法
            /*2011-8-16 屏蔽
			if( p_office_tel != '' )
			{
				if ( !t.test(p_office_tel) )
				{
					$("#p_office_tel_tips").html('<span style="color:red;margin-left:5px;"> 办公电话格式错误！</span>');
					$("#p_office_tel").focus();

					return false;
				}
				else
				{
					 $("span").remove("#p_office_tel_tips");
				}
			}
			*/
            //判断输入的传真号码是否合法
            if ( p_office_fax != '' )
            {
                if ( !t.test(p_office_fax) )
                {
                    $("#p_office_fax_tips").html('<span style="color:red;margin-left:5px;"> 传真号码格式错误！</span>');
                    $("#p_office_fax").focus();

                    return false;
                }
                else
                {
                     $("span").remove("#p_office_fax_tips");
                }
            }
        }

        //判断用户名的长度
        if ( p_username.length < 5 || !u.test(p_username) )
        {
            $("#p_username_tips").css('color','red');
            $("#p_username").focus();

            return false;
        }
        else
        {
             $("span").remove("#p_username_tips");
        }

        //判断输入的密码长度
        if ( p_passwd.length < 6 )
        {
            $("#p_passwd_tips").css('color','red');
            $("#p_passwd").focus();

            return false;
        }
        else
        {
             $("span").remove("#p_passwd_tips");
        }

        //判断确认密码的长度 及是否和第一次输入的密码相同
        if ( p_passwd_confirm != p_passwd )
        {
            $("#p_passwd_confirm_tips").html('<span style="color:red;margin-left:5px;"> 两次输入的密码不一样！</span>');
            $("#p_passwd_confirm").focus();

            return false;
        }
        else
        {
             $("span").remove("#p_passwd_confirm_tips");
        }

        //判断输入的手机号码是否合法
        if ( !p.test(p_phone) )
        {
            $("#p_phone_tips").html('<span style="color:red;margin-left:5px;"> 移动号码输入有误！</span>');
            $("span").remove("#p_home_tel_tips");
            $("#p_phone").focus();

            return false;
        }
        else
        {
             $("span").remove("#p_phone_tips");
        }

        //判断输入的姓名是否为汉字，且是否小于4个字符(2个汉字)，大于32个字符（16个汉字）--据调查，中国最长人名是15个汉字
//       if ( DataLength(p_real_name) < 4 )
//        {
//            $("#p_real_name_tips").html('<span style="color:red;margin-left:5px;"> 真实姓名至少为两个字！</span>');
//            $("#p_real_name").focus();
//
//            return false;
//        }
//        else if ( DataLength(p_real_name) > 32 )
//        {
//            $("#p_real_name_tips").css('color','red');
//            $("#p_real_name").focus();
//
//            return false;
//        }
//        else
//        {
//             $("span").remove("#p_real_name_tips");
//        }

        // 判断是否选择了性别
        if ( typeof(item) == 'undefined')
        {
            $("#p_sex_tips").html('<span style="color:red;margin-left:5px;"> 请选择性别！</span>');return false;
        }
});