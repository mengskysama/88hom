
$(document).ready(function() {
    check_input();
});

function checkform()
{
    return check();
}


function check_input() {
    var oldvalue = "";
    var newvalue = "";
    var newvalue1 = "";
    $("#oldpass").blur(function() {
        check1();
    });

    $("#newpass").blur(function() {
        check2();
    });

    $("#newpass1").blur(function() {
        check3();
    });
}

function check1()
{
    //$("#soldpass").removeClass("tips_form_correct");
    oldvalue = jQuery.trim($("#oldpass").val());
    //空值判断
    if (oldvalue == "") {
        //$("#soldpass").addClass("tips_form_fault");
        $("#soldpass").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    else {
        //$("#soldpass").removeClass("tips_form_fault");
        $("#soldpass").html("");
    }
}

function check2()
{
    newvalue = jQuery.trim($("#newpass").val());
    newvalue1 = jQuery.trim($("#newpass1").val());
    //密码

    if (newvalue == "") {
        //$("#snewpass").removeClass("tips_form_correct");
        //$("#snewpass").addClass("tips_form_fault");
        $("#snewpass").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    else {
        if (newvalue.length < 6 || newvalue.length > 16) {
            //$("#snewpass").removeClass("tips_form_correct");
            //$("#snewpass").addClass("tips_form_fault");
            $("#snewpass").html("<span class=\"z6\"></span>6-16个字符,区分大小写");
            return false;
        }

        if ((/>|<|,|\[|\]|\{|\}|\?|\/|\+|=|\||\'|\\|\"|:|;|\~|\!|\@|\#|\*|\$|\%|\^|\&|\(|\)|`/i).test(newvalue)) {
            //$("#snewpass").removeClass("tips_form_correct");
            //$("#snewpass").addClass("tips_form_fault");
            $("#snewpass").html("<span class=\"z6\"></span>请勿用特殊字符");
            return false;
        }
/*
        //密码级别低
        if (newvalue.match(/^[0-9]{1,16}$/) || newvalue.match(/^[A-Za-z]{1,16}$/) || newvalue.match(/^[_]{1,16}$/)) {
            //$("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_low\">低</em>");
        }
        //中
        else if (newvalue.match(/^[a-z0-9]{1,16}$/) || newvalue.match(/^[A-Za-z]{1,16}$/) || newvalue.match(/^[0-9_]{1,16}$/)) {
            $("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_mid\">中</em>");
        }
        //高
        else if (newvalue.match(/^[A-Za-z0-9]{1,16}$/)) {
            $("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_high\">高</em>");
        }
        else { }
*/        
        if (newvalue1 != "" && newvalue1 != newvalue) {
            //$("#snewpass1").removeClass("tips_form_correct");
            //$("#snewpass1").addClass("tips_form_fault");
            $("#snewpass1").html("<span class=\"z6\"></span>两次输入的密码不一致");
            return false;
        }
        if(newvalue1!=""&&newvalue1==newvalue){
            //$("#snewpass1").removeClass("tips_form_fault");
            //$("#snewpass1").addClass("tips_form_correct");
            $("#snewpass1").html("<span class=\"z6\"></span>");
        }

    }
}

function check3()
{
    newvalue1 = jQuery.trim($("#newpass1").val());
    if (newvalue1 == "") {
        //$("#snewpass1").removeClass("tips_form_correct");
        //$("#snewpass1").addClass("tips_form_fault");
        $("#snewpass1").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    if (newvalue != "") {
        //输入密码不同
        if (newvalue1 != newvalue) {
            //$("#snewpass1").removeClass("tips_form_correct");
            //$("#snewpass1").addClass("tips_form_fault");
            $("#snewpass1").html("<span class=\"z6\"></span>两次输入的密码不一致");
            return false;
        }
        else {
            //$("#snewpass1").addClass("tips_form_correct");
            $("#snewpass1").html("<span class=\"z6\"></span>");
        }
    }
}


function check()
{
    //$("#soldpass").removeClass("tips_form_correct");
    oldvalue = jQuery.trim($("#oldpass").val());
    //空值判断
    if (oldvalue == "") {
        //$("#soldpass").addClass("tips_form_fault");
        $("#soldpass").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    else {
        //$("#soldpass").removeClass("tips_form_fault");
        $("#soldpass").html("");
    }
    
    newvalue = jQuery.trim($("#newpass").val());
    newvalue1 = jQuery.trim($("#newpass1").val());
    //密码

    if (newvalue == "") {
       // $("#snewpass").removeClass("tips_form_correct");
        //$("#snewpass").addClass("tips_form_fault");
        $("#snewpass").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    else {
        if (newvalue.length < 6 || newvalue.length > 16) {
            //$("#snewpass").removeClass("tips_form_correct");
            //$("#snewpass").addClass("tips_form_fault");
            $("#snewpass").html("<span class=\"z6\"></span>6-16个字符,区分大小写");
            return false;
        }

        if ((/>|<|,|\[|\]|\{|\}|\?|\/|\+|=|\||\'|\\|\"|:|;|\~|\!|\@|\#|\*|\$|\%|\^|\&|\(|\)|`/i).test(newvalue)) {
            //$("#snewpass").removeClass("tips_form_correct");
            //$("#snewpass").addClass("tips_form_fault");
            $("#snewpass").html("<span class=\"z6\"></span>请勿用特殊字符");
            return false;
        }
/*
        //密码级别低
        if (newvalue.match(/^[0-9]{1,16}$/) || newvalue.match(/^[A-Za-z]{1,16}$/) || newvalue.match(/^[_]{1,16}$/)) {
            $("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_low\">低</em>");
        }
        //中
        else if (newvalue.match(/^[a-z0-9]{1,16}$/) || newvalue.match(/^[A-Za-z]{1,16}$/) || newvalue.match(/^[0-9_]{1,16}$/)) {
            $("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_mid\">中</em>");
        }
        //高
        else if (newvalue.match(/^[A-Za-z0-9]{1,16}$/)) {
            $("#snewpass").addClass("tips_form_correct");
            $("#snewpass").html("<span class=\"z6\"></span><strong>安全级别：</strong><em class=\"icon_level_high\">高</em>");
        }
        else { }
*/        
        if (newvalue1 != "" && newvalue1 != newvalue) {
            //$("#snewpass1").removeClass("tips_form_correct");
            //$("#snewpass1").addClass("tips_form_fault");
            $("#snewpass1").html("<span class=\"z6\"></span>两次输入的密码不一致");
            return false;
        }
        if(newvalue1!=""&&newvalue1==newvalue){
            //$("#snewpass1").removeClass("tips_form_fault");
            //$("#snewpass1").addClass("tips_form_correct");
            $("#snewpass1").html("<span class=\"z6\"></span>");
        }
    }

    //$("#newpass1").removeClass("tips_form_correct");
    newvalue1 = jQuery.trim($("#newpass1").val());
    if (newvalue1 == "") {
        //$("#snewpass1").addClass("tips_form_fault");
        $("#snewpass1").html("<span class=\"z6\"></span>不能为空");
        return false;
    }
    if (newvalue != "") {
        //输入密码不同
        if (newvalue1 != newvalue) {
            //$("#snewpass1").removeClass("tips_form_correct");
            //$("#snewpass1").addClass("tips_form_fault");
            $("#snewpass1").html("<span class=\"z6\"></span>两次输入的密码不一致");
            return false;
        }
        else {
            //$("#snewpass1").addClass("tips_form_correct");
            $("#snewpass1").html("<span class=\"z6\"></span>");
        }
    }

}