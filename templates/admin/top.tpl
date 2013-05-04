<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title>top</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="javascript">
function fnOnTabClick(tab){
    $(".menu li").removeClass("current");
    $(tab).parent().addClass("current");
}
</script>
</head>
<body>
	<div class="top_bg">
	</div>
	<div class="top_content">
		<div class="logo">
			<img src="<!--{$cfg.web_images}-->admin/logo.gif"/>
		</div>
		<div class="info">
			<div class="k"><label>欢迎您：<!--{$smarty.session.Admin_User.userUsername}--></label></div>
			<div><a href="index.php?action=loginOut" target="_parent">安全退出</a></div>
		</div>
		<ul class="menu">
			<!--{foreach name=toptab from=$menus item=item key=key}-->
			<li class="<!--{if $smarty.foreach.toptab.index == 0}-->current<!--{/if}-->"><a href="left.php?tab=<!--{$key}-->" onclick="fnOnTabClick(this);" target="leftFrame"><!--{$item.caption}--></a></li>
			<!--{/foreach}-->
		</ul>
		<div class="info1">
			<span><a class="k" href="<!--{$cfg.web_url}-->" target="_parent">网站首页</a><a href="javascript:void(0);">客服中心</a></span>
		</div>
	</div>
	<div class="top_info">
		<!--{foreach from=$bgads item=item key=key}-->
		<a href="<!--{$item.url}-->" target="_parent"><!--{$item.title}--></a>
		<!--{/foreach}-->
	</div>
</body>
</html>
