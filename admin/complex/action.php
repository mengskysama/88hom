<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$imcpService=new ImcpService($db);
switch ($action){
	case 'complexImcpRelease':
		$permissionsState=sysPermissionsChecking('complexImcpManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$_POST['imcpUserId']=$_SESSION['Admin_User']['userId'];
		$result=$imcpService->release($_POST);
		if($result===true){
			$html->replaceUrl('complexImcpList.php','发布信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'complexImcpModify':
		$permissionsState=sysPermissionsChecking('complexImcpManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$imcpService->modify($_POST);
		if($result===true){
			$html->gotoUrl('complexImcpList.php','信息修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'complexImcpDelById':
		$permissionsState=sysPermissionsChecking('complexImcpManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$imcpService->delImcpById($_GET['id']);
			if($result===true){
				$html->replaceUrl('complexImcpList.php','信息删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexImcpChangeState':
		$permissionsState=sysPermissionsChecking('complexImcpManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$imcpService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('complexImcpList.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>