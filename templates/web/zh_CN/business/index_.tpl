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
<!-- ͷ�� -->
<!--{include file="header.tpl"}-->
<!-- ͷ�� -->
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
					   ��ʢԴ����ҵ����ȫ�����򲼾ֹ����������ǿ�ļ������ƣ�����̽���Գ����ۺϿ���Ϊ��ͷ�ġ���ز�ģʽ��������ͨ����ط������ĺ�����������������Ĺ滮��ơ�������ʩ���������һ��������Ͷ�ʺ���Ӫ����������չ���������򻷾���Ʒ�ʣ�Ϊ���д����ֵ��
				</div>
				<div style="float:left;width:768px;text-indent:25px;line-height:25px;color:#655858;margin-bottom:20px;">
					   ��˾Ŀǰ�����ڷ�Χ���������ʮ����Ŀ����������һ�����Ƶ����羭Ӫ������ϵ�����ҵõ�ҵ��������ͬ���ͻ���Դ�������������������С�
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
							<div class="more"><a href="<!--{$cfg.web_url}-->business/d-<!--{$item.id}-->.htm">�˽����>></a></div>
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
<!-- �Ų� -->
<!--{include file="footer.tpl"}-->
<!-- �Ų� -->
</body>
</html>