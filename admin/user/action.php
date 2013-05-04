<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$bbsService=new BbsService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('userRelease');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$userService->releaseWebUser($_POST);
		if($result===true){
			$html->replaceUrl('release.php','������Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$userService->saveWebUser($_POST);
		if($result===true){
			$html->replaceUrl('list.php','�޸���Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->delWebUserById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('userModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->changeWebUserState($_GET['id'],$_GET['state']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'changeBbsState':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsManage.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'delBbsById':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->delInfoById($_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsManage.php','��Ϣɾ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'changeBbsReplyState':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->changeReplyState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsReply.php?bid='.$_GET['bid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'delBbsReplyById':
		$permissionsState=sysPermissionsChecking('bbsManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$bbsService->delInfoReplyById($_GET['id']);
			if($result===true){
				$html->replaceUrl('bbsReply.php?bid='.$_GET['bid'],'��Ϣɾ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
}
?>