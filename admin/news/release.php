<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('newsRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
$type=1;
$infoService=new InfoService($db);
$infoTypeList=$infoService->getInfoTypeListByCache($fid,$type);
$FCKeditorMin=createCKeditor('contentMin',0,700,150,'');
$FCKeditor=createCKeditor('content',1,700,250,'');

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('type',$type);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('FCKeditorMin',$FCKeditorMin);
$smarty->assign('infoTypeList',$infoTypeList);
$html->show();
$smarty->display($tpl_name);
?>