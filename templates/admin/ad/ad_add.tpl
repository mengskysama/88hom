<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
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
	<div class="title">广告添加</div>
</div>
	<form method="post" action="ad_manager.php?action=doAdd" enctype="multipart/form-data">
	<table cellspacing="0" cellpadding="0" >
		<tr ><td>标题：</td><td><input class="input" type="text" name="adTitle"/><font color="red">*</font></td></tr>
		<tr ><td>类别：</td>
		<td>
			<select name="adtypeId">
				<option selected="selected" value="" >请择类别</option>
				<!--{foreach from=$adtypeList item=item key=key}--> 
					<option value="<!--{$item.adtypeId}-->" ><!--{$item.adtypeName}--></option>
				<!--{/foreach}-->
			</select><font color="red">*</font>
		</td>
		</tr>
		<tr ><td>链接：</td><td><input class="input" type="text" name="adUrl"/>(如：http://www.baidu.com)</td></tr>
		<tr ><td>图像：</td><td><input type="file" name="file"/>(图片或flash)</td></tr>
		<tr ><td>位置：</td><td><input class="input" type="text" name="adSite"/><font color="red">*</font>(正整数，如1,2,3...)</td></tr>
		<tr ><td>位置说明：</td><td><input class="input" type="text" name="adSiteDesc"/></td></tr>
		<tr ><td>元素ID：</td><td><input class="input" type="text" name="adEId"/></td></tr>
		<tr ><td>元素CSS类名：</td><td><input class="input" type="text" name="adEClass"/></td></tr>
		<tr ><td>宽度：</td><td><input class="input" type="text" name="width"/>(正整数)</td></tr>
		<tr ><td>高度：</td><td><input class="input" type="text" name="height"/>(正整数)</td></tr>
		<tr ><td>序号：</td><td><input class="input" type="text" name="adLayer"/>(整数)</td></tr>
		<tr ><td>是否开启：</td><td><input type="radio" name="adState" checked="checked" value="1"/>是 <input type="radio" name="adState" value="-1"/>否</td></tr>
		<tr ><td colspan="2" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
