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
	<div class="title">系统用户管理</div>
</div>
<ul class="list_panel">
	<li><a href="systemUser.php?action=release">添加用户</a> </li>
</ul>
<div class="title_panel">
	<div class="title">用户列表</div>
</div>

	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">选中</th>
			<th width="15%">用户名</th>
			<th width="10%">用户组</th>
			<th width="25%">E-mail</th>
			<th width="25%">电话</th>
			<th width="15%">操作</th>
		</tr>
		<!--{foreach from=$userList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox"/></td>
			<td><!--{$item.userUsername}--></td>
			<td><!--{$item.group.groupName}--></td>
			<td><!--{$item.userEmail}--></td>
			<td><!--{$item.userPhone}--></td>
			<td>
				<a href="permissions.php?action=systemUser&id=<!--{$item.userId}-->">权限</a> 
				
				<a href="systemUser.php?action=modify&id=<!--{$item.userId}-->">修改</a> 
			<!--{if $item.userState eq 1}-->	
				<a href="systemUser.php?action=changeState&state=0&id=<!--{$item.userId}-->">删除</a> 
			<!--{else}-->
				<a href="systemUser.php?action=changeState&state=1&id=<!--{$item.userId}-->">恢复</a> 
			<!--{/if}-->	
			</td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
