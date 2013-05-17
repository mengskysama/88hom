<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>个人注册页面</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
    	<div class="zl_b1">
         <div class="zl_b11">
        	<div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="userinfo.php">用户中心</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
	          <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
            <div class="zl_nr">
            	<div class="zl_l">
                	<span>您好，<font class="red"><!--{$userName}--></font></span>
<ul class="zlfl">
                    	<li><a href="userinfo.php">个人资料修改</a></li>
                    </ul>
                </div>
                <div class="zl_r">
                <form id="frm_userinfo" name="frm_userinfo" action="userinfo.php" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">用户名：</td>
  							  <td width="450" class="f14 z3"><!--{$userName}--></td>
</tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">性  别：</td>
 						     <td width="450">
                                    <input name="rblSex" type="radio" value="1" checked="checked" <!--{$femaleGender}-->/>先生
                                    <input name="rblSex" type="radio" value="0" <!--{$maleGender}-->/>女士
                             </td>
</tr>
 						 <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">所在地：</td>
  						     <td width="450"> 
                          		   <select id="ddlProvince" name="ddlProvince" class="select2">
                                	    <option selected="selected" value="0">请选择省</option>
          				    		 </select>
                            		 <select id="ddlCity" name="ddlCity" class="select2">
                                	    <option selected="selected" value="0">请选择市</option>
                             		</select>
                             		<select id="ddlDistrict" name="ddlDistrict" class="select2">
                            			 <option selected="selected" value="0">请选择县</option>
    
  									 </select>
  									 
                                     <script language="javascript" type ="text/javascript"  src="/88hom/templates/js/city.js"></script>
                                     <script language="javascript" type ="text/javascript"  src="/88hom/templates/js/Fun.js"></script>
                                     <script language="javascript"  type ="text/javascript" >
                                     <!--

                                        OP=$('ddlProvince');
                                     	OC=$('ddlCity');
                                    	OD=$('ddlDistrict');
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
                             	<input id="realName" name="realName" type="text"  value="<!--{$realName}-->" />
                               </td>
	        </tr>
 						  <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件类型：</td>
   							 <td width="450">
                             		<select name="ddlIDCode" id="ddlIDCode" class="select2">
                                	    <option selected="selected" value="0">请选择</option>
          				    		 </select>
                              </td>
		    </tr>
 						 <tr>
  							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">证件号码：</td>
 							  <td width="450" class="grzc_31"><input id="IDCode" name="IDCode" type="text" value="<!--{$IDCode}-->" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
 							  <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系地址：</td>
  							  <td width="450" class="grzc_31"><input name="contactAddr" type="text"  value="<!--{$contactAddr}-->" />&nbsp;<font class="red">*</font></td>
	        </tr>
 						 <tr>
						   <td width="120" height="48" align="right" valign="middle" class="f14 z3">邮  编：</td>
   							 <td width="450" class="grzc_31"><input name="postCode" type="text"  value="<!--{$postCode}-->" /></td>
		    </tr>
						  <tr>
  							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">联系电话：</td>
   							 <td width="450" class="grzc_31"><input id="contactPhone" name="contactPhone" type="text"  value="<!--{$contactPhone}-->" />&nbsp;<font class="red">*</font></td>
		    </tr>
  						 <tr>
   							 <td width="120" height="48" align="right" valign="middle" class="f14 z3">QQ：</td>
   							 <td width="450" class="grzc_31"><input id="contactQQ" name="contactQQ" type="text" value="<!--{$contactQQ}-->" /></td>
		    </tr>
  						 <tr>
  								  <td width="120" height="48" align="right" valign="middle" class="f14 z3">MSN：</td>
 							   <td width="450" class="grzc_31"><input id="contactMSN" name="contactMSN" type="text"  value="<!--{$contactMSN}-->" /></td>
			</tr>
 						 <tr>
   								 <td width="120" height="48" align="right" valign="middle" class="f14 z3">上传靓照：</td>
   								 <td width="450" >
                                    <input class="form" type="file" size="45">
                                    <input class="form" id="btn_upload_file" name="btn_upload_file" type="button" value="上传">
                                  </td>
		    </tr>
 						 <tr>
 								   <td height="45" colspan="2">
<div class="dlmm1">
                                        	<input name="btn_confirm" type="button" class="denglu1 l" id="btn_confirm" value="立即注册" />
                                            <input name="btn_reset" type="reset" class="denglu1 l" id="btn_reset" value="重置" />
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
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
