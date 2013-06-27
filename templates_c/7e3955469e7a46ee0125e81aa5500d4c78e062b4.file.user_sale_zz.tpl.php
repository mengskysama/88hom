<?php /* Smarty version Smarty-3.1.8, created on 2013-06-27 15:01:07
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_sale_zz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1071251c0079056ef63-82697093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e3955469e7a46ee0125e81aa5500d4c78e062b4' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_sale_zz.tpl',
      1 => 1372316090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1071251c0079056ef63-82697093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51c007906310a8_00615786',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c007906310a8_00615786')) {function content_51c007906310a8_00615786($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>录入住宅出售房源</title>
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
        if (check()) {
            document.getElementById("zzForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
});
  
function check(){
	var estNameValue = $("#estName").val();
	if(trim(estNameValue) == ''){
		alert("请填写楼盘名称");
		return false;
	}
	
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
	
	var housePhotoValue = $("#housePhoto").val();
	if(trim(housePhotoValue) == ''){
		alert("请上传图片");
		return false;
	}
	
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
            <form id="zzForm" name="zzForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="zz">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input type="hidden" id="estId" name="estId"/>
			    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseNumber" name="houseNumber" type="text" maxlength="12" onblur="CheckInfoCode('houseNumber',true)" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateHouseNumber" name="privateHouseNumber" type="text" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 产权信息</td>
			    <td align="left" valign="middle" class="p25">
			    <select id="housePayInfo" name="housePayInfo">
			    	<option value="1">商品房</option>
			    	<option value="2">微利房</option>
			    	<option value="3">军产房</option>
			    	<option value="4">集资房</option>
			    	<option value="5">农民房</option>
			    	<option value="6">福利房</option>			    	
			    </select>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
			    <td align="left" valign="middle" class="p25">
			    <select id="houseType" name="houseType">			    
			    	<option value="1">普通住宅</option>
			    	<option value="2">高档住宅</option>
			    	<option value="3">酒店式公寓 </option>
			    	<option value="4">集资房</option>			    	
			    </select>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseSellPrice" name="houseSellPrice" type="text" onblur="CheckPrice('houseSellPrice',true,'CS');" /> 万元/套</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><input id="houseRoom" name="houseRoom" type="text" maxlength="1" onblur="CheckRoom('houseRoom',true)"/> 室 <input id="houseHall" name="houseHall" type="text" maxlength="1" onblur="CheckRoom('houseHall',true)"/> 厅 <input id="houseToilet" name="houseToilet" type="text" maxlength="1" onblur="CheckRoom('houseToilet',true);"/> 卫 <input id="houseKitchen" name="houseKitchen" type="text" maxlength="1" onblur="CheckRoom('houseKitchen',true);"/> 厨 <input id="houseBalcony" name="houseBalcony" type="text" maxlength="1" onblur="CheckRoom('houseBalcony',true);"/> 阳台</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑形式</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseBuildForm" name="houseBuildForm" type="text"  value="" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseBuildArea" name="houseBuildArea" type="text" maxlength="8" onblur="CheckBuildingArea('houseBuildArea',true);"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">使用面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseUseArea" name="houseUseArea" type="text" maxlength="8" onblur="CheckLiveArea('houseUseArea','houseBuildArea',true)" /><font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑年代</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseBuildYear" name="houseBuildYear" type="text" maxlength="4" onblur="CheckCreateTime('houseBuildYear',true)" /><font class="z3">年</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="houseFloor" name="houseFloor" type="text" onblur="CheckFloor('houseFloor','houseAllFloor',true);" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="houseAllFloor" name="houseAllFloor" type="text" onblur="CheckFloor('houseFloor','houseAllFloor',true);" /> <font class="z3">层</font> 地下室请填写负数</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
			    <td align="left" valign="middle" class="p25">
			   	   <label><input id="" name="houseForward" type="radio" value="1" />东</label>     
			      	<label> <input id="" name="houseForward" type="radio" value="2" /> 南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="3" /> 西</label>    
			        <label><input id="" name="houseForward" type="radio" value="4" /> 北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="5" /> 东南 </label>
			        <label> <input id="" name="houseForward" type="radio" value="6" /> 西南  </label>    
			        <label><input id="" name="houseForward" type="radio" value="7" /> 西北 </label>    
			        <label><input id="" name="houseForward" type="radio" value="8" /> 东北 </label>  
			        <label><input id="" name="houseForward" type="radio" value="9" /> 南北 </label>
			         <label><input id="" name="houseForward" type="radio" value="10" /> 东西 </label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
			    <td align="left" valign="middle" class="p25">
			  	    <label><input id="" name="houseFitment" type="radio" value="1" /> 豪华装修</label>     
			      	<label> <input id="" name="houseFitment" type="radio" value="2" /> 精装修  </label>    
			        <label><input id="" name="houseFitment" type="radio" value="3" /> 中等装修</label>    
			        <label><input id="" name="houseFitment" type="radio" value="4" /> 简装修</label>  
			        <label><input id="" name="houseFitment" type="radio" value="5" /> 毛坯</label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">配套设施</td>
			    <td align="left" valign="middle" class="p25" style="line-height:26px;">
			    	 <span><input name="houseBaseService[]" type="checkbox" value="1" / > 煤气/天然气</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="2" / > 暖气 </label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="3" / > 电梯 </label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="4" / > 车位/车库</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="5" / > 储藏室/地下室</label></span>
			          <span><input name="houseBaseService[]" type="checkbox" value="6" / > 花园/小院</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="7" / > 露台</label></span>
			         <span> <input name="houseBaseService[]" type="checkbox" value="8" / > 阁楼</label></span>
			         <span><a href="javascript:void(0);" onclick="return SelAllClick(this,'houseBaseService[]')" class="red">[全选]</a></span>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">看房时间</td>
			    <td align="left" valign="middle" class="p25">
			  		 <label><input id="" name="houseLookTime" type="radio" value="1" checked="checked" /> 随时看房 </label>     
			      	<label> <input id="" name="houseLookTime" type="radio" value="2" /> 非工作时间  </label>    
			        <label><input id="" name="houseLookTime" type="radio" value="3" /> 电话预约</label>    
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
			    	<input id="housePhoto" name="housePhoto" type="file"  value="" />
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="houseTitle" name="houseTitle" type="text"  value="" maxlength="60" onblur="CheckTitle('houseTitle',true);" onkeyup="textCounter(document.getElementById('houseTitle'),document.getElementById('houseTitleAlert'),30);" /> 还可写<span id="houseTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle">
			    <textarea id="houseContent" name="houseContent" cols="86" rows="12" ></textarea>			    
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
            <td width="120" align="center" valign="middle"><input name="btn_live" type="button" class="mddl1" id="btn_live" value="发布" /></td>
            <td width="320" height="80" align="center" valign="middle"><input name="btn_save" type="button" class="mddl1" id="btn_save" value="保存待发布" /></td>
	      </tr>
	    </table>
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