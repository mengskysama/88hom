<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>忘记密码</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
<!--中间-->
<div class="j_bg">
    <div class="jhyj">
        <table width="634" height="300" border="0" cellpadding="0" cellspacing="0">
			<!--{if $err_code == 1}-->
            <tr>
                <td width="272" align="right"><img src="<!--{$cfg.web_images}-->ucenter/dh.gif" /></td>
                <td width="362"><span class="green">已成功找回密码！</span></td>
            </tr>
			<!--{else}-->
            <tr>
                <td width="272" align="right"><img src="<!--{$cfg.web_images}-->ucenter/wjmm_03.jpg" /></td>
                <td width="362"><span class="green">找回密码失败，请点击<a class="red" href="get_password.php">这里</a>重新尝试！</span></td>
            </tr>
			<!--{/if}-->
			<!--{if $err_code == 1 && $pass_channel == 'email'}-->
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已把密码发到您的邮箱<a class="red"><!--{$receive_mail}--></a>。<br>注意：收件箱如若找不到该邮件，请尝试在垃圾邮箱查看</div></td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center"><input type="image" src="<!--{$cfg.web_images}-->ucenter/btn01.gif" onclick="window.open('<!--{$user_mail_server}-->','_blank');"/></td>
            </tr>
			<!--{elseif $err_code == 1 && $pass_channel == 'mobile'}-->
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已把密码发到您的手机<a class="red"><!--{$receive_mobile}--></a>，请查收。</div></td>
            </tr>
			<!--{/if}-->
        </table>
    </div>
</div>


<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
