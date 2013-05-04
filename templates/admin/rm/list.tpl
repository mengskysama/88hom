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
	<div class="title">招聘信息类别</div>
</div>
<ul class="list_panel">
	<!--{foreach from=$rmTypeList item=item key=key}-->
	<li><a href="list.php?typeId=<!--{$key}-->"><!--{$item}--></a> |</li>
	<!--{/foreach}-->
</ul>
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
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">招聘职位</th>
			<th width="5%">招聘人数</th>
			<th width="10%">招聘部门</th>
			<th width="25%">工作地址</th>
			<th width="10%">发布时间</th>
			<th width="10%">修改时间</th>
			<th width="10%">过期时间</th>
			<th width="10%">操作</th>
			<th width="5%">状态</th>
			<th width="5%">点击</th>
		</tr>
		<!--{foreach from=$rmList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.type.type_name}--></td>
			<td><!--{$item.persons}--></td>
			<td><!--{$item.dept}--></td>
			<td><!--{$item.address}--></td>
			<td><!--{$item.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{$item.update_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{$item.expired_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="modify.php?id=<!--{$item.id}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->');">删除</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
			<td><!--{$item.click_count}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
</form>
</body>
</html>
