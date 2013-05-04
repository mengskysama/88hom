<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 16:41:44
         compiled from "E:/home/web/88hom/templates\admin\system\systemUserRelease.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24955517f79feddc473-50717862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd43ef6a50b07c14ebbca9ecf006659d5ae6d60b0' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\systemUserRelease.tpl',
      1 => 1367311294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24955517f79feddc473-50717862',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517f79fee57790_75442242',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'group' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517f79fee57790_75442242')) {function content_517f79fee57790_75442242($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=systemUserRelease" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">用户名：</td><td><input class="input" type="text" id="username" name="username"/></td>
		</tr>
		<tr>
			<td>密码：</td><td><input class="input" type="password"" id="pwd" name="pwd"/></td>
		</tr>
		<tr>
			<td>确认密码：</td><td><input class="input" type="password" id="password" name="password"/></td>
		</tr>
		<tr>
			<td>邮箱：</td><td><input class="input" type="text" id="email" name="email"/></td>
		</tr>
		<tr>
			<td>分配权限组：</td>
			<td>
				<select id="groupId" name="groupId">
					<option value="">请选择权限组</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['groupId'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['groupName'];?>
</option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminSystemUserRelease();" value="发布信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php }} ?>