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
	<div class="title">蜘蛛统计</div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="25%">蜘蛛名称</th>
			<th width="50%">访问地址</th>
			<th width="25%">访问时间</th>
		</tr>
		<!--{foreach from=$spiderList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.name}--></td>
			<td><a href="<!--{$item.url}-->" target="_blank">点击查看地址</a></td>
			<td><!--{$item.time}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
