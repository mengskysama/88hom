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
			'thumbWidth': 200,
			'thumbHeight': 300,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'user/outside/',
			'originalPath': 'user/outside/',
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
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
		<div class="title">��Ϣ�޸�</div>
</div>
<form id="releaseForm" name="releaseForm" action="action.php?action=modify" method="post" onsubmit="return exeAdminWebUserModify();">
	<input type="hidden" id="id" name="id" value="<!--{$userDetail.id}-->"/>
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<td width="70">�û�����</td>
			<td>
			<!--{$userDetail.username}-->
			</td>
		</tr> 
		<tr>
			<td>���룺</td>
			<td>
			<input class="input" type="password" id="password" name="password" value="<!--{$userDetail.password}-->"/>
			</td>
		</tr> 
		<tr>
			<td>ȷ�����룺</td>
			<td>
			<input class="input" type="password" id="password_" name="password_" value="<!--{$userDetail.password}-->"/>
			</td>
		</tr> 
		<tr>
			<td>������</td>
			<td>
			<input class="input" type="text" id="uname" name="uname" value="<!--{$userDetail.uname}-->"/>
			</td>
		</tr> 
		<tr>
			<td>�Ա�</td>
			<td>
			<!--{if $userDetail.sex==1}-->
			<input type="radio" name="sex" value="1" checked="checked">��</input> <input type="radio" name="sex" value="0">Ů</input>
			<!--{else}-->
			<input type="radio" name="sex" value="1">��</input> <input type="radio" name="sex" value="0" checked="checked">Ů</input>
			<!--{/if}-->
			</td>
		</tr>
		<tr>
			<td>���ţ�</td><td><input class="input" type="text" id="dept" name="dept" value="<!--{$userDetail.dept}-->"/></td>
		</tr>
		<tr>
			<td>��ϵ�绰��</td><td><input class="input" type="text" id="tel" name="tel" value="<!--{$userDetail.tel}-->"/></td>
		</tr>
		<tr>
			<td>��ַ��</td><td><input class="input" type="text" id="address" name="address" value="<!--{$userDetail.address}-->"/></td>
		</tr>
		<tr>
			<td>������Ƭ��</td>
			<td>
			<!--{if $userDetail neq '' and $userDetail.path_thumb neq ''}-->
			<input type="hidden" id="path" name="path" value="<!--{$userDetail.path}-->"/>
    	  	<input type="hidden" id="pathThumb" name="pathThumb" value="<!--{$userDetail.path_thumb}-->"/>
    	  	<!--{else}-->
    	  	<input type="hidden" id="path" name="path" value=""/>
    	  	<input type="hidden" id="pathThumb" name="pathThumb" value=""/>
    	  	<!--{/if}-->
			<input type="file" name="file_upload" id="file_upload" />
			<div id="showImg">
			<!--{if $userDetail neq '' and $userDetail.path_thumb neq ''}-->
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$userDetail.path}-->">
			<img src="<!--{$cfg.web_url}-->uploads/<!--{$userDetail.path_thumb}-->"/>
			</a>
			<!--{/if}-->
			</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td><td><input type="submit" value="��Ϣ�޸�"/></td>
		</tr>
	</table>
</form>
</body>
</html>
