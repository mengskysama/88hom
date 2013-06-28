<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
				$('form:first').submit();
		});
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='furnitureStore_manager.php?action=delete&id='+id;
	}

</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">家居卖场列表</div><div class="title"><a href="furnitureStore_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th >LOGO</th>
			<th >名称</th>
			<th >地址</th>
			<th >电话</th>
			<th >营业时间</th>
			<th >排序号</th>
			<th >开启</th>
			<th >更新时间</th>
			<th width="100">操作</th>
		</tr>
		<!--{foreach from=$furnitureStoreList item=item key=key}--> 
		<tr align="center">
			<td><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.logo}-->"/></td>
			<td><!--{$item.name}--></td>
			<td><!--{$item.address}--></td>
			<td><!--{$item.phone}--></td>
			<td><!--{$item.businessTime}--></td>
			<td><!--{$item.orderNum}--></td>
			<td>
			<!--{if $item.state eq 1}-->
				是
				<!--{else}-->
				否
				<!--{/if}-->
			</td>
			<td><!--{$item.updateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><a href="furnitureStore_manager.php?action=update&id=<!--{$item.id}-->">修改</a> <a href="javascript:del(<!--{$item.id}-->)">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
