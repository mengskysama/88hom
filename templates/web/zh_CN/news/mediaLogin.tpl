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
							<param name="movie" value="meiti.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="meiti.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/news_2.jpg" />
					<!--{/if}-->
				</div>			
				<div class="location">
					<div class="l1">
						媒体专区
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > <a href="<!--{$cfg.web_url}-->news/index.htm">新闻中心</a> > 媒体专区
					</div>
				</div>
				<div class="news">
					<div class="media_login">
						<div class="login_form">
							<form id="mediaLoginForm" name="mediaLoginForm" method="post" action="action.php?action=mediaLogin">
								<div class="x">
									<div class="a">
										<input id="username" name="username" type="text" value=""/>
									</div>
									<div class="b">
										<input id="password" name="password" type="password" value=""/>
									</div>
									<div class="c">
										<input id="valideCode" name="valideCode" type="text" value=""/> <img id="codeImg" onclick="this.src=this.src+'?op=login&'+Math.random()" src="<!--{$cfg.web_code_web}-->"/>
									</div>
								</div>
								<div class="d">
									<a href="javascript:exeWebMediaLogin();"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/i9.gif"/></a>
								</div>
							</form>
						</div>
						<div class="split"></div>
						<div class="link">
							<div class="title">媒体关系联络</div>
							<div class="content">
								<font>余小姐：</font>0755-23952360<br/>
								<font>赵小姐：</font>0755-23952361
							</div>
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
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/letter.gif"/>
</div>
</body>
</html>