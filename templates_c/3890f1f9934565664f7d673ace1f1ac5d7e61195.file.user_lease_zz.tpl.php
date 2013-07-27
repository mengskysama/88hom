<?php /* Smarty version Smarty-3.1.8, created on 2013-07-27 11:14:24
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_lease_zz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:679951dbc5a1346135-67832923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3890f1f9934565664f7d673ace1f1ac5d7e61195' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_lease_zz.tpl',
      1 => 1374892873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '679951dbc5a1346135-67832923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51dbc5a141aab7_59530944',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'picTypeList' => 0,
    'key' => 0,
    'timestamp' => 0,
    'token' => 0,
    'restLivePropsCount' => 0,
    'FCKeditor' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dbc5a141aab7_59530944')) {function content_51dbc5a141aab7_59530944($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>录入住宅出租房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script>
$(function() {    
    
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
	
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
        	$("#action_to_go").val(1);
            document.getElementById("zzForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
        
    $("#btn_save").click(function() {
        $("#btn_live").attr("disabled", true);
        $("#btn_save").attr("disabled", true);
        if (check()) {
            document.getElementById("zzForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
            $("#btn_save").removeAttr("disabled");
        }
    });
});
  
function check(){
	var estNameValue = $("#estId").val();
	if(trim(estNameValue) == ''){
		alert("请填写楼盘名称");
		$("#estName").focus();
		return false;
	}
	
	if(!CheckInfoCode('houseNumber',true)) return false;
	if(!CheckRoom('houseRoom',true)) return false;
	if(!CheckRoom('houseHall',true)) return false;
	if(!CheckRoom('houseToilet',true)) return false;
	if(!CheckRoom('houseKitchen',true)) return false;
	if(!CheckRoom('houseBalcony',true)) return false;
	if(!checkRentPrice()) return false;
	
	var val = $('input:radio[name="housePayment"]:checked').val();
    if (val == 1) {
        var housePayDetailY = document.getElementById("housePayDetailY").value;
        var housePayDetailF = document.getElementById("housePayDetailF").value;
        if(housePayDetailY == ""){
        	alert("请选择支付方式压多少");
        	return false;
        }
        if(housePayDetailF == ""){
        	alert("请选择支付方式付多少");
        	return false;
        }
    }
	
	if(!CheckRentArea('houseRentArea',true)) return false;
	if(!CheckFloor('houseFloor','houseAllFloor',true)) return false;
		
	if(!CheckTitle('houseTitle',true)) return false;
	var houseContentValue = CKEDITOR.instances.houseContent.getData(); 
	if(trim(houseContentValue) == ''){
		alert("请填写房源描述");
		return false;
	}
	if($("#topPicPath").val() == ""){
		alert("请选择标题图");
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
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
            <form id="zzForm" name="zzForm" action="property_handler.php" method="post" enctype="multipart/form-data">
 		   <ul>
   			 	<li><a href="user_lease_zz.php">录入住宅出租房源</a></li>
    		    <li><a href="user_lease_bs.php">录入别墅出租房源</a></li>
     		    <li><a href="user_lease_sp.php">录入商铺出租房源</a></li>
      		 	<li><a href="user_lease_xzl.php">录入写字楼出租房源</a></li>
   		  </ul>
          <div class="bs_tx">
            <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> <?php echo $_smarty_tpl->tpl_vars['restLivePropsCount']->value;?>
</font> 条</span></p>
            <input type="hidden" name="prop_type" value="zz">
            <input type="hidden" name="prop_tx_type" value="2">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼盘名称</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input type="hidden" id="estId" name="estId"/>
			    <input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);emptyEstId();" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字</td>
			     <div class="tswords" style="display: none;" id="dis_est_alert">
                	<span class="alert01" style="margin-left:0;" id="P1">请选择列表中匹配的楼盘录入</span><a id="addestate" href="estate_input.php" title="" target="_blank">我要添加新楼盘</a>
                </div>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">房源信息编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseNumber" name="houseNumber" type="text" maxlength="12" /> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">内部编码</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="privateHouseNumber" name="privateHouseNumber" type="text" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>户    型</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="houseRoom" name="houseRoom" type="text" maxlength="1"/> 室 
			    <input id="houseHall" name="houseHall" type="text" maxlength="1"/> 厅 
			    <input id="houseToilet" name="houseToilet" type="text" maxlength="1"/> 卫 
			    <input id="houseKitchen" name="houseKitchen" type="text" maxlength="1"/> 厨 
			    <input id="houseBalcony" name="houseBalcony" type="text" maxlength="1"/> 阳台</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 租   金</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseSellPrice" name="houseSellPrice" type="text" /> 元/月</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>租赁方式</td>
			    <td align="left" valign="middle" class="p25">
				<input type="radio" name="houseRentType" id="" onclick="ISJoinLease(1);" value="1" checked="checked" /> 整租
                <input type="radio" name="houseRentType" id="" onclick="ISJoinLease(2);" value="2"  /> 合租				
				</td>
			  </tr>
			  <tr id="tr_houseRentType_join" style="display:none;">
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>合租方式</td>
			    <td align="left" valign="middle" class="p25">
	            <select name="houseRentRoomType" id="houseRentRoomType">
	              <option selected="selected" value="1">主卧</option>
	              <option value="2">次卧</option>
	              <option value="3">床位</option>
	              <option value="4">隔断间</option>
	            </select>&nbsp;&nbsp;
	            <select name="houseRentDetail" id="houseRentDetail">
	              <option selected="selected" value="1">性别不限</option>
	              <option value="2">限女生</option>
	              <option value="3">限男生</option>
	              <option value="4">限夫妻</option>
	            </select>
			
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>支付方式</td>
			    <td align="left" valign="middle" class="p25 grzc_35">
			    <input id="housePayment" checked="checked" name="housePayment" type="radio" value="1" onclick="changepaydetail()"/>押&nbsp;
				<select name="housePayDetailY" id="housePayDetailY" style=" vertical-align:middle">
				<option selected="selected" value="">请选择</option>
				<option value="0">零</option>
				<option value="1">一个月</option>
				<option value="2">两个月</option>
				<option value="3">三个月</option>
				<option value="6">六个月</option>
				</select>
                                                       付&nbsp;
				<select name="housePayDetailF" id="housePayDetailF" style=" vertical-align:middle">
                                    <option selected="selected" value="">请选择</option>
                                    <option value="1" >一个月</option>
                                    <option value="2">两个月</option>
                                    <option value="3">三个月</option>
                                    <option value="6">六个月</option>
                                    <option value="12">十二个月</option>
 				</select>
			    <input id="housePayment" name="housePayment" type="radio" value="2" onclick="changepaydetail();" />面议
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 出租面积</td>
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="houseRentArea" name="houseRentArea" type="text" maxlength="8"/> <font class="z3">平方米</font> 请填写产权面积，如将赠送面积算在内，视为违规。</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
			    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="houseFloor" name="houseFloor" type="text" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="houseAllFloor" name="houseAllFloor" type="text"/> <font class="z3">层</font> 地下室请填写负数</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">朝    向</td>
			    <td align="left" valign="middle" class="p25">
			   	   <label><input id="" name="houseForward" type="radio" value="1" checked="checked"/>东</label>     
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
			        <label><input id="" name="houseFitment" type="radio" value="4" checked="checked"/> 简装修</label>  
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
			</table>
	
          </div>
      <div class=" bs_tx">
    		<p><b>图文信息</b></p>
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="houseTitle" name="houseTitle" type="text"  value="" maxlength="60" onkeyup="textCounter(document.getElementById('houseTitle'),document.getElementById('houseTitleAlert'),30);" /> 还可写<span id="houseTitleAlert"><font class="red">30</font></span>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>

	            <span style="border-bottom:none">可详细描述该房源特点，请勿填写联系方式或与房源无关信息以及图片、链接、FLASH等。<br />
				      请勿从其它网站或其它房源描述中拷贝。</span><br/><br/>
				               <span>
				         <b style="text-indent:0px;">注意事项：</b> <br />
				1.上传宽度大于600像素，比例为5:4的图片可获得更好的展示效果。<br />
				2.请勿上传有水印、盖章等任何侵犯他人版权或含有广告信息的图片。<br />
				3.可上传20张图片，每张小于2M，建议尺寸大于500x400像素。</span>
			    	
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
		            </div>
				 </td>
				</tr> 
				<?php } ?>
		      
		       <tr>
			    <td height="124" align="center" valign="middle" bgcolor="#f7f6f1">标题图</td>
			    <td align="left" valign="top" class="p25"><div class="btt" id="topic_image"></div></td>
			    
        	    <input type="hidden" id="topPicPath" name="topPicPath" value=""/>
        	    <input type="hidden" id="topPicPathThumb" name="topPicPathThumb" value=""/>
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
<
<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>