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
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post" onsubmit="return exeAdminStatementsRelease();">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">ѡ����̣�</td>
			<td>
			<select id="shopAreaId" name="shopAreaId" onchange="exeAdminChangeAreaForShop();">
				<option value="">��ѡ���������</option>
				<!--{html_options options=$areaList}-->
			</select>
			��
			<select id="shopId" name="shopId">
				<option value="">��ѡ�����</option>
			</select>
			</td>
		</tr> 
		<tr>
			<td>��/��ѡ��</td>
			<td>
			<input type="radio" name="status" value="1" checked="checked"/>��ѡ
			<input type="radio" name="status" value="0"/>��ѡ
			</td>
		</tr>
		<tr>
			<td>ѡ��¥�̣�</td>
			<td>
			<select id="propertyAreaId" name="propertyAreaId" onchange="exeAdminChangeAreaForProperty();">
				<option value="">��ѡ��¥������</option>
				<!--{html_options options=$areaList}-->
			</select>
			��
			<select id="propertyId" name="propertyId">
				<option value="">��ѡ��¥��</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>��Ͷ������</td><td><input class="input" type="text" id="canNum" name="canNum"/></td>
		</tr>
		<tr>
			<td>��Ͷ������</td><td><input class="input" type="text" id="endNum" name="endNum"/></td>
		</tr>
		<tr>
			<td>δͶ������</td><td><input class="input" type="text" id="notNum" name="notNum"/></td>
		</tr>
		<tr>
			<td>Ͷ�������</td><td><input class="input" type="text" id="dvState" name="dvState"/></td>
		</tr>
		<tr>
			<td>QCʱ�䣺</td><td><input class="input" type="text" id="qcTime" name="qcTime"/></td>
		</tr>
		<tr>
			<td>QC�����</td><td><input class="input" type="text" id="qcState" name="qcState"/></td>
		</tr>
		<tr>
			<td>QC֪ͨ��</td><td><input class="input" type="text" id="qcNotify" name="qcNotify"/></td>
		</tr>
		<tr>
			<td>�ƻ�Ͷ��ʱ�䣺</td><td><input class="input" type="text" id="planDvTime" name="planDvTime"/></td>
		</tr>
		<tr>
			<td>�ƻ�QCʱ�䣺</td><td><input class="input" type="text" id="planQcTime" name="planQcTime"/></td>
		</tr>
		<tr>
			<td>��ʼʱ�䣺</td><td><input class="input" type="text" id="startTime" name="startTime"/></td>
		</tr>
		<tr>
			<td>����ʱ�䣺</td><td><input class="input" type="text" id="endTime" name="endTime"/></td>
		</tr>
		<tr>
			<td>���ڣ�</td><td><input class="input" type="text" id="fileTime" name="fileTime"/></td>
		</tr>
		<tr>
			<td>���ڣ�</td><td><input class="input" type="text" id="fileDate" name="fileDate"/></td>
		</tr>
		<tr>
			<td>���������</td><td><input class="input" type="text" id="resolution" name="resolution"/></td>
		</tr>
		<tr>
			<td>Ͷ�ݱ�ע��</td>
			<td><!--{$FCKeditor}--></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="��Ϣ����"/></td>
		</tr>
	</table>
</form>
</body>
</html>
