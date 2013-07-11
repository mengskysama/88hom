<?php /* Smarty version Smarty-3.1.8, created on 2013-07-11 10:50:37
         compiled from "E:/workspace/projects/88hom/templates\admin\split.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1123851de1b9938b610-00332341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8a070c915a62093e0f4974b631e8d6512785631' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\admin\\split.tpl',
      1 => 1373204048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1123851de1b9938b610-00332341',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51de1b9945ed23_69943757',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de1b9945ed23_69943757')) {function content_51de1b9945ed23_69943757($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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