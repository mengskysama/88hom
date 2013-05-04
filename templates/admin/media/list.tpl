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
	<div class="title">信息查询</div>
</div>
<div class="search_panel">
	<input class="input" type="text" value="请输入关键字"/>&nbsp;<input type="button" value="查询"/>
</div>
-->
<div class="title_panel">
	<div class="title">信息列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<input type="hidden" name="type" value="<!--{$type}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="20%">标题</th>
			<th width="15%">文件名</th>
			<th width="20%">文件路径</th>
			<th width="10%">发布时间</th>
			<th width="10%">修改时间</th>
			<th width="15%">操作</th>
			<th width="5%">状态</th>
			<th width="5%">下载量</th>
		</tr>
		<!--{foreach from=$infoList item=item key=key}-->
		<tr align="center">
			<td><a href="javascript:void(0);"><!--{$item.title}--></a></td>
			<td><!--{$item.file_name}--></td>
			<td><!--{$item.file_path}--></td>
			<td><!--{$item.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{$item.update_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="modify.php?id=<!--{$item.id}-->">修改</a> <a target="_brank" href="action.php?action=downLoad&fileName=<!--{$item.file_name}-->&filePath=<!--{$item.file_path}-->">下载</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->');">删除</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
			<td><!--{$item.click_count}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
