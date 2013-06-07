<?php /* Smarty version Smarty-3.1.8, created on 2013-06-07 12:15:18
         compiled from "E:/workspace/projects/88hom/templates\ucenter\email_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1809951a5a72a315ba2-17193188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0d6d2c1e566ef3f73878e8e5256eee58351336c' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\email_register.tpl',
      1 => 1370578515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1809951a5a72a315ba2-17193188',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a5a72a3a7f46_01212462',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5a72a3a7f46_01212462')) {function content_51a5a72a3a7f46_01212462($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人注册页面_邮箱</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<form id="emailregister" action="register.php" method="post">
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
   					    <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>我的邮箱：</td>
 					    <td height="30">
                        	<input id="userEmail" name="userEmail" type="text" class="sjh" value="" /> 
                            </td>
		  </tr>
 					 <tr>
  					    <td width="105" height="56" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>验证码：</td>
   					    <td height="56" align="right" valign="middle">
						<img src='<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_code_line'];?>
' id='imgcode' name='imgcode' onClick="this.src=this.src+'?op=login&'+Math.random()" width="89" style="float:left">;
						<input type="text" value="" maxlength="4" class="sjyz" style="border:1px solid #ffbdc2" id="txt_mathcode" />
                        <span class="yzm2 z6"><a href="javascript:void(0);" onclick="refresh_code();" class="yzm2 z6">换一题</a>&nbsp;&nbsp;请输入答案</span>
							
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