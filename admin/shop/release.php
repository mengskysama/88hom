<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'release.tpl';
$html->title='��Ϣ����';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('shopRelease');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
$areaService=new AreaService($db);
$areaList=$areaService->getAreaListByCache($fid);
$smarty->assign('areaList',$areaList);
$html->show();
$smarty->display($tpl_name);
?>