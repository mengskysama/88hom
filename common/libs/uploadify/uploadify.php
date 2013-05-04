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
	$upload = new UploadFile();//实例化上传对象
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder . $originalPath;
	if(!file_exists($targetPath)){
		if(!mkdir($targetPath,0777,true)){
			$data['result']=0;
			$data['msg']='文件目录创建失败！';
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
			//先缩略到指定大小
			$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
			$isBig=$image->resizeImage($width,$height,$resizeType);
			//解决不需要缩放时的图片失真问题
			if($isBig==1){
				$image->save();
			}
			$path=$originalPath.$fileName;
			//加水印
			if($watermark==1){
				$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
				$image->waterMark($watermarkPic,$watermarkPos);
				$image->save();
			}
			//截取选定区域
//			$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
//			$image->cutimg($srcimgurl, $endimgurl, $x, $y, $endimg_w, $endimg_h, $border_w, $border_h);
			//如果需要再生成缩略图
			if($thumb==1){
				$image = new Image(ECMS_PATH_ROOT.'uploads/'.$originalPath.$fileName);
				$image->resizeImage($thumbWidth,$thumbHeight,$thumbResizeType);
				if($originalPath==$thumbDir){
					//防止存储目录相同时覆盖原有的图片，不存储缩略图直接设置 thumb 属性为空
					$image->save(2,ECMS_PATH_ROOT.'uploads/'.$thumbDir,'_thumb');
					$thumb_path = $thumbDir.FileSystem::getBasicName($fileName, false).'_thumb'.FileSystem::fileExt($fileName, true);
				}else{
					$image->save(1,ECMS_PATH_ROOT.'uploads/'.$thumbDir);
					$thumb_path = $thumbDir.$fileName;
				}
			}
			$data['result']=1;
			$data['msg']='文件上传成功！';
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
		$data['msg']='上传文件类型错误！';
		$result[]=charsetIconv($data,'GBK','UTF-8');
		echo json_encode($result);
		exit;
	}
}
?>