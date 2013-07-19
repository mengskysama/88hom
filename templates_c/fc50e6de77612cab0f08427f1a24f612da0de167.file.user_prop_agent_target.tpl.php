<?php /* Smarty version Smarty-3.1.8, created on 2013-07-19 12:02:09
         compiled from "E:/workspace/projects/88hom/templates\ucenter\user_prop_agent_target.tpl" */ ?>
<?php /*%%SmartyHeaderCode:740651e8ba11574a56-58038933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc50e6de77612cab0f08427f1a24f612da0de167' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\user_prop_agent_target.tpl',
      1 => 1374206525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '740651e8ba11574a56-58038933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e8ba11790529_34740735',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'txType' => 0,
    'propId' => 0,
    'companyList' => 0,
    'item' => 0,
    'companyId' => 0,
    'districtList' => 0,
    'key' => 0,
    'districtId' => 0,
    'agentName' => 0,
    'agentList' => 0,
    'areaList' => 0,
    'pagination' => 0,
    'destNo' => 0,
    'pageNo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8ba11790529_34740735')) {function content_51e8ba11790529_34740735($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>委托房源</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--求购头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header_ucenter_user']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--求购内容-->
<div class="qg_main">
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ucenter_user_left_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="qg_r">
    	<p>你的位置： 我的房不剩房 > 
    	<?php if ($_smarty_tpl->tpl_vars['txType']->value==1){?>		
    	<a href="user_sale.php">我要出售</a> > 委托出售房源</p>
		<?php }else{ ?>
    	<a href="user_sale.php">我要出租</a> > 委托出租房源</p>
		<?php }?>
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_32.jpg">我要委托</b>
             <div class="qgxq44"><span>1.填写委托信</span><span style="color:#FFF">2.选择经纪人</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b>你可以在线委托多个经纪人，请点“立即委托”</b></p>
          <form id="searchAgentFrm" name="searchAgentFrm" action="user_prop_agent_target.php?propId=<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
&txType=<?php echo $_smarty_tpl->tpl_vars['txType']->value;?>
" method="post">
          <div class="xxjj">
          <input type="hidden" id="propId" name="propId" value="<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
"/>
          	<table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="125" height="40" align="center" valign="middle">
			    	<select name="company" id="company" class="select2" onchange="gotolink(52)">			    	
			            <option value="0">选择中介公司</option>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['companyList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['imcpId']==$_smarty_tpl->tpl_vars['companyId']->value){?>
			            <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['imcpId'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['imcpName'];?>
</option>
			        <?php }else{ ?>
			        	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['imcpId'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['imcpName'];?>
</option>
			        <?php }?>
				<?php } ?>
			        </select>
			        </td>
			    <td width="125" align="center" valign="middle">
			    <select name="district" id="district" class="select2" onchange="gotolink(52)">
					<option value="-1">选择区域</option>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['districtList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['districtId']->value){?>
			            <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
			        <?php }elseif($_smarty_tpl->tpl_vars['item']->value!="不限"){?>
			        	<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
			        <?php }?>
				<?php } ?>
			    </select></td>
			    <td width="220" align="center" valign="middle" class="grzc_37">
			    	<?php if ($_smarty_tpl->tpl_vars['agentName']->value==''){?>
			    	<input id="agentName" name="agentName" type="text"  value="搜索经纪人" onfocus="resetEstName()" onblur="resetEstName()"/>
			        <?php }else{ ?>
			    	<input id="agentName" name="agentName" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['agentName']->value;?>
" />
			        <?php }?>
			    </td>
			    <td width="164" align="left" valign="middle">
			    	<input name="btn_search" type="button" class="mddl3" id="btn_search" onclick="gotolink(52)" value="查询" />
			    </td>
			  </tr>
			</table>
          </div>
          <div class="qgbg_1">
       		<table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#f7f6f1"><strong>经纪人基本信息</strong></td>
			    <td width="147" align="center" valign="middle" bgcolor="#f7f6f1"><strong>资质/等级</strong></td>
			    <td width="138" align="center" valign="middle" bgcolor="#f7f6f1"><strong>联系方式</strong></td>
			    <td width="98" align="center" valign="middle" bgcolor="#f7f6f1"><strong>在线委托</strong></td>
			  </tr>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agentList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			  <tr>
			    <td width="159" height="150" align="center" valign="middle" class="bor"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['userdetailPicThumb'];?>
" class="imgs" /></td>
			    <td width="203" align="left" valign="middle" class="bor pj">
			    	<b><?php echo $_smarty_tpl->tpl_vars['item']->value['userdetailName'];?>
</b>
			        <p>所属公司： <?php echo $_smarty_tpl->tpl_vars['item']->value['userdetailImcpName'];?>
</p>
			        <p>所在区域：  <?php echo $_smarty_tpl->tpl_vars['districtList']->value[$_smarty_tpl->tpl_vars['item']->value['userdetailDistrict']];?>
 - <?php echo $_smarty_tpl->tpl_vars['areaList']->value[$_smarty_tpl->tpl_vars['item']->value['userdetailDistrict']][$_smarty_tpl->tpl_vars['item']->value['userdetailArea']];?>
</p>
			        <a href="#">大家对我的评价</a>
			    </td>
			    <td align="center" valign="middle" class="bor pj">
			    <?php if ($_smarty_tpl->tpl_vars['item']->value['userdetailCredState']==1){?>
			    <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/zy.gif" width="25">
			    <?php }?>
			    <?php if ($_smarty_tpl->tpl_vars['item']->value['userdetailIdCardState']==1){?>
			    <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/sf.gif" width="25">
			    <?php }?>
			    <?php if ($_smarty_tpl->tpl_vars['item']->value['userdetailCardState']==1){?>
			    <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/mp.gif" width="25">
			    <?php }?>
			    </td>
			    <td align="center" valign="middle" class="bor"><strong class="f14 red"><?php echo $_smarty_tpl->tpl_vars['item']->value['userPhone'];?>
</strong></font></td>
			    <td align="center" valign="middle" class="bor">
			    
			    <?php if ($_smarty_tpl->tpl_vars['item']->value['isAgent']>0){?>
			    <a class="yz1">已委托</a>
			    <?php }else{ ?>
			    <a id="a_agent_<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
" href="javascript:void(0)" onclick="toagent('<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
')" class="yz1">立即委托</a>
			    <?php }?>
			    </td>
			  </tr>
			<?php } ?>
			</table>

		  </div>
		  <div class="page"><?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
&nbsp;到第<input type="text" id="destNo" name="destNo" value="<?php echo $_smarty_tpl->tpl_vars['destNo']->value;?>
"/>页 <a href="javascript:void(0)" onclick="gotolink(51)" class="next">确定</a>
		  </div>
        <input type="hidden" id="pageNo" name="pageNo" value="<?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
"/>
		</form>
        </div>
             
        </div>
    </div>

<script type="text/javascript">
	function gotolink(id){
		if(id == 51){
			$("#pageNo").val($("#destNo").val());
		}
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}
			
		$("#searchAgentFrm").submit();		
	}
	
	function gotopage(id){
		$("#pageNo").val(id);
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}
		$("#searchAgentFrm").submit();
	}
	function resetEstName(){
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}else if(jQuery.trim($("#agentName").val()) == ""){
			$("#agentName").val("搜索经纪人");
		}
	}
	function searchAgent(){
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人" || jQuery.trim($("#agentName").val()) == ""){
			alert("请填写经纪人名字");
			return false;
		}
		$("#destNo").val("");
		$("#pageNo").val("");
		$("#searchAgentFrm").submit();		
	}
	function toagent(agentId){
		var option={action:"toAgent",propId:$("#propId").val(),agentId:agentId};
        $.ajax({
                    url:"prop_agent_handler.php",
                    dataType:"json",
                    data:option,
                    type:"post",
                    success:function(msg){
                        if(msg.result=="success"){
                            alert("委托成功!");
                            $("#a_agent_"+agentId).html("已委托");
                        }else if(msg.result=="agented"){
                            alert("已委托，无需再委托!");
                        }else{
                            alert("委托失败，请重试!");
                        }
                    },
                    error:function(){
                        alert("委托失败，请重试!");
                    }
		})
	}
</script>
<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>