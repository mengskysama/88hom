<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	var subTypeData_zuzai = ['一手楼价','二手楼价','二手租金','二手负担比'];
	var subTypeData_shangpu = ['一手楼价','二手楼价','二手租金','二手租金回报率'];
	var subTypeData_xiezilou = ['一手楼价','二手楼价','二手租金','年回报率'];
	
	$(document).ready(function(){
		$('#bnt').click(function(){
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='trend_chart_manager.php';
		});
		$('select[name="type"]').change(changeType);//大类改变时
		changeType();
		fillYear('XFromYear',<!--{$trendChart.XFromYear}-->);//开始年份
		fillMonth('XFromMonth',<!--{$trendChart.XFromYear}-->);//开始月份
		fillYear('XToYear',0);
		fillMonth('XToMonth',0);
		fillMonth();//月份
		$("#img").bigColorpicker(function(el,color){//曲线颜色
			$(el).css("backgroundColor",color);
			$('input[name="lineColor"]').val(color);
		});
	});
	function check(){
		if($('input[name="title"]').val()=='')
		{
			alert('请输入标题！');
			$('input[name="title"]').focus();
			return false;
		}
		if($('select[name="city"]').val()=='')
		{
			alert('请选择城市！');
			$('select[name="city"]').focus();
			return false;
		}
		if($('select[name="categoryId"]').val()=='')
		{
			alert('请选择类别！');
			$('select[name="categoryId"]').focus();
			return false;
		}
		if($('select[name="areaId"]').val()=='')
		{
			alert('请选择区域或项目！');
			$('select[name="areaId"]').focus();
			return false;
		}
		if($('select[name="type"]').val()=='')
		{
			alert('请选择大类！');
			$('select[name="type"]').focus();
			return false;
		}
		if($('select[name="subType"]').val()=='')
		{
			alert('请选择子类！');
			$('select[name="subType"]').focus();
			return false;
		}
		if($('select[name="XFromYear"]').val()=='')
		{
			alert('请选择X轴开始年份！');
			$('select[name="XFromYear"]').focus();
			return false;
		}
		if($('select[name="XFromMonth"]').val()=='')
		{
			alert('请选择X轴开始月份！');
			$('select[name="XFromMonth"]').focus();
			return false;
		}
		if($('input[name="XToToday"]:checked').val()=='0') 
		{
			if($('select[name="XToYear"]').val()=='')
			{
				alert('请选择X轴结束年份！');
				$('select[name="XToYear"]').focus();
				return false;
			}
			if($('select[name="XToMonth"]').val()=='')
			{
				alert('请选择X轴结束月份！');
				$('select[name="XToMonth"]').focus();
				return false;
			}
		}
		if(!/^[1-9]$/.test($('input[name="XStep"]').val()))
		{
			alert('请输入有效的X轴步长！');
			$('input[name="XStep"]').focus();
			return false;
		}
		if(!/^\d+$/.test($('input[name="XRotate"]').val()))
		{
			alert('请输入有效的X轴标签旋转度！');
			$('input[name="XRotate"]').focus();
			return false;
		}
		if(!/^\d+(\.\d+)?$/.test($('input[name="YFrom"]').val()))
		{
			alert('请输入有效的Y轴最小值！');
			$('input[name="YFrom"]').focus();
			return false;
		}
		if(!/^\d+(\.\d+)?$/.test($('input[name="YTo"]').val()))
		{
			alert('请输入有效的Y轴最大值！');
			$('input[name="YTo"]').focus();
			return false;
		}
		if(!/^\d+(\.\d+)?$/.test($('input[name="YStep"]').val()))
		{
			alert('请输入有效的Y轴步长！');
			$('input[name="YStep"]').focus();
			return false;
		}
		if(!/^\d+$/.test($('input[name="width"]').val()))
		{
			alert('请输入有效的宽度！');
			$('input[name="width"]').focus();
			return false;
		}
		if(!/^\d+$/.test($('input[name="height"]').val()))
		{
			alert('请输入有效的高度！');
			$('input[name="height"]').focus();
			return false;
		}
		if(!/^\d+$/.test($('input[name="orderNum"]').val()))
		{
			alert('请输入有效的序号！');
			$('input[name="orderNum"]').focus();
			return false;
		}
		return true;
	}
	function changeType(){
		if($('select[name="type"]').val() == '住宅'){
			fillSubType(subTypeData_zuzai);
		}
		else if($('select[name="type"]').val() == '商铺'){
			fillSubType(subTypeData_shangpu);
		}
		else if($('select[name="type"]').val() == '写字楼'){
			fillSubType(subTypeData_xiezilou);
		}
	}
	function fillSubType(data){//充填小类
		$('select[name="subType"]').empty();
		$.each(data,function(i,val){
			if(val=='<!--{$trendChart.subType}-->')
				$('select[name="subType"]').append('<option selected="selected" value="'+val+'">' + val + '</option>');
			else
				$('select[name="subType"]').append('<option  value="'+val+'">' + val + '</option>');
		});
	}
	function fillYear(name,theYear){
		$('select[name="'+name+'"]').empty();
		var date = new Date();
		currentYear = date.getFullYear();
		for(var year=2005;year<=currentYear;year++)
			if(year == theYear)
				$('select[name="'+name+'"]').append('<option selected="selected" value="'+year+'">' + year + '</option>');
			else
				$('select[name="'+name+'"]').append('<option value="'+year+'">' + year + '</option>');
	}
	function fillMonth(name,currentMonth){
		$('select[name="' + name + '"]').empty();
		for(var month=1;month<=12;month++)
			if(month == currentMonth)
				$('select[name="' + name + '"]').append('<option  selected="selected" value="'+month+'">' + month + '</option>');
			else
				$('select[name="' + name + '"]').append('<option  value="'+month+'">' + month + '</option>');
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图添加</div>
</div>
	<form method="post" action="trend_chart_manager.php?action=doUpdate">
	<input type="hidden" name="id" value="<!--{$trendChart.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr >
			<td width="150">标题：</td>
			<td>
				<input style="width:400px;" name="title" value="<!--{$trendChart.title}-->" class="input"/><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td width="150">城市：</td>
			<td>
				<select name="city">
					<option selected="selected" value="深圳" >深圳</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>类别：</td>
			<td>
				<select name="categoryId">
					<!--{foreach from=$trendCategoryList item=item key=key}--> 
					<!--{if $trendChart.categoryId eq $item.id}-->
					<option value="<!--{$item.id}-->" selected="selected"><!--{$item.name}--></option>
					<!--{else}-->
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/if}-->
					<!--{/foreach}-->
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>区域或项目：</td>
			<td>
				<select name="areaId">
					<!--{foreach from=$trendAreaList item=item key=key}-->
					<!--{if $trendChart.areaId eq $item.id}--> 
					<option value="<!--{$item.id}-->"  selected="selected"><!--{$item.name}--></option>
					<!--{else}-->
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/if}-->
					<!--{/foreach}-->
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>大类：</td>
			<td>
				<select name="type">
					<!--{if $trendChart.type eq '住宅'}-->
					<option value="住宅" selected="selected">住宅</option>
					<!--{else}-->
					<option value="住宅">住宅</option>
					<!--{/if}-->
					<!--{if $trendChart.type eq '商铺'}-->
					<option value="商铺" selected="selected">商铺</option>
					<!--{else}-->
					<option value="商铺">商铺</option>
					<!--{/if}-->
					<!--{if $trendChart.type eq '写字楼'}-->
					<option value="写字楼" selected="selected">写字楼</option>
					<!--{else}-->
					<option value="写字楼">写字楼</option>
					<!--{/if}-->
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>子类：</td>
			<td>
				<select name="subType">
					
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>X轴：</td>
			<td>从
				<select name="XFromYear" style="width:80px;">
					<option value="" selected="selected">年</option>
				</select>
				<select name="XFromMonth" style="width:80px;">
					<option value="" selected="selected">月</option>
				</select> 
				——
				<!--{if $trendChart.XToToday eq 1}-->
				<input type="radio" name="XToToday" value="1" checked="checked"/>至今 /
				<input type="radio" name="XToToday" value="0" />
				<select name="XToYear" style="width:80px;">
					<option value="" selected="selected">年</option>
				</select>
				<select name="XToMonth" style="width:80px;">
					<option value="" selected="selected">月</option>
				</select>
				<!--{else}-->
				<input type="radio" name="XToToday" value="1"/>至今 /
				<input type="radio" name="XToToday" value="0"  checked="checked"/>
				<script type="text/javascript">
						fillYear('XToYear',<!--{$trendChart.XToYear}-->);
						fillMonth('XToMonth',<!--{$trendChart.XToMonth}-->);
				</script>
				<select name="XToYear" style="width:80px;">
					
				</select>
				<select name="XToMonth" style="width:80px;">
					
				</select>
				<!--{/if}-->
				 步长<input type="text" class="input" style="width:30px;" name="XStep" value="<!--{$trendChart.XStep}-->"/>个月
				 标签旋转<input type="text" class="input" style="width:30px;" name="XRotate" value="<!--{$trendChart.XRotate}-->"/>度
				<font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>Y轴：</td>
			<td>最小值
				<input name="YFrom" class="input" value="<!--{$trendChart.YFrom}-->"/>
				最大值
				<input name="YTo" class="input" value="<!--{$trendChart.YTo}-->"/>
				 步长<input type="text" class="input" style="width:80px;" name="YStep" value="<!--{$trendChart.YStep}-->"/>
				<font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>尺寸：</td>
			<td>
				宽度<input name="width" value="<!--{$trendChart.width}-->" class="input"/> 高度<input name="height" value="<!--{$trendChart.height}-->" class="input"/><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>曲线颜色：</td>
			<td>
				<a href="javascript:void(0)" title="点击选择颜色" id="img" style="float:left;width:80px;height:20px;border:1px solid #666;background-color:<!--{$trendChart.lineColor}-->;"></a>
				<input name="lineColor" value="<!--{$trendChart.lineColor}-->" type="hidden"/>
			</td>
		</tr>
		<tr >
			<td>序号：</td>
			<td>
				<input name="orderNum" value="<!--{$trendChart.orderNum}-->" class="input"/>
			</td>
		</tr>
		<tr >
			<td>开启：</td>
			<td>
			<!--{if $trendChart.state eq 1}-->
				<input name="state" type="radio" value="1" checked="checked"/>是  <input name="state" type="radio" value="0" />否
			<!--{else}-->
				<input name="state" type="radio" value="1" />是  <input name="state" type="radio" value="0" checked="checked"/>否
			<!--{/if}-->	
			</td>
		</tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
