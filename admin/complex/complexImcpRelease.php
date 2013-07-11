<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexImcpRelease.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexImcpManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

$FCKeditor=createCKeditor('imcpContent',0,400,150,'');

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('FCKeditor',$FCKeditor);
$html->show();
$smarty->display($tpl_name);
?>