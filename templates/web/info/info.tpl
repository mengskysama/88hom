<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}--><!--{$infoTypeStr}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function(){
	info_list_init();
	if('1'=='<!--{$type}-->')
		$('.xp a').eq(<!--{$infoType}-->-1).addClass('current');
	else
		$('.xp a').eq(<!--{$infoMainTypeCode}-->-1).addClass('current');
	
});
</script>
</head>
<body>
<!--主体面板-->
<div class="layer_content">
	<!--主体头部面板-->
	<!--{include file="info/header.tpl"}-->
    	<!--主体身部面板-->
    <div class="layer_content_2">
    	<!--广告面板1-->
        <div class="add"><img src="<!--{$cfg.web_images}-->web/add/add01.jpg" width="1000" height="70"/></div>
        <!--新盘-->
        <div class="xp_bg mb10">
        	<ul class="xp">
            	<li ><a href="<!--{$cfg.web_url}-->info/info.php?infoType=1&type=1">今日头条</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=2&type=1">楼市要闻</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=3&type=1">政策解读</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=4&type=1">行情数据</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=5&type=1">专家观点</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=6&type=1">热点观察</a></li>
            </ul>
        </div>
        <!--当前位置-->
        <p class="site"><a href="<!--{$cfg.web_url}-->">房不剩房</a> &gt; <a href="<!--{$cfg.web_url}-->info">资讯</a><!--{if $type==2}--> &gt; <a href="<!--{$cfg.web_url}-->info/info.php?infoType=<!--{$infoMainTypeCode}-->&type=1"><!--{$infoMainTypeName}--></a><!--{/if}--> &gt; <!--{$infoTypeStr}--></p>
        <div class="cont01">
        	<div class="news_left">
            	<div class="next pb10 "><span class="pagingPanel"><!--{$pageHtml}--></span></div>
            	<!--{foreach $infoList item=item key=key name=name}-->
                	<!--{if ($key % 8 == 0 && !$smarty.foreach.name.first) }-->
                	</ul>
                	<!--{/if}-->
                	<!--{if $key % 8 == 0}-->
                	<ul class="l_news">
                	<!--{/if}-->
                	
                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&infoType=<!--{$infoType}-->&type=<!--{$type}-->" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:40:"...":true}--></a><!--{$item.infoUpdateTime|date_format:'%Y-%m-%d'}--></li>
                	
                	<!--{if  $smarty.foreach.name.last }-->
                	</ul>
                	<!--{/if}-->
                <!--{/foreach}-->
                <div class="next pt10"><span class="pagingPanel"><!--{$pageHtml}--></span></div>
            </div>

        	<div class="right">
       	    	<div class="right01">
                	<p class="t_title_bg"><span class="t_title"><b class="a">新闻</b><b class="b">排行</b></span></p>
                    <ul class="xwph mt10">
                    	<!--{foreach $zixunpaihang_infoList item=item key=key}-->
                    	<li class="nub0<!--{$key+1}-->"><a href="info_detail.php?id=<!--{$item.infoId}-->&infoType=<!--{$infoType}-->&type=<!--{$type}-->" style="width:215px;" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></li>
                    	<!--{/foreach}-->
                    </ul>
                </div>
                <p class="r_add mt10"><img src="<!--{$cfg.web_images}-->web/add/add02.gif"></p>
                <div class="right01 mt10">
                	<p class="t_title_bg"><span class="t_title"><b class="a">热点</b><b class="b">专题</b></span><span class="c"><a href="info.php?infoType=6|600&type=2">更多&gt;&gt;</a></span></p>
                    <ul class="r_rdzt">
                    <!--{foreach $redianzhuanti_infoList item=item key=key name=name}-->
                    	<li><p class="pic02"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|600" title="<!--{$item.infoTitle}-->"><img width="95" height="76" src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->"></a></p>
                    		<a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|600" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:10:"...":true}--></a>
                    	</li>
					<!--{/foreach}-->
                    </ul>
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