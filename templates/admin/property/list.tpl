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
	<div class="title">区域</div>
</div>
<ul class="list_panel">
	<li><a href="list.php">全部</a> |</li>
	<!--{foreach from=$areaList item=item key=key}-->
	<li><a href="list.php?areaId=<!--{$key}-->"><!--{$item}--></a> |</li>
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
			<th width="4%">选中</th>
			<th width="8%">楼盘编号</th>
			<th width="10%">楼盘名称</th>
			<th width="15%">楼盘地址</th>
			<th width="5%">楼盘区域</th>
			<th width="5%">户数</th>
			<th width="5%">栋数</th>
			<th width="5%">层数</th>
			<th width="5%">可投层数</th>
			<th width="8%">每层户数</th>
			<th width="15%">备注</th>
			<th width="10%">操作</th>
			<th width="5%">状态</th>
		</tr>
		<!--{foreach from=$propertyList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><!--{$item.propertyId}--></td>
			<td><!--{$item.propertyName}--></td>
			<td><!--{$item.propertyAddress}--></td>
			<td><!--{$item.name}--></td>
			<td><!--{$item.family}--></td>
			<td><!--{$item.build}--></td>
			<td><!--{$item.layer}--></td>
			<td><!--{$item.canLayer}--></td>
			<td><!--{$item.canFamily}--></td>
			<td><!--{$item.remark}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="modify.php?id=<!--{$item.id}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->');">删除</a> </td>
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
