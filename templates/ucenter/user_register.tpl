<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>个人注册页面</title>

<!--{$jsFiles}-->
<!--{$cssFiles}-->

</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
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
                          	<p class="z6">6~18个字符，可使用字母、数字、下划线</p>
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
   					    <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机号：</td>
 					    <td height="30">
                        	<input id="userPhone" name="userPhone" type="text" class="sjh"  value=""/>
                            <input name="button2" type="button" class="hq b0" id="button2" value="" onclick="return sendCertCode();"/>
                            
                                <!--验证弹出 begin -->
                                <div id="div_mathcode" style="display: none;">
                                        <div >
                                            <div>
                            					<img src='<!--{$cfg.web_code_web}-->' id='imgcode' name='imgcode'  onClick="this.src=this.src+'?op=login&'+Math.random()" style='cursor:pointer;'>;
                                                
                                            </div>
                                            <div>
                                                <input type="text" value="" maxlength="4" class="yzboxa01inp" id="txt_mathcode" />
                                                <input type="button" class="yzboxa01but" value="确认" id="btn_mathcode" />
                                            </div>
                                        </div>
 
                                </div>
                                <!--验证弹出 end-->
                            
                        </td>
		  </tr>
 					 <tr>
  					    <td width="105" height="70" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机验证码：</td>
   					    <td height="70">
                       	  <input id="phoneCert" name="phoneCert" type="text" class="sjyz"  value=""/>
                            <span class="yzm z6">若1分钟后仍未收到验证码短信，<a href="javascript:void(0);" id="a_sendcode">请点此重发</a><br /> 若无法收到验证短信，请使用<a href="#">电子邮箱注册</a></span>
                        </td>
		  </tr>
					  <tr>
  						  <td height="30" colspan="2" align="right" valign="middle">
                          <div class="zcjz"><input id="agree_ucenter" name="agree_ucenter" type="checkbox" class="message_t01" value="yes"/><span class="message_t02">同意"<a href="#">服务条款</a>"和"<a href="#">隐私权相关政策</a>"</span></div>
                          </td>
		  </tr>
 					 <tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input id="register_confirm" name="register_confirm" type="button" class="denglu" value="立即注册"/></div>
                           </td>
	      </tr>
			  </table>

          </div>
        </div>
    </div>
</div>
</form>
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
