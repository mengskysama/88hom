<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$areaService=new AreaService($db);
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
$statementsService=new StatementsService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('statementsRelease');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$statementsService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','发布信息成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('statementsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$statementsService->save($_POST);
		if($result===true){
			$html->gotoUrl('list.php','信息修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('statementsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$statementsService->delInfo($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('statementsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$statementsService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>