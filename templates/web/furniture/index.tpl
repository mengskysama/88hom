<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keyWords" content="<!--{$webset.keywords}-->"/>
<meta http-equiv="description" content="<!--{$webset.description}-->"/>
<title><!--{$webset.siteName}-->-<!--{$cfg.web_keywords_str}-->家居首页</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(furniture_index_init);
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
        <div class="ppg">
        	<div class="ppg_left">
            	<p class="ppg_left_tit"><img src="<!--{$cfg.web_images}-->web/ppg_tit.gif"></p>
                <p class="ppg_left_fl"><a href="index.php?brandTypeId=1"><img src="<!--{$cfg.web_images}-->web/p_01.gif"></a></p>
                <p class="ppg_left_fl"><a href="index.php?brandTypeId=2"><img src="<!--{$cfg.web_images}-->web/p_02.gif"></a></p>
                <p class="ppg_left_fl"><a href="index.php?brandTypeId=3"><img src="<!--{$cfg.web_images}-->web/p_03.gif"></a></p>
                <p class="ppg_more"><a href="brand.php">更多加盟品牌>></a></p>
            </div>
            <ul class="ppg_right">
            	<!--{foreach $brandList item=item key=key}-->
            	<li><a <!--{if $item.url!='javascript:;'}-->target="_blank"<!--{/if}--> href="<!--{$item.url}-->" title="<!--{$item.name}-->"><img width="148" height="118" src="<!--{$cfg.web_url_upload}--><!--{$item.picThumb}-->"></a></li>
            	<!--{/foreach}-->
            </ul>
        </div>
        
        <!--广告-->
        <p class="add"><img src="<!--{$cfg.web_images}-->web/add/add03.jpg"></p>
        
        <!--家居品牌馆-->
        <div class="cont">
        	<div class="left">
            	<div class="left_t">
                    <div class="p_left">
                        <p class="p_left_add mb10"><img src="<!--{$cfg.web_images}-->web/add/p_add.jpg"></p>
                        <p class="p_left_add"><img src="<!--{$cfg.web_images}-->web/add/p_add01.jpg"></p>
                    </div>
                    <div class="p_center">
                        <!--装修招标-->
                        <div class="zxzb mb10">
                            <p class="zxzb_tit"><span class="a">装修招标</span><span class="b red"><a href="#">更多招标信息</a></span></p>
                            <div class="zxzb_nr">
                                <div class="zxzb_nr_tit" >
                                    <table width="513" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="173" align="left" class="pl10">楼盘</td>
                                            <td width="61" align="center">预算</td>
                                            <td width="65" align="center">户型</td>
                                            <td width="61" align="center">面积</td>
                                            <td width="65" align="center">装修需求</td>
                                            <td width="88" align="center">任务状态</td>
                                        </tr>
                                    </table>
                                </div>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--设计招标-->
                        <div class="zxzb">
                            <p class="zxzb_tit"><span class="a">设计招标</span><span class="b red"><a href="#">更多招标信息</a></span></p>
                            <div class="zxzb_nr">
                                <div class="zxzb_nr_tit">
                                    <table width="513" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="173" align="left" class="pl10">楼盘</td>
                                            <td width="61" align="center">预算</td>
                                            <td width="65" align="center">户型</td>
                                            <td width="61" align="center">面积</td>
                                            <td width="65" align="center">装修需求</td>
                                            <td width="88" align="center">任务状态</td>
                                        </tr>
                                    </table>
                                </div>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                                <table width="513" height="28" border="0" cellspacing="0" cellpadding="0" class="bottomb">
                                    <tr>
                                        <td width="173" align="left" class="pl10">深业东城御园</td>
                                        <td width="61" align="center">3-5w</td>
                                        <td width="65" align="center">一居</td>
                                        <td width="61" align="center">85m2</td>
                                        <td width="65" align="center">新房装修</td>
                                        <td width="88" align="center">招标中</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--行业资讯-->
                <div class="hyzx">
                    <div class="t_title_bg">
                        <b class="t_title">行业资讯</b>
                        <span class="c red"><a href="info.php?infoType=7|704">更多&gt;&gt;</a></span>
                    </div>
                    <ul class="hyzx_nr">
                     <!--{foreach $hangye_infoList item=item key=key}-->
                    	<li><a href="info_detail.php?id=<!--{$item.infoId}-->" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                     <!--{/foreach}-->  
                    </ul>
                </div>
                <!--活动促销-->
                <div class="hdcx">
                	<div class="t_title_bg">
                        <ul class="hdcx_tit">
                            <li class="over">活动促销</li>
                            <li>品牌促销</li>
                            <li>卖场促销</li>
                        </ul>
                        <span class="c red"><a href="info.php?infoType=7|705-7|706-7|707">更多&gt;&gt;</a></span>
                    </div>
                    
	                    <div class="hdcx_nr">
	                    	<p class="hdcx_nr_left">
	                    		<!--{if $huodong_suggest_infoList.0 !=''}-->
	                    		<a title="<!--{$huodong_suggest_infoList.0.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$huodong_suggest_infoList.0.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
	                    		<!--{if $huodong_suggest_infoList.1 !=''}-->
	                    		<a title="<!--{$huodong_suggest_infoList.1.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$huodong_suggest_infoList.1.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
	                    	</p>
	                        <div class="hdcx_nr_right">
	                            <ul>
	                                 <!--{foreach $huodong_infoList item=item key=key}-->
                    					<li><a href="info_detail.php?id=<!--{$item.infoId}-->" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                     				<!--{/foreach}-->  
	                            </ul>
	                            <dl>
	                            	<dt>
										<!--{if $huodong_suggest_infoList.2 !=''}-->
			                    		<a title="<!--{$huodong_suggest_infoList.2.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$huodong_suggest_infoList.2.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $huodong_suggest_infoList.2 !=''}-->
			                    		<!--{$huodong_suggest_infoList.2.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                            <dl>
	                            	<dt>
										<!--{if $huodong_suggest_infoList.3 !=''}-->
			                    		<a title="<!--{$huodong_suggest_infoList.3.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$huodong_suggest_infoList.3.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $huodong_suggest_infoList.3 !=''}-->
			                    		<!--{$huodong_suggest_infoList.3.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                        </div>
	                    </div>
                    	<div class="hdcx_nr">
	                    	<p class="hdcx_nr_left">
								<!--{if $pinpai_suggest_infoList.0 !=''}-->
	                    		<a title="<!--{$pinpai_suggest_infoList.0.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$pinpai_suggest_infoList.0.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
	                    		<!--{if $pinpai_suggest_infoList.1 !=''}-->
	                    		<a title="<!--{$pinpai_suggest_infoList.1.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$pinpai_suggest_infoList.1.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
							</p>
	                        <div class="hdcx_nr_right">
	                            <ul>
	                                <!--{foreach $pinpai_infoList item=item key=key}-->
                    					<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                     				<!--{/foreach}-->  
	                            </ul>
	                            <dl>
	                            	<dt>
										<!--{if $pinpai_suggest_infoList.2 !=''}-->
			                    		<a title="<!--{$pinpai_suggest_infoList.2.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$pinpai_suggest_infoList.2.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $pinpai_suggest_infoList.2 !=''}-->
			                    		<!--{$pinpai_suggest_infoList.2.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                            <dl>
	                            	<dt>
										<!--{if $pinpai_suggest_infoList.3 !=''}-->
			                    		<a title="<!--{$pinpai_suggest_infoList.3.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$pinpai_suggest_infoList.3.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $pinpai_suggest_infoList.3 !=''}-->
			                    		<!--{$pinpai_suggest_infoList.3.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                        </div>
	                    </div>
	                    <div class="hdcx_nr">
	                    	<p class="hdcx_nr_left">
								<!--{if $maichang_suggest_infoList.0 !=''}-->
	                    		<a title="<!--{$maichang_suggest_infoList.0.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$maichang_suggest_infoList.0.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
	                    		<!--{if $maichang_suggest_infoList.1 !=''}-->
	                    		<a title="<!--{$maichang_suggest_infoList.1.infoTitle}-->" href="#"><img width="150" height="120" src="<!--{$cfg.web_url_upload}--><!--{$maichang_suggest_infoList.1.infoPicThumb}-->"/></a>
	                    		<!--{/if}-->
							</p>
	                        <div class="hdcx_nr_right">
	                            <ul>
	                                <!--{foreach $maichang_infoList item=item key=key}-->
                    					<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:20:"...":true}--></a></li>
                     				<!--{/foreach}-->  
	                            </ul>
	                            <dl>
	                            	<dt>
										<!--{if $maichang_suggest_infoList.2 !=''}-->
			                    		<a title="<!--{$maichang_suggest_infoList.2.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$maichang_suggest_infoList.2.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $maichang_suggest_infoList.2 !=''}-->
			                    		<!--{$maichang_suggest_infoList.2.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                            <dl>
	                            	<dt>
										<!--{if $maichang_suggest_infoList.3 !=''}-->
			                    		<a title="<!--{$maichang_suggest_infoList.3.infoTitle}-->" href="#"><img width="100" height="80" src="<!--{$cfg.web_url_upload}--><!--{$maichang_suggest_infoList.3.infoPicThumb}-->"/></a>
			                    		<!--{/if}-->
									</dt>
	                                <dd>
										<!--{if $maichang_suggest_infoList.3 !=''}-->
			                    		<!--{$maichang_suggest_infoList.3.infoTitle|truncate:8:"...":true}-->
			                    		<!--{/if}-->
									</dd>
	                            </dl>
	                        </div>
	                    </div>
                   
                    
                    
                </div>
             </div>
            
            <div class="right">
            	<!--家居风水-->
            	<div class="jjfs mb10">
                	<p class="jjfs_tit"><span>家居风水</span><a href="info.php?infoType=7|709">更多&gt;&gt;</a></p>
                    <ul class="jjfs_nr">
                    <!--{foreach $fengshui_infoList item=item key=key}-->
                    	<li><a href="#" title="<!--{$item.infoTitle}-->"><!--{$item.infoTitle|truncate:19:"...":true}--></a></li>
                    <!--{/foreach}-->  	
                    </ul>
                </div>
                <!--装修工具-->
            	<div class="jjfs">
               	  <p class="jjfs_tit"><span class="zxgj_tit">装修工具</span></p>
                    <div class="zxgj_nr">
                        <table width="231" height="140" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="77" align="center"><img src="<!--{$cfg.web_images}-->web/zxgj01.gif" /><br>地板计算器</td>
                                <td width="77" align="center"><img src="<!--{$cfg.web_images}-->web/zxgj02.gif" /><br>壁纸计算器</td>
                                <td width="77" align="center" class="borderr"><img src="<!--{$cfg.web_images}-->web/zxgj03.gif" /><br>窗帘计算器</td>
                            </tr>
                            <tr>
                                <td align="center" class="borderb"><img src="<!--{$cfg.web_images}-->web/zxgj04.gif" /><br>地砖计算器</td>
                                <td align="center" class="borderb"><img src="<!--{$cfg.web_images}-->web/zxgj05.gif" /><br>墙砖计算器</td>
                                <td align="center" class="borderr borderb"><img src="<!--{$cfg.web_images}-->web/zxgj06.gif" /><br>涂料计算器</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--装修设计图库-->
        <div class="ybj">
        	<p class="ybj_tit"><b class="tit01">装修设计图库</b><span class="floatr pr10 red"><a href="#">更多图库&gt;&gt;</a></span></p>
            <div class="ybj_nr">
                <div class="ybj_left">
                	<dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic01.gif" /></dt>
                        <dd>
                        <!--{foreach from=$cfg.arr_pic.furnitureDesignPicSubType.1 item=item key=key name=name}-->
                        	<!--{if !$smarty.foreach.name.last}-->
                        	<a href="#"><!--{$item}--></a> | 
                        	<!--{else}-->
                        	<a href="#"><!--{$item}--></a>
                        	<!--{/if}-->
                        <!--{/foreach}-->
 					</dd>
                    </dl>
                    <dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic02.gif" /></dt>
                        <dd>
						<!--{foreach from=$cfg.arr_pic.furnitureDesignPicSubType.2 item=item key=key name=name}-->
                        	<!--{if !$smarty.foreach.name.last}-->
                        	<a href="#"><!--{$item}--></a> | 
                        	<!--{else}-->
                        	<a href="#"><!--{$item}--></a>
                        	<!--{/if}-->
                        <!--{/foreach}-->
						</dd>
                    </dl>
                    <dl>
                    	<dt><img src="<!--{$cfg.web_images}-->web/zx_pic03.gif" /></dt>
                        <dd>
                        <!--{foreach from=$cfg.arr_pic.furnitureDesignPicSubType.3 item=item key=key name=name}-->
                        	<!--{if !$smarty.foreach.name.last}-->
                        	<a href="#"><!--{$item}--></a> | 
                        	<!--{else}-->
                        	<a href="#"><!--{$item}--></a>
                        	<!--{/if}-->
                        <!--{/foreach}-->
						</dd>
                    </dl>
                </div>
                <div class="ybj_right">
                	<p class="sjtk_pic"><img src="<!--{$cfg.web_images}-->web/testing/sjtk.jpg"></p>
                    <div class="sjtk_nr">
                    	<ul>
                        	<li><a href="#">50平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">50平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                            <li><a href="#">平耀眼品味</a></li>
                        </ul>
                        <dl>
                        	<dt><img src="<!--{$cfg.web_images}-->web/testing/hdcx01.jpg"></dt>
                            <dd>200平个性家装</dd>
                        </dl>
                        <dl>
                        	<dt><img src="<!--{$cfg.web_images}-->web/testing/hdcx01.jpg"></dt>
                            <dd>200平个性家装</dd>
                        </dl>
                        <dl>
                        	<dt><img src="<!--{$cfg.web_images}-->web/testing/hdcx01.jpg"></dt>
                            <dd>200平个性家装</dd>
                        </dl>
                        <dl>
                        	<dt><img src="<!--{$cfg.web_images}-->web/testing/hdcx01.jpg"></dt>
                            <dd>200平个性家装</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!--装修设计论坛-->
        <div class="sjlt">
        	<div class="t_title_bg">
                <b class="t_title">装修设计论坛</b>
                <span class="c red"><a href="#">更多&gt;&gt;</a></span>
            </div>
            <ul class="sjlt_nr">
            	<li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
                <li><a href="#">8千元衣柜一年裂2次售后:出现裂</a></li>
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