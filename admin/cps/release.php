<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('cpsRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$type=2;//会刊类别
$mediaService=new MediaService($db);

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('type',$type);
$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$html->show();
$smarty->display($tpl_name);
?>