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
		<div class="title"><!--{$manageTitle}-->ý���˻�</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->" method="post" onsubmit="return exeAdminManageRelease();">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="page" value="<!--{$page}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<!--{if $manageDetail neq '' and $manageDetail.username neq ''}-->
			<tr>
				<td width="70">�û�����</td><td><input class="input" type="text" id="username" name="username" value="<!--{$manageDetail.username}-->"/></td>
			</tr> 
			<tr>
				<td>���룺</td><td><input class="input" type="text" id="password" name="password" value="<!--{$manageDetail.password}-->"/></td>
			</tr>
			<tr>
				<td>ȷ�����룺</td><td><input class="input" type="text" id="password_" name="password_" value="<!--{$manageDetail.password}-->"/></td>
			</tr>
			<!--{else}-->
			<tr>
				<td width="70">�û�����</td><td><input class="input" type="text" id="username" name="username" value=""/></td>
			</tr> 
			<tr>
				<td>���룺</td><td><input class="input" type="text" id="password" name="password" value="123456"/>ע�⣺��ʼ����Ϊ123456</td>
			</tr>
			<tr>
				<td>ȷ�����룺</td><td><input class="input" type="text" id="password_" name="password_" value="123456"/></td>
			</tr>
			<!--{/if}-->
			<tr>
				<td>&nbsp;</td><td><input type="submit" value="<!--{$manageTitle}-->�˻�"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('manage.php?page=<!--{$page}-->');" value="ȡ��"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title">ý���˻��б�</div>
</div>
<form name="listForm" action="action.php?action=typeDel&type=<!--{$type}-->&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ID</th>
			<th width="15%">�û���</th>
			<th width="15%">����</th>
			<th width="30%">����</th>
			<th width="10%">״̬</th>
		</tr>
		<!--{foreach from=$manageList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.id}--></td>
			<td><!--{$item.username}--></td>
			<td><!--{$item.password}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeManageState&id=<!--{$item.id}-->&state=0">����</a><!--{else}--><a href="action.php?action=changeManageState&id=<!--{$item.id}-->&state=1">����</a><!--{/if}--> <a href="manage.php?id=<!--{$item.id}-->&page=<!--{$page}-->">�޸�</a> <a href="javascript:exeAdminDelMessage('action.php?action=delManageById&id=<!--{$item.id}-->');">ɾ��</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">����</font><!--{else}--><font color="red">����</font><!--{/if}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
