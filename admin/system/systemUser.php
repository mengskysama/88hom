<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'systemUser.tpl';
$html->title='系统用户管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('user');
$group='';
$userList='';
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
	if($action=='release'){
		$tpl_name=$tpl_dir.'systemUserRelease.tpl';
		$html->title='添加系统用户';
		$group=$userService->getGroupList();
	}else if($action=='modify'){
		$tpl_name=$tpl_dir.'systemUserRelease.tpl';
		$html->title='修改系统用户';
	}
}else{
	$userList=$userService->getUserList('', '', '');
}
$smarty->assign('userList',$userList);
$smarty->assign('group',$group);
$html->show();
$smarty->display($tpl_name);
?>