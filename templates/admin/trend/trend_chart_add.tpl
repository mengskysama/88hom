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
		fillYear('XFromYear',0);//开始年份
		fillMonth('XFromMonth',0);//开始月份
		fillYear('XToYear',0);
		fillMonth('XToMonth',0);

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
			if($('select[name="XFromYear"]').val()>$('select[name="XToYear"]').val())
			{
				alert('X轴开始年必须小于等于结束年！');
				$('select[name="XToYear"]').focus();
				return false;
			}
			if($('select[name="XFromYear"]').val()==$('select[name="XToYear"]').val() && $('select[name="XFromMonth"]').val()>$('select[name="XToMonth"]').val()) 
			{
				alert('X轴开始月必须小于等于结束月！');
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
		$('select[name="subType"]').append('<option value="" selected="selected">请选择</option>');
		$.each(data,function(i,val){
			$('select[name="subType"]').append('<option value="'+val+'">' + val + '</option>');
		});
	}
	function fillYear(name,theYear){
		$('select[name="'+name+'"]').empty();
		if(theYear == 0)
		$('select[name="'+name+'"]').append('<option value="" selected="selected">年</option>');
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
		if(currentMonth == 0)
		$('select[name="' + name + '"]').append('<option value="" selected="selected">月</option>');
		
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
	<form method="post" action="trend_chart_manager.php?action=doAdd">
	<table cellspacing="0" cellpadding="0" >
		<tr >
			<td width="150">标题：</td>
			<td>
				<input  style="width:400px;" name="title" value="" class="input"/><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td width="150">城市：</td>
			<td>
				<select name="city">
					<option value="" selected="selected">请选择</option>
					<option value="深圳" >深圳</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>类别：</td>
			<td>
				<select name="categoryId">
					<option value="" selected="selected">请选择</option>
					<!--{foreach from=$trendCategoryList item=item key=key}--> 
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/foreach}-->
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>区域或项目：</td>
			<td>
				<select name="areaId">
					<option value="" selected="selected">请选择</option>
					<!--{foreach from=$trendAreaList item=item key=key}--> 
					<option value="<!--{$item.id}-->" ><!--{$item.name}--></option>
					<!--{/foreach}-->
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>大类：</td>
			<td>
				<select name="type">
					<option value="" selected="selected">请选择</option>
					<option value="住宅" >住宅</option>
					<option value="商铺" >商铺</option>
					<option value="写字楼" >写字楼</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>子类：</td>
			<td>
				<select name="subType">
					<option value="" selected="selected">请选择</option>
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
				<input type="radio" name="XToToday" value="1" checked="checked"/>至今 /
				<input type="radio" name="XToToday" value="0" />
				<select name="XToYear" style="width:80px;">
					<option value="" selected="selected">年</option>
				</select>
				<select name="XToMonth" style="width:80px;">
					<option value="" selected="selected">月</option>
				</select>
				 步长<input type="text" class="input" style="width:30px;" name="XStep" value="1"/>个月
				 标签旋转<input type="text" class="input" style="width:30px;" name="XRotate" value="270"/>度
				<font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>Y轴：</td>
			<td>最小值
				<input name="YFrom" class="input"/>
				最大值
				<input name="YTo" class="input"/>
				 步长<input type="text" class="input" style="width:80px;" name="YStep"/>
				<font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>尺寸：</td>
			<td>
				宽度<input name="width" value="" class="input"/> 高度<input name="height" value="" class="input"/><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>曲线颜色：</td>
			<td>
				<a href="javascript:void(0)" title="点击选择颜色" id="img" style="float:left;width:80px;height:20px;border:1px solid #666;background-color:#000000;"></a>
				<input name="lineColor" value="#000000" type="hidden"/>
			</td>
		</tr>
		<tr >
			<td>序号：</td>
			<td>
				<input name="orderNum" value="1" class="input"/>
			</td>
		</tr>
		<tr >
			<td>开启：</td>
			<td>
				<input name="state" type="radio" value="1" checked="checked"/>是  <input name="state" type="radio" value="0" />否
			</td>
		</tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
