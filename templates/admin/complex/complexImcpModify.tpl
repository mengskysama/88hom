<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	$("#file_upload").uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<!--{$timestamp}-->',
			'token'     : '<!--{$token}-->',
			'thumb'     : 0,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 300,
			'height'    : 120,
			'thumbResizeType': 1,
			'thumbWidth': 320,
			'thumbHeight': 120,
			'watermark' : 0,
			'watermarkPic': '<!--{$cfg.file_path_upload}-->watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : 'imcp/',
			'originalPath': 'imcp/',
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
    			$('#imcpLogo').val(obj[0].path);
	            var html='<a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
	              		+'<img width="300px;" height="120px;" src="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'"/>'
	              		+'</a>';
	      		$('#showImg').html(html);
    		}else{
				alert(obj[0].msg);
    		}
		}
	});
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息修改</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=complexImcpModify" method="post" onsubmit="return exeAdminComplexImcpModify();">
	<input type="hidden" id="imcpId" name="imcpId" value="<!--{$imcpDetail.imcpId}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="150">中介公司名称【短写】：</td><td><input class="input" type="text" id="imcpShortName" name="imcpShortName" style="width: 300px;" value="<!--{$imcpDetail.imcpShortName}-->"/></td>
		</tr> 
		<tr>
			<td>中介公司名称【全称】：</td><td><input class="input" type="text" id="imcpName" name="imcpName" style="width: 300px;" value="<!--{$imcpDetail.imcpName}-->"/></td>
		</tr> 
		<tr>
			<td>中介公司地址：</td><td><input class="input" type="text" id="imcpAddress" name="imcpAddress" style="width: 300px;" value="<!--{$imcpDetail.imcpAddress}-->"/></td>
		</tr> 
		<tr>
			<td>中介公司网址：</td><td><input class="input" type="text" id="imcpWebSite" name="imcpWebSite" style="width: 300px;" value="<!--{$imcpDetail.imcpWebSite}-->"/></td>
		</tr> 
		<tr>
			<td>中介公司LOGO：</td>
			<td>
			<font color="red">注意：上传图片大小请不要超过10M！</font><br/><br/>
			<div style="float: left;clear: both;">
			<!--{if $imcpDetail.imcpLogo!=''}-->
			<input type="hidden" id="imcpLogo" name="imcpLogo" value="<!--{$imcpDetail.imcpLogo}-->"/>
    	  	<!--{else}-->
    	  	<input type="hidden" id="imcpLogo" name="imcpLogo" value=""/>
    	  	<!--{/if}-->
			<input type="file" name="file_upload" id="file_upload" style="float: left;"/>
			</div>
			<div id="showImg" style="float: left;clear: both;">
			<!--{if $imcpDetail.imcpLogo!=''}-->
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$imcpDetail.imcpLogo}-->">
			<img width="300px;" height="120px;" src="<!--{$cfg.web_url}-->uploads/<!--{$imcpDetail.imcpLogo}-->"/>
			</a>
			<!--{/if}-->
			</div>
			</td>
		</tr>
		<tr>
			<td>中介公司简介：</td><td><!--{$FCKeditor}--></td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="信息修改"/></td>
		</tr>
	</table>
</form>
</body>
</html>
