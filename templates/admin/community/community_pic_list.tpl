<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
				$('form:first').submit();
		});
		
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='community_manager.php?action=pic&subAction=delete&picBuildId=<!--{$picBuildId}-->&id='+id;
	}

</script>
<style type="text/css">

</style>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title"><!--{$community.communityName}-->-小区图片列表</div><div class="title"><a href="community_manager.php?action=pic&subAction=add&picBuildId=<!--{$picBuildId}-->">添加+</a></div><div class="title"><a href="community_manager.php?action=detail&id=<!--{$picBuildId}-->">小区详细</a></div><div class="title"><a href="community_manager.php">小区列表</a></div>
</div>
<!--{foreach from=$picList item=item key=key}--> 
<div style="float:left;width:100%;">
<div style="font-weight:bold;width:100%;float:left;margin:10px 0px;border-bottom:1px solid #ddd;"><!--{$item.type.pictypeName}--></div>
	<!--{foreach from=$item.picList item=item1 key=key1}-->
		<span style="float:left;margin:5px;">
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item1.picUrl}-->"><img height="200" src="<!--{$cfg.web_url}-->uploads/<!--{$item1.picThumb}-->"/></a><br />
			信息：<!--{$item1.picInfo}--><br />
			排序号：<!--{$item1.picLayer}--><br />
			开启：<!--{if $item1.picState eq 1}-->是<!--{else}-->否<!--{/if}--><br />
			操作：<a href="community_manager.php?action=pic&subAction=update&picBuildId=<!--{$picBuildId}-->&id=<!--{$item1.picId}-->">修改</a> <a href="javascript:del(<!--{$item1.picId}-->)">删除</a> 
		</span>
		
	<!--{/foreach}-->
</div>	
<!--{/foreach}-->

</body>
</html>
