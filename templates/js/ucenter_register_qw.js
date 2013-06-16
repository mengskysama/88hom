var isMobileValid = false;
var isCodeValid = false;
var isLoginValid = false;
var isemaivalid = false;
var isMatchCodeValid = false;

$(document).ready(function() {
    
    $("#a_sendcode").click(function() {
        if ($("#btn_send_vcode").attr("disabled") == true) {
            return;
        }
        if (val($("#userPhone")) == "") {
            alert("请输入手机号码");
            isMobileValid = false;
            return;
        }
        check_mobilebase()
        if (isMobileValid) {
            ajax_mobile();
        }
        if (isMobileValid) {
            sendVcode(val($("#userPhone")), val($("#txt_mathcode")));
        }
        return false;
    });

    $("#phoneCert").blur(function() {
        check_code(this);
    });
    

    $("#mobileRegFrm").submit(function() {

        if (check_reg_mobile()) {
            return true;
        } else {
            return false;
        }
    });

    $("#btn_reg_mobile").click(function() {
        $("#btn_reg_mobile").prop("disabled", true);
        if (check_reg_mobile()) {
           document.getElementById("mobileRegFrm").submit();
        } else {
            $("#btn_reg_mobile").prop("disabled", false);
        }
    });
    

    $("#btn_ok_loginFrm").click(function() {
        $("#btn_ok_loginFrm").prop("disabled", true);
        
        check_login();
        if (isLoginValid) {
            document.getElementById("loginFrm").submit();
        }else {
            $("#btn_ok_loginFrm").prop("disabled", false);
        }
    });
    
    //验证邮箱
    $("#userEmail").blur(function() {
        check_email(this);
    });
    
    $("#email_mathcode").blur(function() {
    	check_mathcode();
    });

    $("#btn_reg_email").click(function() {
        $("#btn_reg_email").prop("disabled", true);
        
        check_email($("#userEmail"));
        check_mathcode();
        if (isMatchCodeValid) {
            document.getElementById("emailRegFrm").submit();
        }else {
            $("#btn_reg_email").prop("disabled", false);
        }
    });
});

function check_mathcode() {  
    if (val($("#email_mathcode")) == '') {
        alert("请输入验证码");
        isMatchCodeValid = false;
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "type": "qw_email", "vcode": val($("#email_mathcode")), "num": Math.random().toString() },
        success: function(req) {
            if (req == "200") {
            	isMatchCodeValid = true;
            } else {
            	isMatchCodeValid = false;
                alert("验证码错误，请重新输入");
            }
        }
    });

}

function check_email(obj) {
	
    if (val(obj) == "") {
        alert("请输入邮箱地址");
        isemaivalid = false;
        return false;
    }
    var filter = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if (!filter.test(val(obj))) {
        alert("请输入正确的邮箱地址");
        isemaivalid = false;
        return false;
    }
    if (GetStrLen(val(obj)) < 6 || GetStrLen(val(obj)) > 40) {
        alert("邮箱长度错误");
        isemaivalid = false;
        return false;
    }
    ajax_email();

}

function ajax_email() {
    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_email.php",
        data: { "userEmail": escape(val(($("#userEmail")))), "num": Math.random().toString() },
        success: function(req) {
            var resu = req.split("|");
            if (resu[0] != "200") {
                isemaivalid = false;
                $("#imgcode").click();
                alert("该邮箱地址已被用户绑定");
            } else {
                isemaivalid = true;
            }
        }
    });
}

function check_code(obj) {

    var code = val(obj);
    if (code == "") {
        alert("请输入手机验证码");
        isCodeValid = false;
        return false;
    }
    var pat = /^\d{6}$/;
    if (!pat.test(code)) {
        alert("验证码不对，重新输入下吧");
        isCodeValid = false;
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "type": "phone", "userPhone": escape(val(($("#userPhone")))), "vcode": val(($("#phoneCert"))), "num": Math.random().toString() },
        success: function(req) {
            if (req == "200") {
                isCodeValid = true;  //验证码正确
            } else {
                isCodeValid = false;
                alert("验证码错误");
            }
        }
    });
}

function check_reg_mobile() {

    if (val($("#userPhone")) == "") {
        alert("请输入手机号码");
        isMobileValid = false;
        return false;
    }

    if (val($("#phoneCert")) == "") {
        alert("请输入手机验证码");
        isCodeValid = false;
        return false;
    }

    if (!$("#reg_mobile_agree_ucenter").prop("checked")) {
        alert("请先选中同意《服务条款》和《隐私权相关政策》");
        return false;
    }

    if (!(isMobileValid && isCodeValid)) {
        alert("请按照页面的提示重新填写信息。");
        return false;
    }
    return true;
}

function show_menuc(type){
	if(type=="login"){
		document.getElementById("acc_2").style.display="none";	
		document.getElementById("acc_3").style.display="none";	
		document.getElementById("acc_1").style.display="block";         
	}else{
		document.getElementById("acc_1").style.display="none";
		document.getElementById("acc_2").style.display="block";  
		document.getElementById("acc_3").style.display="none";	 
		document.getElementById("reg_mobile_1").checked=true;
	}
}

function radio_check(type) {
    if (type == "email") {
    	document.getElementById("acc_1").style.display="none";
    	document.getElementById("acc_2").style.display="none";  
    	document.getElementById("acc_3").style.display="block";	 
    	document.getElementById("reg_email_2").checked=true;
    }else {
    	document.getElementById("acc_1").style.display="none";
    	document.getElementById("acc_2").style.display="block";  
    	document.getElementById("acc_3").style.display="none";	  
    	document.getElementById("reg_mobile_1").checked=true;
    }
}

//得到输入值，已过滤空格
function val(obj) {
    return jQuery.trim(jQuery(obj).val());
}

function sendCertCode() {

    if (val($("#userPhone")) == "") {
        alert("请输入手机号码");
        isMobileValid = false;
        return;
    }
    check_mobilebase();
    if (isMobileValid) {
        ajax_mobile();
    }
    if (isMobileValid) {
        sendVcode(val($("#userPhone")), val($("#txt_mathcode")));
    }
    return false;
}

//手机号输入格式检测
function check_mobilebase() {

  var mobile = val($("#userPhone"));
  var pat = /^1\d{10}$/;
  if (mobile == "") {
      alert("请输入手机号码");
      isMobileValid = false;
      return false;
  }
  if (!pat.test(mobile)) {
      alert("手机号码格式不正确");
      isMobileValid = false;
      return false;
  }
  isMobileValid = true;
  
  //页面下部的发送
  $("#a_sendcode").attr("disabled", false);
}

//检查手机号
function check_mobile() {
  if (isMobileValid) {
      ajax_mobile();
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
              alert("该手机号已被用户绑定");
              return false;
          } else {
              isMobileValid = true;
          }
      }
  });
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
            } else if (req == "201") {
                //显示运算输入
                document.getElementById("div_mathcode").style.display = "";
                $("#txt_mathcode").focus();
            } else if (req == "205") {
                //显示运算输入
            	alert("验证码不正确");
                document.getElementById("div_mathcode").style.display = "";
                $("#txt_mathcode").focus();
            } else {
                if (req.length > 14) {
                    alert(req);
                }else {
                    alert(req);
                }
            }
        }
    });
}

function refresh_code() {
    var codefor = val($("#userPhone"));
    var v_random = Math.round(Math.random() * 10000);
    $("#imgcode").attr("src", 'http://localhost/88hom/common/libs/api/line_captcha.php?code=' + v_random + '&codefor=' + codefor);
}


function check_login() {
    if (val($("#userName")) == "") {
        alert("请填写账户名！");
        $("#userName").focus();
        isLoginValid = false;
        return false;
    }

    if (val($("#userPassword")) == "") {
        alert("请填写密码！");
        $("#userPassword").focus();
        isLoginValid = false;
        return false;
    }
    isLoginValid = true;
    return true;
}

function GetStrLen(key) {
    var l = escape(key), len;
    len = l.length - (l.length - l.replace(/\%u/g, "u").length) * 4;
    l = l.replace(/\%u/g, "uu");
    len = len - (l.length - l.replace(/\%/g, "").length) * 2;
    return len;
}
