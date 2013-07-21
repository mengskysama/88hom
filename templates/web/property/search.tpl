<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<meta name="keywords" content="<!--{$cfg.web_page.keyword}-->" />
<meta name="description" content="<!--{$cfg.web_page.description}-->" />
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body>
<!--主体面板-->
<div class="layer_content">
	<!-- 头部-->
	<!--{include file="<!--{$headerSearch}-->"}-->
	<!-- 头部 -->
	<!--主体身部面板-->
    <div class="layer_content_2">
    	<!--广告面板1-->
        <div class="add mt10">
            <img src="<!--{$cfg.web_images}-->web/add/add01.jpg" width="1000" height="70"/>        </div>
        <!--新盘-->
        <div class="xp_bg">
        	<ul class="xp">
            	<li><a href="#">最新开盘</a></li>
                <li><a href="#">热门楼盘</a></li>
                <li><a href="#">优惠团房</a></li>
                <li><a href="#">地图看房</a></li>
                <li><a href="#">商业地产</a></li>
                <li><a href="#">购房工具</a></li>
                <li><a href="#">视频看房</a></li>
            </ul>
        </div>
        <!--当前位置-->
        <p class="site">房不剩房 &gt; <a href="#">新盘</a> &gt; 最新开盘</p>
        <div class="cont">
			<!--最新开盘-->
            <div class="left">
            	<div class="xplb">
            		<!--{foreach from=$propertyList item=item key=key}-->
                	<dl>
                    	<dt><a href="xpIndex_<!--{$item.propertyId}-->.htm" target="_blank" title="<!--{$item.propertyName}-->"><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->" width="120" height="96" alt="<!--{$item.picInfo}-->"/></a></dt>
                        <dd class="mb10">
                        <span class="floatl"><a href="xpIndex_<!--{$item.propertyId}-->.htm" target="_blank" class="link14" title="<!--{$item.propertyName}-->"><!--{$item.propertyNameHighlight}--> [ <!--{if $item.propertyIsHouseType==1}-->住宅<!--{/if}--> <!--{if $item.propertyIsBusinessType==1}-->商铺<!--{/if}--> <!--{if $item.propertyIsOfficeType==1}-->写字楼<!--{/if}--> <!--{if $item.propertyIsVillaType==1}-->别墅<!--{/if}--> ]</a></span>
                        <span class="floatr"><!--{if $item.propertyOpenPrice!=0}-->均价 <b class="red16"><!--{$item.propertyOpenPrice}--></b> 元/平方米<!--{else}--><!--{if $item.propertyOpenPriceRemark!=''}--><b class="red16"><!--{$item.propertyOpenPriceRemark}--></b><!--{else}--><b class="red16">价格待定</b><!--{/if}--><!--{/if}--></span>
                        </dd>
                        <dd><!--{if $item.propertyDevCompany!=''}--><!--{$item.propertyDevCompany}--><!--{else}-->--<!--{/if}--></dd>
                        <dd><span class="floatl grey"><!--{if $item.propertySellAddress!=''}--><!--{$item.propertySellAddressHighlight}--><!--{else}-->暂无资料<!--{/if}--></span><span class="floatl pl"><img src="<!--{$cfg.web_images}-->web/cz.gif" /></span><span class="floatl red pl">查看地图</span></dd>
                        <dd><p class="floatl">业主论坛<span class="red"> (10407) </span> 户型图<span class="red"> (10)</span></p><p class="floatr"><span class="red"><!--{if $item.propertyHotline!=''}--><!--{$item.propertyHotline}--><!--{else}-->--<!--{/if}--></span></p></dd>
                    </dl>
                    <!--{/foreach}-->
                    <div class="next">
						<span class="pagingPanel">
							<!--{$divPage}-->
						</span>
					</div>
                </div>
            </div>
            <div class="right">
            	<p class="r_add"><img src="<!--{$cfg.web_images}-->web/add/add02.gif" width="253" height="71" /></p>
                <!--深圳最新开盘-->
                <div class="zrlp">
                	<p class="szkp_tit"><span class="titbg">深圳最新开盘</span><span class="floatr mr10"><a href="#">更多&gt;&gt;</a></span></p>
                    <div class="zrlp_nr">
                    	<dl class="zrlp_nr_tit">
                        	<dt>楼盘</dt>
                            <dd>价格</dd>
                            <dd>位置</dd>
                        </dl>
                        <ul>
                        	<!--{foreach from=$propertyListNew item=item key=key}-->
                        	<!--{if $key>=9}-->
                        	<li class="nub<!--{$key+1}-->">
                        	<a target="_blank" href="xpIndex_<!--{$item.propertyId}-->.htm" title="<!--{$item.propertyName}-->"><!--{$item.propertyName|truncate:8:"":true}--></a>
                        	<span><!--{if $item.propertyOpenPrice!=0}--><!--{$item.propertyOpenPrice}--><!--{else}--><!--{if $item.propertyOpenPriceRemark!=''}--><b class="red16"><!--{$item.propertyOpenPriceRemark}--></b><!--{else}--><b class="red16">待定</b><!--{/if}--><!--{/if}--></span>
                        	<span><!--{$item.propertyAreaName}--></span>
                        	</li>
                        	<!--{else}-->
                        	<li class="nub0<!--{$key+1}-->">
                        	<a target="_blank" href="xpIndex_<!--{$item.propertyId}-->.htm" title="<!--{$item.propertyName}-->"><!--{$item.propertyName|truncate:8:"":true}--></a>
                        	<span><!--{if $item.propertyOpenPrice!=0}--><!--{$item.propertyOpenPrice}--><!--{else}--><!--{if $item.propertyOpenPriceRemark!=''}--><!--{$item.propertyOpenPriceRemark}--><!--{else}-->待定<!--{/if}--><!--{/if}--></span>
                        	<span><!--{$item.propertyAreaName}--></span>
                        	</li>
                        	<!--{/if}-->
                        	<!--{/foreach}-->
                        </ul>
                    </div>
                </div>
                <!--深圳热门楼盘-->
                <div class="zrlp">
                	<p class="szkp_tit"><span class="titbg">深圳最热开盘</span><span class="floatr mr10"><a href="#">更多&gt;&gt;</a></span></p>
                    <div class="zrlp_nr">
                    	<dl class="zrlp_nr_tit">
                        	<dt>楼盘</dt>
                            <dd>价格</dd>
                            <dd>位置</dd>
                        </dl>
                        <ul>
                        	<!--{foreach from=$propertyListNew item=item key=key}-->
                        	<!--{if $key>=9}-->
                        	<li class="nub<!--{$key+1}-->">
                        	<a target="_blank" href="xpIndex_<!--{$item.propertyId}-->.htm" title="<!--{$item.propertyName}-->"><!--{$item.propertyName|truncate:8:"":true}--></a>
                        	<span><!--{if $item.propertyOpenPrice!=0}--><!--{$item.propertyOpenPrice}--><!--{else}--><!--{if $item.propertyOpenPriceRemark!=''}--><!--{$item.propertyOpenPriceRemark}--><!--{else}-->待定<!--{/if}--><!--{/if}--></span>
                        	<span><!--{$item.propertyAreaName}--></span>
                        	</li>
                        	<!--{else}-->
                        	<li class="nub0<!--{$key+1}-->">
                        	<a target="_blank" href="xpIndex_<!--{$item.propertyId}-->.htm" title="<!--{$item.propertyName}-->"><!--{$item.propertyName|truncate:8:"":true}--></a>
                        	<span><!--{if $item.propertyOpenPrice!=0}--><!--{$item.propertyOpenPrice}--> <!--{else}--><!--{if $item.propertyOpenPriceRemark!=''}--><!--{$item.propertyOpenPriceRemark}--><!--{else}-->待定<!--{/if}--><!--{/if}--></span>
                        	<span><!--{$item.propertyAreaName}--></span>
                        	</li>
                            <!--{/if}-->
                        	<!--{/foreach}-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- 脚部-->
	<!--{include file="<!--{$footer}-->"}-->
	<!-- 脚部 -->
</div>
<!--装饰头部左边无限延伸-->
<div class="layer_decoration_left"></div>
<!--装饰头部右边无限延伸-->
<div class="layer_decoration_right"></div>
</body>
</html>