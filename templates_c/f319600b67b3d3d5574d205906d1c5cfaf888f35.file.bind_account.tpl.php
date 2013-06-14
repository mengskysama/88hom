<?php /* Smarty version Smarty-3.1.8, created on 2013-06-14 17:45:15
         compiled from "E:/workspace/projects/88hom/templates\ucenter\bind_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:561951bad13011c185-63996355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f319600b67b3d3d5574d205906d1c5cfaf888f35' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\bind_account.tpl',
      1 => 1371203112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '561951bad13011c185-63996355',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51bad1301db235_78843774',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'login_channel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bad1301db235_78843774')) {function content_51bad1301db235_78843774($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>用户登录</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
 
//id1是tab的开头,id2是content的开头,index是当前的位置,count是总的tab个数,classname没选中tab的样式
///交换样式
var $=function(id) {
   return document.getElementById(id);
}
function show_menuc(type){
	if(type=="login"){
		$("acc_2").style.display="none";	
	    $("acc_1").style.display="block";         
	}else{
	    $("acc_1").style.display="none";
	    $("acc_2").style.display="block";   
		$("reg_mobile").checked=true;
	}
}

function radio_check(type) {
    if (type == "email") {
        document.getElementById("acc_2_email").style.display = "block";
        document.getElementById("acc_2_mobile").style.display = "none";
        //$("#acc_2_email").attr("checked", "checked");
    }else {
        document.getElementById("acc_2_email").style.display = "none";
        document.getElementById("acc_2_mobile").style.display = "block";
        //$("#acc_2_mobile").attr("checked", "checked");
    }
}
</script>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="gr_zj">
	<div class="gr_b">
    	<div class="gr_dl">
        	<div class="dl_tb">
				<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/QQbd.jpg" width="79" class="l">  
            	<span class="dl_wz r">亲爱的，您已经用<?php echo $_smarty_tpl->tpl_vars['login_channel']->value;?>
账号成功登陆了房不剩房<br /><br />还差一步，就可以畅游房不剩房网营了！ 赶快简单设置一下吧！加油！</span>      
        	</div>
			<ul class="dlqh">
            	<li class="sjzc2"><a onmouseover="show_menuc('login')">已有账号马上绑定</a></li>
                <li class="yxzc2"><a onmouseover="show_menuc('other')">没有账号马上设置</a></li>
            </ul>
            <div class="sjzc1" id="acc_1">  
            <form name="loginFrm" id="loginFrm" action="" method="post">          
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
  						  <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>账户：</td>
  						  <td height="30" class="grzc_31">
                          	<input name="" type="text"  value="" />
                          </td>
		  			</tr>
            		<tr> 
                          <td width="105" height="35"></td>
  						  <td height="35" valign="top">
                          	<p class="z6">&nbsp;</p>
                          </td>
		  			</tr>
 					<tr>
 						 <td width="105" height="30" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>密码：</td>
					     <td height="30"class="grzc_31"><input name="" type="text"  value="" /></td>
		  			</tr>
          				 <td width="105" height="35"></td>
  						  <td height="35" valign="top">
                          	<p class="z6"><font class="red" style="text-decoration:underline">忘记密码？</font></p>
                         </td>
  					
 					<tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input name="button2" type="submit" class="denglu" id="button2" value="提交" /></div>
                           </td>
	      			</tr>
			  	</table>
			</form>
          	</div>
            <div class="sjzc1" id="acc_2" style="display:none">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
		            <tr>
				      <td width="105" height="40" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>设置方式：</td>
					    <td height="40" align="left" valign="middle" class="f14">
		               	  <label><input id="reg_mobile" name="reg_acc" type="radio" value="手机设置" checked="checked" onclick="radio_check('mobile')" />手机设置 </label>     
		      				<label> <input id="reg_email" name="reg_acc" type="radio" value="邮箱设置" onclick="radio_check('email')" /> 邮箱设置  </label>   
		              </td>
			      	</tr>
			      	<div id="acc_2_mobile">
		          	<tr>
					    <td width="105" height="40" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机号：</td>
					    <td height="40">
		                   	<input name="" type="text" class="sjh"  value=""/>
		                    <input name="button2" type="submit" class="hq b0" id="button2" value="" />
		                </td>
				  	</tr>
 					<tr>
  					    <td width="105" height="70" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>手机验证码：</td>
   					    <td height="70">
                       	  <input name="" type="text" class="sjyz"  value=""/>
                            <span class="yzm z6">若1分钟后仍未收到验证码短信，<a href="#">请点此重发</a><br /> 若无法收到验证短信，请使用<a href="#">电子邮箱注册</a></span>
                        </td>
		  			</tr>
		  			</div>
			      	<div id="acc_2_email" style="display:none">
		            <tr>
					    <td width="105" height="40" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>邮箱地址：</td>
					    <td height="40" class="grzc_31">
		                   	<input name="" type="text" class="sjh"  value=""/>
		                    
		                </td>
				  	</tr>
		 			<tr>
						<td width="105" height="70" align="right" valign="middle" class="z14"><font class="red">*&nbsp;</font>验证码：</td>
		   				<td height="70">
		                       	  <input name="" type="text" class="sjyz"  value=""/>
		                            <span class="yzm"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/test/yzm.JPG"></span>
		                </td>
				  	</tr>
		  			</div>
				  			
					<tr>
  						  <td height="30" colspan="2" align="right" valign="middle">
                          <div class="zcjz"><input name="" type="checkbox" value="" class="message_t01" /><span class="message_t02">同意"<a href="#">服务条款</a>"和"<a href="#">隐私权相关政策</a>"</span></div>
                          </td>
		  			</tr>
 					<tr>
 						   <td height="55" colspan="2" align="right" valign="middle" class="z14">
                           		<div class="dlmm"><input name="button2" type="submit" class="denglu" id="button2" value="立即注册" /></div>
                           </td>
	      			</tr>
			  	</table>
          	</div>
          	
        </div>
    </div>
</div>
<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>