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
	<!--{include file="<!--{$sellSearchHeader}-->"}-->
	<!-- 头部 -->
    <div class="layer_content_2">
    	<!--购房、租房-->
        <div class="goufang01">
            <div class="goufang_tit">
                <ul class="t01">
                    <li id="over01"><a href="#">购房</a></li>
                    <li><a href="#">租房</a></li>
                </ul>
            </div>
            <div class="goufang_nr01">
                <ul>
                    <li class="bt">找房条件：</li>
                    <li class="w622">
                    <select id="bt" name="bt" onchange="exeWebHouseSellSearch('bt',this.value);">
                    <option value="">住宅类别</option>
                    <!--{html_options options=$houseType selected=$searchModel.type}-->
                    </select>
                    <select id="bYear" name="bYear" onchange="exeWebHouseSellSearch('bYear',this.value);">
                    <option value="">房龄</option>
                    <!--{html_options options=$bYearList selected=$bYear}-->
                    </select>
                    <select id="forward" name="forward" onchange="exeWebHouseSellSearch('forward',this.value);">
                    <option value="">朝向</option>
                    <!--{html_options options=$forwardList selected=$searchModel.forward}-->
                    </select>
                    <select id="floor" name="floor" onchange="exeWebHouseSellSearch('floor',this.value);">
                    <option value="">楼层</option>
                    <!--{html_options options=$floorList selected=$floor}-->
                    </select>
                    <select id="fitment" name="fitment" onchange="exeWebHouseSellSearch('fitment',this.value);">
                    <option value="">装修</option>
                    <!--{html_options options=$fitmentList selected=$searchModel.fitment}-->
                    </select>
                    </li>
                </ul>
                <ul>
                    <li class="bt">区域：</li>
                    <li class="fenl">
                    <input type="hidden" id="t" name="t" value="<!--{$t}-->"/>
                    <input type="hidden" id="p" name="p" value="<!--{$searchModel.p}-->"/>
                    <input type="hidden" id="c" name="c" value="<!--{$searchModel.c}-->"/>
                    <input type="hidden" id="d" name="d" value="<!--{$searchModel.d}-->"/>
                    <input type="hidden" id="a" name="a" value="<!--{$searchModel.a}-->"/>
                    <!--{foreach from=$searchArea item=item key=key}-->
                    <!--{if $key==='' and $searchModel.d===''}-->
                    <a href="javascript:exeWebHouseSellSearch('d','<!--{$key}-->');" class="bx"><!--{$item}--></a>
                    <!--{else if $key==$searchModel.d and $searchModel.d!==''}-->
                    <a href="javascript:exeWebHouseSellSearch('d','<!--{$key}-->');" class="bx"><!--{$item}--></a>
                    <!--{else}-->
                    <a href="javascript:exeWebHouseSellSearch('d','<!--{$key}-->');"><!--{$item}--></a>
                    <!--{/if}-->
                    <!--{/foreach}-->
                    </li>
                </ul>
                <ul>
                    <li class="bt">总价：</li>
                    <li class="fenl">
                    <input type="hidden" id="pt" name="pt" value="<!--{$pt}-->"/>
                    <!--{foreach from=$ptList item=item key=key}-->
                    <!--{if $key==$pt}-->
                    <a href="javascript:exeWebHouseSellSearch('pt','<!--{$key}-->');" class="bx"><!--{$item}--></a>
                    <!--{else}-->
                    <a href="javascript:exeWebHouseSellSearch('pt','<!--{$key}-->');"><!--{$item}--></a>
                    <!--{/if}-->
                    <!--{/foreach}-->
                    </li>
                </ul>
                <ul>
                    <li class="bt">户型：</li>
                    <li class="fenl">
                    <input type="hidden" id="rt" name="rt" value="<!--{$searchModel.room}-->"/>
                    <!--{foreach from=$rtList item=item key=key}-->
                    <!--{if $key==$searchModel.room}-->
                    <a href="javascript:exeWebHouseSellSearch('rt','<!--{$key}-->');" class="bx"><!--{$item}--></a>
                    <!--{else}-->
                    <a href="javascript:exeWebHouseSellSearch('rt','<!--{$key}-->');"><!--{$item}--></a>
                    <!--{/if}-->
                    <!--{/foreach}-->
                    </li>
                </ul>
                <ul>
                    <li class="bt">面积：</li>
                    <li class="fenl">
                    <input type="hidden" id="at" name="at" value="<!--{$at}-->"/>
                    <!--{foreach from=$atList item=item key=key}-->
                    <!--{if $key==$at}-->
                    <a href="javascript:exeWebHouseSellSearch('at','<!--{$key}-->');" class="bx"><!--{$item}--></a>
                    <!--{else}-->
                    <a href="javascript:exeWebHouseSellSearch('at','<!--{$key}-->');"><!--{$item}--></a>
                    <!--{/if}-->
                    <!--{/foreach}-->
                    </li>
                </ul>
                
                <table width="376" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="251"><input type="text" class="inp01"/></td>
                        <td width="125"><input type="image" src="<!--{$cfg.web_images}-->web/ybdy.jpg"/></td>
                    </tr>
                </table>
            </div>
        </div>
		
        <!--内容-->
		<div class="cont">
        	<div class="left">
            	<div class="ljzs_tit">
            		<input type="hidden" id="st" name="st" value="<!--{$searchModel.st}-->"/>
                    <ul>
                    <!--{foreach from=$stList item=item key=key}-->
                    <!--{if $key==$searchModel.st}-->
                    <li class="sel"><a href="javascript:exeWebHouseSellSearch('st','<!--{$key}-->');"><!--{$item}--></a></li>
                    <!--{else}-->
                    <li><a href="javascript:exeWebHouseSellSearch('st','<!--{$key}-->');"><!--{$item}--></a></li>
                    <!--{/if}-->
                    <!--{/foreach}-->
                    </ul>
                    <span class="floatr">共找到 <span class="red"><!--{if $infoCount>0}--><!--{$infoCount}--><!--{else}-->0<!--{/if}--></span> 套房源</span>
                </div>
                
            	<div class="pxtj">
                	<table width="708" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="66">排序条件
                            <input type="hidden" id="orderPrice" name="orderPrice" value="<!--{$orderPrice}-->"/>
                            <input type="hidden" id="orderArea" name="orderArea" value="<!--{$orderArea}-->"/>
                            </td> 
                            <td width="20">|</td>
                            <td width="26"><a href="javascript:exeWebHouseSellSearch('orderPrice','');">总价</a></td>
                            <td width="27">
                            <!--{if $orderPrice==''}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{else if $orderPrice==1}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/>
                            <!--{else if $orderPrice==2}-->
                            <img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{else}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{/if}-->
                            </td>
                            <td width="30"><a href="javascript:exeWebHouseSellSearch('orderArea','');">面积</a></td>
                            <td width="539">
                            <!--{if $orderArea==''}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{else if $orderArea==1}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/>
                            <!--{else if $orderArea==2}-->
                            <img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{else}-->
                            <img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/>
                            <!--{/if}-->
                            </td>
                        </tr>
                    </table>
            	</div>
            	<!--{foreach from=$infoList item=item key=key}-->
            	<div class="es_list">
                	<p class="es_list_tit link14"><a href="<!--{$item.houseId}-->" target="_blank"><!--{$item.houseTitle}--></a></p>
                    <div class="es_list_nr">
                    	<dl>
                        	<dt><a href="<!--{$item.houseId}-->" target="_blank"><img width="120" height="96" src="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->"/></a></dt>
                            <dd><b><!--{$item.communityName}--></b><!--{if $item.imcpShortName!=''}-->[<!--{$item.imcpShortName}-->]<!--{/if}--></dd>
                            <dd>楼层：<!--{$item.houseFloor}-->/<!--{$item.houseAllFloor}-->  <span class="pl20">建成年代：<!--{$item.houseBuildYear}--></span></dd>
                            <dd>户型：
                            <!--{if $item.houseRoom>0}-->
								<!--{$item.houseRoom}-->室
							<!--{/if}--> 
							<!--{if $item.houseHall>0}-->
								<!--{$item.houseHall}-->厅
							<!--{/if}--> 
							<!--{if $item.houseToilet>0}-->
								<!--{$item.houseToilet}-->卫
							<!--{/if}-->
							<!--{if $item.houseKitchen>0}-->
								<!--{$item.houseKitchen}-->厨房
							<!--{/if}-->
							<!--{if $item.houseBalcony>0}-->
								<!--{$item.houseBalcony}-->阳台
							<!--{/if}-->
							</dd>
                            <dd>描述：
                            <span class="red01">
                            <!--{if $item.houseForward!=''}-->
                            <!--{$item.houseForward}-->向   
                            <!--{/if}-->
                            <!--{if $item.houseForward!=''}-->
                            <!--{$item.houseFitment}-->           
                            <!--{/if}-->
                                                                           更新时间：<!--{$item.houseUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}-->
                            </span>
                            </dd>
                        </dl>
                        <p class="hot"></p>
                        <p class="jg"><span class="red16"><!--{$item.houseBuildArea}--></span>平米</p>
                        <p class="jg"><span class="red16"><!--{$item.houseSellPrice}--></span>万元</p>
                    </div>
				</div>
                <!--{/foreach}-->
                <div class="next mtb10">
                	<span class="pagingPanel">
						<!--{$divPage}-->
					</span>
                </div>
                
            </div>
            <div class="right">
            	<div class="grfy tbg03">
                    <div class="t_title_bg">
                        <div class="t_title"><b class="a">新闻</b><b class="b">资讯</b></div>
                        <div class="c"><a href="#">更多&gt;&gt;</a></div>
                    </div>
                    <dl class="xwzx">
                    	<dt><img src="<!--{$cfg.web_images}-->web/testing/pic10.jpg"/></dt>
                        <dd><span class="link14"><a href="#">心赔了夫人又折兵</a></span></dd>
                        <dd class="grey lh18">小心赔了夫人又折兵小心赔了夫人又折兵小心赔了夫人又折兵小心赔又折兵...</dd>
                    </dl>
                    <div class="gfxz">
                        <ul>
                            <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                            <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                            <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                            <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                            <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                            <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                            <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                            <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="grfy tbg03">
                    <div class="t_title_bg">
                        <div class="t_title"><b class="a">购房</b><b class="b">须知</b></div>
                        <div class="c"><a href="#">更多&gt;&gt;</a></div>
                    </div>
                    <ul class="gfxz">
                        <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                        <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                        <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                        <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                        <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                        <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                        <li><a href="#">避税？！律师：小心赔了夫人又折兵</a></li>
                        <li><a href="#">二手房交易二十种常见纠纷及其预防</a></li>
                    </ul>
                </div>
            
            </div>
        </div>
        
        <div class="ppg">
        	<p class="t_title_bg"><span class="t_title"><b class="a">网营</b><b class="b">推荐</b></span><span class="c"><a href="#">更多&gt;&gt;</a></span></p>
          	<div class="ppg_nr">
                <span class="jt"><img src="<!--{$cfg.web_images}-->web/i12.gif" width="10" height="13" /></span>
                <ul>
                	<li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                    <li><span class="img1"><img src="<!--{$cfg.web_images}-->web/testing/l1.jpg" width="115" height="92" /></span><a href="#">万科集团</a></li>
                </ul>
                <span class="jt"><img src="<!--{$cfg.web_images}-->web/i11.gif" width="10" height="13" /></span>
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