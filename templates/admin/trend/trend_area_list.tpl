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
		if(confirm('所属区域或项目下所有走势图数据和走势图将被删除！\n确认真的要删除吗？'))
			location.href='trend_area_manager.php?action=delete&id='+id;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图区域或项目列表</div><div class="title"><a href="trend_area_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th >标题</th>
			<th width="100">操作</th>
		</tr>
		<!--{foreach from=$trendAreaList item=item key=key}--> 
		<tr align="center">
			<td><!--{$item.name}--></td>
			<td><a href="trend_area_manager.php?action=update&id=<!--{$item.id}-->">修改</a> <a href="javascript:del(<!--{$item.id}-->)">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
