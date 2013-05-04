<?php /* Smarty version Smarty-3.1.8, created on 2013-04-23 15:40:07
         compiled from "E:/home/web/88hom/templates\admin\ad\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1583351763ad7eb0c69-23521074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b9cf4db5d40fcb1bc382b257da4ca42090498b0' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\ad\\list.tpl',
      1 => 1365388306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1583351763ad7eb0c69-23521074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'adTypeList' => 0,
    'item' => 0,
    'typeId' => 0,
    'adList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51763ad804f028_43032439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51763ad804f028_43032439')) {function content_51763ad804f028_43032439($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\home\\web\\88hom\\common\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
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

</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告类别</div>
</div>
<ul class="list_panel">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<li><a href="list.php?typeId=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> |</li>
	<?php } ?>
</ul>
<!--  
<div class="title_panel">
	<div class="title">信息查询</div>
</div>

<div class="search_panel">
	<input class="input" type="text" value="请输入关键字"/>&nbsp;<input type="button" value="查询"/>
</div>
-->
<div class="title_panel">
	<div class="title">广告列表</div>
</div>
<form name="listForm" action="action.php?action=del&typeId=<?php echo $_smarty_tpl->tpl_vars['typeId']->value;?>
" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="5%">排序</th>
			<th width="10%">广告名称</th>
			<th width="10%">广告类别</th>
			<th width="5%">广告尺寸</th>
			<th width="15%">广告地址</th>
			<th width="10%">广告图片</th>
			<th width="5%">发布时间</th>
			<th width="5%">修改时间</th>
			<th width="10%">操作</th>
			<th width="5%">状态</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"/></td>
			<td><input class="input1" type="text" name="layer[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['layer'];?>
"/></td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type']['name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type']['size'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
</td>
			<td><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['path_thumb'];?>
" height="50px;"/></td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['create_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['update_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['state']==1){?><a href="action.php?action=changeState&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&state=0">屏蔽</a><?php }else{ ?><a href="action.php?action=changeState&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&state=1">发布</a><?php }?> <a href="modify.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">删除</a> </td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['state']==1){?><font color="green">发布</font><?php }else{ ?><font color="red">屏蔽</font><?php }?></td>
		</tr>
		<?php } ?>
	</table>
	<?php if ($_smarty_tpl->tpl_vars['adList']->value!=null){?>
	<div style="float:left;margin-top:5px;">
			<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">全选</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">取消</a> <input type="button" value="排序" onclick="listForm.action='action.php?action=order&typeId=<?php echo $_smarty_tpl->tpl_vars['typeId']->value;?>
';listForm.submit();"/>&nbsp;<input type="button" value="删除" onclick="if(confirm('你确认删除选中的条目？')){listForm.submit();}"/>
	</div>
	<?php }?>
</form>
</body>
</html>
<?php }} ?>