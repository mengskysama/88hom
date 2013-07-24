<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 22:12:39
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\secure_reset_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2138551efe0d725fff9-07429586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b62b2e141659dced2359c24214bdbd5bd7b972' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\secure_reset_password.tpl',
      1 => 1373354882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2138551efe0d725fff9-07429586',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51efe0d7352cc7_68540495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51efe0d7352cc7_68540495')) {function content_51efe0d7352cc7_68540495($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>安全中心</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

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
                <form name="secure_reset_pwd_form" action="secure_reset_password.php" method="post" onsubmit="return checkform(this);">
						<table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td align="middle" colspan="2"><font color="red"><?php echo $_smarty_tpl->tpl_vars['errMsg']->value;?>
</font>
                               </td>
						  </tr>
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">输入旧密码：</td>
  							  <td width="450" class="grzc_31">
                             	<input id="oldpass" name="oldpass" type="password"  value="" />
                             	<span id="soldpass"></span>
                               </td>
						  </tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">输入新密码：</td>
 						     <td width="450" class="grzc_31">
                             	<input id="newpass" name="newpass" type="password"  value="" />
                                <span id="snewpass" class="z6">6-16个字符,区分大小写</span>
                               </td>
						</tr>
 						 <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">确认新密码：</td>
  						     <td width="450" class="grzc_31">
                             	<input id="newpass1" name="newpass1" type="password"  value="" />
                                <span id="snewpass1" class="z6">再次输入新密码</span>
                               </td>
	  			        </tr>
 						 <tr>
 								   <td height="45" colspan="2">
									<div class="dlmm1" style=" padding-top:50px; padding-bottom:100px;">
                                        	<input name="btn_confirm_reset" type="submit" class="denglu1 l" id="button2" value="确定" />
                                            <input name="btn_reset" type="reset" class="denglu1 l" id="button2" value="重置" />
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