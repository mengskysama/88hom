<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	$("#time").datepicker({
//		changeYear: true,
//		changeMonth: true,
		showButtonPanel: true
	});
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">��Ϣ�޸�</div>
</div>
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminNewsModify();">
	<input type="hidden" id="nid" name="nid" value="<!--{$nid}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">���⣺</td><td><input class="input" type="text" id="title" name="title" value="<!--{$infoDetail.NewsTitle}-->" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>��Ϣ���飺</td>
			<td>
				<!--{$FCKeditor}-->
			</td>
		</tr>
		<tr>
			<td>����ʱ�䣺</td>
			<td><input class="input" type="text" id="time" name="time" value="<!--{$infoDetail.AddTime}-->"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="�޸���Ϣ"/></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
//$.ajax({
//	type : "GET", 
//	async : false, 
//	cache : false,
//	url : "http://xinghe.lentor.net/api/news.asmx/NewsDetail", 
//	data:"AuthCode='7f811343960162de'&nid=<!--{$nid}-->",
//	dataType : "jsonp", 
//	jsonp: "callback",
//	jsonpCallback:"ddddddd",
//	success : function(data){ 
//		//alert(data.d);
//		var obj=jQuery.parseJSON(data.d);
//		$('#title').val(obj.NewsTitle);
//		editor.setData(obj.NewsContent);
//		$('#time').val(obj.AddTime);
//	}, 
//	error:function(){ 
//		alert('fail'); 
//	} 
//});
</script>
</body>
</html>
