<?php /* Smarty version Smarty-3.1.8, created on 2013-05-11 12:30:46
         compiled from "E:/workspace/projects/88hom/templates\ucenter\message_send.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4336518dc9762071e4-45403334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab54820f089f9a4e57f64bf0b0c0269c41b4c2db' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\message_send.tpl',
      1 => 1368246616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4336518dc9762071e4-45403334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518dc97628f615_16668015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518dc97628f615_16668015')) {function content_518dc97628f615_16668015($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>短信息-写信息</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<div class="gr_top">
	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/grzc_03.jpg" />
    <span><a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a></span>
</div>
<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
	  <div class="zl_b1">
	    <div class="zl_nr">
	      <div class="zl_b11">
          <div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="userinfo.php">用户中心</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
	          <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
	        <div class="zl_nr">
	          <div class="zl_l"> <span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font></span>
	            <ul class="zlfl1">
                    <li><a href="message_send.php">写短信息</a></li>
                    <li><a href="message_inbox.php">收件箱</a>
	                <ul class="zlfl2">
                      <li><a href="message_inbox.php?type=s">私信</a></li>
                      <li><a href="message_inbox.php?type=x">系统提醒</a></li>
                      <li><a href="message_inbox.php?type=z">站长公告</a></li>
                    </ul>
                  </li>
                  <li><a href="message_outbox.php">发件箱</a></li>
                </ul>
              </div>
	          <div class="zl_r">
	            <div class="xx_r">
	              <div class="sjbt">
	                <h2 class="sj">写信息</h2>
                  </div>
	              <div class="xxnr1">
                  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 							 <tr>
 							   <td width="80" height="60" align="right" valign="middle" class="z14 " style="font-weight:bolder">收件人：</td>
  							   <td class="grzc_31"><input name="" type="text"  value="" /></td>
 							 </tr>
 							 <tr>
   								 <td width="80" align="right" valign="middle" class="z14 " style="font-weight:bolder">内  容:</td>
    							 <td><textarea class="bdqy" rows="7" cols="100" name=""></textarea></td>
 							 </tr>
 							 <tr>
							     <td width="80" height="60" align="right" valign="middle">&nbsp;</td>
  							   <td><input name="button2" type="submit" class="mddl2" id="button2" value="发送" /></td>
						      </tr>
                               <tr>
							     <td width="80" height="100" align="right" valign="middle">&nbsp;</td>
  							   <td height="100"><p class="z6">说明：<br />
  							     ①可以用英文状态下的逗号将用户名隔开实现群发，最多5个用户<br />
  							     ②每天可发送20条短消息(您今日已发送0条)</p></td>
					      </tr>
						</table>

                  </div>
	              
                </div>
              </div>
            </div>
          </div>
	    </div>
	  </div>
	</div>
</div>
<!--底部-->
<div class="gr_bot">
	<div class="gr_bot1">
		<div class="c">
					<div class="c1">
						<a href="#">今日头条</a>
						<a href="#">楼市要闻</a><br/>
						<a href="#">政策解读</a>
						<a href="#">行情数据</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">最新开盘</a>
						<a href="#">热门楼盘</a><br/>
						<a href="#">优惠团购</a>
						<a href="#">地图看房</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
                    <div class="s"></div>
					<div class="c3">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
					<div class="s"></div>
					<div class="c4">
						<a href="#">业主论坛</a>
						<a href="#">论坛热贴</a><br/>
						<a href="#">人气板块</a>
					</div>
				</div>
             <div class="gr_bot2">
             广告投放：0755-88886666  投诉邮箱：tousu@tianyue.com  投诉电话：400-6666-888<br/>
				版权所有2013-2016 房不剩房 天境文化传播有限公司 备粤10110011号 
             </div>
		</div>
	</div>
</body>
</html>
<?php }} ?>