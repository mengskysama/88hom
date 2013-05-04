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
	//初始页面公共功能
	initPage();
	//滚动相册
	$('.slide_show').cycle({
		fx:     'fade',
		//fx:	'shuffle',//'scrollDown',//shuffle
		speed:  'slow',
		timeout: 5000,
		prev:   '#prev', 
		next:   '#next',
		pager:  '#nav',
		pagerAnchorBuilder: function(idx, slide) {
			// return sel string for existing anchor
			return '#nav li:eq(' + (idx) + ') a';
		}
	});
});
</script>
</head>
<body>
<div class="layer_content">
	<!-- 头部 -->
	<!--{include file="header.tpl"}-->
	<!-- 头部 -->
	<div class="body_wrap">
		<div class="body">
			<div class="album">
				<div class="slide_show">
					<!--{foreach from=$picList key=key item=item}-->
					<img src="<!--{$cfg.web_url}-->uploads/<!--{$item.pic_url}-->"  width="1000" height="500" />
					<!--{/foreach}-->
				</div>
				<ul id="nav" class="nav">
					<!--{foreach from=$picList key=key item=item}-->
					<li><a href="javascript:void(0);"><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.pic_thumb}-->" width="100" height="50" /></a></li>
					<!--{/foreach}-->
				</ul>
				<div class="return">
					<a href="javascript:history.go(-1);">
						<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/i2.gif"/>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- 脚部 -->
	<!--{include file="footer.tpl"}-->
	<!-- 脚部 -->
</div>
<div class="layer_decoration">
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/letter.gif"/>
</div>
</body>
</html>