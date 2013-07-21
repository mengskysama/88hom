<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">新盘团购列表</div>
</div>
<form name="listForm" action="action.php?action=complexTgDelByIds" method="post">
	<input type="hidden" id="pId" name="pId" value="<!--{$info.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="5%">姓名</th>
			<th width="3%">性别</th>
			<th width="10%">电话</th>
			<th width="10%">邮箱</th>
			<th width="35%">留言内容</th>
			<th width="5%">是否看房</th>
			<th width="5%">是否团房</th>
			<th width="5%">报名时间</th>
			<th width="5%">审核情况</th>
			<th width="12%">操作</th>
		</tr>
		<!--{foreach from=$tgList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" value="<!--{$item.tgId}-->"/></td>
			<td><!--{$item.tgUserName}--></td>
			<td><!--{if $item.tgGender==1}-->男<!--{else}-->女<!--{/if}--></td>
			<td><!--{$item.tgPhone}--></td>
			<td><!--{$item.tgMail}--></td>
			<td><!--{$item.tgContent}--></td>
			<td><!--{if $item.tgIsSee==1}--><font color="blue">是</font><!--{else}--><font color="red">否</font><!--{/if}--></td>
			<td><!--{if $item.tgIsBuy==1}--><font color="blue">是</font><!--{else}--><font color="red">否</font><!--{/if}--></td>
			<td><!--{$item.tgCreateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{if $item.tgState==1}--><font color="blue">通过</font><!--{else}--><font color="red">待审</font><!--{/if}--></td>
			<td><!--{if $item.tgState==0}--><a href="action.php?action=complexTgChangeState&id=<!--{$item.tgId}-->&pId=<!--{$item.tgPropertyId}-->&state=1">通过</a><!--{/if}--> <a href="javascript:exeAdminDelMessage('action.php?action=complexTgDelById&id=<!--{$item.tgId}-->&pId=<!--{$item.tgPropertyId}-->');">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<!--{if $tgList neq null}-->
	<div style="float:left;margin-top:5px;">
			<a href="javascript:void(0);" onclick="$('input[type=\'checkbox\']').each(function(){this.checked = true;});">全选</a>/<a href="javascript:void(0);" onclick="$('input[type=\'checkbox\']').each(function(){this.checked = false;});">取消</a> <a href="javascript:void(0);" onclick="if(confirm('你确认删除选中的条目？')){listForm.submit();}">删除所选</a>
	</div>
	<!--{/if}-->
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
