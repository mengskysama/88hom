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
		<div class="title"><!--{$typeTitle}-->管理组别</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->" method="post">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">名称：</td><td><input class="input" type="text" id="groupName" name="groupName" value="<!--{if $groupDetail neq '' and $groupDetail.groupName neq ''}--><!--{$groupDetail.groupName}--><!--{/if}-->"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="button" onclick="exeAdminGroupRelease();" value="<!--{$typeTitle}-->管理组别"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('group.php');" value="取消"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title">管理组别列表</div>
</div>
<form name="listForm" action="action.php?action=groupDel" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="5%">ID</th>
			<th width="70%">名称</th>
			<th width="20%">操作</th>
		</tr>
		<!--{foreach from=$groupList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><!--{$item.groupId}--></td>
			<td><!--{$item.groupName}--></td>
			<td><a href="group.php?id=<!--{$item.groupId}-->">修改</a> <a href="permissions.php?action=group&gid=<!--{$item.groupId}-->">权限</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</form>
</body>
</html>
