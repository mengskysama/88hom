<?php /* Smarty version Smarty-3.1.8, created on 2013-04-24 23:32:36
         compiled from "E:/home/web/88hom/templates\admin\ad\type_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14172517651151454f1-87354472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dc33280028c2e20ee59e8040714588d39bbae13' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\ad\\type_list.tpl',
      1 => 1366812749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14172517651151454f1-87354472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5176511520ade9_46294845',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'adTypeList' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5176511520ade9_46294845')) {function content_5176511520ade9_46294845($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\home\\web\\88hom\\common\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	function del(id){
		if(confirm('类别所属的广告及其文件将被一起删除，确认真的要删除吗？'))
			location.href='type_manager.php?action=delete&id='+id;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告类别列表</div><div class="title"><a href="type_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="25%">名称</th>
			<th width="10%">类别码</th>
			<th width="10%">开启</th>
			<th width="15%">创建时间</th>
			<th width="15%">更新时间</th>
			<th width="15%">操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
		<tr align="center">
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeKey'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['adtypeState']==1){?>是<?php }else{ ?>否<?php }?></td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['adtypeCreateTime'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['adtypeUpdateTime'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><a href="type_manager.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeId'];?>
">修改</a> <a href="javascript:del(<?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeId'];?>
)">删除</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php }} ?>