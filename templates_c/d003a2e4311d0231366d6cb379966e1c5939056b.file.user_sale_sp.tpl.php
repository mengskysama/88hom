<?php /* Smarty version Smarty-3.1.8, created on 2013-06-24 15:34:01
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_sale_sp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2744051c7f0a56a3478-23197049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd003a2e4311d0231366d6cb379966e1c5939056b' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_sale_sp.tpl',
      1 => 1372059218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2744051c7f0a56a3478-23197049',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51c7f0a57709c9_03148991',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ckeditLib' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c7f0a57709c9_03148991')) {function content_51c7f0a57709c9_03148991($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人房源_商铺</title>
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
            document.getElementById("spForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
  });
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
       		    <li><a href="user_sale_cp.php">录入厂房出售房源</a></li>
   		  </ul>
          <div class="bs_tx">
            <p><b>基本资料</b><span class="r"><font class="red">*</font> 为必填 | 还可发布<font class="red"> 10</font> 条</span></p>
            <form id="spForm" name="spForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="xzl">
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 商铺名称</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input type="hidden" id="estId" name="estId"/><input id="estName" name="estName" type="text"  value="" /> 还可写<font class="red">25</font>个汉字</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">商铺地址</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="shopsAddress" name="shopsAddress" type="text"  value="" />  </td>
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
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsNumber" name="shopsNumber" type="text"  value="" /></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">类    别</td>
    <td align="left" valign="middle" class="p25"> 
    	<label><input id="" name="shopsType" type="radio" value="1" /> 住宅底商</label>     
      	<label> <input id="" name="shopsType" type="radio" value="2" /> 商业街商铺  </label>    
        <label><input id="" name="shopsType" type="radio" value="3" /> 写字楼配套底商</label>    
        <label><input id="" name="shopsType" type="radio" value="4" /> 购物中心/百货</label>  
        <label><input id="" name="shopsType" type="radio" value="5" /> 其他</label></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsSellPrice" name="shopsSellPrice" type="text"  value="" /> <font class="z3">万元/套</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 物 业 费</td>
    <td align="left" valign="middle" class="p25 grzc_32"><input id="shopsPropFee" name="shopsPropFee" type="text"  value="" /> <font class="z3">元/平米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
    <td align="left" valign="middle" class="p25 grzc_33"><input id="shopsBuildArea" name="shopsBuildArea" type="text"  value="" /> <font class="z3">平方米</font></td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 楼    层</td>
    <td align="left" valign="middle" class="p25 grzc_35"><font class="z3">第</font> <input id="shopsFloor" name="shopsFloor" type="text"  value="" /> <font class="z3">层</font>   <font class="z3">共</font> <input id="shopsAllFloor" name="shopsAllFloor" type="text"  value="" /> <font class="z3">层</font> 地下室请填写负数</td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">是否可分割</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsDivision" type="radio" value="1" checked="checked" /> 可分割</label>     
      	<label> <input id="" name="shopsDivision" type="radio" value="2" /> 不可分割</label>   </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">装修程度</td>
    <td align="left" valign="middle" class="p25">
    	<label><input id="" name="shopsFitment" type="radio" value="1" checked="checked" /> 精装修</label>     
      	<label> <input id="" name="shopsFitment" type="radio" value="2" /> 简装修</label>
        <label> <input id="" name="shopsFitment" type="radio" value="3" /> 毛坯</label>
        </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"> 配套设施</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
    	 <span><label><input name="shopsBaseService[]" type="checkbox" value="1" / > 客梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="2" / > 货梯 </label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="3" / > 扶梯 </label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="4" / > 暖气</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="5" / > 空调</label></span>
          <span><label><input name="shopsBaseService[]" type="checkbox" value="6" / > 停车位</label></span>
         <span><label><input name="shopsBaseService[]" type="checkbox" value="7" / > 水</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="8" / > 燃气</label></span>
         <span><label> <input name="shopsBaseService[]" type="checkbox" value="9" / > 网络</label></span>
    </td>
  </tr>
  <tr>
    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">目标业态</td>
    <td align="left" valign="middle" class="p25" style="line-height:26px;">
   	 	  <span><label><input name="shopsAimOperastion[]" type="checkbox" value="1" / > 百货超市</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="2" / > 酒店宾馆 </label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="3" / > 家居建材 </label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="4" / > 服饰鞋包</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="5" / > 生活服务</label></span>
          <span><label><input name="shopsAimOperastion[]" type="checkbox" value="6" / > 美容美发</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="7" / > 餐饮美食</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="8" / > 休闲娱乐</label></span>
         <span><label><input name="shopsAimOperastion[]" type="checkbox" value="9" / > 其他</label></span>
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
					<input id="shopPhoto" name="shopPhoto" type="file"  value="" />
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input id="shopsTitle" name="shopsTitle" type="text"  value="" /> 还可写<font class="red">30</font>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" >
			    <textarea id="officeContent" name="shopContent" cols="86" rows="12" ></textarea>			    
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
	    </form>
    </div>
    </div>
    </div>

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>