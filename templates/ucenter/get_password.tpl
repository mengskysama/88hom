<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>忘记密码</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {

	function show_error(message) {
    	var showObject = $("#div_err_msg");
    	showObject.html("<div>" + message + "</div>");
	}

	var isUserValid = false;
	$("#loginId").blur(function() {
		var username = $("#loginId").val();
        if (jQuery.trim(username) == '') {
			show_error("用户名不能为空");
            isUserValid = false;
            return;
        }

        jQuery.ajax({
        	type: "post",
            async: false,
            url: "check_username.php",
            data: { "userName": escape(username), "num": Math.random().toString() },
            success: function(req) {
            	var arr = req.split("|");
            	var errCode = arr[0];
            	if (errCode == "201") {
                	isUserValid = true;
                    show_error("");
                } else {
					isUserValid = false;
                    if (errCode == "200" || errCode == "203") {
                    	show_error("用户名不存在，请重新输入");
                        return;
					} else if (errCode == "202") {
                    	show_error("此用户名没有邮箱或手机，请重新申请账号！");
                        return;
                    }
				}
			}
		});

	});

	$("#button2").click(function() {
		if (isUserValid) {
			$("#getPwdFrm").submit();
		} else {
			$("#loginId").blur();
		}
	});

});
</script>
</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
<!--中间-->
<form id="getPwdFrm" name="getPwdFrm" action="get_password.php" method="post">
<input type="hidden" name="aType" value="getPwd">
<div class="gr_zj">
	<div class="gr_b">
    	<div class="gr_dl">
        <div class="dl_tb">
			<img src="<!--{$cfg.web_images}-->ucenter/wjmm_03.jpg" width="72" class="l">  
            <span class="dl_wz2 r">请选择以下任何一种方式找回密码,输入用户名 或者 已验证的手机 或者 已验证的邮箱</span>      
        </div>
		<div class="wjmm">找回密码</div>
            <div class="other" id="div_err_msg">
               <div class="">
               </div>
            </div>
            <div class="sjzc1">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
  						  <td width="105" height="45" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>用户名：</td>
  						  <td height="45" class="grzc_31">
                          	<input id="loginId" name="loginId" type="text"  value="" />
                          </td>
		  			 </tr>
 					 <tr>
 						 <td width="105" height="45" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>获取方式：</td>
					      <td height="45" align="left" valign="middle" class="f14">
               	  			<label><input id="pass_channel" name="pass_channel" type="radio" value="mobile" checked="checked" />手机设置 </label>     
      						<label><input id="pass_channel" name="pass_channel" type="radio" value="email" /> 邮箱设置  </label>   
              			 </td>
		  			 </tr>
 					
 					 <tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input name="button2" type="button" class="denglu" id="button2" value="找回密码" /></div>
                           </td>
	      			 </tr>
			  </table>

          </div>
        </div>
    </div>
</div>
</form>
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
