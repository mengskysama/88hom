<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
require '../../../path.inc.php';
$targetFolder = ECMS_PATH.'uploads/'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
$originalPath = strtolower($_POST['originalPath']);
$allowType = strtolower($_POST['allowType']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$result=array();
	$data=array();
	$upload = new UploadFile();//ʵ�����ϴ�����
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder . $originalPath;
	if(!file_exists($targetPath)){
		if(!mkdir($targetPath,0777,true)){
			$data['result']=0;
			$data['msg']='�ļ�Ŀ¼����ʧ�ܣ�';
			$result[]=charsetIconv($data,'GBK','UTF-8');
			echo json_encode($result);
			exit;
		}
	}
	$upload->setAllowFileType($allowType);
	$fileTypes = $upload->allowFileTypes;
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		try{
			$fileName = $upload->upload($_FILES['Filedata'],ECMS_PATH_ROOT.'uploads/'.$originalPath, 1);
			$name=$_FILES['Filedata']['name'];
			$path=$originalPath.$fileName;
			$data['result']=1;
			$data['msg']=iconv('GBK', 'UTF-8', '�ļ��ϴ��ɹ���');
			$data['name']=$name;
			$data['path']=$path;
			$result[]=$data;
			echo json_encode($result);
			exit;
		}catch(Exception $e){
			$data['result']=0;
			$data['msg']=$e->getMessage();
			$result[]=charsetIconv($data,'GBK','UTF-8');
			echo json_encode($result);
			exit;
		}
	} else {
		$data['result']=0;
		$data['msg']='�ϴ��ļ����ʹ���';
		$result[]=charsetIconv($data,'GBK','UTF-8');
		echo json_encode($result);
		exit;
	}
}
?>