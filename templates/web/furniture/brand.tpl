<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->家居品牌馆</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body>
<!--主体面板-->
<div class="layer_content">
	<!--主体头部面板-->
	<!--{include file="furniture/header.tpl"}-->
    <div class="layer_content_2">
    	<!--广告-->
   		<div class="add">
        	<p class="add01"><img src="<!--{$cfg.web_images}-->web/add/add09.jpg"></p>
            <p class="add02"><img src="<!--{$cfg.web_images}-->web/add/add10.jpg"></p>
            <p class="add01"><img src="<!--{$cfg.web_images}-->web/add/add09.jpg"></p>
        </div>
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add03.jpg"></p>
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add04.jpg"></p>
        
        <!--家居品牌馆-->
        <div class="ppg">
        	<div class="ppg_left">
            	<p class="ppg_left_tit"><a href="brand.php"><img src="<!--{$cfg.web_images}-->web/ppg_tit.gif"></a></p>
                <p class="ppg_left_fl"><a href="brand.php?brandTypeId=1"><img src="<!--{$cfg.web_images}-->web/p_01.gif"></a></p>
                <p class="ppg_left_fl"><a href="brand.php?brandTypeId=2"><img src="<!--{$cfg.web_images}-->web/p_02.gif"></a></p>
                <p class="ppg_left_fl"><a href="brand.php?brandTypeId=3"><img src="<!--{$cfg.web_images}-->web/p_03.gif"></a></p>
            </div>
            <ul class="ppg_right" style="height:auto;">
            	<!--{foreach $brandList item=item key=key}-->
            	<li><a <!--{if $item.url!='javascript:;'}-->target="_blank"<!--{/if}--> href="<!--{$item.url}-->" title="<!--{$item.name}-->"><img width="148" height="118" src="<!--{$cfg.web_url_upload}--><!--{$item.picThumb}-->"></a></li>
            	<!--{/foreach}-->
            </ul>
        </div>
     </div>
	<!--脚部-->
	<!--{include file="../footer.tpl"}-->
</div>
<!--装饰头部左边无限延伸-->
<div class="layer_decoration_left"></div>
<!--装饰头部右边无限延伸-->
<div class="layer_decoration_right"></div>
</body>
</html>