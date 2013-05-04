<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
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
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$rmService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','������Ƹ��Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$rmService->saveRecruiment($_POST);
		if($result===true){
			$html->gotoUrl('list.php','��Ϣ�޸ĳɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->delRmById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('rmModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'typeRelease':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$rmService->releaseRmType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$fid,'������Ƹ��Ϣ���ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeModify':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$rmService->saveRmType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$fid,'�޸���Ƹ��Ϣ���ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeOrder':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
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
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$rmService->delRmTypeById($_GET['id'],$fid);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$fid,'ɾ����Ϣ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ɾ����Ϣ���ID����Ϊ�գ�');
		}
	break;
	case 'typeDel':
		$permissionsState=sysPermissionsChecking('rmType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$rmService->delRmType($_POST['chk'],$fid);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$fid);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ѡ����Ҫɾ�������');
		}
	break;
}
?>