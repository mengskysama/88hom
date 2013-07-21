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
	<div class="title">住宅房源详细</div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="100">所属小区：</td>
			<td><!--{$houseDetail.communityName}--></td>
		</tr>
		<tr>
			<td>所在区域：</td>
			<td><!--{$houseDetail.houseAreaName}--></td>
		</tr>
		<tr>
			<td>产权信息：</td>
			<td><!--{$houseDetail.housePayInfo}--></td>
		</tr>
		<tr>
			<td>住房类型：</td>
			<td><!--{$houseDetail.houseType}--></td>
		</tr>
		<tr>
			<td>售价：</td>
			<td><!--{$houseDetail.houseSellPrice}--> 万元/套</td>
		</tr>
		<tr>
			<td>户型：</td>
			<td>
			<!--{if $houseDetail.houseRoom>0}-->
				<!--{$houseDetail.houseRoom}-->室
			<!--{/if}--> 
			<!--{if $houseDetail.houseHall>0}-->
				<!--{$houseDetail.houseHall}-->厅
			<!--{/if}--> 
			<!--{if $houseDetail.houseToilet>0}-->
				<!--{$houseDetail.houseToilet}-->卫
			<!--{/if}-->
			<!--{if $houseDetail.houseKitchen>0}-->
				<!--{$houseDetail.houseKitchen}-->厨房
			<!--{/if}-->
			<!--{if $houseDetail.houseBalcony>0}-->
				<!--{$houseDetail.houseBalcony}-->阳台
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>建筑形式：</td>
			<td><!--{$houseDetail.houseBuildForm}--></td>
		</tr>
		<tr>
			<td>建筑面积：</td>
			<td>
			<!--{if $houseDetail.houseBuildArea>0}-->
			<!--{$houseDetail.houseBuildArea}--> 平方米
			<!--{else}-->
			--
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>使用面积：</td>
			<td>
			<!--{if $houseDetail.houseUseArea>0}-->
			<!--{$houseDetail.houseUseArea}--> 平方米
			<!--{else}-->
			--
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>建筑年代：</td>
			<td>
			<!--{if $houseDetail.houseBuildYear>0}-->
			<!--{$houseDetail.houseBuildYear}--> 年
			<!--{else}-->
			--
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>楼层：</td>
			<td>第<!--{$houseDetail.houseFloor}-->层  共<!--{$houseDetail.houseAllFloor}-->层</td>
		</tr>
		<tr>
			<td>朝向：</td>
			<td><!--{$houseDetail.houseForward}--></td>
		</tr>
		<tr>
			<td>装修程度：</td>
			<td><!--{$houseDetail.houseFitment}--></td>
		</tr>
		<tr>
			<td>配套设施：</td>
			<td><!--{$houseDetail.houseBaseServiceStr}--></td>
		</tr>
		<tr>
			<td>看房时间：</td>
			<td><!--{$houseDetail.houseLookTime}--></td>
		</tr>
		<tr>
			<td>当前状态：</td>
			<td>
			<!--{if $houseDetail.houseState==1}-->
				<font color="red">发布待审核</font>
			<!--{else if $houseDetail.houseState==5}-->
				<font color="blue">审核已通过</font>
			<!--{else if $houseDetail.houseState==4}-->
				<font color="blue">违规被退回</font>
			<!--{else if $houseDetail.houseState==2}-->
				<font color="blue">发布被删除</font>
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>标题：</td>
			<td><b><font color="red"><!--{$houseDetail.houseTitle}--></font></b></td>
		</tr>
		<tr>
			<td>房源描述：</td>
			<td><!--{$houseDetail.houseContent}--></td>
		</tr>
		<tr>
			<td colspan="2"><b><font style="font-size:12px;">图片信息</font></b></td>
		</tr> 
		<!--{foreach from=$houseDetailPicTypeList item=item key=key}-->
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
			<!--{if $houseDetail.houseState==1}-->
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a> 
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexHouseList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $houseDetail.houseState==5}-->
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexHouseList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $houseDetail.houseState==4}-->
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="javascript:exeAdminDelMessage('action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a>
				<a href="complexHouseList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a> 
			<!--{else if $houseDetail.houseState==2}-->
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="action.php?action=complexHouseChangeStateById&id=<!--{$houseDetail.houseId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="complexHouseList.php?type=<!--{$type}-->&state=<!--{$state}-->">返回上一级</a>
			<!--{/if}-->
			</td>
		</tr>
		<tr style="height: 50px;">
		</tr>
	</table>
</body>
</html>
