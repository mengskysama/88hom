<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$infoService=new InfoService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('newsRelease');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$infoService->release($_POST);
		if($result===true){
			$html->replaceUrl('release.php','������Ϣ�ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('newsModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$infoService->saveInfo($_POST);
		if($result===true){
			$html->gotoUrl('list.php','��Ϣ�޸ĳɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('newsModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$infoService->delInfoById($_GET['id']);
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
		$permissionsState=sysPermissionsChecking('newsModify');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$infoService->changeState($_GET['state'],$_GET['id']);
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
		$permissionsState=sysPermissionsChecking('newsType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$infoService->releaseInfoType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$_POST['fid'],'������Ϣ���ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeModify':
		$permissionsState=sysPermissionsChecking('newsType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$infoService->saveInfoType($_POST);
		if($result===true){
			$html->replaceUrl('type.php?fid='.$_POST['fid'],'�޸���Ϣ���ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'typeOrder':
		$permissionsState=sysPermissionsChecking('newsType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_POST['typeLayer'])&&!empty($_POST['typeLayer'])){
			$result=$infoService->orderInfoType($_POST['typeLayer'],$_GET['fid'],$_GET['type']);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$_GET['fid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('');
		}
	break;
	case 'typeDelById':
		$permissionsState=sysPermissionsChecking('newsType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$infoService->delInfoTypeById($_GET['id'],$_GET['fid'],$_GET['type']);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$_GET['fid'],'ɾ����Ϣ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ɾ����Ϣ���ID����Ϊ�գ�');
		}
	break;
	case 'typeDel':
		$permissionsState=sysPermissionsChecking('newsType');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$infoService->delInfoType($_POST['chk'],$_GET['fid'],$_GET['type']);
			if($result===true){
				$html->replaceUrl('type.php?fid='.$_GET['fid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ѡ����Ҫɾ�������');
		}
	break;
	case 'ajaxChangeInfoType':
		$rs='';
		$rt='';
		$result='';
		if(isset($_GET['typeId'])){
			$typeInfo=$infoService->getInfoTypeDetailById($_GET['typeId']);
			$result_=$infoService->getInfoTypeList($_GET['typeId']);
			if(!empty($result_)){
				if(!empty($typeInfo)){
					$result[]=$typeInfo;
				}
				foreach($result_ as $key=>$value){
					$result[]=$value;
				}
				$result=charsetIconv($result,'GBK','UTF-8');
				$rt=array('first'=>'no');
				$rs[]=$rt;
				$rs[]=$result;
				$rs=json_encode($rs);
			}else{
				$rs='';
			}
		}
		echo $rs;
	break;
	case 'ajaxBackInfoType':
		$result='';
		if(isset($_GET['typeId'])){
			$infoType=$infoService->getInfoTypeDetailById($_GET['typeId']);
			$result=$infoService->getInfoTypeList($infoType['type_father_id']);
			if(!empty($result)){
				$result=charsetIconv($result,'GBK','UTF-8');
				$result=json_encode($result);
			}else{
				$result='';
			}
		}
		echo $result;
	break;
}
?>