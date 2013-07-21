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
	<div class="title">新盘团购列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">楼盘区域</th>
			<th width="15%">楼盘名称</th>
			<th width="20%">楼盘地址</th>
			<th width="10%">发布时间</th>
			<th width="10%">更新时间</th>
			<th width="5%">浏览人数</th>
			<th width="5%">团购数</th>
			<th width="5%">楼盘状态</th>
			<th width="15%">操作</th>
		</tr>
		<!--{foreach from=$tgList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.propertyAreaName}--></td>
			<td><!--{$item.propertyName}--></td>
			<td><!--{$item.propertySellAddress}--></td>
			<td><!--{$item.propertyCreateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{$item.propertyUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{$item.propertyClickCount}--></td>
			<td><!--{$item.tgCount}--></td>
			<td><!--{if $item.propertyState==1}--><font color="blue">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
			<td><a href="complexTgDetailList.php?id=<!--{$item.propertyId}-->">查看详情</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
