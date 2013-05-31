
var isNameValid = false;
var isPassConfirmValid = false;
var isPassValid = false;
var isUpdate = false;

$(document).ready(function() {
	
	$('#userName').blur(function() {      
        check_username(this);     
    });

	$('#userPassword').blur(function() {
        check_pass(this);
    });

	$('#confirmUserPass').blur(function() {
        check_pass1(this);
    });

});


function onPasswordFocus() {
    if (isUpdate) {
        ShowWrong($("#userPassword"), "请输入通行证帐号的登录密码，以便核实您的帐号", "plus_b");
    }
    else {
        ShowWrong($("#userPassword"), "6-16个半角字符，可为字母、数字及组合，区分大小写", "plus_b");
    }
}

function check_name(obj) {
    if (check_value(obj)) {
        ajax_name();
    }
}

function check_username(obj) {
    if (check_value(obj)) {
        ajax_username();
    }
}
//普通验证
function check_value(obj) {
	
    if (val(obj) == "") {
        ShowWrong(obj, "请输入用户名，推荐使用手机号码", "");
        return false;
    }

    ShowWrong(obj, "", "");
/*
    if (/[A-Z]/.test(val(obj))) {
        ShowWrong(obj, "用户名必须全部小写", "plus_c");
        return false;
    }
    var pat = /^[0-9]+$/;
    if (pat.test(val(obj))) {
        ShowWrong(obj, "用户名不能全是数字，改一下吧", "plus_c");
        return false;
    }
*/

    if (!(/^[\w]+$/).test(val(obj))) {
        ShowWrong(obj, "仅支持英文，数字，下划线或组合", "");
        return false;
    }

    ShowWrong(obj, "", "");

    if (val(obj).indexOf(" ") > -1) {
        ShowWrong(obj, "请不要输入空格", "plus_c");
        return false;
    }
    ShowWrong(obj, "", "");

    if (GetStrLen(val(obj)) < 6 || GetStrLen(val(obj)) > 18) {
        ShowWrong(obj, "长度必须为6-18个字符", "");
        return false;
    }

    ShowWrong(obj, "", "");
    return true;
}

//ajax检验用户名
function ajax_username() {
    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_username.php",
        data: { "userName": escape(val(($('#userName')))), "num": Math.random().toString() },
        success: function(req) {
            username_result(req);
        }
    });
}
//ajax异步检测用户名
function ajax_name() {
    jQuery.ajax({
        type: "post",
        url: "check_username.php",
        data: { "uname": escape(val((jQuery("#userName")))), "num": Math.random().toString() },
        success: function(req) {
            username_result(req);
        }
    });
}

//用户名检验结果
function username_result(req) {
    //var userdivstyle = $('userDiv').style.display;
    var arr = req.split("|");
    var mess = arr[1];
    if (arr[0] == "200") {
        isNameValid = true; //用户名验证正确
        //显示成功
        ShowWrong($('#userName'), "", "");
        //closeDiv();
    } else {
        isNameValid = false;
        ShowWrong($('#userName'), "该用户名已被注册，请重新输入", "");
    }
    /*
    if (userdivstyle == 'block') {
        $('userDiv').style.display = 'none';
    }
    */
}

//选择推荐的用户名
function onchangUserName(username) {
    if (username) {
        isNameValid = true; //用户名验证正确
        $('userName').value = username;
        $('userDiv').style.display = 'none';
        //$('userName').focus();
        ShowWrong(jQuery("#userName"), "", "pw_success");
    }
}

//关闭推荐的用户名
function closeDiv() {
    $('userDiv').style.display = 'none';
}




//得到输入值，已过滤空格
function val(obj) {
    return jQuery.trim(jQuery(obj).val());
}
//IE
function getIE(e) {
    var l = e.offsetLeft;
    while (e = e.offsetParent) {
        l += e.offsetLeft;
    }
    return l;
}
//获得字符串长度
function GetStrLen(key) {
    var l = escape(key), len;
    len = l.length - (l.length - l.replace(/\%u/g, "u").length) * 4;
    l = l.replace(/\%u/g, "uu");
    len = len - (l.length - l.replace(/\%/g, "").length) * 2;
    return len;
}





function ShowMess(obj, message) {
    if (message != "") {
        var showObject = jQuery("#span_" + jQuery(obj).attr("id"));
        showObject.removeClass("tips_form_correct");
        showObject.removeClass("tips_form_fault");
        showObject.html(message);
    }
}




function check_pass(obj) {

    if (isUpdate) {
        isPassValid = true;
        ShowWrong(obj, "", "");
    } else {
        if (val(obj) == "") {
            ShowWrong(obj, "请输入密码", "");
            isPassValid = false;
            return false;
        }
        if ((/>|<|,|\[|\]|\{|\}|\?|\/|\+|=|\||\'|\\|\"|:|;|\~|\!|\@|\#|\*|\$|\%|\^|\&|\(|\)|`/i).test(val(obj))) {
            ShowWrong(obj, "请勿用特殊字符", "");
            isPassValid = false;
            return false;
        }
        if (val(obj).indexOf(" ") > -1) {
            ShowWrong(obj, "请不要输入空格", "");
            isPassValid = false;
            return false;
        }
        if (GetStrLen(val(obj)) < 6 || GetStrLen(val(obj)) > 16) {
            ShowWrong(obj, "长度要求6-16个字符", "");
            isPassValid = false;
            return false;
        }
        if (jQuery.trim(jQuery("#confirmUserPass").val()) != "") {
            if (val(obj) != jQuery.trim(jQuery("#confirmUserPass").val())) {
                ShowWrong(jQuery("#confirmUserPass"), "两次输入的密码不一致", "");
                isPassValid = false;
                return false;
            }
            else {
                ShowWrong(jQuery("#confirmUserPass"), "", "");
            }
        }
        isPassValid = true;

        showpass(obj);
    }
}

function check_pass1(obj) {
    if (val(obj) == "") {
        ShowWrong(obj, "请输入密码", "");
        //ShowWrong(obj, "", "");
        isPassConfirmValid = false;
        return false;
    }
    if ((/>|<|,|\[|\]|\{|\}|\?|\/|\+|=|\||\'|\\|\"|:|;|\~|\!|\@|\#|\*|\$|\%|\^|\&|\(|\)|`/i).test(val(obj))) {
        ShowWrong(obj, "请勿用特殊字符", ""); ;
        isPassConfirmValid = false;
        return false;
    }

    if (GetStrLen(val(obj)) < 6 || GetStrLen(val(obj)) > 16) {
        ShowWrong(obj, "长度要求6-16个字符", ""); ;
        isPassConfirmValid = false;
        return false;
    }

    if (val(obj) != jQuery.trim(jQuery("#userPassword").val())) {
        ShowWrong(obj, "两次输入的密码不一致", "");
        isPassConfirmValid = false;
        return false;
    }
    isPassConfirmValid = true;
    ShowWrong(obj, "", "");
}


//显示密码强度
function showpass(obj) {

    var item = val(obj);
    if (item != '' && (item.match(/^[0-9]{1,16}$/) || item.match(/^[A-Za-z]{1,16}$/) || item.match(/^[_]{1,16}$/))) {
        showitem = "<div class=\"pw_weight\" id=\"red_password_weight\"><span class=\"w1\" ></span></div>";
    }
    else if (item != '' && (item.match(/^[a-z0-9]{1,16}$/) || item.match(/^[A-Za-z]{1,16}$/) || item.match(/^[0-9_]{1,16}$/))) {
        showitem = "<div class=\"pw_weight\" id=\"red_password_weight\"><span class=\"w2\" ></span></div>";
    }
    else if (item != '' && item.match(/^[A-Za-z0-9]{1,16}$/)) {
        showitem = "<div class=\"pw_weight\" id=\"red_password_weight\"><span class=\"w3\" ></span></div>";
    }
    else {
        showitem = "";
    }
    var showObject = jQuery("#div_" + jQuery(obj).attr("id"));
    ShowWrong(obj, "", "");

    if (!isUpdate) {
        showObject.html(showObject.html() + "" + showitem);
    }

}