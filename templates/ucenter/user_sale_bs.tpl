<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>录入别墅出售房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script>
$(function() {    
	<!--{foreach from=$picTypeList item=item key=key}-->
    initPicUp3(<!--{$key}-->,'<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
	<!--{/foreach}-->
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
        	$("#action_to_go").val(1);
            document.getElementById("bsForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
        
    $("#btn_save").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
            document.getElementById("bsForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
});
  
function check(){
	var estNameValue = $("#estId").val();
	if(trim(estNameValue) == ''){
		alert("请填写楼盘名称");
		$("#estName").focus();
		return false;
	}
	
	if(!CheckInfoCode('villaNumber',true)) return false;
	if(!CheckPrice('villaSellPrice',true,'CS')) return false;
	if(!CheckRoom('villaRoom',true)) return false;
	if(!CheckRoom('villaHall',true)) return false;
	if(!CheckRoom('villaToilet',true)) return false;
	if(!CheckRoom('villaKitchen',true)) return false;
	if(!CheckRoom('villaBalcony',true)) return false;
	if(!CheckBuildingArea('villaBuildArea',true)) return false;
	if(!CheckLiveArea('villaUseArea','villaBuildArea',true)) return false;
	if(!CheckCreateTime('villaBuildYear',false)) return false;
	if(!checkVillaAllFloor()) return false;

	if($("input[name='villaCellar']:checked").val() == 1 && !CheckCellarArea('villaCellarArea',true)) return false;	
	if($("input[name='villaGarden']:checked").val() == 1 && !CheckGardenArea('villaGardenArea',true)) return false;
	if($("input[name='villaGarage']:checked").val() == 1 && !checkVillaGarageCount()) return false;
	if($("input[name='villaParkingPlace']:checked").val() == 1 && !checkVillaParkingPlaceCount()) return false;	
	
	if(!CheckTitle('villaTitle',true)) return false;
	var villaContentValue = CKEDITOR.instances.villaContent.getData(); 
	if(trim(villaContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	if($("#topPicPath").val() == ""){
		alert("请选择标题图");
		return false;
	}
	
	return true;	
}

function selectCellar(visible){
	if(visible==1){
		$("#tr_villaCellarArea").css("display","");
        $("#tr_villaCellarType").css("display","");
    }else{
        $("#tr_villaCellarArea").css("display","none");
        $("#tr_villaCellarType").css("display","none");
        $("input[name='villaCellarType']").each(function(){this.checked=false;})
        $("#villaCellarArea").val("");
    }
}

function selectGarden(visible){
	if(visible==1){
		$("#tr_villaGardenArea").css("display","");
    }else{
        $("#tr_villaGardenArea").css("display","none");
        $("#villaGardenArea").val("");
    }
}

function selectGarge(visible){
	if(visible==1){
		$("#tr_villaGarageCount").css("display","");
	}else{
        $("#tr_villaGarageCount").css("display","none");
        $("#villaGarageCount").val("");
	}
}
function checkVillaAllFloor(){

    var value=document.getElementById("villaAllFloor").value;
    if(trim(value) == ""){
    	alert("请填写楼层");
		$("#villaAllFloor").focus();
    	return false;
    }
    
    if(!IsInt("villaAllFloor")){
		alert("地面层数只能填写数字");
		$("#villaAllFloor").focus();
		return false;
	}
    
    if(parseInt(value) <= 0){
		alert("地面层数必须大于0");
		$("#villaAllFloor").focus();
		return false;
	}
    return true;
}
function checkVillaGarageCount(){

    var value=document.getElementById("villaGarageCount").value;
    if(trim(value) == ""){
    	alert("请填写车库数量");
		$("#villaGarageCount").focus();
    	return false;
    }
    
    if(!IsInt("villaGarageCount")){
		alert("车库数量只能填写数字");
		$("#villaGarageCount").focus();
		return false;
	}
    
    if(parseInt(value) <= 0){
		alert("车库数量必须大于0");
		$("#villaGarageCount").focus();
		return false;
	}
    return true;
}

</script>
</head>

<body>
<!--求购头部-->
<!--{include file="$header_ucenter_user"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_user_left_menu"}-->
  <div class="qg_r">
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
        <form id="bsForm" name="bsForm" action="property_handler.php" method="post" enctype="multipart/form-data">
 		   <ul>
   			 	<li><a href="user_sale_zz.php">录入住宅出售房源</a></li>
    		    <li><a href="user_sale_bs.php">录入别墅出售房源</a></li>
     		    <li><a href="user_sale_sp.php">录入商铺出售房源</a></li>
      		 	<li><a href="user_sale_xzl.php">录入写字楼出售房源</a></li>
   		  </ul>
      <div class="bs_tx">
        <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> <!--{$restLivePropsCount}--></font> 条</span></p>
            <input type="hidden" name="prop_type" value="bs">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" id="estId" name="estId"/>
    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);emptyEstId();" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
    <div class="tswords" style="display: none;" id="dis_est_alert">
                	<span class="alert01" style="margin-left:0;" id="P1">请选择列表中匹配的楼盘录入</span><a id="addestate" href="estate_input.php" title="" target="_blank">我要添加新楼盘</a>
                </div>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaNumber" name="villaNumber" type="text" maxlength="12" /> </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateVillaNumber" name="privateVillaNumber" type="text" /></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑形式</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaBuildForm" type="radio" value="1" checked="checked" /> 独栋 
    <input id="" name="villaBuildForm" type="radio" value="2" /> 联排  
    <input id="" name="villaBuildForm" type="radio" value="3" /> 双拼 
    <input id="" name="villaBuildForm" type="radio" value="4" /> 叠加 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaSellPrice" name="villaSellPrice" type="text" /> <font class="z3">万元/套</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
    <td align="left" valign="middle" class="p25 grzc_36">
    <input id="villaRoom" name="villaRoom" type="text" maxlength="1" /> <font class="z3">室</font> 
    <input id="villaHall" name="villaHall" type="text" maxlength="1" /> <font class="z3">厅</font> 
    <input id="villaToilet" name="villaToilet" type="text" maxlength="1" /> <font class="z3">卫</font> 
    <input id="villaKitchen" name="villaKitchen" type="text" maxlength="1" /> <font class="z3">厨</font> 
    <input id="villaBalcony" name="villaBalcony" type="text" maxlength="1" /> <font class="z3">阳台</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">厅 结 构</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaBuildStructure" type="radio" value="1" checked="checked" /> 平层 
    <input id="" name="villaBuildStructure" type="radio" value="2" /> 挑高
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildArea" name="villaBuildArea" type="text" maxlength="8" /> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">使用面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaUseArea" name="villaUseArea" type="text" maxlength="8" />
      <font class="z3"> 平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑年代</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildYear" name="villaBuildYear" type="text" maxlength="4" />
      <font class="z3"> 年</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaForward" type="radio" value="1" checked="checked"/> 东 
    <input id="" name="villaForward" type="radio" value="2" /> 西  
    <input id="" name="villaForward" type="radio" value="3" /> 南 
    <input id="" name="villaForward" type="radio" value="4" /> 北 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 地上层数</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaAllFloor" name="villaAllFloor" type="text" maxlength="3" /> 
    <font class="z3">层</font></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室</td>
    <td align="left" valign="middle" class="p25"><input id="villaCellar" name="villaCellar" type="radio" value="1" onclick="selectCellar(1)"/> 有 <input id="" name="villaCellar" type="radio" value="0" checked="checked" onclick="selectCellar(0)"/> 无</td>
  </tr>
  <tr id="tr_villaCellarArea" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaCellarArea" name="villaCellarArea" type="text" maxlength="5" /> 
    <font class="z3"> 平方米</font></td>
  </tr>
  <tr id="tr_villaCellarType" style="display: none;">
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室类型</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellarType" name="villaCellarType" type="radio" value="1" /> 全明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="2" checked="checked"/> 半明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="3" /> 暗</td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园</td>
    <td align="left" valign="middle" class="p25"><input id="villaGarden" name="villaGarden" type="radio" value="1" onclick="selectGarden(1)" /> 有 <input id="" name="villaGarden" type="radio" value="0" checked="checked" onclick="selectGarden(0)" /> 无</td>
  </tr>
  <tr id="tr_villaGardenArea" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园面积</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGardenArea" name="villaGardenArea" type="text" maxlength="5" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库</td>
    <td align="left" valign="middle" class="p25"> <input id="villaGarage" name="villaGarage" type="radio" value="1" onclick="selectGarge(1)"/>有 <input id="" name="villaGarage" type="radio" value="0" checked="checked" onclick="selectGarge(0)"/> 无</td>
  </tr>
  <tr id="tr_villaGarageCount" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库数量</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGarageCount" name="villaGarageCount" type="text" maxlength="2" /> <font class="z3">个</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车位</td>
    <td align="left" valign="middle" class="p25"> <input id="" name="villaParkingPlace" type="radio" value="1" onclick="selectParkingPlace(1)"/>有 <input id="" name="villaParkingPlace" type="radio" value="0" checked="checked" onclick="selectParkingPlace(0)"/> 无</td>
  </tr>
  <tr id="tr_villaParkingPlaceCount" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车位数量</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaParkingPlaceCount" name="villaParkingPlaceCount" type="text" maxlength="2" /> <font class="z3">个</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
  	    <label><input id="" name="villaFitment" type="radio" value="1" /> 豪华装修</label>     
      	<label> <input id="" name="villaFitment" type="radio" value="2" /> 精装修  </label>    
        <label><input id="" name="villaFitment" type="radio" value="3" /> 中等装修</label>    
        <label><input id="" name="villaFitment" type="radio" value="4" checked="checked" /> 简装修</label>  
        <label><input id="" name="villaFitment" type="radio" value="5" /> 毛坯</label>
    </td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="villaBaseService[]" type="checkbox" value="1" / > 煤气/天然气</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="2" / > 暖气 </label></span>
         <span> <label><input name="villaBaseService[]" type="checkbox" value="3" / > 电梯 </label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="4" / > 车位/车库</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="5" / > 储藏室/地下室</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="6" / > 花园/小院</label></span>
         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'villaBaseService[]')" class="red">[全选]</a></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">看房时间</td>
    <td align="left" valign="middle" class="p25">
  		 <label><input id="" name="villaLookTime" type="radio" value="1" checked="checked" /> 随时看房 </label>     
      	<label> <input id="" name="villaLookTime" type="radio" value="2" /> 非工作时间  </label>    
        <label><input id="" name="villaLookTime" type="radio" value="3" /> 电话预约</label>    
    </td>
  </tr>
</table>
	
        </div>
      <div class=" bs_tx">
    <p><b>图文信息</b></p>
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
					<input id="villaTitle" name="villaTitle" type="text"  value="" maxlength="60" onkeyup="textCounter(document.getElementById('villaTitle'),document.getElementById('villaTitleAlert'),30);" /> 还可写<span id="villaTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle"><!--{$FCKeditor}-->
			    <div class="bs"><span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
      请勿从其它网站或其它房源描述中拷贝。</span></div>
		      <div class="bs01">
		        <strong>注意事项：</strong></br>
		        1.上传宽度大于600像素，比例为4:3的图片可获得更好的展示效果。</br>
		        2.请勿上传有水印、盖章等任何侵犯他人版权或含有广告信息的图片。</br>
		        3.可上传20张图片，每张小于2M，建议尺寸大于400x300像素。</br>
		        <span class="redlink"><a href="#">如何批量上传 安装FLASH插件查看最佳图片示例</a></span></div>
			    	
			    </td>
			  </tr>
				<!--{foreach from=$picTypeList item=item key=key}-->
				<tr><td height="220" align="center" valign="middle" bgcolor="#f7f6f1"><!--{$item}--></td>
		         <td height="215" align="left" valign="top" class="p25">
		         	<div class="sc_btn">
		                <input type="file" name="file_upload_<!--{$key}-->" id="file_upload_<!--{$key}-->"/>
		            </div>
		            <div class="tpsc" id="showImg_<!--{$key}-->">
		            </div>
				 </td>
				</tr> 
				<!--{/foreach}-->
		      
		       <tr>
			    <td height="124" align="center" valign="middle" bgcolor="#f7f6f1">标题图</td>
			    <td align="left" valign="top" class="p25"><div id="topic_image"></div></td>
			    
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

<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
