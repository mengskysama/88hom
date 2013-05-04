<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
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
<!-- 头部 -->
<!--{include file="header.tpl"}-->
<!-- 头部 -->
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
				<div class="news_detail">
					<div class="title"><!--{$infoDetail.title}--></div>
					<div class="info">发布于：<!--{$infoDetail.create_time|date_format:"%Y-%m-%d"}--> 浏览量：<!--{$infoDetail.click_count}--></div>
					<div class="content">
						   <!--{$infoDetail.text_content}-->
					</div>
					<div class="next_page">
						<!--{if $preInfo or $nextInfo}-->
						<div ><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t33.jpg"/></div>
						<!--{if $preInfo}-->
						<div>
							<label style="color:#666">上一篇：</label><a style="color:#000;text-decoration:none;" href="<!--{$cfg.web_url}-->about/d-<!--{$preInfo.id}-->.htm" title="<!--{$preInfo.title}-->"><!--{$preInfo.title}--></a>
						</div>
						<!--{/if}-->
						<!--{if $nextInfo}-->
						<div>
							<label style="color:#666">下一篇：</label><a style="color:#000;text-decoration:none;" href="<!--{$cfg.web_url}-->about/d-<!--{$nextInfo.id}-->.htm" title="<!--{$nextInfo.title}-->"><!--{$nextInfo.title}--></a>
						</div>
						<!--{/if}-->
						<div ><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t33.jpg"/></div>
						<!--{/if}-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 脚部 -->
<!--{include file="footer.tpl"}-->
<!-- 脚部 -->
</body>
</html>