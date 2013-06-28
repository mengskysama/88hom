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
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='trend_area_manager.php';
		});
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
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">走势图区域或项目更新</div>
</div>
	<form method="post" action="trend_area_manager.php?action=doUpdate">
	<input name="id" type="hidden" value="<!--{$trendArea.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr ><td>名称：</td><td><input class="input" type="text" name="name" value="<!--{$trendArea.name}-->"/><font color="red">*</font></td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
