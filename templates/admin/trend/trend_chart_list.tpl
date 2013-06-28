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
			location.href='trend_chart_manager.php?action=delete&id='+id;
	}

</script>
<style type="text/css">
	.in_table{
		width:100%;
		height:100%;
		margin:0px;
	}
	.in_table td{
		border:1px solid #eee;
	}
	label{
		color:#000;
	}
</style>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图列表</div><div class="title"><a href="trend_chart_manager.php?action=add">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form action="trend_chart_manager.php?action=search" method="post">
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
		<select name="categoryId">
				<!--{if $categoryId eq '' || $searchType eq ''}-->
					<option value="" selected="selected">类别</option>
					<!--{foreach from=$trendCategoryList item=item key=key}--> 
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/foreach}-->
				<!--{else}-->
					<option value="" >类别</option>
					<!--{foreach from=$trendCategoryList item=item key=key}--> 
						<!--{if $categoryId eq $item.id}-->
						<option value="<!--{$item.id}-->" selected="selected"><!--{$item.name}--></option>
						<!--{else}-->
						<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
						<!--{/if}-->
					<!--{/foreach}-->
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
		<input type="button" value="查询" id="bnt"/> <input type="reset" value="重置"/>
	</form>
</div>
	<table cellspacing="0" cellpadding="0" >
		<!--{foreach from=$trendChartList item=item key=key}--> 
		<tr align="center">
			<td>
				<table class="in_table">
				  <tr>
				    <td colspan="3"><label>标题：</label><!--{$item.title}--></td>
				    <td><label>城市：</label><!--{$item.city}--></td>
				  </tr>
				  <tr>
				    <td width="25%"><label>类别：</label><!--{$item.categoryName}--></td>
				    <td width="25%"><label>区域或项目：</label><!--{$item.areaName}--></td>
				    <td width="25%"><label>大类：</label><!--{$item.type}--></td>
				    <td width="25%"><label>子类：</label><!--{$item.subType}--></td>
				  </tr>
				  <tr>
				    <td colspan="2" width="50%"><label>X轴：</label>
				    	时段：从<!--{$item.XFromYear}-->-<!--{$item.XFromMonth}--> 至
				    	<!--{if $item.XToToday eq 1}-->
				    		今
				    	<!--{else}-->
				    		<!--{$item.XToYear}-->-<!--{$item.XToMonth}-->
				    	<!--{/if}-->
				    	 步长：<!--{$item.XStep}-->个月 
				    	 标签旋转：<!--{$item.XRotate}-->度</td>
				    <td colspan="2"><label>Y轴：</label>最小值：<!--{$item.YFrom}--> 最大值：<!--{$item.YTo}--> 步长：<!--{$item.YStep}--></td>
				  </tr>
				  <tr>
				    <td><label>尺寸：</label><!--{$item.width}--> * <!--{$item.height}--></td>
				    <td><label style="float:left;">曲线颜色：</label><label style="float:left;width:100px;height:15px;background-color:<!--{$item.lineColor}-->"></label></td>
				    <td><label>序号：</label><!--{$item.orderNum}--></td>
				    <td><label>开启：</label>
						<!--{if $item.state eq 1}-->
				    		是
				    	<!--{else}-->
				    		否
				    	<!--{/if}-->
					</td>
				  </tr>
				</table>
			</td>
			<td width="50" VALIGN="middle"><a href="trend_chart_manager.php?action=view&id=<!--{$item.id}-->">预览</a><br/><a href="trend_chart_manager.php?action=update&id=<!--{$item.id}-->">修改</a><br/><a href="javascript:del(<!--{$item.id}-->)">删除</a></td>
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
