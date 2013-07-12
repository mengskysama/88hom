<?php /* Smarty version Smarty-3.1.8, created on 2013-07-12 23:22:15
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_sale_bs_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1730751d586e16985f8-18288923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ee67aa2485706f80e3091ec3016712954fe239c' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_sale_bs_edit.tpl',
      1 => 1373637310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1730751d586e16985f8-18288923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d586e19e89d6_69689918',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
    'timestamp' => 0,
    'token' => 0,
    'estId' => 0,
    'estName' => 0,
    'villaNumber' => 0,
    'privateVillaNumber' => 0,
    'villaBuildForm' => 0,
    'villaSellPrice' => 0,
    'villaRoom' => 0,
    'villaHall' => 0,
    'villaToilet' => 0,
    'villaKitchen' => 0,
    'villaBalcony' => 0,
    'villaBuildArea' => 0,
    'villaUseArea' => 0,
    'villaBuildYear' => 0,
    'villaForward' => 0,
    'villaAllFloor' => 0,
    'villaCellar' => 0,
    'villaCellarArea' => 0,
    'villaCellarType' => 0,
    'villaGarden' => 0,
    'villaGardenArea' => 0,
    'villaGarage' => 0,
    'villaGarageCount' => 0,
    'villaFitment' => 0,
    'villaBaseService1' => 0,
    'villaBaseService2' => 0,
    'villaBaseService3' => 0,
    'villaBaseService4' => 0,
    'villaBaseService5' => 0,
    'villaBaseService6' => 0,
    'villaLookTime' => 0,
    'propertyDetailPicList' => 0,
    'key_' => 0,
    'item_' => 0,
    'villaTitle' => 0,
    'villaContent' => 0,
    'propId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d586e19e89d6_69689918')) {function content_51d586e19e89d6_69689918($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑别墅出售房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
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
    initPicUp('<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
');
       
});
  
function check(){
	
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
    }
}

function selectGarden(visible){
	if(visible==1){
		$("#tr_villaGardenArea").css("display","");
    }else{
        $("#tr_villaGardenArea").css("display","none");
    }
}

function selectGarge(visible){
	if(visible==1){
		$("#tr_villaGarageCount").css("display","");
	}else{
        $("#tr_villaGarageCount").css("display","none");
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
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="qg_r">
    <p>你的位置: <a href="#">编辑别墅出售房源</a></p>
   	<div class="qg_bs">
        <form id="bsForm" name="bsForm" action="property_handler.php" method="post" enctype="multipart/form-data">
      <div class="bs_tx">
        <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="bs">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" name="estId" value="<?php echo $_smarty_tpl->tpl_vars['estId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estName']->value;?>
</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaNumber" name="villaNumber" type="text" maxlength="12" value="<?php echo $_smarty_tpl->tpl_vars['villaNumber']->value;?>
"/> </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateVillaNumber" name="privateVillaNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['privateVillaNumber']->value;?>
"/></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑形式</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaBuildForm" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaBuildForm']->value==1){?> checked="checked" <?php }?> /> 独栋 
    <input id="" name="villaBuildForm" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['villaBuildForm']->value==2){?> checked="checked" <?php }?> /> 联排  
    <input id="" name="villaBuildForm" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['villaBuildForm']->value==3){?> checked="checked" <?php }?> /> 双拼 
    <input id="" name="villaBuildForm" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['villaBuildForm']->value==4){?> checked="checked" <?php }?> /> 叠加 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaSellPrice" name="villaSellPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['villaSellPrice']->value;?>
" /> <font class="z3">万元/套</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
    <td align="left" valign="middle" class="p25 grzc_36">
    <input id="villaRoom" name="villaRoom" type="text" maxlength="1" value="<?php echo $_smarty_tpl->tpl_vars['villaRoom']->value;?>
"/> <font class="z3">室</font> 
    <input id="villaHall" name="villaHall" type="text" maxlength="1" value="<?php echo $_smarty_tpl->tpl_vars['villaHall']->value;?>
"/> <font class="z3">厅</font> 
    <input id="villaToilet" name="villaToilet" type="text" maxlength="1" value="<?php echo $_smarty_tpl->tpl_vars['villaToilet']->value;?>
"/> <font class="z3">卫</font> 
    <input id="villaKitchen" name="villaKitchen" type="text" maxlength="1" value="<?php echo $_smarty_tpl->tpl_vars['villaKitchen']->value;?>
"/> <font class="z3">厨</font> 
    <input id="villaBalcony" name="villaBalcony" type="text" maxlength="1" value="<?php echo $_smarty_tpl->tpl_vars['villaBalcony']->value;?>
"/> <font class="z3">阳台</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildArea" name="villaBuildArea" type="text" maxlength="8" value="<?php echo $_smarty_tpl->tpl_vars['villaBuildArea']->value;?>
"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">使用面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaUseArea" name="villaUseArea" type="text" maxlength="8" value="<?php echo $_smarty_tpl->tpl_vars['villaUseArea']->value;?>
" />
      <font class="z3"> 平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑年代</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaBuildYear" name="villaBuildYear" type="text" maxlength="4" value="<?php echo $_smarty_tpl->tpl_vars['villaBuildYear']->value;?>
" />
      <font class="z3"> 年</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
    <td align="left" valign="middle" class="p25">
    <input id="" name="villaForward" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaForward']->value==1){?> checked="checked" <?php }?>/> 东 
    <input id="" name="villaForward" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['villaForward']->value==2){?> checked="checked" <?php }?>/> 西  
    <input id="" name="villaForward" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['villaForward']->value==3){?> checked="checked" <?php }?>/> 南 
    <input id="" name="villaForward" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['villaForward']->value==4){?> checked="checked" <?php }?>/> 北 </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 地上层数</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaAllFloor" name="villaAllFloor" type="text" maxlength="3" value="<?php echo $_smarty_tpl->tpl_vars['villaAllFloor']->value;?>
"/> 
    <font class="z3">层</font></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellar" name="villaCellar" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaCellar']->value==1){?> checked="checked" <?php }?> onclick="selectCellar(1)"/> 有 
    <input id="villaCellar" name="villaCellar" type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['villaCellar']->value==0){?> checked="checked" <?php }?> onclick="selectCellar(0)"/> 无</td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['villaCellar']->value==1){?> 
  <tr id="tr_villaCellarArea">
  <?php }else{ ?> 
  <tr id="tr_villaCellarArea" style="display: none;">
  <?php }?>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="villaCellarArea" name="villaCellarArea" type="text" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['villaCellarArea']->value;?>
"/> 
    <font class="z3"> 平方米</font></td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['villaCellar']->value==1){?> 
  <tr id="tr_villaCellarType">
  <?php }else{ ?> 
  <tr id="tr_villaCellarType" style="display: none;">
  <?php }?>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">地下室类型</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaCellarType" name="villaCellarType" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaCellarType']->value==1){?> checked="checked" <?php }?> /> 全明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['villaCellarType']->value==2){?> checked="checked" <?php }?> /> 半明 
    <input id="villaCellarType" name="villaCellarType" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['villaCellarType']->value==3){?> checked="checked" <?php }?> /> 暗</td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园</td>
    <td align="left" valign="middle" class="p25">
    <input id="villaGarden" name="villaGarden" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaGarden']->value==1){?> checked="checked" <?php }?> onclick="selectGarden(1)" /> 有 
    <input id="villaGarden" name="villaGarden" type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['villaGarden']->value==0){?> checked="checked" <?php }?> onclick="selectGarden(0)" /> 无</td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['villaGarden']->value==1){?> 
  <tr id="tr_villaGardenArea">
  <?php }else{ ?> 
  <tr id="tr_villaGardenArea" style="display: none;">
  <?php }?>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">花园面积</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGardenArea" name="villaGardenArea" type="text" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['villaGardenArea']->value;?>
"/> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库</td>
    <td align="left" valign="middle" class="p25"> 
    <input id="villaGarage" name="villaGarage" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaGarage']->value==1){?> checked="checked" <?php }?> onclick="selectGarge(1)"/> 有 
    <input id="villaGarage" name="villaGarage" type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['villaGarage']->value==0){?> checked="checked" <?php }?> onclick="selectGarge(0)"/> 无</td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['villaGarage']->value==1){?> 
  <tr id="tr_villaGarageCount">
  <?php }else{ ?> 
  <tr id="tr_villaGarageCount" style="display: none;">
  <?php }?>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车库数量</td>
    <td align="left" valign="middle" class="p25 grzc_35"><input id="villaGarageCount" name="villaGarageCount" type="text" maxlength="2" value="<?php echo $_smarty_tpl->tpl_vars['villaGarageCount']->value;?>
"/> <font class="z3">个</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
  	    <label><input id="" name="villaFitment" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaFitment']->value==1){?> checked="checked" <?php }?> /> 豪华装修</label>     
      	<label><input id="" name="villaFitment" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['villaFitment']->value==2){?> checked="checked" <?php }?> /> 精装修  </label>    
        <label><input id="" name="villaFitment" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['villaFitment']->value==3){?> checked="checked" <?php }?> /> 中等装修</label>    
        <label><input id="" name="villaFitment" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['villaFitment']->value==4){?> checked="checked" <?php }?> /> 简装修</label>  
        <label><input id="" name="villaFitment" type="radio" value="5" <?php if ($_smarty_tpl->tpl_vars['villaFitment']->value==5){?> checked="checked" <?php }?> /> 毛坯</label>
    </td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="villaBaseService[]" type="checkbox" value="1" <?php echo $_smarty_tpl->tpl_vars['villaBaseService1']->value;?>
 /> 煤气/天然气</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="2" <?php echo $_smarty_tpl->tpl_vars['villaBaseService2']->value;?>
 /> 暖气 </label></span>
         <span> <label><input name="villaBaseService[]" type="checkbox" value="3" <?php echo $_smarty_tpl->tpl_vars['villaBaseService3']->value;?>
 /> 电梯 </label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="4" <?php echo $_smarty_tpl->tpl_vars['villaBaseService4']->value;?>
 /> 车位/车库</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="5" <?php echo $_smarty_tpl->tpl_vars['villaBaseService5']->value;?>
 /> 储藏室/地下室</label></span>
          <span><label><input name="villaBaseService[]" type="checkbox" value="6" <?php echo $_smarty_tpl->tpl_vars['villaBaseService6']->value;?>
 /> 花园/小院</label></span>
         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'villaBaseService[]')" class="red">[全选]</a></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">看房时间</td>
    <td align="left" valign="middle" class="p25">
  		 <label><input id="" name="villaLookTime" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['villaLookTime']->value==1){?> checked="checked" <?php }?> /> 随时看房 </label>     
      	<label> <input id="" name="villaLookTime" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['villaLookTime']->value==2){?> checked="checked" <?php }?> /> 非工作时间  </label>    
        <label><input id="" name="villaLookTime" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['villaLookTime']->value==3){?> checked="checked" <?php }?> /> 电话预约</label>    
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
			<?php  $_smarty_tpl->tpl_vars['item_'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_']->_loop = false;
 $_smarty_tpl->tpl_vars['key_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['propertyDetailPicList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item_']->key => $_smarty_tpl->tpl_vars['item_']->value){
$_smarty_tpl->tpl_vars['item_']->_loop = true;
 $_smarty_tpl->tpl_vars['key_']->value = $_smarty_tpl->tpl_vars['item_']->key;
?>
			<span style="float:left;margin:5px;line-height:25px;" id="pic_<?php echo $_smarty_tpl->tpl_vars['key_']->value;?>
">
			<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item_']->value['picUrl'];?>
">
        	<img height="200px" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
"/>
       		</a><br/>
       		描述：<input type="text" name="picName[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picInfo'];?>
"/><br/>
       		序号：<input type="text" name="picLayer[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picLayer'];?>
"/>
        	<input type="button" name="deletePic_<?php echo $_smarty_tpl->tpl_vars['key_']->value;?>
" onclick="dropContainer('pic_<?php echo $_smarty_tpl->tpl_vars['key_']->value;?>
');" value="删除"/>
        	<input type="hidden" name="picPath[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picUrl'];?>
"/>
        	<input type="hidden" name="picPathThumb[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
"/>
        	<input type="hidden" name="picTypeId[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['pictypeId'];?>
"/>
        	</span>
			<?php } ?>	
		</div>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
		<input id="villaTitle" name="villaTitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['villaTitle']->value;?>
" maxlength="60" onkeyup="textCounter(document.getElementById('villaTitle'),document.getElementById('villaTitleAlert'),30);" /> 还可写<span id="villaTitleAlert"><font class="red">30</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
    <td colspan="2" align="left" valign="middle">
			    <textarea id="villaContent" name="villaContent" cols="86" rows="12" ><?php echo $_smarty_tpl->tpl_vars['villaContent']->value;?>
</textarea>			    
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
            <td width="120" align="center" valign="middle"><input name="btn_update" type="button" class="mddl1" id="btn_update" value="修改" /></td>
            <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
	      </tr>
	    </table>
	    <input type="hidden" id="actionType" name="actionType" value="update"/>
	    <input type="hidden" id="propId" name="propId" value="<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
"/>
	    </form>
    </div>
    </div>
    </div>

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>