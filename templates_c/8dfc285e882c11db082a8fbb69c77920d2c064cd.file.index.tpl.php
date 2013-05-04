<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:25:38
         compiled from "E:/home/web/88hom/templates\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9952517e1fa34efff2-31125902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dfc285e882c11db082a8fbb69c77920d2c064cd' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\index.tpl',
      1 => 1367220337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9952517e1fa34efff2-31125902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e1fa35151d3_21066571',
  'variables' => 
  array (
    'cfg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e1fa35151d3_21066571')) {function content_517e1fa35151d3_21066571($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title>后台管理系统</title>
</head>
<frameset rows="120,*" cols="*" frameborder="no" border="0" framespacing="0">
  	<frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
	<frameset id="frameset" name="frameset" cols="160,9,*" frameborder="no" border="0" framespacing="0">
	  <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="菜单" />
	  <frame src="split.php" name="splitFrame" scrolling="No" noresize="noresize" id="splitFrame" title="隐藏菜单" />
	  <frame src="fuck.html" name="mainFrame"  noresize="noresize" id="mainFrame" title="mainFrame" scrolling="auto" />
	</frameset>
</frameset>	
<noframes><body>你的浏览器不支持框架，推荐选择IE浏览器并开启浏览器框架支持</body></noframes>
</html><?php }} ?>