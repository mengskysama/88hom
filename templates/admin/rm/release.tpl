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
			//+'<input type="button" name="delete_pic_outside" onclick="dropContainer(\'pic_outside\')" value="ɾ��"/>'
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
	<div class="title">��Ƹ��Ϣ����</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">��Ƹ������</td><td><input type="text" name="persons" id="persons" value="3��"/></td>
		</tr>
		<tr>
			<td>����������</td><td><input type="text" name="expired" id="expired" value="180"/>��  ��������Ƹ��Ϣ����ʱ�䣬Ĭ��Ϊ180�죩</td>
		</tr>
		<tr>
			<td>��Ƹ���ţ�</td><td><input type="text" name="dept" id="dept" value=""/></td>
		</tr>
		<tr>
			<td>�����ص㣺</td><td><input type="text" name="address" id="address" value="" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>��Ƹְλ��</td><td>
				<select id="typeId" name="typeId" >
      					<option value="">��ѡ��ְλ</option>
                		<!--{html_options options=$rmTypeList}-->
      			</select>
			</td>
		</tr>
		<tr>
			<td>��ƸҪ��</td>
			<td>
				<!--{$FCKeditor}-->
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminRmRelease();" value="��Ϣ����"/></td>
		</tr>
	</table>
</form>
</body>
</html>
