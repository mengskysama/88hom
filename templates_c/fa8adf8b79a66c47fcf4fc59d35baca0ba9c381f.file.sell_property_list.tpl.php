<?php /* Smarty version Smarty-3.1.8, created on 2013-06-27 18:06:17
         compiled from "E:/workspace/projects/88hom/templates\ucenter\sell_property_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24351cc05070ec3d9-96504959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa8adf8b79a66c47fcf4fc59d35baca0ba9c381f' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\sell_property_list.tpl',
      1 => 1372327571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24351cc05070ec3d9-96504959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51cc05071d0812_54395992',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51cc05071d0812_54395992')) {function content_51cc05071d0812_54395992($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>个人房源_管理出售房源</title>
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
            <p><b>管理出售房源</b></p>
            <div class="bs_tx1">发 布 量：已使用 <a href="#">3</a>    还可使用<a href="#">10</a><br />               
即将过期房源：<a href="#">0</a>  本月过期房源 已重新发布 <a href="#">0</a> 还可重新发布 <a href="#">1</a></div>
<div style="width:700px; border-bottom:1px solid #ddd">
			<ul style="width:584px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="#">已发布房源</a></li>
    		    <li><a href="#">待发布房源(5)</a></li>
     		    <li><a href="#">已过期房源(0) </a></li>
      		 	<li><a href="#">违规房源(0)</a></li>
   		  </ul>
          </div>
          <form id="searchFrm" name="searchFrm" action="sell_property_list.php" method="post">
          <div class="sx">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="204" height="38" align="left" valign="middle" class="grzc_32" style="color:#333">房源编号：
			      <input name="input" type="text"  value="" style="height:20px;" /></td>
			    <td width="175" align="center" valign="middle"  class="grzc_36" style="color:#333">价格：
			    <input name="" type="text"  value="" / >—<input name="" type="text"  value="" />万元</td>
			    <td width="151" align="center" valign="middle"> 户型：
			      <select name="ddlProv2" id="ddlProv2">
			        <option selected="selected" value="0">不限</option>
					<option value="1">1室</option>
			        <option value="2">2室</option>
			        <option value="3">3室</option>
			        <option value="4">4室</option>
			        <option value="5">5室</option>
			        <option value="99">5室以上</option>        
			      </select></td>
			    <td width="140" align="center" valign="middle">类型： 
			    <select name="ddlProv2" id="ddlProv2">
			      	<option selected="selected" value="0">不限</option>
					<option value="1">住宅</option>
			        <option value="2">别墅</option>
					<option value="3">商铺</option>
					<option value="4">写字楼</option>     
			    </select></td>
			  </tr>
		  </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="124" height="38" align="left" valign="middle">
			    <select name="ddlProv3" id="ddlProv3">
			      <option selected="selected" value="0">默认排序</option>
				  <option value="addtimedesc">最后录入时间</option>
			      <option value="addtimeasc">最早录入时间</option>
			      <option value="freshdesc">最后刷新时间</option>
			      <option value="freshasc">最早刷新时间</option>
			      <option value="areaup">面积由小到大</option>
			      <option value="areadown">面积由大到小</option>
			    </select></td>
			    <td width="342" align="left" valign="middle" class="grzc_31" style="color:#333">名称： 
			      <input name="" type="text"  value=""/></td>
			    <td width="204" colspan="2" align="left" valign="middle"> <a href="#" class="xx0">搜索</a></td>
			    </tr>
		  </table>
		  </div>
        <div class="glcx">
       	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="55" height="50" align="center" valign="middle" bgcolor="#eeece1"><label><input name="" type="checkbox" value="" / >选中</label></td>
			    <td width="225" height="50" align="center" valign="middle" bgcolor="#eeece1">房源基本信息</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">最后更新</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">录入时间</td>
			    <td width="92" height="50" align="center" valign="middle" bgcolor="#eeece1">浏览次数</td>
			    <td height="50" align="center" valign="middle" bgcolor="#eeece1">房源管理</td>
			  </tr>
		  </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="55" height="80" align="center" valign="middle" class="bor"><label><input name="" type="checkbox" value="" / ></label></td>
			    <td width="225" align="left" valign="middle" class="bor">
			    	<img src="images/test/111.jpg" class="l">
			        <span class="l wz">
			        	名称：梧桐山新居<br /> 
						户型：2室1厅 面积：60M2<br />
						单价：20000/M2<br />
			        </span>
			        </td>
			    <td width="120" align="center" valign="middle" style="line-height:22px;" class="bor">2013-04-08<br />14:00</td>
			    <td width="120" align="center" valign="middle" class="bor">2013-04-08<br />14:00</td>
			    <td width="92" align="center" valign="middle" class="bor"><font class="red">100</font> 次</td>
			    <td align="center" valign="middle" class="bor">
			    <a href="#">编辑</a> <a href="#">删除</a><br />
			    	<a href="#" class="xx0" style="margin:8px 12px;">去委托</a>
			    </td>
			  </tr>
			  <tr>
			    <td height="30" align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle"><a href="#" class="xx0" style="margin:8px 12px;">批量删除</a></td>
			  </tr>
		  </table>
		  <div class="page"><a href="#" class="prev">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#" class="next">下一页</a>&nbsp;&nbsp;共20页&nbsp;到第
		  	<input type="text" />页 <a href="#" class="next">确定</a>
		  </div>
        </div>
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

<!--求购底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>