<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
if(isset($_POST['fid'])&&!empty($_GET['fid'])){
	$fid=$_POST['fid'];
}else{
	$fid=1;
}
$rmService=new RecruitmentService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('rmRelease');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$rmService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','发布招聘信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$rmService->saveRecruiment($_POST);
		if($result===true){
			$html->gotoUrl('list.php','信息修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->delRmById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'typeRelease':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$rmService->releaseRmType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$fid,'发布招聘信息类别成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeModify':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$rmService->saveRmType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$fid,'修改招聘信息类别成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeOrder':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['typeLayer'])&&!empty($_POST['typeLayer'])){
			$result=$rmService->orderRmType($_POST['typeLayer'],$fid);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$fid);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('');
		}
	break;
	case 'typeDelById':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->delRmTypeById($_GET['id'],$fid);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$fid,'删除信息类别成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('待删除信息类别ID不能为空！');
		}
	break;
	case 'typeDel':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$rmService->delRmType($_POST['chk'],$fid);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$fid);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要删除的类别！');
		}
	break;
}
?>