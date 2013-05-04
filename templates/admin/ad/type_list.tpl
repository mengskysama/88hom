<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	function del(id){
		if(confirm('类别所属的广告及其文件将被一起删除，确认真的要删除吗？'))
			location.href='type_manager.php?action=delete&id='+id;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告类别列表</div><div class="title"><a href="type_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="25%">名称</th>
			<th width="10%">类别码</th>
			<th width="10%">开启</th>
			<th width="15%">创建时间</th>
			<th width="15%">更新时间</th>
			<th width="15%">操作</th>
		</tr>
		<!--{foreach from=$adTypeList item=item key=key}--> 
		<tr align="center">
			<td><!--{$item.adtypeName}--></td>
			<td><!--{$item.adtypeKey}--></td>
			<td><!--{if $item.adtypeState eq 1}-->是<!--{else}-->否<!--{/if}--></td>
			<td><!--{$item.adtypeCreateTime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{$item.adtypeUpdateTime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><a href="type_manager.php?action=update&id=<!--{$item.adtypeId}-->">修改</a> <a href="javascript:del(<!--{$item.adtypeId}-->)">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
