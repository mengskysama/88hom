<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 16:15:33
         compiled from "E:/home/web/88hom/templates\admin\system\systemUser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29430517e259ec9e938-65669581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec93942e0120b00e039b40910b1d6e3263cb1b60' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\systemUser.tpl',
      1 => 1367309729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29430517e259ec9e938-65669581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e259ed14f02_84192551',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userList' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e259ed14f02_84192551')) {function content_517e259ed14f02_84192551($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<div class="title">系统用户管理</div>
</div>
<ul class="list_panel">
	<li><a href="systemUser.php?action=release">添加用户</a> |</li>
</ul>
<div class="title_panel">
	<div class="title">用户列表</div>
</div>

	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">选中</th>
			<th width="15%">用户名</th>
			<th width="15%">用户组</th>
			<th width="45%">E-mail</th>
			<th width="15%">操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tr align="center">
			<td><input type="checkbox"/></td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['userUsername'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['group']['groupName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['userEmail'];?>
</td>
			<td><a href="permissions.php?action=systemUser&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
">权限</a> <a href="#">修改</a> <a href="#">删除</a> </td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php }} ?>