<?php /* Smarty version Smarty-3.1.8, created on 2013-07-28 15:00:11
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187565183ceffcb09a2-61316980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dbd38769ea73e1e17f9b6c9fa2ee217bebe6a70' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_register.tpl',
      1 => 1374994745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187565183ceffcb09a2-61316980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5183ceffd33847_89850073',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183ceffd33847_89850073')) {function content_5183ceffd33847_89850073($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人注册页面</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<form id="userRegForm" action="register.php" method="post">
<input type="hidden" name="userType" value="3">
<div class="gr_zj">
	<div class="gr_b">
    	<div class="gr_dl">
<ul class="dlqh">
            	<li class="sjzc"><a href="user_register.php">手机号码注册</a></li>
                <li class="yxzc"><a href="email_register.php">电子邮箱注册</a></li>
            </ul>
             <div class="other" id="div_err_msg">
               <div class="">
               </div>
             </div>
            <div class="sjzc1">
            	<div class="sjzc1_yz" id="div_mathcode" style="display: none;">
               	  <table width="180" height="58" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="85"><img src='<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_code_line'];?>
' id='imgcode' name='imgcode'  onClick="this.src=this.src+'?op=login&'+Math.random()" style='cursor:pointer;'></td>
                            <td width="47"><input type="text" value="" maxlength="4" class="yz_input" id="txt_mathcode" /></td>
                            <td width="44"><image id="btn_mathcode" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qd.jpg"></td>
                        </tr>
                        <tr>
                            <td><span class="blue"><a href="javascript:void(0);" onclick="refresh_code();">换一题</a></span></td>
                            <td colspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/yz_bq.gif" style="vertical-align:middle;"> 请输入答案</td>
                        </tr>
                    </table>
                </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
  						  <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>账户：</td>
  						  <td height="30" class="grzc_31">
                          	<input id="userName" name="userName" type="text" onclick="if(this.value=='建议用手机号码注册'){this.value='';}" value="建议用手机号码注册" />
                          </td>
		  </tr>
            <tr> 
                          <td width="105" height="35"></td>
  						  <td height="35" valign="top">
                          	<p class="z6">6~18个字符，可使用字母、数字、下划线，需以字母开头</p>
                          </td>
		  </tr>
 					 <tr>
 						 <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>密码：</td>
					     <td height="30"class="grzc_31"><input id="userPassword" name="userPassword" type="password"  value="" /></td>
		  </tr>
          				 <td width="105" height="35"></td>
  						  <td height="35" valign="top">
                          	<p class="z6">6~16个字符，区分大小写</p>
                         </td>
  					<tr>
 					    <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>确认密码：</td>
   					    <td height="30" class="grzc_31"><input id="confirmUserPass" name="confirmUserPass" type="password"  value="" /></td>
	      </tr>
          				 <td width="105" height="35"></td>
  						  <td height="35" valign="top">
                          	<p class="z6">请再次填写密码</p>
                         </td>
  					<tr>
 					    <td width="105" height="50" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>真实姓名：</td>
   					    <td height="30" class="grzc_31"><input id="userRealName" name="userRealName" type="text"  value="" /></td>
	      </tr>
				    <tr>
   					    <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机号：</td>
 					    <td height="30">
							<input id="userPhone" name="userPhone" type="text" class="sjh"  value=""/>
                            <input name="vcode" type="button" class="yz r" id="vcode" value="获取手机验证码" onclick="return sendCertCode();"/>
							
                        </td>
		  </tr>
 					 <tr>
  					    <td width="105" height="70" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机验证码：</td>
   					    <td height="70">
                       	  <input id="phoneCert" name="phoneCert" type="text" class="sjyz"  value=""/>
                            <span class="yzm z6">若无法收到验证短信，请使用<a href="email_register.php">电子邮箱注册</a></span>
                        </td>
		  </tr>
					  <tr>
  						  <td height="30" colspan="2" align="right" valign="middle">
                          <div class="zcjz"><input id="agree_ucenter" name="agree_ucenter" type="checkbox" class="message_t01" value="yes" checked /><span class="message_t02">同意"<a href="#">服务条款</a>"和"<a href="#">隐私权相关政策</a>"</span></div>
                          </td>
		  </tr>
 					 <tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input id="register_confirm" name="register_confirm" type="button" class="denglu" value="立即注册" /></div>
                           </td>
	      </tr>
			  </table>

          </div>
        </div>
    </div>
</div>
</form>
<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>