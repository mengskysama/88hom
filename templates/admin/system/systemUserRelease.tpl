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
	<div class="title">信息发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=systemUserRelease" method="post">
	<input type="hidden" name="userPhoneState" value="1"/>
	<input type="hidden" name="userEmailState" value="1"/>
	<input type="hidden" name="userType" value="0"/>
	<input type="hidden" name="userState" value="1"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">用户名：</td><td><input class="input" type="text" id="username" name="userUsername"/></td>
		</tr>
		<tr>
			<td>密码：</td><td><input class="input" type="password"" id="pwd" name="userPassword"/></td>
		</tr>
		<tr>
			<td>确认密码：</td><td><input class="input" type="password" id="password" /></td>
		</tr>
		<tr>
			<td>邮箱：</td><td><input class="input" type="text" id="email" name="userEmail"/></td>
		</tr>
		<tr>
			<td>电话：</td><td><input class="input" type="text"  name="userPhone"/></td>
		</tr>
		<tr>
			<td>分配权限组：</td>
			<td>
				<select id="groupId" name="userGroupId">
					<option value="">请选择权限组</option>
					<!--{foreach from=$group item=item key=key}-->
					<option value="<!--{$item.groupId}-->"><!--{$item.groupName}--></option>
					<!--{/foreach}-->
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminSystemUserRelease();" value="发布信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
