<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
			location.href="community_manager.php?action=update&id=<!--{$community.communityId}-->";
		});
		$('#bnt1').click(function(){
			location.href="community_manager.php?action=pic&subAction=list&picBuildId=<!--{$community.communityId}-->";
		});
		$('#return').click(function(){
			location.href='community_manager.php';
		});
	});
	
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">小区详细</div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr ><td width="100">名称：</td><td><!--{$community.communityName}--></td></tr>
		<tr >
		<td width="100">
		所在区域：
			
		</td>
		<td>
			<script type="text/javascript">
				document.write(D[<!--{$community.communityProvince}-->][<!--{$community.communityCity}-->][<!--{$community.communityDistrict}-->]+'-'+A[<!--{$community.communityProvince}-->][<!--{$community.communityCity}-->][<!--{$community.communityDistrict}-->][<!--{$community.communityArea}-->]);
			</script>
		</td>
		</tr>
		<tr ><td width="100">物业类型：</td>
			<td>
				<!--{if $community.communityIsHouseType eq 1}-->
					住宅
				 <!--{/if}--> 
				 <!--{if $community.communityIsBusinessType eq 1}-->
					商铺
				 <!--{/if}--> 
				 <!--{if $community.communityIsOfficeType eq 1}-->
					写字楼
				 <!--{/if}-->
				 <!--{if $community.communityIsVillaType eq 1}-->
					别墅
				 <!--{/if}-->
			</td>
		</tr>
		<tr ><td width="100">建筑类型：</td><td><!--{$community.communityBuildType}--></td></tr>
		<tr ><td width="100" rowspan="2">基本信息：</td>
			<td>
				<span style="float:left;width:200px;">参考均价:<!--{$community.communityRefPrice}-->元</span>
				<span style="float:left;width:200px;">主力户型:<!--{$community.communityMainHouseModel}--> </span>
				<span style="float:left;width:200px;">物业费：<!--{$community.communityManagerFee}-->元/平米 </span>
				<span style="float:left;width:200px;">产权年限:<!--{$community.communityRight}-->年</span>
				<span style="float:left;width:200px;">停车位:<!--{$community.communityParkingSpace}--></span>
			</td>
		</tr>
		<tr >
			<td>
				<span style="float:left;width:200px;">总户数:<!--{$community.communityHouseholds}--></span>  	
				<span style="float:left;width:200px;">装修状况：<!--{$community.communityFitmentStatus}--></span>
				<span style="float:left;width:200px;">容积率:<!--{$community.communityVolRate}-->%</span> 
				<span style="float:left;width:200px;">绿化率:<!--{$community.communityGreenRate}-->%</span> 
				<span style="float:left;width:200px;">建筑面积:<!--{$community.communityBuildArea}-->平米 </span>
				<span style="float:left;width:200px;">占地面积:<!--{$community.communityLandArea}-->平米</span> 	
			</td>
		</tr>
		<tr ><td width="100">小区地址：</td><td><!--{$community.communityAddress}--></td></tr>
		<tr ><td width="100">地理信息：</td>
			<td>
				经度：<!--{$community.communityMapX}--> 
				纬度：<!--{$community.communityMapY}-->
			</td>
		</tr>
		<tr ><td width="100">项目特色：</td><td><!--{$community.communityProjectFeatures}--></td></tr>
		<tr ><td width="100">物业公司：</td><td><!--{$community.communityCompany}--></td></tr>
		<tr ><td width="100">物业公司地址：</td><td><!--{$community.communityCompanyAddress}--></td></tr>
		<tr ><td width="100">开发商：</td><td><!--{$community.communityDevCompany}--></td></tr>
		<tr ><td width="100">开发商地址：</td><td><!--{$community.communityDevCompanyAddress}--></td></tr>
		<tr ><td width="100">售楼地址：</td><td><!--{$community.communitySellHouseAddress}--></td></tr>
		<tr ><td width="100">交通状况：</td><td><!--{$community.communityTraffic}--></td></tr>
		<tr ><td width="100">配套信息：</td><td><!--{$community.communityPeriInfo}--></td></tr>
		<tr ><td width="100">小区楼盘简介：</td><td><!--{$community.communityBuildInfo}--></td></tr>
		<tr ><td width="100">控制设置：</td>
			<td>
				开启：<!--{if $community.communityState eq 1}-->
					是
					<!--{else}--> 
					否
				 	<!--{/if}--> 

				推荐：<!--{if $community.communityIsSuggest eq 1}-->
					是
					<!--{else}--> 
					否
				 	<!--{/if}--> 
				排序号：<!--{$community.communityOrderNum}-->
			</td>
		</tr>
		<tr ><td width="100">其它信息：</td><td>更新者：<!--{$community.userUsername}--> 更新时间：<!--{$community.communityUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="修改" id="bnt"/> <input type="button" value="相册管理" id="bnt1"/> <input type="button" value="返回" id="return"/></td></tr>
		<tr><td colspan="2" align="center">
			<!--{foreach from=$picList item=item key=key}--> 
			<div style="font-weight:bold;width:100%;float:left;margin:10px 0px;border-bottom:1px solid #ddd;text-align:left;"><!--{$item.type.pictypeName}--></div>
				<!--{foreach from=$item.picList item=item1 key=key1}-->
					<span style="float:left;margin:5px;text-align:left;">
						<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item1.picUrl}-->"><img height="200" src="<!--{$cfg.web_url}-->uploads/<!--{$item1.picThumb}-->"/></a><br />
						信息：<!--{$item1.picInfo}--><br />
						排序号：<!--{$item1.picLayer}--><br />
						开启：<!--{if $item1.picState eq 1}-->是<!--{else}-->否<!--{/if}--><br />
					</span>
					
				<!--{/foreach}-->
			<!--{/foreach}-->
		</td></tr>
	</table>
</body>
</html>
