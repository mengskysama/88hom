<?php /* Smarty version Smarty-3.1.8, created on 2013-07-09 15:28:31
         compiled from "E:/workspace/projects/88hom/templates\ucenter\secure_reset_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2483451b424f38714a8-60124098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ce31e74f147f3e59fe1c9b816db25e172e48a7' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\secure_reset_mobile.tpl',
      1 => 1373354877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2483451b424f38714a8-60124098',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51b424f39764d9_11653795',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
    'errMsg' => 0,
    'oldUserPhone' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b424f39764d9_11653795')) {function content_51b424f39764d9_11653795($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>安全中心-手机</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="javascript" type="text/javascript">

var ismobilevalid = false;
var isvcodevalid = false;
jQuery(document).ready(function() {
	$("#userPhone").blur(function() {    
	    check_mobile();
    });
    
	$("#phoneCert").blur(function() {
	    check_vcode(this);
    });
    
    $("#btn_confirm").click(function() {
        $("#resetMobileFrm").attr("disabled", true);
    	$("#userPhone").blur();
    	$("#phoneCert").blur();
    	if(ismobilevalid && isvcodevalid){
    		document.getElementById("resetMobileFrm").submit();
    	}
    });
});
        
function ShowWrong(obj,message) {	    
	obj.html("<span class=\"z6\"></span>" + message);
}

function val(obj) {
    return jQuery.trim(jQuery(obj).val());
}
//检查验证码
function check_vcode(obj) {

    var code = val(obj);
    if (code == "") {
        ShowWrong($("#cert_code_tips"), "请输入手机验证码");
        isvcodevalid = false;
        return false;
    }
    var pat = /^\d{6}$/;
    if (!pat.test(code)) {
        ShowWrong($("#cert_code_tips"), "验证码不对，请重新输入");
        isvcodevalid = false;
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "type": "phone", "userPhone": escape(val($("#userPhone"))), "vcode": val($("#phoneCert")), "num": Math.random().toString() },
        success: function(req) {
            if (req == "200") {
                isvcodevalid = true;
                ShowWrong($("#cert_code_tips"), "");
            } else {
                isvcodevalid = false;
                ShowWrong($("#cert_code_tips"), "验证码错误");
            }
        }
    });
}
//ajax异步检测手机号
function check_mobile() {   

	var mobile = val($('#userPhone'));
	var pat = /^1\d{10}$/;
	if (mobile == "") {
		ShowWrong($("#userPhone_tips"),"请输入手机号码");
	    ismobilevalid = false;
	    return false;
	}
	if (!pat.test(mobile)) {
		ShowWrong($("#userPhone_tips"),"手机号码格式不正确");
	    ismobilevalid = false;
	    return false;
	}
	
    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_mobile.php",
        data: { "userPhone": escape(val(($("#userPhone")))), "num": Math.random().toString() },
        success: function(req) {
            var resu = req.split("|");
            if (resu[0] != "200") {
                ismobilevalid = false;
                ShowWrong($("#userPhone_tips"),"该手机号已被用户绑定");
                return false;
            } else {
                ismobilevalid = true;
                ShowWrong($("#userPhone_tips"),"");
                return true;
            }
        }
    });
}

function sendCertCode() {
	
    if(!check_mobile()) return;

    jQuery.ajax({
        type: "post",
        url: "send_cert_code.php",
        data: { "userPhone": $("#userPhone"), "mathcode": $("#phoneCert") },
        success: function(req) {
        	alert(req);
            if (req == "200") {
                ShowWrong($("#cert_code_tips"), "验证码已发送");
            } else {
				ShowWrong($("#cert_code_tips"), "发送验证码失败，请重试");
            }
        }
    });
}
</script>
</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
    	<div class="zl_b1">
        	 <div class="zl_b11">
          <div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="ucenter_user.php">用户中心</a></li>
	          <li><a href="userinfo.php">个人资料</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
	          <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
            <div class="zl_nr">
            	<div class="zl_l">
                	<span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font></span>
						<ul class="zlfl">
                    		<li><a href="secure_reset_password.php">密码修改</a></li>
                            <li><a href="secure_reset_email.php">邮箱修改</a></li>
                            <li><a href="secure_reset_mobile.php">验证手机</a></li>
                    	</ul>
                </div>
                <div class="zl_r">
                <form id="resetMobileFrm" name="resetMobileFrm" action="secure_reset_mobile.php" method="post">
					<table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td align="middle" colspan="2"><font color="red"><?php echo $_smarty_tpl->tpl_vars['errMsg']->value;?>
</font>
                               </td>
						  </tr>
						  <?php if ($_smarty_tpl->tpl_vars['oldUserPhone']->value!=''){?>
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">原始手机号：</td>
  							  <td width="450" class="p5 z14"><?php echo $_smarty_tpl->tpl_vars['oldUserPhone']->value;?>
</td>
						  </tr>
						  <?php }?>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">输入新手机号：</td>
                                <td width="450">
                             		<input id="userPhone" name="userPhone" type="text" class="sjh" style="width:250px;"  value=""/>
                    				<input id="send_cert_code" name="send_cert_code" type="button" class="hq b0" value="" onclick="return sendCertCode();"/>
                                	<span id="userPhone_tips" class="z6"></span>
                               </td>
						</tr>
 						 <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">手机验证码：</td>
  						      <td width="450" class="grzc_32">
                             	<input id="phoneCert" name="phoneCert" type="text"  value="" />
                                <span id="cert_code_tips" class="z6"></span>
                               </td>
	  			        </tr>
 						 <tr>
 								   <td height="45" colspan="2">
									<div class="dlmm1" style=" padding-top:50px; padding-bottom:100px;">
                                        	<input name="btn_confirm" type="button" class="denglu1 l" id="btn_confirm" value="确定" />
                                            <input name="button2" type="reset" class="denglu1 l" id="button2" value="重置" />
                                        </div>
                                   </td>
		    			</tr>
				  </table>
			  </form>
              </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>