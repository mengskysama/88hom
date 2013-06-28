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
		$('#bnt').click(function(){
			if($('input[name="userUsername"]').val()=="")
			{
					alert('请输入用户名！');
					$('input[name="userUsername"]').fucus();
					return;
			}
			$('form:first').submit();
	
		});
	});
	
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息修改</div>
</div>
<form id="releaseForm" name="releaseForm" action="systemUser.php?action=doModify" method="post">
	<input type="hidden" name="userId" value="<!--{$user.userId}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">用户名：</td><td><input class="input" type="text" id="username" name="userUsername" value="<!--{$user.userUsername}-->"/></td>
		</tr>
		<tr>
			<td>邮箱：</td><td><input class="input" type="text" id="email" name="userEmail" value="<!--{$user.userEmail}-->"/></td>
		</tr>
		<tr>
			<td>电话：</td><td><input class="input" type="text"  name="userPhone" value="<!--{$user.userPhone}-->"/></td>
		</tr>
		<tr>
			<td>分配权限组：</td>
			<td>
				<select id="groupId" name="userGroupId">
					<!--{foreach from=$group item=item key=key}-->
						<!--{if $item.groupId eq $user.userGroupId}-->
						<option selected="selected" value="<!--{$item.groupId}-->"><!--{$item.groupName}--></option>
						<!--{else}-->
						<option value="<!--{$item.groupId}-->"><!--{$item.groupName}--></option>
						<!--{/if}-->
					<!--{/foreach}-->
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button"  value="修改" id="bnt"/></td>
		</tr>
	</table>
</form>
</body>
</html>
