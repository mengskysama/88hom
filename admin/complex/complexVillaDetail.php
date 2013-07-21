<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexVillaSellDetail.tpl';
$html->title='信息详情';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexVillaManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$picTypeList=$cfg['arr_pic']['communityPicType'];
$auditService=new AuditService($db);
$auditModel=new AuditModel();

$auditModel->bId=$id;
$auditModel->picBuildType=1;

$villaDetail=null;
$villaDetail=$auditService->getVillaDetail($auditModel);
if(empty($villaDetail['villaId'])){
	$html->backUrl('没有找到该信息！');
}

$auditModel->picSellRent=$villaDetail['villaSellRentType'];
$auditModel->isSellRent=$villaDetail['villaSellRentType'];
$auditModel->state=$villaDetail['villaState'];

if($auditModel->isSellRent==1){
	$tpl_name=$tpl_dir.'complexVillaSellDetail.tpl';
}else{
	$tpl_name=$tpl_dir.'complexVillaRentDetail.tpl';
}

$villaDetailPicList=null;
$villaDetailPicList=$auditService->getPicList($auditModel);

$smarty->assign('villaDetail',$villaDetail);
$smarty->assign('villaDetailPicList',$villaDetailPicList);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('auditModel',$auditModel);
$html->show();
$smarty->display($tpl_name);
?>