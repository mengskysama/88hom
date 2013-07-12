<?php /* Smarty version Smarty-3.1.8, created on 2013-07-12 23:40:15
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_lease_zz_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1503551d910caf2cd07-06771959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c947729ef4986b91d7d34004e34568b78f006916' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_lease_zz_edit.tpl',
      1 => 1373637310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1503551d910caf2cd07-06771959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d910cb398583_64816636',
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
    'houseNumber' => 0,
    'privateHouseNumber' => 0,
    'houseRoom' => 0,
    'houseHall' => 0,
    'houseToilet' => 0,
    'houseKitchen' => 0,
    'houseBalcony' => 0,
    'houseSellPrice' => 0,
    'houseRentType' => 0,
    'houseRentRoomType' => 0,
    'houseRentDetail' => 0,
    'housePayment' => 0,
    'housePayDetailY' => 0,
    'housePayDetailF' => 0,
    'houseRentArea' => 0,
    'houseFloor' => 0,
    'houseAllFloor' => 0,
    'houseForward' => 0,
    'houseFitment' => 0,
    'houseBaseService1' => 0,
    'houseBaseService2' => 0,
    'houseBaseService3' => 0,
    'houseBaseService4' => 0,
    'houseBaseService5' => 0,
    'houseBaseService6' => 0,
    'houseBaseService7' => 0,
    'houseBaseService8' => 0,
    'propertyDetailPicList' => 0,
    'key_' => 0,
    'item_' => 0,
    'houseTitle' => 0,
    'houseContent' => 0,
    'propId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d910cb398583_64816636')) {function content_51d910cb398583_64816636($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑住宅出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
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
    initPicUp('<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
');
        
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
		$("#houseSellPrice").focus();
        return false;
    }

    if(check_float("houseSellPrice")){
        if(parseFloat(value)<=100||parseFloat(value)>=300000){
            alert("租金要大于100元小于30万元");
			$("#houseSellPrice").focus();
        	return false;
        }
		return true;
    }else{
		alert("只能填写数字");
		$("#houseSellPrice").focus();
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
    <p>你的位置: <a href="#">编辑住宅出租房源</a></p>
   	<div class="qg_bs">
            <form id="zzForm" name="zzForm" action="property_handler.php" method="post" enctype="multipart/form-data">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <input type="hidden" name="prop_type" value="zz">
            <input type="hidden" name="prop_tx_type" value="2">
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
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseNumber" name="houseNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseNumber']->value;?>
" maxlength="12" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateHouseNumber" name="privateHouseNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['privateHouseNumber']->value;?>
" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="houseRoom" name="houseRoom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseRoom']->value;?>
" maxlength="1" onblur="CheckRoom('houseRoom',true)"/> 室 
			    <input id="houseHall" name="houseHall" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseHall']->value;?>
" maxlength="1" onblur="CheckRoom('houseHall',true)"/> 厅 
			    <input id="houseToilet" name="houseToilet" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseToilet']->value;?>
" maxlength="1" onblur="CheckRoom('houseToilet',true);"/> 卫 
			    <input id="houseKitchen" name="houseKitchen" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseKitchen']->value;?>
" maxlength="1" onblur="CheckRoom('houseKitchen',true);"/> 厨 
			    <input id="houseBalcony" name="houseBalcony" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseBalcony']->value;?>
" maxlength="1" onblur="CheckRoom('houseBalcony',true);"/> 阳台</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 租   金</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseSellPrice" name="houseSellPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['houseSellPrice']->value;?>
"/> 元/月</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>租赁方式</td>
			    <td align="left" valign="middle" class="p25">
				<input type="radio" name="houseRentType" id="" onclick="ISJoinLease(1);" value="1" <?php if ($_smarty_tpl->tpl_vars['houseRentType']->value==1){?> checked="checked" <?php }?> /> 整租
                <input type="radio" name="houseRentType" id="" onclick="ISJoinLease(2);" value="2" <?php if ($_smarty_tpl->tpl_vars['houseRentType']->value==2){?> checked="checked" <?php }?> /> 合租				
				</td>
			  </tr>
			  <?php if ($_smarty_tpl->tpl_vars['houseRentType']->value==1){?>
			  <tr id="tr_houseRentType_join" style="display:none;">
			  <?php }else{ ?>
			  <tr id="tr_houseRentType_join">
			  <?php }?>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>合租方式</td>
			    <td align="left" valign="middle" class="p25">
	            <select name="houseRentRoomType" id="houseRentRoomType">
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentRoomType']->value==1){?> selected="selected" <?php }?> value="1">主卧</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentRoomType']->value==2){?> selected="selected" <?php }?> value="2">次卧</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentRoomType']->value==3){?> selected="selected" <?php }?> value="3">床位</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentRoomType']->value==4){?> selected="selected" <?php }?> value="4">隔断间</option>
	            </select>&nbsp;&nbsp;
	            <select name="houseRentDetail" id="houseRentDetail">
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentDetail']->value==1){?> selected="selected" <?php }?> value="1">性别不限</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentDetail']->value==2){?> selected="selected" <?php }?> value="2">限女生</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentDetail']->value==3){?> selected="selected" <?php }?> value="3">限男生</option>
	              <option <?php if ($_smarty_tpl->tpl_vars['houseRentDetail']->value==4){?> selected="selected" <?php }?> value="4">限夫妻</option>
	            </select>
			
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="housePayment" name="housePayment" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['housePayment']->value==1){?> checked="checked" <?php }?> onclick="changepaydetail()"/>押&nbsp;
				<select name="housePayDetailY" id="housePayDetailY" style=" vertical-align:middle">
				<option value="">请选择</option>
				<option <?php if ($_smarty_tpl->tpl_vars['housePayDetailY']->value==0){?> selected="selected" <?php }?> value="0">零</option>
				<option <?php if ($_smarty_tpl->tpl_vars['housePayDetailY']->value==1){?> selected="selected" <?php }?> value="1">一个月</option>
				<option <?php if ($_smarty_tpl->tpl_vars['housePayDetailY']->value==2){?> selected="selected" <?php }?> value="2">两个月</option>
				<option <?php if ($_smarty_tpl->tpl_vars['housePayDetailY']->value==3){?> selected="selected" <?php }?> value="3">三个月</option>
				<option <?php if ($_smarty_tpl->tpl_vars['housePayDetailY']->value==6){?> selected="selected" <?php }?> value="6">六个月</option>
				</select>
                                                       付&nbsp;
				<select name="housePayDetailF" id="housePayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['housePayDetailF']->value==1){?> selected="selected" <?php }?> value="1" >一个月</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['housePayDetailF']->value==2){?> selected="selected" <?php }?> value="2">两个月</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['housePayDetailF']->value==3){?> selected="selected" <?php }?> value="3">三个月</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['housePayDetailF']->value==4){?> selected="selected" <?php }?> value="6">六个月</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['housePayDetailF']->value==12){?> selected="selected" <?php }?> value="12">十二个月</option>
 				</select>
			    <input id="housePayment" name="housePayment" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['housePayment']->value==2){?> checked="checked" <?php }?>  onclick="changepaydetail();" />面议
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 出租面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseRentArea" name="houseRentArea" type="text"value="<?php echo $_smarty_tpl->tpl_vars['houseRentArea']->value;?>
"" maxlength="8" onblur="CheckBuildingArea('houseRentArea',true);"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="houseFloor" name="houseFloor" type="text"value="<?php echo $_smarty_tpl->tpl_vars['houseFloor']->value;?>
"/> <font class="z3">层</font>   <font class="z3">共</font> <input id="houseAllFloor" name="houseAllFloor" type="text"value="<?php echo $_smarty_tpl->tpl_vars['houseAllFloor']->value;?>
"/> <font class="z3">层</font> 地下室请填写负数</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
			    <td align="left" valign="middle" class="p25">
			   	   <label><input id="" name="houseForward" type="radio" value="1"  <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==1){?> checked="checked" <?php }?>/>东</label>     
			      	<label> <input id="" name="houseForward" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==2){?> checked="checked" <?php }?> /> 南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==3){?> checked="checked" <?php }?> /> 西</label>    
			        <label><input id="" name="houseForward" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==4){?> checked="checked" <?php }?> /> 北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="5" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==5){?> checked="checked" <?php }?> /> 东南 </label>
			        <label> <input id="" name="houseForward" type="radio" value="6" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==6){?> checked="checked" <?php }?> /> 西南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="7" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==7){?> checked="checked" <?php }?> /> 西北 </label>    
			        <label><input id="" name="houseForward" type="radio" value="8" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==8){?> checked="checked" <?php }?> /> 东北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="9" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==9){?> checked="checked" <?php }?> /> 南北 </label>
			         <label><input id="" name="houseForward" type="radio" value="10" <?php if ($_smarty_tpl->tpl_vars['houseForward']->value==10){?> checked="checked" <?php }?> /> 东西 </label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
			    <td align="left" valign="middle" class="p25">
			  	    <label><input id="" name="houseFitment" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['houseFitment']->value==1){?> checked="checked" <?php }?> /> 豪华装修</label>     
			      	<label> <input id="" name="houseFitment" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['houseFitment']->value==2){?> checked="checked" <?php }?> /> 精装修  </label>    
			        <label><input id="" name="houseFitment" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['houseFitment']->value==3){?> checked="checked" <?php }?> /> 中等装修</label>    
			        <label><input id="" name="houseFitment" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['houseFitment']->value==4){?> checked="checked" <?php }?> /> 简装修</label>  
			        <label><input id="" name="houseFitment" type="radio" value="5" <?php if ($_smarty_tpl->tpl_vars['houseFitment']->value==5){?> checked="checked" <?php }?> /> 毛坯</label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
			    <td align="left" valign="middle" class="p25" style="line-height:26px;">
			    	 <span><input name="houseBaseService[]" type="checkbox" value="1" <?php echo $_smarty_tpl->tpl_vars['houseBaseService1']->value;?>
/ > 煤气/天然气</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="2" <?php echo $_smarty_tpl->tpl_vars['houseBaseService2']->value;?>
/ > 暖气 </label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="3" <?php echo $_smarty_tpl->tpl_vars['houseBaseService3']->value;?>
/ > 电梯 </label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="4" <?php echo $_smarty_tpl->tpl_vars['houseBaseService4']->value;?>
/ > 车位/车库</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="5" <?php echo $_smarty_tpl->tpl_vars['houseBaseService5']->value;?>
/ > 储藏室/地下室</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="6" <?php echo $_smarty_tpl->tpl_vars['houseBaseService6']->value;?>
/ > 花园/小院</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="7" <?php echo $_smarty_tpl->tpl_vars['houseBaseService7']->value;?>
/ > 露台</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="8" <?php echo $_smarty_tpl->tpl_vars['houseBaseService8']->value;?>
/ > 阁楼</label></span>
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
			    	<input id="houseTitle" name="houseTitle" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['houseTitle']->value;?>
" maxlength="60" onkeyup="textCounter(document.getElementById('houseTitle'),document.getElementById('houseTitleAlert'),30);" /> 还可写<span id="houseTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle">
			    <textarea id="houseContent" name="houseContent" cols="86" rows="12" ><?php echo $_smarty_tpl->tpl_vars['houseContent']->value;?>
</textarea>			    
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
	    <input type="hidden" id="propId" name="propId" value="<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
"/>
	    </form>
    </div>
    </div>
    </div>
<
<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>