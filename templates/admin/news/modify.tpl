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
	var pictureIndex=<!--{$pictureIndex}-->;
	$("#file_upload").uploadify({
		'auto':true,//�Զ��ϴ�
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<!--{$timestamp}-->',
			'token'     : '<!--{$token}-->',
			'thumb'     : 1,//�Ƿ���������ͼ
			'resizeType': 1,//ͨ�������滻ť���ϵ�����
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 270,
			'thumbHeight': 188,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'info/outside/',
			'originalPath': 'info/outside/',
			'allowType':'jpeg,jpg,gif,bmp,png'
		},
		'buttonText' :'ѡ���ϴ�',//ͨ�������滻ť���ϵ�����
		'fileSizeLimit' : '10MB',//���������ϴ��ļ����ֵB, KB, MB, GB ���磺'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//�Ի�����ļ���������
	    'fileTypeExts' : '*.jpeg; *.gif; *.jpg; *.bmp; *.png',//���ϴ����ļ�����
	    'fileObjName' : 'Filedata',//����һ�����֣��ڷ�������������и��ݸ�������ȡ�ϴ��ļ������ݡ�Ĭ��ΪFiledata��$tempFile = $_FILES['Filedata']['tmp_name']
	    'width': 80,//buttonImg�Ŀ�
	  	'height': 20,//buttonImg�ĸ�
	  	'multi': false,//ѡ���ļ�ʱ�Ƿ���ԡ�ѡ��������Ĭ�ϣ�����true
	  	'queueSizeLimit' : 1,//������ļ��ϴ���������Ĭ�ϣ�999
	  	'uploadLimit' : 999,//�������ϴ��ļ���,Ĭ����999��ָͬһʱ�䣬����ر�����������´��ֿ��ϴ���
	  	'successTimeout' : 30,//�ϴ���ʱʱ�䡣�ļ��ϴ���ɺ�,�ȴ�������������Ϣ��ʱ��(��).����ʱ��û�з��صĻ�,�����Ϊ�����˳ɹ��� Ĭ�ϣ�30��
	  	'removeCompleted' : true,//�ϴ���ɺ�����Ƿ��Զ���ʧ��Ĭ�ϣ�true
	  	'requeueErrors' : false,//�����ϴ������Ƿ�����ع����У������������ϴ���Ĭ�ϣ�false
	  	'removeTimeout' : 1,//�ϴ���ɺ���ж೤ʱ�����ʧ��Ĭ�� 3��	��Ҫ��'removeCompleted' : true,ʱʹ��
	  	'progressData' : 'speed',//����������ʾ�Ľ���:�аٷֱ�percentage���ٶ�speed��Ĭ�ϰٷֱ�
	  	'preventCaching' : false,//�������ֵ Ĭ��true ����ѡtrue��false.���ѡtrue,��ô���ϴ�ʱ�����һ���������ʹÿ�ε�URL����ͬ,�Է�ֹ����.���ǿ���������URL������ͻ
		'checkExisting':'<!--{$cfg.web_path}-->common/libs/uploadify/check-exists.php',//��Ŀ¼�м���ļ��Ƿ����ϴ��ɹ���1 ture,0 false��
		'swf':'<!--{$cfg.web_common}-->uploadify/uploadify.swf',//����Ҫ��flash�ļ�
	 	'uploader':'<!--{$cfg.web_path}-->common/libs/uploadify/uploadify.php',//����Ҫ��flash�ļ�
	   	'onUploadSuccess' : function(file, data, response) {
	    	var obj=eval(data);//����json����
	        if(response==true && obj[0].result==1){
				$('#path').val(obj[0].path);
	            $('#pathThumb').val(obj[0].pathThumb);
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
	$("#file_uploads").uploadify({
		'auto':true,//�Զ��ϴ�
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<!--{$timestamp}-->',
			'token'     : '<!--{$token}-->',
			'thumb'     : 1,//�Ƿ���������ͼ
			'resizeType': 1,//ͨ�������滻ť���ϵ�����
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 270,
			'thumbHeight': 188,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'info/list/',
			'originalPath': 'info/list/',
			'allowType':'jpeg,jpg,gif,bmp,png'
		},
		'buttonText' :'ѡ���ϴ�',//ͨ�������滻ť���ϵ�����
		'fileSizeLimit' : '10MB',//���������ϴ��ļ����ֵB, KB, MB, GB ���磺'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//�Ի�����ļ���������
      	'fileTypeExts' : '*.jpeg; *.gif; *.jpg; *.bmp; *.png',//���ϴ����ļ�����
      	'fileObjName' : 'Filedata',//����һ�����֣��ڷ�������������и��ݸ�������ȡ�ϴ��ļ������ݡ�Ĭ��ΪFiledata��$tempFile = $_FILES['Filedata']['tmp_name']
      	'width': 80,//buttonImg�Ŀ�
    	'height': 20,//buttonImg�ĸ�
    	'multi': true,//ѡ���ļ�ʱ�Ƿ���ԡ�ѡ��������Ĭ�ϣ�����true
    	'queueSizeLimit' : 5,//������ļ��ϴ���������Ĭ�ϣ�999
    	'uploadLimit' : 999,//�������ϴ��ļ���,Ĭ����999��ָͬһʱ�䣬����ر�����������´��ֿ��ϴ���
    	'successTimeout' : 30,//�ϴ���ʱʱ�䡣�ļ��ϴ���ɺ�,�ȴ�������������Ϣ��ʱ��(��).����ʱ��û�з��صĻ�,�����Ϊ�����˳ɹ��� Ĭ�ϣ�30��
    	'removeCompleted' : true,//�ϴ���ɺ�����Ƿ��Զ���ʧ��Ĭ�ϣ�true
    	'requeueErrors' : false,//�����ϴ������Ƿ�����ع����У������������ϴ���Ĭ�ϣ�false
    	'removeTimeout' : 1,//�ϴ���ɺ���ж೤ʱ�����ʧ��Ĭ�� 3��	��Ҫ��'removeCompleted' : true,ʱʹ��
    	'progressData' : 'speed',//����������ʾ�Ľ���:�аٷֱ�percentage���ٶ�speed��Ĭ�ϰٷֱ�
    	'preventCaching' : false,//�������ֵ Ĭ��true ����ѡtrue��false.���ѡtrue,��ô���ϴ�ʱ�����һ���������ʹÿ�ε�URL����ͬ,�Է�ֹ����.���ǿ���������URL������ͻ
		'checkExisting':'<!--{$cfg.web_path}-->common/libs/uploadify/check-exists.php',//��Ŀ¼�м���ļ��Ƿ����ϴ��ɹ���1 ture,0 false��
		'swf':'<!--{$cfg.web_common}-->uploadify/uploadify.swf',//����Ҫ��flash�ļ�
	 	'uploader':'<!--{$cfg.web_path}-->common/libs/uploadify/uploadify.php',//����Ҫ��flash�ļ�
      	'onUploadSuccess' : function(file, data, response) {
	      	var obj=eval(data);//����json����
	        if(response==true && obj[0].result==1){
		        var html=$('#picList').html();
		        html += '<div style="float: left;width:310px;margin-right:5px;" id="pic_'+pictureIndex+'">'
		        	+'<a target="_blank" href="<!--{$cfg.web_url}-->uploads/'+obj[0].path+'"><img src="<!--{$cfg.web_url}-->uploads/'+obj[0].pathThumb+'"/></a>'
		        	+'<br/><input type="text" name="picDesc[]" value="" size="15">'
		        	+'<input type="hidden" name="picUrl[]" value="'+obj[0].path+'">'
		        	+'<input type="hidden" name="picThumb[]" value="'+obj[0].pathThumb+'">'
		        	+'<input type="button" name="deletePic_'+pictureIndex+'" onclick="dropContainer(\'pic_'+pictureIndex+'\')" value="ɾ��">'
		        	+'</div>';
		        $('#picList').html(html);
		        pictureIndex++;
						//alert(obj[0].msg+'|'+obj[0].path+'|'+obj[0].pathThumb);
		    }else{
				alert(obj[0].msg);
			}
	        //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
	    }
	});
});
function dropContainer(containerId){
	$('#'+containerId).remove();
}
</script>
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">��Ϣ�޸�</div>
</div>
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminInfoModify();">
	<input type="hidden" id="id" name="id" value="<!--{$infoDetail.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">���⣺</td><td><input class="input" type="text" id="title" name="title" value="<!--{$infoDetail.title}-->" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>��Ϣ���</td><td>
				<span style="float: left;">
				<select id="typeId" name="typeId" onchange="exeAdminChangeInfoType();">
					<option value="">��ѡ����Ϣ���</option>
					<!--{html_options options=$infoTypeSelectList selected=$infoDetail.type_id}-->
				</select>
				</span>
				<!--{$spanType}-->
			</td>
		</tr>
		<tr>
			<td>���ͼ��</td>
			<td>
			<!--{if $infoDetail neq '' and $infoDetail.path_thumb neq ''}-->
			<input type="hidden" id="path" name="path" value="<!--{$infoDetail.path}-->"/>
    	  	<input type="hidden" id="pathThumb" name="pathThumb" value="<!--{$infoDetail.path_thumb}-->"/>
    	  	<!--{else}-->
    	  	<input type="hidden" id="path" name="path" value=""/>
    	  	<input type="hidden" id="pathThumb" name="pathThumb" value=""/>
    	  	<!--{/if}-->
			<input type="file" name="file_upload" id="file_upload" />
			<div id="showImg">
			<!--{if $infoDetail neq '' and $infoDetail.path_thumb neq ''}-->
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$infoDetail.path}-->">
			<img src="<!--{$cfg.web_url}-->uploads/<!--{$infoDetail.path_thumb}-->"/>
			</a>
			<!--{/if}-->
			</div>
			</td>
		</tr>
		<tr>
			<td>��Ϣ��飺</td>
			<td>
				<!--{$FCKeditorMin}-->
			</td>
		</tr>
		<tr>
			<td>��Ϣ���飺</td>
			<td>
				<!--{$FCKeditor}-->
			</td>
		</tr>
		<tr>
			<td>�ϴ�ͼƬ��</td>
			<td>
			<input type="file" name="file_uploads" id="file_uploads" />
     		<div id="picList">	
     		<!--{foreach name=picList from=$infoPicList item=item key=key}-->
			<div style="float: left;width:310px;margin-right:5px;" id="pic_<!--{$smarty.foreach.picList.index}-->">
				<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item.pic_url}-->"><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.pic_thumb}-->"/></a>
				<br/><input type="text" name="picDesc[]" value="<!--{$item.pic_desc}-->" size="15"/>
				<input type="hidden" name="picUrl[]" value="<!--{$item.pic_url}-->"/>
				<input type="hidden" name="picThumb[]" value="<!--{$item.pic_thumb}-->"/>
				<input type="button" name="deletePic_<!--{$smarty.foreach.picList.index}-->" onclick="dropContainer('pic_<!--{$smarty.foreach.picList.index}-->')" value="ɾ��"/>
			</div>
			<!--{/foreach}-->
			</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="�޸���Ϣ"/></td>
		</tr>
	</table>
</form>
</body>
</html>
