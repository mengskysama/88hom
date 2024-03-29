<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>编辑住宅出售房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
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
		
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        if (check()) {
            $("#action_to_go").val("1");
            document.getElementById("zzForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
    pictureIndex = <!--{$picCount}-->;
	<!--{foreach from=$picTypeList item=item key=key}-->
    initPicUp3(<!--{$key}-->,'<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
	<!--{/foreach}-->
        
});
  
function check(){
	
	if(!CheckInfoCode('houseNumber',true)) return false;
	if(!CheckPrice('houseSellPrice',true,'CS')) return false;
	if(!CheckRoom('houseRoom',true)) return false;
	if(!CheckRoom('houseHall',true)) return false;
	if(!CheckRoom('houseToilet',true)) return false;
	if(!CheckRoom('houseKitchen',true)) return false;
	if(!CheckRoom('houseBalcony',true)) return false;
	if(!CheckBuildingArea('houseBuildArea',true)) return false;
	if(!CheckLiveArea('houseUseArea','houseBuildArea',true)) return false;
	if(!CheckCreateTime('houseBuildYear',true)) return false;
	if(!CheckFloor('houseFloor','houseAllFloor',true)) return false;
	
	if(!CheckTitle('houseTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.houseContent.getData(); 
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
<!--{include file="$ucenter_agent_header"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_agent_left_menu"}-->
    <div class="qg_r">
    <p>你的位置: <a href="#">编辑房源</a></p>
   	<div class="qg_bs">
            <form id="zzForm" name="zzForm" action="property_handler.php" method="post" enctype="multipart/form-data">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="zz">
            <input type="hidden" name="prop_tx_type" value="1">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
			    <td align="left" valign="middle" class="p25 grzc_31">
            	<input type="hidden" name="estId" value="<!--{$estId}-->"><!--{$estName}--></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseNumber" name="houseNumber" type="text" value="<!--{$houseNumber}-->" maxlength="12" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateHouseNumber" name="privateHouseNumber" type="text" value="<!--{$privateHouseNumber}-->" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 产权信息</td>
			    <td align="left" valign="middle" class="p25">
			    <select id="housePayInfo" name="housePayInfo">
			    	<option <!--{if $housePayInfo eq 1 }--> selected="selected" <!--{/if}--> value="1">商品房</option>
			    	<option <!--{if $housePayInfo eq 2 }--> selected="selected" <!--{/if}-->value="2">微利房</option>
			    	<option <!--{if $housePayInfo eq 3 }--> selected="selected" <!--{/if}-->value="3">军产房</option>
			    	<option <!--{if $housePayInfo eq 4 }--> selected="selected" <!--{/if}-->value="4">集资房</option>
			    	<option <!--{if $housePayInfo eq 5 }--> selected="selected" <!--{/if}-->value="5">农民房</option>
			    	<option <!--{if $housePayInfo eq 6 }--> selected="selected" <!--{/if}-->value="6">福利房</option>			    	
			    </select>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
			    <td align="left" valign="middle" class="p25">
			    <select id="houseType" name="houseType">			    
			    	<option <!--{if $houseType eq 1 }--> selected="selected" <!--{/if}--> value="1">普通住宅</option>
			    	<option <!--{if $houseType eq 2 }--> selected="selected" <!--{/if}--> value="2">高档住宅</option>
			    	<option <!--{if $houseType eq 3 }--> selected="selected" <!--{/if}--> value="3">酒店式公寓 </option>
			    	<option <!--{if $houseType eq 4 }--> selected="selected" <!--{/if}--> value="4">集资房</option>			    	
			    </select>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 售    价</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseSellPrice" name="houseSellPrice" type="text" value="<!--{$houseSellPrice}-->"/> 万元/套</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 户    型</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="houseRoom" name="houseRoom" type="text" maxlength="1" value="<!--{$houseRoom}-->"/> 室
			    <input id="houseHall" name="houseHall" type="text" maxlength="1" value="<!--{$houseHall}-->"> 厅 
			    <input id="houseToilet" name="houseToilet" type="text" maxlength="1" value="<!--{$houseToilet}-->"/> 卫 
			    <input id="houseKitchen" name="houseKitchen" type="text" maxlength="1" value="<!--{$houseKitchen}-->"/> 厨 
			    <input id="houseBalcony" name="houseBalcony" type="text" maxlength="1" value="<!--{$houseBalcony}-->"/> 阳台</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑形式</td>
			    <td align="left" valign="middle" class="p25 grzc_33">
			    <select id="houseBuildStructure" name="houseBuildStructure">			    
			    	<option value="0">选择结构</option>					
					<!--{foreach from=$structureList item=item key=key}-->	 
					<!--{if $houseBuildStructure eq $key}-->   
			    	<option value="<!--{$key}-->" selected="selected"><!--{$item}--></option>
			    	<!--{else}-->
			    	<option value="<!--{$key}-->"><!--{$item}--></option>
			    	<!--{/if}-->
					<!--{/foreach}-->		    	
			    </select>
			    
			    <select id="houseBuildForm" name="houseBuildForm">				    
			    	<option value="0">选择类别</option>					
					<!--{foreach from=$formList item=item key=key}-->	   
					<!--{if $houseBuildForm eq $key}-->   
			    	<option value="<!--{$key}-->" selected="selected"><!--{$item}--></option>
			    	<!--{else}-->
			    	<option value="<!--{$key}-->"><!--{$item}--></option>
			    	<!--{/if}-->
					<!--{/foreach}-->		    	
			    </select>
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseBuildArea" name="houseBuildArea" type="text" maxlength="8" value="<!--{$houseBuildArea}-->"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">使用面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseUseArea" name="houseUseArea" type="text" maxlength="8" value="<!--{$houseUseArea}-->" /> <font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑年代</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseBuildYear" name="houseBuildYear" type="text" maxlength="4" value="<!--{$houseBuildYear}-->" /> <font class="z3">年</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="houseFloor" name="houseFloor" type="text" value="<!--{$houseFloor}-->" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="houseAllFloor" name="houseAllFloor" type="text" value="<!--{$houseAllFloor}-->" /> <font class="z3">层</font> 地下室请填写负数</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
			    <td align="left" valign="middle" class="p25">
			   	   <label><input id="" name="houseForward" type="radio" value="1" <!--{if $houseForward eq 1 }--> checked="checked" <!--{/if}--> />东</label>     
			      	<label><input id="" name="houseForward" type="radio" value="2" <!--{if $houseForward eq 2 }--> checked="checked" <!--{/if}--> /> 南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="3" <!--{if $houseForward eq 3 }--> checked="checked" <!--{/if}--> /> 西</label>    
			        <label><input id="" name="houseForward" type="radio" value="4" <!--{if $houseForward eq 4 }--> checked="checked" <!--{/if}--> /> 北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="5" <!--{if $houseForward eq 5 }--> checked="checked" <!--{/if}--> /> 东南 </label>
			        <label><input id="" name="houseForward" type="radio" value="6" <!--{if $houseForward eq 6 }--> checked="checked" <!--{/if}--> /> 西南  </label>    
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
			      	<label><input id="" name="houseFitment" type="radio" value="2" <!--{if $houseFitment eq 2 }--> checked="checked" <!--{/if}--> /> 精装修  </label>    
			        <label><input id="" name="houseFitment" type="radio" value="3" <!--{if $houseFitment eq 3 }--> checked="checked" <!--{/if}--> /> 中等装修</label>    
			        <label><input id="" name="houseFitment" type="radio" value="4" <!--{if $houseFitment eq 4 }--> checked="checked" <!--{/if}--> /> 简装修</label>  
			        <label><input id="" name="houseFitment" type="radio" value="5" <!--{if $houseFitment eq 5 }--> checked="checked" <!--{/if}--> /> 毛坯</label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
			    <td align="left" valign="middle" class="p25" style="line-height:26px;">
			    	 <span><input name="houseBaseService[]" type="checkbox" value="1" <!--{$houseBaseService1}--> /> 煤气/天然气</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="2" <!--{$houseBaseService2}--> /> 暖气 </label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="3" <!--{$houseBaseService3}--> /> 电梯 </label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="4" <!--{$houseBaseService4}--> /> 车位/车库</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="5" <!--{$houseBaseService5}--> /> 储藏室/地下室</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="6" <!--{$houseBaseService6}--> /> 花园/小院</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="7" <!--{$houseBaseService7}--> /> 露台</label></span>
			         <span><input name="houseBaseService[]" type="checkbox" value="8" <!--{$houseBaseService8}--> /> 阁楼</label></span>
			         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'houseBaseService[]')" class="red">[全选]</a></span>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">看房时间</td>
			    <td align="left" valign="middle" class="p25">
			  		<label><input id="" name="houseLookTime" type="radio" value="1" <!--{if $houseLookTime eq 1 }--> checked="checked" <!--{/if}--> /> 随时看房 </label>     
			      	<label><input id="" name="houseLookTime" type="radio" value="2" <!--{if $houseLookTime eq 2 }--> checked="checked" <!--{/if}--> /> 非工作时间  </label>    
			        <label><input id="" name="houseLookTime" type="radio" value="3" <!--{if $houseLookTime eq 3 }--> checked="checked" <!--{/if}--> /> 电话预约</label>    
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
			    	<input id="houseTitle" name="houseTitle" type="text" value="<!--{$houseTitle}-->" maxlength="60" onblur="CheckTitle('houseTitle',true);" onkeyup="textCounter(document.getElementById('houseTitle'),document.getElementById('houseTitleAlert'),30);" /> 还可写<span id="houseTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle"><!--{$FCKeditor}-->
            <span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
			请勿从其它网站或其它房源描述中拷贝。</span><br/><br/>
			         <span>
			         <b style="text-indent:0px;">注意事项：</b> <br />
			1.上传宽度大于600像素，比例为5:4的图片可获得更好的展示效果。<br />
			2.请勿上传有水印、盖章等任何侵犯他人版权或含有广告信息的图片。</span>
			    	
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
        	        		<dt><img width="120" height="97" src="<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->"></dt>
        	        		<dd><span class="redlink"><a href="javascript:void(0)" onclick="changeTopicImg('<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->','<!--{$item_.picThumb}-->','<!--{$item_.picUrl}-->')">设为标题图</a></span></dd>
        	        		<dd>描述：<input type="text" class="input01" name="picName[]" value="<!--{$item_.picInfo}-->"/><a href="javascript:void(0)" onclick="dropContainer('pic_<!--{$key_}-->')"><img src="<!--{$cfg.web_url}-->templates/images/ucenter/cha.jpg"></a></dd>
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
			    <td align="left" valign="top" class="p25"><div id="topic_image"><img width="120" height="97" src="<!--{$cfg.web_url}-->uploads/<!--{$topPicThumb}-->"></div></td>
			    
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
<
<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
