<?php /* Smarty version Smarty-3.1.8, created on 2013-07-19 12:44:52
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_sale_prop_agent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258451dbe469d375d3-28207828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5778fdd5a692787ba87bc75a4789316ab30a8bb9' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_sale_prop_agent.tpl',
      1 => 1374209039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258451dbe469d375d3-28207828',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51dbe469dd99f6_35838900',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userId' => 0,
    'propName' => 0,
    'propPrice' => 0,
    'err_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dbe469dd99f6_35838900')) {function content_51dbe469dd99f6_35838900($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>委托出售房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script>
var isvalidmobile = false;
var isvalidcertcode = false;
$(function() {    
    $("#estName").autocomplete({
      source: "ajax_get_prop_name.php",
      select: function(e, ui) {
      	  $("#estId").val(ui.item.id);    
      }
    });
    $("#btn_next").click(function() {
        $("#btn_next").attr("disabled", true);
        if (check()) {
            document.getElementById("agentform").submit();
        } else {
            $("#btn_next").removeAttr("disabled");
        }
    });
});
function check(){
	var estNameValue = $("#estName").val();
	if(trim(estNameValue) == ''){
		alert("请填写房源名称");
		return false;
	}
	
	if(!CheckPrice('propPrice',true,'CS')) return false;
	if(!chkEmpty('contactName','请填写联系人')) return false;
	if(!isvalidcertcode && !isvalidmobile) return false;
	return true;
}
function checkmobile(){

    var mobile = $("#contactMobile").val();
    if(trim(mobile) == ""){
    	alert("请填写手机号码");
    	return false;
    }
    
    var pat = /^1\d{10}$/;
    if (!pat.test(mobile)) {
    	alert("手机号码格式不正确");
        return false;
    }
    ajax_mobile();
    return true;
}
function sendVcode() {
    $("#btn_get_code").attr("disabled", true);
    
    var mobile = $("#contactMobile").val();
    if(!checkmobile()){
    	$("#btn_get_code").attr("disabled", false);
    	return;
    }
    	
    jQuery.ajax({
        type: "post",
        url: "get_cert_code.php",
        data: { "userPhone": mobile },
        success: function(req) {
            if (req == 200) {
            	alert("验证码已发出，请查收");
                updateTimeLabel(120);
            }else{
            	alert("验证码发出失败，请重试");
     			$("#btn_get_code").attr("disabled", false);
            }
        }
    });

}

function updateTimeLabel(time) {
    var btn = $("#btn_get_code");
    var hander = setInterval(function() {
        if (time <= 0) {
            btn.attr("disabled", false);
            btn.val("免费获取验证码");            
        }else {
            btn.attr("disabled", true);
            btn.val("" + (time--) + "秒后点击重新发送");
        }
    }, 1000);
}

function ajax_mobile() {
	
    var mobile = trim($("#contactMobile").val());
    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_mobile.php",
        data: { "userPhone": escape(mobile), "userId": escape(trim($("#userId").val())), "num": Math.random().toString() },
        success: function(req) {
            var resu = req.split("|");
            if (resu[0] == 201) {
                isvalidmobile = true;
            }else{
                alert("该手机号码还没通过验证");
            	isvalidmobile = false;
            }
        }
    });
}

function check_code() {

    var code = trim($("#certcode").val());
    if (code == "") {
        alert("请输入验证码");
        return false;
    }
    var pat = /^\d{6}$/;
    if (!pat.test(code)) {
        alert("验证码不对，重新输入下吧");
        return false;
    }

    jQuery.ajax({
        type: "post",
        async: false,
        url: "check_cert_code.php",
        data: { "type": "phone", "userPhone": escape(trim($("#contactMobile").val())), "vcode": code, "num": Math.random().toString() },
        success: function(req) {
            if (req == 200) {
                isvalidcertcode = true;
            } else {
                alert("验证码错误");
                isvalidcertcode = false;
            }
        }
    });
}

function chkEmpty(keyId,msg){
	var value = document.getElementById(keyId).value;
	if(trim(value) == ""){
		alert(msg);
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
    	<p>你的位置： 我的房不剩房 > <a href="user_sale.php">我要出售</a> > 委托出售房源</p>
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_32.jpg"> 我要出售</b>
             <div class="qgxq3"><span style="color:#FFF">1.填写委托信</span><span>2.选择经纪人</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b class="z14">基本资料</b><font class="red">*</font>为必填项</p>
          <div class="qgbg">
          <form id="agentform" name="agentform" action="prop_agent_handler.php" method="post">
          <input id="userId" name="userId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
"/>
          <input id="txType" name="txType" type="hidden" value="1"/>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
           <tr>
		    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;房源名称</td>
		     <td valign="middle" class="grzc_33 p5"><input type="hidden" id="estId" name="estId"/><input id="estName" name="estName" value="<?php echo $_smarty_tpl->tpl_vars['propName']->value;?>
" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字 </td>
		  </tr>
		  <tr>
		    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;目标总价</td>
		    <td valign="middle" class="grzc_33 p5"><input id="propPrice" name="propPrice" type="text" value="<?php echo $_smarty_tpl->tpl_vars['propPrice']->value;?>
" /> 万元</td>
		    
		  </tr>
		  <tr>
		    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14">&nbsp;留  言</td>
		    <td valign="middle" class="p5">
		      <textarea class="bdqy1" rows="7" cols="100" id="remarks" name="remarks" maxlength="200" onkeyup="textCounter(document.getElementById('remarks'),document.getElementById('remarksAlert'),200);"></textarea>
		      </td>
		  </tr>
		   <tr>
		    <td height="25">&nbsp;</td>
		    <td valign="middle">还剩<font class="red"><span id="remarksAlert">200</span></font>字，详细的自身情况描述，能让您快速地找到合适的业主。 </td>
		  </tr>
		</table>
		</div>
        <div class="qglx">
       	  <div class="qgxq4"><span class="txx">请填写您的联系方式</span><span><font class="red">*</font> 为必填项</span></div>
          <div class="wtx">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
		  <tr>
		    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14" ><font class="red">*</font> 联 系 人</td>
		    <td width="175" class="grzc_33 p5"><input name="contactName" id="contactName" maxlength="25" type="text" value=""/> </td>
		    <td> 
		    	<input name="contactGender" type="radio" value="1" checked="checked" />先生
		        <input name="contactGender" type="radio" value="0" />女士</td>
		  </tr>
		  <tr>
		    <td height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14" ><font class="red">*</font>手机号码</td>
		    <td width="175" class="grzc_33 p5"><input id="contactMobile" name="contactMobile" type="text" value="" onblur="checkmobile()"/> </td>
		    <td>（通过认证才能发布房源）</td>
		  </tr>
		  <tr>
		    <td height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14" ><font class="red">*</font> 验 证 码</td>
		    <td width="175" class="grzc_33 p5"><input id="certcode" name="certcode" type="text" value="" onblur="check_code()"/> </td>
		    <td><input id="btn_get_code" name="btn_get_code" type="button" class="yz l" value="免费获取验证码" onclick="sendVcode()" /></td>
		  </tr>
		  <tr>
		    <td height="100" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="z14" >&nbsp;</td>
		    <td><input name="btn_next" type="button" class="denglu1 l" id="btn_next" value="下一步" /></td>
		  </tr>
		</table>
		</form>
		</div>
        </div>
        </div>
             
        </div>
    </div>
<script>
<?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>

</script>
<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>