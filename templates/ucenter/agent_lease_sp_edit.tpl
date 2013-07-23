<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>编辑商铺出租房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
$(function() {
        
    $("#btn_update").click(function() {
        $("#btn_update").attr("disabled", true);
        if (check()) {
            document.getElementById("spForm").submit();
        } else {
            $("#btn_update").removeAttr("disabled");
        }
    });
		
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        if (check()) {
            $("#action_to_go").val("1");
            document.getElementById("spForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });

	<!--{foreach from=$picTypeList item=item key=key}-->
    initPicUp3(<!--{$key}-->,'<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
	<!--{/foreach}-->
});
  
function check(){
	
	if(!CheckInfoCode('shopsNumber',true)) return false;		
	if(!checkRentPrice()) return false;
	if(!checkPropFee('shopsPropFee',true)) return false;
	
	var val = $('input:radio[name="shopsTransfer"]:checked').val();
    if (val == 1 && !checkShopsTransferFee('shopsTransferFee')) {
        return false;
    }
	
	if(!CheckBuildingArea('shopsBuildArea',true)) return false;
	if(!CheckFloor('shopsFloor','shopsAllFloor',true)) return false;

	if(!CheckTitle('shopsTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.shopsContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	if($("#shopsTraffic").val() == ""){
		alert("请填写交通状况");
		$("#shopsTraffic").focus();
		return false;
	}
	if($("#shopsSet").val() == ""){
		alert("请填写周边配套");
		$("#shopsSet").focus();
		return false;
	}
	if($("#topPicPath").val() == ""){
		alert("请选择标题图");
		return false;
	}
	
	return true;	
}
function checkPrice(num,isChk){
	var rNum = num;
	if(isChk){
		var chkedUnit = $('input:radio[name="shopsRentPriceUnit"]:checked').val();
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
	
	var value = $("#shopsRentPrice").val();
	if(trim(value) == ""){
    	alert("请填写租金");
    	document.getElementById("shopsRentPrice").focus()
    	return false;
    }
    
    if(check_float("shopsRentPrice")){
    	var p = rNum;
    	if(p=='1000000000') p='10亿';
    	if(parseFloat(value)<=0 || parseFloat(value)>rNum){
    		alert("租金要大于0元小于" + p + "元");
    		document.getElementById("shopsRentPrice").focus()
    		return false;
    	}
    	return true;
    }else{
    	alert("租金只能填写数字和小数点");
    	document.getElementById("shopsRentPrice").focus()
    	return false;
    }    
}
function checkRentPrice(){
	var value = $("#shopsRentPrice").val(); 
    if(trim(value) == ""){
    	alert("请填写租金");
		$("#shopsRentPrice").focus();
    	return false;
    }
    
    if(check_float("shopsRentPrice")){
    	if(parseFloat(value)<=0 || parseFloat(value)>1000000000){
    		alert("租金要大于0元小于10亿元");
			$("#shopsRentPrice").focus();
    		return false;
    	}
    	return true;
    }else{
    	alert("租金只能填写数字和小数点");
		$("#shopsRentPrice").focus();
    	return false;
    }    
}
</script>
</head>

<body>
<!--求购头部-->
<!--{include file="$ucenter_agent_header"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_agent_left_menu"}-->
  	<div class="qg_r">
    <p>你的位置: <a href="#">编辑商铺出租房源</a></p>
   	<div class="qg_bs">
            <form id="spForm" name="spForm" action="property_handler.php" method="post" enctype="multipart/form-data">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="sp">
            <input type="hidden" name="prop_tx_type" value="2">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 商铺名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" name="estId" value="<!--{$estId}-->"><!--{$estName}--></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺地址</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="shopsAddress" name="shopsAddress" type="text" value="<!--{$shopsAddress}-->" />  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsNumber" name="shopsNumber" type="text" value="<!--{$shopsNumber}-->" maxlength="12" /></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsType" type="radio" <!--{if $shopsType eq 1 }--> checked="checked" <!--{/if}--> value="1" /> 住宅底商</label>     
      	<label><input id="" name="shopsType" type="radio" <!--{if $shopsType eq 2 }--> checked="checked" <!--{/if}--> value="2" /> 商业街商铺  </label>    
        <label><input id="" name="shopsType" type="radio" <!--{if $shopsType eq 3 }--> checked="checked" <!--{/if}--> value="3" /> 写字楼配套底商</label>    
        <label><input id="" name="shopsType" type="radio" <!--{if $shopsType eq 4 }--> checked="checked" <!--{/if}--> value="4" /> 购物中心/百货</label>  
        <label><input id="" name="shopsType" type="radio" <!--{if $shopsType eq 5 }--> checked="checked" <!--{/if}--> value="5" /> 其他</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺状态</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsRentState" type="radio" value="1" <!--{if $shopsRentState eq 1 }--> checked="checked" <!--{/if}--> /> 营业中</label>     
      	<label><input id="" name="shopsRentState" type="radio" value="2" <!--{if $shopsRentState eq 2 }--> checked="checked" <!--{/if}--> /> 闲置中  </label>    
        <label><input id="" name="shopsRentState" type="radio" value="3" <!--{if $shopsRentState eq 3 }--> checked="checked" <!--{/if}--> /> 新铺</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  租    金</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsRentPrice" name="shopsRentPrice" type="text" value="<!--{$shopsRentPrice}-->" />
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" <!--{if $shopsRentPriceUnit eq 1 }--> checked="checked" <!--{/if}--> />元/平米·天</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" <!--{if $shopsRentPriceUnit eq 2 }--> checked="checked" <!--{/if}--> />元/平米·月</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" <!--{if $shopsRentPriceUnit eq 3 }--> checked="checked" <!--{/if}--> />元/月</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否含物业费</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsIncludFee" type="radio" value="1" <!--{if $shopsIncludFee eq 1 }--> checked="checked" <!--{/if}--> onclick="selectShopsTransfer(1)"/> 是</label>     
      	<label> <input id="" name="shopsIncludFee" type="radio" value="2" <!--{if $shopsIncludFee eq 2 }--> checked="checked" <!--{/if}--> onclick="selectShopsTransfer(2)"/> 否</label>   
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text" value="<!--{$shopsPropFee}-->"/> <font class="z3">元/平米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否转让</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsTransfer" type="radio" value="1" <!--{if $shopsTransfer eq 2 }--> checked="checked" <!--{/if}--> /> 是</label>     
      	<label><input id="" name="shopsTransfer" type="radio" value="2" <!--{if $shopsTransfer eq 2 }--> checked="checked" <!--{/if}--> /> 否</label>   
    </td>
  </tr>
  <!--{if $shopsIncludFee eq 1 }-->
  <tr id="tr_shopsTransferFee">
  <!--{else}-->
  <tr id="tr_shopsTransferFee" style="display: none;">
  <!--{/if}-->
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 转 让 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsTransferFee" name="shopsTransferFee" type="text" value="<!--{$shopsTransferFee}-->" onfocus="resetShopsTransferFee('shopsTransferFee')" onblur="resetShopsTransferFee('shopsTransferFee')"/> <font class="z3">万元</font></td>
  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="villaPayment" checked="checked" name="shopsPayment" type="radio" value="1" <!--{if $shopsPayment eq 1 }--> checked="checked" <!--{/if}--> onclick="changeShopPaydetail()"/>押&nbsp;
				<select name="shopsPayDetailY" id="shopsPayDetailY" style=" vertical-align:middle">				
				<option selected="selected" value="">请选择</option>
				<option value="0" <!--{if $shopsPayDetailY eq 0 }--> selected="selected" <!--{/if}-->>零</option>
				<option value="1" <!--{if $shopsPayDetailY eq 1 }--> selected="selected" <!--{/if}-->>一个月</option>
				<option value="2" <!--{if $shopsPayDetailY eq 2 }--> selected="selected" <!--{/if}-->>两个月</option>
				<option value="3" <!--{if $shopsPayDetailY eq 3 }--> selected="selected" <!--{/if}-->>三个月</option>
				<option value="6" <!--{if $shopsPayDetailY eq 6 }--> selected="selected" <!--{/if}-->>六个月</option>
				</select>
                                                       付&nbsp;
				<select name="shopsPayDetailF" id="shopsPayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option value="1" <!--{if $shopsPayDetailF eq 1 }--> selected="selected" <!--{/if}-->>一个月</option>
                                    <option value="2" <!--{if $shopsPayDetailF eq 2 }--> selected="selected" <!--{/if}-->>两个月</option>
                                    <option value="3" <!--{if $shopsPayDetailF eq 3 }--> selected="selected" <!--{/if}-->>三个月</option>
                                    <option value="6" <!--{if $shopsPayDetailF eq 6 }--> selected="selected" <!--{/if}-->>六个月</option>
                                    <option value="12 <!--{if $shopsPayDetailF eq 12 }--> selected="selected" <!--{/if}-->">十二个月</option>
 				</select>
			    <input id="villaPayment" name="shopsPayment" type="radio" value="2" <!--{if $shopsPayment eq 2 }--> checked="checked" <!--{/if}--> onclick="changeShopPaydetail();" />面议
				</td>
			  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsBuildArea" name="shopsBuildArea" type="text" value="<!--{$shopsBuildArea}-->" maxlength="8" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="shopsFloor" name="shopsFloor" type="text" value="<!--{$shopsFloor}-->" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="shopsAllFloor" name="shopsAllFloor" type="text" value="<!--{$shopsAllFloor}-->" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsDivision" type="radio" <!--{if $shopsDivision eq 1 }--> checked="checked" <!--{/if}--> value="1" /> 可分割</label>     
      	<label> <input id="" name="shopsDivision" type="radio" <!--{if $shopsDivision eq 2 }--> checked="checked" <!--{/if}--> value="2" /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsFitment" type="radio" <!--{if $shopsFitment eq 1 }--> checked="checked" <!--{/if}--> value="1" /> 精装修</label>     
      	<label> <input id="" name="shopsFitment" type="radio" <!--{if $shopsFitment eq 2 }--> checked="checked" <!--{/if}--> value="2" /> 简装修</label>
        <label> <input id="" name="shopsFitment" type="radio" <!--{if $shopsFitment eq 3 }--> checked="checked" <!--{/if}--> value="3" /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="shopsBaseService[]" type="checkbox" value="1" <!--{$shopsBaseService1}-->/> 客梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="2" <!--{$shopsBaseService2}-->/> 货梯 </label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="3" <!--{$shopsBaseService3}-->/> 扶梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="4" <!--{$shopsBaseService4}-->/> 暖气</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="5" <!--{$shopsBaseService5}-->/> 空调</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="6" <!--{$shopsBaseService6}-->/> 停车位</label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="7" <!--{$shopsBaseService7}-->/> 水</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="8" <!--{$shopsBaseService8}-->/> 燃气</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="9" <!--{$shopsBaseService9}-->/> 网络</label></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">目标业态</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
   	 	  <span><label><input name="shopsAimOperastion[]" type="checkbox" value="1" <!--{$shopsAimOperastion1}-->/> 百货超市</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="2" <!--{$shopsAimOperastion2}-->/> 酒店宾馆 </label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="3" <!--{$shopsAimOperastion3}-->/> 家居建材 </label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="4" <!--{$shopsAimOperastion4}-->/> 服饰鞋包</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="5" <!--{$shopsAimOperastion5}-->/> 生活服务</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="6" <!--{$shopsAimOperastion6}-->/> 美容美发</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="7" <!--{$shopsAimOperastion7}-->/> 餐饮美食</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="8" <!--{$shopsAimOperastion8}-->/> 休闲娱乐</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="9" <!--{$shopsAimOperastion9}-->/> 其他</label></span>
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
			    	<input id="shopsTitle" name="shopsTitle" type="text" value="<!--{$shopsTitle}-->" maxlength="60" onkeyup="textCounter(document.getElementById('shopsTitle'),document.getElementById('shopsTitleAlert'),30);" /> 还可写<span id="shopsTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" >
			    <textarea id="shopsContent" name="shopsContent" cols="86" rows="12" ><!--{$shopsContent}--></textarea>			    
				<script>
					CKEDITOR.replace( 'shopsContent' );
				</script>
				<span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
			请勿从其它网站或其它房源描述中拷贝。</span>
			    	
			    </td>
			  </tr>
			   <tr>
			    <td height="107" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>交通状况</td>
			    <td align="left" valign="middle" class="p25 grzc_31">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsTraffic" name="shopsTraffic"><!--{$shopsTraffic}--></textarea>
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>周边配套</td>
			    <td align="left" valign="middle" class="p25 grzc_31 bs">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsSet" name="shopsSet"><!--{$shopsSet}--></textarea>
			         <span style="border-bottom:none">如学校、商场、酒店、写字楼、医院、邮局、银行、餐饮等配套信息</span>
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
            <td width="120" align="center" valign="middle">
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
