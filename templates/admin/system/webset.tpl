<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title"><!--{$cfg.web_page.title}--></div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=websetRelease" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">网站名称：</td><td colspan="3"><input class="input" type="text" name="webset[siteName]" style="width: 500px;" value="<!--{$webset.siteName}-->"/></td>
		</tr>
		<tr>
			<td width="100">关键字：</td><td colspan="3"><input class="input" type="text" name="webset[keywords]" style="width: 500px;" value="<!--{$webset.keywords}-->"/></td>
		</tr>
		<tr>
			<td width="100">网站描述：</td><td colspan="3"><textarea name="webset[description]" style="width:500px;height: 100px;"><!--{$webset.description}--></textarea></td>
		</tr>
		<tr>
			<td width="100">客服热线一：</td><td width="200"><input class="input" type="text" name="webset[serverPhone]" value="<!--{$webset.serverPhone}-->"/></td>
			<td width="100">客服热线二：</td><td><input class="input" type="text" name="webset[serverPhone1]" value="<!--{$webset.serverPhone1}-->"/></td>
		</tr>
		
		<tr>
			<td>传真一：</td><td><input class="input" type="text" name="webset[serverFax]" value="<!--{$webset.serverFax}-->"/></td>
			<td>传真二：</td><td><input class="input" type="text" name="webset[serverFax1]" value="<!--{$webset.serverFax1}-->"/></td>
		</tr>
		
		<tr>
			<td>移动电话一：</td><td><input class="input" type="text" name="webset[mobile]" value="<!--{$webset.mobile}-->"/></td>
			<td>移动电话二：</td><td><input class="input" type="text" name="webset[mobile1]" value="<!--{$webset.mobile1}-->"/></td>
		</tr>
		
		<tr>
			<td>客服QQ一：</td><td><input class="input" type="text" name="webset[serverQicq]" value="<!--{$webset.serverQicq}-->"/></td>
			<td>客服QQ二：</td><td><input class="input" type="text" name="webset[serverQicq1]" value="<!--{$webset.serverQicq1}-->"/></td>
		</tr>
		
		<tr>
			<td>客服MSN一：</td><td><input class="input" type="text" name="webset[serverMSN]" value="<!--{$webset.serverMSN}-->"/></td>
			<td>客服MSN二：</td><td><input class="input" type="text" name="webset[serverMSN1]" value="<!--{$webset.serverMSN1}-->"/></td>
		</tr>
		
		<tr>
			<td>客服邮箱一：</td><td><input class="input" type="text" name="webset[serverMail]" value="<!--{$webset.serverMail}-->"/></td>
			<td>客服邮箱二：</td><td><input class="input" type="text" name="webset[serverMail1]" value="<!--{$webset.serverMail1}-->"/></td>
		</tr>
		
		<tr>
			<td>百度统计JS：</td><td colspan="3"><textarea name="webset[baiduCountJs]"><!--{$webset.baiduCountJs}--></textarea></td>
		</tr>
		<tr>
			<td>谷歌统计JS：</td><td colspan="3"><textarea name="webset[googleCountJs]"><!--{$webset.googleCountJs}--></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="修改信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
