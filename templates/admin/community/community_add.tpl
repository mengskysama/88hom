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
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='community_manager.php';
		});
	});
	function check(){
		if($('input[name="communityName"]').val()=='')
		{
			alert('请输入名称！');
			$('input[name="communityName"]').focus();
			return false;
		}
		if($('#txtCity').val()=='选择城市')
		{
			alert('请选择区域！');
			return false;
		}
		if($('#txtDistrict').val()=='选择区域' || $('#txtDistrict').val()=='选择区县' || $('#txtDistrict').val()=='')
		{
			alert('请选择区域！');
			return false;
		}
		if($('#txtComareas').val()=='选择商圈' || $('#txtComareas').val()=='')
		{
			alert('请选择区域！');
			return false;
		}
		if($('input[type="checkbox"]:checked').length == 0)
		{
			alert('请至少选择一种物业类型！');
			return false;
		}	
		if($('input[name="communityRefPrice"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityRefPrice"]').val()))
			{
				alert('输入的均价必须为有效的数据！');
				$('input[name="communityRefPrice"]').focus();
				return false;
			}
		}
		if($('input[name="communityManagerFee"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityManagerFee"]').val()))
			{
				alert('输入的物业费必须为有效的数据！');
				$('input[name="communityManagerFee"]').focus();
				return false;
			}
		}
		if($('input[name="communityRight"]').val()!='')
		{
			if(!/^[\d]+$/.test($('input[name="communityRight"]').val()))
			{
				alert('输入的产权年限必须为有效的数据！');
				$('input[name="communityRight"]').focus();
				return false;
			}
		}
		if($('input[name="communityVolRate"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityVolRate"]').val()))
			{
				alert('输入的容积率必须为有效的数据！');
				$('input[name="communityVolRate"]').focus();
				return false;
			}
		}
		if($('input[name="communityGreenRate"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityGreenRate"]').val()))
			{
				alert('输入的绿化率必须为有效的数据！');
				$('input[name="communityGreenRate"]').focus();
				return false;
			}
		}
		if($('input[name="communityBuildArea"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityBuildArea"]').val()))
			{
				alert('输入的建筑面积必须为有效的数据！');
				$('input[name="communityBuildArea"]').focus();
				return false;
			}
		}
		if($('input[name="communityLandArea"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityLandArea"]').val()))
			{
				alert('输入的占地面积必须为有效的数据！');
				$('input[name="communityLandArea"]').focus();
				return false;
			}
		}
		/*if($('input[name="communityMapX"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityMapX"]').val()))
			{
				alert('输入的经度必须为有效的数据！');
				$('input[name="communityBuildArea"]').focus();
				return false;
			}
		}
		if($('input[name="communityMapY"]').val()!='')
		{
			if(!/^[\d]+(\.[\d]+)?$/.test($('input[name="communityMapY"]').val()))
			{
				alert('输入的纬度必须为有效的数据！');
				$('input[name="communityLandArea"]').focus();
				return false;
			}
		}
		if(($('input[name="communityMapX"]').val()!='' && $('input[name="communityMapY"]').val()=='')|| ($('input[name="communityMapX"]').val()=='' && $('input[name="communityMapY"]').val()!=''))
		{
			alert('经度，纬度必须同时输入！');
			$('input[name="communityMapX"]').focus();
			return false;
		}*/ 
		if(!/^\d+(\.\d+)?\,\d+(\.\d+)?$/.test($('input[name="communityMap"]').val())){ 
			alert('请输入经纬度,格式为两个浮点数中间有逗号隔开，如：123.123,123.123');
			$('input[name="communityMap"]').focus();
			return false;
		}
		if(!/^[1-9][\d]*$/.test($('input[name="communityOrderNum"]').val()))
		{
			alert('输入的排序号必须为正整数！');
			$('input[name="communityOrderNum"]').focus();
			return false;
		}	
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">小区添加</div>
</div>
	<form method="post" action="community_manager.php?action=doAdd">
	<table cellspacing="0" cellpadding="0" >
		<tr ><td width="100">名称：</td><td><input maxlength="255" class="input_long" type="text" name="communityName"/><font color="red">*</font></td></tr>
		<tr ><td width="100">所在区域：</td>
		<td>
			<table id="areaTable" style="width: 360px;"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="" align="right">
                        <input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
                        <input type="hidden" id="CityDistrictComareas" />
                    </td>
                    <th style="width: 360px;" align="left">
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
                                value="选择商圈" onclick="ShowComareas();" onkeyup="onKey(event,'search_c');"
                                onkeydown="SelectonKeyDown('txtComareas',event,'search_c')" style="width: 95px;" /><input
                                    type="button" class="but_input_cs" id="CheckCity" name="CheckCity" onclick="ShowComareas()" />
                             <!--省，市，区域，片区下标,以"-"隔开 -->
							<input type="hidden" name="areaIndex"	id="areaIndex" value=""/>	
                            <div class="search_select01 left230" id="search_c" >
                                <dl id="search_c_value">
                                </dl>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
			<font color="red">*</font>
		</td>
		</tr>
		<tr ><td width="100">物业类型：</td>
			<td>
					<input name="communityIsHouseType" value="1" type="checkbox"/>住宅
					<input name="communityIsBusinessType" value="1" type="checkbox"/>商铺 
					<input name="communityIsOfficeType" value="1" type="checkbox"/>写字楼  
					<input name="communityIsVillaType" value="1" type="checkbox"/>别墅 <font color="red">*</font>
			</td>
		</tr>
		<tr ><td width="100">建筑类型：</td><td><input maxlength="255" class="input" type="text" name="communityBuildType"/></td></tr>
		<tr ><td width="100" rowspan="2">基本信息：</td>
			<td>
				<span style="float:left;width:200px;">参考均价:<input class="input_short" type="text" name="communityRefPrice"/>元 </span>
				<span style="float:left;width:200px;">主力户型:<input maxlength="255" class="input_short" type="text" name="communityMainHouseModel"/></span>
				<span style="float:left;width:200px;">物业费:<input class="input_short" type="text" name="communityManagerFee"/>元/平米 </span>
				<span style="float:left;width:200px;">产权年限:<input class="input_short" type="text" name="communityRight"/>年 </span>
				<span style="float:left;width:200px;">停车位:<input maxlength="255" class="input_short" type="text" name="communityParkingSpace"/></span>
			</td>
		</tr>
		<tr >
			<td>
				<span style="float:left;width:200px;">总户数:<input maxlength="255" class="input_short" type="text" name="communityHouseholds"/></span> 	
				<span style="float:left;width:200px;">装修状况:<input maxlength="255" class="input_short" type="text" name="communityFitmentStatus"/></span>
				<span style="float:left;width:200px;">容积率:<input class="input_short" type="text" name="communityVolRate"/>%</span> 
				<span style="float:left;width:200px;">绿化率:<input class="input_short" type="text" name="communityGreenRate"/>%</span> 
				<span style="float:left;width:200px;">建筑面积:<input class="input_short" type="text" name="communityBuildArea"/>平米</span> 
				<span style="float:left;width:200px;">占地面积:<input class="input_short" type="text" name="communityLandArea"/>平米</span> 	
			</td>
		</tr>
		<tr ><td width="100">小区地址：</td><td><input maxlength="255" class="input_long" type="text" name="communityAddress"/></td></tr>
		<tr ><td width="100">地理经纬度：</td>
			<td>
				<input class="input_long" type="text" name="communityMap"/><font color="red">*</font>(如 <font color="red">123.123,123.123</font>)逗号隔开
			</td>
		</tr>
		<tr ><td width="100">项目特色：</td><td><input maxlength="255" class="input_long" type="text" name="communityProjectFeatures"/></td></tr>
		<tr ><td width="100">物业公司：</td><td><input maxlength="255" class="input_long" type="text" name="communityCompany"/></td></tr>
		<tr ><td width="100">物业公司地址：</td><td><input maxlength="255" class="input_long" type="text" name="communityCompanyAddress"/></td></tr>
		<tr ><td width="100">开发商：</td><td><input maxlength="255" class="input_long" type="text" name="communityDevCompany"/></td></tr>
		<tr ><td width="100">开发商地址：</td><td><input maxlength="255" class="input_long" type="text" name="communityDevCompanyAddress"/></td></tr>
		<tr ><td width="100">售楼地址：</td><td><input maxlength="255" class="input_long" type="text" name="communitySellHouseAddress"/></td></tr>
		<tr ><td width="100">交通状况：</td><td><!--{$traffic}--></td></tr>
		<tr ><td width="100">配套信息：</td><td><!--{$periInfo}--></td></tr>
		<tr ><td width="100">小区楼盘简介：</td><td><!--{$buildInfo}--></td></tr>
		<tr ><td width="100">控制设置：</td>
			<td>
				开启：<input type="radio" name="communityState" checked="checked" value="1"/>是  <input type="radio" name="communityState"  value="0"/>否
				推荐：<input type="radio" name="communityIsSuggest"  value="1"/>是  <input type="radio" name="communityIsSuggest" checked="checked" value="0"/>否 
				排序号：<input class="input_short" type="text" name="communityOrderNum" value="1"/>(正整数)
			</td>
		</tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
