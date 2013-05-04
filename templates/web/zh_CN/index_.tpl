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
	$('.index_info .r').cycle({
		fx:     'scrollRight',
		//fx:	'turnDown',
		speed:  'slow',
		timeout: 5000
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
			<!-- left -->
			<!--{include file="left.tpl"}-->
			<!-- left -->
			<div class="right">
				<div class="show">
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="830"	 height="420" id="myFlash">
						<param name="movie" value="banner2.swf" />
						<param name="wmode" value="transparent" />
						<param name="quality" value="high" />
						<embed wmode="transparent" src="banner2.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="830" height="422" name="myFlash" id="myFlash1"></embed>
					</object>
				</div>
				<div class="index_info">
					<div class="a">
						<div class="t0">关于我们</div>
						<div class="t2"><a title="更多"  href="<!--{$cfg.web_url}-->about/index.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/+.gif"/></a></div>
						<div class="t1">
							<a href="<!--{$cfg.web_url}-->about/index.htm">星河商业地产是以商业地产项目的策划、招商、运营、管理为一体的专业商业地产经营公司。作为深圳起步最早、起点最高的商业地产公司之一，预计未来5年内所运营的商业项目将达8个，商业...</a>
						</div>
					</div>
					<div class="b">
						<div class="news1">
							<div class="k0">最新动态</div>
							<div class="t2"><a title="更多" href="<!--{$cfg.web_url}-->news/index.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/+.gif"/></a></div>
							<ul>
								<!--{foreach from=$leftNewsList key=key item=item}-->
								<li>
									<span class="k1"><!--{$item.create_time|date_format:"%m-%d"}--></span><span class="k2"><a href="<!--{$cfg.web_url}-->news/d-<!--{$item.id}-->.htm" title="<!--{$item.title}-->"><!--{$item.title}--></a></span>
								</li>
								<!--{/foreach}-->
							</ul>
						</div>	
					</div>

					<div class="c">
						<div class="title">
							<a href="http://www.weibo.com" target="_blank">新浪微博</a>
						</div>
						<div class="r">
							<iframe width="270" height="110" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=110&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>
							<iframe width="270" height="110" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=110&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>
							<iframe width="270" height="110" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=110&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>
							<iframe width="270" height="110" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=110&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 脚部 -->
	<!--{include file="footer.tpl"}-->
	<!-- 脚部 -->
</div>
<div class="layer_decoration">
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/welcome.gif"/>
</div>
</body>
</html>