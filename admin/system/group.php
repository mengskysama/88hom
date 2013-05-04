<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'group.tpl';
$html->title='管理组别';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('group');
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
$action='groupRelease';
$typeTitle='发布';
$groupList=$userService->getGroupList($id);
$groupDetail='';
if(!empty($id)){
	$groupDetail=$userService->getGroupDetailById($id);
	if(!empty($groupDetail)){
		$groupDetail['groupName']=htmlspecialchars($groupDetail['groupName'], ENT_QUOTES, 'ISO-8859-1', true);
		$typeTitle='修改';
		$action='groupModify';
	}else{
		$id='';
	}
}
$smarty->assign('id',$id);
$smarty->assign('action',$action);
$smarty->assign('typeTitle',$typeTitle);
$smarty->assign('groupDetail',$groupDetail);
$smarty->assign('groupList',$groupList);
$html->show();
$smarty->display($tpl_name);
?>