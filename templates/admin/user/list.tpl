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
<!--  
<div class="title_panel">
	<div class="title">信息查询</div>
</div>
<div class="search_panel">
	<input class="input" type="text" value="请输入关键字"/>&nbsp;<input type="button" value="查询"/>
</div>
-->
<div class="title_panel">
	<div class="title">员工列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="15%">用户名</th>
			<th width="10%">姓名</th>
			<th width="10%">性别</th>
			<th width="10%">部门</th>
			<th width="10%">联系电话</th>
			<th width="15%">地址</th>
			<th width="10%">个人相片</th>
			<th width="10%">操作</th>
			<th width="5%">状态</th>
		</tr>
		<!--{foreach from=$userList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><!--{$item.username}--></td>
			<td><!--{$item.uname}--></td>
			<td><!--{if $item.sex eq 1}-->男<!--{else}-->女<!--{/if}--></td>
			<td><!--{$item.dept}--></td>
			<td><!--{$item.tel}--></td>
			<td><!--{$item.address}--></td>
			<td><!--{if $item.path!=''}--><img height="100px" src="<!--{$cfg.web_url}-->uploads/<!--{$item.path_thumb}-->"/><!--{/if}--></td>
			<td><!--{if $item.state eq 1}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=changeState&id=<!--{$item.id}-->&state=1">发布</a><!--{/if}--> <a href="modify.php?id=<!--{$item.id}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&id=<!--{$item.id}-->');">删除</a> </td>
			<td><!--{if $item.state eq 1}--><font color="green">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
