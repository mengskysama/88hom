<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='招聘信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('rmRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=1;
$rmService=new RecruitmentService($db);
$rmTypeList=$rmService->getRmTypeListByCache($fid);
$FCKeditor=createCKeditor('content',1,700,250,'');
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('rmTypeList',$rmTypeList);
$html->show();
$smarty->display($tpl_name);
?>