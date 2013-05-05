
var isMobileValid = false;

//检查验证码
var isCodeValid = false;


$(document).ready(function() {
    
    $("#userPhone").blur(function() {
        //ajax手机检测
        check_mobilebase();
        if (isMobileValid) {
            check_mobile(this);
        }
        //refresh_code();
    });

    $("#phoneCert").blur(function() {
        check_code(this);
    });

    $("#phoneCert").focus(function() {
        ShowWrongMobile(this, "", "");
    });

    $("#phoneCert").change(function() {
        isCodeValid = false;
    });


    $("#userRegForm").submit(function() {
        if (check()) {
/*            var pwdRtn = encryptedString(key_to_encode, $("#userPassword").val());
            $("#userPassword").val(pwdRtn);
            $("#confirmUserPass").val(pwdRtn);
*/
            return true;
        } else {
            return false;
        }
    });

    $("#button2").click(function() {
        $("#button2").attr("disabled", true);
        if (check()) {
            /*
        	var pwdRtn = encryptedString(key_to_encode, $("#userPassword").val());
            $("#userPassword").val(pwdRtn);
            $("#confirmUserPass").val(pwdRtn);
            */
            document.getElementById("userRegForm").submit();
        } else {
            $("#button2").attr("disabled", false);
        }
    });



    jQuery("#phoneCert").blur(function() {
        check_code();
    });


    jQuery("#a_sendcode").click(function() {
        if (jQuery("#vcode").attr("disabled") == true) {
            return;
        }
        if (jQuery("#userPhone").val() == "") {
            ShowWrong(jQuery("#userPhone"), "请输入手机号码", "plus_c");
            isMobileValid = false;
            return;
        }
        check_mobilebase()
        if (isMobileValid) {
            ajax_mobile();
        }
        if (isMobileValid) {
            sendVcode(jQuery("#userPhone").val(), jQuery("#txt_mathcode").val());
        }
        return false;
    });

    $("#btn_mathcode").click(function() {
        sendCertCode();
    });
});


function sendCertCode() {
    if ($("#userPhone").val() == "") {
        ShowWrong($("#userPhone"), "请输入手机号码", "");
        isMobileValid = false;
        return;
    }
    check_mobilebase();
    if (isMobileValid) {
        ajax_mobile();
    }
    if (isMobileValid) {
        sendVcode($("#userPhone").val(), $("#txt_mathcode").val());
    }
    return false;
}


function sendVcode(mobile, mathcode) {
    
    jQuery.ajax({
        type: "post",
        url: "send_cert_code.php",
        data: { "userPhone": mobile, "mathcode": mathcode },
        success: function(req) {
        	
            if (req == "200") {
                refresh_code();
                document.getElementById("div_mathcode").style.display = "none";
                updateTimeLabel(120);
            } else if (req == "201") {
                //显示运算输入
                document.getElementById("div_mathcode").style.display = "";
                $("#txt_mathcode").focus();
            } else if (req == "205") {
                //显示运算输入
            	ShowWrong('', "验证码不正确", "");
                document.getElementById("div_mathcode").style.display = "";
                $("#txt_mathcode").focus();
            } else {
                if (req.length > 14) {
                    ShowWrong($("#userPhone"), req, "");
                }
                else {
                    ShowWrong($("#userPhone"), req, "");
                }
            }
        }
    });


}


function refresh_code() {
    var codefor = jQuery("#userPhone").val();
    var v_random = Math.round(Math.random() * 10000);
    jQuery("#imgcode").attr("src", 'get_math_code.aspx?code=' + v_random + '&codefor=' + codefor);
}

//手机号输入格式检测
function check_mobilebase() {

    var mobile = jQuery.trim($('#userPhone').val());
    var pat = /^1\d{10}$/;
    if (mobile == "") {
        ShowWrong($('#userPhone'), "请输入手机号码", "");
        isMobileValid = false;
        return false;
    }
    if (!pat.test(mobile)) {
        ShowWrong($("#userPhone"), "手机号码格式不正确", "");
        isMobileValid = false;
        return false;
    }
    var showObject = $("#div_userPhone");
    isMobileValid = true;
    ShowWrong($("#userPhone"), "", "");

    //页面下部的发送
    $("#a_sendcode").attr("disabled", false);


}

//检查手机号
function check_mobile() {
    if (isMobileValid) {
        ajax_mobile();
    }
}
//检查验证码
function check_vcode2() {
    if (isvcode) {
        ajax_vcode();
    }
}
//ajax异步检测手机号
function ajax_mobile() {
	
    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_mobile.php",
        data: { "userPhone": escape(val(($("#userPhone")))), "num": Math.random().toString() },
        success: function(req) {
            var resu = req.split("|");
            if (resu[0] != "200") {
                isMobileValid = false;
                ShowWrong($("#userPhone"), "该手机号已与被用户绑定", "");
                return false;
            } else {
                isMobileValid = true;
            }
        }
    });
}


function check() {

    check_pass("#userPassword");
    check_pass1("#confirmUserPass");

    if (jQuery("#userPhone").val() == "") {
        ShowWrong(jQuery("#userPhone"), "请输入手机号码", "plus_c");
        isMobileValid = false;
        return;
    }

    if (jQuery("#phoneCert").val() == "") {
        ShowWrong(jQuery("#phoneCert"), "请输入手机验证码", "plus_c");
        isCodeValid = false;
        return false;
    }


    if (!$("agree").checked) {
        alert("请先选中同意《搜房服务协议》");
        return false;
    }
    if (!(isnamevalid && ispassvalid && ispass1valid && isCodeValid)) {
        alert("请按照页面的提示重新填写信息。");
        return false;
    }
    return true;
}






function check_code(obj) {

    var code = val(obj);
    if (code == "") {
        ShowWrong(obj, "请输入手机验证码", "");
        //ShowWrong(obj, "", "");
        return false;
    }
    var pat = /^\d{6}$/;
    if (!pat.test(code)) {
        ShowWrong(obj, "验证码不对，重新输入下吧", "");
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "mobile": escape(val(($("#userPhone")))), "vcode": val(($("#phoneCert"))), "num": Math.random().toString() },
        success: function(req) {
            if (req == "200") {
                isCodeValid = true;  //验证码正确
                ShowWrong(obj, "", "");
            } else {
                isCodeValid = false;
                ShowWrong(obj, "验证码错误", "");
            }
        }
    });
}



//得到输入值，已过滤空格
function val(obj) {
    return jQuery.trim(jQuery(obj).val());
}


function ShowWrong(obj, message, className) {
    var showObject = jQuery("#div_err_msg");
    showObject.html("<div class=\"" + className + "\">" + message + "</div>");
    document.getElementById("div_mathcode").style.display = "none";

}

function ShowWrongMobile(obj, message, className) {
    var showObject = jQuery("#div_" + jQuery(obj).attr("id"));
    showObject.html("<div class=\"" + className + "\">" + message + "</div>");

}

function ShowNone(obj) {
    ShowWrong(obj, "", "pw_success");
}

function updateTimeLabel(time) {
    var btn = jQuery("#vcode");
    var a_sendcode = jQuery("#a_sendcode");
    btn.val(time <= 0 ? "免费获取验证码" : ("" + (time) + "秒后点击重新发送"));
    var hander = setInterval(function() {
        if (time <= 0) {
            clearInterval(hander);
            hander = null;
            btn.val("免费获取验证码");
            btn.attr("disabled", false);
            a_sendcode.attr("disabled", false);
            jQuery("#phoneCertTip").text("");
        }
        else {
            btn.attr("disabled", true);
            a_sendcode.attr("disabled", true);
            btn.val("" + (time--) + "秒后点击重新发送");
        }
    }, 1000);
}
