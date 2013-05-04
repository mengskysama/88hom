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
	//图片展示滚动
	$('.right .show').cycle({
		fx:     'fade',
		//fx:	'turnDown',
		speed:  'slow',
		timeout: 5000
	});
	//微博滚动效果
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
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/a.jpg"/>
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/b.jpg"/>
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/c.jpg"/>
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/e.jpg"/>
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
							<ul id="index_news_list">
								<!--{foreach from=$infoList key=key item=item}-->
								<li>
									<span class="k1"><!--{$item.AddTime}--></span><span class="k2"><a href="<!--{$cfg.web_url}-->news/d-<!--{$item.ID}-->.htm" title="<!--{$item.NewsTitle}-->"><!--{$item.NewsTitle}--></a></span>
								</li>
								<!--{/foreach}-->
							</ul>
						</div>	
					</div>
					<div class="c"><!---------->
						<div class="title">
							<a href="http://www.weibo.com" target="_blank">新浪微博</a>
						</div>
						<script type="text/javascript">
							if(navigator.userAgent.indexOf("MSIE")>0){   
							    if(navigator.userAgent.indexOf("MSIE 6.0")>0){   
							    	html='<div class="r">'+
										'<iframe width="270" height="90" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="90" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="90" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="90" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>'+
										'</div>';
									document.write(html);
							    }   
							    if(navigator.userAgent.indexOf("MSIE 7.0")>0){  
								    //alert('ie7');
							    	html='<div class="r">'+
										'<iframe width="270" height="117" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=135&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>'+
										'</div>';
									document.write(html);
							    }   
							    if(navigator.userAgent.indexOf("MSIE 8.0")>0){ 
							    	//alert('ie8'); 
							    	html='<div class="r">'+
										'<iframe width="270" height="117" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>'+
										'</div>';
									document.write(html);
							    }   
							    if(navigator.userAgent.indexOf("MSIE 9.0")>0){  
							    	//alert('ie9');
							    	html='<div class="r">'+
										'<iframe width="270" height="117" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>'+
										'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>'+
										'</div>';
									document.write(html);
							    }   
							}else{
								//alert('other');
								html='<div class="r">'+
									'<iframe width="270" height="125" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=135&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105258302&verifier=784ea6ed&dpc=1"></iframe>'+
									'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105259080&verifier=784ea6ed&dpc=1"></iframe>'+
									'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105282344&verifier=784ea6ed&dpc=1"></iframe>'+
									'<iframe width="270" height="115" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=270&height=130&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid=2105319864&verifier=784ea6ed&dpc=1"></iframe>'+
									'</div>';
								document.write(html);
							}
						</script>
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
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/letter.gif"/>
</div>
</body>
</html>