<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$mediaService=new MediaService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('cpsRelease');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$mediaService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','发布信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('cpsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$mediaService->saveInfo($_POST);
		if($result===true){
			$html->gotoUrl('list.php','信息修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('cpsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$mediaService->delInfoById($_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php','信息删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'changeState':
		$permissionsState=sysPermissionsChecking('cpsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$mediaService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'downLoad':
		if(isset($_GET['fileName'])&&isset($_GET['filePath'])){
			$fileName=$_GET['fileName'];
			$filePath=ECMS_PATH_UPLOADS.$_GET['filePath'];
			if (!file_exists($filePath)) { //检查文件是否存在 
				echo '文件找不到！';
				exit;
			} else { 
				$file = fopen($filePath,"r"); // 打开文件 
				// 输入文件标签 
				Header("Content-type: application/octet-stream"); 
				Header("Accept-Ranges: bytes"); 
				Header("Accept-Length: ".filesize($filePath)); 
				Header("Content-Disposition: attachment; filename=".$fileName); 
				// 输出文件内容 
				echo fread($file,filesize($filePath)); 
				fclose($file); 
				exit;
			} 
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>