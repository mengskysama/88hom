<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='��Ϣ����';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('mediaRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$type=1;//ý�����Ϸ���

$mediaService=new MediaService($db);

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('type',$type);
$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$html->show();
$smarty->display($tpl_name);
?>