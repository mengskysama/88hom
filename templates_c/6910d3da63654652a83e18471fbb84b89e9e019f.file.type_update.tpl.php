<?php /* Smarty version Smarty-3.1.8, created on 2013-04-24 18:14:34
         compiled from "E:/home/web/88hom/templates\admin\ad\type_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116585177a1878a4b65-48021540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6910d3da63654652a83e18471fbb84b89e9e019f' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\ad\\type_update.tpl',
      1 => 1366798435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116585177a1878a4b65-48021540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5177a1878fa468_69779310',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'adType' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5177a1878fa468_69779310')) {function content_5177a1878fa468_69779310($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<div class="title">广告类别修改</div>
</div>
	<form method="post" action="type_manager.php?action=doUpdate">
		<input type="hidden" name="adtypeId" value="<?php echo $_smarty_tpl->tpl_vars['adType']->value['adtypeId'];?>
"/>
	<table cellspacing="0" cellpadding="0" >
		<tr ><td>类别名称：</td><td><input type="text" name="adtypeName" value="<?php echo $_smarty_tpl->tpl_vars['adType']->value['adtypeName'];?>
"/></td></tr>
		<tr ><td>类别码：</td><td><input type="text" name="adtypeKey" value="<?php echo $_smarty_tpl->tpl_vars['adType']->value['adtypeKey'];?>
"/></td></tr>
		<tr ><td>是否开启：</td><td>
		<?php if ($_smarty_tpl->tpl_vars['adType']->value['adtypeState']==1){?>
		<input type="radio" name="adtypeState" checked="checked" value="1"/>是  <input type="radio" name="adtypeState" value="-1"/>否
		<?php }else{ ?>
		<input type="radio" name="adtypeState" value="1"/>是  <input type="radio" name="adtypeState"  checked="checked" value="-1"/>否
		<?php }?>
		</td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
<?php }} ?>