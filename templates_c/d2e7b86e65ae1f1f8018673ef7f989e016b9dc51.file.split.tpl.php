<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:24:37
         compiled from "E:/home/web/88hom/templates\admin\split.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7372517e1fa366a8d6-58678572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2e7b86e65ae1f1f8018673ef7f989e016b9dc51' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\split.tpl',
      1 => 1367220275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7372517e1fa366a8d6-58678572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e1fa3733880_02195797',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e1fa3733880_02195797')) {function content_517e1fa3733880_02195797($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title>split</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<script type="text/javascript">
	$(document).ready(function(){
		var flag = true;
		$('#splitAnchor').click(function(){
			if(flag)
			{
				$('#frameset',window.top.document).attr('cols','0,9,*');
				$('#splitAnchor').attr('title','显示菜单');
				$('#splitAnchor').attr('src','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/expand.gif');
				flag = false;
			}
			else
			{
				$('#frameset',window.top.document).attr('cols','160,9,*');
				$('#splitAnchor').attr('title','隐藏菜单');
				$('#splitAnchor').attr('src','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/unexpand.gif');
				flag = true;
			}
		});
	});
</script>
</head>
<body style="overflow:hidden;margin:0px;padding:0px;text-align:left;" >
  <table width="10" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/x.gif);background-repeat:repeat-y;" width="10" valign="middle" class="bian1"><img  title="隐藏菜单" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/unexpand.gif"  id="splitAnchor"  style="cursor:pointer" /></td>
  </tr>
  </table>
</body>
</html>
<?php }} ?>