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
		<div class="title"><!--{$areaTitle}-->����</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->&fid=<!--{$fid}-->" method="post" onsubmit="return exeAdminAreaRelease();">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="fatherId" value="<!--{$fid}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">�������ƣ�</td><td><input class="input" type="text" id="name" name="name" value="<!--{if $areaDetail neq '' and $areaDetail.name neq ''}--><!--{$areaDetail.name}--><!--{/if}-->"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="submit" value="<!--{$areaTitle}-->����"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('area.php');" value="ȡ��"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title"><!--{if $fatherAreaDetail==''}-->�����б�<!--{else}-->����[<!--{$fatherAreaDetail.name}-->]�������б� <a href="area.php?fid=<!--{$fatherAreaDetail.fatherId}-->">�����ϼ��б�</a><!--{/if}--></div>
</div>
<form name="listForm" action="action.php?action=del&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ѡ��</th>
			<th width="5%">ID</th>
			<th width="20%">����</th>
			<th width="30%">����</th>
		</tr>
		<!--{foreach from=$areaList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><!--{$item.id}--></td>
			<td><!--{$item.name}--></td>
			<td><a href="area.php?fid=<!--{$item.id}-->">�鿴or�������</a> <a href="area.php?id=<!--{$item.id}-->&fid=<!--{$item.fatherId}-->">�޸�</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->&fid=<!--{$item.fatherId}-->');">ɾ��</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
<!--{if $areaList neq null}-->
<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">ȫѡ</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">ȡ��</a> <input type="button" value="ɾ��" onclick="if(confirm('��ȷ��ɾ��ѡ�е���Ŀ��')){listForm.submit();}"/>
</div>
<!--{/if}-->
</form>
</body>
</html>
