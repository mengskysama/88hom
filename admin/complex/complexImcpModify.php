<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexImcpModify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexImcpManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$imcpService=new ImcpService($db);

$info['id']=$id;
$info['type']='admin';

$imcpDetail=null;
$imcpDetail=$imcpService->getImcpById($info);
if(empty($imcpDetail)){
	$html->backUrl('没有找到该信息！');
}else{
//	$propertyDetail['propertyMapXY']=$propertyDetail['propertyMapX'].','.$propertyDetail['propertyMapY'];
}

$FCKeditor=createCKeditor('imcpContent',0,400,150,$imcpDetail['imcpContent']);


$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('imcpDetail',$imcpDetail);
$smarty->assign('FCKeditor',$FCKeditor);
$html->show();
$smarty->display($tpl_name);
?>