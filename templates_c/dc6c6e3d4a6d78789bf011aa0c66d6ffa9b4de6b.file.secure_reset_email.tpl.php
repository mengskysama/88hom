<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 22:32:17
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\secure_reset_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2612151efe571a15bf3-64780689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc6c6e3d4a6d78789bf011aa0c66d6ffa9b4de6b' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\secure_reset_email.tpl',
      1 => 1373354868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2612151efe571a15bf3-64780689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
    'errMsg' => 0,
    'oldUserEmail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51efe571b5fac9_42911598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51efe571b5fac9_42911598')) {function content_51efe571b5fac9_42911598($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>安全中心-邮箱</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="javascript" type="text/javascript">
var isemaivalid = false;
jQuery(document).ready(function() {
	$("#userEmail").blur(function() {
        	
		if (val(this) == "") {
			ShowWrong("请输入邮箱地址");
		    isemaivalid = false;
		    return false;
		}
		var filter = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if (!filter.test(val(this))) {
			ShowWrong("请输入正确的邮箱地址");
		    isemaivalid = false;
		    return false;
		}
		if (GetStrLen(val(this)) < 6 || GetStrLen(val(this)) > 40) {
			ShowWrong("邮箱长度错误");
		    isemaivalid = false;
		    return false;
		}
		ajax_email();
    });
    
    $("#btn_confrim").click(function() {
        $("#resetEmailFrm").attr("disabled", true);
    	$("#userEmail").blur();
    	if(isemaivalid){
    		document.getElementById("resetEmailFrm").submit();
    	}
    });
});
        
function ShowWrong(message) {	
	$("#userEmail_tips").html("<span class=\"z6\"></span>" + message);
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
                ShowWrong("该邮箱地址已被用户绑定");
            }
            else {
                isemaivalid = true;
                ShowWrong("");
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
                <form id="resetEmailFrm" name="resetEmailFrm" action="secure_reset_email.php" method="post">
				   <table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td align="middle" colspan="2"><font color="red"><?php echo $_smarty_tpl->tpl_vars['errMsg']->value;?>
</font>
                               </td>
						  </tr>
						  <?php if ($_smarty_tpl->tpl_vars['oldUserEmail']->value!=''){?>
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">原始邮箱：</td>
  							  <td width="450" class="p5 z14"><?php echo $_smarty_tpl->tpl_vars['oldUserEmail']->value;?>
</td>
						  </tr>
						  <?php }?>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">输入新邮箱：</td>
                                 <td width="450" class="grzc_31">
                             	<input id="userEmail" name="userEmail" type="text"  value="" />
                                <span id="userEmail_tips" class="z6"></span>
                               </td>
						</tr>
 						 <tr>
 								   <td height="45" colspan="2">
									<div class="dlmm1" style=" padding-top:50px; padding-bottom:100px;">
                                        	<input name="btn_confrim" type="button" class="denglu1 l" id="btn_confrim" value="确定" />
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