<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>注册成功</title>
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
            <tr>
                <td width="272" align="right"><img src="<!--{$cfg.web_images}-->ucenter/dh.gif" /></td>
                <td width="362"><span class="green">已成功发送激活邮件！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">我们已向您的邮箱<a class="red"><!--{$target_email}--></a>发送了一封账号激活邮件，48小时内有效，<br>点击激活邮箱里的链接就可以登录房不剩房网营了。<br>注意：收件箱如若找不到激活邮件，请尝试在垃圾邮箱查看</div></td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center"><a href="<!--{$mail_server}-->"><input type="image" src="<!--{$cfg.web_images}-->ucenter/btn01.gif" /></a></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
