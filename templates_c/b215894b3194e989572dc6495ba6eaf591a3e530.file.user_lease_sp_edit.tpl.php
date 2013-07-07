<?php /* Smarty version Smarty-3.1.8, created on 2013-07-07 18:21:02
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_lease_sp_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191751d94077043052-28791687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b215894b3194e989572dc6495ba6eaf591a3e530' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_lease_sp_edit.tpl',
      1 => 1373192437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191751d94077043052-28791687',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d9407720cb99_11514577',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
    'estId' => 0,
    'estName' => 0,
    'shopsAddress' => 0,
    'shopsNumber' => 0,
    'shopsType' => 0,
    'shopsRentPrice' => 0,
    'shopsRentPriceUnit' => 0,
    'shopsPropFee' => 0,
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
    'propPhoto' => 0,
    'shopsTitle' => 0,
    'shopsContent' => 0,
    'propId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d9407720cb99_11514577')) {function content_51d9407720cb99_11514577($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑商铺出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ckeditLib']->value;?>
"></script>
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
});
  
function check(){
	
	if(!CheckInfoCode('shopsNumber',true)) return false;		
	if(!checkRentPrice()) return false;
	if(!checkPropFee('shopsPropFee',true)) return false;
	if(!CheckBuildingArea('shopsBuildArea',true)) return false;
	if(!CheckFloor('shopsFloor','shopsAllFloor',true)) return false;
	/*
	var housePhotoValue = $("#shopPhoto").val();
	if(trim(housePhotoValue) == ''){
		alert("请上传图片");
		return false;
	}
	*/
	if(!CheckTitle('shopsTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.shopsContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
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
    	return false;
    }
    
    if(check_float("shopsRentPrice")){
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
    <p>你的位置: <a href="#">编辑商铺出租房源</a></p>
   	<div class="qg_bs">
          <div class="bs_tx">
            <p><b>基本资料</b></p>
            <form id="spForm" name="spForm" action="property_handler.php" method="post" enctype="multipart/form-data">
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
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 区    域</td>
    <td align="left" valign="middle" class="p25">
		<div>
			<div id="showselectdc">
 				<table style="display: block;">
					<tr>
						<td width="120">
							<combobox id="input_y_str_DISTRICT0" width="100" labelposition="top" columns="3"
								groupclass="group" itemclass="item999" itemoverclass="itemOver" itemselectedclass="itemFocus"
                        		text="请选择区县" value="">
                                       
								<tip position="frameTop"><div align="center" class="tip">请选择区县</div></tip>
								
							</combobox>
                  		</td>
            			<td width="100">
                    		<combobox id="input_y_str_COMAREA0" width="100" labelposition="left" columns="3"
                           		groupclass="group" itemclass="item999" itemoverclass="itemOver" itemselectedclass="itemFocus"
                            	text="请选择商圈" value="">
								<tip position="frameTop"><div align="center" class="tip">请先选择区县</div></tip>	
							</combobox>
                         </td>
          				<td><span class="alert01" style=" display: none" id="input_DISTRICT_tip">请选择区县</span></td>
                        <td><span class="alert01" style=" display: none" id="input_COMAREA_tip">请选择商圈</span></td>
					</tr>
				</table>
			</div>
            <div id="showprojdc" style="display: none">
            </div>
                                
            <div style="display: none;" id="uHouseDicDiv" >
                <a id="AddHouseAliasHref" target="_blank">完善楼盘信息</a>
            </div>
                                  
            <input type="hidden" id="input_DISTRICT" name="input_y_str_DISTRICT" />
            <input type="hidden" id="input_COMAREA" name="input_y_str_COMAREA" />
            <input type="hidden" id="hdHouseDicCity" name="hdHouseDicCity" value="1" />

		</div>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 房源信息编码</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsNumber" name="shopsNumber" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsNumber']->value;?>
" maxlength="12" onblur="CheckInfoCode('shopsNumber',true)" /></td>
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
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  租    金</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsRentPrice" name="shopsRentPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsRentPrice']->value;?>
" onblur="checkRentPrice();" />
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('30',false)" value="1" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==1){?> checked="checked" <?php }?> />元/平米·天</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('900',false)" value="2" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==2){?> checked="checked" <?php }?> />元/平米·月</label>
    <label><input id="" name="shopsRentPriceUnit" type="radio" onclick="checkPrice('1000000000',false)" value="3" <?php if ($_smarty_tpl->tpl_vars['shopsRentPriceUnit']->value==3){?> checked="checked" <?php }?> />元/月</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsPropFee']->value;?>
" onblur="checkPropFee('shopsPropFee',true);" /> <font class="z3">元/平米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsBuildArea" name="shopsBuildArea" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsBuildArea']->value;?>
" maxlength="8" onblur="CheckBuildingArea('shopsBuildArea',true);" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="shopsFloor" name="shopsFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsFloor']->value;?>
" onblur="CheckFloor('shopsFloor','shopsAllFloor',true);" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="shopsAllFloor" name="shopsAllFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsAllFloor']->value;?>
" onblur="CheckFloor('shopsFloor','shopsAllFloor',true);" /> <font class="z3">层</font> 地下室请填写负数</td>
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
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>图片展示</td>
			    <td colspan="2" width="280" align="left" valign="middle" class="p25 grzc_31">
					<input id="shopPhoto" name="shopPhoto" type="file" value="" /><br>
    				<img src="http://localhost/88hom/uploads/community/<?php echo $_smarty_tpl->tpl_vars['propPhoto']->value;?>
" class="l">
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="shopsTitle" name="shopsTitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopsTitle']->value;?>
" maxlength="60" onblur="CheckTitle('shopsTitle',true);" onkeyup="textCounter(document.getElementById('shopsTitle'),document.getElementById('shopsTitleAlert'),30);" /> 还可写<span id="shopsTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" >
			    <textarea id="shopsContent" name="shopsContent" cols="86" rows="12" ><?php echo $_smarty_tpl->tpl_vars['shopsContent']->value;?>
</textarea>			    
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