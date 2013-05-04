<?php /* Smarty version Smarty-3.1.8, created on 2013-05-03 18:12:54
         compiled from "E:/workspace/projects/88hom/templates\ucenter\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45625183520f67df85-16661246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c97d3cc2295094cdb70d8a4f1a3e22bf84c36bfa' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\index.tpl',
      1 => 1367575971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45625183520f67df85-16661246',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5183520f727662_50681936',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userTagClass' => 0,
    'agentTagClass' => 0,
    'shopTagClass' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183520f727662_50681936')) {function content_5183520f727662_50681936($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>登录页面</title>

<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<div class="top">
    <a href="#" class="logo1"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/logo.jpg"></a>
    <span class="headerNav">
    <a href="#">加入收藏</a> | <a href="#">设为首页</a> | <a href="#">官方微博</a><a href="#">&nbsp;&nbsp;登录注册</a>
    </span>
</div>
<!--中间登录部分-->
<div class="con">
	<!--banner图-->
	<div class="lcon">
   		<!--登录部分-->
    	<div class="dl">
        	 <div class="dl_1">
             	<ul>
                	<li><a href="index.php" <?php echo $_smarty_tpl->tpl_vars['userTagClass']->value;?>
>个人登陆</a></li>
                    <li><a href="index.php?userType=2" <?php echo $_smarty_tpl->tpl_vars['agentTagClass']->value;?>
>经纪人登陆</a></li>
                    <li><a href="index.php?userType=1" <?php echo $_smarty_tpl->tpl_vars['shopTagClass']->value;?>
>门店登陆</a></li>
                </ul>
             </div>
         <div class="dlnr">
       	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
 		   <tr>
   				 <td width="73" height="40" align="center" valign="middle" class="logo_4">账 户：</td>
   				 <td width="73" class="logo_31"><input name="" type="text"  value="手机号/邮箱/用户名码" /></td>
 		   </tr>
 		   <tr>
 			     <td width="73" height="40" align="center" valign="middle" class="logo_4">密 码：</td>
   				 <td width="73" class="logo_31"><input name="" type="text" value="密码" /></td>
 		   </tr>
 		   <tr>
   			 	 <td height="40" colspan="2" align="center" valign="middle">
                 <div class="jz"><input name="" type="checkbox" value="" class="message_t01" /><span class="message_t02">记住登录状态</span></div></td>
 	       </tr>
           <tr>
  			     <td height="40" colspan="2" valign="middle">
  		    	 <div class="dlmm"><input name="button2" type="submit" class="denglu" id="button2" value="登  录" />
     			<a href="#" class="wj f14">忘记密码？</a></div></td>
          </tr>
	      </table>
	<div class="load_b f14">
		<p>您还没有注册为<font class="red">房不剩房</font>用户？</p>
        <div class="zc">
        	<div class="zc_l">
        	  <input name="button" type="submit" class="zc2 b b0" id="button" value="注册" />
        	</div>
             <div class="zc_r">
        <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dl2.jpg"></a>
        <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dl3.jpg"></a>
        	</div>
        </div>
	</div>
         </div>
        </div>
    S</div>
</div>
<!--底部-->
<div class="bottom">
    	<span class="bot_l">@2013 <font color="#a0141a">房不剩房</font> 天境文化传播有限公司 <br />粤ICP证编号 B2-20130308 | 技术支持：<a href="#">城旭网络</a></span>
        <span class="bot_r"><a href="#">新房</a> | <a href="#">二手房</a> | <a href="#">家居</a> | <a href="#">社区</a> | <a href="#">关于我们</a> | <a href="#">法律条款</a> | <a href="#">广告投放</a> | <a href="#">网站地图</a><br />投诉电话：400-8888-666</span>
    </div>
</body>
</html>
<?php }} ?>