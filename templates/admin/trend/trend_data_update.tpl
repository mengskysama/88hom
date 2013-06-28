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
			location.href='trend_data_manager.php';
		});
		$('select[name="type"]').change(changeType);//大类改变时
		changeType();
		fillYear();//年份
		fillMonth();//月份
	});
	function check(){
		if($('input[name="price"]').val()=='')
		{
			alert('请输入数据！');
			$('input[name="price"]').focus();
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
			if(val=='<!--{$trendData.subType}-->')
				$('select[name="subType"]').append('<option selected="selected" value="'+val+'">' + val + '</option>');
			else
				$('select[name="subType"]').append('<option  value="'+val+'">' + val + '</option>');
		});
	}
	function fillYear(){
		$('select[name="year"]').empty();
		var date = new Date();
		currentYear = date.getFullYear();
		for(var year=2005;year<=currentYear;year++)
			if(year==<!--{$trendData.year}-->)
				$('select[name="year"]').append('<option selected="selected" value="'+year+'">' + year + '</option>');
			else
				$('select[name="year"]').append('<option value="'+year+'">' + year + '</option>');
	}
	function fillMonth(){
		$('select[name="month"]').empty();
		for(var month=1;month<=12;month++)
			if(month==<!--{$trendData.month}-->)
				$('select[name="month"]').append('<option selected="selected" value="'+month+'">' + month + '</option>');
			else
				$('select[name="month"]').append('<option value="'+month+'">' + month + '</option>');
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图数据更新</div>
</div>
	<form method="post" action="trend_data_manager.php?action=doUpdate">
	<input type="hidden" name="id" value="<!--{$trendData.id}-->"/>	
	<table cellspacing="0" cellpadding="0" >
		<tr >
			<td width="150">城市：</td>
			<td>
				<select name="city">
					<option value="深圳" selected="selected">深圳</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>区域或项目：</td>
			<td>
				<select name="areaId">
					<!--{foreach from=$trendAreaList item=item key=key}--> 
					<!--{if $trendData.areaId eq $item.id}-->
					<option value="<!--{$item.id}-->" selected="selected"><!--{$item.name}--></option>
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
					<!--{if $trendData.type eq '住宅'}-->
					<option value="住宅" selected="selected">住宅</option>
					<!--{else}-->
					<option value="住宅">住宅</option>
					<!--{/if}-->
					<!--{if $trendData.type eq '商铺'}-->
					<option value="商铺" selected="selected">商铺</option>
					<!--{else}-->
					<option value="商铺">商铺</option>
					<!--{/if}-->
					<!--{if $trendData.type eq '写字楼'}-->
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
					<option value="" selected="selected">请选择</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>年份：</td>
			<td>
				<select name="year">
					<option value="" selected="selected">请选择</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>月份：</td>
			<td>
				<select name="month">
					<option value="" selected="selected">请选择</option>
				</select><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>数据：</td>
			<td>
				<input name="price" value="<!--{$trendData.price}-->" class="input"/><font color="red">*</font>
			</td>
		</tr>
		<tr >
			<td>备注：</td>
			<td>
				<input name="memo" value="<!--{$trendData.memo}-->" class="input"/>
			</td>
		</tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
