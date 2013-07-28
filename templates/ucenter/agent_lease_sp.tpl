<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>录入商铺出租房源</title>
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
            document.getElementById("spForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
        
    $("#btn_save").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
            document.getElementById("spForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
});
  
function check(){
	var estNameValue = $("#estId").val();
	if(trim(estNameValue) == ''){
		alert("请填写商铺名称");
		$("#estName").focus();
		return false;
	}
	
	if(!CheckInfoCode('shopsNumber',true)) return false;	
	if(!checkRentPrice()) return false;
	if(!checkPropFee('shopsPropFee',true)) return false;
	
	var val = $('input:radio[name="shopsTransfer"]:checked').val();
    if (val == 1 && !checkShopsTransferFee('shopsTransferFee')) {
        return false;
    }
    if(!checkShopsPayment()) return false;
	
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
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
            <form id="spForm" name="spForm" action="property_handler.php" method="post" enctype="multipart/form-data">
 		   <ul>
   			 	<li><a href="agent_lease_zz.php">录入住宅出租房源</a></li>
    		    <li><a href="agent_lease_bs.php">录入别墅出租房源</a></li>
     		    <li><a href="agent_lease_sp.php">录入商铺出租房源</a></li>
      		 	<li><a href="agent_lease_xzl.php">录入写字楼出租房源</a></li>
       		    <li><a href="agent_lease_cf.php">录入厂房出租房源</a></li>
   		  </ul>
          <div class="bs_tx">
            <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> <!--{$restLivePropsCount}--></font> 条</span></p>
            <input type="hidden" name="prop_type" value="sp">
            <input type="hidden" name="prop_tx_type" value="2">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 商铺名称</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input type="hidden" id="estId" name="estId"/>
    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);emptyEstId();" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
     <div class="tswords" style="display: none;" id="dis_est_alert">
                	<span class="alert01" style="margin-left:0;" id="P1">请选择列表中匹配的楼盘录入</span><a id="addestate" href="estate_input.php" title="" target="_blank">我要添加新楼盘</a>
                </div>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺地址</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="shopsAddress" name="shopsAddress" type="text"  value="" />  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsNumber" name="shopsNumber" type="text" maxlength="12" /></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsType" type="radio" value="1" /> 住宅底商</label>     
      	<label><input id="" name="shopsType" type="radio" value="2" checked="checked"/> 商业街商铺  </label>    
        <label><input id="" name="shopsType" type="radio" value="3" /> 写字楼配套底商</label>    
        <label><input id="" name="shopsType" type="radio" value="4" /> 购物中心/百货</label>  
        <label><input id="" name="shopsType" type="radio" value="5" /> 其他</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺状态</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsRentState" type="radio" value="1" checked="checked"/> 营业中</label>     
      	<label><input id="" name="shopsRentState" type="radio" value="2"/> 闲置中  </label>    
        <label><input id="" name="shopsRentState" type="radio" value="3" /> 新铺</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 租    金</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsRentPrice" name="shopsRentPrice" type="text" />
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" />元/平米·天</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" />元/平米·月</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" checked="checked" />元/月</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否含物业费</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsIncludFee" type="radio" value="1"/> 是</label>     
      	<label> <input id="" name="shopsIncludFee" type="radio" value="2" checked="checked"/> 否</label>   
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text"/> <font class="z3">元/平米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否转让</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsTransfer" type="radio" value="1" onclick="selectShopsTransfer(1)"/> 是</label>     
      	<label> <input id="" name="shopsTransfer" type="radio" value="2" checked="checked" onclick="selectShopsTransfer(2)"/> 否</label>   
    </td>
  </tr>
  <tr id="tr_shopsTransferFee" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">转 让 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsTransferFee" name="shopsTransferFee" type="text" value="面议" onfocus="resetShopsTransferFee('shopsTransferFee')" onblur="resetShopsTransferFee('shopsTransferFee')"/> <font class="z3">万元</font></td>
  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="shopsPayment" checked="checked" name="shopsPayment" type="radio" value="1" checked="checked" onclick="changeShopPaydetail()"/>押&nbsp;
				<select name="shopsPayDetailY" id="shopsPayDetailY" style=" vertical-align:middle">
				<option selected="selected" value="">请选择</option>
				<option value="0">零</option>
				<option value="1">一个月</option>
				<option value="2">两个月</option>
				<option value="3">三个月</option>
				<option value="6">六个月</option>
				</select>
                                                       付&nbsp;
				<select name="shopsPayDetailF" id="shopsPayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option value="1" >一个月</option>
                                    <option value="2">两个月</option>
                                    <option value="3">三个月</option>
                                    <option value="6">六个月</option>
                                    <option value="12">十二个月</option>
 				</select>
			    <input id="shopsPayment" name="shopsPayment" type="radio" value="2" onclick="changeShopPaydetail();" />面议
				</td>
			  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsBuildArea" name="shopsBuildArea" type="text" maxlength="8" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="shopsFloor" name="shopsFloor" type="text" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="shopsAllFloor" name="shopsAllFloor" type="text" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsDivision" type="radio" value="1" checked="checked"/> 可分割</label>     
      	<label> <input id="" name="shopsDivision" type="radio" value="2" /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsFitment" type="radio" value="1" /> 精装修</label>     
      	<label> <input id="" name="shopsFitment" type="radio" value="2" checked="checked"/> 简装修</label>
        <label> <input id="" name="shopsFitment" type="radio" value="3" /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="shopsBaseService[]" type="checkbox" value="1" / > 客梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="2" / > 货梯 </label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="3" / > 扶梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="4" / > 暖气</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="5" / > 空调</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="6" / > 停车位</label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="7" / > 水</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="8" / > 燃气</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="9" / > 网络</label></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">目标业态</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
   	 	  <span><label><input name="shopsAimOperastion[]" type="checkbox" value="1" / > 百货超市</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="2" / > 酒店宾馆 </label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="3" / > 家居建材 </label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="4" / > 服饰鞋包</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="5" / > 生活服务</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="6" / > 美容美发</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="7" / > 餐饮美食</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="8" / > 休闲娱乐</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="9" / > 其他</label></span>
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
			    	<input id="shopsTitle" name="shopsTitle" type="text" maxlength="60" onkeyup="textCounter(document.getElementById('shopsTitle'),document.getElementById('shopsTitleAlert'),30);" /> 还可写<span id="shopsTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" ><!--{$FCKeditor}-->
				<span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
			请勿从其它网站或其它房源描述中拷贝。</span>
			    	
			    </td>
			  </tr>
			   <tr>
			    <td height="107" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>交通状况</td>
			    <td align="left" valign="middle" class="p25 grzc_31">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsTraffic" name="shopsTraffic"></textarea>
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>周边配套</td>
			    <td align="left" valign="middle" class="p25 grzc_31 bs">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsSet" name="shopsSet"></textarea>
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
