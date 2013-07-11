<?php /* Smarty version Smarty-3.1.8, created on 2013-07-11 10:58:19
         compiled from "E:/workspace/projects/88hom/templates\admin\property\release.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2965251de1d8d526506-23759484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e458f10b38a0f83ca7660fa78ab4f3b3fb2c4c37' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\admin\\property\\release.tpl',
      1 => 1373511265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2965251de1d8d526506-23759484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51de1d8d67a6d5_55554205',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'picTypeList' => 0,
    'key' => 0,
    'timestamp' => 0,
    'token' => 0,
    'FCKeditorTraffic' => 0,
    'FCKeditorPeriInfo' => 0,
    'FCKeditorIntroduction' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de1d8d67a6d5_55554205')) {function content_51de1d8d67a6d5_55554205($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
var pictureIndex=0;
$(document).ready(function(){
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	initPicUp(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
);
	<?php } ?>
	doShow('propertyIsGbuy');
	doShow('propertyIsDiscounts');
	doShow('propertyIsPreferential');
});
function initPicUp(id){
	$("#file_upload_"+id).uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
',
			'token'     : '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 300,
			'thumbHeight': 240,
			'watermark' : 1,
			'watermarkPic': '<?php echo $_smarty_tpl->tpl_vars['cfg']->value['file_path_upload'];?>
watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : 'property/',
			'originalPath': 'property/',
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
		'checkExisting':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
        		var html='<span style="float:left;margin:5px;line-height:25px;" id="pic_'+pictureIndex+'"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/'+obj[0].path+'">'
        				+'<img height="200px" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/'+obj[0].pathThumb+'"/>'
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
function doShow(name){
	if($('#'+name).attr('checked')=='checked'){
		$('#'+name+'Div').css("display", "block");	
	}else{
		$('#'+name+'Div').css("display", "none");
	}
}
function dropContainer(containerId){
	$('#'+containerId).remove();
}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息发布</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=release" method="post" onsubmit="return exeAdminPropertyRelease();">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">基本信息</font></b></td>
		</tr> 
		<tr>
			<td width="80">新盘名称：</td><td width="600"><input class="input" type="text" id="propertyName" name="propertyName" style="width: 352px;"/> <font color="red">*</font></td>
			<td width="100">物业类型：</td>
			<td>
				<div id="propertyIs">
				<input id="propertyIsHouseType" name="propertyIsHouseType" value="1" type="checkbox"/>住宅 
				<input id="propertyIsBusinessType" name="propertyIsBusinessType" value="1" type="checkbox"/>商铺  
				<input id="propertyIsOfficeType" name="propertyIsOfficeType" value="1" type="checkbox"/>写字楼   
				<input id="propertyIsVillaType" name="propertyIsVillaType" value="1" type="checkbox"/>别墅  <font color="red">*</font>
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
							<input type="hidden" name="areaIndex"	id="areaIndex" value=""/>	
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
			<td>建筑类型：</td><td><input class="input" type="text" id="propertyBuildingType" name="propertyBuildingType" style="width: 352px;"/> 例：塔楼 高层</td>
		</tr>
		<tr>
			<td>开盘时间：</td><td><input class="input" type="text" id="propertyOpenTime" name="propertyOpenTime" style="width: 352px;"/> 例：2013-06-06</td>
			<td>入住时间：</td><td><input class="input" type="text" id="propertyCheckInTime" name="propertyCheckInTime" style="width: 352px;"/> 例：2013-09-01</td>
		</tr>
		<tr>
			<td>项目特色：</td><td><input class="input" type="text" id="propertyFeature" name="propertyFeature" style="width: 352px;"/> 例：复合地产 地铁沿线</td>
			<td>主力户型：</td><td><input class="input" type="text" id="propertyMainHouseModel" name="propertyMainHouseModel" style="width: 352px;"/> 例：80㎡100㎡133㎡</td>
		</tr>
		<tr>
			<td>容积率：</td><td><input class="input" type="text" id="propertyVolRate" name="propertyVolRate" style="width: 352px;"/>% 例：填大于0小于100的数字类型</td>
			<td>绿化率：</td><td><input class="input" type="text" id="propertyGreenRate" name="propertyGreenRate" style="width: 352px;"/>%  例：填大于0小于100的数字类型</td>
		</tr>
		<tr>
			<td>占地面积：</td><td><input class="input" type="text" id="propertyLandArea" name="propertyLandArea" style="width: 352px;"/>㎡ 例：填大于0的数字类型</td>
			<td>建筑面积：</td><td><input class="input" type="text" id="propertyBuildArea" name="propertyBuildArea" style="width: 352px;"/>㎡ 例：填大于0的数字类型</td>
		</tr>
		<tr>
			<td>产权年限：</td><td><input class="input" type="text" id="propertyRight" name="propertyRight" style="width: 352px;"/>年 例：70(填大于0小于等于70的正整数)</td>
			<td>装修状况：</td><td><input class="input" type="text" id="propertyFitmentStatus" name="propertyFitmentStatus" style="width: 352px;"/> 例：精装 毛坯</td>
		</tr>
		<tr>
			<td>户数信息：</td><td><input class="input" type="text" id="propertyHouseholds" name="propertyHouseholds" style="width: 352px;"/> 例：总户数903户 当期户数903户(此为文本字段)</td>
			<td>车位信息：</td><td><input class="input" type="text" id="propertyParkingSpaces" name="propertyParkingSpaces" style="width: 352px;"/> 例：一期1526个(地下1468个，地上58个)(此为文本字段)</td>
		</tr>
		<tr>
			<td>参考均价：</td><td><input class="input" type="text" id="propertyOpenPrice" name="propertyOpenPrice" style="width: 352px;"/>元/平方米 例：23000(填大于0的正整数)</td>
			<td>均价备注：</td><td><input class="input" type="text" id="propertyOpenPriceRemark" name="propertyOpenPriceRemark" style="width: 352px;"/> 例：暂无均价(如果均价没有就在备注这里简单写下原因)</td>
		</tr>
		<tr>
			<td>地图经纬度：</td><td><input class="input" type="text" id="propertyMapXY" name="propertyMapXY" style="width: 352px;"/> <font color="red">*</font> 例：116.463404,39.876646 (请用百度地图坐标拾取器获取19级层数数值 <a target="_blank" href="http://api.map.baidu.com/lbsapi/getpoint/">http://api.map.baidu.com/lbsapi/getpoint/</a>)</td>
			<td>按揭银行：</td><td><input class="input" type="text" id="propertyMortgageBank" name="propertyMortgageBank" style="width: 352px;"/> 例：中国银行 建设银行 农业银行</td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">物业信息</font></b></td>
		</tr> 
		<tr>
			<td>物业公司：</td><td><input class="input" type="text" id="propertyCompany" name="propertyCompany" style="width: 352px;"/></td>
			<td>物业地址：</td><td><input class="input" type="text" id="propertyCompanyAddress" name="propertyCompanyAddress" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td>物业管理费：</td><td><input class="input" type="text" id="propertyCompanyFee" name="propertyCompanyFee" style="width: 352px;"/>元/平方米·月 例：2.98(填大于0的数值)</td>
			<td>物业公司网址：</td><td><input class="input" type="text" id="propertyCompanyWebsite" name="propertyCompanyWebsite" style="width: 352px;"/> 例：http://www.xxx.com</td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">开发商信息</font></b></td>
		</tr> 
		<tr>
			<td>开发商：</td><td><input class="input" type="text" id="propertyDevCompany" name="propertyDevCompany" style="width: 352px;"/></td>
			<td>开发商地址：</td><td><input class="input" type="text" id="propertyDevCompanyAddress" name="propertyDevCompanyAddress" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td>预售许可证：</td><td><input class="input" type="text" id="propertyPreSellPermits" name="propertyPreSellPermits" style="width: 352px;"/></td>
			<td>开发商网址：</td><td><input class="input" type="text" id="propertyDevCompanyWebsite" name="propertyDevCompanyWebsite" style="width: 352px;"/> 例：http://www.xxx.com</td>
		</tr>
		<tr>
			<td>开工时间：</td><td><input class="input" type="text" id="propertyStartingTime" name="propertyStartingTime" style="width: 352px;"/> 例：2013-06-06</td>
			<td>竣工时间：</td><td><input class="input" type="text" id="propertyEndingTime" name="propertyEndingTime" style="width: 352px;"/> 例：2013-06-06</td>
		</tr>
		<tr>
			<td>代理商：</td><td><input class="input" type="text" id="propertyProxyCompany" name="propertyProxyCompany" style="width: 352px;"/></td>
			<td>工程进度：</td><td><input class="input" type="text" id="propertyWorksProgramme" name="propertyWorksProgramme" style="width: 352px;"/> 例：在建(2013-06-20)</td>
		</tr>
		<tr>
			<td>售房热线：</td><td><input class="input" type="text" id="propertyHotline" name="propertyHotline" style="width: 352px;"/></td>
			<td>售楼地址：</td><td><input class="input" type="text" id="propertySellAddress" name="propertySellAddress" style="width: 352px;"/></td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">详细其他</font></b></td>
		</tr> 
		<tr>
			<td>交通状况：</td><td colspan="3"><?php echo $_smarty_tpl->tpl_vars['FCKeditorTraffic']->value;?>
</td>
		</tr>
		<tr>
			<td>周边信息：</td><td colspan="3"><?php echo $_smarty_tpl->tpl_vars['FCKeditorPeriInfo']->value;?>
</td>
		</tr>
		<tr>
			<td>项目简介：</td><td colspan="3"><?php echo $_smarty_tpl->tpl_vars['FCKeditorIntroduction']->value;?>
</td>
		</tr>
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">其他设置</font></b></td>
		</tr> 
		<tr>
			<td colspan="4">
			<input name="propertyIsRecommend" value="1" type="checkbox"/>推荐楼盘
			<input name="propertyIsFine" value="1" type="checkbox"/>精品楼盘
			<input name="propertyIsHot" value="1" type="checkbox"/>热卖楼盘
			<input name="propertyIsSmallAmt" value="1" type="checkbox"/>小户型
			<input name="propertyIsSubwayLine" value="1" type="checkbox"/>地铁沿线
			<input name="propertyIsBusiness" value="1" type="checkbox"/>商业地产
			<input name="propertyIsPark" value="1" type="checkbox"/>公园地产
			<input name="propertyIsInvestment" value="1" type="checkbox"/>投资地产
			</td>
		</tr> 
		<tr>
			<td colspan="4">
			<input id="propertyIsGbuy" name="propertyIsGbuy" value="1" type="checkbox" onclick="doShow('propertyIsGbuy');"/>团购活动
			<div id="propertyIsGbuyDiv" style="display: none;">
			<table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100">是否置顶：</td><td width="450"><input name="propertyIsGbuyTop" value="1" type="checkbox"/>信息置顶</td>
                    <td width="100">市场均价：</td><td><input class="input" type="text" id="propertyGbuyPrice" name="propertyGbuyPrice" style="width: 352px;"/></td>
                </tr>
                <tr>
                    <td>团购小标语：</td><td><input class="input" type="text" id="propertyGbuyTitle" name="propertyGbuyTitle" style="width: 352px;"/></td>
                    <td>过期时间：</td><td><input class="input" type="text" id="propertyGbuyTime" name="propertyGbuyTime" style="width: 352px;"/>天 例：9(填大于0的正整数)</td>
                </tr>
            </table>
            </div>
			</td>
		</tr> 
		<tr>
			<td colspan="4">
			<input id="propertyIsDiscounts" name="propertyIsDiscounts" value="1" type="checkbox" onclick="doShow('propertyIsDiscounts');"/>打折促销
			<div id="propertyIsDiscountsDiv" style="display: none;">
			<table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100">市场均价：</td><td width="450"><input class="input" type="text" id="propertyDiscountsPrice" name="propertyDiscountsPrice" style="width: 352px;"/></td>
                    <td width="100">促销小标语：</td><td><input class="input" type="text" id="propertyDiscountsTitle" name="propertyDiscountsTitle" style="width: 352px;"/></td>
                </tr>
            </table>
            </div>
			</td>
		</tr> 
		<tr>
			<td colspan="4">
			<input id="propertyIsPreferential" name="propertyIsPreferential" value="1" type="checkbox" onclick="doShow('propertyIsPreferential');"/>独家特惠
			<div id="propertyIsPreferentialDiv" style="display: none;">
			<table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="100">市场均价：</td><td width="450"><input class="input" type="text" id="propertyPreferentialPrice" name="propertyPreferentialPrice" style="width: 352px;"/></td>
                    <td width="100">特惠小标语：</td><td><input class="input" type="text" id="propertyPreferentialTitle" name="propertyPreferentialTitle" style="width: 352px;"/></td>
                </tr>
            </table>
            </div>
			</td>
		</tr> 
		<tr>
			<td colspan="4"><b><font style="font-size:12px;">相册管理</font></b></td>
		</tr> 
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['picTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tr>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
<input type="file" name="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="file_upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/></td>
			<td colspan="3">
			<div id="showImg_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="float: left;">
			
			</div>
			</td>
		</tr> 
		<?php } ?>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="信息发布"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php }} ?>