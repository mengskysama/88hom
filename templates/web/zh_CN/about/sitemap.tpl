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
							<param name="movie" value="jianjie.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="jianjie.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_1.jpg" />
					<!--{/if}-->
				</div>
				<div class="location">
					<div class="l1">
						网站地图
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > 网站地图	
					</div>
				</div>
				<div class="company_cul" style="height:auto;">
		
					<div class="title" style="margin-bottom:10px;">
						<span class="a">星河首页</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">核心业务</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
							<a href="<!--{$cfg.web_url}-->business/index.htm">核心业务</a>

					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">项目概览</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->project/index-13.htm">星河COCO Park</a>
					<a href="<!--{$cfg.web_url}-->project/index-15.htm">星河第三空间</a>
					<a href="<!--{$cfg.web_url}-->project/index-12.htm">星河中心</a><br/>
					<a href="<!--{$cfg.web_url}-->project/index-14.htm">星河COCO City</a> 
					<a href="<!--{$cfg.web_url}-->project/index-16.htm">星河雅宝项目</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					<div class="title" style="margin-bottom:10px;">
						<span class="a">新闻中心</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->news/index.htm">公司动态</a> 
					<a href="<!--{$cfg.web_url}-->news/mediaLogin.htm">媒体专区</a> 
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">客户服务</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->service/index.htm">会员章程</a>
					<a href="<!--{$cfg.web_url}-->service/dzhk.htm">电子会刊</a>
					<a href="<!--{$cfg.web_url}-->service/ppgg.htm">品牌进驻</a>
					<a href="<!--{$cfg.web_url}-->service/ppgg.htm">广告租赁</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">人才资源</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->job/index-21.htm">人才理念</a> 
					<a href="<!--{$cfg.web_url}-->job/jobs.htm">人才招聘</a> 
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">联系我们</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->contact/index-22.htm">联系方式</a> 
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