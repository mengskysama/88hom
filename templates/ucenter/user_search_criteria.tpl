<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body>
<!--我的找房条件头部-->
<!--{include file="$header_ucenter_user"}-->
<!--我的找房条件内容-->
<div class="qg_main"><!--{include file="$ucenter_user_left_menu"}-->
<div class="qg_r">
<p>你的位置： <a href="ucenter_user.php"> 我的房不剩房</a> > <a
	href="user_wanted.php?wType=<!--{$cType}-->">我要<!--{if $cType==1}-->买<!--{elseif $cType==2}-->租<!--{/if}-->房</a>
><a href="javascript:void(0);"> 我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</a></p>
<div class="qg_bs" style="border: 0">
<div class="zftj">
<p><b>什么是我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</b></p>
<div class="zftj1">再也不用每次选择复杂的条件了；这里会记录您保存过的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件，不管是新房还是二手房，我们都为您记录下来，方便日后查找。
在此添加<font class="red" style="text-decoration: underline"><a
	href="my_search_criteria<!--{if $cType==2}-->_second<!--{/if}-->.php?cType=<!--{$cType}-->"
	title="点击添加我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件">我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</a></font></div>
</div>
<!--{if $cType==1}-->
<div class="zftj">
<p><b>我的新房<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</b></p>
<div class="zftj1">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<td width="50" height="35" align="center" valign="middle" class="bor">序号</td>
		<td width="100" align="center" valign="middle" class="bor">区域</td>
		<td width="120" align="center" valign="middle" class="bor">类型</td>
		<td width="170" align="center" valign="middle" class="bor">名称</td>
		<td width="155" align="center" valign="middle" class="bor">价格</td>
		<td align="center" valign="middle" class="bor">操作</td>
	</tr>
	<!--{foreach from=$infoList1 item=item key=key}-->
	<tr>
		<td width="50" height="35" align="center" valign="middle"><!--{$item.id}--></td>
		<td width="100" align="center" valign="middle"><!--{$item.city}--> <!--{$item.district}--></td>
		<td width="120" align="center" valign="middle"><!--{if $item.house_type==1}-->
		住宅 <!--{elseif $item.house_type==2}--> 商铺 <!--{elseif $item.house_type==3}-->
		写字楼 <!--{elseif $item.house_type==4}--> 别墅 <!--{elseif $item.house_type==4}-->
		写字楼 <!--{/if}-->
		<td width="170" align="center" valign="middle"><!--{$item.area}--> <!--{if $item.area}--><!--{/if}--></td>
		<td width="155" align="center" valign="middle"><!--{$item.price}--> <!--{if $item.price}-->元/平米<!--{/if}--></td>
		<td align="center" valign="middle"><a
			href="my_search_criteria_modify.php?cType=<!--{$cType}-->&id=<!--{$item.id}-->"
			class="red">修改</a> <a href="<!--{$item.areaIndex}-->" class="red">搜索</a>
		<a
			href="javascript:if(confirm('数据删除不能恢复')){document.location='do_search_criteria.php?action=delete&cType=<!--{$cType}-->&id=<!--{$item.id}-->'}"
			class="red">删除 </a></td>

	</tr>
	<!--{/foreach}-->
</table>

</div>
</div>
<!--{/if}-->
<div class="zftj"><a name="secondLocate" id="secondLocate"></a>
<p><b>我的二手房<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</b></p>
<div class="zftj1">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<td width="50" height="35" align="center" valign="middle" class="bor">序号</td>
		<td width="100" align="center" valign="middle" class="bor">区域</td>
		<td width="120" align="center" valign="middle" class="bor">类型</td>
		<td width="170" align="center" valign="middle" class="bor">名称</td>
		<td width="155" align="center" valign="middle" class="bor">价格</td>
		<td align="center" valign="middle" class="bor">操作</td>
	</tr>
	<!--{foreach from=$infoList2 item=item key=key}-->
	<tr>
		<td width="50" height="35" align="center" valign="middle"><!--{$item.id}--></td>
		<td width="100" align="center" valign="middle"><!--{$item.city}--> <!--{$item.district}-->
		</td>
		<td width="120" align="center" valign="middle"><!--{if $item.house_type==1}-->
		住宅 <!--{elseif $item.house_type==2}--> 商铺 <!--{elseif $item.house_type==3}-->
		写字楼 <!--{elseif $item.house_type==4}--> 别墅 <!--{elseif $item.house_type==5}-->
		厂房 <!--{/if}--></td>
		<td width="170" align="center" valign="middle"><!--{$item.area}--> <!--{if $item.area}--><!--{/if}-->
		</td>
		<td width="155" align="center" valign="middle"><!--{$item.price}--> <!--{if $item.price}-->元/平米<!--{/if}--></td>
		<td align="center" valign="middle"><a
			href="my_search_criteria_modify.php?cType=<!--{$cType}-->&id=<!--{$item.id}-->"
			class="red">修改</a> <a href="#" class="red">搜索</a> <a
			href="javascript:if(confirm('数据删除不能恢复')){document.location='do_search_criteria.php?action=delete&cType=<!--{$cType}-->&hand=2&id=<!--{$item.id}-->';}"
			class="red">删除 </a></td>
	</tr>
	<!--{/foreach}-->
</table>
</div>
</div>
</div>
</div>
</div>

<!--我的找房条件底部-->
<!--{include file="$footer"}-->
</body>
</html>
