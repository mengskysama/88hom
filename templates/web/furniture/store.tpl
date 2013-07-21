<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->家居卖场</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
//$(document).ready(furniture_index_init);
</script>
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
        <div class="cont">
        	<div class="left">
            	<div class="left_t">
                	<div class="mc_pic"><img src="<!--{$cfg.web_images}-->web/testing/jjmc.jpg"></div>
                    <div class="mczx">
                    	<div class="t_title_bg">
                            <b class="t_title">卖场资讯</b>
                            <span class="c red"><a href="info.php?infoType=7|710">更多&gt;&gt;</a></span>
                        </div>
                        <ul class="mczx_nr">
                        	<!--{foreach $maichang_infoList item=item key=key}-->
                        	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:32:"...":true}--></a></li>
                        	<!--{/foreach}-->
                        </ul>
                    </div>
                </div>
                <div class="jjmc">
                	<div class="t_title_bg">
                        <b class="t_title">家居卖场</b>
                        <!--<span class="c red"><a href="#">更多&gt;&gt;</a></span>-->
                    </div>
                    <!--{foreach $furnitureStoreList item=item key=key}-->
                    <dl>
                    	<dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.logo}-->"/><a name="store<!--{$item.id}-->"></a></dt>
                        <dd class="red16 mb10"><!--{$item.name}--></dd>
                        <dd>地址：<!--{$item.address}--></dd>
                        <dd>咨询电话：<!--{$item.phone}--></dd>
                        <dd>营业时间：<!--{$item.businessTime}--></dd>
                    </dl>
                    <!--{/foreach}-->
                    
                </div>
                
                
                
            </div>
            
            <div class="right">
            	<div class="mcrd">
                	<div class="t_title_bg">
                        <b class="t_title">卖场热点</b>
                        <span class="c red"><a href="info.php?infoType=7|703">更多&gt;&gt;</a></span>
                    </div>
                    <ul class="mcrd_nr">
                    	<!--{foreach $redian_infoList item=item key=key}-->
                        	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:19:"...":true}--></a></li>
                        <!--{/foreach}-->
                    </ul>
                </div>
                
                <p class="r_add mb10"><img src="<!--{$cfg.web_images}-->web/add/add05.jpg"></p>
                
                <div class="mcrd">
                	<div class="t_title_bg">
                        <b class="t_title">卖场排名</b>
                        <!--<span class="c red"><a href="#">更多&gt;&gt;</a></span>-->
                    </div>
                    <div class="mcpm">
	                    <ul>
	                    	<!--{foreach $furnitureStoreList_sort item=item key=key}-->
	                    	<li class="n0<!--{$key+1}-->"><a href="#store<!--{$item.id}-->"><!--{$item.name|truncate:19:"...":true}--></a></li>
	                        <!--{/foreach}-->
	                    </ul>
                    </div>
                </div>
           	</div>
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