<?php /* Smarty version Smarty-3.1.8, created on 2013-04-25 21:28:35
         compiled from "E:/home/web/88hom/templates\admin\ad\ad_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215178fbf4052b04-80667384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5901823f64a97aba660a94982864db6a96946e28' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\ad\\ad_update.tpl',
      1 => 1366896511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215178fbf4052b04-80667384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5178fbf4092221_36505029',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'ad' => 0,
    'img' => 0,
    'adtypeList' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5178fbf4092221_36505029')) {function content_5178fbf4092221_36505029($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='ad_manager.php';
		});
	});
	function check(){
		if($('input[name="adTitle"]').val()=='')
		{
			alert('请输入标题！');
			$('input[name="adTitle"]').focus();
			return false;
		}
		if($('select[name="adtypeId"]').val()=='')
		{
			alert('请选择类别！');
			$('input[name="adtypeId"]').focus();
			return false;
		}
		if($('input[name="file"]').val()!=''){
			var name = $('input[name="file"]').val();
			var ext = name.substring(name.lastIndexOf('.')+1).toLowerCase();
			if(!(ext=='jpg' || ext=='gif' || ext=='jpeg' || ext=='png' || ext=='bmp' || ext=='swf'))
			{
				alert('只支持jpg,gif,jpeg,png,bmp格式图片和swf的动画文件!')
				$('input[name="file"]').focus();
				return false;
			}	
		}
		if($('input[name="adSite"]').val()=='')
		{
			alert('请输入位置！');
			$('input[name="adSite"]').focus();
			return false;
		}
		if(!/^\d+$/.test($('input[name="adSite"]').val()))
		{
			alert('位置必须是正整数！');
			$('input[name="adSite"]').focus();
			return false;
		}
		if($('input[name="width"]').val()!=''){
			if(!/^\d+$/.test($('input[name="width"]').val()))
			{
				alert('宽度必须是正整数！');
				$('input[name="width"]').focus();
				return false;
			}
		}
		if($('input[name="height"]').val()!=''){
			if(!/^\d+$/.test($('input[name="height"]').val()))
			{
				alert('高度必须是正整数！');
				$('input[name="height"]').focus();
				return false;
			}
		}
		if($('input[name="adLayer"]').val()!=''){
			if(!/^\d+$/.test($('input[name="adLayer"]').val()))
			{
				alert('序号必须是正整数！');
				$('input[name="adLayer"]').focus();
				return false;
			}
		}
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告更新</div>
</div>
	<form method="post" action="ad_manager.php?action=doUpdate" enctype="multipart/form-data">
	<input type="hidden" name="adId" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adId'];?>
"/>
	<table cellspacing="0" cellpadding="0" >
		<?php if ($_smarty_tpl->tpl_vars['img']->value!=''){?>
		<tr>
			<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['img']->value;?>
</td>
		</tr>
		<?php }?>
		<tr ><td>标题：</td><td><input class="input" type="text" name="adTitle" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adTitle'];?>
"/><font color="red">*</font></td></tr>
		<tr ><td>类别：</td>
		<td>
			<select name="adtypeId">
				<option value="" >请择类别</option>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adtypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
					<?php if ($_smarty_tpl->tpl_vars['item']->value['adtypeId']==$_smarty_tpl->tpl_vars['ad']->value['adtypeId']){?>
					<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeId'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeName'];?>
</option>
					<?php }else{ ?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeId'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['adtypeName'];?>
</option>
					<?php }?>
				<?php } ?>
			</select><font color="red">*</font>
		</td>
		</tr>
		<tr ><td>链接：</td><td><input class="input" type="text" name="adUrl" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adUrl'];?>
"/>(如：http://www.baidu.com)</td></tr>
		<tr ><td>图像：</td><td><input type="file" name="file"/>(图片或flash)</td></tr>
		<tr ><td>位置：</td><td><input class="input" type="text" name="adSite" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adSite'];?>
"/><font color="red">*</font>(正整数，如1,2,3...)</td></tr>
		<tr ><td>位置说明：</td><td><input class="input" type="text" name="adSiteDesc" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adSiteDesc'];?>
"/></td></tr>
		<tr ><td>元素ID：</td><td><input class="input" type="text" name="adEId" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adEId'];?>
"/></td></tr>
		<tr ><td>元素CSS类名：</td><td><input class="input" type="text" name="adEClass" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adEClass'];?>
"/></td></tr>
		<tr ><td>宽度：</td><td><input class="input" type="text" name="width" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['width'];?>
"/>(正整数)</td></tr>
		<tr ><td>高度：</td><td><input class="input" type="text" name="height" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['height'];?>
"/>(正整数)</td></tr>
		<tr ><td>序号：</td><td><input class="input" type="text" name="adLayer" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['adLayer'];?>
"/>(整数)</td></tr>
		<tr ><td>是否开启：</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['ad']->value['adState']==1){?>
			<input type="radio" name="adState" checked="checked" value="1"/>是  <input type="radio" name="adState" value="-1"/>否
			<?php }else{ ?>
			<input type="radio" name="adState" value="1"/>是  <input type="radio" name="adState"  checked="checked" value="-1"/>否
			<?php }?>
		</td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
<?php }} ?>