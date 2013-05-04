<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$mediaService=new MediaService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('mediaRelease');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$mediaService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','������Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('mediaModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$mediaService->saveInfo($_POST);
		if($result===true){
			$html->gotoUrl('list.php','��Ϣ�޸ĳɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('mediaModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$mediaService->delInfoById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('mediaModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$mediaService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'downLoad':
		if(isset($_GET['fileName'])&&isset($_GET['filePath'])){
			$fileName=$_GET['fileName'];
			$filePath=ECMS_PATH_UPLOADS.$_GET['filePath'];
			if (!file_exists($filePath)) { //����ļ��Ƿ���� 
				echo '�ļ��Ҳ�����';
				exit;
			} else { 
				$file = fopen($filePath,"r"); // ���ļ� 
				// �����ļ���ǩ 
				Header("Content-type: application/octet-stream"); 
				Header("Accept-Ranges: bytes"); 
				Header("Accept-Length: ".filesize($filePath)); 
				Header("Content-Disposition: attachment; filename=".$fileName); 
				// ����ļ����� 
				echo fread($file,filesize($filePath)); 
				fclose($file); 
				exit;
			} 
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'manageRelease':
		$permissionsState=sysPermissionsChecking('mediaManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$userService->releaseWebUser($_POST);
		if($result===true){
			$html->replaceUrl('manage.php?page='.$_POST['page'],'������Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'manageModify':
		$permissionsState=sysPermissionsChecking('mediaManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$userService->saveWebUser($_POST);
		if($result===true){
			$html->replaceUrl('manage.php','�޸���Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'changeManageState':
		$permissionsState=sysPermissionsChecking('mediaManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->changeWebUserState($_GET['id'],$_GET['state']);
			if($result===true){
				$html->replaceUrl('manage.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
	case 'delManageById':
		$permissionsState=sysPermissionsChecking('mediaManage');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$userService->delWebUserById($_GET['id']);
			if($result===true){
				$html->replaceUrl('manage.php','��Ϣɾ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
}
?>