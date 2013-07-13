<?php /* Smarty version Smarty-3.1.8, created on 2013-07-13 12:32:25
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_lease.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2609451dbc59f95cc38-57538710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f9b90f042e195ba4371cb2a4508e9c40e01071d' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_lease.tpl',
      1 => 1373363026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2609451dbc59f95cc38-57538710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51dbc59fa21dc1_87136036',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dbc59fa21dc1_87136036')) {function content_51dbc59fa21dc1_87136036($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>我要出售-出租</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--求购头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="qg_r">
   	  <p>你的位置：<a href="#">我要出租</a></p>
    	<div class="qgxq2">
        	<div class="wyqg2">
				<dl>
             		<dt><a href="#"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_img1.jpg" /></a></dt>
              		  <dd>
   					  <b class="title">委托中介网店找房</b>
                      <p>足不出户，委托房源信息，推优中介网店帮您售房租房！高效、免骚扰。</p>
  					  <p style=" margin-top:15px;"><a href="#">去委托</a></p>
  					 </dd>
				</dl>
				<dl>
             		<dt><a href="user_lease_zz.php"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_img2.jpg" /></a></dt>
              		  <dd>
   					  <b class="title">自己直接发布</b>
                      <p>您可以直接发布出售/出租信息，让业主联系您，买房过程，自主掌握。</p>
  					  <p style=" margin-top:15px;"><a href="user_lease_zz.php">去发布</a></p>
  					 </dd>
				</dl>
            </div>
		</div>
             
	</div>
</div>


<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>