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
	<div class="title">��Ϣ����</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post" onsubmit="return exeAdminShopRelease();">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">���̱�ţ�</td><td><input class="input" type="text" id="shopId" name="shopId" /></td>
		</tr> 
		<tr>
			<td>�������ƣ�</td><td><input class="input" type="text" id="shopName" name="shopName" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>���̵绰��</td><td><input class="input" type="text" id="shopTel" name="shopTel"/></td>
		</tr>
		<tr>
			<td>��������</td><td>
				<select id="areaId" name="areaId" onchange="exeAdminChangeArea();">
					<option value="">��ѡ������</option>
					<!--{html_options options=$areaList}-->
				</select>
				<span id="span_areaId" style="display: none;"><a id="a_areaId" href="">������һ�����</a></span>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="��Ϣ����"/></td>
		</tr>
	</table>
</form>
</body>
</html>
