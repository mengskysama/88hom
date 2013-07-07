<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>个人房源_厂房 </title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="JavaScript" type="text/javascript" src="<!--{$ckeditLib}-->"></script>
<script>
  $(function() {          
    $("#btn_live").click(function() {
        $("#btn_live").attr("disabled", true);
        if (check()) {
            document.getElementById("cfForm").submit();
        } else {
            $("#btn_live").removeAttr("disabled");
        }
    });
  });
</script>
</head>

<body>
<!--求购头部-->
<div class="qg_tb">
<!--{include file="$header_ucenter_user"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_user_left_menu"}-->
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
            <form id="cfForm" name="cfForm" action="property_handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="prop_type" value="cf">
            <input type="hidden" name="prop_tx_type" value="1">
		    <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房名称</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input id="factoryName" name="factoryName" type="text"  value="" /> 还可写<font class="red">25</font>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房地址</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input id="factoryAddress" name="factoryAddress" type="text"  value="" /> 还可写<font class="red">25</font>个汉字 </td>
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
			    <td align="left" valign="middle" class="p25 grzc_33"><input id="factoryNumber" name="factoryNumber" type="text"  value="" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 厂房类型</td>
			    <td align="left" valign="middle" class="p25">
			    	 <label><input id="" name="factoryType" type="radio" value="1" /> 独立厂房</label>     
			      	<label> <input id="" name="factoryType" type="radio" value="2" /> 工业园  </label>    
			        <label><input id="" name="factoryType" type="radio" value="3" /> 开发区</label>    
			        <label><input id="" name="factoryType" type="radio" value="4" /> 产业基地</label>  
			        <label><input id="" name="factoryType" type="radio" value="5" /> 其他</label>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>  售    价</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factorySellPrice" name="factorySellPrice" type="text"  value="" /> <font class="z3">元/平米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 管 理 费</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryProFee" name="factoryProFee" type="text"  value="" /> 
			      <font class="z3">元/平米·月</font> </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">管理单位</td>
			    <td align="left" valign="middle" class="p25 grzc_31"><input id="factoryManagentUnits" name="factoryManagentUnits" type="text"  value="" /></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">土地证</td>
			    <td align="left" valign="middle" class="p25">
			    	<label><input id="" name="factoryPayInfo" type="radio" value="1" /> 国有土地证</label>     
			      	<label> <input id="" name="factoryPayInfo" type="radio" value="2" /> 集体土地证  </label>    
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">占地面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryFloorArea" name="factoryFloorArea" type="text"  value="" /> 
			      <font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font> 建筑面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryBuildArea" name="factoryBuildArea" type="text"  value="" />
			      <font class="z3"> 平方米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">办公面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryOfficeArea" name="factoryOfficeArea" type="text"  value="" /> <font class="z3">平方米</font></td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">车间面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryWorkshopArea" name="factoryWorkshopArea" type="text"  value="" /> <font class="z3">平方米</font>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">空地面积</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factorySpaceArea" name="factorySpaceArea" type="text"  value="" /> <font class="z3">平方米</font>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1">宿舍情况</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryDormitory" name="factoryDormitory" type="text"  value="" />
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑年代</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryBuildYear" name="factoryBuildYear" type="text"  value="" /> <font class="z3">年</font>   
			    </td>
			  </tr>
			   <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">跨    度</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factorySpan" name="factorySpan" type="text"  value="" /><font class="z3"> 米</font>  
			    </td>
			  </tr>
			   <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">层    数</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryAllFloor" name="factoryAllFloor" type="text"  value="" /> <font class="z3">层</font> 
			    </td>
			  </tr>
			   <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">层    高</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryFloorHeight" name="factoryFloorHeight" type="text"  value="" /> <font class="z3">米</font>   
			    </td>
			  </tr>
			   <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">楼层承重</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryLoadBearing" name="factoryLoadBearing" type="text"  value="" /> <font class="z3">吨/平米</font>   
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">建筑结构</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryBuildStructure" name="factoryBuildStructure" type="text"  value="" />     
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">水</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryWater" name="factoryWater" type="text"  value="" />     
			    </td>
			  </tr><tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">现配电容量</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryHasCapacityNow" name="factoryHasCapacityNow" type="text"  value="" /> <font class="z3">KVA</font>       
			    </td>
			  </tr><tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1">可配电容量</td>
			    <td align="left" valign="middle" class="p25 grzc_32"><input id="factoryHasCapacityMax" name="factoryHasCapacityMax" type="text"  value="" /> <font class="z3">KVA</font>      
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
					<input id="factoryPhoto" name="factoryPhoto" type="file"  value="" />
				</td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>标  题</td>
			    <td colspan="2" align="left" valign="middle" class="p25 grzc_31">
			    	<input name="" type="text"  value="" /> 还可写<font class="red">30</font>个汉字</td>
			  </tr>
			  <tr>
			    <td width="120" align="center" valign="middle" bgcolor="#f7f6f1"><font class="red">*</font>房源描述</td>
			    <td colspan="2" align="left" valign="middle" class="p25 bs">
			    <textarea id="officeContent" name="factoryContent" cols="86" rows="12" ></textarea>			    
				<script>
					CKEDITOR.replace( 'factoryContent' );
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
<!--{include file="$footer"}-->
</body>
</html>
