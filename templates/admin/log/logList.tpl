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
	<div class="title">����</div>
</div>
<ul class="list_panel">
	<li><a href="logList.php">ȫ��</a> |</li>
	<!--{foreach from=$areaList item=item key=key}-->
	<li><a href="logList.php?areaId=<!--{$key}-->"><!--{$item}--></a> |</li>
	<!--{/foreach}-->
</ul>
<!--  
<div class="title_panel">
	<div class="title">��Ϣ��ѯ</div>
</div>
<div class="search_panel">
	<input class="input" type="text" value="������ؼ���"/>&nbsp;<input type="button" value="��ѯ"/>
</div>
-->
<div class="title_panel">
	<div class="title">��Ϣ�б�</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="20">�������</th>
			<th width="50">��������</th>
			<th width="50">��ϵ�绰</th>
			<th width="30">����</th>
			<th width="30">��/��ѡ</th>
			<th width="50">¥�̱��</th>
			<th width="50">¥������</th>
			<th width="100">��ַ</th>
			<th width="20">��Ͷ����</th>
			<th width="20">��Ͷ����</th>
			<th width="20">δͶ����</th>
			<th width="100">Ͷ�����</th>
			<th width="30">�ƻ�Ͷ��ʱ��</th>
			<th width="30">�ƻ�QCʱ��</th>
			<th width="30">��ʼʱ��</th>
			<th width="30">����ʱ��</th>
			<!--{if $level!=1}-->
			<th width="30">QCʱ��</th>
			<th width="30">QC���</th>
			<th width="50">QC֪ͨ</th>
			<th width="50">����취</th>
			<!--{/if}-->
			<th width="100">Ͷ�ݱ�ע</th>
		</tr>
		<!--{foreach from=$logList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.shopStrId}--></td>
			<td><!--{$item.shopName}--></td>
			<td><!--{$item.shopTel}--></td>
			<td><!--{$item.name}--></td>
			<td><!--{if $item.status eq 1}-->��ѡ<!--{else}-->��ѡ<!--{/if}--></td>
			<td><!--{$item.propertyStrId}--></td>
			<td><!--{$item.propertyName}--></td>
			<td><!--{$item.propertyAddress}--></td>
			<td><!--{$item.canNum}--></td>
			<td><!--{$item.endNum}--></td>
			<td><!--{$item.notNum}--></td>
			<td><!--{$item.dvState}--></td>
			<td><!--{$item.planDvTime}--></td>
			<td><!--{$item.planQcTime}--></td>
			<td><!--{$item.startTime}--></td>
			<td><!--{$item.endTime}--></td>
			<!--{if $level!=1}-->
			<td><!--{$item.qcTime}--></td>
			<td><!--{$item.qcState}--></td>
			<td><!--{$item.qcNotify}--></td>
			<td><!--{$item.resolution}--></td>
			<!--{/if}-->
			<td><!--{$item.remark}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
