
var pictureIndex=0;//��ʼͼƬ��ʶ�ţ�����ͼƬ�ϴ�ʱ�������ʶ��������
function initPicUp(v_timestamp,v_token,v_file_path_upload,v_web_path,v_web_common,v_web_url){
	$("#file_upload").uploadify({
		'auto':true,//�Զ��ϴ�
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : v_timestamp,
			'token'     : 'v_token',
			'thumb'     : 1,//�Ƿ���������ͼ
			'resizeType': 1,//ͨ�������滻ť���ϵ�����
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
		'buttonText' :'ѡ���ϴ�',//ͨ�������滻ť���ϵ�����
		'fileSizeLimit' : '10MB',//���������ϴ��ļ����ֵB, KB, MB, GB ���磺'fileSizeLimit' : '20MB'
		'fileTypeDesc' : 'Image Files',//�Ի�����ļ���������
		'fileTypeExts' : '*.jpeg; *.gif; *.jpg; *.bmp; *.png',//���ϴ����ļ�����
	  	'fileObjName' : 'Filedata',//����һ�����֣��ڷ�������������и��ݸ�������ȡ�ϴ��ļ������ݡ�Ĭ��ΪFiledata��$tempFile = $_FILES['Filedata']['tmp_name']
	  	'width': 80,//buttonImg�Ŀ�
		'height': 20,//buttonImg�ĸ�
		'multi': true,//ѡ���ļ�ʱ�Ƿ���ԡ�ѡ��������Ĭ�ϣ�����true
		'queueSizeLimit' : 5,//������ļ��ϴ���������Ĭ�ϣ�999
		'uploadLimit' : 5,//�������ϴ��ļ���,Ĭ����999��ָͬһʱ�䣬����ر�����������´��ֿ��ϴ���
		'successTimeout' : 30,//�ϴ���ʱʱ�䡣�ļ��ϴ���ɺ�,�ȴ�������������Ϣ��ʱ��(��).����ʱ��û�з��صĻ�,�����Ϊ�����˳ɹ��� Ĭ�ϣ�30��
		'removeCompleted' : true,//�ϴ���ɺ�����Ƿ��Զ���ʧ��Ĭ�ϣ�true
		'requeueErrors' : false,//�����ϴ������Ƿ�����ع����У������������ϴ���Ĭ�ϣ�false
		'removeTimeout' : 1,//�ϴ���ɺ���ж೤ʱ�����ʧ��Ĭ�� 3��	��Ҫ��'removeCompleted' : true,ʱʹ��
		'progressData' : 'speed',//����������ʾ�Ľ���:�аٷֱ�percentage���ٶ�speed��Ĭ�ϰٷֱ�
		'preventCaching' : false,//�������ֵ Ĭ��true ����ѡtrue��false.���ѡtrue,��ô���ϴ�ʱ�����һ���������ʹÿ�ε�URL����ͬ,�Է�ֹ����.���ǿ���������URL������ͻ
		'checkExisting':v_web_path+'common/libs/uploadify/check-exists.php',//��Ŀ¼�м���ļ��Ƿ����ϴ��ɹ���1 ture,0 false��
		'swf':v_web_common+'uploadify/uploadify.swf',//����Ҫ��flash�ļ�
	 	'uploader':v_web_path+'common/libs/uploadify/uploadify.php',//����Ҫ��flash�ļ�
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//����json����
    		if(response==true && obj[0].result==1){
        		var html='<span style="float:left;margin:5px;line-height:25px;" id="pic_'+pictureIndex+'"><a target="_blank" href="'+v_web_url+'uploads/'+obj[0].path+'">'
        				+'<img height="200px" src="'+v_web_url+'uploads/'+obj[0].pathThumb+'"/>'
        				+'</a><br/>������<input type="text" name="picName[]" /><br/>��ţ�<input type="text" name="picLayer[]" value="1"/>'
        				+'<input type="button" name="deletePic_'+pictureIndex+'" onclick="dropContainer(\'pic_'+pictureIndex+'\')" value="ɾ��">'
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