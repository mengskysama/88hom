<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'area.tpl';
$html->title='区域管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('area');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$areaService=new AreaService($db);
if(isset($_GET['fid'])){
	$fid=$_GET['fid'];
}else{
	$fid=0;
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
$action='release';
$areaTitle='发布';
$fatherAreaDetail='';
$fatherAreaDetail=$areaService->getArea($fid);

$areaList=$areaService->getAreaList($fid);
$areaDetail='';
if(!empty($id)){
	$areaDetail=$areaService->getArea($id);
	if(!empty($areaDetail)){
		$areaDetail['name']=htmlspecialchars($areaDetail['name'], ENT_QUOTES, 'ISO-8859-1', true);
		$areaTitle='修改';
		$action='modify';
	}else{
		$id='';
	}
}
$smarty->assign('id',$id);
$smarty->assign('fid',$fid);
$smarty->assign('action',$action);
$smarty->assign('areaTitle',$areaTitle);
$smarty->assign('areaList',$areaList);
$smarty->assign('areaDetail',$areaDetail);
$smarty->assign('fatherAreaDetail',$fatherAreaDetail);
$html->show();
$smarty->display($tpl_name);
?>