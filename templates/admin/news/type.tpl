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
			'thumbWidth': 93,
			'thumbHeight': 87,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'type/outside/',
			'originalPath': 'type/outside/',
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
		<div class="title"><!--{$typeTitle}-->��Ϣ���</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<!--{$action}-->&fid=<!--{$fid}-->" method="post" onsubmit="return exeAdminInfoTypeRelease();">
		<input type="hidden" name="id" value="<!--{$id}-->"/>
		<input type="hidden" name="fid" value="<!--{$fid}-->"/>
		<input type="hidden" name="type" value="<!--{$type}-->"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">���ƣ�</td><td><input class="input" type="text" id="typeName" name="typeName" value="<!--{if $infoTypeDetail neq '' and $infoTypeDetail.type_name neq ''}--><!--{$infoTypeDetail.type_name}--><!--{/if}-->"/></td>
			</tr>
			<tr>
				<td>��ͼ��</td>
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
				<td >��飺</td>
				<td>
				<!--{$FCKeditor}-->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="submit" value="<!--{$typeTitle}-->���"/>&nbsp;<!--{if $id neq ''}--><input type="button" onclick="location.replace('type.php');" value="ȡ��"/><!--{/if}--></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
	<div class="title"><!--{if $infoFatherTypeDetail==''}-->��Ϣ����б�<!--{else}-->��Ϣ���[<!--{$infoFatherTypeDetail.type_name}-->]�������б� <a href="type.php?fid=<!--{$infoFatherTypeDetail.type_father_id}-->">�����ϼ��б�</a><!--{/if}--></div>
</div>
<form name="listForm" action="action.php?action=typeDel&type=<!--{$type}-->&fid=<!--{$fid}-->" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">ѡ��</th>
			<th width="5%">����</th>
			<th width="5%">���ID</th>
			<th width="10%">����</th>
			<th width="15%">��ͼ</th>
			<th width="50%">���</th>
			<th width="10%">����</th>
		</tr>
		<!--{foreach from=$infoTypeList item=item key=key}-->
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<!--{$item.id}-->"/></td>
			<td><input class="input1" type="text" name="typeLayer[<!--{$item.id}-->]" value="<!--{$item.type_layer}-->"/></td>
			<td><!--{$item.id}--></td>
			<td><!--{$item.type_name}--></td>
			<td><!--{if $item.type_pic_thumb}--><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.type_pic_thumb}-->" width="100" height="50"/><!--{/if}--></td>
			<td><!--{$item.type_text}--></td>
			<td><a href="type.php?fid=<!--{$item.id}-->">�������</a> <a href="type.php?id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->">�޸�</a> <a href="javascript:exeAdminDelMessage('action.php?action=typeDelById&type=<!--{$type}-->&id=<!--{$item.id}-->&fid=<!--{$item.type_father_id}-->');">ɾ��</a></td>
		</tr>
		<!--{/foreach}-->
	</table>
<!--{if $infoTypeList neq null}-->
<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">ȫѡ</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">ȡ��</a> <input type="button" value="����" onclick="listForm.action='action.php?action=typeOrder&type=<!--{$type}-->&fid=<!--{$fid}-->';listForm.submit();"/>&nbsp;<input type="button" value="ɾ��" onclick="if(confirm('��ȷ��ɾ��ѡ�е���Ŀ��')){listForm.submit();}"/>
</div>
<!--{/if}-->
</form>
</body>
</html>
