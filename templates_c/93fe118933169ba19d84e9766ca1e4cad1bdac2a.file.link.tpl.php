<?php /* Smarty version Smarty-3.1.8, created on 2013-04-29 15:47:19
         compiled from "E:/home/web/88hom/templates\admin\system\link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14776517e2587896951-65380090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93fe118933169ba19d84e9766ca1e4cad1bdac2a' => 
    array (
      0 => 'E:/home/web/88hom/templates\\admin\\system\\link.tpl',
      1 => 1365405171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14776517e2587896951-65380090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'timestamp' => 0,
    'token' => 0,
    'typeTitle' => 0,
    'action' => 0,
    'id' => 0,
    'type' => 0,
    'linkDetail' => 0,
    'linkList' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517e2587a07e56_91721719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e2587a07e56_91721719')) {function content_517e2587a07e56_91721719($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_page']['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
$(document).ready(function() {
	 $("#file_upload").uploadify({
		'auto':true,//自动上传
		'method':'post',
		'debug':false,
		'formData'     : {
			'timestamp' : '<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
',
			'token'     : '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
			'thumb'     : 1,//是否生成缩略图
			'resizeType': 1,//通过文字替换钮扣上的文字
			'width'     : 1200,
			'height'    : 1200,
			'thumbResizeType': 1,
			'thumbWidth': 98,
			'thumbHeight': 57,
			'watermark' : 0,
			'watermarkPic': 'seo7788.com',
			'watermarkPos': 9,
			'thumbDir'    : 'link/outside/',
			'originalPath': 'link/outside/',
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
		'checkExisting':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
common/libs/uploadify/check-exists.php',//在目录中检查文件是否已上传成功（1 ture,0 false）
		'swf':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_common'];?>
uploadify/uploadify.swf',//所需要的flash文件
	 	'uploader':'<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_path'];?>
common/libs/uploadify/uploadify.php',//所需要的flash文件
		'onUploadSuccess' : function(file, data, response) {
			var obj=eval(data);//返回json数组
    		if(response==true && obj[0].result==1){
        		$('#path').val(obj[0].path);
        		$('#pathThumb').val(obj[0].pathThumb);
        		var html='<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/'+obj[0].path+'">'
        				+'<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/'+obj[0].pathThumb+'"/>'
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
	<div class="title"><?php echo $_smarty_tpl->tpl_vars['typeTitle']->value;?>
友情链接</div>
</div>
<div>
	<form id="releaseForm" name="releaseForm" action="action.php?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" method="post">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
		<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"/>
		<table cellspacing="0" cellpadding="0" >
			<tr>
				<td width="100">名称：</td><td><input class="input" type="text" id="name" name="name" value="<?php if ($_smarty_tpl->tpl_vars['linkDetail']->value!=''&&$_smarty_tpl->tpl_vars['linkDetail']->value['name']!=''){?><?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['name'];?>
<?php }?>"/></td>
			</tr>
			<tr>
				<td>URL：</td><td><input class="input" type="text" id="url" name="url" value="<?php if ($_smarty_tpl->tpl_vars['linkDetail']->value!=''&&$_smarty_tpl->tpl_vars['linkDetail']->value['url']!=''){?><?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['url'];?>
<?php }?>"/></td>
			</tr>
			<tr>
				<td>Logo：</td>
				<td>
				<?php if ($_smarty_tpl->tpl_vars['linkDetail']->value!=''&&$_smarty_tpl->tpl_vars['linkDetail']->value['path_thumb']!=''){?>
				<input type="hidden" id="path" name="path" value="<?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['path'];?>
"/>
	    	  	<input type="hidden" id="pathThumb" name="pathThumb" value="<?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['path_thumb'];?>
"/>
	    	  	<?php }else{ ?>
	    	  	<input type="hidden" id="path" name="path" value=""/>
	    	  	<input type="hidden" id="pathThumb" name="pathThumb" value=""/>
	    	  	<?php }?>
				<input type="file" name="file_upload" id="file_upload" />
				<div id="showImg">
				<?php if ($_smarty_tpl->tpl_vars['linkDetail']->value!=''&&$_smarty_tpl->tpl_vars['linkDetail']->value['path_thumb']!=''){?>
				<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['path'];?>
">
				<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['linkDetail']->value['path_thumb'];?>
"/>
				</a>
				<?php }?>
				</div>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td><td><input type="button" onclick="exeAdminLinkRelease();" value="<?php echo $_smarty_tpl->tpl_vars['typeTitle']->value;?>
类别"/>&nbsp;<?php if ($_smarty_tpl->tpl_vars['id']->value!=''){?><input type="button" onclick="location.replace('link.php');" value="取消"/><?php }?></td>
			</tr>
		</table>
	</form>	
</div>

<div class="title_panel">
		<div class="title">友情链接列表</div>
</div>
<form name="listForm" action="action.php?action=linkDel" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr>
			<th width="5%">选中</th>
			<th width="10%">排序</th>
			<th width="5%">ID</th>
			<th width="20%">名称</th>
			<th width="20%">URL</th>
			<th width="20%">Logo</th>
			<th width="15%">操作</th>
			<th width="5%">状态</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['linkList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tr align="center">
			<td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"/></td>
			<td><input class="input1" type="text" name="layer[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['layer'];?>
"/></td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['path_thumb']){?><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_url'];?>
uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['path_thumb'];?>
" width="100" height="50"/><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['state']==1){?><a href="action.php?action=linkChangeState&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&state=0">屏蔽</a><?php }else{ ?><a href="action.php?action=linkChangeState&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&state=1">发布</a><?php }?> <a href="link.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">修改</a> <a href="javascript:exeAdminDelMessage('action.php?action=linkDelById&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">删除</a></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['state']==1){?><font color="green">发布</font><?php }else{ ?><font color="red">屏蔽</font><?php }?></td>
		</tr>
		<?php } ?>
	</table>
<?php if ($_smarty_tpl->tpl_vars['linkList']->value!=null){?>
<div style="float:left;margin-top:5px;">
		<a href="javascript:void(0);" onclick="$('input[type=checkbox]').attr('checked', true);return false;">全选</a>/<a href="javascript:void(0);" onclick="javascript:$('input[type=checkbox]').attr('checked', false);return false;">取消</a> <input type="button" value="排序" onclick="listForm.action='action.php?action=linkOrder';listForm.submit();"/>&nbsp;<input type="button" value="删除" onclick="if(confirm('你确认删除选中的条目？')){listForm.submit();}"/>
</div>
<?php }?>
</form>
</body>
</html>
<?php }} ?>