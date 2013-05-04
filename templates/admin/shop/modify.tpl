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
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminShopModify();">
	<input type="hidden" id="id" name="id" value="<!--{$shopDetail.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">店铺编号：</td><td><input class="input" type="text" id="shopId" name="shopId" value="<!--{$shopDetail.shopId}-->"/></td>
		</tr>
		<tr>
			<td>店铺名称：</td><td><input class="input" type="text" id="shopName" name="shopName" value="<!--{$shopDetail.shopName}-->" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>店铺电话：</td><td><input class="input" type="text" id="shopTel" name="shopTel" value="<!--{$shopDetail.shopTel}-->"/></td>
		</tr>
		<tr>
			<td>店铺区域：</td><td>
				<span style="float: left;">
				<select id="areaId" name="areaId" onchange="exeAdminChangeArea();">
					<option value="">请选择店铺区域</option>
					<!--{html_options options=$areaList selected=$shopDetail.areaId}-->
				</select>
				</span>
				<!--{$spanArea}-->
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="修改信息"/></td>
		</tr>
	</table>
</form>
</body>
</html>
