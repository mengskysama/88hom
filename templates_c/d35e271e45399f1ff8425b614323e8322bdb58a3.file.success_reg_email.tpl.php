<?php /* Smarty version Smarty-3.1.8, created on 2013-06-17 17:08:49
         compiled from "E:/workspace/projects/88hom/templates\ucenter\success_reg_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2017551bed1939f58f5-62616835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd35e271e45399f1ff8425b614323e8322bdb58a3' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\success_reg_email.tpl',
      1 => 1371460100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2017551bed1939f58f5-62616835',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51bed193d9a6e1_68491844',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'target_email' => 0,
    'mail_server' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bed193d9a6e1_68491844')) {function content_51bed193d9a6e1_68491844($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>注册成功</title>
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
            <tr>
                <td width="272" align="right"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dh.gif" /></td>
                <td width="362"><span class="green">已成功发送激活邮件！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已向您的邮箱<a class="red"><?php echo $_smarty_tpl->tpl_vars['target_email']->value;?>
</a>发送了一封账号激活邮件，48小时内有效，<br>点击激活邮箱里的链接就可以登录房不剩房网营了。<br>注意：收件箱如若找不到激活邮件，请尝试在垃圾邮箱查看</div></td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['mail_server']->value;?>
"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/btn01.gif" /></a></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>