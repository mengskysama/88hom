<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('userRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$html->show();
$smarty->display($tpl_name);
?>