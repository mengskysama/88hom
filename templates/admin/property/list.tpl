<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
				$('form:first').submit();
		});
		//初始化区域插件
		if($('#areaIndex').val() != ''){
			var areaIndex = $('#areaIndex').val().split('-');
			$('#txtCity').val(C[areaIndex[0]][areaIndex[1]]);//市,表面文字 
			$('#txtDistrict').val(D[areaIndex[0]][areaIndex[1]][areaIndex[2]]);//区,表面文字
			if(areaIndex.length > 3)
				$('#txtComareas').val(A[areaIndex[0]][areaIndex[1]][areaIndex[2]][areaIndex[3]]);//片区,表面文字
		}
	});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">条件搜索</div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form action="list.php" method="post">
		<table id="areaTable"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 55px;" align="right">
                                           区域：<input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
                        <input type="hidden" id="CityDistrictComareas" />
                    </td>
                    <td style="width: 360px;" align="left">
                        <input id="nowSelectID" type="hidden" />
                        <div style="position: relative; z-index: 10000;" >
                            <input type="text" id="txtCity" autocomplete="off" class="input_cs" style="width: 60px;" name="txtCity" 
                                value="选择城市" onkeyup="SelectCity(this.value);onKey(event,'search_select');" onkeydown="SelectonKeyDown('txtCity',event,'search_select')"
                                onclick="GetIndex();ClearInput();" /><input name="cityxl" id="cityxl" type="button" onclick="GetIndex()"
                                    class="but_input_cs" />
                            <div class="search_select"  id="search_select" 
                                style="display: none; top: 30px; left: 0;">
                                <dl id="SearchKey">
                                </dl>
                                <dl id="SearchValue">
                                </dl>
                            </div>
                            <div id="tab_select" class="tab_select" 
                                style="display: none; left: 0; top: 30px;">
                                <ul class="tab" >
                                    <li class="option2" id="d1" onmouseover="city1(1)" style="color: #FF0000">热门城市</li>
                                    <li class="option2" id="d2" onmouseover="city1(2);GetHotCity(2,'a,b,c,d');">ABCD</li>
                                    <li class="option2" id="d3" onmouseover="city1(3);GetHotCity(3,'f,g,h');">FGH</li>
                                    <li class="option2" id="d4" onmouseover="city1(4);GetHotCity(4,'j,k,l,m');">JKLM</li>
                                    <li class="option2" id="d5" onmouseover="city1(5);GetHotCity(5,'n,q,s');">NQS</li>
                                    <li class="option2" id="d6" onmouseover="city1(6);GetHotCity(6,'t,w,x');">TWX</li>
                                    <li class="option2" id="d7" onmouseover="city1(7);GetHotCity(7,'y,z');">YZ</li>
                                </ul>
                                <div id="c1" class="box1" >
                                    <ul>
                                    </ul>
                                </div>
                                <div id="c2" style="display: none;" class="box2">
                                </div>
                                <div id="c3" style="display: none;" class="box2">
                                </div>
                                <div id="c4" style="display: none;" class="box2">
                                </div>
                                <div id="c5" style="display: none;" class="box2">
                                </div>
                                <div id="c6" style="display: none;" class="box2">
                                </div>
                                <div id="c7" style="display: none;" class="box2">
                                </div>
                                <script language="javascript">city1(1)</script>
                                <!--调用id=1的div初始页显示内容第一频道-->
                            </div>
                            <input type="text" id="txtDistrict" autocomplete="off" name="txtDistrict" readonly="readonly" value="选择区域"
                                class="input_cs" style="width: 95px;"  onkeyup="onKey(event,'search_d');" onblur="ClearComareas();" onkeydown="SelectonKeyDown('txtDistrict',event,'search_d')"
                                onclick="ShowDistrict();" /><input name="Districtxl" id="Districtxl" type="button" class="but_input_cs" onclick="ShowDistrict()" />
	                            <div class="search_select01 left133" id="search_d">
                                <dl id="search_d_value">
                                </dl>
                            </div>
                            <input type="text" class="input_cs" autocomplete="off" id="txtComareas" name="txtComareas" readonly="readonly"
                                value="选择商圈             (商圈不能为空)" onclick="ShowComareas();" onkeyup="onKey(event,'search_c');"
                                onkeydown="SelectonKeyDown('txtComareas',event,'search_c')" style="width: 95px;" /><input
                                    type="button" class="but_input_cs" id="CheckCity" name="CheckCity" onclick="ShowComareas()" />
                             <!--省，市，区域，片区下标,以"-"隔开 -->
							<input type="hidden" name="areaIndex"	id="areaIndex" value="<!--{$info.areaIndex}-->"/>	
                            <div class="search_select01 left230" id="search_c" >
                                <dl id="search_c_value">
                                </dl>
                            </div>
                        </div>
                    </td>
                </tr>
                
            </table>
			<table border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="50px;" align="right">类型：</td>
                <td>
            		<!--{if $info.propertyIsHouseType!=1}-->
            		<input name="propertyIsHouseType" value="1" type="checkbox"/>住宅
            		<!--{else}-->
            		<input name="propertyIsHouseType" value="1" checked="checked" type="checkbox"/>住宅 	
            		<!--{/if}-->
            		<!--{if $info.propertyIsBusinessType!=1}-->
            		<input name="propertyIsBusinessType" value="1" type="checkbox"/>商铺 
            		<!--{else}-->
            		<input name="propertyIsBusinessType" value="1" checked="checked" type="checkbox"/>商铺 
            		<!--{/if}-->
            		<!--{if $info.propertyIsOfficeType!=1}-->
            		<input name="propertyIsOfficeType" value="1" type="checkbox"/>写字楼
            		<!--{else}-->
            		<input name="propertyIsOfficeType" value="1" checked="checked" type="checkbox"/>写字楼
            		<!--{/if}-->
            		<!--{if $info.propertyIsVillaType!=1}-->
            		<input name="propertyIsVillaType" value="1" type="checkbox"/>别墅
            		<!--{else}-->
            		<input name="propertyIsVillaType" value="1" checked="checked" type="checkbox"/>别墅
            		<!--{/if}-->
                </td>
                </tr>
                <tr>
                <td align="right">特色：</td>
                <td>
            		<!--{if $info.propertyIsRecommend!=1}-->
            		<input name="propertyIsRecommend" value="1" type="checkbox"/>推荐
            		<!--{else}-->
            		<input name="propertyIsRecommend" value="1" checked="checked" type="checkbox"/>推荐	
            		<!--{/if}-->
            		<!--{if $info.propertyIsFine!=1}-->
            		<input name="propertyIsFine" value="1" type="checkbox"/>精品
            		<!--{else}-->
            		<input name="propertyIsFine" value="1" checked="checked" type="checkbox"/>精品
            		<!--{/if}-->
            		<!--{if $info.propertyIsHot!=1}-->
            		<input name="propertyIsHot" value="1" type="checkbox"/>热卖
            		<!--{else}-->
            		<input name="propertyIsHot" value="1" checked="checked" type="checkbox"/>热卖
            		<!--{/if}-->
            		<!--{if $info.propertyIsSmallAmt!=1}-->
            		<input name="propertyIsSmallAmt" value="1" type="checkbox"/>小户型
            		<!--{else}-->
            		<input name="propertyIsSmallAmt" value="1" checked="checked" type="checkbox"/>小户型
            		<!--{/if}-->
            		<!--{if $info.propertyIsSubwayLine!=1}-->
            		<input name="propertyIsSubwayLine" value="1" type="checkbox"/>地铁沿线
            		<!--{else}-->
            		<input name="propertyIsSubwayLine" value="1" checked="checked" type="checkbox"/>地铁沿线
            		<!--{/if}-->
            		<!--{if $info.propertyIsBusiness!=1}-->
            		<input name="propertyIsBusiness" value="1" type="checkbox"/>商业地产
            		<!--{else}-->
            		<input name="propertyIsBusiness" value="1" checked="checked" type="checkbox"/>商业地产
            		<!--{/if}-->
            		<!--{if $info.propertyIsPark!=1}-->
            		<input name="propertyIsPark" value="1" type="checkbox"/>公园地产
            		<!--{else}-->
            		<input name="propertyIsPark" value="1" checked="checked" type="checkbox"/>公园地产
            		<!--{/if}-->
            		<!--{if $info.propertyIsInvestment!=1}-->
            		<input name="propertyIsInvestment" value="1" type="checkbox"/>投资地产
            		<!--{else}-->
            		<input name="propertyIsInvestment" value="1" checked="checked" type="checkbox"/>投资地产
            		<!--{/if}-->
                </td>
                </tr>
                <tr>
                <td align="right">推广：</td>
                <td>
            		<!--{if $info.propertyIsGbuy!=1}-->
            		<input name="propertyIsGbuy" value="1" type="checkbox"/>团购
            		<!--{else}-->
            		<input name="propertyIsGbuy" value="1" checked="checked" type="checkbox"/>团购 	
            		<!--{/if}-->
            		<!--{if $info.propertyIsDiscounts!=1}-->
            		<input name="propertyIsDiscounts" value="1" type="checkbox"/>打折促销
            		<!--{else}-->
            		<input name="propertyIsDiscounts" value="1" checked="checked" type="checkbox"/>打折促销 
            		<!--{/if}-->
            		<!--{if $info.propertyIsPreferential!=1}-->
            		<input name="propertyIsPreferential" value="1" type="checkbox"/>独家优惠
            		<!--{else}-->
            		<input name="propertyIsPreferential" value="1" checked="checked" type="checkbox"/>独家优惠
            		<!--{/if}-->
                </td>
                </tr>
                <tr>
                <td style="" align="right">名称：</td>
                <td>
            		<input name="search" class="input" value="<!--{$info.search}-->"/>
            		<input style="margin-left:20px;width: 50px" type="button" value="查询" id="bnt"/> 
                </td>
                </tr>
			</table>
	</form>
</div>
<div class="title_panel">
	<div class="title">信息列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">名称</th>
			<th width="5%">区域</th>
			<th width="5%">类型</th>
			<th width="3%">推荐</th>
			<th width="3%">精品</th>
			<th width="3%">热卖</th>
			<th width="3%">小户型</th>
			<th width="4%">地铁沿线</th>
			<th width="4%">商业地产</th>
			<th width="4%">公园地产</th>
			<th width="4%">投资地产</th>
			<th width="3%">团购</th>
			<th width="4%">打折促销</th>
			<th width="4%">独家优惠</th>
			<th width="3%">状态</th>
			<th width="5%">发布者</th>
			<th width="5%">发布时间</th>
			<th width="5%">更新时间</th>
			<th width="8%">操作</th>
			
		</tr>
		<!--{foreach from=$propertyList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.propertyName}--></td>
			<td>
			<script type="text/javascript">
				document.write(D[<!--{$item.propertyProvince}-->][<!--{$item.propertyCity}-->][<!--{$item.propertyDistrict}-->]+'-'+A[<!--{$item.propertyProvince}-->][<!--{$item.propertyCity}-->][<!--{$item.propertyDistrict}-->][<!--{$item.propertyArea}-->]);
			</script>
			</td>
			<td>
			<!--{if $item.propertyIsHouseType==1}-->
				住宅
			<!--{/if}--> 
			<!--{if $item.propertyIsBusinessType==1}-->
				商铺
			<!--{/if}--> 
			<!--{if $item.propertyIsOfficeType==1}-->
				写字楼
			<!--{/if}-->
			<!--{if $item.propertyIsVillaType==1}-->
				别墅
			<!--{/if}-->
			</td>
			<td>
			<!--{if $item.propertyIsRecommend==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsFine==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsHot==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsSmallAmt==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsSubwayLine==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsBusiness==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsPark==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsInvestment==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsGbuy==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsDiscounts==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td>
			<!--{if $item.propertyIsPreferential==1}-->
				<font color="blue">是</font>
			<!--{else}-->
				<font color="red">否</font>
			<!--{/if}--> 
			</td>
			<td><!--{if $item.propertyState==1}--><font color="blue">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
			<td><!--{$item.userUsername}--></td>
			<td><!--{$item.propertyCreateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{$item.propertyUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{if $item.propertyState==1}--><a href="action.php?action=changeState&id=<!--{$item.propertyId}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.propertyId}-->&state=1">发布</a><!--{/if}--> <a href="modify.php?id=<!--{$item.propertyId}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.propertyId}-->');">删除</a> </td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
