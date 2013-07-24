<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 17:06:32
         compiled from "E:/workspace/projects/88hom/templates\ucenter\get_password_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2231851b2dd7ba7cfc5-54151729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf014d00736ac5ffe361a6a4056cdf483cb11d7' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\get_password_success.tpl',
      1 => 1370676964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2231851b2dd7ba7cfc5-54151729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51b2dd7bbb6fe4_76369187',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'err_code' => 0,
    'pass_channel' => 0,
    'receive_mail' => 0,
    'user_mail_server' => 0,
    'receive_mobile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b2dd7bbb6fe4_76369187')) {function content_51b2dd7bbb6fe4_76369187($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>忘记密码</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="j_bg">
    <div class="jhyj">
        <table width="634" height="300" border="0" cellpadding="0" cellspacing="0">
			<?php if ($_smarty_tpl->tpl_vars['err_code']->value==1){?>
            <tr>
                <td width="272" align="right"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dh.gif" /></td>
                <td width="362"><span class="green">已成功找回密码！</span></td>
            </tr>
			<?php }else{ ?>
            <tr>
                <td width="272" align="right"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/wjmm_03.jpg" /></td>
                <td width="362"><span class="green">找回密码失败，请点击<a class="red" href="get_password.php">这里</a>重新尝试！</span></td>
            </tr>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['err_code']->value==1&&$_smarty_tpl->tpl_vars['pass_channel']->value=='email'){?>
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已把密码发到您的邮箱<a class="red"><?php echo $_smarty_tpl->tpl_vars['receive_mail']->value;?>
</a>。<br>注意：收件箱如若找不到该邮件，请尝试在垃圾邮箱查看</div></td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/btn01.gif" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['user_mail_server']->value;?>
','_blank');"/></td>
            </tr>
			<?php }elseif($_smarty_tpl->tpl_vars['err_code']->value==1&&$_smarty_tpl->tpl_vars['pass_channel']->value=='mobile'){?>
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已把密码发到您的手机<a class="red"><?php echo $_smarty_tpl->tpl_vars['receive_mobile']->value;?>
</a>，请查收。</div></td>
            </tr>
			<?php }?>
        </table>
    </div>
</div>


<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>