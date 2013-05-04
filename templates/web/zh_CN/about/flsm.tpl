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
						法律声明
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > 法律声明
					</div>
				</div>
				<div class="company_cul" style="height:auto;">
		
					<div class="title" style="margin-bottom:10px;">
						<span class="a">法律声明</span>
					</div>
					<div class="p2"  style="margin-left:0px;height:300px;text-indent:25px;">
						本网站为城旭网络科技有限公司制作，由星河集团享有完整的著作权(包括版式权)。 本网站所有的文字、数据、版式、图片、图标、图表、表格、研究模型、创意均受到中华人民共和国法律及相关国际知识产权公约的著作权保护。 未经过本公司书面许可，任何组织和个人，不得基于任何商业目的使用本网站中的信息(包括本网站全部或部分内容)。 本网站中部分文字和数据采集于公开信息，相关权利为原著者所有。未经过原著者和本公司许可，任何组织和个人不得使用本网站的信息用于任何商业目的。 
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