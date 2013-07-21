<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>我要<!--{if $cType==1}-->找新房<!--{elseif $cType==2}-->租房<!--{/if}-->_我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>
<body>
<!--我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件头部-->
<!--{include file="$header_ucenter_user"}-->
<!--我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件内容-->
<div class="qg_main">
<!--{include file="$ucenter_user_left_menu"}-->
    <div class="qg_r">
    	<p>你的位置： <a href="ucenter_user.php">我的房不剩房<a> </a> > <a href="user_wanted.php?wType=<!--{$cType}-->">我要<!--{if $cType==1}-->买<!--{elseif $cType==2}-->租<!--{/if}-->房</a> > <a href="user_search_criteria.php?cType=<!--{$cType}-->">我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</a> <!--{if $cType==1}-->> <a href="javascript:void(0);"></a>我的新房找房条件<!--{/if}--></p>
        <div class="qg_bs">
       		 <b class="wyqg f14 z3"><img src="<!--{$cfg.web_images}-->ucenter/qg_32.jpg"> 编辑我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件</b>
       		 <!--{if $cType==1}-->
             <div style="width:700px; border-bottom:1px solid #ddd">
			<ul style="width:292px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="javascript:void(0);">我要<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->新房</a></li>
    		    <li><a href="my_search_criteria_second.php?cType=<!--{$cType}-->">我要<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->二手房</a></li>
   		  </ul>
          </div>
          <!--{/if}-->
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b class="z14">基本资料</b><font class="red">*</font>为必填项</p>
       	  <div class="other" id="div_err_msg">  	  	 
       	  </div>
       	   <form id="do_search_criteria" action="do_search_criteria.php?action=release" method="post">
       	    <input type="hidden" id="userId" name="userId" value="<!--{$userId}-->"/>
       	    <input type="hidden" id="cType" name="cType" value="<!--{$cType}-->" />
       	    <input type="hidden" id="hand" name="hand" value="1" />
              <table width="680" height="351" border="0" cellpadding="0" cellspacing="0" class="mt10">
                  <tr>
                      <td>房屋类型：</td>
                      <td>&nbsp;<select name="houseType" id="houseType">
                     	 <!--{html_options options=$houseType}-->
                      </select></td>      
                  </tr>
                  <tr>
                    <td><!--{if $cType==1}-->售价<!--{elseif $cType==2}-->租金<!--{/if}-->：</td>
                      <td class="grzc_33 p5"><input id="price" name="price" type="text"  value="请输入金额" />（元/平米）</td>
                  </tr>
                  <tr>
                      <td><span class="red">*</span>区域：</td>                      
                      <td>
			<table id="areaTable" style="width: 360px;"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="" align="right">
                        <input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
                        <input type="hidden" id="CityDistrictComareas" />
                    </td>
                    <th style="width: 360px;" align="left">
                        <input id="nowSelectID" type="hidden" />
                        <div style="position: relative; z-index: 10000;" >
                            <input type="text" id="txtCity" autocomplete="off" class="input_cs" style="width: 60px;" name="txtCity" 
                                value="选择城市" onkeyup="SelectCity(this.value);onKey(event,'search_select');" onkeydown="SelectonKeyDown('txtCity',event,'search_select')"
                                onclick="GetIndex();ClearInput();" /><input name="cityxl" id="cityxl" type="button" onclick="GetIndex()"
                                    class="but_input_cs" />
                            <div class="search_select"  id="search_select" 
                                style="display: none; top: 30px; left: 0;">
                                <dl id="SearchKey">
                                </dl>
                                <dl id="SearchValue">
                                </dl>
                            </div>
                            <div id="tab_select" class="tab_select" 
                                style="display: none; left: 0; top: 30px;">
                                <ul class="tab" >
                                    <li class="option2" id="d1" onmouseover="city1(1)" style="color: #FF0000">热门城市</li>
                                    <li class="option2" id="d2" onmouseover="city1(2);GetHotCity(2,'a,b,c,d');">ABCD</li>
                                    <li class="option2" id="d3" onmouseover="city1(3);GetHotCity(3,'f,g,h');">FGH</li>
                                    <li class="option2" id="d4" onmouseover="city1(4);GetHotCity(4,'j,k,l,m');">JKLM</li>
                                    <li class="option2" id="d5" onmouseover="city1(5);GetHotCity(5,'n,q,s');">NQS</li>
                                    <li class="option2" id="d6" onmouseover="city1(6);GetHotCity(6,'t,w,x');">TWX</li>
                                    <li class="option2" id="d7" onmouseover="city1(7);GetHotCity(7,'y,z');">YZ</li>
                                </ul>
                                <div id="c1" class="box1" >
                                    <ul>
                                    </ul>
                                </div>
                                <div id="c2" style="display: none;" class="box2">
                                </div>
                                <div id="c3" style="display: none;" class="box2">
                                </div>
                                <div id="c4" style="display: none;" class="box2">
                                </div>
                                <div id="c5" style="display: none;" class="box2">
                                </div>
                                <div id="c6" style="display: none;" class="box2">
                                </div>
                                <div id="c7" style="display: none;" class="box2">
                                </div>
                                <script language="javascript">city1(1)</script>
                                <!--调用id=1的div初始页显示内容第一频道-->
                            </div>
                            <input type="text" id="txtDistrict" autocomplete="off" name="txtDistrict" readonly="readonly" value="选择区域"
                                class="input_cs" style="width: 95px;"  onkeyup="onKey(event,'search_d');" onblur="ClearComareas();" onkeydown="SelectonKeyDown('txtDistrict',event,'search_d')"
                                onclick="ShowDistrict();" /><input name="Districtxl" id="Districtxl" type="button" class="but_input_cs" onclick="ShowDistrict()" />
	                            <div class="search_select01 left133" id="search_d">
                                <dl id="search_d_value">
                                </dl>
                            </div>
                            <input type="text" class="input_cs" autocomplete="off" id="txtComareas" name="txtComareas" readonly="readonly"
                                value="选择商圈" onclick="ShowComareas();" onkeyup="onKey(event,'search_c');"
                                onkeydown="SelectonKeyDown('txtComareas',event,'search_c')" style="width: 95px;" /><input
                                    type="button" class="but_input_cs" id="CheckCity" name="CheckCity" onclick="ShowComareas()" />
                             <!--省，市，区域，片区下标,以"-"隔开 -->
							<input type="hidden" name="areaIndex"	id="areaIndex" value=""/>	
                            <div class="search_select01 left230" id="search_c" >
                                <dl id="search_c_value">
                                </dl>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
			</td>
                  </tr>
                  <tr>
                      <td>名称：</td>
                      <td class="grzc_33 p5"><input id="area" name="area" type="text"  value="请输入名称" onfocus="$(this).val('');" /></td>
                  </tr>
                  <tr>
                      <td><span class="red">*</span> 验证码：</td>
                      <td>
                      <img src='<!--{$cfg.web_code_line}-->' id='imgcode' name='imgcode' onclick="this.src=this.src+'?op=login&'+Math.random()" width="89" style="float:left"/>
						<input type="text" value="" maxlength="4" class="sjyz" style="border:1px solid #ffbdc2" name="txt_mathcode" id="txt_mathcode" />
                        <span class="yzm2 z6"><a href="javascript:void(0);" onclick="refresh_code();" class="yzm2 z6">换一题</a>&nbsp;&nbsp;请输入答案</span>              
                      </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td colspan="3"><input name="button2" type="submit" class="denglu1 l" id="button2" value="完成" /></td>
                  </tr>
              </table>
             </form>
        	</div>
        </div>
    </div>
<!--我的<!--{if $cType==1}-->找<!--{elseif $cType==2}-->租<!--{/if}-->房条件底部-->
<!--{include file="$footer"}-->
</body>
</html>