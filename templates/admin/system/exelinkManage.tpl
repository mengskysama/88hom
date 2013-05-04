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
		
	});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">网站外链管理</div>
</div>
<ul class="list_panel">
	<li><a href="outlink.php?type=outLinkManage">外链地址管理</a>|</li>
	<li><a href="outlink.php?type=exeLinkManage">执行地址管理</a>|</li>
	<li><a href="outlink.php?type=outLinkExe">外链地址执行</a></li>
</ul>
<div class="title_panel">
	<div class="title">网站执行地址管理</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php" method="post">
	<input type="hidden" id="id" name="id" value="<!--{$id}-->"/>
	<table cellpadding="3" cellspacing="0" >
	 	<tr>
	      <td>执行地址：<input name="exelinkName" id="exelinkName" type="text" style="width: 300px;" maxlength="255" value="<!--{if $id!=''}--><!--{$line}--><!--{/if}-->"/> <input type="button" value="<!--{$btName}-->" onclick="exeAdminExeLink('<!--{$btType}-->');"/> <!--{if $btType=='exelinkSave'}--><a href="outlink.php?type=exeLinkManage">返回</a><!--{/if}--></td>
	    </tr>
	</table>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="10%">ID</td>
			<td width="80%">执行地址</td>
			<td width="10%">操作</td>
		</tr>
		<!--{foreach from=$exelinkList item=item key=key}-->
		<tr>
			<td><!--{$item.id}--></td>
	      	<td><!--{$item.url}--></td>
	      	<td><a href="outlink.php?type=exeLinkManage&id=<!--{$item.id}-->"> 修改 </a> | <a href="action.php?action=exelinkDel&id=<!--{$item.id}-->"> 删除 </a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</form>
</body>
</html>
