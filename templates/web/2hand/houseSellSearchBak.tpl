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
                <ul class="t02">
                    <li id="over02"><a href="#">区域查询</a></li>
                    <li><a href="#">地图查询</a></li>
                </ul>
            </div>
            
            <div class="goufang_nr01">
                <ul>
                    <li class="bt">找房条件：</li>
                    <li class="w622">
                    <select name=""><option value="1">住宅类别</option></select>
                    <select name=""><option value="1">房龄</option></select>
                    <select name=""><option value="1">朝向</option></select>
                    <select name=""><option value="1">楼层</option></select>
                    <select name=""><option value="1">配套</option></select>
                    </li>
                </ul>
                <ul>
                    <li class="bt">区域：</li>
                    <li class="fenl">
                    <a href="#" class="bx">不限</a>
                    <a href="#">宝安</a>
                    <a href="#">龙岗</a>
                    <a href="#">南山</a>
                    <a href="#">福田</a>
                    <a href="#">罗湖</a>
                    <a href="#">盐田</a>
                    <a href="#">坪山</a>
                    <a href="#">龙华</a>
                    <a href="#">观澜</a>
                    </li>
                </ul>
                <ul>
                    <li class="bt">总价：</li>
                    <li class="fenl">
                    <a href="#" class="bx">不限</a>
                    <a href="#">100万以下</a>
                    <a href="#">100-150万</a>
                    <a href="#">150-200万</a>
                    <a href="#">200-300万</a>
                    <a href="#">300-500万</a>
                    <a href="#">500-1000万</a>
                    <a href="#">1000万以上</a>
                    </li>
                </ul>
                <ul>
                    <li class="bt">户型：</li>
                    <li class="fenl">
                    <a href="#" class="bx">不限</a>
                    <a href="#">一居</a>
                    <a href="#">二居</a>
                    <a href="#">三居</a>
                    <a href="#">四居</a>
                    <a href="#">五居</a>
                    <a href="#">五居以上</a>
                    </li>
                </ul>
                <ul>
                    <li class="bt">面积：</li>
                    <li class="fenl">
                    <a href="#" class="bx">不限</a>
                    <a href="#">一居</a>
                    <a href="#">二居</a>
                    <a href="#">三居</a>
                    <a href="#">四居</a>
                    <a href="#">五居</a>
                    <a href="#">五居以上</a>
                    </li>
                </ul>
                <ul>
                    <li class="bt">特色：</li>
                    <li class="fenl">
                    <a href="#" class="bx">不限</a>
                    <a href="#">一居</a>
                    <a href="#">二居</a>
                    <a href="#">三居</a>
                    <a href="#">四居</a>
                    <a href="#">五居</a>
                    <a href="#">五居以上</a>
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
                    <ul><li class="sel">全部房源</li><li>急售房源</li><li>网营推荐</li><li>个人房源</li><li>免税房源</li></ul>
                    <span class="floatr">共找到 <span class="red">82406</span> 套房源</span>
                </div>
                
            	<div class="pxtj">
                	<table width="708" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="66">排序条件</td>
                            <td width="20">|</td>
                            <td width="26">总价</td>
                            <td width="27"><img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/></td>
                            <td width="30">面积</td>
                            <td width="539"><img src="<!--{$cfg.web_images}-->web/t.gif"/><br/><img src="<!--{$cfg.web_images}-->web/b.gif"/></td>
                        </tr>
                    </table>
            	</div>
            	<!--{foreach from=$infoList item=item key=key}-->
            	<div class="es_list">
                	<p class="es_list_tit link14"><a href="<!--{$item.houseId}-->" target="_blank"><!--{$item.houseTitle}--></a></p>
                    <div class="es_list_nr">
                    	<dl>
                        	<dt><img width="120" height="96" src="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->"/></dt>
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
                            <dd>描述：<span class="red01">东南向、全新毛坯、性价比高</span></dd>
                        </dl>
                        <p class="hot"><img src="<!--{$cfg.web_images}-->web/hot.gif"/></p>
                        <p class="jg"><span class="red16"><!--{$item.houseBuildArea}--></span>平米<br/><span class="red16"><!--{$item.houseSellPrice}--></span>万元</p>
                        <ul class="ms"><li>红本在手</li><li>5年无税</li><li>学位</li></ul>
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