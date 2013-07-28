<?php /* Smarty version Smarty-3.1.8, created on 2013-07-28 22:05:02
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\ucenter_agent_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1645151e21c08a6ed74-40307337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74b0d9dc6a01da5e8b1e10dd5675a231a2405b77' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\ucenter_agent_header.tpl',
      1 => 1373851190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645151e21c08a6ed74-40307337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e21c08a7b533_37721733',
  'variables' => 
  array (
    'cfg' => 0,
    'userName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e21c08a7b533_37721733')) {function content_51e21c08a7b533_37721733($_smarty_tpl) {?>
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