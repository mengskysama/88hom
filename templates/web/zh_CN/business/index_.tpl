<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<meta name="keywords" content="<!--{$cfg.web_page.keyword}-->" />
<meta name="description" content="<!--{$cfg.web_page.description}-->" />
<title><!--{$cfg.web_page.title}--></title> 
<!--{$cssFiles}-->
<!--{$jsFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	switchNavigation("<!--{if $typeId==14}-->a_4<!--{else}-->a_5<!--{/if}-->");
});	
</script>
</head>
<body>
<!-- 头部 -->
<!--{include file="header.tpl"}-->
<!-- 头部 -->
<div class="pic plan_pic"></div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t21.jpg"/>
			</div>
			<ul>
				<!--{$nav}-->
			</ul>
			<div class="b">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t17.jpg"/>
			</div>
		</div>
		<div class="right">
			<div class="location">
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t39.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<!--{if $typeId==16 or $typeId==14}-->
				<div style="float:left;width:768px;text-indent:25px;line-height:25px;color:#655858;margin-bottom:10px;">
					   祥盛源发挥业务板块全、区域布局广和融资能力强的集团优势，积极探索以城市综合开发为龙头的“大地产模式”；我们通过与地方政府的合作，参与城市新区的规划设计、基础设施建设和土地一级开发的投资和运营，带动区域发展，提升区域环境和品质，为城市创造价值。
				</div>
				<div style="float:left;width:768px;text-indent:25px;line-height:25px;color:#655858;margin-bottom:20px;">
					   公司目前在深圳范围共代理过数十个项目，并建立起一套完善的网络经营管理体系，有幸得到业内朋友认同，客户资源库正在向珠三角扩充中。
				</div>
				<ul class="development_list">
					<!--{foreach from=$infoList key=key item=item}-->
					<li>
						<div class="a">
							<img src="<!--{$cfg.web_url}-->uploads/<!--{$item.path_thumb}-->"/>
						</div>
						<div class="b">
							<div class="title"><!--{$item.title}--></div>
							<div class="desc">
								<!--{$item.text_content_min}-->
							</div>
							<div class="more"><a href="<!--{$cfg.web_url}-->business/d-<!--{$item.id}-->.htm">了解更多>></a></div>
						</div>
					</li>
					<!--{/foreach}-->
				</ul>
				<span class="pagingPanel">
					<!--{$divPage}-->
				</span>
				<!--{else}-->
					<!--{$infoDetail.text_content}-->
				<!--{/if}-->
			</div>
		</div>
	</div>
</div>
<!-- 脚部 -->
<!--{include file="footer.tpl"}-->
<!-- 脚部 -->
</body>
</html>