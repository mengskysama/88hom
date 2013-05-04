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
	$('.show_honour').cycle({
		fx:     'scrollHorz',
		//fx:	'turnDown',scrollRight
		speed:  'slow',
		timeout: 0,
		prev:   '#prev', 
		next:   '#next',
		pager:  '#nav',
		pagerAnchorBuilder: function(idx, slide) {
			// return sel string for existing anchor
			return '.bnt:first span:eq(' + (idx+1) + ') a';
		}
	});
});
//年代式样切换
function change(idx,obj){
	$('.line span').removeClass("current");
	$('.line span').eq(idx+1).addClass("current");
	$('.bnt span').removeClass("current");
	$(obj).parent().addClass("current");
}

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
				<!--{if $typeId==8}-->
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="jianjie.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="jianjie.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_1.jpg" />
					<!--{/if}-->
				</div>
				<!--{else if $typeId==9}-->
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="wenhua.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="wenhua.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_2.jpg" />
					<!--{/if}-->
				</div>
				<!--{else if $typeId==10}-->
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="rongyu.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="rongyu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_3.jpg" />
					<!--{/if}-->
				</div>
				<!--{else if $typeId==25}-->
				<div class="f_pic">
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_4.jpg" />
				</div>
				<!--{/if}-->
				<div class="location">
					<div class="l1">
						<!--{$nav}-->
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > <a href="<!--{$cfg.web_url}-->about/index.htm">关于我们</a> > <!--{$nav}-->	
					</div>
				</div>
				<!--{if $typeId==8}-->
				<div class="info_about" style="margin-top:5px;margin-left:10px;height:350px;">
					<!--{$content}-->
				</div>
				<!--{else if $typeId==9}-->
				<div class="company_cul">
					<!--{$content}-->
				</div>
				<!--{else if $typeId==10}-->
				<div class="company_honour">
					<!--{$content}-->
				</div>
				<!--{else if $typeId==25}-->
				<div class="company_cul" style="height:auto;">
					<!--{$content}-->
				</div>
				<!--{/if}-->
				
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