<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
var pictureIndex=<!--{$communityDetailPicCount}-->;
$(document).ready(function(){
	<!--{foreach from=$picTypeList item=item key=key}-->
	initPicUp(<!--{$key}-->);
	<!--{/foreach}-->
	$('#txtCity').val(C[<!--{$communityDetail.communityProvince}-->][<!--{$communityDetail.communityCity}-->]);
	$('#txtDistrict').val(D[<!--{$communityDetail.communityProvince}-->][<!--{$communityDetail.communityCity}-->][<!--{$communityDetail.communityDistrict}-->]);
	$('#txtComareas').val(A[<!--{$communityDetail.communityProvince}-->][<!--{$communityDetail.communityCity}-->][<!--{$communityDetail.communityDistrict}-->][<!--{$communityDetail.communityArea}-->]);
	
});
function initPicUp(id){
	$("#file_upload_"+id).uploadify({
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
			'thumbWidth': 300,
			'thumbHeight': 240,
			'watermark' : 1,
			'watermarkPic': '<!--{$cfg.file_path_upload}-->watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : 'community/',
			'originalPath': 'community/',
			'allowType':'jpeg,jpg,gif,bmp,png'
		},
		'buttonText' :'选择上传',//通过文字替换钮扣上的文字
		'fileSizeLimit' : '10MB',//设置允许上传文件最大值B, KB, MB, GB 比如：'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//对话框的文件类型描述
		'fileTypeExts' : '*.jpeg; *.gif; *.jpg; *.bmp; *.png',//可上传的文件类型
	  	'fileObjName' : 'Filedata',//设置一个名字，在服务器处理程序中根据该名字来取上传文件的数据。默认为Filedata，$tempFile = $_FILES['Filedata']['tmp_name']
	  	'width': 80,//buttonImg的宽
		'height': 20,//buttonImg的高
		'multi': true,//选择文件时是否可以【选择多个】。默认：可以true
		'queueSizeLimit' : 999,//允许多文件上传的数量。默认：999
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
        		var html='<span style="float:left;margin:5px;line-height:25px;" id="pic_'+pictureIndex+'"><a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
        				+'<img height="200px" src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/>'
        				+'</a><br/>描述：<input type="text" name="name[]" value="'+obj[0].name+'"/><br/>序号：<input type="text" name="picLayer[]" value="1"/>'
        				+'<input type="button" name="deletePic_'+pictureIndex+'" onclick="dropContainer(\'pic_'+pictureIndex+'\')" value="删除">'
        				+'<input type="hidden" name="path[]" value="'+obj[0].path+'"/><input type="hidden" name="pathThumb[]" value="'
        				+obj[0].pathThumb+'"/><input type="hidden" name="picTypeId[]" value="'+id+'"/></span>';
				$('#showImg_'+id).append(html);
				pictureIndex++;
    		}else{
				alert(obj[0].msg);
    		}
		}
	 });
}
function dropContainer(containerId){
	$('#'+containerId).remove();
}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息修改</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=complexCommunityChangeStateAndModify" method="post" onsubmit="return exeAdminCommunityChangeStateAndModify();">
	<input type="hidden" id="communityId" name="communityId" value="<!--{$communityDetail.communityId}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">基本信息</font></b></td>
		</tr> 
		<tr>
			<td width="100">小区名称：</td><td width="600"><input class="input" type="text" id="communityName" name="communityName" value="<!--{$communityDetail.communityName}-->" style="width: 352px;"/> <font color="red">*</font></td>
			<td width="100">物业类型：</td>
			<td>
				<div id="communityIs">
				<!--{if $communityDetail.communityIsHouseType!=1}-->
				<input name="communityIsHouseType" value="1" type="checkbox"/>住宅 
				<!--{else}-->
				<input name="communityIsHouseType" value="1" type="checkbox" checked="checked"/>住宅
				<!--{/if}-->
				<!--{if $communityDetail.communityIsBusinessType!=1}-->
				<input name="communityIsBusinessType" value="1" type="checkbox"/>商铺  
				<!--{else}-->
				<input name="communityIsBusinessType" value="1" type="checkbox" checked="checked"/>商铺  
				<!--{/if}-->
				<!--{if $communityDetail.communityIsOfficeType!=1}-->
				<input name="communityIsOfficeType" value="1" type="checkbox"/>写字楼   
				<!--{else}-->
				<input name="communityIsOfficeType" value="1" type="checkbox" checked="checked"/>写字楼  
				<!--{/if}-->
				<!--{if $communityDetail.communityIsVillaType!=1}-->
				<input name="communityIsVillaType" value="1" type="checkbox"/>别墅  <font color="red">*</font>
				<!--{else}-->
				<input name="communityIsVillaType" value="1" type="checkbox" checked="checked"/>别墅  <font color="red">*</font>
				<!--{/if}-->
				</div>
			</td>
		</tr> 
		<tr>
			<td>所属区域：</td>
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
							<input type="hidden" name="areaIndex"	id="areaIndex" value="<!--{$communityDetail.communityProvince}-->-<!--{$communityDetail.communityCity}-->-<!--{$communityDetail.communityDistrict}-->-<!--{$communityDetail.communityArea}-->"/>	
                            <div class="search_select01 left230" id="search_c" >
                                <dl id="search_c_value">
                                </dl>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
			<font color="red">*</font>
			</td>
			<td>建筑类型：</td><td><input class="input" type="text" id="communityBuildType" name="communityBuildType" value="<!--{$communityDetail.communityBuildType}-->" style="width: 352px;"/> 例：塔楼 高层</td>
		</tr>
		<tr>
			<td>小区地址：</td><td><input class="input" type="text" id="communityAddress" name="communityAddress" value="<!--{$communityDetail.communityAddress}-->" style="width: 352px;"/> 例：深圳市龙岗区龙岗中心区吉祥路与龙翔路交汇北</td>
			<td>地理经纬度：</td><td><input class="input" type="text" id="communityMapXY" name="communityMapXY" value="<!--{$communityDetail.communityMapXY}-->" style="width: 352px;"/> 例：116.463404,39.876646 (请用百度地图坐标拾取器获取19级层数数值 <a target="_blank" href="http://api.map.baidu.com/lbsapi/getpoint/">http://api.map.baidu.com/lbsapi/getpoint/</a>)</td>
		</tr>
		<tr>
			<td>项目特色：</td><td><input class="input" type="text" id="communityProjectFeatures" name="communityProjectFeatures" value="<!--{$communityDetail.communityProjectFeatures}-->" style="width: 352px;"/> 例：复合地产 地铁沿线</td>
			<td>主力户型：</td><td><input class="input" type="text" id="communityMainHouseModel" name="communityMainHouseModel" value="<!--{$communityDetail.communityMainHouseModel}-->" style="width: 352px;"/> 例：80㎡100㎡133㎡</td>
		</tr>
		<tr>
			<td>容积率：</td><td><input class="input" type="text" id="communityVolRate" name="communityVolRate" value="<!--{$communityDetail.communityVolRate}-->" style="width: 352px;"/> 例：填大于0小于100的数字类型</td>
			<td>绿化率：</td><td><input class="input" type="text" id="communityGreenRate" name="communityGreenRate" value="<!--{$communityDetail.communityGreenRate}-->" style="width: 352px;"/>%  例：填大于0小于100的数字类型</td>
		</tr>
		<tr>
			<td>占地面积：</td><td><input class="input" type="text" id="communityLandArea" name="communityLandArea" value="<!--{$communityDetail.communityLandArea}-->" style="width: 352px;"/>㎡ 例：填大于0的数字类型</td>
			<td>建筑面积：</td><td><input class="input" type="text" id="communityBuildArea" name="communityBuildArea" value="<!--{$communityDetail.communityBuildArea}-->" style="width: 352px;"/>㎡ 例：填大于0的数字类型</td>
		</tr>
		<tr>
			<td>产权年限：</td><td><input class="input" type="text" id="communityRight" name="communityRight" value="<!--{$communityDetail.communityRight}-->" style="width: 352px;"/>年 例：70(填大于0小于等于70的正整数)</td>
			<td>装修状况：</td><td><input class="input" type="text" id="communityFitmentStatus" name="communityFitmentStatus" value="<!--{$communityDetail.communityFitmentStatus}-->" style="width: 352px;"/> 例：精装 毛坯</td>
		</tr>
		<tr>
			<td>户数信息：</td><td><input class="input" type="text" id="communityHouseholds" name="communityHouseholds" value="<!--{$communityDetail.communityHouseholds}-->" style="width: 352px;"/> 例：总户数903户 当期户数903户(此为文本字段)</td>
			<td>车位信息：</td><td><input class="input" type="text" id="communityParkingSpaces" name="communityParkingSpaces" value="<!--{$communityDetail.communityParkingSpaces}-->" style="width: 352px;"/> 例：一期1526个(地下1468个，地上58个)(此为文本字段)</td>
		</tr>
		<tr>
			<td>参考均价：</td><td><input class="input" type="text" id="communityRefPrice" name="communityRefPrice" value="<!--{$communityDetail.communityRefPrice}-->" style="width: 352px;"/>元/平方米 例：23000(填大于0的正整数)</td>
			<td>物业管理费：</td><td><input class="input" type="text" id="communityManagerFee" name="communityManagerFee" value="<!--{$communityDetail.communityManagerFee}-->" style="width: 352px;"/> 元/平方米·月 例：2.98(填大于0的数值)</td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">物业信息</font></b></td>
		</tr> 
		<tr>
			<td>物业公司：</td><td><input class="input" type="text" id="communityCompany" name="communityCompany" value="<!--{$communityDetail.communityCompany}-->" style="width: 352px;"/></td>
			<td>物业地址：</td><td><input class="input" type="text" id="communityCompanyAddress" name="communityCompanyAddress" value="<!--{$communityDetail.communityCompanyAddress}-->" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">开发商信息</font></b></td>
		</tr> 
		<tr>
			<td>开发商：</td><td><input class="input" type="text" id="communityDevCompany" name="communityDevCompany" value="<!--{$communityDetail.communityDevCompany}-->" style="width: 352px;"/></td>
			<td>开发商地址：</td><td><input class="input" type="text" id="communityDevCompanyAddress" name="communityDevCompanyAddress" value="<!--{$communityDetail.communityDevCompanyAddress}-->" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td>售楼地址：</td><td colspan="3"><input class="input" type="text" id="communitySellHouseAddress" name="communitySellHouseAddress" value="<!--{$communityDetail.communitySellHouseAddress}-->" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">详细其他</font></b></td>
		</tr> 
		<tr>
			<td>交通状况：</td><td colspan="3"><!--{$FCKeditorTraffic}--></td>
		</tr>
		<tr>
			<td>周边信息：</td><td colspan="3"><!--{$FCKeditorPeriInfo}--></td>
		</tr>
		<tr>
			<td>小区楼盘简介：</td><td colspan="3"><!--{$FCKeditorBuildInfo}--></td>
		</tr>
		
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">相册管理</font></b></td>
		</tr> 
		<!--{foreach from=$picTypeList item=item key=key}-->
		<tr>
			<td align="center"><!--{$item}--><input type="file" name="file_upload_<!--{$key}-->" id="file_upload_<!--{$key}-->"/></td>
			<td colspan="3">
			<div id="showImg_<!--{$key}-->" style="float: left;">
			<!--{foreach from=$communityDetailPicList item=item_ key=key_}-->
			<!--{if $key==$item_.pictypeId}-->
			<span style="float:left;margin:5px;line-height:25px;" id="pic_<!--{$key_}-->">
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item_.picUrl}-->">
        	<img height="200px" src="<!--{$cfg.web_url}-->uploads/<!--{$item_.picThumb}-->"/>
       		</a><br/>
       		描述：<input type="text" name="name[]" value="<!--{$item_.picInfo}-->"/><br/>
       		序号：<input type="text" name="picLayer[]" value="<!--{$item_.picLayer}-->"/>
        	<input type="button" name="deletePic_<!--{$key_}-->" onclick="dropContainer('pic_<!--{$key_}-->');" value="删除"/>
        	<input type="hidden" name="path[]" value="<!--{$item_.picUrl}-->"/>
        	<input type="hidden" name="pathThumb[]" value="<!--{$item_.picThumb}-->"/>
        	<input type="hidden" name="picTypeId[]" value="<!--{$key}-->"/>
        	</span>
			<!--{/if}-->
			<!--{/foreach}-->
			</div>
			</td>
		</tr> 
		<!--{/foreach}-->
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="信息修正并通过发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
