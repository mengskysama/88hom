<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>提交新盘</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
     
<script type="text/javascript">
       
	$(document).ready(function(){
	
    	initPicUp2('1','<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
        initPicUp2('3','<!--{$timestamp}-->','<!--{$token}-->','<!--{$cfg.file_path_upload}-->','<!--{$cfg.web_path}-->','<!--{$cfg.web_common}-->','<!--{$cfg.web_url}-->');
        
		//初始化区域插件
		if($('#areaIndex').val() != ''){
			var areaIndex = $('#areaIndex').val().split('-');
			$('#txtCity').val(C[areaIndex[0]][areaIndex[1]]);//市,表面文字 
			$('#txtDistrict').val(D[areaIndex[0]][areaIndex[1]][areaIndex[2]]);//区,表面文字
			if(areaIndex.length > 3)
				$('#txtComareas').val(A[areaIndex[0]][areaIndex[1]][areaIndex[2]][areaIndex[3]]);//片区,表面文字
		}
	});
	
	function ff(objId)
	{
	    return document.getElementById(objId);
	}
       function check_submit()
       {
           if(ff("estName").value =='')
           {            
            alert("请填写楼盘名称！");
            ff("estName").focus();
            return false;
           }
       	   if(ff("checkname").value != "1"){
            alert("该楼盘已存在！");
            ff("estName").focus();
            return false;
       	   }
           if(ff("estName").value.length > 15)
           {            
            alert("楼盘名称不可超过15个汉字！");
            ff("estName").focus();
            return false;
           }           
           
           if(ff("areaIndex").value == ""){
           	alert("请选择区县商圈");
           	return false;
           }           
           
           
			var checkedEstType = 0; 
			$("input[name='estType[]']:checkbox").each(function () { 
				if($(this).attr("checked")) { 
					checkedEstType += 1; 
				} 
			}); 
			if(checkedEstType == 0){
				alert("请选择物业类型");
		        return false;
			}         
			
           if(ff("estAddr").value=='')
           {
            alert("请填写物业地址！");
            ff("estAddr").focus();
            return false;
           }
           if(ff("estAddr").value.length > 30)
           {
            alert("物业地址不可超过30个汉字！");
            ff("estAddr").focus();
            return false;
           }
           if(ff("communityTraffic").value=='')
           {
                alert("请填写交通状况!");
            	ff("communityTraffic").focus();
                return false;
           }
           if(ff("communityTraffic").value.length >500)
           {
            alert("交通状况不能太长！");
            ff("communityTraffic").focus();
            return false;
           }
           
            document.getElementById("estForm").submit();
       }
       function checkEstName(KeyName){                  
            var keyValue = $("#"+KeyName).val();
            if(keyValue == ""){
            	return;
            }
            
		    jQuery.ajax({
		        type: "post",
		        url: "check_estate_name.php",
		        data: { "name": $("#"+KeyName).val() },
		        success: function(req) {
		        
		            if(req!="1"){
		                document.getElementById('checkname').value = req;            
		                document.getElementById('show_est_alert').style.display = '';
		                //document.getElementById('show_est_alert').innerHTML = '<li style=\"padding-left: 30px; background-repeat: no-repeat;background-position: 3px 0px;\"><span class=\"org\">该楼盘已存在！</span></li>';
		            }
		            else
		            {
		                document.getElementById('checkname').value = 1;
		                document.getElementById('show_est_alert').style.display = 'none';                
		            }
		        }
		    });
            
        }

        function  CloseAdnew()
        {
            window.close();
        }
       </script>

</head>
<style>
/*默认样式*/
body { text-align: center; font-family:"宋体", Verdana, Geneva, sans-serif; margin:0; padding:0; -webkit-text-size-adjust:none; background: #FFF; font-size:12px; color:#000; font-weight:100 }
div, form, img, ul, ol, li, dl, dt, dd, p { margin:0; padding:0; border:0; }
img { overflow:hidden; vertical-align:bottom; }
li { list-style:none; }
h1, h2, h3, h4, h5, h6 { margin:0; padding:0; }
table, td, tr, th { font-size:12px; }
.clear { clear: both; font-size:1px; width:1px; height:0; visibility: hidden; *display:inline;/*IE only*/}
a { color:#000; text-decoration:none; blr:expression(this.onFocus=this.blur());outline: none }
a:hover { color:#666666; text-decoration: underline; }
a.blue { color:#000381; text-decoration: underline; }
.blod { font-weight:bold;}

/*内容样式*/
.all{ width:1000px; text-align:center; margin:0 auto;}
.nav{ width:1000px; float:left; margin-top:20px; display:inline;}
.navbg{ background:url(<!--{$cfg.web_images}-->ucenter/navbg.gif) no-repeat; width:95px; height:33px; float:left; color:#fff; font-size:12px; font-weight:bold; line-height:33px; text-align:center;}
.navr{ height:31px; border-bottom:2px #4d85c2 solid; float:left; width:905px;}
.subnavall{ width:1000px; float:left; margin-top:10px; display:inline;}
.subnav{ border-left:1px #b0bebe solid; border-top:1px #b0bebe solid; border-right:1px #b0bebe solid; height:30px; float:left; line-height:30px; width:115px;}
.subnavwz{ background:url(<!--{$cfg.web_images}-->ucenter/nav-tb.gif) no-repeat left center ; float:left; padding-left:25px; margin-left:10px; color:#2b4896; font-size:13px; font-weight:bold; display:inline;}
.subnavr{ border-bottom:1px #b0bebe solid; float:left; height:30px; width:875px;}
.ts{ float:right; margin-right:10px; display:inline;}
.tswz{ background:url(<!--{$cfg.web_images}-->ucenter/ts-tb.gif) no-repeat left center; float:left; font-size:12px; padding-left:25px; line-height:30px; color:#000; text-align:left;}
.tswz span{ color:#ce712e; font-size:16px;}
.nrall{border-left:1px #b0bebe solid; border-right:1px #b0bebe solid; border-bottom:1px #b0bebe solid; width:990px; float:left; height:auto; padding-bottom:20px; margin-bottom:20px; display:inline;}
.nrall .topwz{ float:left; color:#ff6a04; font-size:12px; line-height:30px; margin-left:15px; display:inline; margin-top:10px;}
.nrall .xxnr{ float:left; margin-left:15px; width:960px; display:inline;}
.nrall .xxnr li{ float:left; margin-top:15px;}
.xxnr .left{ width:100px; float:left; color:#000; font-size:12px; text-align:left; line-height:28px;}
.xxnr .left span{color:#ce712e; font-size:14px; float:left; margin-right:10px; margin-left:10px; display:inline;}
.xxnr .right{ width:800px; margin-left:10px; float:left; display:inline;}
.xxnr .right .input{ border:1px #8e9699 solid; float:left; padding-left:10px; padding-right:10px; width:500px; height:24px; line-height:24px; color:#5b5a5a; font-size:12px; display:inline;}
.xxnr .right .xlinput{  float:left; padding-left:10px;  width:165px; height:24px; line-height:24px;  margin-right:10px;}
.xxnr .right .fxk{  float:left;  margin-top:7px; margin-right:5px; display:inline; }
.xxnr .right .fxkwz{ height:28px; line-height:28px; float:left; text-align:left; color:#000; font-size:12px; margin-right:20px; display:inline;}
.xxnr .right .wbinput{ border:1px #8e9699 solid; float:left; padding-left:10px; padding-right:10px; width:600px; height:80px; line-height:24px; color:#5b5a5a; font-size:12px; display:inline;}
.xxnr .right .btn{float:left; }
.xxnr .right .nrtx{ color:#808080; font-size:12px; float:left; margin-left:10px; line-height:28px; display:inline;}
.foot-btn{ width:127px; text-align:center; margin:0 auto;}
.foot-btn .tj{ background:url(<!--{$cfg.web_images}-->ucenter/tj-btn.gif) no-repeat; width:55px; height:30px; float:left; color:#483700; line-height:30px; text-align:center; border:0px;}
.foot-btn .qx{ background:url(<!--{$cfg.web_images}-->ucenter/qx-btn.gif) no-repeat; width:57px; height:30px; float:left; color:#1e313f; line-height:30px; text-align:center; border:0px; margin-left:15px;}
</style>
<body>
<div class="all">
	<div class="nav">
        <div class="navbg">提交新楼盘</div>
        <div class="navr"></div>
    </div>
    <div class="subnavall">
        <div class="subnav">
            <div class="subnavwz">提交新楼盘</div>
        </div>
        <div class="subnavr">
        	<div class="ts">
            	<div class="tswz">带<span>*</span>号的为必填项</div>
            </div>
        </div>
    </div>
    <div class="nrall">
    	<div class="topwz">请如实填写一下信息，真实有效的信息将有助于该楼盘通过审核！</div>
    	
        <form id="estForm" name="estForm" action="estate_input.php" method="post" enctype="multipart/form-data">
        <ul class="xxnr">
        	<li>
            	<div class="left"><span>*</span>楼盘名称：</div>
                <div class="right">
                	<input name="estName" id="estName" type="text" class="input" onblur="checkEstName('estName')"/>
                	<div class="nrtx">限15个汉字</div><input name="checkname" type="hidden" id="checkname" />
                </div>
                <ul id="show_est_alert" style="display:none"><font color="red">该楼盘已存在！</font>                              
                </ul>
                
            </li>
            <li>
            	<div class="left"><span>*</span>区县商圈：<input type="hidden" id="hidden_citys" value="北京|bj|beijing,上海|sh|shanghai,深圳|sz|shenzhen,广州|gz|guangzhou,天津|tj|tianjin,重庆|cq|chongqing,成都|cd|chengdu,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,西安|xa|xian,西宁|xn|xining,厦门|xm|xiamen,咸阳|xy|xianyang,湘潭|xt|xiangtan,襄阳|xy|xiangyang,徐州|xz|xuzhou,烟台|yt|yantai,盐城|yc|yancheng,扬州|yz|yangzhou,宜昌|yc|yichang,银川|yc|yinchuan,岳阳|yy|yueyang,漳州|zz|zhangzhou,肇庆|zq|zhaoqing,镇江|zj|zhenjiang,郑州|zz|zhengzhou,中山|zs|zhongshan,南宁|nn|nanning,南通|nt|nantong,宁波|nb|ningbo,秦皇岛|qhd|qinhuangdao,青岛|qd|qingdao,清远|qy|qingyuan,泉州|qz|quanzhou,三亚|sy|sanya,贵阳|gy|guiyang,桂林|gl|guilin,哈尔滨|heb|haerbin,海南|hn|hainan,邯郸|hd|handan,沈阳|sy|shenyang,石家庄|sjz|shijiazhuang,绍兴|sx|shaoxing,合肥|hf|hefei,衡水|hs|hengshui,衡阳|hy|hengyang,呼和浩特|hhht|huhehaote,湖州|hz|huzhou,淮安|ha|huaian,惠州|hz|huizhou,吉林|jl|jilin,济南|jn|jinan,济宁|jn|jining,嘉兴|jx|jiaxing,江门|jm|jiangmen,江阴|jy|jiangyin,九江|jj|jiujiang,昆明|km|kunming,昆山|ks|kunshan,兰州|lz|lanzhou,廊坊|lf|langfang,乐山|ls|leshan,连云港|lyg|lianyungang,聊城|lc|liaocheng,临沂|ly|linyi,柳州|lz|liuzhou,泸州|lz|luzhou,洛阳|ly|luoyang,马鞍山|mas|maanshan,梅州|mz|meizhou,绵阳|my|mianyang,南昌|nc|nanchang,南充|nc|nanchong,大连|dl|dalian,大庆|dq|daqing,德阳|dy|deyang,东莞|dg|dongguan,佛山|fs|foshan,福州|fz|fuzhou,赣州|gz|ganzhou,滨州|bz|binzhou,长春|cc|changcun,长沙|cs|changsha,常熟|cs|changshu,常州|cz|changzhou,鞍山|as|anshan,蚌埠|bb|bengbu,包头|bt|baotou,保定|bd|baoding,北海|bh|beihai,遂宁|sn|suining,太原|ty|taiyuan,泰安|ta|taian,泰州|tz|taizhou,唐山|ts|tangshan,舟山|zs|zhoushan,株洲|zz|zhuzhou,珠海|zh|zhuhai,淄博|zb|zibo,威海|wh|weihai,潍坊|wf|weifang,温州|wz|wenzhou,乌鲁木齐|wlmq|wlumuqi,无锡|wx|wuxi,吴江|wj|wujiang,芜湖|wh|wuhu,汕头|st|shantou," />
                        <input type="hidden" id="CityDistrictComareas" /></div>
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
	                                value="选择商圈             (商圈不能为空)" onclick="ShowComareas();" onkeyup="onKey(event,'search_c');"
	                                onkeydown="SelectonKeyDown('txtComareas',event,'search_c')" style="width: 95px;" /><input
	                                    type="button" class="but_input_cs" id="CheckCity" name="CheckCity" onclick="ShowComareas()" />
	                             <!--省，市，区域，片区下标,以"-"隔开 -->
								<input type="hidden" name="areaIndex"	id="areaIndex" value=""/>	
	                            <div class="search_select01 left230" id="search_c" >
	                                <dl id="search_c_value">
	                                </dl>
	                            </div>
                </div>
            </li>
            <li>
            	<div class="left"><span>*</span>物业类型：</div>
                <div class="right">
                	<input name="estType[]" type="checkbox" value="1" class="fxk" checked="checked"/> <span class="fxkwz">住宅</span>
                    <input name="estType[]" type="checkbox" value="4" class="fxk"/> <span class="fxkwz">别墅</span>
                    <input name="estType[]" type="checkbox" value="2" class="fxk"/> <span class="fxkwz">商铺</span>
                    <input name="estType[]" type="checkbox" value="3" class="fxk"/> <span class="fxkwz">写字楼</span>
                </div>
            </li>
            <li>
            	<div class="left"><span>*</span>地&nbsp;&nbsp;址：</div>
                <div class="right">
                	<input id="estAddr" name="estAddr" type="text" class="input" />
                	<div class="nrtx">限30个汉字</div>
                </div>
            </li>
             <li>
            	<div class="left"><span>*</span>交通状况：</div>
                <div class="right">
                	<textarea id="communityTraffic" name="communityTraffic" cols="" rows="" class="wbinput"></textarea>
                </div>
            </li>
            <li>
            	<div class="left"><span>&nbsp;</span>周边配套：</div>
                <div class="right">
                	<textarea name="communityPeriInfo" cols="" rows="" class="wbinput"></textarea>
                </div>
            </li>
            <li>
            <table width="90%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td width="120" height="36" align="center" valign="middle">户型图：<br/><input type="file" name="file_upload_1" id="file_upload_1"/></td>
			    <td><div id="showImg_1" class="tpsc">			
					</div>
			    </td>
			  </tr>
			  <tr>
			    <td width="120" height="36" align="center" valign="middle">小区图：<br/><input type="file" name="file_upload_3" id="file_upload_3"/></td>
			    <td>
			    	<div id="showImg_3" class="tpsc">			
					</div>
			    </td>
			  </tr>
		    </table>
            </li>
        
        </ul>
    </form>
    </div>
    <div class="foot-btn">
    	<input name="" type="button" class="tj" value="提交" onclick="return check_submit();"/>
        <input name="" type="button" class="qx" value="取消"/>
    </div>
</div>
<script>
<!--{$err_msg_submit}-->
</script>
</body>
</html>
