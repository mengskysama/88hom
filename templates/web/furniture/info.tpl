<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->装修指南</title>
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
        
        <!--装修指南-->
        <div class="cont">
        	<div class="left">
        		<p class="dqwz"><a href="<!--{$cfg.web_url}-->">房不剩房</a> > <a href="<!--{$cfg.web_url}-->furniture">家居</a> > <!--{$infoType}--></p>
                <p class="t_title_bg"><b class="t_title"><!--{$infoType}--></b></p>
                <!--{foreach $infoList item=item key=key name=name}-->
                	<!--{if ($key % 5 == 0 && !$smarty.foreach.name.first) }-->
                	</ul>
                	<!--{/if}-->
                	<!--{if $key % 5 == 0}-->
                	<ul class="zxzn">
                	<!--{/if}-->
                	
                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&infoTypeCode=<!--{$infoTypeCode}-->" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:40:"...":true}--></a><!--{$item.infoUpdateTime|date_format:'%Y-%m-%d'}--></li>
                	
                	<!--{if  $smarty.foreach.name.last }-->
                	</ul>
                	<!--{/if}-->
                <!--{/foreach}-->
                <div class="next mtb10">
					<!--{if $pageHtml !=''}-->
					<span class="pagingPanel">
							<!--{$pageHtml}-->
					</span>
					<!--{/if}-->
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
                        <span class="c red"><a href="store.php">更多&gt;&gt;</a></span>
                    </div>
                    <div class="mcpm">
	                    <ul>
	                    	<!--{foreach $furnitureStoreList_sort item=item key=key}-->
		                    	<li class="n0<!--{$key+1}-->"><a href="store.php#store<!--{$item.id}-->"><!--{$item.name|truncate:19:"...":true}--></a></li>
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