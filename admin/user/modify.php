<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='��Ϣ�޸�';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('userModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('��������');
}

$userDetail=$userService->getWebUserById($id);

if(empty($userDetail)){
	$html->backUrl('û���ҵ�����Ϣ��');
}else{
	$userDetail['username']=htmlspecialchars($userDetail['username'], ENT_QUOTES, 'ISO-8859-1', true);
	$userDetail['password']=sysAuth($userDetail['password'],'DECODE',ECMS_KEY_WEB);
}

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('userDetail',$userDetail);
$html->show();
$smarty->display($tpl_name);
?>