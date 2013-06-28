<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
				$('form:first').submit();
		});
		$('#reset').click(function(){
			location.href='furniture_brand_manager.php';
		});
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='furniture_brand_manager.php?action=delete&id='+id;
	}

</script>
<style type="text/css">

</style>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">家居品牌馆列表</div><div class="title"><a href="furniture_brand_manager.php?action=add">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form method="post" action="furniture_brand_manager.php">
	名称：<input name="name" value="<!--{$name}-->" class="input"/>  
	类别：<select name="typeId" >
			<!--{if $typeId==''}-->
			<option value="" selected="selected">选择类别</option>
			<!--{/if}-->
			<!--{foreach from=$cfg.arr_pic.furnitureBrand item=item key=key}--> 
			<!--{if $typeId eq $key}-->
			<option value="<!--{$key}-->" selected="selected"><!--{$item}--></option>
			<!--{else}-->
			<option value="<!--{$key}-->"><!--{$item}--></option>
			<!--{/if}-->
			<!--{/foreach}-->
		</select>
		<input type="button" value="查询" id="bnt"/>
		<input type="reset" value="重置" id="reset"/>		
	</form>					
</div>
<div style="float:Left;width:100%;margin:10px 0px;">
<!--{foreach from=$furnitureBrandList item=item key=key}--> 
		<span style="float:left;width:200px;margin:5px;">
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->"><img width="150" src="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->"/></a><br />
			名称：<!--{$item.name}--><br />
			类别：<!--{$cfg.arr_pic.furnitureBrand[$item.typeId]}--><br />
			链接：<a <!--{if $item.url eq 'javascript:;'}--><!--{else}-->target="_blank"<!--{/if}--> href="<!--{$item.url}-->"><!--{if $item.url eq 'javascript:;'}-->-<!--{else}--><!--{$item.url}--><!--{/if}--></a><br />
			排序号：<!--{$item.orderNum}--><br />
			开启：<!--{if $item.state eq 1}-->是<!--{else}-->否<!--{/if}--><br />
			操作：<a href="furniture_brand_manager.php?action=update&id=<!--{$item.id}-->">修改</a> <a href="javascript:del(<!--{$item.id}-->)">删除</a> 
		</span>
<!--{/foreach}-->
</div>
<!--{if $pageHtml !=''}-->
	<span class="pagingPanel">
			<!--{$pageHtml}-->
	</span>
<!--{/if}-->
</body>
</html>
