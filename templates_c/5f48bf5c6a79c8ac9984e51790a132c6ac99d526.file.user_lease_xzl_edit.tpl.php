<?php /* Smarty version Smarty-3.1.8, created on 2013-07-13 00:06:57
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_lease_xzl_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1798751d7e53b5b5e53-98473801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f48bf5c6a79c8ac9984e51790a132c6ac99d526' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_lease_xzl_edit.tpl',
      1 => 1373637310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1798751d7e53b5b5e53-98473801',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d7e53b74ba41_53412880',
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
    'officeNumber' => 0,
    'officeType' => 0,
    'officeRentPrice' => 0,
    'officeRentPriceUnit' => 0,
    'officeProFee' => 0,
    'officeBuildArea' => 0,
    'officeFloor' => 0,
    'officeAllFloor' => 0,
    'officeDivision' => 0,
    'officeFitment' => 0,
    'officeLevel' => 0,
    'propertyDetailPicList' => 0,
    'key_' => 0,
    'item_' => 0,
    'officeTitle' => 0,
    'officeContent' => 0,
    'propId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d7e53b74ba41_53412880')) {function content_51d7e53b74ba41_53412880($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑写字楼出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
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
    initPicUp('<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
');
        
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
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="qg_r">
    <p>你的位置: <a href="#">编辑写字楼出租房源</a></p>
   	<div class="qg_bs">
            <form id="xzlForm" name="xzlForm" action="property_handler.php" method="post" enctype="multipart/form-data">
      <div class="bs_tx">
        <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="xzl">
            <input type="hidden" name="prop_tx_type" value="1">
        <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼名称</td>
    <td align="left" valign="middle" class="p25 grzc_31">
    <input type="hidden" name="estId" value="<?php echo $_smarty_tpl->tpl_vars['estId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estName']->value;?>
</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeNumber" name="officeNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeNumber']->value;?>
" maxlength="12" />  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 写字楼类型</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeType" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['officeType']->value==1){?> checked="checked" <?php }?>/> 纯写字楼</label>     
      	<label> <input id="" name="officeType" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['officeType']->value==2){?> checked="checked" <?php }?>/> 商住楼</label>
        <label> <input id="" name="officeType" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['officeType']->value==3){?> checked="checked" <?php }?>/> 商业综合体楼</label>
         <label> <input id="" name="officeType" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['officeType']->value==4){?> checked="checked" <?php }?>/> 酒店写字楼</label>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> <font class="red">*</font> 租    金</td>
    <td align="left" valign="middle" class="p25 grzc_32">
    <input id="officeRentPrice" name="officeRentPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeRentPrice']->value;?>
"/>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" <?php if ($_smarty_tpl->tpl_vars['officeRentPriceUnit']->value==1){?> checked="checked" <?php }?> />元/平米·天</label>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" <?php if ($_smarty_tpl->tpl_vars['officeRentPriceUnit']->value==2){?> checked="checked" <?php }?> />元/平米·月</label>
    <label><input id="" name="officeRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" <?php if ($_smarty_tpl->tpl_vars['officeRentPriceUnit']->value==3){?> checked="checked" <?php }?> />元/月</label>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeProFee" name="officeProFee" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeProFee']->value;?>
" /> 元/平米·月
    	</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeBuildArea" name="officeBuildArea" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeBuildArea']->value;?>
" maxlength="8" /> 平方米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="officeFloor" name="officeFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeFloor']->value;?>
" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="officeAllFloor" name="officeAllFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeAllFloor']->value;?>
" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeDivision" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['officeDivision']->value==1){?> checked="checked" <?php }?> /> 可分割</label>     
      	<label> <input id="" name="officeDivision" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['officeDivision']->value==2){?> checked="checked" <?php }?> /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="officeFitment" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['officeFitment']->value==1){?> checked="checked" <?php }?> /> 精装修</label>     
      	<label> <input id="" name="officeFitment" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['officeFitment']->value==2){?> checked="checked" <?php }?> /> 简装修</label>
        <label> <input id="" name="officeFitment" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['officeFitment']->value==3){?> checked="checked" <?php }?> /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 写字楼级别</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <label><input id="" name="officeLevel" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['officeLevel']->value==1){?> checked="checked" <?php }?> /> 甲级</label>     
      	<label> <input id="" name="officeLevel" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['officeLevel']->value==2){?> checked="checked" <?php }?> /> 乙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['officeLevel']->value==3){?> checked="checked" <?php }?> /> 丙级</label>
        <label> <input id="" name="officeLevel" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['officeLevel']->value==4){?> checked="checked" <?php }?> /> 其它</label>
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
    	<input id="officeTitle" name="officeTitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeTitle']->value;?>
" maxlength="60" onkeyup="textCounter(document.getElementById('officeTitle'),document.getElementById('officeTitleAlert'),30);" /> 还可写<span id="officeTitleAlert"><font class="red">30</font></span>个汉字</td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
    <td colspan="2" align="left" valign="middle">
    <textarea id="officeContent" name="officeContent" cols="86" rows="12" ><?php echo $_smarty_tpl->tpl_vars['officeContent']->value;?>
</textarea>			    
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