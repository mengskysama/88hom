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
	switchNavigation('a_2');
});	
</script>
</head>
<body>
<!-- 遊何 -->
<!--{include file="header.tpl"}-->
<!-- 遊何 -->
<div class="pic about_pic"></div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t25.jpg"/>
			</div>
			<ul>
				<!--{$nav}-->
			</ul>
			<div class="b">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t17.jpg"/>
			</div>
		</div>
		<div class="right">
			<div class="location">
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/i12.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<!--{if $typeId==9}-->
				<ul class="news_list">
					<!--{foreach from=$infoList key=key item=item}-->
					<li>
						<span class="title">
							<span class="a"><a href="<!--{$cfg.web_url}-->about/d-<!--{$item.id}-->.htm" title="<!--{$item.title}-->"><!--{$item.title}--></a></span>
							<span class="b"><!--{$item.create_time|date_format:"%Y-%m-%d"}--></span>
						</span>
						<span class="desc">
							<a href="<!--{$cfg.web_url}-->about/d-<!--{$item.id}-->.htm"><!--{$item.text_content}--></a>
						</span>
					</li>
					<!--{/foreach}-->
				</ul>
				<span class="pagingPanel">
					<!--{$divPage}-->
				</span>
				<!--{else}-->
					<!--{$infoDetail.text_content}-->
				<!--{/if}-->
			</div>
		</div>
	</div>
</div>
<!-- 重何 -->
<!--{include file="footer.tpl"}-->
<!-- 重何 -->
</body>
</html>