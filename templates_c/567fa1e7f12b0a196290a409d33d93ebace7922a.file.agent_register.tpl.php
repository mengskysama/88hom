<?php /* Smarty version Smarty-3.1.8, created on 2013-06-07 12:33:14
         compiled from "E:/workspace/projects/88hom/templates\ucenter\agent_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344651a725e519fe95-41879250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '567fa1e7f12b0a196290a409d33d93ebace7922a' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\agent_register.tpl',
      1 => 1370579591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344651a725e519fe95-41879250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a725e5204ef2_57079531',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a725e5204ef2_57079531')) {function content_51a725e5204ef2_57079531($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>经纪人注册</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<form id="agentRegForm" action="register.php" method="post">
<input type="hidden" name="userType" value="2">
<div class="md_zj">
	<div class="jjr_zj1">
	  <div class="md_dl">
       	  <h3>经纪人注册</h3>
             <div class="other" id="div_err_msg">
               <div class="">
               </div>
             </div>
            <div class="mdzc">
           	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 					 <tr>
 						   <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>账 户：</td>
 						   <td height="30" colspan="2" class="grzc_31">
                           <input id="userName" name="userName" type="text" onclick="if(this.value=='建议用手机号码注册'){this.value='';}"  value="建议用手机号码注册" />
          				   </td>
 					 </tr>
   					 <tr> 
                          <td width="140" height="30"></td>
  						  <td height="30" colspan="2" valign="top">
                          	<p class="z6">6~18个字符，可使用字母、数字、下划线，需以字母开头</p>
           				  </td>
				    </tr>
 				    <tr>
  						  <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>密 码：</td>
 						  <td height="30" colspan="2"class="grzc_31"><input id="userPassword" name="userPassword" type="password"  value="" /></td>
				    </tr>
  					<tr>
   						  <td width="140" height="30"></td>
  						  <td height="30" colspan="2" valign="top">
                          	<p class="z6">6~16个字符，区分大小写</p>
          				  </td>
  					 </tr>
  				     <tr>
  						  <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>确认密码：</td>
 						  <td height="30" colspan="2" class="grzc_31"><input id="confirmUserPass" name="confirmUserPass" type="password"  value="" /></td>
 					</tr>
 					<tr>
   						  <td width="140" height="30"></td>
		  				  <td height="30" colspan="2" valign="top">
           				  <p class="z6">请再次填写密码</p>
            			  </td>
					</tr>
 					<tr>
   						 <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>真实姓名：</td>
  						 <td colspan="2" class="grzc_31"><input name="userRealName" id="userRealName" type="text" maxlength="5" value="" /></td>
  					</tr>
  					<tr>
   						 <td width="140" height="30"></td>
					     <td height="30" colspan="2" valign="top">
     			      	  <p class="z6">请输入真实姓名，让网友更方便找到你。最多为5个中文字。</p>
       				     </td>
 					</tr>
   					<tr>
 						 <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>所在地区：<input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," /></td>
  						 <td colspan="2">
    						 
		                    <th style="width: 360px;" align="left">
		                        <input id="nowSelectID" type="hidden" />
		                        <div style="position: relative; z-index: 10000;">
		                            <input type="text" id="txtCity" autocomplete="off" class="input_cs" style="width: 60px;" name="txtCity"
		                                value="选择城市" onkeyup="SelectCity(this.value);onKey(event,'search_select');" onkeydown="SelectonKeyDown('txtCity',event,'search_select')"
		                                onclick="GetIndex();ClearInput();" /><input name="cityxl" id="cityxl" type="button" onclick="GetIndex()"
		                                    class="but_input_cs" />
		                            <div class="search_select" onmouseout="hideMsgBox(event,'search_select')" id="search_select"
		                                style="display: none; top: 30px; left: 0;">
		                                <dl id="SearchKey">
		                                </dl>
		                                <dl id="SearchValue">
		                                </dl>
		                            </div>
		                            <div id="tab_select" class="tab_select" onmouseout="hideMsgBox(event,'tab_select')"
		                                style="display: none; left: 0; top: 30px;">
		                                <ul class="tab">
		                                    <li class="option2" id="d1" onmouseover="city1(1)" style="color: #FF0000">热门城市</li>
		                                    <li class="option2" id="d2" onmouseover="city1(2);GetHotCity(2,'a,b,c,d');">ABCD</li>
		                                    <li class="option2" id="d3" onmouseover="city1(3);GetHotCity(3,'f,g,h');">FGH</li>
		                                    <li class="option2" id="d4" onmouseover="city1(4);GetHotCity(4,'j,k,l,m');">JKLM</li>
		                                    <li class="option2" id="d5" onmouseover="city1(5);GetHotCity(5,'n,q,s');">NQS</li>
		                                    <li class="option2" id="d6" onmouseover="city1(6);GetHotCity(6,'t,w,x');">TWX</li>
		                                    <li class="option2" id="d7" onmouseover="city1(7);GetHotCity(7,'y,z');">YZ</li>
		                                </ul>
		                                <div id="c1" class="box1">
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
		                            <div class="search_select01 left230" id="search_c" >
		                                <dl id="search_c_value">
		                                </dl>
		                            </div>
		                        </div>
		                    </th>
   						 </td>
 					 </tr>
					 <tr>
  					     <td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>联系电话：</td>
    					 <td width="81" valign="middle"> 
    						<select name="ddlPhoneType" id="ddlPhoneType" class="select2">
 						    <option selected="selected" value="1">手机号</option>
 						    <option value="2">小灵通</option> 						    
   							</select></td>
    					 <td width="283" valign="middle"><input id="txtUserPhone" name="txtUserPhone" type="text" value="" class="inp01"/></td>
 					 </tr>
 					 <tr>
     						<td width="140" height="30"></td>
						    <td height="30" colspan="2" valign="top">
        					   	  <p class="z6"></p>
       					    </td>
 					 </tr>
  					 <tr>
   							<td width="140" height="35" align="right" valign="middle" class="f14 z3">办公电话：</td>
   							<td colspan="2" class="grzc_31"><input name="userTel" id="userTel" type="text"  value="" /></td>
 					 </tr>
 					 <tr>
  							<td width="140" height="30"></td>
		 					<td height="30" colspan="2" valign="top">
           	 				 <p class="z6">办公电话格式：区号-总机号码-分机号。如：0755-8888 9999-101</p>
          					</td>
 					</tr>
 					<tr>
   							<td width="140" height="35" align="right" valign="middle" class="f14 z3"><font class="red">*&nbsp;</font>邮 箱：</td>
    						<td colspan="2" class="grzc_31"><input name="userEmail" id="userEmail" type="text"  value="" /></td>
 					</tr>
 					<tr>
   							 <td height="30" colspan="3" align="right" valign="middle">
  							 <div class="zcjz"><input id="agree_ucenter" name="agree_ucenter" type="checkbox" class="message_t01" value="yes" checked/><span class="message_t02">同意"<a href="#">服务条款</a>"和"<a href="#">隐私权相关政策</a>"</span></div>
  				   			 </td>
   					</tr>
  					<tr>
 						   <td height="55" colspan="3" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input name="agent_reg_confirm" id="agent_reg_confirm" type="button" class="mddl" value="立即注册" /></div>
                           </td>
	    		  </tr>
	</table>

        </div>
      </div>
	</div>
</div>
</form>
<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>