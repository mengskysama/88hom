<?php /* Smarty version Smarty-3.1.8, created on 2013-05-08 15:20:55
         compiled from "E:/workspace/projects/88hom/templates\ucenter\userinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268025189e9ba8dc2e9-62378949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a07f87c4baa3c930d0da5e02f9dd890d9a2d4316' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\userinfo.tpl',
      1 => 1367997316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268025189e9ba8dc2e9-62378949',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5189e9ba93c147_67500491',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5189e9ba93c147_67500491')) {function content_5189e9ba93c147_67500491($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人注册页面</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<div class="gr_top">
	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/grzc_03.jpg" />
    <span><a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a></span>
</div>
<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
    	<div class="zl_b1">
         <div class="zl_b11">
        	<div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="#">用户中心</a></li>
	          <li><a href="#">安全中心</a></li>
	          <li><a href="#">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
            <div class="zl_nr">
            	<div class="zl_l">
                	<span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font></span>
<ul class="zlfl">
                    	<li><a href="#">个人资料修改</a></li>
                    </ul>
                </div>
                <div class="zl_r">
<table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">用户名：</td>
  							  <td width="450" class="f14 z3">三国无双乱舞</td>
</tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">性  别：</td>
 						     <td width="450">
                                    <input name="rblSex" type="radio" value="先生" checked="checked" />先生
                                    <input name="rblSex" type="radio" value="女士" />女士
                             </td>
</tr>
 						 <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">所在地：</td>
  						     <td width="450"> 
                          		   <select id="strProvince" name="strProvince" class="select2">
                                	    <option selected="selected" value="0">请选择省</option>
          				    		 </select>
                            		 <select id="strCity" name="strCity" class="select2">
                                	    <option selected="selected" value="0">请选择市</option>
                             		</select>
                             		<select id="strDistrict" name="strDistrict" class="select2">
                            			 <option selected="selected" value="0">请选择县</option>
    
  									 </select>
  									 
                                     <script language="javascript" type ="text/javascript"  src="/88hom/templates/js/city.js"></script>
                                     <script language="javascript" type ="text/javascript"  src="/88hom/templates/js/Fun.js"></script>
                                     <script language="javascript"  type ="text/javascript" >
                                     <!--

                                        OP=$('strProvince');
                                     	OC=$('strCity');
                                    	OD=$('strDistrict');
                                     	FullP(OP);
                                    	OP.value="广东";
                                    	FullC(OC,OD,"广东")
                                    	OC.value="深圳";
                                   		FullD(OD,"深圳")
                                   		OD.value="罗湖";
                                        //obj1.add(new Option(C[m][i],C[m][i]));
                                      -->
                                      </script>
  									 
                             </td>
	        </tr>
  						 <tr>
  	      				     <td width="120" height="48" align="right" valign="middle" class="f14 z3">真实姓名：</td>
   							 <td width="450" class="grzc_31">
                             	<input name="" type="text"  value="" />
                               </td>
	        </tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件类型：</td>
   							 <td width="450">
                             		<select name="ddlProv" id="ddlProv" class="select2">
                                	    <option selected="selected" value="0">请选择</option>
          				    		 </select>
                              </td>
		    </tr>
 						 <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件号码：</td>
 							  <td width="450" class="grzc_31"><input name="" type="text"  value="" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
 							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系地址：</td>
  							  <td width="450" class="grzc_31"><input name="" type="text"  value="" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
						   <td width="120" height="48" align="right" valign="middle" class="f14 z3">邮  编：</td>
   							 <td width="450" class="grzc_31"><input name="" type="text"  value="" /></td>
		    </tr>
						  <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系电话：</td>
   							 <td width="450" class="grzc_31"><input name="" type="text"  value="" />&nbsp;<font class="red">*</font></td>
		    </tr>
  						 <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">QQ：</td>
   							 <td width="450" class="grzc_31"><input name="" type="text"  value="" /></td>
		    </tr>
  						 <tr>
  								  <td width="120" height="48" align="right" valign="middle" class="f14 z3">MSN：</td>
 							   <td width="450" class="grzc_31"><input name="" type="text"  value="" /></td>
			</tr>
 						 <tr>
   								 <td width="120" height="48" align="right" valign="middle" class="f14 z3">上传靓照：</td>
   								 <td width="450" >
                                    <input class="form" type="file" size="45">
                                    <input class="form" type="submit" value="上传">
                                  </td>
		    </tr>
 						 <tr>
 								   <td height="45" colspan="2">
<div class="dlmm1">
                                        	<input name="button2" type="submit" class="denglu1 l" id="button2" value="立即注册" />
                                            <input name="button2" type="submit" class="denglu1 l" id="button2" value="重置" />
                                        </div>
                                   </td>
		    </tr>
				  </table>

              </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!--底部-->
<div class="gr_bot">
	<div class="gr_bot1">
		<div class="c">
					<div class="c1">
						<a href="#">今日头条</a>
						<a href="#">楼市要闻</a><br/>
						<a href="#">政策解读</a>
						<a href="#">行情数据</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">最新开盘</a>
						<a href="#">热门楼盘</a><br/>
						<a href="#">优惠团购</a>
						<a href="#">地图看房</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
                    <div class="s"></div>
					<div class="c3">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
					<div class="s"></div>
					<div class="c4">
						<a href="#">业主论坛</a>
						<a href="#">论坛热贴</a><br/>
						<a href="#">人气板块</a>
					</div>
				</div>
             <div class="gr_bot2">
             广告投放：0755-88886666  投诉邮箱：tousu@tianyue.com  投诉电话：400-6666-888<br/>
				版权所有2013-2016 房不剩房 天境文化传播有限公司 备粤10110011号 
             </div>
		</div>
	</div>
</body>
</html>
<?php }} ?>