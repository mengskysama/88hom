<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->_<!--{$cfg.arr_info.infoType[$info.infotypeId].caption}-->_<!--{$cfg.arr_info.infoType[$info.infotypeId].subType[$info.infotypeSubId]}-->_<!--{$info.infoTitle}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function(){
	info_detail_init();
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
        <p class="site">
        			<a href="<!--{$cfg.web_url}-->">房不剩房</a> &gt; 
        			<a href="<!--{$cfg.web_url}-->info">资讯</a>
        			<!--{if $type==2}--> &gt; <a href="<!--{$cfg.web_url}-->info/info.php?infoType=<!--{$infoMainTypeCode}-->&type=1"><!--{$infoMainTypeName}--></a><!--{/if}--> &gt; <!--{$infoTypeStr}-->
        </p>
        <div class="cont01">
        	<div class="news_left">
            	<p class="xx_tit"><!--{$info.infoTitle}--></p>
            	<div class="xx_come pb10 pt10">
            		<span class="grey" ><!--{$info.infoUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></span> 
            		<span class="red pl10" ><!--{$info.infoSource}--></span>  
            		<span ><a href="#comment" class="pl10">评论</a> <!-- <a href="#" class="pl10">收藏</a> --></span>
            		<span >
							<!-- Baidu Button BEGIN -->
							<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
							<a class="bds_qzone"></a>
							<a class="bds_tsina"></a>
							<a class="bds_tqq"></a>
							<a class="bds_renren"></a>
							<a class="bds_t163"></a>
							<span class="bds_more">更多</span>
							<a class="shareCount"></a>
							</div>
							<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=680956" ></script>
							<script type="text/javascript" id="bdshell_js"></script>
							<script type="text/javascript">
							document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
							</script>
							<!-- Baidu Button END -->
            		</span>
            	</div>
                
                
                <!--{if $info.infoSummary != ''}-->
                <div class="xx_ly"><b class="red">[摘要]</b><!--{$info.infoSummary}--></div>
                <!--{/if}-->
                <div class="xx_nr"><!--{$info.infoContent}--></div>
                
                <div class="xgxw">
                	<ul>
                    	<b class="red16">延伸阅读：</b>
                    	<li><a href="#">新区岁末购房有优惠 6大精装楼盘12500起减2万</a></li>
                        <li><a href="#">新区刚需在售盘 均价最低7800元/平最高惠20000</a></li>
                        <li><a href="#">抢搭2012末班车 新区5大高赠送热盘年末出战10000起</a></li>
                        <li><a href="#">龙华新区叫板关内 9大盘最低15000享轨道便利</a></li>
                        <li><a href="#">龙华新区叫板关内 9大热盘最低15000元/平起</a></li>
                        <li><a href="#">龙华光明新区叫板关内 68平复式房首付仅30万</a></li>
                        <li><a href="#">深圳新区7盘元宵拼优惠 折扣最低85折最高惠4万</a></li>
                    </ul>
                    <ul>
                    	<b class="red16">相关新闻：</b>
                    	<li><a href="#">新区岁末购房有优惠 6大精装楼盘12500起减2万</a></li>
                        <li><a href="#">新区刚需在售盘 均价最低7800元/平最高惠20000</a></li>
                        <li><a href="#">抢搭2012末班车 新区5大高赠送热盘年末出战10000起</a></li>
                        <li><a href="#">龙华新区叫板关内 9大盘最低15000享轨道便利</a></li>
                        <li><a href="#">龙华新区叫板关内 9大热盘最低15000元/平起</a></li>
                        <li><a href="#">龙华光明新区叫板关内 68平复式房首付仅30万</a></li>
                        <li><a href="#">深圳新区7盘元宵拼优惠 折扣最低85折最高惠4万</a></li>
                    </ul>
                </div>
                <p class="xx_next">
                	<!--{foreach $preNextPageList item=item key=key name=name}-->
                	<!--{if !$smarty.foreach.name.last}-->
                	<a href="info_detail.php?id=<!--{$item.infoId}-->&type=<!--{$type}-->&infoType=<!--{$infoType}-->"><!--{if $item.currentNum > $item.num}-->上一篇：<!--{else}-->下一篇：<!--{/if}--><!--{$item.infoTitle}--></a><br>
                	<!--{else}-->
                	<a href="info_detail.php?id=<!--{$item.infoId}-->&type=<!--{$type}-->&infoType=<!--{$infoType}-->"><!--{if $item.currentNum > $item.num}-->上一篇：<!--{else}-->下一篇：<!--{/if}--><!--{$item.infoTitle}--></a>
                	<!--{/if}-->
                	<!--{/foreach}-->
                </p>
                <form action="<!--{$cfg.web_url}-->info/info_detail.php?action=doComment" method="post">
                <input type="hidden" name="id" value="<!--{$info.infoId}-->"/>
                <input type="hidden" name="type" value="<!--{$type}-->"/>
                <input type="hidden" name="infoType" value="<!--{$infoType}-->"/>
                <table width="695" border="0" cellspacing="0" cellpadding="0" class="mbt10">
                    <tr>
                        <td width="173"><span class="link18"><a name="comment">网友跟帖</a></span></td>
                        <td colspan="3" align="right"><b class="red16"><!--{$totalNum}--></b> 人跟帖 <span class="pl20">|</span><span class="pl20"><a href="<!--{$cfg.web_url}-->ucenter">注册</a></span></td>
                    </tr>
                    <tr>
                        <td height="120" colspan="4">
                        	<div class="ly">
                            	<div class="ly_tx"><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></div>
                                <div class="ly_nr"><textarea name="commnet" id="commnet" class="ly_input"></textarea></div>
                            </div>
                        </td>
                  </tr>
                     <tr>
                      <td></td>
                      <td width="159"></td>
                        <td width="238">验证码：<input id="verifyCode" style="width:50px;"/> <img src="<!--{$cfg.web_url}-->/common/libs/api/codeweb.php" id="verifyCodeImg" style="cursor:pointer;" title="点击切换"/> <a href="javascript:;" id="verifyCodeLink">看不清？</a></td>
                        <td width="125" align="right"><a href="javascript:;" id="commentBnt"><img src="<!--{$cfg.web_images}-->web/fb.jpg" width="100" height="34" /></a></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="grey">网友评论仅供其表达个人看法，并不表明房不胜房平台</td>
                    </tr>
                    <!--{if $commentMsg != ''}-->
                    <tr>
                        <td colspan="4" align="center"><font color="red"><!--{$commentMsg}--></font></td>
                    </tr>
                    <!--{/if}-->
                </table>
                </form>
                <!--{foreach from=$infoReplyList item=item key=key}--> 
                <dl class="ly01">
                	<dt>
						<!--{if $item.userdetailPicThumb !=''}-->
								<img width="65" height="65" src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->"/>
							<!--{else}-->
								<img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" />
							<!--{/if}-->
					</dt>
                    <dd class="red"><!--{$item.userUsername}--></dd>
                    <dd><!--{$item.inforeplyContent}--></dd>
                    <dd class="grey"><!--{$item.inforeplyCreateTime}--></dd>
                </dl>
                <!--{/foreach}-->
                <!--{if $pageHtml !=''}-->
				<span class="pagingPanel">
						<!--{$pageHtml}-->
				</span>
				<!--{/if}-->
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
	<!--脚部-->
	<!--{include file="../footer.tpl"}-->
</div>
<!--装饰头部左边无限延伸-->
<div class="layer_decoration_left"></div>
<!--装饰头部右边无限延伸-->
<div class="layer_decoration_right"></div>
</body>
</html>