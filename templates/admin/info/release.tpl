<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	$("#time").datepicker({
//		changeYear: true,
//		changeMonth: true,
		showButtonPanel: true
	});
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">新闻发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post" onsubmit="return exeAdminNewsRelease();">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">标题：</td><td><input class="input" type="text" id="title" name="title" style="width: 300px;"/></td>
		</tr> 
		<tr>
			<td>新闻详情：</td>
			<td>
				<!--{$FCKeditor}-->
			</td>
		</tr>
		<tr>
			<td>发布时间：</td>
			<td><input class="input" type="text" id="time" name="time" value="<!--{$time}-->"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="新闻发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
