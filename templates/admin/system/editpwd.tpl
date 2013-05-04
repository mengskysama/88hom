<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">修改密码</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=editpwd" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">原始密码：</td><td><input type="password" class="input" id="pwdOld" name="pwdOld"/></td>
		</tr>
		<tr>
			<td>新密码：</td><td><input type="password" class="input" id="pwdNew" name="pwdNew"/></td>
		</tr>
		<tr>
			<td>确认密码：</td><td><input type="password" class="input" id="pwdNewTwo" name="pwdNewTwo"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminSystemUserPwd();" value="提交"/></td>
		</tr>
	</table>
</form>
</body>
</html>
