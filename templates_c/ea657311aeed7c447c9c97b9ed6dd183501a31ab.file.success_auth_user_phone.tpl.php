<?php /* Smarty version Smarty-3.1.8, created on 2013-07-13 13:13:09
         compiled from "E:/workspace/projects/88hom/templates\ucenter\success_auth_user_phone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1616651e0e19e57a429-43824388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea657311aeed7c447c9c97b9ed6dd183501a31ab' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\success_auth_user_phone.tpl',
      1 => 1373692386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1616651e0e19e57a429-43824388',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e0e19e68e5c0_65371684',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e0e19e68e5c0_65371684')) {function content_51e0e19e68e5c0_65371684($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>认证成功</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="j_bg">
    <div class="jhyj">
        <table width="634" height="300" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="272" align="right"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dh.gif" /></td>
                <td width="362"><span class="green">恭喜你认证成功！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">现在就去发布<a href="user_sale.php"><font color="red">出售房源</font></a>或者<a href="user_lease.php"><font color="red">出租房源</font></a></div></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>