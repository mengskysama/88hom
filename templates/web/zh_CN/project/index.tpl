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
	//��ʼҳ�湫������
	initPage();
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
				<div class="location">
					<div class="l1">
						��Ŀ����
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a> > ��Ŀ����	
					</div>
				</div>
				<div class="project" style="height:500px;">
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/p27.jpg" border="0" usemap="#Map"/>
                    <map name="Map" id="Map">
                      <area shape="rect" coords="3,5,181,290" href="<!--{$cfg.web_url}-->project/index-23.htm" />
                      <area shape="rect" coords="191,3,367,291" href="<!--{$cfg.web_url}-->project/index-14.htm" />
                      <area shape="rect" coords="544,3,826,176" href="<!--{$cfg.web_url}-->project/index-12.htm" />
                      <area shape="rect" coords="3,300,367,428" href="<!--{$cfg.web_url}-->project/index-24.htm" />
                      <area shape="rect" coords="371,180,640,426" href="<!--{$cfg.web_url}-->project/index-15.htm" />
                      <area shape="rect" coords="646,180,825,426" href="<!--{$cfg.web_url}-->project/index-16.htm" />
                    </map>
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