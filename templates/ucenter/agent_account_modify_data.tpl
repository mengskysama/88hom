<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>个人账户-资料修改</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function(){
	//初始化区域插件
	if($('#areaIndex').val() != ''){
		var areaIndex = $('#areaIndex').val().split('-');
		$('#txtCity').val(C[areaIndex[0]][areaIndex[1]]);//市,表面文字 
		$('#txtDistrict').val(D[areaIndex[0]][areaIndex[1]][areaIndex[2]]);//区,表面文字
		if(areaIndex.length > 3)
			$('#txtComareas').val(A[areaIndex[0]][areaIndex[1]][areaIndex[2]][areaIndex[3]]);//片区,表面文字
	}
	//图片上传控件
	$("#file_upload").uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<!--{$timestamp}-->',
			'token'     : '<!--{$token}-->',
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 120,
			'thumbHeight': 150,
			'watermark' : 0,
			'watermarkPic': '<!--{$cfg.file_path_upload}-->watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : 'agent/',
			'originalPath': 'agent/',
			'allowType':'jpeg,jpg,gif,bmp,png'
		},
		'buttonText' :'选择上传',//通过文字替换钮扣上的文字
		'fileSizeLimit' : '10MB',//设置允许上传文件最大值B, KB, MB, GB 比如：'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//对话框的文件类型描述
		'fileTypeExts' : '*.jpeg; *.gif; *.jpg; *.bmp; *.png',//可上传的文件类型
	  	'fileObjName' : 'Filedata',//设置一个名字，在服务器处理程序中根据该名字来取上传文件的数据。默认为Filedata，$tempFile = $_FILES['Filedata']['tmp_name']
	  	'width': 80,//buttonImg的宽
		'height': 20,//buttonImg的高
		'multi': false,//选择文件时是否可以【选择多个】。默认：可以true
		'queueSizeLimit' : 1,//允许多文件上传的数量。默认：999
		'uploadLimit' : 999,//限制总上传文件数,默认是999。指同一时间，如果关闭浏览器后重新打开又可上传。
		'successTimeout' : 30,//上传超时时间。文件上传完成后,等待服务器返回信息的时间(秒).超过时间没有返回的话,插件认为返回了成功。 默认：30秒
		'removeCompleted' : true,//上传完成后队列是否自动消失。默认：true
		'requeueErrors' : false,//队列上传出错，是否继续回滚队列，即反复尝试上传。默认：false
		'removeTimeout' : 1,//上传完成后队列多长时间后消失。默认 3秒	需要：'removeCompleted' : true,时使用
		'progressData' : 'speed',//进度条上显示的进度:有百分比percentage和速度speed。默认百分比
		'preventCaching' : false,//随机缓存值 默认true ，可选true和false.如果选true,那么在上传时会加入一个随机数来使每次的URL都不同,以防止缓存.但是可能与正常URL产生冲突
		'checkExisting':'<!--{$cfg.web_path}-->common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':'<!--{$cfg.web_common}-->uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':'<!--{$cfg.web_path}-->common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
    			$('#userdetailPic').val(''+obj[0].path);
    			$('#userdetailPicThumb').val(''+obj[0].pathThumb);
	            var html='<a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
	              		+'<img width="120px;" height="152px;" src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/>'
	              		+'</a>';
	      		$('#showImg').html(html);
    		}else{
				alert(obj[0].msg);
    		}
		}
	});
});
function doAgentAccountModifyData(){
	var userdetailPic=$.trim($('#userdetailPic').val());
	if(userdetailPic==''){
		alert('请上传经纪人个人图片！');
		return false;
	}
	if($('#txtCity').val()=='选择城市'){
		alert('请选择城市！');
		$('#txtCity').focus();
		return false;
	}
	if($('#txtDistrict').val()=='选择区域' || $('#txtDistrict').val()=='选择区县' || $('#txtDistrict').val()==''){
		alert('请选择区域！');
		$('#txtDistrict').focus();
		return false;
	}
	if($('#txtComareas').val()=='选择商圈' || $('#txtComareas').val()==''){
		alert('请选择商圈！');
		$('#txtComareas').focus();
		return false;
	}
	return true;
}
</script>
</head>
<body>
<!--头部-->
<!--{include file="$ucenter_agent_header"}-->
<!--中间内容部分-->
<div class="qg_main">
	<!--{include file="$ucenter_agent_left_menu"}-->
    <div class="jjr_r">
    	<div class="qg_r1">
    <p>你的位置: 个人账户-资料修改</p>
   	<div class="qg_bs1">
 		   <div style="width:755px; border-bottom:1px solid #ddd">
			<ul style="width:755px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="#"> 资料修改</a></li>
    		    <li><a href="#"> 上传身份认证</a></li>
                <li><a href="#"> 修改密码</a></li>
                <li><a href="#"> 常用合同</a></li>
                 <li><a href="#"> 公告管理</a></li>
   		  </ul>
          </div>
          </div>
         <form id="releaseForm" name="releaseForm" action="agent_action.php?action=agentAccountModifyData" method="post" onsubmit="return doAgentAccountModifyData();">
         <input type="hidden" id="userId" name="userId" value="<!--{$userDetail.userId}-->"/>
          <div class="bs_tx">
            <p><b>资料修改</b><span class="r"><font class="red">*</font> 为必填</span></p>
<table width="732" border="0" cellpadding="0" cellspacing="1" >
  <tr>
    <td width="110" height="205" align="center" valign="middle" bgcolor="#f7f6f1">头像上传</td>
    <td width="619" align="left" valign="middle" bgcolor="#fafafa" class="p25">
    	<table width="594" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="141" align="left"><strong>当前头像</strong></td>
                <td width="301"><input type="file" name="file_upload" id="file_upload"/></td>
                <td width="152"></td>
                </tr>
            <tr>
                <td rowspan="2">
                <div class="xgzl_tx">
                <!--{if $userDetail.userdetailPic != ""}-->
                <input type="hidden" id="userdetailPic" name="userdetailPic" value="<!--{$userDetail.userdetailPic}-->"/>
                <input type="hidden" id="userdetailPicThumb" name="userdetailPicThumb" value="<!--{$userDetail.userdetailPicThumb}-->"/>
                <div id="showImg">
                <a href="<!--{$cfg.web_url}-->uploads/<!--{$userDetail.userdetailPic}-->" target="_blank">
                <img width="120px;" height="152px;" src="<!--{$cfg.web_url}-->uploads/<!--{$userDetail.userdetailPicThumb}-->"/>
                </a>
                </div>
                <!--{else}-->
                <input type="hidden" id="userdetailPic" name="userdetailPic" value=""/>
                <input type="hidden" id="userdetailPicThumb" name="userdetailPicThumb" value=""/>
                <div id="showImg">
                <img width="120px;" height="152px;" src="<!--{$cfg.web_images}-->ucenter/test/tx.jpg"/>
                </div>
                <!--{/if}-->
                </div>
                </td>
                <td colspan="2"></td>
            </tr>
            <tr class="grzc_33">
                <td height="97" colspan="2" style="line-height:22px;">
               	 图片上传要求：<br/>
                1. 必须上传本人免冠证件照；<br/>
                2. 头像大小小于800k,4:5的比例大小支持jpg,jpeg格式；<br/>
                3. 头像中不得包含其他网站水印或非本经纪公司信息；<br/>
                4. 您上传的头像不符合以上要求将会被重置。</td>
            </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">姓名</td>
    <td align="left" valign="middle" class="p25 grzc_31"><!--{$userDetail.userdetailName}--></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">性别</td>
    <td>
    <!--{if $userDetail.userdetailGender==1}-->
    <input name="userdetailGender" style="margin-left: 25px;" type="radio" value="1" checked="checked"/>男 
    <input name="userdetailGender" style="margin-left: 10px;" type="radio" value="0"/>女 
    <!--{else}-->
    <input name="userdetailGender" style="margin-left: 25px;" type="radio" value="1"/>男 
    <input name="userdetailGender" style="margin-left: 10px;" type="radio" value="0" checked="checked"/>女 
    <!--{/if}-->
    </td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">所在地</td>
  						     <td> 
                          		 <table id="areaTable" style="width: 360px;margin-left: 25px;"  border="0" cellspacing="0" cellpadding="0">
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
							<input type="hidden" name="areaIndex"	id="areaIndex" value="<!--{$areaIndex}-->"/>	
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
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">移动电话</td>
    <td align="left" valign="middle" class="p25"><!--{$userPhone}--></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">座机</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="userdetailTel" name="userdetailTel" type="text" value="<!--{$userDetail.userdetailTel}-->" /></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">QQ</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="userdetailQQ" name="userdetailQQ" type="text" value="<!--{$userDetail.userdetailQQ}-->" /></td>
  </tr>
  <tr>
    <td height="36" align="center" valign="middle" bgcolor="#f7f6f1">MSN</td>
    <td align="left" valign="middle" class="p25 grzc_31"><input id="userdetailMSN" name="userdetailMSN" type="text" value="<!--{$userDetail.userdetailMSN}-->" /></td>
  </tr>
</table>
          </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
            <td width="120" align="center" valign="middle"><span class="dlmm1" style=" padding-top:50px; padding-bottom:100px;">
              <input name="button" type="submit" class="denglu1 l" id="button" value="修 改" />
            </span></td>
            <td width="320" height="80" align="center" valign="middle">&nbsp;</td>
	      </tr>
	    </table>
	    </form>
    </div>
    </div>
    </div>
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>