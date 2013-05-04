<?php /* Smarty version Smarty-3.1.8, created on 2013-04-24 23:33:09
         compiled from "E:/home/web/88hom/templates\admin\ad\type_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:933251777fb3b3f9d1-17995219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c5e9386251dddf7870931adcd75703e77d5d9de' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\ad\\type_add.tpl',
      1 => 1366817577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '933251777fb3b3f9d1-17995219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51777fb3b697b0_98043172',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51777fb3b697b0_98043172')) {function content_51777fb3b697b0_98043172($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		$('#bnt').click(function(){
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='type_manager.php';
		});
	});
	function check(){
		if($('input[name="adtypeName"]').val()=='')
		{
			alert('请输入类别名称！');
			$('input[name="adtypeName"]').focus();
			return false;
		}
		if($('input[name="adtypeKey"]').val()=='')
		{
			alert('请输入类别码！');
			$('input[name="adtypeKey"]').focus();
			return false;
		}
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告类别添加</div>
</div>
	<form method="post" action="type_manager.php?action=doAdd">
	<table cellspacing="0" cellpadding="0" >
		<tr ><td>类别名称：</td><td><input class="input" type="text" name="adtypeName"/></td></tr>
		<tr ><td>类别码：</td><td><input class="input" type="text" name="adtypeKey"/></td></tr>
		<tr ><td>是否开启：</td><td><input type="radio" name="adtypeState" checked="checked" value="1"/>是 <input type="radio" name="adtypeState" value="-1"/>否</td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
<?php }} ?>