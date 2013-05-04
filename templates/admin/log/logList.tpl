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
	<li><a href="logList.php">全部</a> |</li>
	<!--{foreach from=$areaList item=item key=key}-->
	<li><a href="logList.php?areaId=<!--{$key}-->"><!--{$item}--></a> |</li>
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
			<th width="20">餐厅编号</th>
			<th width="50">餐厅名称</th>
			<th width="50">联系电话</th>
			<th width="30">区域</th>
			<th width="30">正/备选</th>
			<th width="50">楼盘编号</th>
			<th width="50">楼盘名称</th>
			<th width="100">地址</th>
			<th width="20">可投数量</th>
			<th width="20">已投数量</th>
			<th width="20">未投数量</th>
			<th width="100">投递情况</th>
			<th width="30">计划投递时间</th>
			<th width="30">计划QC时间</th>
			<th width="30">开始时间</th>
			<th width="30">结束时间</th>
			<!--{if $level!=1}-->
			<th width="30">QC时间</th>
			<th width="30">QC情况</th>
			<th width="50">QC通知</th>
			<th width="50">解决办法</th>
			<!--{/if}-->
			<th width="100">投递备注</th>
		</tr>
		<!--{foreach from=$logList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.shopStrId}--></td>
			<td><!--{$item.shopName}--></td>
			<td><!--{$item.shopTel}--></td>
			<td><!--{$item.name}--></td>
			<td><!--{if $item.status eq 1}-->正选<!--{else}-->备选<!--{/if}--></td>
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
