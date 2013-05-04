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
				<!--{if $typeId==13}-->
						<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/p11.jpg" border="0" usemap="#Map" width="880"/>
                            <map name="Map" id="Map">
                              <area shape="rect" coords="1,2,418,157" href="index-23.htm" />
                              <area shape="rect" coords="421,3,827,156" href="index-24.htm" />
                            </map>
                      	</div>
						<!--{elseif $typeId==23}-->
						<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/ft.jpg" width="880"/>
                    	</div>
                    	<!--{elseif $typeId==24}-->
                    	<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/p12.jpg" width="880"/>
                    	</div>
                    	<!--{elseif $typeId==15}-->
                    	<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/ds.jpg" width="880"/>
                    	</div>
                    	<!--{elseif $typeId==14}-->
                    	<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/city.jpg" width="880"/>
                    	</div>
                    	<!--{elseif $typeId==12}-->
                    	<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/zx.jpg" width="880"/>
                    	</div>
                    	<!--{elseif $typeId==16}-->
                    	<div class="i_pic">
							<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/yb.jpg" width="880"/>
                    	</div>
						<!--{/if}-->
				<div class="location">
					<div class="l1">
						<!--{$title}-->
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a> > <a href="<!--{$cfg.web_url}-->project/index.htm">项目概览</a> > <!--{$nav}-->
					</div>
				</div>
				<div class="project">
					<div class="project_wrap">
						<div class="content">
							<!--{$content}-->
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