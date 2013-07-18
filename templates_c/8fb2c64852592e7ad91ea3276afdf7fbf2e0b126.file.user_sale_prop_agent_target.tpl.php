<?php /* Smarty version Smarty-3.1.8, created on 2013-07-18 23:37:14
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\user_sale_prop_agent_target.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2910751e7ea7d079401-67092163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fb2c64852592e7ad91ea3276afdf7fbf2e0b126' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\user_sale_prop_agent_target.tpl',
      1 => 1374161828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2910751e7ea7d079401-67092163',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51e7ea7d1c75a4_88392466',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'propId' => 0,
    'companyList' => 0,
    'item' => 0,
    'companyId' => 0,
    'districtList' => 0,
    'key' => 0,
    'districtId' => 0,
    'agentList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e7ea7d1c75a4_88392466')) {function content_51e7ea7d1c75a4_88392466($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>委托出售房源</title>
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
    	<p>你的位置： 我的房不剩房 > <a href="user_sale.php">我要出售</a> > 委托出售房源</p>
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_32.jpg">我要求购</b>
             <div class="qgxq44"><span>1.填写委托信</span><span style="color:#FFF">2.选择经纪人</span><span>3.委托发布成功</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b>你可以在线委托多个经纪人，请点“立即委托”</b></p>
          <div class="xxjj">
          <form id="searchAgentFrm" name="searchAgentFrm" action="user_sale_prop_agent_target.php" method="post">
          <input type="hidden" id="propId" name="propId" value="<?php echo $_smarty_tpl->tpl_vars['propId']->value;?>
"/>
          	<table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="125" height="40" align="center" valign="middle">
			    	<select name="company" id="company" class="select2">			    	
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
			    <select name="district" id="district" class="select2">
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
			    	<input id="agentName" name="agentName" type="text"  value="搜索经纪人" />
			    </td>
			    <td width="164" align="left" valign="middle">
			    	<input name="btn_search" type="button" class="mddl3" id="btn_search" value="查询" />
			    </td>
			  </tr>
			</table>
		  </form>
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
			        <p>所在区域：  <//!--{$item.distName}--></p>
			        <a href="#">大家对我的评价</a>
			    </td>
			    <td align="center" valign="middle" class="bor pj">
			    	 <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/zy.gif" width="25"> <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/sf.gif" width="25"> <img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/mp.gif" width="25">
			    </td>
			    <td align="center" valign="middle" class="bor"><strong class="f14 red"><?php echo $_smarty_tpl->tpl_vars['item']->value['userPhone'];?>
</strong></font></td>
			    <td align="center" valign="middle" class="bor">
			    	<a href="#" class="yz1">立即委托</a>
			    </td>
			  </tr>
			<?php } ?>
			</table>

		</div>
        </div>
             
        </div>
    </div>

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>