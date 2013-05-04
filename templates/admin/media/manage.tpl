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
	 
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title"><!--{$manageTitle}-->媒体账户</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->" method="post" onsubmit="return exeAdminManageRelease();">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="page" value="<!--{$page}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<!--{if $manageDetail neq '' and $manageDetail.username neq ''}-->
			<tr>
				<td width="70">用户名：</td><td><input class="input" type="text" id="username" name="username" value="<!--{$manageDetail.username}-->"/></td>
			</tr> 
			<tr>
				<td>密码：</td><td><input class="input" type="text" id="password" name="password" value="<!--{$manageDetail.password}-->"/></td>
			</tr>
			<tr>
				<td>确认密码：</td><td><input class="input" type="text" id="password_" name="password_" value="<!--{$manageDetail.password}-->"/></td>
			</tr>
			<!--{else}-->
			<tr>
				<td width="70">用户名：</td><td><input class="input" type="text" id="username" name="username" value=""/></td>
			</tr> 
			<tr>
				<td>密码：</td><td><input class="input" type="text" id="password" name="password" value="123456"/>注意：初始密码为123456</td>
			</tr>
			<tr>
				<td>确认密码：</td><td><input class="input" type="text" id="password_" name="password_" value="123456"/></td>
			</tr>
			<!--{/if}-->
			<tr>
				<td>&nbsp;</td><td><input type="submit" value="<!--{$manageTitle}-->账户"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('manage.php?page=<!--{$page}-->');" value="取消"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title">媒体账户列表</div>
</div>
<form name="listForm" action="action.php?action=typeDel&type=<!--{$type}-->&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ID</th>
			<th width="15%">用户名</th>
			<th width="15%">密码</th>
			<th width="30%">操作</th>
			<th width="10%">状态</th>
		</tr>
		<!--{foreach from=$manageList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.id}--></td>
			<td><!--{$item.username}--></td>
			<td><!--{$item.password}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeManageState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeManageState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="manage.php?id=<!--{$item.id}-->&page=<!--{$page}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delManageById&id=<!--{$item.id}-->');">删除</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
