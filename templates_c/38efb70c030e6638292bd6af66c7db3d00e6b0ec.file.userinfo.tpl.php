<?php /* Smarty version Smarty-3.1.8, created on 2013-07-11 20:31:59
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\userinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1133251bd839b1da0c3-12759871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38efb70c030e6638292bd6af66c7db3d00e6b0ec' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\userinfo.tpl',
      1 => 1373545698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1133251bd839b1da0c3-12759871',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51bd839b2e5a47_50801810',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
    'maleGender' => 0,
    'femaleGender' => 0,
    'areaIndex' => 0,
    'realName' => 0,
    'cardtypeId' => 0,
    'IDCode' => 0,
    'contactAddr' => 0,
    'postCode' => 0,
    'contactPhone' => 0,
    'contactQQ' => 0,
    'contactMSN' => 0,
    'userdetailPic' => 0,
    'actionType' => 0,
    'operation_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bd839b2e5a47_50801810')) {function content_51bd839b2e5a47_50801810($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人注册页面</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
	$(document).ready(function(){

		$('#btn_confirm').click(function(){
			if(checkform()){
				$('#frm_userinfo').submit();
			}
		});
		//初始化区域插件
		if($('#areaIndex').val() != ''){
			var areaIndex = $('#areaIndex').val().split('-');
			$('#txtCity').val(C[areaIndex[0]][areaIndex[1]]);//市,表面文字 
			$('#txtDistrict').val(D[areaIndex[0]][areaIndex[1]][areaIndex[2]]);//区,表面文字
			if(areaIndex.length > 3)
				$('#txtComareas').val(A[areaIndex[0]][areaIndex[1]][areaIndex[2]][areaIndex[3]]);//片区,表面文字
		}
	});
	
	function checkform(){
		if(!chkEmpty('IDCode','请填写证件号码')) return false;
		if(!chkEmpty('contactAddr','请填写联系地址')) return false;
		if(!chkNumber('contactPhone','联系电话',true)) return false;
		if(!chkNumber('postCode','邮政编码',false)) return false;
		if(!chkNumber('contactQQ','QQ',false)) return false;
		return true;
	}
	
	function chkEmpty(keyId,msg){
		var value = document.getElementById(keyId).value;
		if(trim(value) == ""){
			alert(msg);
			return false;
		}
		return true;
	}
	function chkNumber(keyId,keyName,tag){
		var value = document.getElementById(keyId).value;
		if(trim(value) == ""){
			if(tag){
				alert('请填写' + keyName);
				return false;
			}
			return true;
		}

		if(!IsInt(keyId)){
			alert(keyName + "只能是数字");
			return false;
		}
		return true;
	}
</script>
</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
    	<div class="zl_b1">
         <div class="zl_b11">
        	<div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="ucenter_user.php">用户中心</a></li>
	          <li><a href="userinfo.php">个人资料</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
              <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
            <div class="zl_nr">
            	<div class="zl_l">
                	<span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font></span>
<ul class="zlfl">
                    	<li><a href="userinfo.php">个人资料修改</a></li>
                    </ul>
                </div>
                <div class="zl_r">
                <form id="frm_userinfo" name="frm_userinfo" action="userinfo.php" method="post" enctype="multipart/form-data">
<table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">用户名：</td>
  							  <td width="450" class="f14 z3"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</td>
</tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">性  别：</td>
 						     <td width="450">
                                    <input name="rblSex" type="radio" value="1" <?php echo $_smarty_tpl->tpl_vars['maleGender']->value;?>
 />男
                                    <input name="rblSex" type="radio" value="0" <?php echo $_smarty_tpl->tpl_vars['femaleGender']->value;?>
/>女
                             </td>
</tr>
 						 <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">所在地：
                          		<input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
                        		<input type="hidden" id="CityDistrictComareas" /></td>
  						     <td style="width: 360px;" align="left"> 
                          		   
		                        <input id="nowSelectID" type="hidden" />
		                        <div style="position: relative; z-index: 10000;" >
		                            <input type="text" id="txtCity" autocomplete="off" class="input_cs" style="width: 60px;" name="txtCity" 
		                                value="选择城市" onkeyup="SelectCity(this.value);onKey(event,'search_select');" onkeydown="SelectonKeyDown('txtCity',event,'search_select')"
		                                onclick="GetIndex();ClearInput();" /><input name="cityxl" id="cityxl" type="button" onclick="GetIndex()"
		                                    class="but_input_cs" />
		                            <div class="search_select"  id="search_select" 
		                                style="display: none; top: 30px; left: 0;">
		                                <dl id="SearchKey">
		                                </dl>
		                                <dl id="SearchValue">
		                                </dl>
		                            </div>
		                            <div id="tab_select" class="tab_select" 
		                                style="display: none; left: 0; top: 30px;">
		                                <ul class="tab" >
		                                    <li class="option2" id="d1" onmouseover="city1(1)" style="color: #FF0000">热门城市</li>
		                                    <li class="option2" id="d2" onmouseover="city1(2);GetHotCity(2,'a,b,c,d');">ABCD</li>
		                                    <li class="option2" id="d3" onmouseover="city1(3);GetHotCity(3,'f,g,h');">FGH</li>
		                                    <li class="option2" id="d4" onmouseover="city1(4);GetHotCity(4,'j,k,l,m');">JKLM</li>
		                                    <li class="option2" id="d5" onmouseover="city1(5);GetHotCity(5,'n,q,s');">NQS</li>
		                                    <li class="option2" id="d6" onmouseover="city1(6);GetHotCity(6,'t,w,x');">TWX</li>
		                                    <li class="option2" id="d7" onmouseover="city1(7);GetHotCity(7,'y,z');">YZ</li>
		                                </ul>
		                                <div id="c1" class="box1" >
		                                    <ul>
		                                    </ul>
		                                </div>
		                                <div id="c2" style="display: none;" class="box2">
		                                </div>
		                                <div id="c3" style="display: none;" class="box2">
		                                </div>
		                                <div id="c4" style="display: none;" class="box2">
		                                </div>
		                                <div id="c5" style="display: none;" class="box2">
		                                </div>
		                                <div id="c6" style="display: none;" class="box2">
		                                </div>
		                                <div id="c7" style="display: none;" class="box2">
		                                </div>
		                                <script language="javascript">city1(1)</script>
		                                <!--调用id=1的div初始页显示内容第一频道-->
		                            </div>
		                            <input type="text" id="txtDistrict" autocomplete="off" name="txtDistrict" readonly="readonly" value="选择区域"
		                                class="input_cs" style="width: 95px;"  onkeyup="onKey(event,'search_d');" onblur="ClearComareas();" onkeydown="SelectonKeyDown('txtDistrict',event,'search_d')"
		                                onclick="ShowDistrict();" /><input name="Districtxl" id="Districtxl" type="button" class="but_input_cs" onclick="ShowDistrict()" />
			                            <div class="search_select01 left133" id="search_d">
		                                <dl id="search_d_value">
		                                </dl>
		                            </div>
		                            <input type="text" class="input_cs" autocomplete="off" id="txtComareas" name="txtComareas" readonly="readonly"
		                                value="选择商圈             (商圈不能为空)" onclick="ShowComareas();" onkeyup="onKey(event,'search_c');"
		                                onkeydown="SelectonKeyDown('txtComareas',event,'search_c')" style="width: 95px;" /><input
		                                    type="button" class="but_input_cs" id="CheckCity" name="CheckCity" onclick="ShowComareas()" />
		                             <!--省，市，区域，片区下标,以"-"隔开 -->
									<input type="hidden" name="areaIndex" id="areaIndex" value="<?php echo $_smarty_tpl->tpl_vars['areaIndex']->value;?>
"/>	
		                            <div class="search_select01 left230" id="search_c" >
		                                <dl id="search_c_value">
		                                </dl>
		                            </div>
		                        </div>
                             </td>
	        </tr>
  						 <tr>
  	      				     <td width="120" height="48" align="right" valign="middle" class="f14 z3">真实姓名：</td>
   							 <td width="450" class="grzc_31">
                             	<input id="userdetailName" name="userdetailName" maxlength="6" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['realName']->value;?>
" />
                               </td>
	        </tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件类型：</td>
   							 <td width="450">
                             		<select name="cardtypeId" id="cardtypeId" class="select2">
                                	    <option value="0">请选择</option>
										<option <?php if ($_smarty_tpl->tpl_vars['cardtypeId']->value==1){?>selected="selected"<?php }?> value="1">身份证</option>
										<option <?php if ($_smarty_tpl->tpl_vars['cardtypeId']->value==2){?>selected="selected"<?php }?> value="2">工作证</option>
										<option <?php if ($_smarty_tpl->tpl_vars['cardtypeId']->value==3){?>selected="selected"<?php }?> value="3">军官证</option>
										<option <?php if ($_smarty_tpl->tpl_vars['cardtypeId']->value==4){?>selected="selected"<?php }?> value="4">学生证</option>
          				    		 </select>
                              </td>
		    </tr>
 						 <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件号码：</td>
 							  <td width="450" class="grzc_31"><input id="IDCode" name="IDCode" type="text" value="<?php echo $_smarty_tpl->tpl_vars['IDCode']->value;?>
" onblur="chkEmpty('IDCode','请填写证件号码')" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
 							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系地址：</td>
  							  <td width="450" class="grzc_31"><input id="contactAddr" name="contactAddr" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['contactAddr']->value;?>
" onblur="chkEmpty('contactAddr','请填写联系地址')" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
						   <td width="120" height="48" align="right" valign="middle" class="f14 z3">邮  编：</td>
   							 <td width="450" class="grzc_31"><input id="postCode" name="postCode" type="text" maxlength="6" value="<?php echo $_smarty_tpl->tpl_vars['postCode']->value;?>
" onblur="chkNumber('postCode','邮政编码',false);" /></td>
		    </tr>
						  <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系电话：</td>
   							 <td width="450" class="grzc_31"><input id="contactPhone" name="contactPhone" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['contactPhone']->value;?>
" onblur="chkNumber('contactPhone','联系电话',true);" />&nbsp;<font class="red">*</font></td>
		    </tr>
  						 <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">QQ：</td>
   							 <td width="450" class="grzc_31"><input id="contactQQ" name="contactQQ" type="text" value="<?php echo $_smarty_tpl->tpl_vars['contactQQ']->value;?>
" onblur="chkNumber('contactQQ','QQ',false);" /></td>
		    </tr>
  						 <tr>
  								  <td width="120" height="48" align="right" valign="middle" class="f14 z3">MSN：</td>
 							   <td width="450" class="grzc_31"><input id="contactMSN" name="contactMSN" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['contactMSN']->value;?>
" /></td>
			</tr>
 						 <tr>
   								 <td width="120" height="48" align="right" valign="middle" class="f14 z3">上传靓照：</td>
   								 <td width="450">
    								<input id="userdetailPic" name="userdetailPic" type="file"  value="" /><br>
    								<?php if ($_smarty_tpl->tpl_vars['userdetailPic']->value!=''){?>
    								<img src="../uploads/agent/<?php echo $_smarty_tpl->tpl_vars['userdetailPic']->value;?>
" style="padding-bottom:5px; height:128px; margin-left:-10px;">
    								<?php }?>
                                  </td>
		    </tr>
 						 <tr>
 								   <td height="45" colspan="2">
<div class="dlmm1">
                                        	<input name="btn_confirm" type="button" class="denglu1 l" id="btn_confirm" value="立即注册" />
                                            <input name="btn_reset" type="reset" class="denglu1 l" id="btn_reset" value="重置" />
                                            <input name="actionType" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['actionType']->value;?>
"/>
                                        </div>
                                   </td>
		    </tr>
				  </table>
				  </form>

              </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
<?php echo $_smarty_tpl->tpl_vars['operation_msg']->value;?>

</script>
<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>