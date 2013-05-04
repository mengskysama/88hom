<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title>left</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script language="javascript">
function fnOnMenuClick(menu){
    $(".left_menu li").removeClass("current");
    $(menu).parent().addClass("current");
}
</script>
</head>
<body>
<ul class="left_menu">
<!--{foreach name=submenu from=$menus key=key item=item}-->
<li class="<!--{if $smarty.foreach.submenu.index == 0}-->current<!--{/if}-->"><a href="<!--{$item.url}-->" onclick="fnOnMenuClick(this);" target="mainFrame"><!--{$item.caption}--></a></li>
<!--{/foreach}-->
</ul>
<div class="left_info">
	Copyright &copy;2011
	<a href="http://web.seo7788.com">SEO7788</a> All rights reserved.
</div>
</body>
</html>
