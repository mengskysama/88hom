<?php /* Smarty version Smarty-3.1.8, created on 2013-07-28 15:59:56
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314785183bb739b9338-21159143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95add166d95723005b362f1f114ae0b867043f80' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\index.tpl',
      1 => 1374992792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314785183bb739b9338-21159143',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5183bb73bb91d5_45952680',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'con_class' => 0,
    'lcon_class' => 0,
    'dl_class' => 0,
    'dl_1_class' => 0,
    'login_title' => 0,
    'userType' => 0,
    'regFormAction' => 0,
    'invalidAcc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183bb73bb91d5_45952680')) {function content_5183bb73bb91d5_45952680($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>登录页面</title>

<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
	
	$("#loginID").focus(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "手机号/邮箱/用户名码") {
			$(this).val("");
		}     
    });
    
	$("#loginID").blur(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "") {
			$(this).val("手机号/邮箱/用户名码");
		}     
    });
    
	$("#button2").click(function() {      
        var $inputTextVal = $(this).val();
		if($inputTextVal == "") {
			$(this).val("手机号/邮箱/用户名码");
		}     
    });
    
});
function check_input() {
	if($("#loginID").val() == "") {
		alert("请填写账户名！");
        $("#loginID").focus();
        return false;
	}
    if($("#loginID").val() == "手机号/邮箱/用户名码") {
		alert("请填写正确的账户名！");
 		$("#loginID").val("");
		$("#loginPWD").val("");
		$("#loginID").focus();
		return false;
	}
	if($("#loginPWD").val() == "") {
		alert("请填写密码！");
		$("#loginPWD").focus();
 		return false;
	}
    return true;
}      

function addFav(){
	
    if (document.all){  
        try{  
            window.external.addFavorite('http://test.88hom.com/ucenter','通行证 - 房不剩房');  
        }catch(e){  
            alert( "加入收藏失败，请使用Ctrl+D进行添加" );  
        }  
          
    }else if (window.sidebar){  
        window.sidebar.addPanel('通行证 - 房不剩房','http://test.88hom.com/ucenter', "");  
     }else{  
        alert( "加入收藏失败，请使用Ctrl+D进行添加" );  
    }  
}

function setHomepage(){  
    if (document.all){  
        document.body.style.behavior='url(#default#homepage)';  
		document.body.setHomePage(window.location.href);  
    }else if (window.sidebar){  
        if(window.netscape){  
            try{  
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
            }catch (e){  
                alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );  
            }  
        }  
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);  
        prefs.setCharPref('browser.startup.homepage',window.location.href);  
    }else{  
        alert('您的浏览器不支持自动自动设置首页, 请使用浏览器菜单手动设置!');  
    }  
}  


</script>
</head>

<body>
<!--头部-->
<div class="top">
    <a href="http://www.88hom.com" class="logo1"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/logo.jpg"></a>
    <span class="headerNav">
    <a style="cursor:pointer" onclick="addFav();" title="加入收藏夹">收藏</a> | <a style="cursor:pointer" onclick="setHomepage();" title="设为首页">设为首页</a> | <a href="#">官方微博</a>
    </span>
</div>
<!--中间登录部分-->
<div class="<?php echo $_smarty_tpl->tpl_vars['con_class']->value;?>
">
	<!--banner图-->
	<div class="<?php echo $_smarty_tpl->tpl_vars['lcon_class']->value;?>
">
   		<!--登录部分-->
    	<div class="<?php echo $_smarty_tpl->tpl_vars['dl_class']->value;?>
">
        	 <div class="<?php echo $_smarty_tpl->tpl_vars['dl_1_class']->value;?>
">
             	<ul>
                	<li><a><?php echo $_smarty_tpl->tpl_vars['login_title']->value;?>
</a></li>
                	<?php if ($_smarty_tpl->tpl_vars['userType']->value==3){?>
                    	<li style="float:right"><a href="index.php?userType=2" style="font-size:12px;color:#F00; font-weight:normal; background:none; text-decoration:underline">我是经纪人</a></li>
                    <?php }?>
                </ul>
             </div>
         <div class="dlnr">
         <form name="loginForm" onsubmit="return check_input();" action="index.php" method="post">
           <input name="userType" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userType']->value;?>
">
       	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
 		   <tr>
   				 <td width="73" height="40" align="center" valign="middle" class="logo_4">账 户：</td>
   				 <td width="73" class="logo_31"><input id="loginID" name="loginID" type="text"  value="手机号/邮箱/用户名码" /></td>
 		   </tr>
 		   <tr>
 			     <td width="73" height="40" align="center" valign="middle" class="logo_4">密 码：</td>
   				 <td width="73" class="logo_31"><input id="loginPWD" name="loginPWD" type="password" value="" /></td>
 		   </tr>
 		   <tr>
   			 	 <td height="40" colspan="2" align="center" valign="middle">
                 <div class="jz"><input name="" type="checkbox" value="" class="message_t01" /><span class="message_t02">记住登录状态</span></div></td>
 	       </tr>
           <tr>
  			     <td height="40" colspan="2" valign="middle">
  		    	 <div class="dlmm"><input name="button2" type="submit" class="denglu" id="button2" value="登  录" />
     			<a href="get_password.php" class="wj f14">忘记密码？</a></div></td>
          </tr>
	      </table>
	    </form>
	<div class="load_b f14">
		<p>您还没有注册为<font class="red">房不剩房</font>用户？</p>
        <div class="zc">
        	<div class="zc_l">
        	<form name="regForm" action="<?php echo $_smarty_tpl->tpl_vars['regFormAction']->value;?>
" method="post">
        	  <input name="button" type="submit" class="zc2 b b0" id="button" value="注册" />
        	</form>
        	</div>
             <div class="zc_r">
				<a href="login_qq.php"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dl2.jpg"></a>
				<a href="login_weibo.php"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/dl3.jpg"></a>
        	</div>
        </div>
	</div>
         </div>
        </div>
    S</div>
</div>
<!--底部-->
<div class="bottom">
    	<span class="bot_l">@2013 <font color="#a0141a">房不剩房</font> 天境文化传播有限公司 <br />粤ICP证编号 B2-20130308 | 技术支持：<a href="#">城旭网络</a></span>
        <span class="bot_r"><a href="#">新房</a> | <a href="#">二手房</a> | <a href="#">家居</a> | <a href="#">社区</a> | <a href="#">关于我们</a> | <a href="#">法律条款</a> | <a href="#">广告投放</a> | <a href="#">网站地图</a><br />投诉电话：400-8888-666</span>
    </div>
<script type="text/javascript">
<?php echo $_smarty_tpl->tpl_vars['invalidAcc']->value;?>

function bookmarkit(){window.external.addFavorite('http://localhost/88hom/ucenter/','用户中心-天境')}
</script>
</body>
</html>
<?php }} ?>