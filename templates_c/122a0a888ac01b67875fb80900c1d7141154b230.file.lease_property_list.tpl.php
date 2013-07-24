<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 22:08:13
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\lease_property_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2216551d95a56141bb4-01417576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '122a0a888ac01b67875fb80900c1d7141154b230' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\lease_property_list.tpl',
      1 => 1374674889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2216551d95a56141bb4-01417576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51d95a56437db1_71885786',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'usedLivePropsCount' => 0,
    'restLivePropsCount' => 0,
    'soonBeExpiredCount' => 0,
    'usedRefreshTimes' => 0,
    'restRefreshTimes' => 0,
    'unlivePropsCount' => 0,
    'expiredPropsCount' => 0,
    'illegalPropsCount' => 0,
    'propNum' => 0,
    'propPriceFrom' => 0,
    'propPriceTo' => 0,
    'propRoom' => 0,
    'propKind' => 0,
    'propOrder' => 0,
    'propName' => 0,
    'propList' => 0,
    'pagination' => 0,
    'destNo' => 0,
    'pageNo' => 0,
    'propState' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d95a56437db1_71885786')) {function content_51d95a56437db1_71885786($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人房源_管理出租房源</title>
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
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
      <div class="bs_tx" style="border:0">
            <p><b>管理出租房源</b></p>
            <div class="bs_tx1">发 布 量：已使用 <?php echo $_smarty_tpl->tpl_vars['usedLivePropsCount']->value;?>
    还可使用<?php echo $_smarty_tpl->tpl_vars['restLivePropsCount']->value;?>
<br />               
即将过期房源：<?php echo $_smarty_tpl->tpl_vars['soonBeExpiredCount']->value;?>
  已刷新次数 <a id="d_usedRefreshTimes"><?php echo $_smarty_tpl->tpl_vars['usedRefreshTimes']->value;?>
</a> 还可刷新次数 <a id="d_restRefreshTimes"><?php echo $_smarty_tpl->tpl_vars['restRefreshTimes']->value;?>
</a></div>
<div style="width:700px; border-bottom:1px solid #ddd">
			<ul style="width:584px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="javascript:void(0)" onclick="gotolink(1)">已发布房源</a></li>
    		    <li><a href="javascript:void(0)" onclick="gotolink(0)">待发布房源(<?php echo $_smarty_tpl->tpl_vars['unlivePropsCount']->value;?>
)</a></li>
     		    <li><a href="javascript:void(0)" onclick="gotolink(3)">已过期房源(<?php echo $_smarty_tpl->tpl_vars['expiredPropsCount']->value;?>
) </a></li>
      		 	<li><a href="javascript:void(0)" onclick="gotolink(4)">违规房源(<?php echo $_smarty_tpl->tpl_vars['illegalPropsCount']->value;?>
)</a></li>
   		  </ul>
          </div>
          <form id="searchFrm" name="searchFrm" action="lease_property_list.php" method="post">
          <div class="sx">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="204" height="38" align="left" valign="middle" class="grzc_32" style="color:#333">房源编号：
			      <input id="propNum" name="propNum" type="text" style="height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['propNum']->value;?>
"/></td>
			    <td width="175" align="center" valign="middle"  class="grzc_36" style="color:#333">价格：
			    <input id="propPriceFrom" name="propPriceFrom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['propPriceFrom']->value;?>
" />—<input id="propPriceTo" name="propPriceTo" type="text" value="<?php echo $_smarty_tpl->tpl_vars['propPriceTo']->value;?>
" />元/月</td>
			    <td width="151" align="center" valign="middle"> 户型：
			      <select name="propRoom" id="propRoom">
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==0){?> selected="selected" <?php }?> value="0">不限</option>
					<option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==1){?> selected="selected" <?php }?> value="1">1室</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==2){?> selected="selected" <?php }?> value="2">2室</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==3){?> selected="selected" <?php }?> value="3">3室</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==4){?> selected="selected" <?php }?> value="4">4室</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==5){?> selected="selected" <?php }?> value="5">5室</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propRoom']->value==99){?> selected="selected" <?php }?> value="99">5室以上</option>        
			      </select></td>
			    <td width="140" align="center" valign="middle">类型： 
			    <select name="propKind" id="propKind" onchange="gotolink(52)">
			      	<option <?php if ($_smarty_tpl->tpl_vars['propKind']->value=="vv"){?> selected="selected" <?php }?> value="vv">不限</option>
					<option <?php if ($_smarty_tpl->tpl_vars['propKind']->value=="zz"){?> selected="selected" <?php }?> value="zz">住宅</option>
			        <option <?php if ($_smarty_tpl->tpl_vars['propKind']->value=="bs"){?> selected="selected" <?php }?> value="bs">别墅</option>
					<option <?php if ($_smarty_tpl->tpl_vars['propKind']->value=="sp"){?> selected="selected" <?php }?> value="sp">商铺</option>
					<option <?php if ($_smarty_tpl->tpl_vars['propKind']->value=="xzl"){?> selected="selected" <?php }?> value="xzl">写字楼</option>     
			    </select></td>
			  </tr>
		  </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="124" height="38" align="left" valign="middle">
			    <select name="propOrder" id="propOrder" onchange="gotolink(52)">
			      <option <?php if ($_smarty_tpl->tpl_vars['propOrder']->value==0){?> selected="selected" <?php }?> value="0">默认排序</option>
				  <option <?php if ($_smarty_tpl->tpl_vars['propOrder']->value==1){?> selected="selected" <?php }?> value="1">最后录入时间</option>
			      <option <?php if ($_smarty_tpl->tpl_vars['propOrder']->value==2){?> selected="selected" <?php }?> value="2">最早录入时间</option>
			      <option <?php if ($_smarty_tpl->tpl_vars['propOrder']->value==3){?> selected="selected" <?php }?> value="3">面积由小到大</option>
			      <option <?php if ($_smarty_tpl->tpl_vars['propOrder']->value==4){?> selected="selected" <?php }?> value="4">面积由大到小</option>
			    </select></td>
			    <td width="342" align="left" valign="middle" class="grzc_31" style="color:#333">名称： 
			      <input id="propName" name="propName" type="text" value="<?php echo $_smarty_tpl->tpl_vars['propName']->value;?>
"/></td>
			    <td width="204" colspan="2" align="left" valign="middle"> <a href="javascript:void(0)" onclick="gotolink(50)" class="xx0">搜索</a></td>
			    </tr>
		  </table>
		  </div>
        <div class="glcx">
       	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="55" height="50" align="center" valign="middle" bgcolor="#eeece1"><label><input id="checkall" name="checkall" type="checkbox" value="" / >选中</label></td>
			    <td width="225" height="50" align="center" valign="middle" bgcolor="#eeece1">房源基本信息</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">最后更新</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">录入时间</td>
			    <td width="92" height="50" align="center" valign="middle" bgcolor="#eeece1">浏览次数</td>
			    <td height="50" align="center" valign="middle" bgcolor="#eeece1">房源管理</td>
			  </tr>
		  </table>
		  <table id="prop_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		  
			  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['prop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['name'] = 'prop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['propList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['prop']['total']);
?>
			  <tr>
			    <td width="55" height="80" align="center" valign="middle" class="bor">
			    	<label><input name="" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
" / ></label></td>
			    <td width="225" align="left" valign="middle" class="bor">
			    	<img width="74px" height="58px" src="../uploads/<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propPhoto'];?>
" class="l">
			        <span class="l wz">
			        	名称：<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propName'];?>
<br /> 			        	
					 	<?php if ($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='zz'||$_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='bs'){?>
						户型：<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['room'];?>
室<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['hall'];?>
厅 <br />
					 	<?php }?>
						租金：<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propPrice'];?>
<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propPriceUnit'];?>
 面积：<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propArea'];?>
m<sup>2</sup><br />
			        </span>
			        </td>
			    <td id="t_update_time_<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
_<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
" width="120" align="center" valign="middle" style="line-height:22px;" class="bor"><?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['updateDate'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['updateTime'];?>
</td>
			    <td width="120" align="center" valign="middle" class="bor"><?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['createDate'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['createTime'];?>
</td>
			    <td width="92" align="center" valign="middle" class="bor"><font class="red">100</font> 次</td>
			    <td align="center" valign="middle" class="bor">
			    <?php if ($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='zz'){?>
			    <a href="user_lease_zz_edit.php?propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
">编辑</a>
			    <?php }elseif($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='bs'){?>
			    <a href="user_lease_bs_edit.php?propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
">编辑</a>
			    <?php }elseif($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='sp'){?>
			    <a href="user_lease_sp_edit.php?propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
">编辑</a>
			    <?php }elseif($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind']=='xzl'){?>
			    <a href="user_lease_xzl_edit.php?propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
">编辑</a>
			    <?php }?>			    
			     <a href="javascript:void(0);" onclick="deleteProp('<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
')">删除</a><br />
			     <?php if ($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propState']==1){?>
			    	<a class="xx0" style="margin:8px 12px;">发布待审核</a>
			     <?php }elseif($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propState']==5){?>
			    	<a href="javascript:void(0);" onclick="refreshProp('<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
','<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
')" class="xx0" style="margin:8px 12px;">刷新</a>
			    	<a href="user_lease_prop_agent.php?propKind=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
&propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
" class="xx0" style="margin:8px 12px;">去委托</a>
			     <?php }elseif($_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propState']==0){?>
			     	<a href="user_lease_prop_agent.php?propKind=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propKind'];?>
&propId=<?php echo $_smarty_tpl->tpl_vars['propList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prop']['index']]['propId'];?>
" class="xx0" style="margin:8px 12px;">去委托</a>
			     <?php }?>
			    </td>
			  </tr>
			  <?php endfor; endif; ?>
			  <tr>
			    <td height="30" align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle"><a href="javascript:void(0);" onclick="DelSelectedProp()" class="xx0" style="margin:8px 12px;">批量删除</a></td>
			  </tr>
		  </table>
		  <div class="page"><?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
&nbsp;到第<input type="text" id="destNo" name="destNo" value="<?php echo $_smarty_tpl->tpl_vars['destNo']->value;?>
"/>页 <a href="javascript:void(0)" onclick="gotolink(51)" class="next">确定</a>
		  </div>
        </div>
        <input type="hidden" id="pageNo" name="pageNo" value="<?php echo $_smarty_tpl->tpl_vars['pageNo']->value;?>
"/>
        <input type="hidden" id="propState" name="propState" value="<?php echo $_smarty_tpl->tpl_vars['propState']->value;?>
"/>
        </form>
		<div style=" width:680px; padding:35px 15px 20px; line-height:25px; color:#999">
        	房源管理使用说明：<br />
			1.房源一旦删除不能恢复，请慎重使用。<br />
			2.房源取消发布后，房源不在店铺页面以及网站搜索结果中显示，可到待发布房源栏目下重新发布。<br />
			3.房源预约刷新执行后，可以点击刷新栏目下的查看，查看执行情况。<br />
			4.房源预约刷新设置后，将按照端口剩余发布条数进行预约刷新。<br />
			5.房源预约刷新将在设置的时间点之后的五分钟之内执行。<br />
			6.每日房源发布量统计周期为当日的00:00起至次日的00:00，其中00:00~01:00为系统更新时间，不建议这个时间进行刷新以及房源录入等房源发布操作。
        </div>
      </div>
        
    </div>
    </div>
    </div>

<script type="text/javascript">
	$(document).ready(function() {
	
        $("#checkall").click(function(){
        	var ischecked = this.checked;
            $("#prop_table input[type='checkbox'],#checkall").each(function(){
            	this.checked = ischecked;
                $(this).click(function(){
                	if(!this.checked){
                    	$('#checkall').get(0).checked=false;
                    }
                });
            });
		});
	});
	
    //页面刷新
    function reflash(){
    	window.location.reload();
	}

    //单击批量删除
    function DelSelectedProp(){
    	
    	if(!confirm("确认删除选中房源？")) return false;
    	
    	
        var proplist = "";
        $("#prop_table input:checked").each(function(){
            proplist += $(this).val()+",";
		});
		
        if(proplist==""){
        	alert("选项不可以为空!");
        	return false;
        }
		
		var option={action:"delProp",propIds:proplist};
        $.ajax({
				url:"property_handler.php",
				dataType:"json",
                data:option,
                type:"post",
                success:function(msg){
					if(msg.result=="success"){
						alert("删除成功!");
                        window.setTimeout(function(){location.reload();}, 1000);
                    }else{
                        alert("删除失败!");
                    }
                },
                error:function(){
					alert("提示:删除失败!");
                }
        })
	}
	
	function gotolink(id){
		if(id >= 0 && id < 5){
			$("#propState").val(id);
			$("#propNum").val("");
			$("#propPriceFrom").val("");
			$("#propPriceTo").val("");
			$("#propRoom").val(0);
			$("#propKind").val("vv");
			$("#propOrder").val(0);
			$("#pageNo").val("");
			$("#propName").val("");
			$("#destNo").val("");
		}else if(id == 51){
			$("#pageNo").val($("#destNo").val());
		}
		$("#searchFrm").submit();		
	}
	
	function gotopage(id){
		$("#pageNo").val(id);
		$("#searchFrm").submit();
	}
</script>
<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>