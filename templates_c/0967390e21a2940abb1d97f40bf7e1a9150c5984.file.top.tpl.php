<?php /* Smarty version Smarty-3.1.8, created on 2013-04-30 15:12:43
         compiled from "E:/home/web/88hom/templates\admin\top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32153517e1fa38365c2-54341599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0967390e21a2940abb1d97f40bf7e1a9150c5984' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\top.tpl',
      1 => 1367221811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32153517e1fa38365c2-54341599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e1fa3966eb9_12010476',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'menus' => 0,
    'key' => 0,
    'item' => 0,
    'bgads' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e1fa3966eb9_12010476')) {function content_517e1fa3966eb9_12010476($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title>top</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="javascript">
function fnOnTabClick(tab){
    $(".menu li").removeClass("current");
    $(tab).parent().addClass("current");
}
</script>
</head>
<body>
	<div class="top_bg">
	</div>
	<div class="top_content">
		<div class="logo">
			<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/logo.gif"/>
		</div>
		<div class="info">
			<div class="k"><label>欢迎您：<?php echo $_SESSION['Admin_User']['userUsername'];?>
</label></div>
			<div><a href="index.php?action=loginOut" target="_parent">安全退出</a></div>
		</div>
		<ul class="menu">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['toptab']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['toptab']['index']++;
?>
			<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['toptab']['index']==0){?>current<?php }?>"><a href="left.php?tab=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" onclick="fnOnTabClick(this);" target="leftFrame"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a></li>
			<?php } ?>
		</ul>
		<div class="info1">
			<span><a class="k" href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
" target="_parent">网站首页</a><a href="javascript:void(0);">客服中心</a></span>
		</div>
	</div>
	<div class="top_info">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bgads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" target="_parent"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
		<?php } ?>
	</div>
</body>
</html>
<?php }} ?>