<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>登录页面</title>

<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
	
	$("#loginID").focus(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "手机号/邮箱/用户名码") {
			$(this).val("");
		}     
    });
    
	$("#loginID").blur(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "") {
			$(this).val("手机号/邮箱/用户名码");
		}     
    });
    
	$("#button2").onclick(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "") {
			$(this).val("手机号/邮箱/用户名码");
		}     
    });
    
});
function check_input() {
	if($("#loginID").val() == "") {
		alert("请填写账户名！");
        $("#loginID").focus();
        return false;
	}
    if($("#loginID").val() == "手机号/邮箱/用户名码") {
		alert("请填写正确的账户名！");
 		$("#loginID").val("");
		$("#loginPWD").val("");
		$("#loginID").focus();
		return false;
	}
	if($("#loginPWD").val() == "") {
		alert("请填写密码！");
		$("#loginPWD").focus();
 		return false;
	}
    return true;
}      

</script>
</head>

<body>
<!--头部-->
<div class="top">
    <a href="#" class="logo1"><img src="<!--{$cfg.web_images}-->ucenter/logo.jpg"></a>
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
                	<li><a href="index.php" <!--{$userTagClass}-->>个人登陆</a></li>
                    <li><a href="index.php?userType=2" <!--{$agentTagClass}-->>经纪人登陆</a></li>
                    <li><a href="index.php?userType=1" <!--{$shopTagClass}-->>门店登陆</a></li>
                </ul>
             </div>
         <div class="dlnr">
         <form name="loginForm" onsubmit="return check_input();" action="index.php" method="post">
           <input name="userType" type="hidden" value="<!--{$userType}-->">
       	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
 		   <tr>
   				 <td width="73" height="40" align="center" valign="middle" class="logo_4">账 户：</td>
   				 <td width="73" class="logo_31"><input id="loginID" name="loginID" type="text" value="手机号/邮箱/用户名码" /></td>
 		   </tr>
 		   <tr>
 			     <td width="73" height="40" align="center" valign="middle" class="logo_4">密 码：</td>
   				 <td width="73" class="logo_31"><input id="loginPWD" name="loginPWD" type="password" value="" /></td>
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
	    </form>
	<div class="load_b f14">
		<p>您还没有注册为<font class="red">房不剩房</font>用户？</p>
        <div class="zc">
        	<div class="zc_l">
        	<form name="regForm" action="<!--{$regFormAction}-->" method="post">
        	  <input name="button" type="submit" class="zc2 b b0" id="button" value="注册" />
        	</form>
        	</div>
             <div class="zc_r">
        <a href="login_qq.php"><img src="<!--{$cfg.web_images}-->ucenter/Connect_logo_qq.png"></a>
        <a href="login_weibo.php"><img src="<!--{$cfg.web_images}-->ucenter/dl3.jpg"></a>
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

<script type="text/javascript">
<!--{$invalidAcc}-->
</script>

</body>
</html>
