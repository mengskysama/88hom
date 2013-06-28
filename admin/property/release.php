<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('propertyRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';

$picTypeList=$cfg['arr_pic']['propertyPicType'];

$FCKeditorTraffic=createCKeditor('propertyTraffic',0,400,150,'');
$FCKeditorPeriInfo=createCKeditor('propertyPeriInfo',0,400,150,'');
$FCKeditorIntroduction=createCKeditor('propertyIntroduction',0,400,150,'');

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('FCKeditorTraffic',$FCKeditorTraffic);
$smarty->assign('FCKeditorPeriInfo',$FCKeditorPeriInfo);
$smarty->assign('FCKeditorIntroduction',$FCKeditorIntroduction);
$html->show();
$smarty->display($tpl_name);
?>