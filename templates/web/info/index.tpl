<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->资讯首页</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(info_index_init);
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
            	<li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=1&type=1">今日头条</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=2&type=1">楼市要闻</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=3&type=1">政策解读</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=4&type=1">行情数据</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=5&type=1">专家观点</a></li>
                <li><a href="<!--{$cfg.web_url}-->info/info.php?infoType=6&type=1">热点观察</a></li>
            </ul>
        </div>
        <!--当前位置-->
        <div class="cont01">
        	<div class="left">
            	<div class="new_pic">
                    <p class="pic03"><img src="<!--{$cfg.web_images}-->web/testing/pic02_03.jpg"/></p>
                    <p class="tit03">530万元的北海道滑雪别墅</p>
                    <ul class="lb">
                        <li class="nubbg01"><a href="#">4</a></li>
                        <li class="nubbg01"><a href="#">3</a></li>
                        <li class="nubbg01"><a href="#">2</a></li>
                        <li class="nubbg02"><a href="#">1</a></li>
                    </ul>
                </div>
                <div class="zzjy">
                	<p class="szkp_tit"><span class="titbg sel1">住宅交易情报</span><span class="titbg">土地交易情报</span><span class="floatr pr10"><a href="info.php?type=2&infoType=4|400-4|401">更多&gt;&gt;</a></span></p>
                    <ul class="zzjy_nr">
                    <!--{foreach $zhuzaijiaoyiqingbao_infoList item=item key=key}-->
                    	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></li>
                     <!--{/foreach}-->	   
                    </ul>
                    <ul class="zzjy_nr">
                    <!--{foreach $tudijiaoyiqingbao_infoList item=item key=key}-->
                    	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></li>
                     <!--{/foreach}-->	
                    </ul>
                    <p class="szkp_tit bordert"><span class="titbg">楼市快递</span><span class="floatr pr10"><a href="info.php?type=2&infoType=4|402">更多&gt;&gt;</a></span></p>
                    <ul class="dskd">
                    <!--{foreach $loushikuaidi_infoList item=item key=key}-->
                    <li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></li>
                    <!--{/foreach}-->	
                    </ul>
                </div>
            </div>
            <div class="center">
               	<div class="news height01">
               		
                    <div class="news_special">
                    <!--{foreach $taotiao_infoList item=item key=key}-->
                    	<!--{if $key==0 || $key==7 || $key==11}-->
                    	<span class="link14 node_a"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=1&infoType=1" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></span>
                    	<!--{elseif $key==6 || $key==10}-->
                    	<span class="node_b node_b_s"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=1&infoType=1" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></span>
                    	<!--{elseif $key==1 || $key==2 || $key==4 || $key==5 || $key==8 || $key==9 || $key==12 || $key==13}-->
                    	<span class="node_b"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=1&infoType=1" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></span><span class="s">|</span>
                    	<!--{else}-->
                    	<span class="node_b"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=1&infoType=1" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></span>
                    	<!--{/if}-->
                    <!--{/foreach}-->	
                        
                    
                    </div>
                    <div class="news_class">
	                    <ul>
	                    	<!--{foreach $jujiao_infoList item=item key=key}-->
	                    	<li>
	                    		<a href="info.php?type=2&infoType=<!--{$item.infotypeId}-->|<!--{$item.infotypeSubId}-->">[<!--{$cfg.arr_info.infoType[$item.infotypeId].subType[$item.infotypeSubId]}-->]</a> 
	                    		<a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=<!--{$item.infotypeId}-->|<!--{$item.infotypeSubId}-->" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a>
	                    	</li>
	                    	<!--{/foreach}-->	
	                    </ul>
                     </div>
            	</div>
                <div class="bdyw mt10">
                	<p class="szkp_tit"><span class="titbg sel1">本地要闻</span><span class="titbg">国内要闻</span><span class="floatr pr10"><a href="info.php?type=2&infoType=2|200-2|201">更多&gt;&gt;</a></span></p>
                	<div>
                		<!--{foreach $bendi_infoList item=item key=key name=name}-->
		                	<!--{if ($key % 6 == 0 && !$smarty.foreach.name.first) }-->
		                	</ul>
		                	<!--{/if}-->
		                	<!--{if $key % 6 == 0}-->
		                	<ul class="news pt10">
		                	<!--{/if}-->
		                	
		                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|200" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></li>
		                	
		                	<!--{if  $smarty.foreach.name.last }-->
		                	</ul>
		                	<!--{/if}-->
		                <!--{/foreach}-->
                   </div>
                    <div>
                		<!--{foreach $gounei_infoList item=item key=key name=name}-->
		                	<!--{if ($key % 6 == 0 && !$smarty.foreach.name.first) }-->
		                	</ul>
		                	<!--{/if}-->
		                	<!--{if $key % 6 == 0}-->
		                	<ul class="news pt10">
		                	<!--{/if}-->
		                	
		                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|201" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle}--></a></li>
		                	
		                	<!--{if  $smarty.foreach.name.last }-->
		                	</ul>
		                	<!--{/if}-->
		                <!--{/foreach}-->
                   </div>
                </div>
            </div>
            <div class="right">
           	  <div class="rdzt">
                	<p class="t_title_bg"><span class="t_title"><b class="a">热点</b><b class="b">专题</b></span><span class="c"><a href="info.php?type=2&infoType=6|600">更多&gt;&gt;</a></span></p>
                	<!--{foreach $redianzhuanti_infoList item=item key=key name=name}-->
	                	<!--{if $key == 0 || $key == 1}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|600" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:12:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:30:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|600">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 2}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|600" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
                	<!--{/foreach}-->
                </div>
                <div class="rdzt mt10">
                	<p class="t_title_bg"><span class="t_title"><b class="a">网营</b><b class="b">调查</b></span><span class="c"><a href="info.php?type=2&infoType=4|407">更多&gt;&gt;</a></span></p>
                    <!--{foreach $wangyingdiaocha_infoList item=item key=key name=name}-->
	                	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|407" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:12:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:30:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|407">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|407" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
                	<!--{/foreach}-->
                </div>
            </div>
        </div>
        <!--广告-->
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add03.jpg" width="1000" height="97" /></p>
        <div class="cont01 pt10">
        	<div class="left01">
                <p class="t_title_bg"><span class="t_title"><b class="a">住宅</b><b class="b">交易分析</b></span><span class="c"><a href="info.php?type=2&infoType=4|403">更多&gt;&gt;</a></span></p>
                <!--{foreach $zhuzaijiaoyifenxi_infoList item=item key=key name=name}-->
	                	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|403" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|403">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|403" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
                <!--{/foreach}-->
                <p class="t_title_bg mt10"><span class="t_title"><b class="a">政策</b><b class="b">解读</b></span><span class="c"><a href="info.php?type=2&infoType=3|300">更多&gt;&gt;</a></span></p>
                <!--{foreach $zhengcejiedu_infoList item=item key=key name=name}-->
	                	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=3|300" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=3|300">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=3|300" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
                <!--{/foreach}-->
            </div>
            <div class="center">
            	<p class="t_title_bg"><span class="t_title"><b class="a">市场</b><b class="b">报告</b></span><span class="c"><a href="info.php?type=2&infoType=4|404">更多&gt;&gt;</a></span></p>
                <!--{foreach $shichang_infoList item=item key=key name=name}-->
		                	<!--{if ($key % 4 == 0 && !$smarty.foreach.name.first) }-->
		                	</ul>
		                	<!--{/if}-->
		                	<!--{if $key % 4 == 0}-->
		                	<ul class="news pt10">
		                	<!--{/if}-->
		                	
		                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|404" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
		                	
		                	<!--{if  $smarty.foreach.name.last }-->
		                	</ul>
		                	<!--{/if}-->
		         <!--{/foreach}-->
                <p class="t_title_bg mt10"><span class="t_title"><b class="b">政策</b></span><span class="c"><a href="info.php?type=2&infoType=3|301">更多&gt;&gt;</a></span></p>
                <ul class="news pt10">
                	<!--{foreach $zhengce_infoList item=item key=key}-->
                    	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                     <!--{/foreach}-->
                </ul>
            </div>
            <div class="right">
            	<div class="zrlp">
                	<p class="szkp_tit"><span class="titbg">编辑推荐新盘</span><span class="floatr mr10"><a href="#">更多&gt;&gt;</a></span></p>
                    <div class="zrlp_nr">
                    	<dl class="zrlp_nr_tit">
                        	<dt>楼盘</dt>
                            <dd>价格</dd>
                            <dd>位置</dd>
                        </dl>
                        <ul>
                        	<li class="nub01"><a href="#">中信领航2期</a><span>123</span><span>西乡</span></li>
                            <li class="nub02"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub03"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub04"><a href="#">中信领航2期</a><span>852222￥</span><span>西乡</span></li>
                            <li class="nub05"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub06"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub07"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub08"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub09"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub10"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                            <li class="nub11"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                        </ul>
                    </div>
                </div>
                <p class="r_add"><img src="<!--{$cfg.web_images}-->web/add/add02.gif" width="253" height="71" /></p>
            </div>
        </div>
        <!--广告-->
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add03.jpg" width="1000" height="97" /></p>
        <div class="cont01 pt10">
        	<div class="left01">
                <p class="t_title_bg"><span class="t_title"><b class="a">房企</b><b class="b">监测</b></span><span class="c"><a href="info.php?type=2&infoType=5|500">更多&gt;&gt;</a></span></p>
                <!--{foreach $fangqijianche_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|500" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|500">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|500" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		        <!--{/foreach}-->        
                <p class="t_title_bg mt10"><span class="t_title"><b class="a">土地</b><b class="b">交易分析</b></span><span class="c"><a href="info.php?type=2&infoType=4|405">更多&gt;&gt;</a></span></p>
                <!--{foreach $tudijiaoyifenxi_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|405" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|405">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|405" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		        <!--{/foreach}-->
                <p class="t_title_bg mt10"><span class="t_title"><b class="a">业内</b><b class="b">声音</b></span><span class="c"><a href="info.php?type=2&infoType=5|502">更多&gt;&gt;</a></span></p>
                <!--{foreach $yueneishengyin_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|502" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|502">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|502" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		        <!--{/foreach}-->
            </div>
            <div class="center">
            	<p class="t_title_bg"><span class="t_title"><b class="b">公司</b></span><span class="c"><a href="info.php?type=2&infoType=5|501">更多&gt;&gt;</a></span></p>
                <ul class="news pt10">
                	<!--{foreach $gongsi_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|501" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                     <!--{/foreach}-->
                </ul>
                <p class="t_title_bg mt10"><span class="t_title"><b class="b">土地</b></span><span class="c"><a href="info.php?type=2&infoType=4|401">更多&gt;&gt;</a></span></p>
                <ul class="news pt10">
                	<!--{foreach $tudi_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=4|401" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                     <!--{/foreach}-->
                </ul>
                <p class="t_title_bg mt10"><span class="t_title"><b class="b">金融</b></span><span class="c"><a href="info.php?type=2&infoType=5|503">更多&gt;&gt;</a></span></p>
                <ul class="news pt10">
                	<!--{foreach $jinrong_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|503" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                    <!--{/foreach}-->
                </ul>
            </div>
            <div class="right">
            	<div class="zrlp">
                	<p class="szkp_tit"><span class="titbg">大话地产</span><span class="floatr mr10"><a href="info.php?type=2&infoType=6|601">更多&gt;&gt;</a></span></p>
                    <div class="dhdc">
                    	<p class="r_add01"><img src="<!--{$cfg.web_images}-->web/testing/add11.jpg" width="231" height="75" /></p>
                        <ul class="mt10">
                        <!--{foreach $dahuadichan_infoList item=item key=key}-->
                    	<!--{if $key == 0}-->
                        	<span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|601" title="<!--{$item.infoTitle}-->"><b><!--{$item.infoTitle|truncate:20:"...":true}--></b></a></span>
                         <!--{else}-->
                        	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|601" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                        <!--{/if}-->	
                        <!--{/foreach}-->	
                        </ul>
                    </div>
                </div>
                <p class="r_add"><img src="<!--{$cfg.web_images}-->web/add/add02.gif" width="253" height="71" /></p>
                <div class="zrlp">
                	<p class="szkp_tit"><span class="titbg">高端访谈</span><span class="floatr mr10"><a href="info.php?type=2&infoType=5|504">更多&gt;&gt;</a></span></p>
                    <div class="dhdc">
                    	<!--{foreach $gaoduanfangtan_infoList item=item key=key name=name}-->
	                	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|504" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:12:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:30:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|504">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|504" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
                	<!--{/foreach}-->
                    </div>
                </div>
            </div>
        </div>
        <!--广告-->
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add03.jpg" width="1000" height="97" /></p>
        <div class="cont01 pt10">
        	<div class="left01">
           	  <div class="news_tit"><div class="n_tit1 floatl"><div class="n_tit2"><b>商业地产专题</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=6|602">更多&gt;&gt;</a></span></div>
                <!--{foreach $shangyuedichanzhuanti_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0}-->
	                	<dl>
	                        <dt><img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="95" height="76" /></dt>
	                        <dd><b><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|602" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:18:"...":true}--></a></b></dd>
	                        <dd><!--{$item.infoSummary|strip_tags|truncate:46:"...":true}--> <span class="red"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|602">[详细]</a></span></dd>
                    	</dl>
	                	<!--{else}-->
	                		<!--{if $key == 1}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=6|602" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		        <!--{/foreach}-->
              <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>项目</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=2|204">更多&gt;&gt;</a></span></div>
                <ul class="mt10">
                <!--{foreach $xianmu_infoList item=item key=key}-->
                	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|204" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
                <!--{/foreach}-->
                </ul>
                <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>二手房动态</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=2|206">更多&gt;&gt;</a></span></div>
                <div class="esfbg">
                <!--{foreach $ershoufangdongtai_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0 || $key==1}-->
		                    <p class="esf">
		                    	<img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="135" height="109" />
		                    	<a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|206" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:12:"...":true}--></a>
		                    </p>
		                <!--{if $key==1 || $smarty.foreach.name.last}-->    
		                </div>
		                <!--{/if}-->
                		<!--{else}-->
	                		<!--{if $key == 2}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|206" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		         <!--{/foreach}-->       
                <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>装修帮</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=7|700">更多&gt;&gt;</a></span></div>
                <div class="esfbg">
                <!--{foreach $zhangxiubang_infoList item=item key=key name=name}-->
                    	<!--{if $key == 0 || $key==1}-->
		                    <p class="esf">
		                    	<img src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->" width="135" height="109" />
		                    	<a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=7|700" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:12:"...":true}--></a>
		                    </p>
		                <!--{if $key==1 || $smarty.foreach.name.last}-->    
		                </div>
		                <!--{/if}-->
                		<!--{else}-->
	                		<!--{if $key == 2}-->
	                			<ul class="mt10">
	                		<!--{/if}-->
	                				<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=7|700" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:26:"...":true}--></a></li>
	                		<!--{if  $smarty.foreach.name.last }-->
		                		</ul>
		                	<!--{/if}-->
	                	<!--{/if}-->
		         <!--{/foreach}-->
            </div>
            <div class="center">
            	<div class="news_tit"><div class="n_tit1 floatl"><div class="n_tit2"><b>写字楼 商铺</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=2|203">更多&gt;&gt;</a></span></div>
                <ul class="news pt10">
                	<!--{foreach $xueziluoshangpu_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|203" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                    <!--{/foreach}-->
                </ul>
                <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>别墅</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=5|501">更多&gt;&gt;</a></span></div>
                <ul class="news pt10">
                	<!--{foreach $bieshu_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=5|501" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                    <!--{/foreach}-->
                </ul>
                <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>二手房</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=2|207">更多&gt;&gt;</a></span></div>
                <ul class="news pt10">
                	<!--{foreach $ershoufang_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=2|207" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                    <!--{/foreach}-->
                </ul>
                <div class="news_tit mt10"><div class="n_tit1 floatl"><div class="n_tit2"><b>装修</b></div></div><span class="floatr"><a href="info.php?type=2&infoType=7|701">更多&gt;&gt;</a></span></div>
                <ul class="news pt10">
                	<!--{foreach $zhangxiu_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->&type=2&infoType=7|701" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:28:"...":true}--></a></li>
                    <!--{/foreach}-->
                </ul>
            </div>
            <div class="right">
            	<div class="jqkp">
                  <p class="t_title_bg"><span class="t_title"><b class="a">近期</b><b class="b">开盘</b></span><span class="c"><a href="#">更多&gt;&gt;</a></span></p>
                  <div class="zrlp_nr">
                      <dl class="zrlp_nr_tit">
                          <dt>楼盘</dt>
                          <dd>价格</dd>
                          <dd>位置</dd>
                      </dl>
                      <ul>
                          <li class="nub01"><a href="#">中信领航2期</a><span>123</span><span>西乡</span></li>
                          <li class="nub02"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub03"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub04"><a href="#">中信领航2期</a><span>852￥</span><span>西乡</span></li>
                          <li class="nub05"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub06"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub07"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                    	</ul>
              		</div>
              	</div>
                <div class="jqkp mt10">
                  <p class="t_title_bg"><span class="t_title"><b class="a">资讯</b><b class="b">排行榜</b></span></span></p>
                  <div class="zrlp_nr">
                      <ul>
                      	<!--{foreach $zhangxiu_infoList item=item key=key}-->
                    	<li class="nub0<!--{$key+1}-->"><a href="info_detail.php?id=<!--{$item.infoId}-->&type=1" style="width:215px;" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                    	<!--{/foreach}-->
                    	</ul>
              		</div>
              	</div>
                <div class="jqkp mt10">
                  <p class="t_title_bg"><span class="t_title"><b class="a">上月新盘</b><b class="b">销售排行</b></span><span class="c"><a href="#">更多&gt;&gt;</a></span></p>
                  <div class="zrlp_nr">
                      <dl class="zrlp_nr_tit">
                          <dt>楼盘</dt>
                          <dd>价格</dd>
                          <dd>位置</dd>
                      </dl>
                      <ul>
                          <li class="nub01"><a href="#">中信领航2期</a><span>123</span><span>西乡</span></li>
                          <li class="nub02"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub03"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub04"><a href="#">中信领航2期</a><span>852￥</span><span>西乡</span></li>
                          <li class="nub05"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub06"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                          <li class="nub07"><a href="#">中信领航2期</a><span>待定</span><span>西乡</span></li>
                    	</ul>
              		</div>
              	</div>
            </div>
        </div>
        <!--样板间-->
        <div class="ybj">
        	<p class="ybj_tit"><b class="tit01">样板间</b><span class="floatr pr10">收录 <span class="red">145114</span> 张图片 <a href="#">查看&gt;&gt;</a></span></p>
            <div class="ybj_nr">
                <div class="ybj_left">
                	<dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic01.gif" /></dt>
                        <dd><a href="#">中式</a> | <a href="#">欧式</a> | <a href="#">韩式</a> | <a href="#">日式</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a></dd>
                    </dl>
                    <dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic02.gif" /></dt>
                        <dd><a href="#">中式</a> | <a href="#">欧式</a> | <a href="#">韩式</a> | <a href="#">日式</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a></dd>
                    </dl>
                    <dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic03.gif" /></dt>
                        <dd><a href="#">中式</a> | <a href="#">欧式</a> | <a href="#">韩式</a> | <a href="#">日式</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a><br><a href="#">美式</a> | <a href="#">现代</a> | <a href="#">简约</a> | <a href="#">田园</a></dd>
                    </dl>
                </div>
                <div class="ybj_right">
                	<ul class="ybj_right_tit">
                        <li class="sel01"><a href="#">小户型</a></li>
                        <li><a href="#"></a>中户型</li>
                        <li><a href="#"></a>中户型</li>
                        <li><a href="#"></a>中户型</li>
                        <li><a href="#"></a>中户型</li>
                    </ul>
                    <ul class="ybj_right_nr">
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
                        <li><a href="#"><span class="pic01"><img src="<!--{$cfg.web_images}-->web/testing/pic05.jpg" width="120" height="96" /></span>5万装素白雅静家</a></li>
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