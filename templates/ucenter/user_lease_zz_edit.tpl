<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>录入住宅出租房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
$(function() {    
        
    $("#btn_update").click(function() {
        $("#btn_update").attr("disabled", true);
        if (check()) {
            document.getElementById("zzForm").submit();
        } else {
            $("#btn_update").removeAttr("disabled");
        }
    });
});
  
function check(){
	
	if(!CheckInfoCode('houseNumber',true)) return false;
	if(!checkRentPrice()) return false;
	if(!CheckRoom('houseRoom',true)) return false;
	if(!CheckRoom('houseHall',true)) return false;
	if(!CheckRoom('houseToilet',true)) return false;
	if(!CheckRoom('houseKitchen',true)) return false;
	if(!CheckRoom('houseBalcony',true)) return false;
	if(!CheckBuildingArea('houseRentArea',true)) return false;
	if(!CheckFloor('houseFloor','houseAllFloor',true)) return false;
	
	if(!CheckTitle('houseTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.houseContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	
	return true;	
}

function ISJoinLease(isJ){
	if(isJ==1){
		document.getElementById("tr_houseRentType_join").style.display="none";
	}else{
		document.getElementById("tr_houseRentType_join").style.display="";
	}
}

function changepaydetail() {
	var val = $('input:radio[name="housePayment"]:checked').val();
    if (val == 2) {
        document.getElementById("housePayDetailY").value = "";
        document.getElementById("housePayDetailF").value = "";
        document.getElementById("housePayDetailY").disabled = "disabled"
        document.getElementById("housePayDetailF").disabled = "disabled"
    }
    else {
        document.getElementById("housePayDetailY").disabled = ""
        document.getElementById("housePayDetailF").disabled = ""
    }
}
function checkRentPrice(){
	
    var value=document.getElementById("houseSellPrice").value;
    if(trim(value) == ''){
		alert("请填写租金");
        return false;
    }

    if(check_float("houseSellPrice")){
        if(parseFloat(value)<=100||parseFloat(value)>=300000){
            alert("租金要大于100元小于30万元");
        	return false;
        }
		return true;
    }else{
		alert("只能填写数字");
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
    <p>你的位置: <a href="#">编辑住宅出租房源</a></p>
   	<div class="qg_bs">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <form id="zzForm" name="zzForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="zz">
            <input type="hidden" name="prop_tx_type" value="2">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
			    <td align="left" valign="middle" class="p25 grzc_31">
    			<input type="hidden" name="estId" value="<!--{$estId}-->"><!--{$estName}--></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseNumber" name="houseNumber" type="text" value="<!--{$houseNumber}-->" maxlength="12" onblur="CheckInfoCode('houseNumber',true)" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateHouseNumber" name="privateHouseNumber" type="text" value="<!--{$privateHouseNumber}-->" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="houseRoom" name="houseRoom" type="text" value="<!--{$houseRoom}-->" maxlength="1" onblur="CheckRoom('houseRoom',true)"/> 室 
			    <input id="houseHall" name="houseHall" type="text" value="<!--{$houseHall}-->" maxlength="1" onblur="CheckRoom('houseHall',true)"/> 厅 
			    <input id="houseToilet" name="houseToilet" type="text" value="<!--{$houseToilet}-->" maxlength="1" onblur="CheckRoom('houseToilet',true);"/> 卫 
			    <input id="houseKitchen" name="houseKitchen" type="text" value="<!--{$houseKitchen}-->" maxlength="1" onblur="CheckRoom('houseKitchen',true);"/> 厨 
			    <input id="houseBalcony" name="houseBalcony" type="text" value="<!--{$houseBalcony}-->" maxlength="1" onblur="CheckRoom('houseBalcony',true);"/> 阳台</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 租   金</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseSellPrice" name="houseSellPrice" type="text" value="<!--{$houseSellPrice}-->" onblur="checkRentPrice();" /> 元/月</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>租赁方式</td>
			    <td align="left" valign="middle" class="p25">
				<input type="radio" name="houseRentType" id="" onclick="ISJoinLease(1);" value="1" <!--{if $houseRentType eq 1 }--> checked="checked" <!--{/if}--> /> 整租
                <input type="radio" name="houseRentType" id="" onclick="ISJoinLease(2);" value="2" <!--{if $houseRentType eq 2 }--> checked="checked" <!--{/if}--> /> 合租				
				</td>
			  </tr>
			  <!--{if $houseRentType eq 1 }-->
			  <tr id="tr_houseRentType_join" style="display:none;">
			  <!--{else}-->
			  <tr id="tr_houseRentType_join">
			  <!--{/if}-->
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>合租方式</td>
			    <td align="left" valign="middle" class="p25">
	            <select name="houseRentRoomType" id="houseRentRoomType">
	              <option <!--{if $houseRentRoomType eq 1 }--> selected="selected" <!--{/if}--> value="1">主卧</option>
	              <option <!--{if $houseRentRoomType eq 2 }--> selected="selected" <!--{/if}--> value="2">次卧</option>
	              <option <!--{if $houseRentRoomType eq 3 }--> selected="selected" <!--{/if}--> value="3">床位</option>
	              <option <!--{if $houseRentRoomType eq 4 }--> selected="selected" <!--{/if}--> value="4">隔断间</option>
	            </select>&nbsp;&nbsp;
	            <select name="houseRentDetail" id="houseRentDetail">
	              <option <!--{if $houseRentDetail eq 1 }--> selected="selected" <!--{/if}--> value="1">性别不限</option>
	              <option <!--{if $houseRentDetail eq 2 }--> selected="selected" <!--{/if}--> value="2">限女生</option>
	              <option <!--{if $houseRentDetail eq 3 }--> selected="selected" <!--{/if}--> value="3">限男生</option>
	              <option <!--{if $houseRentDetail eq 4 }--> selected="selected" <!--{/if}--> value="4">限夫妻</option>
	            </select>
			
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="housePayment" name="housePayment" type="radio" value="1" <!--{if $housePayment eq 1 }--> checked="checked" <!--{/if}-->  onclick="changepaydetail()"/>押&nbsp;
				<select name="housePayDetailY" id="housePayDetailY" style=" vertical-align:middle">
				<option value="">请选择</option>
				<option <!--{if $housePayDetailY eq 0 }--> selected="selected" <!--{/if}--> value="0">零</option>
				<option <!--{if $housePayDetailY eq 1 }--> selected="selected" <!--{/if}--> value="1">一个月</option>
				<option <!--{if $housePayDetailY eq 2 }--> selected="selected" <!--{/if}--> value="2">两个月</option>
				<option <!--{if $housePayDetailY eq 3 }--> selected="selected" <!--{/if}--> value="3">三个月</option>
				<option <!--{if $housePayDetailY eq 6 }--> selected="selected" <!--{/if}--> value="6">六个月</option>
				</select>
                                                       付&nbsp;
				<select name="housePayDetailF" id="housePayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option <!--{if $housePayDetailF eq 1 }--> selected="selected" <!--{/if}--> value="1" >一个月</option>
                                    <option <!--{if $housePayDetailF eq 2 }--> selected="selected" <!--{/if}--> value="2">两个月</option>
                                    <option <!--{if $housePayDetailF eq 3 }--> selected="selected" <!--{/if}--> value="3">三个月</option>
                                    <option <!--{if $housePayDetailF eq 4 }--> selected="selected" <!--{/if}--> value="6">六个月</option>
                                    <option <!--{if $housePayDetailF eq 12 }--> selected="selected" <!--{/if}--> value="12">十二个月</option>
 				</select>
			    <input id="housePayment" name="housePayment" type="radio" value="2" <!--{if $housePayment eq 2 }--> checked="checked" <!--{/if}-->  onclick="changepaydetail();" />面议
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 出租面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseRentArea" name="houseRentArea" type="text"value="<!--{$houseRentArea}-->" onblur="checkRentPrice();" maxlength="8" onblur="CheckBuildingArea('houseRentArea',true);"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="houseFloor" name="houseFloor" type="text"value="<!--{$houseFloor}-->" onblur="checkRentPrice();" onblur="CheckFloor('houseFloor','houseAllFloor',true);" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="houseAllFloor" name="houseAllFloor" type="text"value="<!--{$houseAllFloor}-->" onblur="checkRentPrice();" onblur="CheckFloor('houseFloor','houseAllFloor',true);" /> <font class="z3">层</font> 地下室请填写负数</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
			    <td align="left" valign="middle" class="p25">
			   	   <label><input id="" name="houseForward" type="radio" value="1"  <!--{if $houseForward eq 1 }--> checked="checked" <!--{/if}-->/>东</label>     
			      	<label> <input id="" name="houseForward" type="radio" value="2" <!--{if $houseForward eq 2 }--> checked="checked" <!--{/if}--> /> 南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="3" <!--{if $houseForward eq 3 }--> checked="checked" <!--{/if}--> /> 西</label>    
			        <label><input id="" name="houseForward" type="radio" value="4" <!--{if $houseForward eq 4 }--> checked="checked" <!--{/if}--> /> 北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="5" <!--{if $houseForward eq 5 }--> checked="checked" <!--{/if}--> /> 东南 </label>
			        <label> <input id="" name="houseForward" type="radio" value="6" <!--{if $houseForward eq 6 }--> checked="checked" <!--{/if}--> /> 西南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="7" <!--{if $houseForward eq 7 }--> checked="checked" <!--{/if}--> /> 西北 </label>    
			        <label><input id="" name="houseForward" type="radio" value="8" <!--{if $houseForward eq 8 }--> checked="checked" <!--{/if}--> /> 东北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="9" <!--{if $houseForward eq 9 }--> checked="checked" <!--{/if}--> /> 南北 </label>
			         <label><input id="" name="houseForward" type="radio" value="10" <!--{if $houseForward eq 10 }--> checked="checked" <!--{/if}--> /> 东西 </label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
			    <td align="left" valign="middle" class="p25">
			  	    <label><input id="" name="houseFitment" type="radio" value="1" <!--{if $houseFitment eq 1 }--> checked="checked" <!--{/if}--> /> 豪华装修</label>     
			      	<label> <input id="" name="houseFitment" type="radio" value="2" <!--{if $houseFitment eq 2 }--> checked="checked" <!--{/if}--> /> 精装修  </label>    
			        <label><input id="" name="houseFitment" type="radio" value="3" <!--{if $houseFitment eq 3 }--> checked="checked" <!--{/if}--> /> 中等装修</label>    
			        <label><input id="" name="houseFitment" type="radio" value="4" <!--{if $houseFitment eq 4 }--> checked="checked" <!--{/if}--> /> 简装修</label>  
			        <label><input id="" name="houseFitment" type="radio" value="5" <!--{if $houseFitment eq 5 }--> checked="checked" <!--{/if}--> /> 毛坯</label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
			    <td align="left" valign="middle" class="p25" style="line-height:26px;">
			    	 <span><input name="houseBaseService[]" type="checkbox" value="1" <!--{$houseBaseService1}-->/ > 煤气/天然气</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="2" <!--{$houseBaseService2}-->/ > 暖气 </label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="3" <!--{$houseBaseService3}-->/ > 电梯 </label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="4" <!--{$houseBaseService4}-->/ > 车位/车库</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="5" <!--{$houseBaseService5}-->/ > 储藏室/地下室</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="6" <!--{$houseBaseService6}-->/ > 花园/小院</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="7" <!--{$houseBaseService7}-->/ > 露台</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="8" <!--{$houseBaseService8}-->/ > 阁楼</label></span>
			         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'houseBaseService[]')" class="red">[全选]</a></span>
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
			    	<input id="housePhoto" name="housePhoto" type="file"/><br>
    	<img src="http://localhost/88hom/uploads/community/<!--{$propPhoto}-->" class="l">
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="houseTitle" name="houseTitle" type="text"  value="<!--{$houseTitle}-->" maxlength="60" onblur="CheckTitle('houseTitle',true);" onkeyup="textCounter(document.getElementById('houseTitle'),document.getElementById('houseTitleAlert'),30);" /> 还可写<span id="houseTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle">
			    <textarea id="houseContent" name="houseContent" cols="86" rows="12" ><!--{$houseContent}--></textarea>			    
	            <script>
	                CKEDITOR.replace( 'houseContent' );
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
<
<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
