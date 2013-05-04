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
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 93,
			'thumbHeight': 87,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'type/outside/',
			'originalPath': 'type/outside/',
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
                $('#typePic').val(obj[0].path);
                $('#typePicThumb').val(obj[0].pathThumb);
                var html='<a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'">'
                		+'<img src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/>'
                		+'</a>';
        		$('#showImg').html(html);
				//alert(obj[0].msg+'|'+obj[0].path+'|'+obj[0].pathThumb);
            }else{
				alert(obj[0].msg);
            }
            //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        }
	 });
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title"><!--{$typeTitle}-->信息类别</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->&fid=<!--{$fid}-->" method="post" onsubmit="return exeAdminInfoTypeRelease();">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="fid" value="<!--{$fid}-->"/>
		<input type="hidden" name="type" value="<!--{$type}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">名称：</td><td><input class="input" type="text" id="typeName" name="typeName" value="<!--{if $infoTypeDetail neq '' and $infoTypeDetail.type_name neq ''}--><!--{$infoTypeDetail.type_name}--><!--{/if}-->"/></td>
			</tr>
			<tr>
				<td>类图：</td>
				<td>
				<!--{if $infoTypeDetail neq '' and $infoTypeDetail.type_pic_thumb neq ''}-->
				<input type="hidden" id="typePic" name="typePic" value="<!--{$infoTypeDetail.type_pic}-->"/>
    	  		<input type="hidden" id="typePicThumb" name="typePicThumb" value="<!--{$infoTypeDetail.type_pic_thumb}-->"/>
    	  		<!--{else}-->
    	  		<input type="hidden" id="typePic" name="typePic" value=""/>
    	  		<input type="hidden" id="typePicThumb" name="typePicThumb" value=""/>
    	  		<!--{/if}-->
				<input type="file" name="file_upload" id="file_upload" />
				<div id="showImg">
				<!--{if $infoTypeDetail neq '' and $infoTypeDetail.type_pic_thumb neq ''}-->
				<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$infoTypeDetail.type_pic}-->">
				<img src="<!--{$cfg.web_url}-->uploads/<!--{$infoTypeDetail.type_pic_thumb}-->"/>
				</a>
				<!--{/if}-->
				</div>
				</td>
			</tr>
			<tr>
				<td >简介：</td>
				<td>
				<!--{$FCKeditor}-->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="submit" value="<!--{$typeTitle}-->类别"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('type.php');" value="取消"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title"><!--{if $infoFatherTypeDetail==''}-->信息类别列表<!--{else}-->信息类别[<!--{$infoFatherTypeDetail.type_name}-->]的子类列表 <a href="type.php?fid=<!--{$infoFatherTypeDetail.type_father_id}-->">返回上级列表</a><!--{/if}--></div>
</div>
<form name="listForm" action="action.php?action=typeDel&type=<!--{$type}-->&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="5%">排序</th>
			<th width="5%">类别ID</th>
			<th width="10%">名称</th>
			<th width="15%">类图</th>
			<th width="50%">简介</th>
			<th width="10%">操作</th>
		</tr>
		<!--{foreach from=$infoTypeList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><input class="input1" type="text" name="typeLayer[<!--{$item.id}-->]" value="<!--{$item.type_layer}-->"/></td>
			<td><!--{$item.id}--></td>
			<td><!--{$item.type_name}--></td>
			<td><!--{if $item.type_pic_thumb}--><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.type_pic_thumb}-->" width="100" height="50"/><!--{/if}--></td>
			<td><!--{$item.type_text}--></td>
			<td><a href="type.php?fid=<!--{$item.id}-->">添加子类</a> <a href="type.php?id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=typeDelById&type=<!--{$type}-->&id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->');">删除</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
<!--{if $infoTypeList neq null}-->
<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">全选</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">取消</a> <input type="button" value="排序" onclick="listForm.action='action.php?action=typeOrder&type=<!--{$type}-->&fid=<!--{$fid}-->';listForm.submit();"/>&nbsp;<input type="button" value="删除" onclick="if(confirm('你确认删除选中的条目？')){listForm.submit();}"/>
</div>
<!--{/if}-->
</form>
</body>
</html>
