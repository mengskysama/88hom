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
$tgService=new TgService($db);
$auditService=new AuditService($db);
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
	case 'complexTgDelById':
		$permissionsState=sysPermissionsChecking('complexTgManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['pId'])&&!empty($_GET['pId'])){
			$result=$tgService->delTgById($_GET['id']);
			if($result===true){
				$html->replaceUrl('complexTgDetailList.php?id='.$_GET['pId']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexTgDelByIds':
		$permissionsState=sysPermissionsChecking('complexTgManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$tgService->delTgByIds($_POST['chk']);
			if($result===true){
				$html->replaceUrl('complexTgDetailList.php?id='.$_POST['pId']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要删除的信息！');
		}
	break;
	case 'complexTgChangeState':
		$permissionsState=sysPermissionsChecking('complexTgManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['pId'])&&!empty($_GET['pId'])){
			$result=$tgService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('complexTgDetailList.php?id='.$_GET['pId']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexCommunityChangeStateAndModify':
		$permissionsState=sysPermissionsChecking('complexCommunityManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['communityId'])&&!empty($_POST['communityId'])){
			$result=$auditService->changeCommunityAndModify($_POST);
			if($result===true){
				$html->replaceUrl('complexCommunityList.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexCommunityChangeStateById':
		$permissionsState=sysPermissionsChecking('complexCommunityManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$auditModel=new AuditModel();
			$auditModel->state=2;
			$auditModel->bId=$_GET['id'];
			$auditModel->uId=$_SESSION['Admin_User']['userId'];
			$result=$auditService->changeCommunityStateById($auditModel);
			if($result===true){
				$html->replaceUrl('complexCommunityList.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexCommunityChangeStateByIds':
		$permissionsState=sysPermissionsChecking('complexCommunityManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$auditModel=new AuditModel();
			$auditModel->state=2;
			$auditModel->ids=$_POST['chk'];
			$auditModel->uId=$_SESSION['Admin_User']['userId'];
			$result=$auditService->changeCommunityStateByIds($auditModel);
			if($result===true){
				$html->replaceUrl('complexCommunityList.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要变更的信息！');
		}
	break;
	case 'complexHouseChangeStateById':
		$permissionsState=sysPermissionsChecking('complexHouseManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['state'])&&!empty($_GET['state'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->bId=$_GET['id'];
			$result=$auditService->changeHouseStateById($auditModel);
			if($result===true){
				$html->replaceUrl('complexHouseList.php?type='.$_GET['type'].'&state='.$_GET['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexHouseChangeStateByIds':
		$permissionsState=sysPermissionsChecking('complexHouseManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->ids=$_POST['chk'];
			$result=$auditService->changeHouseStateByIds($auditModel);
			if($result===true){
				$html->replaceUrl('complexHouseList.php?type='.$_POST['t'].'&state='.$_POST['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要变更的信息！');
		}
	break;
	case 'complexShopsChangeStateById':
		$permissionsState=sysPermissionsChecking('complexShopsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['state'])&&!empty($_GET['state'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->bId=$_GET['id'];
			$result=$auditService->changeShopsStateById($auditModel);
			if($result===true){
				$html->replaceUrl('complexShopsList.php?type='.$_GET['type'].'&state='.$_GET['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexShopsChangeStateByIds':
		$permissionsState=sysPermissionsChecking('complexShopsManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->ids=$_POST['chk'];
			$result=$auditService->changeShopsStateByIds($auditModel);
			if($result===true){
				$html->replaceUrl('complexShopsList.php?type='.$_POST['t'].'&state='.$_POST['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要变更的信息！');
		}
	break;
	case 'complexOfficeChangeStateById':
		$permissionsState=sysPermissionsChecking('complexOfficeManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['state'])&&!empty($_GET['state'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->bId=$_GET['id'];
			$result=$auditService->changeOfficeStateById($auditModel);
			if($result===true){
				$html->replaceUrl('complexOfficeList.php?type='.$_GET['type'].'&state='.$_GET['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexOfficeChangeStateByIds':
		$permissionsState=sysPermissionsChecking('complexOfficeManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->ids=$_POST['chk'];
			$result=$auditService->changeOfficeStateByIds($auditModel);
			if($result===true){
				$html->replaceUrl('complexOfficeList.php?type='.$_POST['t'].'&state='.$_POST['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要变更的信息！');
		}
	break;
	case 'complexVillaChangeStateById':
		$permissionsState=sysPermissionsChecking('complexVillaManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['state'])&&!empty($_GET['state'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->bId=$_GET['id'];
			$result=$auditService->changeVillaStateById($auditModel);
			if($result===true){
				$html->replaceUrl('complexVillaList.php?type='.$_GET['type'].'&state='.$_GET['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'complexVillaChangeStateByIds':
		$permissionsState=sysPermissionsChecking('complexVillaManage');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$auditModel=new AuditModel();
			$auditModel->state=$_GET['state'];
			$auditModel->ids=$_POST['chk'];
			$result=$auditService->changeVillaStateByIds($auditModel);
			if($result===true){
				$html->replaceUrl('complexVillaList.php?type='.$_POST['t'].'&state='.$_POST['s']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要变更的信息！');
		}
	break;
}
?>