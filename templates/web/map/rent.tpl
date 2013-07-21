<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->租房地图</title>
<script src="http://api.map.baidu.com/api?v=1.4" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/RectangleZoom/1.2/src/RectangleZoom_min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/DistanceTool/1.2/src/DistanceTool_min.js"></script>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(initRent);
</script>
</head>
<body>
<!--头部  -->
<!--{include file="map/header.tpl"}-->
<div class="fl">
	<table width="1140" height="57" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="320" id="buildType"><span class="bt">[物业类型]</span><a href="javascript:;" class="bx" val="1">住宅</a><a href="javascript:;" val="2">商铺</a><a href="javascript:;" val="3">写字楼</a><a href="javascript:;" val="4">别墅</a></td>
            <td width="815" id="price"><span class="bt">[租 金]</span><a href="javascript:;" class="bx" val="0">不限</a><a href="javascript:;" val="1">500以下</a><a href="javascript:;" val="2">500-1000</a><a href="javascript:;" val="3">100-2000</a><a href="javascript:;" val="4">2000-3000</a><a href="javascript:;" val="5">3000-5000</a><a href="javascript:;" val="6">5000-8000</a><a href="javascript:;" val="7">8000以上</a><label>单价(元/月)</label></td>
        </tr>
        <tr>
            <td colspan="2">
            	<span id="houseType"><span class="bt">[房 型]</span><a href="javascript:;" class="bx" val="0">不限</a><a href="javascript:;" val="1">一居</a><a href="javascript:;" val="2">二居</a><a href="javascript:;" val="3">三居</a><a href="javascript:;" val="4">四居</a><a href="javascript:;" val="5">五居</a><a href="javascript:;" val="6">五居以上</a></span>
            	<span id="area"><span style="margin-left:10px;" class="bt">[面 积]</span><a href="javascript:;" class="bx" val="0">不限</a><a href="javascript:;" val="1">50以下</a><a href="javascript:;" val="2">50-70</a><a href="javascript:;" val="3">70-90</a><a href="javascript:;" val="4">90-110</a><a href="javascript:;" val="5">110-130</a><a href="javascript:;" val="6">130-150</a><a href="javascript:;" val="7">150-200</a><a href="javascript:;" val="8">200-300</a><a href="javascript:;" val="9">300以上</a><label>单位(㎡)</label></span>
            	<input style="margin-left:10px;width:170px;" type="text" class="input01" value="请输入地址、楼盘、小区名称"/><img  id="searchBnt"  src="<!--{$cfg.web_images}-->web/map_btn.jpg"/>
            </td>
        </tr>
    </table>
</div>

<div class="pagebox">
	<div class="pageboxLeft">
		<div class="top_tip">
			<span class="quick_loc">
				<span class="a"><b>快速定位：</b></span>
				<span class="b">
					<span class="b1">选择区域</span>
					<span class="b2">
						<label><a href="javascript:;">不限</a></label>
						<label><a href="javascript:;">罗湖</a></label>
						<label><a href="javascript:;">福田</a></label>
						<label><a href="javascript:;">南山</a></label>
						<label><a href="javascript:;">盐田</a></label>
						<label><a href="javascript:;">龙岗</a></label>
						<label><a href="javascript:;">宝安</a></label>
					</span>
				</span>
				<span class="c">
					<span class="c1">选择地铁</span>
					<span class="c2">
						<label><a href="javascript:;" val="none">不限</a></label>
						<label><a href="javascript:;" val="one" title="罗宝线">1号线</a></label>
						<label><a href="javascript:;" val="two" title="蛇口线">2号线</a></label>
						<label><a href="javascript:;" val="three" title="龙岗线">3号线</a></label>
						<label><a href="javascript:;" val="four" title="龙华线">4号线</a></label>
						<label><a href="javascript:;" val="five" title="环中线">5号线</a></label>
					</span>
				</span>
			</span>
			<span class="tool">
				<span style="float:left;">
					<a id="rectangleZoom" href="javascript:;">拉框操作</a>
					<a id="distanceTool" href="javascript:;">测距</a>
					<a id="driveLine" href="javascript:;">驾车</a>
					<a id="around" href="javascript:;">周边</a>
				</span>
				<span class="tool_panel">
					<span class="drive" id="drive">
						<span class="title">
							<font style="float:left;font-weight:bold;margin-left:5px;">驾车</font>
							<font style="float:right;margin-right:5px;">
								<a href="javascript:;" title="关闭" id="close_drive_bnt">
									<img src="<!--{$cfg.web_images}-->web/icon001.gif"/>
								</a>
							</font>
						</span>
						<span id="drive_form">
							<span class="start">
								<input type="text" id="start"/>
							</span>
							<span class="end">
								<input type="text" id="end"/>
							</span>
							<span class="drive_bnt">
								<input type="button" id="drive_bnt" value="驾车"/>
							</span>
						</span>
						<span class="drive_end" id="drive_end">
							
						</span>
					</span>
					<span class="around_panel" id="around_panel">
						<span class="title">
							<font style="float:left;font-weight:bold;margin-left:5px;">周边</font>
							<font style="float:right;margin-right:5px;">
								<a href="javascript:;" title="关闭" id="close_around_bnt">
									<img src="<!--{$cfg.web_images}-->web/icon001.gif"/>
								</a>
							</font>
						</span>
						<ul>
							<li>
								<input id="btnBus" class="othersearch" searchtype="bus" type="checkbox"/>
								<span class="bus">公交车站</span>
							</li>
							<li>
								<input id="btnHotel" class="othersearch" searchtype="hotel" type="checkbox"/>
								<span class="hotel">餐饮</span>
							</li>
							<li>
								<input id="btnBank" class="othersearch" searchtype="bank" type="checkbox"/>
								<span class="bank">银行</span>
							</li>
							<li>
								<input id="btnSuperMarket" class="othersearch" searchtype="supermarket" type="checkbox"/>
								<span class="supermarket">超市</span>
							</li>
							<li>
								<input id="btnShop" class="othersearch" searchtype="shop" type="checkbox"/>
								<span class="shop">商场</span>
							</li>
							<li>
								<input id="btnSchool" class="othersearch" searchtype="school" type="checkbox"/>
								<span class="school">学校</span>
							</li>
							<li>
								<input id="btnHospital" class="othersearch" searchtype="hospital" type="checkbox"/>
								<span class="hospital">医院</span>
							</li>
							<li>
								<input id="btnFurniture" class="othersearch" searchtype="furniture" type="checkbox"/>
								<span class="furniture">家居卖场</span>
							</li>
							<li>
								<input id="btnDecoration" class="othersearch" searchtype="decoration" type="checkbox"/>
								<span class="decoration">装饰公司</span>
							</li>
							<li>
								<input id="btnGasstation" class="othersearch" searchtype="gasstation" type="checkbox"/>
								<span class="gasstation">加油站</span>
							</li>
						</ul>
					</span>
				</span>
			</span>
		</div>
		<div class="map">
			<div class="allMap" id="allMap" >
				
			</div>
			<div class="expander" >
				<a href="javascript:;" class="close"></a>
			</div>
		</div>
	</div>
    <div class="pageboxRight">
    	<p class="mr_tit">图文列表</p>
        <p class="mr_ms"></p>
        <div class="mr_px"><label>排序：</label><a href="javascript:;">均价</a></div>
        <div class="mr_nr">
        	<div class="list">
        		
        	</div>
        	<div class="pageList">
        		<span class="pagingPanel">
        			
        		</span>
        	</div>
        </div>
    </div>
</div>
<div class="secondHand_block_box">
	<div class="title">
		<span class="a"><font class="title">前海花园</font></span>
		<span class="b"><a href="javascript:;"><img src="<!--{$cfg.web_images}-->web/icon001.gif"/></a></span>
	</div>
	<div class="content">
		<span class="pic">
			
		</span>
		<ul>
			<li>均价 <label>47000</label>元/平方米</li>
			<li>物业类型：住宅</li>
			<li>地址：深圳市华侨城酒店置业有限公司</li>
			<li class="view_link"><a href="#" >查看楼盘详情 >></a></li>
		</ul>
		<table cellpadding="0" cellspacing="0" width="550" class="houseListTbl">
			<tr align="center" >
				<td align="left" width="400" id="houseListCountInfo">
					共有<font color="red"><b>1000</b></font>套房源
				</td>
				<td width="60" align="center">
					面积
				</td>
				<td width="90" align="center">
					价格
				</td>
			</tr>
			<tr>
				<td colspan="3" id="houseListPanel">
										
				</td>
			</tr>
		</table>
	</div>
	<div class="link">
		<span class="pagingPanel">
        			
        </span>
	</div>
</div>
</body>
</html>