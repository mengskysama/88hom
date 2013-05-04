<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">信息修改</div>
</div>
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post">
	<input type="hidden" id="id" name="id" value="<!--{$rmDetail.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">招聘人数：</td><td><input class="input" type="text" id="persons" name="persons" value="<!--{$rmDetail.persons}-->"/></td>
		</tr>
		<tr>
			<td>过期天数：</td><td><input class="input" type="text" id="expired" name="expired" value="<!--{$rmDetail.expired_time}-->"/></td>
		</tr>
		<tr>
			<td>招聘部门：</td><td><input type="text" name="dept" id="dept" value="<!--{$rmDetail.dept}-->"/></td>
		</tr>
		<tr>
			<td>工作地点：</td><td><input type="text" name="address" id="address" value="<!--{$rmDetail.address}-->" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>招聘职位：</td><td>
				<select id="typeId" name="typeId">
					<option value="">请选择信息类别</option>
					<!--{html_options options=$rmTypeList selected=$rmDetail.type_id}-->
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
			<td>&nbsp;</td><td><input type="button" onclick="exeAdminRmModify();" value="修改信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
