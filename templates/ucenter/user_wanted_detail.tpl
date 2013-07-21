<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><!--{if $isIntermediary==1}-->委托 <!--{elseif $isIntermediary==2}-->直接<!--{/if}-->发布详情_我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body>
<!--直接发布头部-->
<!--{include file="$header_ucenter_user"}-->
<!--直接发布内容-->
<div class="qg_main"><!--{include file="$ucenter_user_left_menu"}-->
<div class="qg_r">
<p>你的位置： <a href="ucenter_user.php"> 我的房不剩房</a> > <a
	href="user_wanted.php?wType=<!--{$wType}-->">我要<!--{if $wType==1}-->买<!--{elseif $wType==2}-->租<!--{/if}-->房</a>
> <a href="user_wanted.php?wType=<!--{$wType}-->"> 我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->
> <a href="javascript:void(0);"><!--{if $isIntermediary==1}-->委托 <!--{elseif $isIntermediary==2}-->直接<!--{/if}-->发布详情</a></p>
<div class="qgxq"><b class="wyqg f14 z3"><img
	src="<!--{$cfg.web_images}-->ucenter/qg_32.jpg"> 我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}--></b>
<div class="qgxq4"><span class="txx">您填写的求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息</span></div>
</div>
<div class="qgxq2">
<p class="wyqg1"><b class="z14">基本资料</b><font class="red">*</font>为必填项</p>
<div class="qgbg">
<form id="do_user_wanted" action="do_user_wanted.php?action=modify"
	method="post"><input type="hidden" id="id" name="id"
	value="<!--{$infoDetail.id}-->" /> <input type="hidden" id="userId"
	name="userId" value="<!--{$infoDetail.user_id}-->" /> <input
	type="hidden" id="wType" name="wType"
	value="<!--{$infoDetail.w_type}-->" /> <input type="hidden"
	id="isIntermediary" name="isIntermediary"
	value="<!--{$infoDetail.is_intermediary}-->" />
<table width="100%" border="0" cellspacing="1" cellpadding="0"
	bordercolor="#FFFFFF">
	<tr>
		<td width="120" height="42" align="center" valign="middle"
			bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;房源名称</td>
		<td valign="middle" class="grzc_33 p5"><input readonly="readonly"
			name="fName" id="fName" type="text"
			value="<!--{$infoDetail.f_name}-->" /></td>
	</tr>
	<tr>
		<td width="120" height="42" align="center" valign="middle"
			bgcolor="#f7f6f1" class="z14"><font class="red">*</font>&nbsp;目标总价</td>
		<td valign="middle" class="grzc_33 p5"><input readonly="readonly"
			name="price" id="price" type="text"
			value="<!--{$infoDetail.price}-->" /> 元</td>
	</tr>
	<tr>
		<td width="120" height="42" align="center" valign="middle"
			bgcolor="#f7f6f1" class="z14">&nbsp;留 言</td>
		<td valign="middle" class="p5"><textarea readonly="readonly"
			class="bdqy1" rows="7" cols="100" name="content" id="content"><!--{$infoDetail.content}--></textarea>
		</td>
	</tr>
	<tr>
		<td height="25">&nbsp;</td>
		<td valign="middle"><font class="red">200</font>字，详细的自身情况描述，能让您快速地找到合适的业主。
		</td>
	</tr>
</table>
</div>
<div class="qglx">
<div class="qgxq4"><span class="txx">您填写的联系方式</span><span><font
	class="red">*</font> 为必填项</span></div>
<div class="wtx">
<table width="100%" border="0" cellspacing="1" cellpadding="0"
	bordercolor="#FFFFFF">
	<tr>
		<td width="120" height="42" align="center" valign="middle"
			bgcolor="#f7f6f1" class="z14"><font class="red">*</font> 联 系 人</td>
		<td width="175" class="grzc_33 p5"><input readonly="readonly"
			name="contact" type="text" id="contact"
			value="<!--{$infoDetail.contact}-->" /></td>
	</tr>
	<tr>
		<td height="42" align="center" valign="middle" bgcolor="#f7f6f1"
			class="z14"><font class="red">*</font>手机号码</td>
		<td width="175" class="grzc_33 p5"><input readonly="readonly"
			name="mobile" type="text" id="mobile"
			value="<!--{$infoDetail.mobile}-->" /></td>
		<td>（通过认证才能发布房源）</td>
	</tr>
	<tr>
		<td height="100" colspan="2" align="center" valign="middle"
			bgcolor="#FFFFFF" class="z14">&nbsp;</td>
		<td><input name="button3" type="button" class="denglu1 l" id="button2"
			value="返回" onclick="javascript:window.history.go(-1);" /></td>
	</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
<!--直接发布底部-->
<!--{include file="$footer"}-->
</body>
</html>
