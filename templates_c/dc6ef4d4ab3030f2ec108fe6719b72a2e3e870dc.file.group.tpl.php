<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 16:54:42
         compiled from "E:/home/web/88hom/templates\admin\system\group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7722517e257eebb4a4-89673028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc6ef4d4ab3030f2ec108fe6719b72a2e3e870dc' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\group.tpl',
      1 => 1367312060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7722517e257eebb4a4-89673028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e257f01b204_40412133',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'typeTitle' => 0,
    'action' => 0,
    'id' => 0,
    'groupDetail' => 0,
    'groupList' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e257f01b204_40412133')) {function content_517e257f01b204_40412133($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<div class="title"><?php echo $_smarty_tpl->tpl_vars['typeTitle']->value;?>
管理组别</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" method="post">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">名称：</td><td><input class="input" type="text" id="groupName" name="groupName" value="<?php if ($_smarty_tpl->tpl_vars['groupDetail']->value!=''&&$_smarty_tpl->tpl_vars['groupDetail']->value['groupName']!=''){?><?php echo $_smarty_tpl->tpl_vars['groupDetail']->value['groupName'];?>
<?php }?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="button" onclick="exeAdminGroupRelease();" value="<?php echo $_smarty_tpl->tpl_vars['typeTitle']->value;?>
管理组别"/>&nbsp;<?php if ($_smarty_tpl->tpl_vars['id']->value!=''){?><input type="button" onclick="location.replace('group.php');" value="取消"/><?php }?></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title">管理组别列表</div>
</div>
<form name="listForm" action="action.php?action=groupDel" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="5%">ID</th>
			<th width="70%">名称</th>
			<th width="20%">操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groupList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"/></td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupId'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupName'];?>
</td>
			<td><a href="group.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupId'];?>
">修改</a> <a href="permissions.php?action=group&gid=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupId'];?>
">权限</a></td>
		</tr>
		<?php } ?>
	</table>
</form>
</body>
</html>
<?php }} ?>