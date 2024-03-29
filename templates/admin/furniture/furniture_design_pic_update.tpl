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
			location.href='furniture_design_pic_manager.php';
		});
		//初始化图片
		var html='<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$pic.picUrl}-->">'
		+'<img src="<!--{$cfg.web_url}-->uploads/<!--{$pic.picThumb}-->">'
		+'</a>';
		$('#showImg').html(html);
		$('select[name="picBuildId"]').change(function(){
			$.ajax({
					url:'furniture_design_pic_manager.php',
					data:{
							action:'getSubPicTypeJsonByParentId',
							id:$(this).val()
						},
					dataType:'text',	
					success:function(result){
						data = eval(result);
						$('select[name="pictypeId"]').empty();
						$('select[name="pictypeId"]').append('<option value="" selected="selected">选择小类</option>');
						$.each(data,function(i,e){
							$('select[name="pictypeId"]').append('<option value="'+e.id+'">'+e.text+'</option>');
						});					
					}
				});
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
					'width'     : 1000,
					'height'    : 800,
					'thumbResizeType': 1,
					'thumbWidth': 300,
					'thumbHeight': 240,
					'watermark' : 1,
					'watermarkPic': '<!--{$cfg.file_path_upload}-->watermark.png',
					'watermarkPos': 9,
					'thumbDir'    : 'furniture/designPic/',
					'originalPath': 'furniture/designPic/',
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
		        		var html='<a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
		        				+'<img src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/>'
		        				+'</a>';
						$('#showImg').html(html);
		    		}else{
						alert(obj[0].msg);
		    		}
				}
			 });
	});
	function check(){
		if($('select[name="picBuildId"]').val()=='')
		{
			alert('请选择大类！');
			$('select[name="picBuildId"]').focus();
			return false;
		}
		if($('select[name="pictypeId"]').val()=='')
		{
			alert('请选择小类！');
			$('select[name="pictypeId"]').focus();
			return false;
		}
		if(!/^[1-9]\d*$/.test($('input[name="picLayer"]').val()))
		{
			alert('排序号必须为正整数！');
			$('input[name="picLayer"]').focus();
			return false;
		}
		return true;
	}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">装修设计图片添加</div>
</div>
	<form method="post" action="furniture_design_pic_manager.php?action=doUpdate">
	<input type="hidden" name="picId" value="<!--{$pic.picId}-->"/>
	<input type="hidden" name="picBuildFatherType" value="<!--{$pic.picBuildFatherType}-->"/>
	<input type="hidden" name="picSellRent" value="<!--{$pic.picSellRent}-->"/>
	<input type="hidden" name="picUrl" value="<!--{$pic.picUrl}-->"/>
	<input type="hidden" name="picThumb" value="<!--{$pic.picThumb}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr ><td width="100">图片信息：</td><td width="300"><input class="input" type="text" name="picInfo" value="<!--{$pic.picInfo}-->"/></td>
			<td rowspan="6" id="showImg">
				
			</td>
		</tr>
		<tr ><td width="100">图片大类：</td>
		<td width="300">
			<select name="picBuildId" >
			<!--{foreach from=$cfg.arr_pic.furnitureDesignPicType item=item key=key}--> 
			<!--{if $pic.picBuildId eq key}-->
			<option value="<!--{$key}-->" selected="selected"><!--{$item}--></option>
			<!--{else}-->
			<option value="<!--{$key}-->" ><!--{$item}--></option>
			<!--{/if}-->
			<!--{/foreach}-->
			</select>
			<font color="red">*</font>
		</td>
		</tr>
		<tr>
			<td width="100">图片小类：</td>
			<td width="300">
				<select name="pictypeId" >
				<option value="<!--{$pic.pictypeId}-->" selected="selected"><!--{$cfg.arr_pic.furnitureDesignPicSubType[$pic.picBuildId][$pic.pictypeId]}--></option>
				</select>
				<font color="red">*</font>
			</td>
		</tr>
		<tr ><td width="100">排序号：</td><td><input class="input" type="text" name="picLayer" value="1"/>(正整数)</td></tr>
		<tr ><td width="100">开启：</td>
		<td>
			<!--{if $pic.picState eq 1}-->
			<input type="radio" name="picState" value="1" checked="checked"/>是 <input type="radio" name="picState" value="0"/>否
			<!--{else}-->
			<input type="radio" name="picState" value="1" />是 <input checked="checked" type="radio" name="picState" value="0"/>否
			<!--{/if}-->
		</td></tr>
		<tr ><td width="100"> </td><td ><input type="file" name="file_upload" id="file_upload" /></td></tr>
		<tr ><td colspan="3" align="center"><input type="button" value="提交" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
	</form>
</body>
</html>
