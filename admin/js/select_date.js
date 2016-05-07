/**
 * JS 下拉列表日期日期选择
 *
 * @package		WLBS
 * @author		mike gesner <mike.gesner@qq.com>
 * @copyright		Copyright (c) 2010 All rights reserved. 物联商盟商务管理系统
 *
 */
function select_date()
{
    MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    var y = new Date().getFullYear();
    for (var i = y; i > (y-100); i--)
    document.form.year.options.add(new Option(" "+ i +"年", i));

    for (var i = 1; i < 13; i++)
    document.form.month.options.add(new Option(" " + i + "月", i));

    //document.form.year.value = y;
    //document.form.month.value = new Date().getMonth() + 1;

    var n = MonHead[new Date().getMonth()];
    if (new Date().getMonth() == 1 && IsLeapYear(YYYYvalue)) n++;
    writeDay(n);
    //document.form.data.value = new Date().getDate();
}

function YYYYDD(str)
{
    var MMvalue = document.form.month.options[document.form.month.selectedIndex].value;
    if (MMvalue == "")
    {	var e = document.form.data;
            //optionsClear(e);
            return;
    }
    var n = MonHead[MMvalue - 1];
    if (MMvalue ==2 && IsLeapYear(str)) n++;
    writeDay(n)
}

function MMDD(str)
{
    var YYYYvalue = document.form.year.options[document.form.year.selectedIndex].value;
    if (YYYYvalue == "")
    {	var e = document.form.data;
            //OptionsClear(e);
            return;
    }
    var n = MonHead[str - 1];
    if (str ==2 && IsLeapYear(YYYYvalue)) n++;
    writeDay(n)
}

function writeDay(n)
{
    var e = document.form.data;
    //OptionsClear(e);
    for (var i=1; i < (n+1); i++)
    {
        e.options.add(new Option(" "+ i + "日", i));
    }
}

function IsLeapYear(year)
{
    return(year%4 == 0 && year%100 !=0 || year%400 == 0);
}

function OptionsClear(e)
{
    e.options.length = 1;
}