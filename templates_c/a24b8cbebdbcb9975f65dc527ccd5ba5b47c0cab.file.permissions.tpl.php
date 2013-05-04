<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 16:15:38
         compiled from "E:/home/web/88hom/templates\admin\system\permissions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26948517f7daaa6ebe1-71470443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a24b8cbebdbcb9975f65dc527ccd5ba5b47c0cab' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\permissions.tpl',
      1 => 1365405171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26948517f7daaa6ebe1-71470443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'action' => 0,
    'id' => 0,
    'gid' => 0,
    'permissions' => 0,
    'item' => 0,
    'item1' => 0,
    'key1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517f7daaaf4ef9_16365195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517f7daaaf4ef9_16365195')) {function content_517f7daaaf4ef9_16365195($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<div class="title">系统权限分配</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
PermissionsRelease" method="post">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
	<input type="hidden" name="gid" value="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
"/>
	<table cellspacing="0" cellpadding="0" >
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['permissions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td></tr>
			<?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['item1']->key;
?>
				<tr><td>&nbsp;&nbsp;<input <?php if ($_smarty_tpl->tpl_vars['item1']->value['state']==1){?>checked="checked"<?php }?> type="checkbox" name="admin[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
]" value="1"/><?php echo $_smarty_tpl->tpl_vars['item1']->value['name'];?>
</td></tr>
			<?php } ?>
		<?php } ?>
		<tr><td><input type="submit" value="保存"/></td></tr>
	</table>
</form>
</body>
</html>
<?php }} ?>