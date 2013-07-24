<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 23:07:33
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\secure_reset_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2459051efe5d7c02e91-19878665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d4ef23ed5334b7d5ecb487a56bbed66f6ce1ef' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\secure_reset_mobile.tpl',
      1 => 1374678431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2459051efe5d7c02e91-19878665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51efe5d7d42eb0_18867264',
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
<?php if ($_valid && !is_callable('content_51efe5d7d42eb0_18867264')) {function content_51efe5d7d42eb0_18867264($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
function refresh_code() {
    var codefor = $("#userPhone").val();
    var v_random = Math.round(Math.random() * 10000);
    $("#imgcode").attr("src", '<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
/common/libs/api/line_captcha.php?code=' + v_random + '&codefor=' + codefor);
}

function sendCertCode() {
	
    if(!ismobilevalid) return;

	var mobile = $("#userPhone").val();
	var mathcode = $("#txt_mathcode").val();
    jQuery.ajax({
        type: "post",
        url: "send_cert_code.php",
        data: { "userPhone": mobile, "mathcode": mathcode },
        success: function(req) {
        	
            if (req == 200) {
                refresh_code();
            	alert("验证码已发出，请查收");
                document.getElementById("div_mathcode").style.display = "none";
                //updateTimeLabel(120);
            } else if (req == 201) {
                //显示运算输入
                document.getElementById("div_mathcode").style.display = "";
                $("#txt_mathcode").focus();
            } else if (req == 205) {
                //显示运算输入
            	alert("验证码不正确");
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
            	<div class="sjzc1_reset_mobile" id="div_mathcode" style="display: none;">
               	  <table width="180" height="58" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="85"><img src='<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_code_line'];?>
' id='imgcode' name='imgcode'  onClick="this.src=this.src+'?op=login&'+Math.random()" style='cursor:pointer;'></td>
                            <td width="47"><input type="text" value="" maxlength="4" class="yz_input" id="txt_mathcode" /></td>
                            <td width="44"><image id="btn_mathcode" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qd.jpg" onclick="return sendCertCode();"></td>
                        </tr>
                        <tr>
                            <td><span class="blue"><a href="javascript:void(0);" onclick="refresh_code();">换一题</a></span></td>
                            <td colspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/yz_bq.gif" style="vertical-align:middle;"> 请输入答案</td>
                        </tr>
                    </table>
                </div>
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
                    				<input id="send_cert_code" name="send_cert_code" type="button" class="hq b0" onclick="return sendCertCode();"/>
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