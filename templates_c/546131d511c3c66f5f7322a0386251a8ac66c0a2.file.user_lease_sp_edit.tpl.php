<?php /* Smarty version Smarty-3.1.8, created on 2013-07-27 11:16:53
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_lease_sp_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2707051eca28aeb60f6-05718620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '546131d511c3c66f5f7322a0386251a8ac66c0a2' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_lease_sp_edit.tpl',
      1 => 1374894500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2707051eca28aeb60f6-05718620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51eca28b2c05d4_05097187',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'picTypeList' => 0,
    'key' => 0,
    'timestamp' => 0,
    'token' => 0,
    'estId' => 0,
    'estName' => 0,
    'shopsAddress' => 0,
    'shopsNumber' => 0,
    'shopsType' => 0,
    'shopsRentState' => 0,
    'shopsRentPrice' => 0,
    'shopsRentPriceUnit' => 0,
    'shopsIncludFee' => 0,
    'shopsPropFee' => 0,
    'shopsTransfer' => 0,
    'shopsTransferFee' => 0,
    'shopsPayment' => 0,
    'shopsPayDetailY' => 0,
    'shopsPayDetailF' => 0,
    'shopsBuildArea' => 0,
    'shopsFloor' => 0,
    'shopsAllFloor' => 0,
    'shopsDivision' => 0,
    'shopsFitment' => 0,
    'shopsBaseService1' => 0,
    'shopsBaseService2' => 0,
    'shopsBaseService3' => 0,
    'shopsBaseService4' => 0,
    'shopsBaseService5' => 0,
    'shopsBaseService6' => 0,
    'shopsBaseService7' => 0,
    'shopsBaseService8' => 0,
    'shopsBaseService9' => 0,
    'shopsAimOperastion1' => 0,
    'shopsAimOperastion2' => 0,
    'shopsAimOperastion3' => 0,
    'shopsAimOperastion4' => 0,
    'shopsAimOperastion5' => 0,
    'shopsAimOperastion6' => 0,
    'shopsAimOperastion7' => 0,
    'shopsAimOperastion8' => 0,
    'shopsAimOperastion9' => 0,
    'shopsTitle' => 0,
    'FCKeditor' => 0,
    'shopsTraffic' => 0,
    'shopsSet' => 0,
    'item' => 0,
    'propertyDetailPicList' => 0,
    'item_' => 0,
    'key_' => 0,
    'topPicThumb' => 0,
    'topPicPath' => 0,
    'propState' => 0,
    'propId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eca28b2c05d4_05097187')) {function content_51eca28b2c05d4_05097187($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑商铺出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

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
	textCounter(document.getElementById('shopsTitle'),document.getElementById('shopsTitleAlert'),30);
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    initPicUp3(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
');
	<?php } ?>
});
  
function check(){
	
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
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    <input type="hidden" name="estId" value="<?php echo $_smarty_tpl->tpl_vars['estId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['estName']->value;?>
</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺地址</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="shopsAddress" name="shopsAddress" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsAddress']->value;?>
" />  </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsNumber" name="shopsNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsNumber']->value;?>
" maxlength="12" /></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsType" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsType']->value==1){?> checked="checked" <?php }?> value="1" /> 住宅底商</label>     
      	<label><input id="" name="shopsType" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsType']->value==2){?> checked="checked" <?php }?> value="2" /> 商业街商铺  </label>    
        <label><input id="" name="shopsType" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsType']->value==3){?> checked="checked" <?php }?> value="3" /> 写字楼配套底商</label>    
        <label><input id="" name="shopsType" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsType']->value==4){?> checked="checked" <?php }?> value="4" /> 购物中心/百货</label>  
        <label><input id="" name="shopsType" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsType']->value==5){?> checked="checked" <?php }?> value="5" /> 其他</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺状态</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsRentState" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsRentState']->value==1){?> checked="checked" <?php }?> /> 营业中</label>     
      	<label><input id="" name="shopsRentState" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsRentState']->value==2){?> checked="checked" <?php }?> /> 闲置中  </label>    
        <label><input id="" name="shopsRentState" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['shopsRentState']->value==3){?> checked="checked" <?php }?> /> 新铺</label></td>
  </tr>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  租    金</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsRentPrice" name="shopsRentPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsRentPrice']->value;?>
" />
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==1){?> checked="checked" <?php }?> />元/平米·天</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==2){?> checked="checked" <?php }?> />元/平米·月</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==3){?> checked="checked" <?php }?> />元/月</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否含物业费</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsIncludFee" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsIncludFee']->value==1){?> checked="checked" <?php }?>/> 是</label>     
      	<label> <input id="" name="shopsIncludFee" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsIncludFee']->value==2){?> checked="checked" <?php }?>/> 否</label>   
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsPropFee']->value;?>
"/> <font class="z3">元/平米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否转让</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsTransfer" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsTransfer']->value==1){?> checked="checked" <?php }?> /> 是</label>     
      	<label> <input id="" name="shopsTransfer" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsTransfer']->value==2){?> checked="checked" <?php }?> /> 否</label>   
    </td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['shopsTransfer']->value==1){?>
  <tr id="tr_shopsTransferFee">
  <?php }else{ ?>
  <tr id="tr_shopsTransferFee" style="display: none;">
  <?php }?>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 转 让 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsTransferFee" name="shopsTransferFee" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsTransferFee']->value;?>
" onfocus="resetShopsTransferFee('shopsTransferFee')" onblur="resetShopsTransferFee('shopsTransferFee')"/> <font class="z3">万元</font></td>
  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="shopsPayment" checked="checked" name="shopsPayment" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsPayment']->value==1){?> checked="checked" <?php }?> onclick="changeShopPaydetail()"/>押&nbsp;
				<select name="shopsPayDetailY" id="shopsPayDetailY" style=" vertical-align:middle">
				<option selected="selected" value="">请选择</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailY']->value==0){?> selected="selected" <?php }?>>零</option>
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailY']->value==1){?> selected="selected" <?php }?>>一个月</option>
				<option value="2" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailY']->value==2){?> selected="selected" <?php }?>>两个月</option>
				<option value="3" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailY']->value==3){?> selected="selected" <?php }?>>三个月</option>
				<option value="6" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailY']->value==6){?> selected="selected" <?php }?>>六个月</option>
				</select>
                                                       付&nbsp;
				<select name="shopsPayDetailF" id="shopsPayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailF']->value==1){?> selected="selected" <?php }?>>一个月</option>
                                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailF']->value==2){?> selected="selected" <?php }?>>两个月</option>
                                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailF']->value==3){?> selected="selected" <?php }?>>三个月</option>
                                    <option value="6" <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailF']->value==6){?> selected="selected" <?php }?>>六个月</option>
                                    <option value="12 <?php if ($_smarty_tpl->tpl_vars['shopsPayDetailF']->value==12){?> selected="selected" <?php }?>">十二个月</option>
 				</select>
			    <input id="shopsPayment" name="shopsPayment" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsPayment']->value==2){?> checked="checked" <?php }?> onclick="changeShopPaydetail();" />面议
				</td>
			  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsBuildArea" name="shopsBuildArea" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsBuildArea']->value;?>
" maxlength="8" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="shopsFloor" name="shopsFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsFloor']->value;?>
" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="shopsAllFloor" name="shopsAllFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsAllFloor']->value;?>
" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsDivision" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsDivision']->value==1){?> checked="checked" <?php }?> value="1" /> 可分割</label>     
      	<label> <input id="" name="shopsDivision" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsDivision']->value==2){?> checked="checked" <?php }?> value="2" /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsFitment" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsFitment']->value==1){?> checked="checked" <?php }?> value="1" /> 精装修</label>     
      	<label> <input id="" name="shopsFitment" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsFitment']->value==2){?> checked="checked" <?php }?> value="2" /> 简装修</label>
        <label> <input id="" name="shopsFitment" type="radio" <?php if ($_smarty_tpl->tpl_vars['shopsFitment']->value==3){?> checked="checked" <?php }?> value="3" /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="shopsBaseService[]" type="checkbox" value="1" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService1']->value;?>
/> 客梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="2" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService2']->value;?>
/> 货梯 </label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="3" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService3']->value;?>
/> 扶梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="4" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService4']->value;?>
/> 暖气</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="5" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService5']->value;?>
/> 空调</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="6" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService6']->value;?>
/> 停车位</label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="7" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService7']->value;?>
/> 水</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="8" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService8']->value;?>
/> 燃气</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="9" <?php echo $_smarty_tpl->tpl_vars['shopsBaseService9']->value;?>
/> 网络</label></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">目标业态</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
   	 	  <span><label><input name="shopsAimOperastion[]" type="checkbox" value="1" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion1']->value;?>
/> 百货超市</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="2" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion2']->value;?>
/> 酒店宾馆 </label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="3" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion3']->value;?>
/> 家居建材 </label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="4" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion4']->value;?>
/> 服饰鞋包</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="5" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion5']->value;?>
/> 生活服务</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="6" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion6']->value;?>
/> 美容美发</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="7" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion7']->value;?>
/> 餐饮美食</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="8" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion8']->value;?>
/> 休闲娱乐</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="9" <?php echo $_smarty_tpl->tpl_vars['shopsAimOperastion9']->value;?>
/> 其他</label></span>
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
			    	<input id="shopsTitle" name="shopsTitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsTitle']->value;?>
" maxlength="60" onkeyup="textCounter(document.getElementById('shopsTitle'),document.getElementById('shopsTitleAlert'),30);" /> 还可写<span id="shopsTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" ><?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>

				<span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
			请勿从其它网站或其它房源描述中拷贝。</span>
			    	
			    </td>
			  </tr>
			   <tr>
			    <td height="107" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>交通状况</td>
			    <td align="left" valign="middle" class="p25 grzc_31">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsTraffic" name="shopsTraffic"><?php echo $_smarty_tpl->tpl_vars['shopsTraffic']->value;?>
</textarea>
			    </td>
			  </tr>
			   <tr>
			    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>周边配套</td>
			    <td align="left" valign="middle" class="p25 grzc_31 bs">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="shopsSet" name="shopsSet"><?php echo $_smarty_tpl->tpl_vars['shopsSet']->value;?>
</textarea>
			         <span style="border-bottom:none">如学校、商场、酒店、写字楼、医院、邮局、银行、餐饮等配套信息</span>
			    </td>
			  </tr>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr><td height="220" align="center" valign="middle" bgcolor="#f7f6f1"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
		         <td height="215" align="left" valign="top" class="p25">
		         	<div class="sc_btn">
		                <input type="file" name="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
		            </div>
		            <div class="tpsc" id="showImg_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
						<?php  $_smarty_tpl->tpl_vars['item_'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_']->_loop = false;
 $_smarty_tpl->tpl_vars['key_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['propertyDetailPicList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item_']->key => $_smarty_tpl->tpl_vars['item_']->value){
$_smarty_tpl->tpl_vars['item_']->_loop = true;
 $_smarty_tpl->tpl_vars['key_']->value = $_smarty_tpl->tpl_vars['item_']->key;
?>
			        	<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['item_']->value['pictypeId']){?>
			        	<dl id="pic_<?php echo $_smarty_tpl->tpl_vars['key_']->value;?>
">
        	        		<dt><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
"></dt>
        	        		<dd><span class="redlink"><a href="javascript:void(0)" onclick="changeTopicImg('<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
','<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
','<?php echo $_smarty_tpl->tpl_vars['item_']->value['picUrl'];?>
')">设为标题图</a></span></dd>
        	        		<dd>描述：<input type="text" class="input01" name="picName[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picInfo'];?>
"/><a href="javascript:void(0)" onclick="dropContainer('pic_<?php echo $_smarty_tpl->tpl_vars['key_']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
templates/images/ucenter/cha.jpg"></a></dd>
        	    		<input type="hidden" name="picPath[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picUrl'];?>
"/>
        	    		<input type="hidden" name="picPathThumb[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['picThumb'];?>
"/>
        	    		<input type="hidden" name="picTypeId[]" value="<?php echo $_smarty_tpl->tpl_vars['item_']->value['pictypeId'];?>
"/>
        	    		<input type="hidden" name="picLayer[]" value="0"/>
        	    		</dl>
						<?php }?>
						<?php } ?>	
		            </div>
				 </td>
				</tr> 
				<?php } ?>
		      
		       <tr>
			    <td height="124" align="center" valign="middle" bgcolor="#f7f6f1">标题图</td>
			    <td align="left" valign="top" class="p25"><div class="btt" id="topic_image"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['topPicThumb']->value;?>
"></div></td>
			    
        	    <input type="hidden" id="topPicPath" name="topPicPath" value="<?php echo $_smarty_tpl->tpl_vars['topPicPath']->value;?>
"/>
        	    <input type="hidden" id="topPicPathThumb" name="topPicPathThumb" value="<?php echo $_smarty_tpl->tpl_vars['topPicThumb']->value;?>
"/>
			  </tr>
			</table>
      </div>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
            <td width="120" align="center" valign="middle">
            <td width="120" align="center" valign="middle"><input name="btn_update" type="button" class="mddl1" id="btn_update" value="修改" /></td>
            <td width="320" height="80" align="center" valign="middle"><?php if ($_smarty_tpl->tpl_vars['propState']->value==0){?><input name="btn_live" type="button" class="mddl1" id="btn_live" value="发布" /><?php }?>;</td>
	      </tr>
	    </table>
	    <input type="hidden" id="actionType" name="actionType" value="update"/>
	    <input type="hidden" id="propId" name="propId" value="<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
"/>
	    <input type="hidden" id="action_to_go" name="action_to_go" value="<?php echo $_smarty_tpl->tpl_vars['propState']->value;?>
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