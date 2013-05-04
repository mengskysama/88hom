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
		<div class="title"><!--{$typeTitle}-->信息类别</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->&fid=<!--{$fid}-->" method="post">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="fid" value="<!--{$fid}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">名称：</td><td><input class="input" type="text" id="typeName" name="typeName" value="<!--{if $rmTypeDetail neq '' and $rmTypeDetail.type_name neq ''}--><!--{$rmTypeDetail.type_name}--><!--{/if}-->"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="button" onclick="exeAdminRmTypeRelease();" value="<!--{$typeTitle}-->类别"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('type.php');" value="取消"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
		<div class="title">信息类别列表</div>
</div>
<form name="listForm" action="action.php?action=typeDel&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="10%">排序</th>
			<th width="5%">类别ID</th>
			<th width="50%">名称</th>
			<th width="30%">操作</th>
		</tr>
		<!--{foreach from=$rmTypeList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><input class="input1" type="text" name="typeLayer[<!--{$item.id}-->]" value="<!--{$item.type_layer}-->"/></td>
			<td><!--{$item.id}--></td>
			<td><!--{$item.type_name}--></td>
			<td><a href="type.php?id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=typeDelById&id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->');">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
<!--{if $rmTypeList neq null}-->
<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">全选</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">取消</a> <input type="button" value="排序" onclick="listForm.action='action.php?action=typeOrder&fid=<!--{$fid}-->';listForm.submit();"/>&nbsp;<input type="button" value="删除" onclick="if(confirm('你确认删除选中的条目？')){listForm.submit();}"/>
</div>
<!--{/if}-->
</form>
</body>
</html>
