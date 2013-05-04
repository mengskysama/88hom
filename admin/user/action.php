<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$bbsService=new BbsService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('userRelease');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$userService->releaseWebUser($_POST);
		if($result===true){
			$html->replaceUrl('release.php','发布信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$userService->saveWebUser($_POST);
		if($result===true){
			$html->replaceUrl('list.php','修改信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->delWebUserById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->changeWebUserState($_GET['id'],$_GET['state']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'changeBbsState':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsManage.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'delBbsById':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->delInfoById($_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsManage.php','信息删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'changeBbsReplyState':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->changeReplyState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsReply.php?bid='.$_GET['bid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'delBbsReplyById':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->delInfoReplyById($_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsReply.php?bid='.$_GET['bid'],'信息删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>