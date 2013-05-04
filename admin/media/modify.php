<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('mediaModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$type=1;//
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}

$mediaService=new MediaService($db);
$mediaDetail=$mediaService->getInfoDetailByInfoId($id,'admin');
if(empty($mediaDetail)||$mediaDetail['type']!=1){
	$html->backUrl('没有找到该信息！');
}else{
	$mediaDetail['title']=htmlspecialchars($mediaDetail['title'], ENT_QUOTES, 'ISO-8859-1', true);
}

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('type',$type);
$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('mediaDetail',$mediaDetail);
$html->show();
$smarty->display($tpl_name);
?>