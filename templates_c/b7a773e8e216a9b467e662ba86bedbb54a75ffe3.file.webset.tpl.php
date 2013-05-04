<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:47:16
         compiled from "E:/home/web/88hom/templates\admin\system\webset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21531517e2584bb49b3-22445644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a773e8e216a9b467e662ba86bedbb54a75ffe3' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\webset.tpl',
      1 => 1365405171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21531517e2584bb49b3-22445644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'webset' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e2584c648a4_92110186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e2584c648a4_92110186')) {function content_517e2584c648a4_92110186($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<div class="title"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=websetRelease" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">网站名称：</td><td colspan="3"><input class="input" type="text" name="webset[siteName]" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['siteName'];?>
"/></td>
		</tr>
		<tr>
			<td width="100">关键字：</td><td colspan="3"><input class="input" type="text" name="webset[keywords]" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['keywords'];?>
"/></td>
		</tr>
		<tr>
			<td width="100">网站描述：</td><td colspan="3"><textarea name="webset[description]" style="width:500px;height: 100px;"><?php echo $_smarty_tpl->tpl_vars['webset']->value['description'];?>
</textarea></td>
		</tr>
		<tr>
			<td width="100">客服热线一：</td><td width="200"><input class="input" type="text" name="webset[serverPhone]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverPhone'];?>
"/></td>
			<td width="100">客服热线二：</td><td><input class="input" type="text" name="webset[serverPhone1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverPhone1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>传真一：</td><td><input class="input" type="text" name="webset[serverFax]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverFax'];?>
"/></td>
			<td>传真二：</td><td><input class="input" type="text" name="webset[serverFax1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverFax1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>移动电话一：</td><td><input class="input" type="text" name="webset[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['mobile'];?>
"/></td>
			<td>移动电话二：</td><td><input class="input" type="text" name="webset[mobile1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['mobile1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>客服QQ一：</td><td><input class="input" type="text" name="webset[serverQicq]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverQicq'];?>
"/></td>
			<td>客服QQ二：</td><td><input class="input" type="text" name="webset[serverQicq1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverQicq1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>客服MSN一：</td><td><input class="input" type="text" name="webset[serverMSN]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverMSN'];?>
"/></td>
			<td>客服MSN二：</td><td><input class="input" type="text" name="webset[serverMSN1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverMSN1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>客服邮箱一：</td><td><input class="input" type="text" name="webset[serverMail]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverMail'];?>
"/></td>
			<td>客服邮箱二：</td><td><input class="input" type="text" name="webset[serverMail1]" value="<?php echo $_smarty_tpl->tpl_vars['webset']->value['serverMail1'];?>
"/></td>
		</tr>
		
		<tr>
			<td>百度统计JS：</td><td colspan="3"><textarea name="webset[baiduCountJs]"><?php echo $_smarty_tpl->tpl_vars['webset']->value['baiduCountJs'];?>
</textarea></td>
		</tr>
		<tr>
			<td>谷歌统计JS：</td><td colspan="3"><textarea name="webset[googleCountJs]"><?php echo $_smarty_tpl->tpl_vars['webset']->value['googleCountJs'];?>
</textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="修改信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php }} ?>