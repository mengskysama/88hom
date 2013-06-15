var isMobileValid=false;

var $=function(id) {
   return document.getElementById(id);
}

function show_menuc(type){
	if(type=="login"){
		$("acc_2").style.display="none";	
		$("acc_3").style.display="none";	
	    $("acc_1").style.display="block";         
	}else{
	    $("acc_1").style.display="none";
	    $("acc_2").style.display="block";  
		$("acc_3").style.display="none";	 
		$("reg_mobile_1").checked=true;
	}
}

function radio_check(type) {
    if (type == "email") {
	    $("acc_1").style.display="none";
	    $("acc_2").style.display="none";  
		$("acc_3").style.display="block";	 
		$("reg_email_2").checked=true;
    }else {
	    $("acc_1").style.display="none";
	    $("acc_2").style.display="block";  
		$("acc_3").style.display="none";	  
		$("reg_mobile_1").checked=true;
    }
}

//得到输入值，已过滤空格
function val(obj) {
  return jQuery.trim(obj.value);
}

function sendCertCode() {

    if (val($("userPhone")) == "") {
        alert("请输入手机号码");
        isMobileValid = false;
        return;
    }
    check_mobilebase();
    if (isMobileValid) {
        ajax_mobile();
    }
    if (isMobileValid) {
        sendVcode(val($("userPhone")), val($("txt_mathcode")));
    }
    return false;
}

//手机号输入格式检测
function check_mobilebase() {

  var mobile = val($("userPhone"));
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
  $("a_sendcode").attr("disabled", false);
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
      data: { "userPhone": escape(val(($("userPhone")))), "num": Math.random().toString() },
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
                updateTimeLabel(120);
            } else if (req == "201") {
                //显示运算输入
                document.getElementById("div_mathcode").style.display = "";
                $("txt_mathcode").focus();
            } else if (req == "205") {
                //显示运算输入
            	alert("验证码不正确");
                document.getElementById("div_mathcode").style.display = "";
                $("txt_mathcode").focus();
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