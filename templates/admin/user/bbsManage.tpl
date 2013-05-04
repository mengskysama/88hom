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
	<div class="title">BBS标题列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="15%">标题</th>
			<th width="5%">发布人</th>
			<th width="30%">内容</th>
			<th width="5%">回复数</th>
			<th width="5%">点击数</th>
			<th width="10%">发布时间</th>
			<th width="10%">更新时间</th>
			<th width="10%">操作</th>
			<th width="5%">状态</th>
		</tr>
		<!--{foreach from=$infoList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><a href="bbsReply.php?bid=<!--{$item.id}-->"><!--{$item.title}--></a></td>
			<td><!--{$item.uname}--></a></td>
			<td><!--{$item.content}--></td>
			<td><!--{$item.replys}--></td>
			<td><!--{$item.click_count}--></td>
			<td><!--{$item.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{$item.update_time|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeBbsState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeBbsState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="javascript:exeAdminDelMessage('action.php?action=delBbsById&id=<!--{$item.id}-->');">删除</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
