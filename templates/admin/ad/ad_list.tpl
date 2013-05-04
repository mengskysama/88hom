<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='ad_manager.php?action=delete&id='+id;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">广告列表</div><div class="title"><a href="ad_manager.php?action=add">添加+</a></div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="10%">标题</th>
			<th width="5%">类别</th>
			<th width="15%">链接</th>
			<th width="25%">图像</th>
			<th width="5%">位置</th>
			<th width="10%">说明</th>
			<th width="5%">宽度</th>
			<th width="5%">高度</th>
			<th width="5%">开启</th>
			<th width="10%">更新时间</th>
			<th width="5%">操作</th>
		</tr>
		<!--{foreach from=$adList item=item key=key}--> 
		<tr align="center">
			<td><!--{$item.adTitle}--></td>
			<td><!--{$item.adtypeName}--></td>
			<td><!--{$item.adUrl}--></td>
			<td>
			<!--{if $item.adtypeKey eq "pic"}-->
				<img src="<!--{$path}--><!--{$item.adPic}-->" width="270"/>
			<!--{elseif  $item.adtypeKey eq "swf"}-->
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="270" height="50">
					<param name="movie" value="<!--{$path}--><!--{$item.adFiles}-->" />
					<param name="wmode" value="transparent" />
					<param name="quality" value="high" />
					<embed wmode="transparent" src="<!--{$path}--><!--{$item.adFiles}-->" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  height="50" width="270"></embed>
				</object>
			<!--{else}-->
				文本链接
			<!--{/if}-->
			</td>
			<td><!--{$item.adSite}--></td>
			<td><!--{$item.adSiteDesc}--></td>
			<td><!--{$item.width}--></td>
			<td><!--{$item.height}--></td>
			<td><!--{if $item.adState eq 1}-->是<!--{else}-->否<!--{/if}--></td>
			<td><!--{$item.adUpdateTime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td><a href="ad_manager.php?action=update&id=<!--{$item.adId}-->">修改</a> <a href="javascript:del(<!--{$item.adId}-->)">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
</body>
</html>
