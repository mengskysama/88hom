<?php /* Smarty version Smarty-3.1.8, created on 2013-07-09 21:54:52
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\ucenter_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22515189027e77ae28-05339564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d831e0083505f318ba26897caa29e1593be42f8' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\ucenter_user.tpl',
      1 => 1373378031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22515189027e77ae28-05339564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5189027e7f43d1_00931818',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userdetailPic' => 0,
    'userName' => 0,
    'userGender' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5189027e7f43d1_00931818')) {function content_5189027e7f43d1_00931818($_smarty_tpl) {?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>进入页</title>
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
    	<p>你的位置： 我的房不剩房</p>
        <div class="qgxq2">
        	<div class="zltx">
            	<div class="jr_l">
				<?php if ($_smarty_tpl->tpl_vars['userdetailPic']->value!=''){?>
    				<img src="../uploads/agent/<?php echo $_smarty_tpl->tpl_vars['userdetailPic']->value;?>
" style="padding-bottom:5px; height:128px; margin-left:-10px;">
    			<?php }else{ ?>
                	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_03.jpg" class="l">
				<?php }?>
                    <span class="l"><a href="userinfo.php"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_11.jpg">修改个人资料</a></span>
                 </div>
                <div class="jr_r">
                	<p class="jr_r1"><b><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</b><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_06.jpg" align="middle" class="l"><b>性别：<?php echo $_smarty_tpl->tpl_vars['userGender']->value;?>
</b></p>
                    <p class="jr_r2"><b>买房：</b>找房条件（<a href="#">0</a>） 选房单（<a href="#">1</a>）浏览过房源（<a href="#">1</a>）</p>
                <p class="jr_r2"><b>租房：</b>找房条件（<a href="#">0</a>） 选房单（<a href="#">1</a>）浏览过房源（<a href="#">1</a>）</p>
                 <p class="jr_r2">论坛（<a href="#">0</a>） 帖子（<a href="#">0</a>）</p>
              </div>
              <div class="jr_c">
              		<span>
                    	<b>找新房</b>
                  		<p><a href="#">最新开盘</a>  <a href="#">热门开盘</a>  <a href="#">优惠团房</a>  <a href="#">地图看房</a>  <a href="#">商业地产</a>  <a href="#">购房工具</a>  <a href="#">视频看房</a></p>
                    </span>  
                    <span>
                    	<b>找二手房</b>
                   		<p><a href="#">快速找房</a>  <a href="#">房不剩房网营</a>  <a href="#">特价二手房</a>  <a href="#">热门小区</a>  <a h#>精品房源</a>  <a href="#">购房工具</a>  <a href="#">视频看房</a></p>
                    </span>
                    <span>
                    	<b>找租房</b>
                   		<p><a href="#">快速找房</a>  <a href="#">信得过经纪人</a>  <a href="#">短租房</a> </p>
                    </span>
              </div>
            </div>
            <div class="zltx1">
            <div class="zltx0">
            	<ul>
                	<li><a href="#">我的新房楼盘选房单(1)</a></li>
                    <li><a href="#">我的新房房源选房单(0)</a></li>
                    <li><a href="#">我的新房楼盘选房单(1)</a></li>
                    <li><a href="#">我的租房选房单(0)</a></li>              
                </ul>
                 <span class="r"><a href="#">更多>></a></span>
                </div>
                <div class="zltx2">
               	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150" height="120" align="center" valign="middle" style="border-bottom:1px dotted #dddddd"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/test/jry_29.jpg" width="120"></td>
    <td width="430" align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
    	<b>信义御城 [住宅]</b>
        <p class="z6">龙岗地铁三号线横岗站B出口<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_25.jpg"><a href="#">查看地图</a></p>
        <p>业主论坛(<a href="#">10407</a>) 团购人数(<a href="#">121</a>) 户型图(<a href="#">10</a>) 房源(<a href="#">1056</a>)</p>
    </td>
    <td align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
		<p>均价 <font class="qd">17000</font> 元/平方米</p>    
        <br />
        <p><font class="red">400-890-0000</font> 转 <font class="red">13678</font></p>
    </td>
  </tr>
  <tr>
   <td width="150" height="120" align="center" valign="middle" style="border-bottom:1px dotted #dddddd"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/test/jry_22.jpg" width="120"></td>
    <td width="430" align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
    	<b>信义御城 [住宅]</b>
        <p class="z6">龙岗地铁三号线横岗站B出口<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_25.jpg"><a href="#">查看地图</a></p>
        <p>业主论坛(<a href="#">10407</a>) 团购人数(<a href="#">121</a>) 户型图(<a href="#">10</a>) 房源(<a href="#">1056</a>)</p>
    </td>
    <td align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
		<p>均价 <font class="qd">17000</font> 元/平方米</p>    
        <br />
        <p><font class="red">400-890-0000</font> 转 <font class="red">13678</font></p>
    </td>
  </tr>
</table>

              </div>
            </div>
            <div class="zltx1">
            <div class="zltx0">
            	<ul>
                	<li><a href="#">我浏览过的新房楼盘(1)</a></li>
                    <li><a href="#">我浏览过的新房房源(0)</a></li>
                    <li><a href="#">我浏览过的二手房(1)</a></li>
                    <li><a href="#">我浏览过的租房(0)</a></li>
                </ul>
               <span class="r"><a href="#">更多>></a></span>
                </div>
                <div class="zltx2">
               	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150" height="120" align="center" valign="middle" style="border-bottom:1px dotted #dddddd"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/test/jry_31.jpg" width="120"></td>
    <td width="430" align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
    	<b>信义御城 [住宅]</b>
        <p class="z6">龙岗地铁三号线横岗站B出口<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/jry_25.jpg"><a href="#">查看地图</a></p>
        <p>业主论坛(<a href="#">10407</a>) 团购人数(<a href="#">121</a>) 户型图(<a href="#">10</a>) 房源(<a href="#">1056</a>)</p>
    </td>
    <td align="left" valign="middle" style="border-bottom:1px dotted #dddddd">
		<p>均价 <font class="qd">17000</font> 元/平方米</p>    
        <br />
        <p><font class="red">400-890-0000</font> 转 <font class="red">13678</font></p>
    </td>
  </tr>
</table>

              </div>
            </div>
            <div class="zltx1">
            <div class="zltx0">
            	<ul>
                	<li><a href="#">我的论坛最新的帖子(5)</a></li>
                </ul>
                <span class="r"><a href="#">更多>></a></span>
                </div>
<div class="zltx3">
                	<p>[<font class="red">业主论坛</font>]<a href="#"> 莫道无捷足，何处不通达-小拍一组</a><font class="z6"> _2013-04-01</font></p>
            <p>[<font class="red">二 手 房</font>]<a href="#">  【蜂鸟官方活动花絮】2013年3月30日（周六，下 </a><font class="z6"> _2013-04-01</font></p>
            <p>[<font class="red">新 房</font>]<a href="#"> 北京屐痕（一）玉渊潭早春 2013年3月23日</a><font class="z6"> _2013-04-01</font></p>
<p>[<font class="red">业主论坛</font>]<a href="#"> 莫道无捷足，何处不通达-小拍一组</a><font class="z6"> _2013-04-01</font></p>
                </div>
            </div>
        </div>
             
        </div>
    </div>

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>