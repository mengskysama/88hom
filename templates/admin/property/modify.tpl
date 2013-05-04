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
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminPropertyModify();">
	<input type="hidden" id="id" name="id" value="<!--{$propertyDetail.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">楼盘编号：</td><td><input class="input" type="text" id="propertyId" name="propertyId" value="<!--{$propertyDetail.propertyId}-->"/></td>
		</tr> 
		<tr>
			<td>楼盘名称：</td><td><input class="input" type="text" id="propertyName" name="propertyName" style="width: 300px;" value="<!--{$propertyDetail.propertyName}-->"/></td>
		</tr>
		<tr>
			<td>楼盘地址：</td><td><input class="input" type="text" id="propertyAddress" name="propertyAddress" style="width: 500px;" value="<!--{$propertyDetail.propertyAddress}-->"/></td>
		</tr>
		<tr>
			<td>楼盘区域：</td><td>
				<span style="float: left;">
				<select id="areaId" name="areaId" onchange="exeAdminChangeArea();">
					<option value="">请选择楼盘区域</option>
					<!--{html_options options=$areaList selected=$propertyDetail.areaId}-->
				</select>
				</span>
				<!--{$spanArea}-->
			</td>
		</tr>
		<tr>
			<td>户数：</td><td><input class="input" type="text" id="family" name="family" value="<!--{$propertyDetail.family}-->"/></td>
		</tr>
		<tr>
			<td>栋数：</td><td><input class="input" type="text" id="build" name="build" value="<!--{$propertyDetail.build}-->"/></td>
		</tr>
		<tr>
			<td>层数：</td><td><input class="input" type="text" id="layer" name="layer" value="<!--{$propertyDetail.layer}-->"/></td>
		</tr>
		<tr>
			<td>可投层数：</td><td><input class="input" type="text" id="canLayer" name="canLayer" value="<!--{$propertyDetail.canLayer}-->"/></td>
		</tr>
		<tr>
			<td>每层户数：</td><td><input class="input" type="text" id="canFamily" name="canFamily" value="<!--{$propertyDetail.canFamily}-->"/></td>
		</tr>
		<tr>
			<td>备注：</td>
			<td><!--{$FCKeditor}--></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="信息发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
