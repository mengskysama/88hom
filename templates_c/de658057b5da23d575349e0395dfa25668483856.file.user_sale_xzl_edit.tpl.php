<?php /* Smarty version Smarty-3.1.8, created on 2013-07-27 11:15:45
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_sale_xzl_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2068251dfb2ad9833a0-90855147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de658057b5da23d575349e0395dfa25668483856' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_sale_xzl_edit.tpl',
      1 => 1374894618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2068251dfb2ad9833a0-90855147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51dfb2adcc6f94_38184806',
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
    'officeNumber' => 0,
    'officeType' => 0,
    'officeSellPrice' => 0,
    'officeProFee' => 0,
    'officeBuildArea' => 0,
    'officeFloor' => 0,
    'officeAllFloor' => 0,
    'officeDivision' => 0,
    'officeFitment' => 0,
    'officeLevel' => 0,
    'officeTitle' => 0,
    'FCKeditor' => 0,
    'officeTraffic' => 0,
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
<?php if ($_valid && !is_callable('content_51dfb2adcc6f94_38184806')) {function content_51dfb2adcc6f94_38184806($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>编辑写字楼出售房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

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
		
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        if (check()) {
            $("#action_to_go").val("1");
            document.getElementById("xzlForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
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
	if($("#officeTraffic").val() == ""){
		alert("请填写交通状况");
		$("#officeTraffic").focus();
		return false;
	}
	if($("#topPicPath").val() == ""){
		alert("请选择标题图");
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
    <p>你的位置: <a href="#">编辑商铺出售房源</a></p>
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
" maxlength="12" onblur="CheckInfoCode('officeNumber',true)" />  </td>
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
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> <font class="red">*</font> 单    价</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeSellPrice" name="officeSellPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeSellPrice']->value;?>
" onblur="CheckSwatchPriceOffice('officeSellPrice');" /> 元/平米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="officeProFee" name="officeProFee" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeProFee']->value;?>
" onblur="checkPropFee('officeProFee',true);" /> 元/平米·月
    	</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="officeBuildArea" name="officeBuildArea" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeBuildArea']->value;?>
" maxlength="8" onblur="CheckBuildingArea('officeBuildArea',true);" /> 平方米</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="officeFloor" name="officeFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeFloor']->value;?>
" onblur="CheckFloor('officeFloor','officeAllFloor',true);" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="officeAllFloor" name="officeAllFloor" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeAllFloor']->value;?>
" onblur="CheckFloor('officeFloor','officeAllFloor',true);" /> <font class="z3">层</font> 地下室请填写负数</td>
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
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="officeTitle" name="officeTitle" type="text" value="<?php echo $_smarty_tpl->tpl_vars['officeTitle']->value;?>
" maxlength="60" onblur="CheckTitle('officeTitle',true);" onkeyup="textCounter(document.getElementById('officeTitle'),document.getElementById('officeTitleAlert'),30);" /> 还可写<span id="officeTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>

			    <span>可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
			请勿从其它网站或其它房源描述中拷贝。</span>
			         <span>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>交通状况</td>
			    <td colspan="2" width="600" align="left" valign="middle" class="p25 grzc_31">
			    	 <textarea class="bdqy2" rows="7" cols="80" id="officeTraffic" name="officeTraffic"><?php echo $_smarty_tpl->tpl_vars['officeTraffic']->value;?>
</textarea>
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
templates/images/ucenter/cha.JPG"></a></dd>
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
            <td width="320" height="80" align="center" valign="middle"><?php if ($_smarty_tpl->tpl_vars['propState']->value==0){?><input name="btn_live" type="button" class="mddl1" id="btn_live" value="发布" /><?php }?></td>
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