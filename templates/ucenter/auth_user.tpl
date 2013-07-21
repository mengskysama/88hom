<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>用户认证</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->

</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
<!--中间-->
<div class="gr_zj">
	<div class="gr_b">
    	<div class="gr_dl">
			<ul class="dlqh">
            	<li class="sjzc2"><a href="javascript:void(0)" >手机号码认证</a></li>
            </ul>
        	<div class="dl_tb">
				<img src="<!--{$cfg.web_images}-->ucenter/QQbd.jpg" width="79" class="l">  
            	<span class="dl_wz r">亲爱的，还差一步，就可以畅游房不剩房网营了！ 赶快认证一下吧！加油！</span>      
        	</div>
            <div class="sjzc1" id="acc_2">
            <div class="sjzc1_auth" id="div_mathcode" style="display: none;">
            	<table width="180" height="58" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    	<td width="85"><img src='<!--{$cfg.web_code_line}-->' id='imgcode' name='imgcode'  onClick="this.src=this.src+'?op=login&'+Math.random()" style='cursor:pointer;'></td>
                        <td width="47"><input type="text" value="" maxlength="4" class="yz_input" id="txt_mathcode" /></td>
                        <td width="44"><input id="btn_mathcode" type="image" src="<!--{$cfg.web_images}-->ucenter/qd.jpg" onclick="return sendCertCode();"></td>
                    </tr>
                    <tr>
                    	<td><span class="blue"><a href="javascript:void(0);" onclick="refresh_code();">换一题</a></span></td>
                        <td colspan="2"><img src="<!--{$cfg.web_images}-->ucenter/yz_bq.gif" style="vertical-align:middle;"> 请输入答案</td>
                    </tr>
               </table>
            </div>
            <form name="mobileRegFrm" id="mobileRegFrm" action="register.php" method="post">   
				<input type="hidden" name="userType" value="20">
				<input type="hidden" name="userId" value="<!--{$userId}-->">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  					<tr>
 					    <td width="105" height="50" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>真实姓名：</td>
   					    <td height="30" class="grzc_31"><input id="userRealName" name="userRealName" type="text"  value="" /></td>
	      			</tr>
		          	<tr>
					    <td width="105" height="40" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机号：</td>
					    <td height="40">
		                   	<input id="userPhone" name="userPhone" type="text" class="sjh"  value=""/>
                            <input name="btn_send_vcode" type="button" class="hq b0" id="btn_send_vcode" value="" onclick="return sendCertCode();"/>
		                </td>
				  	</tr>
 					<tr>
  					    <td width="105" height="70" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机验证码：</td>
   					    <td height="70">
                       	  <input id="phoneCert" name="phoneCert" type="text" class="sjyz"  value=""/>
                            <span class="yzm z6">若1分钟后仍未收到验证码短信，<a href="javascript:void(0);" id="a_sendcode">请点此重发</a><br /> 若无法收到验证短信，请使用<a href="javascript:void(0);" onclick="radio_check('email')">电子邮箱注册</a></span>
                        </td>
		  			</tr>				  			
					<tr>
  						  <td height="30" colspan="2" align="right" valign="middle">
                          <div class="zcjz"><input id="reg_mobile_agree_ucenter" name="reg_mobile_agree_ucenter" type="checkbox" value="yes" class="message_t01" checked /><span class="message_t02">同意"<a href="#">服务条款</a>"和"<a href="#">隐私权相关政策</a>"</span></div>
                          </td>
		  			</tr>
 					<tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input name="btn_auth_user" type="button" class="denglu" id="btn_auth_user" value="立即验证" /></div>
                           </td>
	      			</tr>
			  	</table>
			</form>
          	</div>          	
        </div>
    </div>
</div>
<script type="text/javascript">
<!--{$err_msg_auth_user}-->
</script>
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
