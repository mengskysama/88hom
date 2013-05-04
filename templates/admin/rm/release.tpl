<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
function uploadHouseDrawing( furl,fname,thumbUrl ){
	var html='<div style="float: left;width:200px;margin-right:5px;" id="pic_outside">'
			+'<a target="_blank" href="<!--{$cfg.web_url}-->upfile/'+furl+'">'
			+'<img src="<!--{$cfg.web_url}-->upfile/'+thumbUrl+'" width="200" height="150">'
			+'</a>'
			//+'<input type="button" name="delete_pic_outside" onclick="dropContainer(\'pic_outside\')" value="删除"/>'
			+'</div>';
	$('#path').val(furl);
	$('#pathThumb').val(thumbUrl);
	$('#picOutside').html(html);
}
function dropContainer(containerId){
	$('#'+containerId).remove();
}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">招聘信息发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">招聘人数：</td><td><input type="text" name="persons" id="persons" value="3人"/></td>
		</tr>
		<tr>
			<td>过期天数：</td><td><input type="text" name="expired" id="expired" value="180"/>天  （设置招聘信息过期时间，默认为180天）</td>
		</tr>
		<tr>
			<td>招聘部门：</td><td><input type="text" name="dept" id="dept" value=""/></td>
		</tr>
		<tr>
			<td>工作地点：</td><td><input type="text" name="address" id="address" value="" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>招聘职位：</td><td>
				<select id="typeId" name="typeId" >
      					<option value="">请选择职位</option>
                		<!--{html_options options=$rmTypeList}-->
      			</select>
			</td>
		</tr>
		<tr>
			<td>招聘要求：</td>
			<td>
				<!--{$FCKeditor}-->
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminRmRelease();" value="信息发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
