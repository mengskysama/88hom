<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='��Ϣ����';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('infoRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';

$FCKeditor=createCKeditor('content',1,700,250,'');
$time=date('Y-m-d');

$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('time',$time);
$html->show();
$smarty->display($tpl_name);
?>