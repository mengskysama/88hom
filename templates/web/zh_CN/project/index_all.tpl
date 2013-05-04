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
	/*滚动文本*/
	//$('.project_wrap').jScrollPane({showArrows:false,scrollbarWidth:5});
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
				<div class="location">
					<div class="l1">
						项目概览
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > <a href="<!--{$cfg.web_url}-->project/index_all.htm">项目概览</a> > 项目概览	
					</div>
				</div>
				<div class="project">
					<div class="project_list_wrap">
						<ul class="project_list">
							<li>
								<a href="<!--{$cfg.web_url}-->project/index-13.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l1.gif"/></a>
							</li>
							<li>
								<a href="<!--{$cfg.web_url}-->project/index-14.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l2.gif"/></a>
							</li>
							<li>
								<a href="<!--{$cfg.web_url}-->project/index-15.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l3.gif"/></a>
							</li>
							<li>
								<a href="<!--{$cfg.web_url}-->project/index-12.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l4.gif"/></a>
							</li>
							<li>
								<a href="<!--{$cfg.web_url}-->project/index-16.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l5.jpg"/></a>
							</li>
						</ul>
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
	<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/projects.gif"/>
</div>
</body>
</html>