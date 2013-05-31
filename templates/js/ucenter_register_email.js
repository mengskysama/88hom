//检查邮箱
var isemaivalid = false;
var isCodeValid = false;

jQuery(document).ready(function() {

    //验证邮箱
    $("#userEmail").blur(function() {
        check_email(this);
        refresh_code();
        $("#txt_mathcode").val('');
        //$("#txt_mathcode").focus();
    });

/*
    $("#userEmail").keyup(function(event) {
        autoemail(this, event);
    });

    $("#divEmailMain").keyup(function(event) {
        keygo(event);
    });
*/
    $("#txt_mathcode").focus(function() {
    	ShowWrong(this, "", "");
    });
    $("#txt_mathcode").blur(function() {
        check_mathcode();
    });

    isemaivalid = false;

    $("#emailregister").submit(function() {
    	if (check()) {
            return true;
        } else {
            return false;
        }
    });

    $("#register_confirm").click(function() {
        $("#register_confirm").attr("disabled", true);
        if (check()) {
            document.getElementById("emailregister").submit();
        } else {
            $("#register_confirm").removeAttr("disabled");
        }
    });


});

function refresh_code() {

    $("#imgcode").click();
}


function check_email(obj) {
	
    if (val(obj) == "") {
        ShowWrong(obj, "请输入邮箱地址", "");
        //ShowWrong(obj, "", "");
        isemaivalid = false;
        return false;
    }
    var filter = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if (!filter.test(val(obj))) {
        ShowWrong(obj, "请输入正确的邮箱地址", "");
        isemaivalid = false;
        return false;
    }
    if (GetStrLen(val(obj)) < 6 || GetStrLen(val(obj)) > 40) {
        ShowWrong(obj, "邮箱长度错误", "");
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
                ShowWrong($("#userEmail"), "该邮箱地址已被用户绑定", "");
            }
            else {
                isemaivalid = true;
                ShowWrong($("#userEmail"), "", "");
            }
        }
    });
}


function check_mathcode() {  
    if ($("#txt_mathcode").val() == '') {
        ShowWrong($("#txt_mathcode"), "请输入验证码", "");
        isCodeValid = false;
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "type": "email", "vcode": jQuery.trim($("#txt_mathcode").val()), "num": Math.random().toString() },
        success: function(req) {
        	//alert(req);
            if (req == "200") {
                isCodeValid = true;
                ShowWrong($("#txt_mathcode"), "", "");
            } else {
                isCodeValid = false;
                ShowWrong($("#txt_mathcode"), "验证码错误，请重新输入", "");
                $("#txt_mathcode").focus();
            }
        }
    });

}

function ShowWrong(obj, message, className) {
    var showObject = $("#div_err_msg");
    showObject.html("<div class=\"" + className + "\">" + message + "</div>");
}



function check() {
    check_pass($("#userPassword"));
    check_pass1($("#confirmUserPass"));

    if ($("#userEmail").val() == '') {
        ShowWrong($("#userEmail"), "请输入邮箱地址", "");
        isemaivalid = false;
        return false;
    }

    if ($("#txt_mathcode").val() == '') {
        ShowWrong($("#txt_mathcode"), "请输入验证码", "");
        isCodeValid = false;
        return false;
    }
    
    if (!$("#agree_ucenter").prop("checked")) {
        alert("请先选中同意《服务条款》和《隐私权相关政策》");
        return false;
    }

    if (!(isNameValid && isPassValid && isPassConfirmValid && isCodeValid)) {
        alert("请按照页面的提示重新填写信息。");
        return false;
    }

    return true;
}





var lii = 0, ci = 1;
function g(id) { return document.getElementById(id); }
function keygo(e) {
    e = e || window.event;
    var key = e.which ? e.which : e.keyCode;
    if (lii <= 0) {
        return;
    }
    if (key == 38) {//↑
        for (i = 1; i <= lii; i++) { g("li_" + i).className = ""; }
        ci--;
        if (ci <= 0) ci = lii;

        g("li_" + ci).className = "bj"; //
        uptoinput(ci);
    }
    if (key == 40) {//↓		
        for (i = 1; i <= lii; i++) { g("li_" + i).className = ""; }
        ci++;
        if (ci > lii) ci = 1;
        g("li_" + ci).className = "bj";
        uptoinput(ci);
    }

    if (key == 13) {
        lii = 0; ci = 1; g("emailDiv").style.display = "none";
        $("#userEmail").blur();
    }
}
function uptoinput(i) {
    var email, obj;
    obj = g("li_" + i);
    email = obj.innerHTML
    g("userEmail").value = email;
}



var emailserver = ["@163.com", "@126.com", "@qq.com", "@sina.com", "@hotmail.com", "@gmail.com", "@sohu.com", "@yahoo.com.cn", "@yahoo.cn", "@tom.com"];
function autoemail(emailobj, e) {

    e = e || window.event;
    var keycode = e.which ? e.which : e.keyCode;
    if (keycode == 38 || keycode == 40 || keycode == 13) return;


    var emailStr = emailobj.value
    if (emailStr.length == 0) {
        $('emailDiv').style.display = 'none';
        return;
    }
    var email = emailobj.value;
    var servers = [];
    var prefix = "";
    var str = "<ul>";
    str += "<li>请选择邮箱类型：    ↑↓键选择</li>";
    //str += "<li>"+emailobj.value+"</li>";

    if (email.indexOf('@') == -1) {
        servers = emailserver;
    }
    else {
        var emailsub = email.substring(email.indexOf('@'));
        email = email.replace(emailsub, '');
        for (var i = 0; i < emailserver.length; i++) {
            if (emailserver[i].indexOf(emailsub) != -1) {
                servers.push(emailserver[i]);
            }
        }

    }
    lii = servers.length + 1;
    str += autoemail_sub(servers, email, emailStr);
    str += "</ul>";
    $('emailDiv').innerHTML = str;

    $('emailDiv').style.display = '';

}

function autoemail_sub(servers, emailsub, emailStr) {
    var index = 1;
    var str = "";
    str += "<li id=\"li_1\" class=\"bj\" onmouseover=\"jQuery(this).addClass('bj');onoverEmail('" + emailStr + "');\" onmouseout=\"jQuery(this).removeClass('bj');\" onClick=\"onchangEmail('" + emailStr + "')\" style=\"cursor: hand;\">" + emailStr + "</li>";
    for (var i = 0; i < servers.length; i++) {
        var email = emailsub + servers[i];
        index++;
        str += "<li id=\"li_" + index + "\" onmouseover=\"jQuery(this).addClass('bj');onoverEmail('" + email + "');\" onmouseout=\"jQuery(this).removeClass('bj');\" onClick=\"onchangEmail('" + email + "')\" style=\"cursor: hand;\">" + email + "</li>";
    }
    return str;
}


//点击推荐的邮箱
function onchangEmail(email) {
    if (email) {
        ShowWrong($("#userEmail"), "", "pw_success");
        $('userEmail').value = email;
        $('emailDiv').style.display = 'none';
    }
}

//选择推荐的邮箱
function onoverEmail(email) {
    if (email) {
        $('userEmail').value = email;
    }
}