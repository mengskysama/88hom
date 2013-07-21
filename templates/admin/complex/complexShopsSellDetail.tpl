<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">商铺房源详细</div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">所属小区：</td>
			<td><!--{$shopsDetail.communityName}--></td>
		</tr>
		<tr>
			<td>所在区域：</td>
			<td><!--{$shopsDetail.shopsAreaName}--></td>
		</tr>
		<tr>
			<td>商铺类型：</td>
			<td><!--{$shopsDetail.shopsType}--></td>
		</tr>
		<tr>
			<td>售价：</td>
			<td><!--{$shopsDetail.shopsSellPrice}--> 万元/套</td>
		</tr>
		<tr>
			<td>物业费：</td>
			<td><!--{$shopsDetail.shopsPropFee}--> 元/平米·月</td>
		</tr>
		<tr>
			<td>建筑面积：</td>
			<td>
			<!--{if $shopsDetail.shopsBuildArea>0}-->
			<!--{$shopsDetail.shopsBuildArea}--> 平方米
			<!--{else}-->
			--
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>楼层：</td>
			<td>第<!--{$shopsDetail.shopsFloor}-->层  共<!--{$shopsDetail.shopsAllFloor}-->层</td>
		</tr>
		<tr>
			<td>是否可分割：</td>
			<td><!--{$shopsDetail.shopsDivision}--></td>
		</tr>
		<tr>
			<td>装修程度：</td>
			<td><!--{$shopsDetail.shopsFitment}--></td>
		</tr>
		<tr>
			<td>配套设施：</td>
			<td><!--{$shopsDetail.shopsBaseServiceStr}--></td>
		</tr>
		<tr>
			<td>目标业态：</td>
			<td><!--{$shopsDetail.shopsAimOperastionStr}--></td>
		</tr>
		<tr>
			<td>当前状态：</td>
			<td>
			<!--{if $shopsDetail.shopsState==1}-->
				<font color="red">发布待审核</font>
			<!--{else if $shopsDetail.shopsState==5}-->
				<font color="blue">审核已通过</font>
			<!--{else if $shopsDetail.shopsState==4}-->
				<font color="blue">违规被退回</font>
			<!--{else if $shopsDetail.shopsState==2}-->
				<font color="blue">发布被删除</font>
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>标题：</td>
			<td><b><font color="red"><!--{$shopsDetail.shopsTitle}--></font></b></td>
		</tr>
		<tr>
			<td>房源描述：</td>
			<td><!--{$shopsDetail.shopsContent}--></td>
		</tr>
		<tr>
			<td colspan="2"><b><font style="font-size:12px;">图片信息</font></b></td>
		</tr> 
		<!--{foreach from=$shopsDetailPicTypeList item=item key=key}-->
		<tr>
			<td colspan="2"><b><font style="font-size:12px;"><!--{$item.name}--></font></b></td>
		</tr> 
		<tr>
		<td colspan="2">
		<!--{foreach from=$item.list item=item_ key=key_}-->
		<div style="height: 230px; width: 320px; float:left;" >
		<span>
		<a href="<!--{$cfg.web_url}-->uploads/<!--{$item_.picUrl}-->" target="_blank">
			<img height="200px;" src="<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->" alt="<!--{$item_.picInfo}-->"/>
		</a>
		</span>
		<br/>
		<span style="clear: left;">描述：<!--{$item_.picInfo}--></span>
		</div>
		<!--{/foreach}-->
		</td>
		</tr> 
		<!--{/foreach}-->
		<tr>
			<td>操作：</td>
			<td>
			<!--{if $shopsDetail.shopsState==1}-->
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a> 
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexShopsList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $shopsDetail.shopsState==5}-->
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexShopsList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $shopsDetail.shopsState==4}-->
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="javascript:exeAdminDelMessage('action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexShopsList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $shopsDetail.shopsState==2}-->
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="action.php?action=complexShopsChangeStateById&id=<!--{$shopsDetail.shopsId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="complexShopsList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a>
			<!--{/if}-->
			</td>
		</tr>
		<tr style="height: 50px;">
		</tr>
	</table>
</body>
</html>
