<?php /* Smarty version Smarty-3.1.8, created on 2013-07-19 16:24:48
         compiled from "E:/workspace/projects/88hom/templates\ucenter\prop_input_exceed_limit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3054351e8f7d0462ba2-11435600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3efdf45566189b36c33e1e042701bd93a3aabaa9' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\prop_input_exceed_limit.tpl',
      1 => 1374220120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3054351e8f7d0462ba2-11435600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e8f7d04f5e81_89442525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f7d04f5e81_89442525')) {function content_51e8f7d04f5e81_89442525($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>录入房源失败</title>
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
ucenter/icon_failed.gif" /></td>
                <td width="362"><span class="red">抱歉！您不能再发布房源！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">您已发布的房源总数已经到达最大限额，如有问题请联系客服。<br>
                	<a href="http://www.88hom.com"><span class="red">返回</span></a>房不剩房</div></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>