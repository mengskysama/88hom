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
	$('#dzhk').change(function(){
		if($(this).val() != '')
		window.open($(this).val());
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
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="huikan.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="huikan.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/service_3.jpg" />
					<!--{/if}-->
				</div>
				<div class="location">
					<div class="l1">
						电子会刊
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > <a href="<!--{$cfg.web_url}-->service/index.htm">客户服务</a> > <a href="<!--{$cfg.web_url}-->service/index.htm">GCLUB</a> >电子会刊	
					</div>
				</div>
				<div class="publication">
						<div class="a">
								<select id="dzhk">
									<option value="" selected="selected">快速通道</option>
									<!--{foreach from=$mediaList key=key item=item}-->
									<option value="<!--{$cfg.web_url}-->uploads/<!--{$item.file_path}-->"><!--{$item.title}--></option>
									<!--{/foreach}-->
								</select>
						</div>
						<ul class="b">
							<!--{foreach from=$mediaList key=key item=item}-->
							<li>
								<div>
									<img width="170px" height="223px" src="<!--{$cfg.web_url}-->uploads/<!--{$item.pic_thumb}-->"/>
								</div>
								<div>
									<!--{$item.title}-->
								</div>
								<div>
									<a target="_brank" href="<!--{$cfg.web_url}-->uploads/<!--{$item.file_path}-->"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/i5.gif"/></a>
								</div>
							</li>
							<!--{/foreach}-->
						</ul>
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