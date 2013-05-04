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
	switchNavigation('a_6');
	$('.list').hover(function(){ 
	    $(this).addClass('level0');
	},function(){ 
	    $(this).removeClass('level0'); 
	});
	$('.list').click(function(){
		if($('#detail_'+$(this).attr('val')).is(":visible"))
	$('#detail_'+$(this).attr('val')).hide();
	else
	$('#detail_'+$(this).attr('val')).show();
	});
});	
</script>
</head>
<body>
<!-- 头部 -->
<!--{include file="header.tpl"}-->
<!-- 头部 -->
<div class="pic jobs_pic"></div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t24.jpg"/>
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
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t23.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<!--{if $typeId==0}-->
				<div style="float:left;width:768px;text-indent:25px;line-height:25px;color:#655858;">
					    以下职位信息均在中华英才网、智联招聘、前程无忧、建筑英才等网站发布，如果您在上述网站有注册账户和简历，则在相应网站投递简历即可，不必在此处重复投递，以节约您的时间。
				</div>
				<table class="jobs_tbl" cellspacing="0" cellpadding="0">
					<tr>
						<th>招聘职位</th><th>招聘部门</th><th>工作地点</th><th>招聘人数</th><th>发布日期</th>
					</tr>
					<!--{foreach from=$infoList key=key item=item}-->
					<tr class="list" val="<!--{$key}-->">
						<td><!--{$item.typeName}--></td>
						<td><!--{$item.dept}--></td>
						<td><!--{$item.address}--></td>
						<td><!--{$item.persons}--></td>
						<td><!--{$item.update_time|date_format:"%Y-%m-%d"}--></td>
					</tr>
					<tr class="list_detail" id="detail_<!--{$key}-->">
						<td>详情</td>
						<td colspan="4">
							<!--{$item.text_content}-->
						</td>
					</tr>
					<!--{/foreach}-->
				</table>
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