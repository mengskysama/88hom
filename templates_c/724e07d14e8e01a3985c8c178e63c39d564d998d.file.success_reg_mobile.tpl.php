<?php /* Smarty version Smarty-3.1.8, created on 2013-07-16 20:33:52
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\success_reg_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1344551e53db0cb8311-07046625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '724e07d14e8e01a3985c8c178e63c39d564d998d' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\success_reg_mobile.tpl',
      1 => 1373286849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1344551e53db0cb8311-07046625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'destURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e53db117b3e8_89265955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e53db117b3e8_89265955')) {function content_51e53db117b3e8_89265955($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>注册成功</title>
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
                <td width="362"><span class="green">恭喜你成功注册为房不剩房用户！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">现在就<a href="<?php echo $_smarty_tpl->tpl_vars['destURL']->value;?>
"><span class="red">登录</span></a>房不剩房</div></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>