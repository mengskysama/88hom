<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>录入写字楼出售房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
$(function() {    
    initPicUp('','<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
        
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
        	$("#action_to_go").val(1);
            document.getElementById("xzlForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
        
    $("#btn_save").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
            document.getElementById("xzlForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
});
  
function check(){
	var estNameValue = $("#estId").val();
	if(trim(estNameValue) == ''){
		alert("请填写写字楼名称");
		$("#estName").focus();
		return false;
	}
	
	if(!CheckInfoCode('officeNumber',true)) return false;	
	if(!CheckSwatchPriceOffice('officeSellPrice')) return false;
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
            <form id="xzlForm" name="xzlForm" action="property_handler.php" method="post" enctype="multipart/form-data">
 		   <ul>
   			 	<li><a href="user_sale_zz.php">录入住宅出售房源</a></li>
    		    <li><a href="user_sale_bs.php">录入别墅出售房源</a></li>
     		    <li><a href="user_sale_sp.php">录入商铺出售房源</a></li>
      		 	<li><a href="user_sale_xzl.php">录入写字楼出售房源</a></li>
   		  </ul>
      <div class="bs_tx">
        <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> 10</font> 条</span></p>
            <input type="hidden" name="prop_type" value="xzl">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼名称</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input type="hidden" id="estId" name="estId"/>
    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);emptyEstId();" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
     <div class="tswords" style="display: none;" id="dis_est_alert">
                	<span class="alert01" style="margin-left:0;" id="P1">请选择列表中匹配的楼盘录入</span><a id="addestate" href="estate_input.php" title="" target="_blank">我要添加新楼盘</a>
                </div>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeNumber" name="officeNumber" type="text" maxlength="12"/>  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 写字楼类型</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeType" type="radio" value="1" checked="checked" /> 纯写字楼</label>     
      	<label> <input id="" name="officeType" type="radio" value="2" /> 商住楼</label>
        <label> <input id="" name="officeType" type="radio" value="3" /> 商业综合体楼</label>
         <label> <input id="" name="officeType" type="radio" value="4" /> 酒店写字楼</label>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> <font class="red">*</font> 单    价</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeSellPrice" name="officeSellPrice" type="text" /> 元/平米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeProFee" name="officeProFee" type="text" /> 元/平米·月
    	</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeBuildArea" name="officeBuildArea" type="text" maxlength="8" /> 平方米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="officeFloor" name="officeFloor" type="text" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="officeAllFloor" name="officeAllFloor" type="text" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeDivision" type="radio" value="1" /> 可分割</label>     
      	<label> <input id="" name="officeDivision" type="radio" value="2" /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeFitment" type="radio" value="1" /> 精装修</label>     
      	<label> <input id="" name="officeFitment" type="radio" value="2" /> 简装修</label>
        <label> <input id="" name="officeFitment" type="radio" value="3" /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼级别</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <label><input id="" name="officeLevel" type="radio" value="1" /> 甲级</label>     
      	<label> <input id="" name="officeLevel" type="radio" value="2" /> 乙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="3" /> 丙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="4" /> 其它</label>
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
			    <td>
			    	<div id="showImg" style="float: left;">			
					</div>
			    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
    	<input id="officeTitle" name="officeTitle" type="text" maxlength="60" onkeyup="textCounter(document.getElementById('officeTitle'),document.getElementById('officeTitleAlert'),30);" /> 还可写<span id="officeTitleAlert"><font class="red">30</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
    <td colspan="2" align="left" valign="middle">
    <textarea id="officeContent" name="officeContent" cols="86" rows="12" ></textarea>			    
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
