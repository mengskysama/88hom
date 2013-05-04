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
	initPage();
	$(".jobs_tbl:first tbody tr:even").css("background-color", "#eee"); //����ɫ
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
							<param name="movie" value="zhaopin.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="zhaopin.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/job_2.jpg" />
					<!--{/if}-->
				</div>
				<div class="location">
					<div class="l1">
						�˲���Ƹ
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a> > <a href="<!--{$cfg.web_url}-->job/index.htm">������Դ</a> > �˲���Ƹ	
					</div>
				</div>
				<div class="jobs">
					<div class="wrap_jobs_tbl">
					<table class="jobs_tbl" cellspacing="0" cellpadding="0">
						<tr>
							<th>ְλ����</th><th>�����ص�</th><th>����</th><th>��������</th><th>��������</th>
						</tr>
						<!--{foreach from=$infoListNew key=key item=item}-->
						<tr class="list" val="1">
							<td><a target="_brank" href="<!--{$item.JobUrl}-->"><!--{$item.JobName}--></a></td>
							<td><!--{$item.JobArea}--></td>
							<td><!--{$item.JobDept}--></td>
							<td><!--{$item.PostDate}--></td>
							<td><a target="_brank" href="http://chngalaxy.hirede.com/CareerSiteAccount/SignIn">��������</a></td>
						</tr>
						<!--{/foreach}-->
					</table>
					</div>
					<span class="pagingPanel">
						<!--{$divPage}-->
					</span>
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