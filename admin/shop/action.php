<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$shopService=new ShopService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('shopRelease');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$shopService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','������Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('shopModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$shopService->save($_POST);
		if($result===true){
			$html->gotoUrl('list.php','��Ϣ�޸ĳɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('shopModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$shopService->delInfo($_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php','��Ϣɾ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'changeState':
		$permissionsState=sysPermissionsChecking('shopModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$shopService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
}
?>