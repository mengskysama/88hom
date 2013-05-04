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
	<div class="title">信息发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post" onsubmit="return exeAdminStatementsRelease();">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">选择店铺：</td>
			<td>
			<select id="shopAreaId" name="shopAreaId" onchange="exeAdminChangeAreaForShop();">
				<option value="">请选择店铺区域</option>
				<!--{html_options options=$areaList}-->
			</select>
			—
			<select id="shopId" name="shopId">
				<option value="">请选择店铺</option>
			</select>
			</td>
		</tr> 
		<tr>
			<td>正/备选：</td>
			<td>
			<input type="radio" name="status" value="1" checked="checked"/>正选
			<input type="radio" name="status" value="0"/>备选
			</td>
		</tr>
		<tr>
			<td>选择楼盘：</td>
			<td>
			<select id="propertyAreaId" name="propertyAreaId" onchange="exeAdminChangeAreaForProperty();">
				<option value="">请选择楼盘区域</option>
				<!--{html_options options=$areaList}-->
			</select>
			—
			<select id="propertyId" name="propertyId">
				<option value="">请选择楼盘</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>可投数量：</td><td><input class="input" type="text" id="canNum" name="canNum"/></td>
		</tr>
		<tr>
			<td>已投数量：</td><td><input class="input" type="text" id="endNum" name="endNum"/></td>
		</tr>
		<tr>
			<td>未投数量：</td><td><input class="input" type="text" id="notNum" name="notNum"/></td>
		</tr>
		<tr>
			<td>投递情况：</td><td><input class="input" type="text" id="dvState" name="dvState"/></td>
		</tr>
		<tr>
			<td>QC时间：</td><td><input class="input" type="text" id="qcTime" name="qcTime"/></td>
		</tr>
		<tr>
			<td>QC情况：</td><td><input class="input" type="text" id="qcState" name="qcState"/></td>
		</tr>
		<tr>
			<td>QC通知：</td><td><input class="input" type="text" id="qcNotify" name="qcNotify"/></td>
		</tr>
		<tr>
			<td>计划投递时间：</td><td><input class="input" type="text" id="planDvTime" name="planDvTime"/></td>
		</tr>
		<tr>
			<td>计划QC时间：</td><td><input class="input" type="text" id="planQcTime" name="planQcTime"/></td>
		</tr>
		<tr>
			<td>开始时间：</td><td><input class="input" type="text" id="startTime" name="startTime"/></td>
		</tr>
		<tr>
			<td>结束时间：</td><td><input class="input" type="text" id="endTime" name="endTime"/></td>
		</tr>
		<tr>
			<td>档期：</td><td><input class="input" type="text" id="fileTime" name="fileTime"/></td>
		</tr>
		<tr>
			<td>日期：</td><td><input class="input" type="text" id="fileDate" name="fileDate"/></td>
		</tr>
		<tr>
			<td>解决方案：</td><td><input class="input" type="text" id="resolution" name="resolution"/></td>
		</tr>
		<tr>
			<td>投递备注：</td>
			<td><!--{$FCKeditor}--></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="信息发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
