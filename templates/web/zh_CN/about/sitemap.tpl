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
							<param name="movie" value="jianjie.swf" />
							<param name="wmode" value="transparent" />
							<param name="quality" value="high" />
							<embed wmode="transparent" src="jianjie.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"  width="880" height="183" name="myFlash" id="myFlash1"></embed>
					</object>
					<!--{else}-->
					<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/about_1.jpg" />
					<!--{/if}-->
				</div>
				<div class="location">
					<div class="l1">
						��վ��ͼ
					</div>
					<div class="l2">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a> > ��վ��ͼ	
					</div>
				</div>
				<div class="company_cul" style="height:auto;">
		
					<div class="title" style="margin-bottom:10px;">
						<span class="a">�Ǻ���ҳ</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
						<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">����ҵ��</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
							<a href="<!--{$cfg.web_url}-->business/index.htm">����ҵ��</a>

					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">��Ŀ����</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->project/index-13.htm">�Ǻ�COCO Park</a>
					<a href="<!--{$cfg.web_url}-->project/index-15.htm">�Ǻӵ����ռ�</a>
					<a href="<!--{$cfg.web_url}-->project/index-12.htm">�Ǻ�����</a><br/>
					<a href="<!--{$cfg.web_url}-->project/index-14.htm">�Ǻ�COCO City</a> 
					<a href="<!--{$cfg.web_url}-->project/index-16.htm">�Ǻ��ű���Ŀ</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					<div class="title" style="margin-bottom:10px;">
						<span class="a">��������</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->news/index.htm">��˾��̬</a> 
					<a href="<!--{$cfg.web_url}-->news/mediaLogin.htm">ý��ר��</a> 
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">�ͻ�����</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->service/index.htm">��Ա�³�</a>
					<a href="<!--{$cfg.web_url}-->service/dzhk.htm">���ӻ`</a>
					<a href="<!--{$cfg.web_url}-->service/ppgg.htm">Ʒ�ƽ�פ</a>
					<a href="<!--{$cfg.web_url}-->service/ppgg.htm">�������</a>
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">�˲���Դ</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->job/index-21.htm">�˲�����</a> 
					<a href="<!--{$cfg.web_url}-->job/jobs.htm">�˲���Ƹ</a> 
					</div>
					<div class="split" style="margin:10px 0px;"></div>
					
					<div class="title" style="margin-bottom:10px;">
						<span class="a">��ϵ����</span>
					</div>
					<div class="p2"  style="margin-left:0px;">
					<a href="<!--{$cfg.web_url}-->contact/index-22.htm">��ϵ��ʽ</a> 
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