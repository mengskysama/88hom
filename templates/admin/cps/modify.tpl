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
	$("#file_upload_img").uploadify({
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
			'thumbWidth': 170,
			'thumbHeight': 223,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'cps/outside/',
			'originalPath': 'cps/outside/',
			'allowType':'jpeg,jpg,gif,bmp,png'
		},
		'buttonText' :'ѡ���ϴ�',//ͨ�������滻ť���ϵ�����
		'fileSizeLimit' : '2MB',//���������ϴ��ļ����ֵB, KB, MB, GB ���磺'fileSizeLimit' : '20MB'
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
	 	'uploader':'<!--{$cfg.web_path}-->common/libs/uploadify/uploadify.php',//����Ҫ�Ĵ����ļ�
      	'onUploadSuccess' : function(file, data, response) {
	      	var obj=eval(data);//����json����
	        if(response==true && obj[0].result==1){
	        	$('#pic_path').val(obj[0].path);
	            $('#pic_thumb').val(obj[0].pathThumb);
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
	$("#file_upload").uploadify({
		'auto':true,//�Զ��ϴ�
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<!--{$timestamp}-->',
			'token'     : '<!--{$token}-->',
			'originalPath': 'files/cps/',
			'allowType':'pdf'
		},
		'buttonText' :'ѡ���ϴ�',//ͨ�������滻ť���ϵ�����
		'fileSizeLimit' : '20MB',//���������ϴ��ļ����ֵB, KB, MB, GB ���磺'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//�Ի�����ļ���������
      	'fileTypeExts' : '*.pdf',//���ϴ����ļ�����
      	'fileObjName' : 'Filedata',//����һ�����֣��ڷ�������������и��ݸ�������ȡ�ϴ��ļ������ݡ�Ĭ��ΪFiledata��$tempFile = $_FILES['Filedata']['tmp_name']
      	'width': 80,//buttonImg�Ŀ�
    	'height': 20,//buttonImg�ĸ�
    	'multi': false,//ѡ���ļ�ʱ�Ƿ���ԡ�ѡ��������Ĭ�ϣ�����true
    	'queueSizeLimit' : 1,//������ļ��ϴ���������Ĭ�ϣ�999
    	'uploadLimit' : 999,//�������ϴ��ļ���,Ĭ����999��ָͬһʱ�䣬����ر�����������´��ֿ��ϴ���
    	'successTimeout' : 120,//�ϴ���ʱʱ�䡣�ļ��ϴ���ɺ�,�ȴ�������������Ϣ��ʱ��(��).����ʱ��û�з��صĻ�,�����Ϊ�����˳ɹ��� Ĭ�ϣ�30��
    	'removeCompleted' : true,//�ϴ���ɺ�����Ƿ��Զ���ʧ��Ĭ�ϣ�true
    	'requeueErrors' : false,//�����ϴ������Ƿ�����ع����У������������ϴ���Ĭ�ϣ�false
    	'removeTimeout' : 1,//�ϴ���ɺ���ж೤ʱ�����ʧ��Ĭ�� 3��	��Ҫ��'removeCompleted' : true,ʱʹ��
    	'progressData' : 'speed',//����������ʾ�Ľ���:�аٷֱ�percentage���ٶ�speed��Ĭ�ϰٷֱ�
    	'preventCaching' : false,//�������ֵ Ĭ��true ����ѡtrue��false.���ѡtrue,��ô���ϴ�ʱ�����һ���������ʹÿ�ε�URL����ͬ,�Է�ֹ����.���ǿ���������URL������ͻ
		'checkExisting':'<!--{$cfg.web_path}-->common/libs/uploadify/check-exists.php',//��Ŀ¼�м���ļ��Ƿ����ϴ��ɹ���1 ture,0 false��
		'swf':'<!--{$cfg.web_common}-->uploadify/uploadify.swf',//����Ҫ��flash�ļ�
	 	'uploader':'<!--{$cfg.web_path}-->common/libs/uploadify/uploadify_files.php',//����Ҫ�Ĵ����ļ�
      	'onUploadSuccess' : function(file, data, response) {
	      	var obj=eval(data);//����json����
	        if(response==true && obj[0].result==1){
	        	$('#file_name').val(obj[0].name);
	            $('#file_path').val(obj[0].path);
	            var html='�Ѵ��ļ���'+obj[0].name;
	      		$('#showFile').html(html);
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
		<div class="title">��Ϣ�޸�</div>
</div>
<form id="modifyForm" name="modifyForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminCpsModify();">
	<input type="hidden" id="id" name="id" value="<!--{$mediaDetail.id}-->"/>
	<input type="hidden" name="type" value="<!--{$type}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">���⣺</td><td><input class="input" type="text" id="title" name="title" value="<!--{$mediaDetail.title}-->" style="width: 300px;"/></td>
		</tr>
		<tr>
			<td>���ͼ��</td>
			<td>
			<font color="red">ע�⣺���ϴ��ߴ�Ϊ170(��)*223(��)��ͼƬ,�����ߴ��С���Զ��ȱ���������170(��)*223(��)��</font><br/><br/>
			<input type="hidden" id="pic_path" name="pic_path" value="<!--{$mediaDetail.pic_path}-->"/>
    	  	<input type="hidden" id="pic_thumb" name="pic_thumb" value="<!--{$mediaDetail.pic_thumb}-->"/>
			<input type="file" name="file_upload_img" id="file_upload_img" />
			<div id="showImg">
			<!--{if $mediaDetail neq '' and $mediaDetail.pic_thumb neq ''}-->
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$mediaDetail.pic_path}-->">
			<img src="<!--{$cfg.web_url}-->uploads/<!--{$mediaDetail.pic_thumb}-->"/>
			</a>
			<!--{/if}-->
			</div>
			</td>
		</tr>
		<tr>
			<td>�`�ļ���</td>
			<td>
			<font color="red">ע�⣺�ϴ��ļ���С�벻Ҫ����20M��</font><br/><br/>
			<input type="hidden" id="file_name" name="file_name" value="<!--{$mediaDetail.file_name}-->"/>
			<input type="hidden" id="file_path" name="file_path" value="<!--{$mediaDetail.file_path}-->"/>
			<input type="file" name="file_upload" id="file_upload" />
			<div id="showFile">�Ѵ��ļ���<!--{$mediaDetail.file_name}--></div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="�޸���Ϣ"/></td>
		</tr>
	</table>
</form>
</body>
</html>
