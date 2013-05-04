<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<meta name="keywords" content="<!--{$cfg.web_page.keyword}-->" />
<meta name="description" content="<!--{$cfg.web_page.description}-->" />
<title><!--{$cfg.web_page.title}--></title> 
<!--{$cssFiles}-->
<!--{$jsFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	switchNavigation('a_3');
	$('.messages_list li:odd').addClass('odd');
	$('.messages_list li:even').addClass('even');
});	
</script>
</head>
<body>
<!-- 头部 -->
<!--{include file="header.tpl"}-->
<!-- 头部 -->
<div class="pic news_pic"></div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t20.jpg"/>
			</div>
			<ul>
				<!--{$nav}-->
				<li><a href="javascript:exeWebCheckLogin();" class="current">员工天地</a></li>
			</ul>
			<div class="b">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t17.jpg"/>
			</div>
		</div>
		<div class="right">
			<div class="location">
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t45.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<div style="float:left;width:768px;text-align:right;border-bottom:1px solid #ccc;">
					<a href="release.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t46.jpg"/></a>
				</div>
				<ul class="messages_list">
					<!--{foreach from=$infoList key=key item=item}-->
					<li>
						<span class="a"><!--{$item.replys}--></span>
						<span class="b"><a href="<!--{$cfg.web_url}-->bbs/d-<!--{$item.id}-->.htm"><!--{$item.title}--></a></span>
						<span class="c"><!--{$item.uname}--></span>
						<span class="d"><!--{$item.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--></span>
					</li>
					<!--{/foreach}-->
				</ul>
				<span class="pagingPanel">
					<!--{$divPage}-->
				</span>
			</div>
		</div>
	</div>
</div>
<!-- 脚部 -->
<!--{include file="footer.tpl"}-->
<!-- 脚部 -->
</body>
</html>