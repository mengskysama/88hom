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
			location.href='type_manager.php';
		});
	});
	function check(){
		if($('input[name="adtypeName"]').val()=='')
		{
			alert('请输入类别名称！');
			$('input[name="adtypeName"]').focus();
			return false;
		}
		if($('input[name="adtypeKey"]').val()=='')
		{
			alert('请输入类别码！');
			$('input[name="adtypeKey"]').focus();
			return false;
		}
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告类别添加</div>
</div>
	<form method="post" action="type_manager.php?action=doAdd">
	<table cellspacing="0" cellpadding="0" >
		<tr ><td>类别名称：</td><td><input class="input" type="text" name="adtypeName"/></td></tr>
		<tr ><td>类别码：</td><td><input class="input" type="text" name="adtypeKey"/></td></tr>
		<tr ><td>是否开启：</td><td><input type="radio" name="adtypeState" checked="checked" value="1"/>是 <input type="radio" name="adtypeState" value="-1"/>否</td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
