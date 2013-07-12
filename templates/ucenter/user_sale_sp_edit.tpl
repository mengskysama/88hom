<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>编辑商铺出售房源</title>
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
    initPicUp('<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
});
  
function check(){
	
	if(!CheckInfoCode('shopsNumber',true)) return false;	
	if(!CheckPrice('shopsSellPrice',true,'CS')) return false;
	if(!checkPropFee('shopsPropFee',true)) return false;
	if(!CheckBuildingArea('shopsBuildArea',true)) return false;
	if(!CheckFloor('shopsFloor','shopsAllFloor',true)) return false;
	if(!CheckTitle('shopsTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.shopsContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
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
    <p>你的位置: <a href="#">编辑商铺出售房源</a></p>
   	<div class="qg_bs">
            <form id="spForm" name="spForm" action="property_handler.php" method="post" enctype="multipart/form-data">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="sp">
            <input type="hidden" name="prop_tx_type" value="1">
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
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsSellPrice" name="shopsSellPrice" type="text" value="<!--{$shopsSellPrice}-->" /> <font class="z3">万元/套</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text" value="<!--{$shopsPropFee}-->" /> <font class="z3">元/平米</font></td>
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
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>图片展示</td>
				<td><input type="file" name="file_upload" id="file_upload"/></td>
			    <td >
					<div id="showImg" style="float: left;">		
						<!--{foreach from=$propertyDetailPicList item=item_ key=key_}-->
						<span style="float:left;margin:5px;line-height:25px;" id="pic_<!--{$key_}-->">
						<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item_.picUrl}-->">
			        	<img height="200px" src="<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->"/>
			       		</a><br/>
			       		描述：<input type="text" name="picName[]" value="<!--{$item_.picInfo}-->"/><br/>
			       		序号：<input type="text" name="picLayer[]" value="<!--{$item_.picLayer}-->"/>
			        	<input type="button" name="deletePic_<!--{$key_}-->" onclick="dropContainer('pic_<!--{$key_}-->');" value="删除"/>
			        	<input type="hidden" name="picPath[]" value="<!--{$item_.picUrl}-->"/>
			        	<input type="hidden" name="picPathThumb[]" value="<!--{$item_.picThumb}-->"/>
			        	<input type="hidden" name="picTypeId[]" value="<!--{$item_.pictypeId}-->"/>
			        	</span>
						<!--{/foreach}-->	
					</div>
			    </td>
			  </tr>
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
