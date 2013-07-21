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
	<div class="title">别墅房源</div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form action="complexVillaList.php" method="post">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="80px;" align="right">所属区域：</td>
                <td>
            		<table id="areaTable"  border="0" cellspacing="0" cellpadding="0">
	                <tr>
	                    <td>
	                        <input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
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
								<input type="hidden" name="areaIndex"	id="areaIndex" value="<!--{$auditModel.areaIndex}-->"/>	
	                            <div class="search_select01 left230" id="search_c" >
	                                <dl id="search_c_value">
	                                </dl>
	                            </div>
	                        </div>
	                    </td>
		            </tr>
					</table>
                </td>
        	</tr>
			<tr>
                <td align="right">房源标题：</td>
                <td>
                	<select id="type" name="type" style="width: 50px;">
                		<!--{html_options options=$typeList selected=$type}-->
                	</select>
                	<select id="state" name="state" style="width: 90px;">
                		<!--{html_options options=$auditList selected=$state}-->
                	</select>
            		<input name="search" id="search" class="input" value="<!--{$auditModel.search}-->"/>
            		<input style="margin-left:20px;width: 50px;height: 25px;" type="submit"  value="查询"/> 
                </td>
        	</tr>
		</table>
	</form>
</div>
<div class="title_panel">
	<div class="title">信息列表</div>
</div>
<form id="listForm" name="listForm" action="action.php?action=complexVillaChangeStateByIds" method="post">
	<input type="hidden" id="t" name="t" value="<!--{$type}-->"/>
	<input type="hidden" id="s" name="s" value="<!--{$state}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="3%">选中</th>
			<th width="3%">ID</th>
			<th width="10%">区域</th>
			<th width="20%">标题</th>
			<th width="10%">户型</th>
			<th width="10%">售价</th>
			<th width="5%">建筑面积</th>
			<th width="5%">使用面积</th>
			<th width="5%">发布时间</th>
			<th width="5%">状态</th>
			<th width="10%">操作</th>
		</tr>
		<!--{foreach from=$villaList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" value="<!--{$item.villaId}-->"/></td>
			<td><!--{$item.villaId}--></td>
			<td><!--{$item.villaAreaName}--></td>
			<td><!--{$item.villaTitle}--></td>
			<td>
			<!--{if $item.villaRoom>0}-->
				<!--{$item.villaRoom}-->室
			<!--{/if}--> 
			<!--{if $item.villaHall>0}-->
				<!--{$item.villaHall}-->厅
			<!--{/if}--> 
			<!--{if $item.villaToilet>0}-->
				<!--{$item.villaToilet}-->卫
			<!--{/if}-->
			<!--{if $item.villaKitchen>0}-->
				<!--{$item.villaKitchen}-->厨房
			<!--{/if}-->
			<!--{if $item.villaBalcony>0}-->
				<!--{$item.villaBalcony}-->阳台
			<!--{/if}-->
			</td>
			<td><!--{$item.villaSellPrice}--></td>
			<td><!--{$item.villaBuildArea}--></td>
			<td><!--{$item.villaUseArea}--></td>
			<td><!--{$item.villaUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td>
			<!--{if $item.villaState==1}-->
				<font color="red">发布待审核</font>
			<!--{else if $item.villaState==5}-->
				<font color="blue">审核已通过</font>
			<!--{else if $item.villaState==4}-->
				<font color="blue">违规被退回</font>
			<!--{else if $item.villaState==2}-->
				<font color="blue">发布被删除</font>
			<!--{/if}-->
			</td>
			<td>
			<!--{if $item.villaState==1}-->
				<a href="complexVillaDetail.php?id=<!--{$item.villaId}-->">详情</a> 
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a> 
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a> 
			<!--{else if $item.villaState==5}-->
				<a href="complexVillaDetail.php?id=<!--{$item.villaId}-->">详情</a> 
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
				<a href="javascript:exeAdminDelMessage('action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a> 
			<!--{else if $item.villaState==4}-->
				<a href="complexVillaDetail.php?id=<!--{$item.villaId}-->">详情</a> 
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="javascript:exeAdminDelMessage('action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=2&s=<!--{$state}-->');">删除</a> 
			<!--{else if $item.villaState==2}-->
				<a href="complexVillaDetail.php?id=<!--{$item.villaId}-->">详情</a> 
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=5&s=<!--{$state}-->">通过</a>  
				<a href="action.php?action=complexVillaChangeStateById&id=<!--{$item.villaId}-->&type=<!--{$type}-->&state=4&s=<!--{$state}-->">违规退回</a> 
			<!--{/if}-->
			</td>
		</tr>
		<!--{/foreach}-->
	</table>
	<!--{if $villaList neq null}-->
	<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=\'checkbox\']').each(function(){this.checked = true;});">全选</a>/<a href="javascript:void(0);" onclick="$('input[type=\'checkbox\']').each(function(){this.checked = false;});">取消</a> 
		<!--{if $item.villaState==1}-->
			<a href="javascript:void(0);" onclick="if(confirm('你确认通过选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=5');$('#listForm').submit();}">通过所选</a> 
			<a href="javascript:void(0);" onclick="if(confirm('你确认退回选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=4');$('#listForm').submit();}">退回所选</a>
			<a href="javascript:void(0);" onclick="if(confirm('你确认删除选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=2');$('#listForm').submit();}">删除所选</a>
		<!--{else if $item.villaState==5}-->
			<a href="javascript:void(0);" onclick="if(confirm('你确认退回选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=4');$('#listForm').submit();}">退回所选</a>
			<a href="javascript:void(0);" onclick="if(confirm('你确认删除选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=2');$('#listForm').submit();}">删除所选</a>
		<!--{else if $item.villaState==4}-->
			<a href="javascript:void(0);" onclick="if(confirm('你确认通过选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=5');$('#listForm').submit();}">通过所选</a> 
			<a href="javascript:void(0);" onclick="if(confirm('你确认删除选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=2');$('#listForm').submit();}">删除所选</a>
		<!--{else if $item.villaState==2}-->
			<a href="javascript:void(0);" onclick="if(confirm('你确认通过选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=5');$('#listForm').submit();}">通过所选</a> 
			<a href="javascript:void(0);" onclick="if(confirm('你确认退回选中的条目？')){$('#listForm').attr('action','action.php?action=complexVillaChangeStateByIds&state=4');$('#listForm').submit();}">退回所选</a>
		<!--{/if}-->
	</div>
	<!--{/if}-->
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
