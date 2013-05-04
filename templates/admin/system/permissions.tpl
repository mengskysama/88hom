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
	<div class="title">系统权限分配</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->PermissionsRelease" method="post">
	<input type="hidden" name="id" value="<!--{$id}-->"/>
	<input type="hidden" name="gid" value="<!--{$gid}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<!--{foreach from=$permissions item=item key=key}-->
			<tr><td><!--{$item.name}--></td></tr>
			<!--{foreach from=$item.sub item=item1 key=key1}-->
				<tr><td>&nbsp;&nbsp;<input <!--{if $item1.state==1}-->checked="checked"<!--{/if}--> type="checkbox" name="admin[<!--{$key1}-->]" value="1"/><!--{$item1.name}--></td></tr>
			<!--{/foreach}-->
		<!--{/foreach}-->
		<tr><td><input type="submit" value="保存"/></td></tr>
	</table>
</form>
</body>
</html>
