var pictureIndex=0;//初始图片标识号，多张图片上传时，这个标识号自增长
function initPicUp(id,v_timestamp,v_token,v_file_path_upload,v_web_path,v_web_common,v_web_url){
	$("#file_upload"+id).uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : v_timestamp,
			'token'     : v_token,
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 150,
			'thumbHeight': 120,
			'watermark' : 1,
			'watermarkPic': v_file_path_upload+'watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : '2hand/',
			'originalPath': '2hand/',
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
		'queueSizeLimit' : 5,//允许多文件上传的数量。默认：999
		'uploadLimit' : 5,//限制总上传文件数,默认是999。指同一时间，如果关闭浏览器后重新打开又可上传。
		'successTimeout' : 30,//上传超时时间。文件上传完成后,等待服务器返回信息的时间(秒).超过时间没有返回的话,插件认为返回了成功。 默认：30秒
		'removeCompleted' : true,//上传完成后队列是否自动消失。默认：true
		'requeueErrors' : false,//队列上传出错，是否继续回滚队列，即反复尝试上传。默认：false
		'removeTimeout' : 1,//上传完成后队列多长时间后消失。默认 3秒	需要：'removeCompleted' : true,时使用
		'progressData' : 'speed',//进度条上显示的进度:有百分比percentage和速度speed。默认百分比
		'preventCaching' : false,//随机缓存值 默认true ，可选true和false.如果选true,那么在上传时会加入一个随机数来使每次的URL都不同,以防止缓存.但是可能与正常URL产生冲突
		'checkExisting':v_web_path+'common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':v_web_common+'uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':v_web_path+'common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
        		var html='<span style="float:left;margin:5px;line-height:25px;" id="pic_'+pictureIndex+'"><a target="_blank" href="'+v_web_url+'uploads/'+obj[0].path+'">'
        				+'<img height="200px" src="'+v_web_url+'uploads/'+obj[0].pathThumb+'"/>'
        				+'</a><br/>描述：<input type="text" name="picName[]" /><br/>序号：<input type="text" name="picLayer[]" value="1"/>'
        				+'<input type="button" name="deletePic_'+pictureIndex+'" onclick="dropContainer(\'pic_'+pictureIndex+'\')" value="删除">'
        				+'<input type="hidden" name="picPath[]" value="'+obj[0].path+'"/><input type="hidden" name="picPathThumb[]" value="'
        				+obj[0].pathThumb+'"/><input type="hidden" name="picTypeId[]" value="3"/></span>';
				$('#showImg').append(html);
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

function initPicUp2(id,v_timestamp,v_token,v_file_path_upload,v_web_path,v_web_common,v_web_url){
	$("#file_upload"+id).uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : v_timestamp,
			'token'     : v_token,
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 150,
			'thumbHeight': 120,
			'watermark' : 1,
			'watermarkPic': v_file_path_upload+'watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : '2hand/',
			'originalPath': '2hand/',
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
		'queueSizeLimit' : 5,//允许多文件上传的数量。默认：999
		'uploadLimit' : 5,//限制总上传文件数,默认是999。指同一时间，如果关闭浏览器后重新打开又可上传。
		'successTimeout' : 30,//上传超时时间。文件上传完成后,等待服务器返回信息的时间(秒).超过时间没有返回的话,插件认为返回了成功。 默认：30秒
		'removeCompleted' : true,//上传完成后队列是否自动消失。默认：true
		'requeueErrors' : false,//队列上传出错，是否继续回滚队列，即反复尝试上传。默认：false
		'removeTimeout' : 1,//上传完成后队列多长时间后消失。默认 3秒	需要：'removeCompleted' : true,时使用
		'progressData' : 'speed',//进度条上显示的进度:有百分比percentage和速度speed。默认百分比
		'preventCaching' : false,//随机缓存值 默认true ，可选true和false.如果选true,那么在上传时会加入一个随机数来使每次的URL都不同,以防止缓存.但是可能与正常URL产生冲突
		'checkExisting':v_web_path+'common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':v_web_common+'uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':v_web_path+'common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
        		var html='<span style="float:left;margin:5px;line-height:25px;" id="pic_'+pictureIndex+'"><a target="_blank" href="'+v_web_url+'uploads/'+obj[0].path+'">'
        				+'<img height="200px" src="'+v_web_url+'uploads/'+obj[0].pathThumb+'"/>'
        				+'</a><br/>描述：<input type="text" name="picName[]" /><br/>序号：<input type="text" name="picLayer[]" value="1"/>'
        				+'<input type="button" name="deletePic_'+pictureIndex+'" onclick="dropContainer(\'pic_'+pictureIndex+'\')" value="删除">'
        				+'<input type="hidden" name="picPath[]" value="'+obj[0].path+'"/><input type="hidden" name="picPathThumb[]" value="'
        				+obj[0].pathThumb+'"/><input type="hidden" name="picTypeId[]" value="'+id+'"/></span>';
				$('#showImg'+id).append(html);
				pictureIndex++;
    		}else{
				alert(obj[0].msg);
    		}
		}
	 });
}

function initPicUp3(id,v_timestamp,v_token,v_file_path_upload,v_web_path,v_web_common,v_web_url){
	$("#file_upload_"+id).uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : v_timestamp,
			'token'     : v_token,
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 150,
			'thumbHeight': 120,
			'watermark' : 1,
			'watermarkPic': v_file_path_upload+'watermark.png',
			'watermarkPos': 9,
			'thumbDir'    : '2hand/',
			'originalPath': '2hand/',
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
		'queueSizeLimit' : 5,//允许多文件上传的数量。默认：999
		'uploadLimit' : 5,//限制总上传文件数,默认是999。指同一时间，如果关闭浏览器后重新打开又可上传。
		'successTimeout' : 30,//上传超时时间。文件上传完成后,等待服务器返回信息的时间(秒).超过时间没有返回的话,插件认为返回了成功。 默认：30秒
		'removeCompleted' : true,//上传完成后队列是否自动消失。默认：true
		'requeueErrors' : false,//队列上传出错，是否继续回滚队列，即反复尝试上传。默认：false
		'removeTimeout' : 1,//上传完成后队列多长时间后消失。默认 3秒	需要：'removeCompleted' : true,时使用
		'progressData' : 'speed',//进度条上显示的进度:有百分比percentage和速度speed。默认百分比
		'preventCaching' : false,//随机缓存值 默认true ，可选true和false.如果选true,那么在上传时会加入一个随机数来使每次的URL都不同,以防止缓存.但是可能与正常URL产生冲突
		'checkExisting':v_web_path+'common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':v_web_common+'uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':v_web_path+'common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
        		var html='<dl id="pic_'+pictureIndex+'">'
        	        + '<dt><img src="'+v_web_url+'uploads/'+obj[0].pathThumb+'"></dt>'
        	        + '<dd><span class="redlink"><a href="javascript:void(0)" onclick="changeTopicImg(\''+v_web_url+'uploads/'+obj[0].pathThumb+'\',\''+obj[0].pathThumb+'\',\''+obj[0].path+'\')">设为标题图</a></span></dd>'
        	        + '<dd>描述：<input type="text" class="input01" name="picName[]" /><a href="javascript:void(0)" onclick="dropContainer(\'pic_'+pictureIndex+'\')"><img src="'+v_web_url+'templates/images/ucenter/cha.JPG"></a></dd>'
        	    +'</dl>'
        	    + '<input type="hidden" name="picPath[]" value="'+obj[0].path+'"/>'
        	    + '<input type="hidden" name="picPathThumb[]" value="'+obj[0].pathThumb+'"/>'
        	    + '<input type="hidden" name="picTypeId[]" value="'+id+'"/>'
        	    + '<input type="hidden" name="picLayer[]" value="0"/>';
				$('#showImg_'+id).append(html);
				pictureIndex++;
    		}else{
				alert(obj[0].msg);
    		}
		}
	 });

}
function changeTopicImg(img,pathThumb,picPath){
	$("#topic_image").html("<img src=\"" + img + "\">");
	$("#topPicPath").val(picPath);
	$("#topPicPathThumb").val(pathThumb);
}