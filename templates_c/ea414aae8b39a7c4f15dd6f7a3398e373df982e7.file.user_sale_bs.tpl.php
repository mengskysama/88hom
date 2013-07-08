<?php /* Smarty version Smarty-3.1.8, created on 2013-07-07 15:31:54
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_sale_bs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2621851d581589ebc48-79434450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea414aae8b39a7c4f15dd6f7a3398e373df982e7' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_sale_bs.tpl',
      1 => 1373088570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2621851d581589ebc48-79434450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d58158b007e0_62513480',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d58158b007e0_62513480')) {function content_51d58158b007e0_62513480($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人房源_写字楼</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
<script>
$(function() {    
	$("#estName").autocomplete({
      source: "ajax_get_prop_name.php",
      select: function(e, ui) {
      	  $("#estId").val(ui.item.id);    
      }
    });
        
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
	var estNameValue = $("#estName").val();
	if(trim(estNameValue) == ''){
		alert("请填写楼盘名称");
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
	if(!CheckCreateTime('villaBuildYear',true)) return false;
	if(!checkVillaAllFloor()) return false;

	if($("input[name='villaCellar']:checked").val() == 1 && !CheckCellarArea('villaCellarArea',true)) return false;	
	if($("input[name='villaGarden']:checked").val() == 1 && !CheckGardenArea('villaGardenArea',true)) return false;
	if($("input[name='villaGarage']:checked").val() == 1 && !checkVillaGarageCount()) return false;

	var villaPhotoValue = $("#villaPhoto").val();
	if(trim(villaPhotoValue) == ''){
		alert("请上传图片");
		return false;
	}
	
	if(!CheckTitle('villaTitle',true)) return false;
	var villaContentValue = CKEDITOR.instances.villaContent.getData(); 
	if(trim(villaContentValue) == ''){
		alert("请填写房源描述");
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
    	return false;
    }
    
    if(!IsInt("villaAllFloor")){
		alert("地面层数只能填写数字");
		return false;
	}
    
    if(parseInt(value) <= 0){
		alert("地面层数必须大于0");
		return false;
	}
    return true;
}
function checkVillaGarageCount(){

    var value=document.getElementById("villaGarageCount").value;
    if(trim(value) == ""){
    	alert("请填写车库数量");
    	return false;
    }
    
    if(!IsInt("villaGarageCount")){
		alert("车库数量只能填写数字");
		return false;
	}
    
    if(parseInt(value) <= 0){
		alert("车库数量必须大于0");
		return false;
	}
    return true;
}

</script>
</head>

<body>
<!--求购头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="qg_r">
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
 		   <ul>
   			 	<li><a href="user_sale_zz.php">录入住宅出售房源</a></li>
    		    <li><a href="user_sale_bs.php">录入别墅出售房源</a></li>
     		    <li><a href="user_sale_sp.php">录入商铺出售房源</a></li>
      		 	<li><a href="user_sale_xzl.php">录入写字楼出售房源</a></li>
   		  </ul>
      <div class="bs_tx">
        <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> 10</font> 条</span></p>
        <form id="bsForm" name="bsForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="bs">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源模板</td>
    <td align="left" valign="middle" class="p25">还可保存6套 <span class="redlink"><a href="#">使用说明</a></span></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" id="estId" name="estId"/>
    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaNumber" name="villaNumber" type="text" maxlength="12" onblur="CheckInfoCode('villaNumber',true)" /> </td>
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
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaSellPrice" name="villaSellPrice" type="text" onblur="CheckPrice('villaSellPrice',true,'CS');" /> <font class="z3">万元/套</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
    <td align="left" valign="middle" class="p25 grzc_36">
    <input id="villaRoom" name="villaRoom" type="text" maxlength="1" onblur="CheckRoom('villaRoom',true)"/> <font class="z3">室</font> 
    <input id="villaHall" name="villaHall" type="text" maxlength="1" onblur="CheckRoom('villaHall',true)"/> <font class="z3">厅</font> 
    <input id="villaToilet" name="villaToilet" type="text" maxlength="1" onblur="CheckRoom('villaToilet',true);"/> <font class="z3">卫</font> 
    <input id="villaKitchen" name="villaKitchen" type="text" maxlength="1" onblur="CheckRoom('villaKitchen',true);"/> <font class="z3">厨</font> 
    <input id="villaBalcony" name="villaBalcony" type="text" maxlength="1" onblur="CheckRoom('villaBalcony',true);"/> <font class="z3">阳台</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildArea" name="villaBuildArea" type="text" maxlength="8" onblur="CheckBuildingArea('villaBuildArea',true);"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">使用面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaUseArea" name="villaUseArea" type="text" maxlength="8" onblur="CheckLiveArea('villaUseArea','villaBuildArea',true)" />
      <font class="z3"> 平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑年代</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildYear" name="villaBuildYear" type="text" maxlength="4" onblur="CheckCreateTime('villaBuildYear',true)" />
      <font class="z3"> 年</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaForward" type="radio" value="1" /> 东 
    <input id="" name="villaForward" type="radio" value="2" /> 西  
    <input id="" name="villaForward" type="radio" value="3" /> 南 
    <input id="" name="villaForward" type="radio" value="4" /> 北 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 地上层数</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaAllFloor" name="villaAllFloor" type="text" maxlength="3" onblur="checkVillaAllFloor();"/> 
    <font class="z3">层</font></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室</td>
    <td align="left" valign="middle" class="p25"><input id="villaCellar" name="villaCellar" type="radio" value="1" onclick="selectCellar(1)"/> 有 <input id="" name="villaCellar" type="radio" value="0" checked="checked" onclick="selectCellar(0)"/> 无</td>
  </tr>
  <tr id="tr_villaCellarArea" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaCellarArea" name="villaCellarArea" type="text" maxlength="5" onblur="CheckCellarArea('villaCellarArea',true);" /> 
    <font class="z3"> 平方米</font></td>
  </tr>
  <tr id="tr_villaCellarType" style="display: none;">
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室类型</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellarType" name="villaCellarType" type="radio" value="1" /> 全明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="2" /> 半明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="3" /> 暗</td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园</td>
    <td align="left" valign="middle" class="p25"><input id="villaGarden" name="villaGarden" type="radio" value="1" onclick="selectGarden(1)" /> 有 <input id="" name="villaGarden" type="radio" value="0" checked="checked" onclick="selectGarden(0)" /> 无</td>
  </tr>
  <tr id="tr_villaGardenArea" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园面积</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGardenArea" name="villaGardenArea" type="text" maxlength="5" onblur="CheckGardenArea('villaGardenArea',true);"/> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库</td>
    <td align="left" valign="middle" class="p25"> <input id="villaGarage" name="villaGarage" type="radio" value="1" onclick="selectGarge(1)"/>有 <input id="" name="villaGarage" type="radio" value="0" checked="checked" onclick="selectGarge(0)"/> 无</td>
  </tr>
  <tr id="tr_villaGarageCount" style="display: none;">
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库数量</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGarageCount" name="villaGarageCount" type="text" maxlength="2" onblur="checkVillaGarageCount()"/> <font class="z3">个</font></td>
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
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>图片展示</td>
    <td colspan="2" width="280" align="left" valign="middle" class="p25 grzc_31">
    	<input id="villaPhoto" name="villaPhoto" type="file"  value="" />
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
		<input id="villaTitle" name="villaTitle" type="text"  value="" maxlength="60" onblur="CheckTitle('villaTitle',true);" onkeyup="textCounter(document.getElementById('villaTitle'),document.getElementById('villaTitleAlert'),30);" /> 还可写<span id="villaTitleAlert"><font class="red">30</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
    <td colspan="2" align="left" valign="middle">
			    <textarea id="villaContent" name="villaContent" cols="86" rows="12" ></textarea>			    
	            <script>
	                CKEDITOR.replace( 'villaContent' );
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
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>