<?php /* Smarty version Smarty-3.1.8, created on 2013-07-15 09:52:11
         compiled from "E:/workspace/projects/88hom/templates\ucenter\ucenter_agent_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3149851e355cb368d57-04158787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ea756c634b926fd5f204f8d52bdb2a72db2070e' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\ucenter_agent_header.tpl',
      1 => 1373851191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3149851e355cb368d57-04158787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'userName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e355cb378c51_40674437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e355cb378c51_40674437')) {function content_51e355cb378c51_40674437($_smarty_tpl) {?>
<div class="jjr_tb">
	<div class="qg_tb1">
    	<span class="qgtb">
        	<a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a>
      	</span>
		<div class="jjr_logo">
	         	<div class="jjr_logo1">
	            	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/grzc_03.jpg" width="164" height="92"> 
		</div>
        <div class="jjr2"><font style="font-size:16px; font-weight:bolder"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font> 欢迎你！</div>
            <span><a href="#">查看我的店铺 </a>| <a href="#">管理我的店铺</a>| <a href="#">短消息</a>[<a href="#">0</a>]| <a href="logout.php" class="red">安全退出</a></span>
      	</div>
    </div>
</div><?php }} ?>