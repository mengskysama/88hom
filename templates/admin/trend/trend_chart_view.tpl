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
			location.href='trend_chart_manager.php?action=update&id=<!--{$trendChart.id}-->';
		});
		$('#return').click(function(){
			location.href='trend_chart_manager.php';
		});
		initChart();
	});
	function check(){
		if($('input[name="name"]').val()=='')
		{
			alert('请输入名称！');
			$('input[name="name"]').focus();
			return false;
		}
		return true;
	}
	var chartData = null;
	function initChart(){
		$.ajax({
			url:'trend_chart_manager.php?action=getChart&id=<!--{$trendChart.id}-->',
			dataType:'json',
			success:function(data){
				chartData = data.data;
				swfobject.embedSWF("<!--{$cfg.web_common}-->open-flash-chart.swf", "chart", data.width+"px", data.height+"px", "9.0.0","<!--{$cfg.web_common}-->flowplayer/expressInstall.swf", {"get-data" : "getChartData"},{wmode: "opaque"} );
			}
		});
	}
	function getChartData() {
		return JSON.stringify(chartData);
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图预览</div>
</div>
	
	<table cellspacing="0" cellpadding="0" >
		<tr ><td align="center"><!--{$trendChart.title}--></td></tr>
		<tr ><td  align="center" >
			<div id="chart"></div>
		</td></tr>
		<tr ><td align="center"><input type="button" value="修改" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>

</body>
</html>
