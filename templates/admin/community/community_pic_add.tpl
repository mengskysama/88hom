<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
			if(check())
				$('form:first').submit();
		});
		$('#return').click(function(){
			location.href='community_manager.php';
		});
		$('#return1').click(function(){
			location.href='community_manager.php?action=pic&subAction=list&picBuildId=<!--{$picBuildId}-->';
		});

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
		        		$('input[name="picUrl"]').val(obj[0].path);
		        		$('input[name="picThumb"]').val(obj[0].pathThumb);
		        		var html='<span style="float:left;margin:5px;line-height:25px;"><a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
		        				+'<img src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/>'
		        				+'</a><br/>名称：<input type="text" name="name[]" value=""/><br/>序号：<input type="text" name="orderNum[]" value="1"/>(正整数)<input type="hidden" name="path[]" value="'
		        				+obj[0].path+'"/><input type="hidden" name="pathThumb[]" value="'
		        				+obj[0].pathThumb+'"/></span>';
						$('#showImg').append(html);
		    		}else{
						alert(obj[0].msg);
		    		}
				}
			 });
	});
	function check(){
		/*if($('input[name="picInfo"]').val()=='')
		{
			alert('请输入图片信息！');
			$('input[name="picInfo"]').focus();
			return false;
		}*/
		if($('select[name="pictypeId"]').val()=='')
		{
			alert('请选择图片类别！');
			$('select[name="pictypeId"]').focus();
			return false;
		}
		if($('input[name="name[]"]').length==0)
		{
			alert('请选择上传图片！');
			return false;
		}
		/*if($('select[name="picBuildType"]').val()=='')
		{
			alert('请选择物业类型！');
			$('select[name="picBuildType"]').focus();
			return false;
		}
		if(!/^[1-9]\d*$/.test($('input[name="picLayer"]').val()))
		{
			alert('排序号必须为正整数！');
			$('input[name="picLayer"]').focus();
			return false;
		}*/ 
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">小区图片添加</div>
</div>
	<form method="post" action="community_manager.php?action=pic&subAction=doAdd">
	<input type="hidden" name="picBuildId" value="<!--{$picBuildId}-->"/>
	<!-- <input type="hidden" name="picSellRent" value="0"/>
	<input type="hidden" name="picUrl" value=""/>
	<input type="hidden" name="picThumb" value=""/> -->
	<table cellspacing="0" cellpadding="0" >
		<tr ><td width="100">图片类别：</td>
		<td width="300">
			<select name="pictypeId" >
			<option value="" selected="selected">选择类别</option>
			<!--{foreach from=$cfg.arr_pic.communityPicType item=item key=key}--> 
			<option value="<!--{$key}-->"><!--{$item}--></option>
			<!--{/foreach}-->
			</select>
			<font color="red">*</font>
		</td>
		<td rowspan="2" id="showImg">
				
		</td>
		</tr>
		<!--  <tr ><td width="100">排序号：</td><td><input class="input" type="text" name="picLayer" value="1"/>(正整数)</td></tr>
		<tr ><td width="100">开启：</td>
		<td>
			<input type="radio" name="picState" value="1" checked="checked"/>是 <input type="radio" name="picState" value="0"/>否
		</td></tr>-->
		<tr ><td width="100"> </td><td ><input type="file" name="file_upload" id="file_upload" /></td></tr>
		<tr ><td colspan="3" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回图片列表" id="return1"/> <input type="button" value="返回小区列表" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
