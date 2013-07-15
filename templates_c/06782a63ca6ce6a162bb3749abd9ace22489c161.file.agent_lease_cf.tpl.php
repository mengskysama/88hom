<?php /* Smarty version Smarty-3.1.8, created on 2013-07-15 23:45:52
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\agent_lease_cf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2804451e419306d42a9-64936326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06782a63ca6ce6a162bb3749abd9ace22489c161' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\agent_lease_cf.tpl',
      1 => 1373903057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2804451e419306d42a9-64936326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
    'picTypeList' => 0,
    'key' => 0,
    'timestamp' => 0,
    'token' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e419307fada2_47452879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e419307fada2_47452879')) {function content_51e419307fada2_47452879($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>录入厂房出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
<script>
$(function() {    

	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    initPicUp3(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
');
	<?php } ?>
	
		//初始化区域插件
		if($('#areaIndex').val() != ''){
			var areaIndex = $('#areaIndex').val().split('-');
			$('#txtCity').val(C[areaIndex[0]][areaIndex[1]]);//市,表面文字 
			$('#txtDistrict').val(D[areaIndex[0]][areaIndex[1]][areaIndex[2]]);//区,表面文字
			if(areaIndex.length > 3)
				$('#txtComareas').val(A[areaIndex[0]][areaIndex[1]][areaIndex[2]][areaIndex[3]]);//片区,表面文字
		}
		
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
        	$("#action_to_go").val(1);
            document.getElementById("cfForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
        
    $("#btn_save").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
            document.getElementById("cfForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
});
function check(){
	var estNameValue = $("#factoryName").val();
	if(trim(estNameValue) == ''){
		alert("请填写厂房名称");
		$("#factoryName").focus();
		return false;
	}
	if(trim($("#factoryAddress").val()) == ''){
		alert("请填写厂房地址");
		$("#factoryAddress").focus();
		return false;
	}/*
	if(trim($("#areaIndex").val()) == ''){
		alert("请选择区域");
		return false;
	}*/
	
	if(!CheckInfoCode('factoryNumber',true)) return false;	
	if(!CheckPrice('factorySellPrice',true,'CS')) return false;
	if(!checkPropFee('factoryProFee',true)) return false;
	
	if(!checkArea('factoryFloorArea','占地面积',false)) return false;
	
	if(!CheckBuildingArea('factoryBuildArea',true)) return false;
	if(!checkArea('factoryOfficeArea','办公面积',false)) return false;
	if(!checkArea('factoryWorkshopArea','车间面积',false)) return false;
	if(!checkArea('factorySpaceArea','空地面积',false)) return false;
	if(!CheckCreateTime('factoryBuildYear',true)) return false;
	
	if($("#factorySpan").val() != "" && !check_float('factorySpan')){
		alert("跨度只能是数字");
		$("#factorySpan").focus();
		return false;
	}		
	
	if($("#factoryAllFloor").val() != "" && !check_float('factoryAllFloor')){
		alert("层数只能是数字");
		$("#factoryAllFloor").focus();
		return false;
	}		
	
	if($("#factoryFloorHeight").val() != "" && !check_float('factoryFloorHeight')){
		alert("层高只能是数字");
		$("#factoryFloorHeight").focus();
		return false;
	}		

	if($("#factoryLoadBearing").val() != "" && !check_float('factoryLoadBearing')){
		alert("楼层承重只能是数字");
		$("#factoryLoadBearing").focus();
		return false;
	}	

	var houseContentValue = CKEDITOR.instances.factoryContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	
	
	if($("#factoryTraffic").val() == ""){
		alert("请填写交通状况");
		$("#factoryTraffic").focus();
		return false;
	}
	if($("#topPicPath").val() == ""){
		alert("请选择标题图");
		return false;
	}
	
	return true;	
}

function changepaydetail() {
	var val = $('input:radio[name="factoryPayment"]:checked').val();
    if (val == 2) {
        document.getElementById("factoryPayDetailY").value = "";
        document.getElementById("factoryPayDetailF").value = "";
        document.getElementById("factoryPayDetailY").disabled = "disabled"
        document.getElementById("factoryPayDetailF").disabled = "disabled"
    }
    else {
        document.getElementById("factoryPayDetailY").disabled = ""
        document.getElementById("factoryPayDetailF").disabled = ""
    }
}
</script>
</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_agent_header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间内容部分-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_agent_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="jjr_r">
    	<div class="qg_r1">
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs1">
            <form id="cfForm" name="cfForm" action="property_handler.php" method="post" enctype="multipart/form-data">
 		   <ul>
   			 	<li><a href="agent_lease_zz.php">录入住宅出租房源</a></li>
    		    <li><a href="agent_lease_bs.php">录入别墅出租房源</a></li>
     		    <li><a href="agent_lease_sp.php">录入商铺出租房源</a></li>
      		 	<li><a href="agent_lease_xzl.php">录入写字楼出租房源</a></li>
       		    <li><a href="agent_lease_cf.php">录入厂房出租房源</a></li>
   		  </ul>
          <div class="bs_tx">
            <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> 10</font> 条</span></p>
            <input type="hidden" name="prop_type" value="cf">
            <input type="hidden" name="prop_tx_type" value="1">
			<table width="732" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
			  <tr>
			    <td width="110" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房名称</td>
			    <td width="619" align="left" valign="middle" class="p25 grzc_31"><input id="factoryName" name="factoryName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('factoryName'),document.getElementById('estNameAlert'),25);" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房地址</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input id="factoryAddress" name="factoryAddress" type="text" maxlength="100" onkeyup="textCounter(document.getElementById('factoryAddress'),document.getElementById('factoryAddressAlert'),50);" /> 还可写<span id="factoryAddressAlert"><font class="red">50</font></span>个汉字 </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 区    域<input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
			                        <input type="hidden" id="CityDistrictComareas" />
			    <td  style="width: 360px;" align="left">
			    
	    						 
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
								<input type="hidden" name="areaIndex"	id="areaIndex" value=""/>	
	                            <div class="search_select01 left230" id="search_c" >
	                                <dl id="search_c_value">
	                                </dl>
	                            </div>
	                        </div>
			    </td
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 房源信息编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="factoryNumber" name="factoryNumber" type="text" maxlength="12" value="" /></td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房类型</td>
			    <td align="left" valign="middle" class="p25">
			    	 <label><input id="" name="factoryType" type="radio" value="1" checked="checked" /> 独立厂房</label>     
			      	<label> <input id="" name="factoryType" type="radio" value="2" /> 工业园  </label>    
			        <label><input id="" name="factoryType" type="radio" value="3" /> 开发区</label>    
			        <label><input id="" name="factoryType" type="radio" value="4" /> 产业基地</label>  
			        <label><input id="" name="factoryType" type="radio" value="5" /> 其他</label>
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  租    金</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryRentPrice" name="factoryRentPrice" type="text"  value="" /> <font class="z3">元/月</font></td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否含管理费</td>
			    <td align="left" valign="middle" class="p25 grzc_32"> 
			    	<label><input id="" name="factoryIncludFee" type="radio" value="1" checked="checked" /> 是</label>     
			      	<label> <input id="" name="factoryIncludFee" type="radio" value="2" /> 否</label>    
			        </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 管 理 费</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryProFee" name="factoryProFee" type="text"  value="" /> 
			      <font class="z3">元/平米·月</font> </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">管理单位</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input id="factoryManagentUnits" name="factoryManagentUnits" type="text"  value="" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="housePayment" checked="checked" name="factoryPayment" type="radio" value="1" onclick="changepaydetail()"/>押&nbsp;
				<select name="factoryPayDetailY" id="factoryPayDetailY" style=" vertical-align:middle">
				<option selected="selected" value="">请选择</option>
				<option value="0">零</option>
				<option value="1">一个月</option>
				<option value="2">两个月</option>
				<option value="3">三个月</option>
				<option value="6">六个月</option>
				</select>
                                                       付&nbsp;
				<select name="factoryPayDetailF" id="factoryPayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option value="1" >一个月</option>
                                    <option value="2">两个月</option>
                                    <option value="3">三个月</option>
                                    <option value="6">六个月</option>
                                    <option value="12">十二个月</option>
 				</select>
			    <input id="housePayment" name="factoryPayment" type="radio" value="2" onclick="changepaydetail();" />面议
				</td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">起租年限</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryLeastYear" name="factoryLeastYear" type="text"  value="" /> <font class="z3">年</font>
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">土地证</td>
			    <td align="left" valign="middle" class="p25">
			    	<label><input id="" name="factoryPayInfo" type="radio" value="1" checked="checked" /> 国有土地证</label>     
			      	<label> <input id="" name="factoryPayInfo" type="radio" value="2" /> 集体土地证  </label>    
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">占地面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryFloorArea" name="factoryFloorArea" type="text"  value="" /> 
			      <font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryBuildArea" name="factoryBuildArea" type="text"  value="" />
			      <font class="z3"> 平方米</font></td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">办公面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryOfficeArea" name="factoryOfficeArea" type="text"  value="" /> <font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">车间面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryWorkshopArea" name="factoryWorkshopArea" type="text"  value="" /> <font class="z3">平方米</font>
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">空地面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factorySpaceArea" name="factorySpaceArea" type="text"  value="" /> <font class="z3">平方米</font>
			    </td>
			  </tr>
			  <tr>
			    <td align="center" valign="middle" bgcolor="#f7f6f1">宿舍情况</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input name="factoryDormitory" type="text"  maxlength="50" value="" />
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">跨    度</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factorySpan" name="factorySpan" type="text"  value="" /><font class="z3"> 米</font>  
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">层    数</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryAllFloor" name="factoryAllFloor" type="text"  value="" /> <font class="z3">层</font> 
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">层    高</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryFloorHeight" name="factoryFloorHeight" type="text"  value="" /> <font class="z3">米</font>   
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">楼层承重</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryLoadBearing" name="factoryLoadBearing" type="text"  value="" /> <font class="z3">吨/平米</font>   
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑结构</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryBuildStructure" name="factoryBuildStructure" type="text"  value="" />     
			    </td>
			  </tr>
			  <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">水</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryWater" name="factoryWater" type="text" maxlength="50" value="" />     
			    </td>
			  </tr><tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">现配电容量</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryHasCapacityNow" name="factoryHasCapacityNow" type="text" maxlength="50" value="" /> <font class="z3">KVA</font>       
			    </td>
			  </tr><tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">可配电容量</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryHasCapacityMax" name="factoryHasCapacityMax" type="text" maxlength="50" value="" /> <font class="z3">KVA</font>      
			    </td>
			  </tr>
			</table>         
           
          </div>
      <div class=" bs_tx">
	    <p><b>图文信息</b></p>
		<table width="732" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
		  <tr>
		    <td width="118" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编号</td>
		    <td width="611" align="left" valign="middle" class="p25 grzc_31">
		    	<input name="factoryPrivateNumber" type="text"  value="" />
		    </td>
		  </tr>
		  <tr>
		    <td align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
		    <td colspan="2" align="left" valign="middle" >
				    <textarea id="factoryContent" name="factoryContent" cols="86" rows="12" ></textarea>			    
					<script>
						CKEDITOR.replace( 'factoryContent' );
					</script>
					<span style="border-bottom:none">可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
		      请勿从其它网站或其它房源描述中拷贝。</span>
		      </td>
		  </tr>
		  <tr>
		    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>交通状况</td>
		    <td align="left" valign="middle" class="p25 grzc_31">
		    	 <textarea class="bdqy2" rows="7" cols="80" id="factoryTraffic" name="factoryTraffic"></textarea>
		    </td>
		  </tr>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<tr><td height="220" align="center" valign="middle" bgcolor="#f7f6f1"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
			         <td height="215" align="left" valign="top" class="p25">
			         	<div class="sc_btn">
			                <input type="file" name="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
			            </div>
			            <div class="tpsc" id="showImg_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
			            </div>
					 </td>
					</tr> 
					<?php } ?>
			      
			       <tr>
				    <td height="124" align="center" valign="middle" bgcolor="#f7f6f1">标题图</td>
				    <td align="left" valign="top" class="p25"><div class="btt" id="topic_image"></div></td>
				    
	        	    <input type="hidden" id="topPicPath" name="topPicPath" value=""/>
	        	    <input type="hidden" id="topPicPathThumb" name="topPicPathThumb" value=""/>
				  </tr>
		</table>
      </div>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
            <td width="120" align="center" valign="middle"><input name="btn_live" type="button" class="mddl1" id="btn_live" value="发布" /></td>
            <td width="320" height="80" align="center" valign="middle"><input name="btn_save" type="button" class="mddl1" id="btn_save" value="保存待发布" /></td>
	      </tr>
	    </table>
	    <input type="hidden" id="action_to_go" name="action_to_go" value="0"/>
	    </form>
    </div>
    </div>
    </div>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>