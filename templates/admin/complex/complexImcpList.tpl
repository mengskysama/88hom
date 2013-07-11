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
	<div class="title">中介公司</div><div class="title"><a href="complexImcpRelease.php">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form action="complexImcpList.php" method="post">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="100px;" align="right">中介公司名称：</td>
                <td>
            		<input name="search" id="search" class="input" value="<!--{$info.search}-->"/>
            		<input style="margin-left:20px;width: 50px;height: 25px;" type="submit"  value="查询"/> 
                </td>
        	</tr>
		</table>
	</form>
</div>
<div class="title_panel">
	<div class="title">信息列表</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ID</th>
			<th width="8%">中介公司短写</th>
			<th width="15%">中介公司全称</th>
			<th width="10%">中介公司LOGO</th>
			<th width="13%">中介公司地址</th>
			<th width="12%">中介公司网址</th>
			<th width="5%">状态</th>
			<th width="5%">发布者</th>
			<th width="10%">发布时间</th>
			<th width="10%">更新时间</th>
			<th width="10%">操作</th>
		</tr>
		<!--{foreach from=$imcpList item=item key=key}-->
		<tr align="center">
			<td><!--{$item.imcpId}--></td>
			<td><!--{$item.imcpShortName}--></td>
			<td><!--{$item.imcpName}--></td>
			<td><!--{if $item.imcpLogo!=''}--><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.imcpLogo}-->" width="150" height="60"/><!--{/if}--></td>
			<td><!--{$item.imcpAddress}--></td>
			<td><!--{if $item.imcpWebSite!=''}--><a target="_blank" href="<!--{$item.imcpWebSite}-->"><!--{$item.imcpWebSite}--></a><!--{/if}--></td>
			<td><!--{if $item.imcpState==1}--><font color="blue">发布</font><!--{else}--><font color="red">屏蔽</font><!--{/if}--></td>
			<td><!--{$item.userUsername}--></td>
			<td><!--{$item.imcpCreateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{$item.imcpUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></td>
			<td><!--{if $item.imcpState==1}--><a href="action.php?action=complexImcpChangeState&id=<!--{$item.imcpId}-->&state=0">屏蔽</a><!--{else}--><a href="action.php?action=complexImcpChangeState&id=<!--{$item.imcpId}-->&state=1">发布</a><!--{/if}--> <a href="complexImcpModify.php?id=<!--{$item.imcpId}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=complexImcpDelById&id=<!--{$item.imcpId}-->');">删除</a> </td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
