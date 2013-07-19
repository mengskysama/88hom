<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>编辑别墅出租房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
$(function() {    
        
    $("#btn_update").click(function() {
        $("#btn_update").attr("disabled", true);
        if (check()) {
            document.getElementById("bsForm").submit();
        } else {
            $("#btn_update").removeAttr("disabled");
        }
    });
		
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        if (check()) {
            $("#action_to_go").val("1");
            document.getElementById("bsForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
	<!--{foreach from=$picTypeList item=item key=key}-->
    initPicUp3(<!--{$key}-->,'<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
	<!--{/foreach}-->
});
  
function check(){
	
	if(!CheckInfoCode('villaNumber',true)) return false;
	if(!checkRentPrice()) return false;
	if(!CheckRoom('villaRoom',true)) return false;
	if(!CheckRoom('villaHall',true)) return false;
	if(!CheckRoom('villaToilet',true)) return false;
	if(!CheckRoom('villaKitchen',true)) return false;
	if(!CheckRoom('villaBalcony',true)) return false;
	if(!CheckRentArea()) return false;
	if(!checkVillaAllFloor()) return false;

	if($("input[name='villaCellar']:checked").val() == 1 && !CheckCellarArea('villaCellarArea',true)) return false;	
	if($("input[name='villaGarden']:checked").val() == 1 && !CheckGardenArea('villaGardenArea',true)) return false;
	if($("input[name='villaGarage']:checked").val() == 1 && !checkVillaGarageCount()) return false;

	
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

function CheckRentArea()
{
	var KeyName = "villaBuildArea";
    var value=document.getElementById(KeyName).value;
    
    if(value==''){
    	alert("请填写出租面积");
		$("#villaBuildArea").focus();
        return false;
    }
        
    if(check_float(KeyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("出租面积必须大于2且小于10000");
			$("#villaBuildArea").focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#villaBuildArea").focus();
        return false;
	}
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

function changepaydetail() {
	var val = $('input:radio[name="villaPayment"]:checked').val();
    if (val == 2) {
        document.getElementById("villaPayDetailY").value = "";
        document.getElementById("villaPayDetailF").value = "";
        document.getElementById("villaPayDetailY").disabled = "disabled"
        document.getElementById("villaPayDetailF").disabled = "disabled"
    }
    else {
        document.getElementById("villaPayDetailY").disabled = ""
        document.getElementById("villaPayDetailF").disabled = ""
    }
}
function checkRentPrice(){
	
    var value=document.getElementById("villaRentPrice").value;
    if(trim(value) == ''){
		alert("请填写租金");
		$("#villaRentPrice").focus();
        return false;
    }

    if(check_float("villaRentPrice")){
        if(parseFloat(value)<=100||parseFloat(value)>=300000){
            alert("租金要大于100元小于30万元");
			$("#villaRentPrice").focus();
        	return false;
        }
		return true;
    }else{
		alert("只能填写数字");
		$("#villaRentPrice").focus();
		return false;
    }
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
    <p>你的位置: <a href="#">编辑别墅出租房源</a></p>
   	<div class="qg_bs">
        <form id="bsForm" name="bsForm" action="property_handler.php" method="post" enctype="multipart/form-data">
      <div class="bs_tx">
        <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="bs">
            <input type="hidden" name="prop_tx_type" value="2">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" name="estId" value="<!--{$estId}-->"><!--{$estName}--></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaNumber" name="villaNumber" type="text" maxlength="12" value="<!--{$villaNumber}-->"/> </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateVillaNumber" name="privateVillaNumber" type="text" value="<!--{$privateVillaNumber}-->"/></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑形式</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaBuildForm" type="radio" value="1" <!--{if $villaBuildForm eq 1 }--> checked="checked" <!--{/if}--> /> 独栋 
    <input id="" name="villaBuildForm" type="radio" value="2" <!--{if $villaBuildForm eq 2 }--> checked="checked" <!--{/if}--> /> 联排  
    <input id="" name="villaBuildForm" type="radio" value="3" <!--{if $villaBuildForm eq 3 }--> checked="checked" <!--{/if}--> /> 双拼 
    <input id="" name="villaBuildForm" type="radio" value="4" <!--{if $villaBuildForm eq 4 }--> checked="checked" <!--{/if}--> /> 叠加 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  租    金</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaRentPrice" name="villaRentPrice" type="text" value="<!--{$villaRentPrice}-->" /> <font class="z3">元/月</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
    <td align="left" valign="middle" class="p25 grzc_36">
    <input id="villaRoom" name="villaRoom" type="text" maxlength="1" value="<!--{$villaRoom}-->"/> <font class="z3">室</font> 
    <input id="villaHall" name="villaHall" type="text" maxlength="1" value="<!--{$villaHall}-->"/> <font class="z3">厅</font> 
    <input id="villaToilet" name="villaToilet" type="text" maxlength="1" value="<!--{$villaToilet}-->"/> <font class="z3">卫</font> 
    <input id="villaKitchen" name="villaKitchen" type="text" maxlength="1" value="<!--{$villaKitchen}-->"/> <font class="z3">厨</font> 
    <input id="villaBalcony" name="villaBalcony" type="text" maxlength="1" value="<!--{$villaBalcony}-->"/> <font class="z3">阳台</font></td>
  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>租赁方式</td>
			    <td align="left" valign="middle" class="p25">
				<input type="radio" name="villaRentType" id="" value="1" <!--{if $villaRentType eq 1 }--> checked="checked" <!--{/if}--> /> 整租
                <input type="radio" name="villaRentType" id="" value="2" <!--{if $villaRentType eq 2 }--> checked="checked" <!--{/if}--> /> 合租				
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="villaPayment" checked="checked" name="villaPayment" type="radio" value="1" <!--{if $villaPayment eq 1 }--> checked="checked" <!--{/if}--> onclick="changepaydetail()"/>押&nbsp;
				<select name="villaPayDetailY" id="villaPayDetailY" style=" vertical-align:middle">
				<option value="">请选择</option>
				<option value="0" <!--{if $villaPayDetailY eq 0 }--> selected="selected" <!--{/if}-->>零</option>
				<option value="1" <!--{if $villaPayDetailY eq 1 }--> selected="selected" <!--{/if}-->>一个月</option>
				<option value="2" <!--{if $villaPayDetailY eq 2 }--> selected="selected" <!--{/if}-->>两个月</option>
				<option value="3" <!--{if $villaPayDetailY eq 3 }--> selected="selected" <!--{/if}-->>三个月</option>
				<option value="6" <!--{if $villaPayDetailY eq 6 }--> selected="selected" <!--{/if}-->>六个月</option>
				</select>
                                                       付&nbsp;
				<select name="villaPayDetailF" id="villaPayDetailF" style=" vertical-align:middle">
                                    <option value="">请选择</option>
                                    <option value="1" <!--{if $villaPayDetailF eq 1 }--> selected="selected" <!--{/if}-->>一个月</option>
                                    <option value="2" <!--{if $villaPayDetailF eq 2 }--> selected="selected" <!--{/if}-->>两个月</option>
                                    <option value="3" <!--{if $villaPayDetailF eq 3 }--> selected="selected" <!--{/if}-->>三个月</option>
                                    <option value="6" <!--{if $villaPayDetailF eq 6 }--> selected="selected" <!--{/if}-->>六个月</option>
                                    <option value="12" <!--{if $villaPayDetailF eq 12 }--> selected="selected" <!--{/if}-->>十二个月</option>
 				</select>
			    <input id="villaPayment" name="villaPayment" type="radio" value="2" <!--{if $villaPayment eq 2 }--> checked="checked" <!--{/if}--> onclick="changepaydetail();" />面议
				</td>
			  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 出租面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildArea" name="villaBuildArea" type="text" value="<!--{$villaBuildArea}-->" maxlength="8" /> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaForward" type="radio" value="1" <!--{if $villaForward eq 1 }--> checked="checked" <!--{/if}-->/> 东 
    <input id="" name="villaForward" type="radio" value="2" <!--{if $villaForward eq 2 }--> checked="checked" <!--{/if}-->/> 西  
    <input id="" name="villaForward" type="radio" value="3" <!--{if $villaForward eq 3 }--> checked="checked" <!--{/if}-->/> 南 
    <input id="" name="villaForward" type="radio" value="4" <!--{if $villaForward eq 4 }--> checked="checked" <!--{/if}-->/> 北 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 地上层数</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaAllFloor" name="villaAllFloor" type="text" maxlength="3" value="<!--{$villaAllFloor}-->"/> 
    <font class="z3">层</font></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellar" name="villaCellar" type="radio" value="1" <!--{if $villaCellar eq 1 }--> checked="checked" <!--{/if}--> onclick="selectCellar(1)"/> 有 
    <input id="villaCellar" name="villaCellar" type="radio" value="0" <!--{if $villaCellar eq 0 }--> checked="checked" <!--{/if}--> onclick="selectCellar(0)"/> 无</td>
  </tr>
  <!--{if $villaCellar eq 1 }--> 
  <tr id="tr_villaCellarArea">
  <!--{else}--> 
  <tr id="tr_villaCellarArea" style="display: none;">
  <!--{/if}-->
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaCellarArea" name="villaCellarArea" type="text" maxlength="5" value="<!--{$villaCellarArea}-->"/> 
    <font class="z3"> 平方米</font></td>
  </tr>
  <!--{if $villaCellar eq 1 }--> 
  <tr id="tr_villaCellarType">
  <!--{else}--> 
  <tr id="tr_villaCellarType" style="display: none;">
  <!--{/if}-->
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室类型</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellarType" name="villaCellarType" type="radio" value="1" <!--{if $villaCellarType eq 1 }--> checked="checked" <!--{/if}--> /> 全明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="2" <!--{if $villaCellarType eq 2 }--> checked="checked" <!--{/if}--> /> 半明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="3" <!--{if $villaCellarType eq 3 }--> checked="checked" <!--{/if}--> /> 暗</td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaGarden" name="villaGarden" type="radio" value="1" <!--{if $villaGarden eq 1 }--> checked="checked" <!--{/if}--> onclick="selectGarden(1)" /> 有 
    <input id="villaGarden" name="villaGarden" type="radio" value="0" <!--{if $villaGarden eq 0 }--> checked="checked" <!--{/if}--> onclick="selectGarden(0)" /> 无</td>
  </tr>
  <!--{if $villaGarden eq 1 }--> 
  <tr id="tr_villaGardenArea">
  <!--{else}--> 
  <tr id="tr_villaGardenArea" style="display: none;">
  <!--{/if}-->
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园面积</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGardenArea" name="villaGardenArea" type="text" maxlength="5" value="<!--{$villaGardenArea}-->"/> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库</td>
    <td align="left" valign="middle" class="p25"> 
    <input id="villaGarage" name="villaGarage" type="radio" value="1" <!--{if $villaGarage eq 1 }--> checked="checked" <!--{/if}--> onclick="selectGarge(1)"/> 有 
    <input id="villaGarage" name="villaGarage" type="radio" value="0" <!--{if $villaGarage eq 0 }--> checked="checked" <!--{/if}--> onclick="selectGarge(0)"/> 无</td>
  </tr>
  <!--{if $villaGarage eq 1 }--> 
  <tr id="tr_villaGarageCount">
  <!--{else}--> 
  <tr id="tr_villaGarageCount" style="display: none;">
  <!--{/if}-->
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库数量</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGarageCount" name="villaGarageCount" type="text" maxlength="2" value="<!--{$villaGarageCount}-->"/> <font class="z3">个</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
  	    <label><input id="" name="villaFitment" type="radio" value="1" <!--{if $villaFitment eq 1 }--> checked="checked" <!--{/if}--> /> 豪华装修</label>     
      	<label><input id="" name="villaFitment" type="radio" value="2" <!--{if $villaFitment eq 2 }--> checked="checked" <!--{/if}--> /> 精装修  </label>    
        <label><input id="" name="villaFitment" type="radio" value="3" <!--{if $villaFitment eq 3 }--> checked="checked" <!--{/if}--> /> 中等装修</label>    
        <label><input id="" name="villaFitment" type="radio" value="4" <!--{if $villaFitment eq 4 }--> checked="checked" <!--{/if}--> /> 简装修</label>  
        <label><input id="" name="villaFitment" type="radio" value="5" <!--{if $villaFitment eq 5 }--> checked="checked" <!--{/if}--> /> 毛坯</label>
    </td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="villaBaseService[]" type="checkbox" value="1" <!--{$villaBaseService1}--> /> 煤气/天然气</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="2" <!--{$villaBaseService2}--> /> 暖气 </label></span>
         <span> <label><input name="villaBaseService[]" type="checkbox" value="3" <!--{$villaBaseService3}--> /> 电梯 </label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="4" <!--{$villaBaseService4}--> /> 车位/车库</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="5" <!--{$villaBaseService5}--> /> 储藏室/地下室</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="6" <!--{$villaBaseService6}--> /> 花园/小院</label></span>
         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'villaBaseService[]')" class="red">[全选]</a></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">看房时间</td>
    <td align="left" valign="middle" class="p25">
  		 <label><input id="" name="villaLookTime" type="radio" value="1" <!--{if $villaLookTime eq 1 }--> checked="checked" <!--{/if}--> /> 随时看房 </label>     
      	<label> <input id="" name="villaLookTime" type="radio" value="2" <!--{if $villaLookTime eq 2 }--> checked="checked" <!--{/if}--> /> 非工作时间  </label>    
        <label><input id="" name="villaLookTime" type="radio" value="3" <!--{if $villaLookTime eq 3 }--> checked="checked" <!--{/if}--> /> 电话预约</label>    
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
				<input id="villaTitle" name="villaTitle" type="text" value="<!--{$villaTitle}-->" maxlength="60" onkeyup="textCounter(document.getElementById('villaTitle'),document.getElementById('villaTitleAlert'),30);" /> 还可写<span id="villaTitleAlert"><font class="red">30</font></span>个汉字</td>
		  </tr>
		  <tr>
		    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
		    <td colspan="2" align="left" valign="middle">
					    <textarea id="villaContent" name="villaContent" cols="86" rows="12" ><!--{$villaContent}--></textarea>			    
			            <script>
			                CKEDITOR.replace( 'villaContent' );
			            </script>
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
						<!--{foreach from=$propertyDetailPicList item=item_ key=key_}-->
			        	<!--{if $key==$item_.pictypeId}-->
			        	<dl id="pic_<!--{$key_}-->">
        	        		<dt><img src="<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->"></dt>
        	        		<dd><span class="redlink"><a href="javascript:void(0)" onclick="changeTopicImg('<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->','<!--{$item_.picThumb}-->','<!--{$item_.picUrl}-->')">设为标题图</a></span></dd>
        	        		<dd>描述：<input type="text" class="input01" name="picName[]" value="<!--{$item_.picInfo}-->"/><a href="javascript:void(0)" onclick="dropContainer('pic_<!--{$key_}-->')"><img src="<!--{$cfg.web_url}-->templates/images/ucenter/cha.JPG"></a></dd>
        	    		<input type="hidden" name="picPath[]" value="<!--{$item_.picUrl}-->"/>
        	    		<input type="hidden" name="picPathThumb[]" value="<!--{$item_.picThumb}-->"/>
        	    		<input type="hidden" name="picTypeId[]" value="<!--{$item_.pictypeId}-->"/>
        	    		<input type="hidden" name="picLayer[]" value="0"/>
        	    		</dl>
						<!--{/if}-->
						<!--{/foreach}-->	
		            </div>
				 </td>
				</tr> 
				<!--{/foreach}-->
		      
		       <tr>
			    <td height="124" align="center" valign="middle" bgcolor="#f7f6f1">标题图</td>
			    <td align="left" valign="top" class="p25"><div class="btt" id="topic_image"><img src="<!--{$cfg.web_url}-->uploads/<!--{$topPicThumb}-->"></div></td>
			    
        	    <input type="hidden" id="topPicPath" name="topPicPath" value="<!--{$topPicPath}-->"/>
        	    <input type="hidden" id="topPicPathThumb" name="topPicPathThumb" value="<!--{$topPicThumb}-->"/>
			  </tr>
		</table>
      </div>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
            <td width="120" align="center" valign="middle"><input name="btn_update" type="button" class="mddl1" id="btn_update" value="修改" /></td>
            <td width="320" height="80" align="center" valign="middle"><!--{if $propState eq 0}--><input name="btn_live" type="button" class="mddl1" id="btn_live" value="发布" /><!--{/if}--></td>
	      </tr>
	    </table>
	    <input type="hidden" id="actionType" name="actionType" value="update"/>
	    <input type="hidden" id="propId" name="propId" value="<!--{$propId}-->"/>
	    <input type="hidden" id="action_to_go" name="action_to_go" value="<!--{$propState}-->"/>
	    </form>
    </div>
    </div>
    </div>

<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
