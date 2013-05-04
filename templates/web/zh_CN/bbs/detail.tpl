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
	switchNavigation('a_3');
	$('.messages_list li:odd').addClass('odd');
	$('.messages_list li:even').addClass('even');
});	
</script>
</head>
<body>
<!-- 头部 -->
<!--{include file="header.tpl"}-->
<!-- 头部 -->
<div class="pic news_pic">	</div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t20.jpg"/>
			</div>
			<ul>
				<!--{$nav}-->
				<li><a href="javascript:exeWebCheckLogin();" class="current">员工天地</a></li>
			</ul>
			<div class="b">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t17.jpg"/>
			</div>
		</div>
		<div class="right">
			<div class="location">
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t45.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<div style="float:left;width:768px;text-align:right;border-bottom:1px solid #ccc;">
					<a href="release.htm"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t46.jpg"/></a>
					<a href="#reply"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t47.jpg"/></a>
				</div>
					<table class="new_msg_tbl" style="margin-top:10px;">
						<tr>
							<td>
								<span style="float:left;">
									<span style="float:left;color:#F35151;"><!--{$infoDetail.uname}--></span>
									<span style="float:left;margin-left:20px;color:#6666;">发布于：<!--{$infoDetail.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--></span>
								</span>
								<span style="float:right;color:#F35151;font-weight:bold;">楼主</span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="color:#666;font-weight:bold;">
									<!--{$infoDetail.title}-->
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<!--{$infoDetail.content}-->
							</td>
						</tr>
					</table>
				<div style="float:left;width:748px;color:#666;font-weight:bold;margin-top:20px;float:left;padding-left:20px;">回复列表</div>
				<ul class="reply_list">
					<!--{foreach from=$infoList key=key item=item}-->
					<li>
						<div class="a">#<!--{$key+1}-->楼 <!--{$item.create_time|date_format:"%Y-%m-%d %H:%M:%S"}--> <!--{$item.uname}--></div>
						<div class="b">
							<!--{$item.content}-->
						</div>
					</li>
					<!--{/foreach}-->
				</ul>
				<span class="pagingPanel">
					<!--{$divPage}-->
				</span>
				<form id="replyForm" action="action.php?action=reply" method="post">
					<input type="hidden" id="bid" name="bid" value="<!--{$infoDetail.id}-->"/>
					<div style="float:left;width:768px;margin-top:20px;"><a name="reply"></a>
						<!--{$FCKeditor}-->
					</div>
				</form>
				<div style="float:left;width:768px;margin-top:10px;float:left;">
					<a href="javascript:exeWebBbsReply();" ><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t49.jpg"/></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 脚部 -->
<!--{include file="footer.tpl"}-->
<!-- 脚部 -->
</body>
</html>