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
<!--  
<div class="title_panel">
	<div class="title">��Ϣ��ѯ</div>
</div>
<div class="search_panel">
	<input class="input" type="text" value="������ؼ���"/>&nbsp;<input type="button" value="��ѯ"/>
</div>
-->
<div class="title_panel">
	<div class="title">Ա���б�</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ѡ��</th>
			<th width="15%">�û���</th>
			<th width="10%">����</th>
			<th width="10%">�Ա�</th>
			<th width="10%">����</th>
			<th width="10%">��ϵ�绰</th>
			<th width="15%">��ַ</th>
			<th width="10%">������Ƭ</th>
			<th width="10%">����</th>
			<th width="5%">״̬</th>
		</tr>
		<!--{foreach from=$userList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><!--{$item.username}--></td>
			<td><!--{$item.uname}--></td>
			<td><!--{if $item.sex eq 1}-->��<!--{else}-->Ů<!--{/if}--></td>
			<td><!--{$item.dept}--></td>
			<td><!--{$item.tel}--></td>
			<td><!--{$item.address}--></td>
			<td><!--{if $item.path!=''}--><img height="100px" src="<!--{$cfg.web_url}-->uploads/<!--{$item.path_thumb}-->"/><!--{/if}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=0">����</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=1">����</a><!--{/if}--> <a href="modify.php?id=<!--{$item.id}-->">�޸�</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->');">ɾ��</a> </td>
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
