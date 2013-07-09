<?php /* Smarty version Smarty-3.1.8, created on 2013-07-09 23:53:25
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_sale_prop_agent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2947251dc2233f17266-14946463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44da08cce42e53525db722d5b45201397b91aa7e' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_sale_prop_agent.tpl',
      1 => 1373385202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2947251dc2233f17266-14946463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51dc2234097635_06201311',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dc2234097635_06201311')) {function content_51dc2234097635_06201311($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>委托出售房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script>
$(function() {    
    $("#estName").autocomplete({
      source: "ajax_get_prop_name.php",
      select: function(e, ui) {
      	  $("#estId").val(ui.item.id);    
      }
    });
});

function sendVcode() {
    $("#btn_get_code").attr("disabled", true);
    var mobile = $("#contactMobile").val();
    if(trim(mobile) == ""){
    	alert("请填写手机号码");
    	$("#btn_get_code").attr("disabled", false);
    	return;
    }
    jQuery.ajax({
        type: "post",
        url: "get_cert_code.php",
        data: { "userPhone": mobile },
        success: function(req) {
        	alert(req);
            if (req == "200") {
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
        }else {
            btn.attr("disabled", true);
            btn.val("" + (time--) + "秒后点击重新发送");
        }
    }, 1000);
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
             <div class="qgxq3"><span style="color:#FFF">1.填写委托信</span><a href="user_sale_prop_agent_target.php"><span>2.选择中介网店</span></a><a href="user_sale_prop_agent_success.php"><span>3.委托发布成功</span></a></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b class="z14">基本资料</b><font class="red">*</font>为必填项</p>
          <div class="qgbg">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
           <tr>
    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;房源名称</td>
     <td valign="middle" class="grzc_33 p5"><input type="hidden" id="estId" name="estId"/><input id="estName" name="estName" type="text" maxlength="50" onkeyup="textCounter(document.getElementById('estName'),document.getElementById('estNameAlert'),25);" /> 还可写<span id="estNameAlert"><font class="red">25</font></span>个汉字 </td>
  </tr>
  <tr>
    <td width="120" height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;目标总价</td>
    <td valign="middle" class="grzc_33 p5"><input id="propPrice" name="propPrice" type="text" onblur="CheckPrice('propPrice',true,'CS');" /> 万元</td>
    
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
    <td width="175" class="grzc_33 p5"><input name="contactName" id="contactName" type="text"  value="" /> </td>
    <td> 
    	<input name="contactGender" type="radio" value="1" checked="checked" />先生
        <input name="contactGender" type="radio" value="0" />女士</td>
  </tr>
  <tr>
    <td height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14" ><font class="red">*</font>手机号码</td>
    <td width="175" class="grzc_33 p5"><input id="contactMobile" name="contactMobile" type="text"  value="" /> </td>
    <td>（通过认证才能发布房源）</td>
  </tr>
  <tr>
    <td height="42" align="center" valign="middle" bgcolor="#f7f6f1" class="z14" ><font class="red">*</font> 验 证 码</td>
    <td width="175" class="grzc_33 p5"><input id="certcode" name="certcode" type="text"  value="" /> </td>
    <td><input id="btn_get_code" name="btn_get_code" type="button" class="yz l" value="免费获取验证码" onclick="sendVcode()" /></td>
  </tr>
  <tr>
    <td height="100" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="z14" >&nbsp;</td>
    <td><input name="btn_next" type="button" class="denglu1 l" id="btn_next" value="下一步" /></td>
  </tr>
</table>
		</div>
        </div>
        </div>
             
        </div>
    </div>

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>