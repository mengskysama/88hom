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
	//��ʼҳ�湫������
	initPage();
});
</script>
</head>
<body>
<div class="layer_content">
	<!-- ͷ�� -->
	<!--{include file="header.tpl"}-->
	<!-- ͷ�� -->
	<div class="body_wrap">
		<div class="body">
			<!-- left -->
			<!--{include file="left.tpl"}-->
			<!-- left -->
			<div class="right">
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="xinwen.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="xinwen.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/news_1.jpg" />
					<!--{/if}-->
				</div>			
				<div class="location">
					<div class="l1">
						��ҵ��̬
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a> > <a href="<!--{$cfg.web_url}-->news/index.htm">��������</a> > <a href="<!--{$cfg.web_url}-->news/index.htm">��ҵ��̬</a> > <!--{$infoDetail.NewsTitle}--> 
					</div>
				</div>
				
				<div class="news">
					<div class="news_detail">
						<div class="title">
							<div id="newsTitle" class="a"><!--{$infoDetail.NewsTitle}--></div>
							<div id="newsAddTime" class="b">���ڣ�<!--{$infoDetail.AddTime}--></div>
						</div>
						<div class="content">
							<div id="newsContent" class="content_wrap">
								<!--{$infoDetail.NewsContent}-->
							</div>
						</div>
						<div class="rolling">
							<div id="next_prev" class="a">
								<!--{$nextPrevNews}-->
							</div>
							<div class="b">
								<!-- Baidu Button BEGIN -->
								<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
								<span class="bds_more">������</span>
								<a class="bds_qzone"></a>
								<a class="bds_tsina"></a>
								<a class="bds_tqq"></a>
								<a class="bds_renren"></a>
								<a class="bds_t163"></a>
								<a class="shareCount"></a>
								</div>
								<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=680956" ></script>
								<script type="text/javascript" id="bdshell_js"></script>
								<script type="text/javascript">
								document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
								</script>
								<!-- Baidu Button END -->
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<!-- �Ų� -->
	<!--{include file="footer.tpl"}-->
	<!-- �Ų� -->
</div>
<div class="layer_decoration">
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/letter.gif"/>
</div>
</body>
</html>