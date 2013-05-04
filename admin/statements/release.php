<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='信息发布';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('statementsRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
$areaService=new AreaService($db);
$areaList=$areaService->getAreaListByCache($fid);
$FCKeditor=createCKeditor('remark',1,400,200,'');
$smarty->assign('areaList',$areaList);
$smarty->assign('FCKeditor',$FCKeditor);
$html->show();
$smarty->display($tpl_name);
?>