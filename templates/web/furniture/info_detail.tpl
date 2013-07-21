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
        		<p class="dqwz">
        			<a href="<!--{$cfg.web_url}-->">房不剩房</a> > 
        			<a href="<!--{$cfg.web_url}-->furniture">家居</a> > 
        			<a href="<!--{$cfg.web_url}-->furniture/info.php?infoType=<!--{$infoTypeCode}-->"><!--{$infoTypeStr}--></a>
        			
        		</p>
                <p class="title01"><b><!--{$info.infoTitle}--></b></p>
                <p class="come"><span class="grey"><!--{$info.infoUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}--></span> <span class="red pl10"><!--{$info.infoSource}--></span>  <a href="#comment" class="pl10">评论</a> <a href="#" class="pl10">收藏</a></p>
                <!--{if $info.infoSummary != ''}-->
                <div class="zy"><b class="red">[摘要]</b><!--{$info.infoSummary}--></div>
                <!--{/if}-->
                <div class="news_nr"><!--{$info.infoContent}--></div>
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
                	<a href="info_detail.php?id=<!--{$item.infoId}-->&infoTypeCode=<!--{$infoTypeCode}-->"><!--{if $item.currentNum > $item.num}-->上一篇：<!--{else}-->下一篇：<!--{/if}--><!--{$item.infoTitle}--></a><br>
                	<!--{else}-->
                	<a href="info_detail.php?id=<!--{$item.infoId}-->&infoTypeCode=<!--{$infoTypeCode}-->"><!--{if $item.currentNum > $item.num}-->上一篇：<!--{else}-->下一篇：<!--{/if}--><!--{$item.infoTitle}--></a>
                	<!--{/if}-->
                	<!--{/foreach}-->
                </p>
                <table width="695" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto">
                    <tr>
                        <td width="173"><span class="link18"><a name="comment">网友跟帖</a></span></td>
                        <td colspan="3" align="right"><b class="red16">411</b> 人跟帖 <span class="pl20">|</span><b class="pl20 red16">464</b> 人参与<span class="pl20">|</span><span class="pl20"><a href="#">注册</a></span></td>
                    </tr>
                    <tr>
                        <td height="120" colspan="4">
                        	<div class="ly">
                            	<div class="ly_tx"><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></div>
                                <div class="ly_nr"><textarea name="textarea" id="textarea" class="ly_input"></textarea></div>
                            </div>
                        </td>
                  </tr>
                     <tr>
                      <td></td>
                      <td width="159"></td>
                        <td width="238"></td>
                        <td width="125" align="right"><img src="<!--{$cfg.web_images}-->web/fb.jpg" width="100" height="34" /></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="grey">网友评论仅供其表达个人看法，并不表明房不胜房平台</td>
                    </tr>
                </table>
                
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <dl class="ly01">
                	<dt><img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" /></dt>
                    <dd class="red">若如初见42121914</dd>
                    <dd>卓能雅苑目前正在加紧施工中，现项目主体楼座均已封顶，营销中心预计5月开放。项目由7栋12-18层住宅组成，共1089户，容积率2.3，停车位1054个，住宅以2、3房为主。</dd>
                    <dd class="grey">刚刚</dd>
                </dl>
                <p class="ckgd"><a href="#">查看更多</a></p>
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