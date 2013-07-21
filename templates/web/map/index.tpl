<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->新盘地图</title>
<script src="http://api.map.baidu.com/api?v=1.4" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/RectangleZoom/1.2/src/RectangleZoom_min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/DistanceTool/1.2/src/DistanceTool_min.js"></script>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<style>
.ui-autocomplete-loading {
	background: white url('<!--{$cfg.web_images}-->common/ui-anim_basic_16x16.gif') right center no-repeat;
}
.ui-autocomplete {
	max-height: 200px;
	max-width:253px;
	overflow-y: auto;
	/* prevent horizontal scrollbar */
	overflow-x: hidden;
}
/* IE 6 doesn't support max-height
 * we use height instead, but this forces the menu to always be this tall
 */
* html .ui-autocomplete {
	width:253px;
	height: 200px;
}
</style>
<script type="text/javascript">

$(document).ready(function(){
			initProperty();
});
$(function() {
	function search( message ) {
		$.base64.utf8encode = true;
		message=$.base64.btoa(message);
		location.href='search.php?search='+message;
	}
	$( "#search" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				type:'GET',
				async:true,
				cache:false,
				url:domain+'property/action.php?action.php',
				dataType:'json',
				data:{
					action:'searchForPropertyAutoComplete',
					search:request.term
				},
				success:function (data){
					var obj=eval(data);//返回json数组
					if(obj.length==undefined){
						response();	
					}else{
						response( $.map( obj, function( item ) {
							return {
								label: item.propertyName,
								value: item.propertyName
							}
						}));	
					}
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			search( ui.item ? ui.item.label : this.value);
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
});
function doSearch(){
	if($('#search').val()=='搜索小区名、楼盘名、地址等') 
		$('#search').val('');
	var search=$.trim($('#search').val());
	if(search!=''){
		$.base64.utf8encode = true;
		search=$.base64.btoa(search);
		//search=search.replace("+","%2B");
		//search=encodeURIComponent(search);
	}
	var searchArea=$('#searchArea').val();
	var searchBuildType=$('#searchBuildType').val();
	var searchPrice=$('#searchPrice').val();
	//alert('search_'+searchArea+'_'+searchBuildType+'_'+searchPrice+'_'+search);
	location.href='search_'+searchArea+'_'+searchBuildType+'_'+searchPrice+'_1_'+search+'.htm';
}
</script>
</head>
<body>
<!--头部  -->
<!--{include file="map/header.tpl"}-->
<div class="fl">
	<table width="1000" height="57" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="400" id="buildType"><span class="bt">[物业类型]</span><a href="javascript:;" class="bx" val="0">不限</a><a href="javascript:;" val="1">住宅</a><a href="javascript:;" val="2">商铺</a><a href="javascript:;" val="3">写字楼</a><a href="javascript:;" val="4">别墅</a></td>
            <td width="600" id="price"><span class="bt">[均 价]</span><a href="javascript:;" class="bx" val="0">不限</a><a href="javascript:;" val="1">7千元以下</a><a href="javascript:;" val="2">7千-1万元</a><a href="javascript:;" val="3">1万-1.5万</a><a href="javascript:;" val="4">1.5万-2万</a><a href="javascript:;" val="5">2万-2.5万</a><a href="javascript:;" val="6">2.5万-3万</a><a href="javascript:;" val="7">3万以上</a><label>单价(元/㎡)</label></td>
        </tr>
        <tr>
            <td id="propertyState">
            	<span class="bt">[楼盘状态]</span><input value="1" type="checkbox" checked="checked"/>
            	<span class="red blue">在售</span><input value="2" type="checkbox" checked="checked"/>
            	<span class="red yellow">在租</span><input value="3" type="checkbox"/>
            	<span class="red green">待售</span><input value="4" type="checkbox"/>
            	<span class="red">新盘</span><input value="5" type="checkbox"/>
            	<span class="red black">售完</span>
            </td>
            <td><input type="text" class="input01" id="search" name="search" value="搜索小区名、楼盘名、地址等" onmousedown="exeWebPropertySearchDown(this.value);" onblur="exeWebPropertySearchOut(this.value);"/><img  id="searchBnt"  src="<!--{$cfg.web_images}-->web/map_btn.jpg" onclick="doSearch();"/></td>
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

<div class="new_block_box">
	<div class="title">
		<span class="a"><font class="title">前海花园</font><font class="state">(在售)</font></span>
		<span class="b"><a href="javascript:;"><img src="<!--{$cfg.web_images}-->web/icon001.gif"/></a></span>
	</div>
	<div class="content">
		<span class="pic">
			
		</span>
		<ul>
			<li>均价 <label>47000</label>元/平方米</li>
			<li>物业类型：住宅</li>
			<li>开盘时间：2013年5月19日开盘</li>
			<li>开发商：深圳市华侨城酒店置业有限公司</li>
			<li>楼盘销售电话：<label>400-890-0000 转 21523</label></li>
			<li class="view_link"><a href="#" >查看楼盘详情 >></a></li>
		</ul>
	</div>
	<div class="link">
		<a href="javascript:;" class="around_link">[周边]</a> <a href="javascript:;" class="driveLine_link1" >[驾车]</a> <a href="#" >[楼盘动态]</a> <a href="#" >[户型图]</a> 
	</div>
</div>

</body>
</html>