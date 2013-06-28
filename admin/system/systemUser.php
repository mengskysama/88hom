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
		$tpl_name=$tpl_dir.'systemUserModify.tpl';
		$group=$userService->getGroupList();
		$user = $userService->getUserById($_REQUEST['id']);
		$smarty->assign('user',$user);
	}
	else if($action=='doModify'){
		$userDAO = new UserDAO($db);
		$userDAO->save($_REQUEST);
		$userList=$userService->getUserList(' where userType=0 ', '', '');//系统用户
		$group=$userService->getGroupList();
	}
	else if($action=='changeState'){
		$userService->changeState($_REQUEST['state'], $_REQUEST['id']);
		$userList=$userService->getUserList(' where userType=0 ', '', '');//系统用户
	}
}else{
	$userList=$userService->getUserList(' where userType=0 ', '', '');//系统用户
}
$smarty->assign('userList',$userList);
$smarty->assign('group',$group);
$html->show();
$smarty->display($tpl_name);
?>