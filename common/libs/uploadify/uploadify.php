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
$thumb = $_POST['thumb'];
$resizeType = $_POST['resizeType'];
$width = $_POST['width'];
$height = $_POST['height'];
$thumbResizeType = $_POST['thumbResizeType'];
$thumbWidth = $_POST['thumbWidth'];
$thumbHeight = $_POST['thumbHeight'];
$watermark = $_POST['watermark'];
$watermarkPic = $_POST['watermarkPic'];
$watermarkPos = $_POST['watermarkPos'];
$thumbDir = strtolower($_POST['thumbDir']);
$originalPath = strtolower($_POST['originalPath']);
$allowType = strtolower($_POST['allowType']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$result=array();
	$data=array();
	$upload = new UploadFile();//ʵ���ϴ�����
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
			//�����Ե�ָ����С
			$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
			$isBig=$image->resizeImage($width,$height,$resizeType);
			//�������Ҫ����ʱ��ͼƬʧ������
			if($isBig==1){
				$image->save();
			}
			$path=$originalPath.$fileName;
			//��ˮӡ
			if($watermark==1){
				$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
				$image->waterMark($watermarkPic,$watermarkPos);
				$image->save();
			}
			//��ȡѡ������
//			$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
//			$image->cutimg($srcimgurl, $endimgurl, $x, $y, $endimg_w, $endimg_h, $border_w, $border_h);
			//�����Ҫ���������ͼ
			if($thumb==1){
				$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
				$image->resizeImage($thumbWidth,$thumbHeight,$thumbResizeType);
				if($originalPath==$thumbDir){
					//��ֹ�洢Ŀ¼��ͬʱ����ԭ�е�ͼƬ�����洢����ͼֱ������ thumb ����Ϊ��
					$image->save(2,ECMS_PATH_ROOT.'uploads/'.$thumbDir,'_thumb');
					$thumb_path = $thumbDir.FileSystem::getBasicName($fileName, false).'_thumb'.FileSystem::fileExt($fileName, true);
				}else{
					$image->save(1,ECMS_PATH_ROOT.'uploads/'.$thumbDir);
					$thumb_path = $thumbDir.$fileName;
				}
			}
			$data['result']=1;
			$data['msg']='�ļ��ϴ��ɹ���';
			$data['path']=$path;
			$data['pathThumb']=$thumb_path;
			$result[]=charsetIconv($data,'GBK','UTF-8');
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