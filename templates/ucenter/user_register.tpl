<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人注册页面</title>

<!--{$jsFiles}-->
<!--{$cssFiles}-->

</head>

<body>
<!--头部-->
<div class="gr_top">
	<img src="<!--{$cfg.web_images}-->ucenter/grzc_03.jpg" />
    <span><a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a></span>
</div>
<!--中间-->
<form id="userRegForm" action="register.php" method="post">
<input type="hidden" name="userType" value="3">
<div class="gr_zj">
	<div class="gr_b">
    	<div class="gr_dl">
<ul class="dlqh">
            	<li class="sjzc"><a href="#">手机号码注册</a></li>
                <li class="yxzc"><a href="#">电子邮箱注册</a></li>
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
