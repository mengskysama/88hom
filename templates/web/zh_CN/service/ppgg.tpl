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
				<div class="f_pic">
					<!--{if $cfg.web_type=='http'}-->
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="880"	 height="183" id="myFlash">
							<param name="movie" value="zhaoshang.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="zhaoshang.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/service_2.jpg" />
					<!--{/if}-->
				</div>
				<div class="location">
					<div class="l1">
						���̺���
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a> > <a href="<!--{$cfg.web_url}-->service/index.htm">�ͻ�����</a> > ���̺���	
					</div>
				</div>
				<div class="cooperation">
						<div class="title">
								Ʒ�ƽ�פ
						</div>
						<div class="p1">
								<font class="label">�������ߣ�</font>0755-23952323<br/>
								<font class="label">������Ŀ��</font>
								<div style="margin-left:50px;">
									<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l1.gif" height="60"/> 
									<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l2.gif" height="60"/> 
									<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l3.gif" height="60"/> 
									<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/l4.gif" height="60"/>
								</div>
						</div>	
						<div class="split">
						</div>	
						<div class="title">
								�����Դ
						</div>	
						<div class="title1">
								�Ǻ�����¥��LED�����
						</div>
						<div class="p2">
								<font class="label">��ϵ�ˣ�</font>��С��<br/>
								<font class="label">��ϵ�绰��</font>0755-23952365
						</div>

						<div class="title1" style="margin-top:20px;">
								�����Ǻ�COCO Park�������޼�������
						</div>
						<div class="p2">
								<font class="label">��ϵ�ˣ�</font>������<br/>
								<font class="label">��ϵ�绰��</font>0755-88315441
						</div>

						<div class="title1" style="margin-top:20px;">
								�����Ǻ�COCO Park�������޼�������
						</div>
						<div class="p2">
								<font class="label">��ϵ�ˣ�</font>������<br/>
								<font class="label">��ϵ�绰��</font>0755-89895165
						</div>						
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