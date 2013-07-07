<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>个人房源_写字楼</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
$(function() {    
        
    $("#btn_update").click(function() {
        $("#btn_update").attr("disabled", true);
        if (check()) {
            document.getElementById("xzlForm").submit();
        } else {
            $("#btn_update").removeAttr("disabled");
        }
    });
});
  
function check(){
	
	if(!CheckInfoCode('officeNumber',true)) return false;	
	if(!checkPrice('0',true)) return false;
	if(!checkPropFee('officeProFee',true)) return false;
	if(!CheckBuildingArea('officeBuildArea',true)) return false;
	if(!CheckFloor('officeFloor','officeAllFloor',true)) return false;
	
	var officeLevel = $('input:radio[name="officeLevel"]:checked').val();
    if(officeLevel==null){
    	alert("请选择写字楼级别");
        return false;
	}
	
	if(!CheckTitle('officeTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.officeContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	
	return true;	
}

function checkPrice(num,isChk){
	var rNum = num;
	if(isChk){
		var chkedUnit = $('input:radio[name="officeRentPriceUnit"]:checked').val();
		if(chkedUnit == null){
			alert("请选择租金单位");
			return false;
		}
		if(chkedUnit == 1){
			rNum = 30;
		}else if(chkedUnit == 2){
			rNum = 900;
		}else{
			rNum = 1000000000;
		} 			
	}
	
	var value = $("#officeRentPrice").val();
	if(trim(value) == ""){
    	alert("请填写租金");
    	document.getElementById("officeRentPrice").focus()
    	return false;
    }
    
    if(check_float("officeRentPrice")){
    	var p = rNum;
    	if(p=='1000000000') p='10亿';
    	if(parseFloat(value)<=0 || parseFloat(value)>rNum){
    		alert("租金要大于0元小于" + p + "元");
    		document.getElementById("officeRentPrice").focus()
    		return false;
    	}
    	return true;
    }else{
    	alert("租金只能填写数字和小数点");
    	document.getElementById("officeRentPrice").focus()
    	return false;
    }    
}

function checkRentPrice(){
	var value = $("#officeRentPrice").val(); 
    if(trim(value) == ""){
    	alert("请填写租金");
    	return false;
    }
    
    if(check_float("officeRentPrice")){
    	if(parseFloat(value)<=0 || parseFloat(value)>1000000000){
    		alert("租金要大于0元小于10亿元");
    		return false;
    	}
    	return true;
    }else{
    	alert("租金只能填写数字和小数点");
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
    <p>你的位置: <a href="#">编辑写字楼出租房源</a></p>
   	<div class="qg_bs">
      <div class="bs_tx">
        <p><b>基本资料</b></p>
            <form id="xzlForm" name="xzlForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="xzl">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" name="estId" value="<!--{$estId}-->"><!--{$estName}--></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeNumber" name="officeNumber" type="text" value="<!--{$officeNumber}-->" maxlength="12" onblur="CheckInfoCode('officeNumber',true)" />  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 写字楼类型</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeType" type="radio" value="1" <!--{if $officeType eq 1 }--> checked="checked" <!--{/if}-->/> 纯写字楼</label>     
      	<label> <input id="" name="officeType" type="radio" value="2" <!--{if $officeType eq 2 }--> checked="checked" <!--{/if}-->/> 商住楼</label>
        <label> <input id="" name="officeType" type="radio" value="3" <!--{if $officeType eq 3 }--> checked="checked" <!--{/if}-->/> 商业综合体楼</label>
         <label> <input id="" name="officeType" type="radio" value="4" <!--{if $officeType eq 4 }--> checked="checked" <!--{/if}-->/> 酒店写字楼</label>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> <font class="red">*</font> 租    金</td>
    <td align="left" valign="middle" class="p25 grzc_32">
    <input id="officeRentPrice" name="officeRentPrice" type="text" onblur="checkRentPrice();" value="<!--{$officeRentPrice}-->"/>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" <!--{if $officeRentPriceUnit eq 1 }--> checked="checked" <!--{/if}--> />元/平米·天</label>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" <!--{if $officeRentPriceUnit eq 2 }--> checked="checked" <!--{/if}--> />元/平米·月</label>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" <!--{if $officeRentPriceUnit eq 3 }--> checked="checked" <!--{/if}--> />元/月</label>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeProFee" name="officeProFee" type="text" value="<!--{$officeProFee}-->" onblur="checkPropFee('officeProFee',true);" /> 元/平米·月
    	</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeBuildArea" name="officeBuildArea" type="text" value="<!--{$officeBuildArea}-->" maxlength="8" onblur="CheckBuildingArea('officeBuildArea',true);" /> 平方米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="officeFloor" name="officeFloor" type="text" value="<!--{$officeFloor}-->" onblur="CheckFloor('officeFloor','officeAllFloor',true);" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="officeAllFloor" name="officeAllFloor" type="text" value="<!--{$officeAllFloor}-->" onblur="CheckFloor('officeFloor','officeAllFloor',true);" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeDivision" type="radio" value="1" <!--{if $officeDivision eq 1 }--> checked="checked" <!--{/if}--> /> 可分割</label>     
      	<label> <input id="" name="officeDivision" type="radio" value="2" <!--{if $officeDivision eq 2 }--> checked="checked" <!--{/if}--> /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeFitment" type="radio" value="1" <!--{if $officeFitment eq 1 }--> checked="checked" <!--{/if}--> /> 精装修</label>     
      	<label> <input id="" name="officeFitment" type="radio" value="2" <!--{if $officeFitment eq 2 }--> checked="checked" <!--{/if}--> /> 简装修</label>
        <label> <input id="" name="officeFitment" type="radio" value="3" <!--{if $officeFitment eq 3 }--> checked="checked" <!--{/if}--> /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼级别</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <label><input id="" name="officeLevel" type="radio" value="1" <!--{if $officeLevel eq 1 }--> checked="checked" <!--{/if}--> /> 甲级</label>     
      	<label> <input id="" name="officeLevel" type="radio" value="2" <!--{if $officeLevel eq 2 }--> checked="checked" <!--{/if}--> /> 乙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="3" <!--{if $officeLevel eq 3 }--> checked="checked" <!--{/if}--> /> 丙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="4" <!--{if $officeLevel eq 4 }--> checked="checked" <!--{/if}--> /> 其它</label>
    </td>
  </tr>
</table>
	
        </div>
      <div class=" bs_tx">
    <p><b>图文信息</b></p>
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>图片展示</td>
    <td colspan="2" width="280" align="left" valign="middle" class="p25 grzc_31">
		<input id="officePhoto" name="officePhoto" type="file"  value="" /><br>
    	<img src="http://localhost/88hom/uploads/community/<!--{$propPhoto}-->" class="l">
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
    	<input id="officeTitle" name="officeTitle" type="text" value="<!--{$officeTitle}-->" maxlength="60" onblur="CheckTitle('officeTitle',true);" onkeyup="textCounter(document.getElementById('officeTitle'),document.getElementById('officeTitleAlert'),30);" /> 还可写<span id="officeTitleAlert"><font class="red">30</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
    <td colspan="2" align="left" valign="middle">
    <textarea id="officeContent" name="officeContent" cols="86" rows="12" ><!--{$officeContent}--></textarea>			    
	<script>
		CKEDITOR.replace( 'officeContent' );
	</script>
    <span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
请勿从其它网站或其它房源描述中拷贝。</span>
         <span>
         <b style="text-indent:0px;">注意事项：</b> <br />
1.上传宽度大于600像素，比例为5:4的图片可获得更好的展示效果。<br />
2.请勿上传有水印、盖章等任何侵犯他人版权或含有广告信息的图片。</span>
    	
    </td>
  </tr>
</table>
      </div>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
            <td width="120" align="center" valign="middle">
            <td width="120" align="center" valign="middle"><input name="btn_update" type="button" class="mddl1" id="btn_update" value="修改" /></td>
            <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
	      </tr>
	    </table>
	    <input type="hidden" id="actionType" name="actionType" value="update"/>
	    <input type="hidden" id="propId" name="propId" value="<!--{$propId}-->"/>
	    </form>
    </div>
    </div>
    </div>

<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
