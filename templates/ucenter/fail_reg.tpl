<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>注册失败</title>
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
                <td width="272" align="right"><img src="<!--{$cfg.web_images}-->ucenter/icon_failed.gif" /></td>
                <td width="362"><span class="red">抱歉，您没能注册成为房不剩房用户！</span></td>
            </tr>
            <tr>
                <td colspan="2"><div class="jhyj_bg">原因：<!--{$err_msg}--><br>
                	重新<a href="<!--{$destURL}-->"><span class="red">注册</span></a>房不剩房</div></td>
            </tr>
        </table>
    </div>
</div>

<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
