<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:22:11
         compiled from "E:/home/web/88hom/templates\admin\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19417517e1fa3a47136-99778597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c9041903078f4cf6982a080de1e1c8ada71199' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\left.tpl',
      1 => 1365388306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19417517e1fa3a47136-99778597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'menus' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e1fa3b109e0_27117380',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e1fa3b109e0_27117380')) {function content_517e1fa3b109e0_27117380($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title>left</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="javascript">
function fnOnMenuClick(menu){
    $(".left_menu li").removeClass("current");
    $(menu).parent().addClass("current");
}
</script>
</head>
<body>
<ul class="left_menu">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['index']++;
?>
<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['submenu']['index']==0){?>current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" onclick="fnOnMenuClick(this);" target="mainFrame"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a></li>
<?php } ?>
</ul>
<div class="left_info">
	Copyright &copy;2011
	<a href="http://web.seo7788.com">SEO7788</a> All rights reserved.
</div>
</body>
</html>
<?php }} ?>