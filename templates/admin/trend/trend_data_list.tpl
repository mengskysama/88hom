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
		fillYear();//年份
		fillMonth();//月份
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='trend_data_manager.php?action=delete&id='+id;
	}
	function fillYear(){
		var date = new Date();
		currentYear = date.getFullYear();
		
		$('select[name="year"]').empty();
		<!--{if $year eq '' || $searchType eq ''}-->
			$('select[name="year"]').append('<option value="" selected="selected">年份</option>');
			for(var year=2005;year<=currentYear;year++)
				$('select[name="year"]').append('<option value="'+year+'">' + year + '</option>');
		<!--{else}-->
			$('select[name="year"]').append('<option value="" >年份</option>');
			for(var year=2005;year<=currentYear;year++)
				if(year==<!--{$year}-->)
					$('select[name="year"]').append('<option selected="selected" value="'+year+'">' + year + '</option>');
				else
					$('select[name="year"]').append('<option value="'+year+'">' + year + '</option>');
		<!--{/if}-->		
	}
	function fillMonth(){
		$('select[name="month"]').empty();
		<!--{if $month eq '' || $searchType eq ''}-->
			$('select[name="month"]').append('<option value="" selected="selected">月份</option>');
			for(var month=1;month<=12;month++)
					$('select[name="month"]').append('<option value="'+month+'">' + month + '</option>');
		<!--{else}-->
			$('select[name="month"]').append('<option value="" >月份</option>');

			for(var month=1;month<=12;month++)
				if(month==<!--{$month}-->)
					$('select[name="month"]').append('<option selected="selected" value="'+month+'">' + month + '</option>');
				else
					$('select[name="month"]').append('<option value="'+month+'">' + month + '</option>');
		<!--{/if}-->	
		
		
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图数据列表</div><div class="title"><a href="trend_data_manager.php?action=add">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form action="trend_data_manager.php?action=search" method="post">
		<!--{if $searchType eq ''}-->
		<input type="radio" name="searchType" checked="checked" value=""/>全部
		<input type="radio" name="searchType" value="other"/>条件
		<!--{else}-->
		<input type="radio" name="searchType"  value=""/>全部
		<input type="radio" name="searchType" checked="checked" value="other"/>条件
		<!--{/if}-->
		<select name="city">
			<!--{if $city eq '' || $searchType eq ''}-->
				<option value="" selected="selected">城市</option>
				<option value="深圳" >深圳</option>
			<!--{else}-->
				<option value="" >城市</option>
				<option value="深圳" selected="selected">深圳</option>
			<!--{/if}-->		
		</select>
		<select name="type">
			<!--{if $type eq '' || $searchType eq ''}-->
				<option value="" selected="selected">大类</option>
				<option value="住宅" >住宅</option>
				<option value="商铺" >商铺</option>
				<option value="写字楼" >写字楼</option>
			<!--{else}-->
				<option value="" >大类</option>
				<!--{if $type eq '住宅'}-->
					<option value="住宅" selected="selected">住宅</option>
				<!--{else}-->
					<option value="住宅" >住宅</option>
				<!--{/if}-->
				
				<!--{if $type eq '商铺'}-->
					<option value="商铺" selected="selected">商铺</option>
				<!--{else}-->
					<option value="商铺" >商铺</option>
				<!--{/if}-->
				
				<!--{if $type eq '写字楼'}-->
					<option value="写字楼" selected="selected">写字楼</option>
				<!--{else}-->
					<option value="写字楼" >写字楼</option>
				<!--{/if}-->
			<!--{/if}-->		
		</select>
		<select name="subType">
				<!--{if $subType eq '' || $searchType eq ''}-->
					<option value="" selected="selected">子类</option>
					<option value="一手楼价" >一手楼价</option>
					<option value="二手楼价" >二手楼价</option>
					<option value="二手租金" >二手租金</option>
					<option value="二手负担比" >二手负担比</option>
					<option value="二手租金回报率" >二手租金回报率</option>
					<option value="年回报率" >年回报率</option>
				<!--{else}-->
					<option value="" >子类</option>
					<!--{if $subType eq '一手楼价'}-->
						<option value="一手楼价" selected="selected">一手楼价</option>
					<!--{else}-->
						<option value="一手楼价" >一手楼价</option>
					<!--{/if}-->
					<!--{if $subType eq '二手楼价'}-->
						<option value="二手楼价" selected="selected">二手楼价</option>
					<!--{else}-->
						<option value="二手楼价" >二手楼价</option>
					<!--{/if}-->
					<!--{if $subType eq '二手租金'}-->
						<option value="二手租金" selected="selected">二手租金</option>
					<!--{else}-->
						<option value="二手租金" >二手租金</option>
					<!--{/if}-->
					<!--{if $subType eq '二手负担比'}-->
						<option value="二手负担比" selected="selected">二手负担比</option>
					<!--{else}-->
						<option value="二手负担比" >二手负担比</option>
					<!--{/if}-->
					<!--{if $subType eq '二手租金回报率'}-->
						<option value="二手租金回报率" selected="selected">二手租金回报率</option>
					<!--{else}-->
						<option value="二手租金回报率" >二手租金回报率</option>
					<!--{/if}-->
					<!--{if $subType eq '年回报率'}-->
						<option value="年回报率" selected="selected">年回报率</option>
					<!--{else}-->
						<option value="年回报率" >一手楼</option>
					<!--{/if}-->
				<!--{/if}-->	
		</select>
		<select name="areaId">
				<!--{if $areaId eq '' || $searchType eq ''}-->
					<option value="" selected="selected">区域或项目</option>
					<!--{foreach from=$trendAreaList item=item key=key}--> 
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/foreach}-->
				<!--{else}-->
					<option value="" >区域或项目</option>
					<!--{foreach from=$trendAreaList item=item key=key}--> 
						<!--{if $areaId eq $item.id}-->
						<option value="<!--{$item.id}-->" selected="selected"><!--{$item.name}--></option>
						<!--{else}-->
						<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
						<!--{/if}-->
					<!--{/foreach}-->
				<!--{/if}-->	
		</select>
		<select name="year">
				
		</select>
		<select name="month">
				
		</select>
		<input type="button" value="查询" id="bnt"/> <input type="reset" value="重置"/>
	</form>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th >城市</th>
			<th >区域或项目</th>
			<th >大类</th>
			<th >子类</th>
			<th >年份</th>
			<th >月份</th>
			<th >数据</th>
			<th >备注</th>
			<th width="100">操作</th>
		</tr>
		<!--{foreach from=$trendDataList item=item key=key}--> 
		<tr align="center">
			<td><!--{$item.city}--></td>
			<td><!--{$item.areaName}--></td>
			<td><!--{$item.type}--></td>
			<td><!--{$item.subType}--></td>
			<td><!--{$item.year}--></td>
			<td><!--{$item.month}--></td>
			<td><!--{$item.price}--></td>
			<td><!--{$item.memo}--></td>
			<td><a href="trend_data_manager.php?action=update&id=<!--{$item.id}-->">修改</a> <a href="javascript:del(<!--{$item.id}-->)">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<!--{if $pageHtml !=''}-->
	<span class="pagingPanel">
			<!--{$pageHtml}-->
	</span>
	<!--{/if}-->
</body>
</html>
