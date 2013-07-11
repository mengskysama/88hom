<?php /* Smarty version Smarty-3.1.8, created on 2013-07-11 14:29:37
         compiled from "E:/workspace/projects/88hom/templates\admin\ad\ad_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3229351de50d1e10279-38094510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed79a5e092dd60986a28bda9473a54e78dc9a722' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\admin\\ad\\ad_list.tpl',
      1 => 1373204048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3229351de50d1e10279-38094510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'adList' => 0,
    'item' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51de50d20a7e67_97490740',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de50d20a7e67_97490740')) {function content_51de50d20a7e67_97490740($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\workspace\\projects\\88hom\\common\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
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
		if(confirm('确认真的要删除吗？'))
			location.href='ad_manager.php?action=delete&id='+id;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告列表</div><div class="title"><a href="ad_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">标题</th>
			<th width="5%">类别</th>
			<th width="15%">链接</th>
			<th width="25%">图像</th>
			<th width="5%">位置</th>
			<th width="10%">说明</th>
			<th width="5%">宽度</th>
			<th width="5%">高度</th>
			<th width="5%">开启</th>
			<th width="10%">更新时间</th>
			<th width="5%">操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
		<tr align="center">
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adTitle'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adUrl'];?>
</td>
			<td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['adtypeKey']=="pic"){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['adPic'];?>
" width="270"/>
			<?php }elseif($_smarty_tpl->tpl_vars['item']->value['adtypeKey']=="swf"){?>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="270" height="50">
					<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['adFiles'];?>
" />
					<param name="wmode" value="transparent" />
					<param name="quality" value="high" />
					<embed wmode="transparent" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['adFiles'];?>
" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  height="50" width="270"></embed>
				</object>
			<?php }else{ ?>
				文本链接
			<?php }?>
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adSite'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['adSiteDesc'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['height'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['adState']==1){?>是<?php }else{ ?>否<?php }?></td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['adUpdateTime'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><a href="ad_manager.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['adId'];?>
">修改</a> <a href="javascript:del(<?php echo $_smarty_tpl->tpl_vars['item']->value['adId'];?>
)">删除</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php }} ?>