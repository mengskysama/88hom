<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:47:38
         compiled from "E:/home/web/88hom/templates\admin\system\editpwd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21393517e259a349ed0-31813662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67ca6380db511c812523c81b554738eb281ce319' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\editpwd.tpl',
      1 => 1365405171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21393517e259a349ed0-31813662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e259a39b2f5_27041337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e259a39b2f5_27041337')) {function content_517e259a39b2f5_27041337($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">修改密码</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=editpwd" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">原始密码：</td><td><input type="password" class="input" id="pwdOld" name="pwdOld"/></td>
		</tr>
		<tr>
			<td>新密码：</td><td><input type="password" class="input" id="pwdNew" name="pwdNew"/></td>
		</tr>
		<tr>
			<td>确认密码：</td><td><input type="password" class="input" id="pwdNewTwo" name="pwdNewTwo"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminSystemUserPwd();" value="提交"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php }} ?>