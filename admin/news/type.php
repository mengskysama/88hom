<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'type.tpl';
$html->title='信息类别';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('newsType');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$infoService=new InfoService($db);
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
$type=1;
$action='typeRelease';
$typeTitle='发布';
$infoFatherTypeDetail=null;
$infoFatherTypeDetail=$infoService->getInfoTypeDetailById($fid);

$infoTypeList=$infoService->getInfoTypeList($fid,$type);
$infoTypeDetail=null;
$FCKeditor='';
if(!empty($id)){
	$infoTypeDetail=$infoService->getInfoTypeDetailById($id);
	if(!empty($infoTypeDetail)){
		$infoTypeDetail['type_name']=htmlspecialchars($infoTypeDetail['type_name'], ENT_QUOTES, 'ISO-8859-1', true);
		$typeTitle='修改';
		$action='typeModify';
		$FCKeditor=createCKeditor('typeText',0,700,250,$infoTypeDetail['type_text']);
	}else{
		$id='';
		$FCKeditor=createCKeditor('typeText',0,700,250,'');
	}
}else{
	$FCKeditor=createCKeditor('typeText',0,700,250,'');
}
$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('id',$id);
$smarty->assign('fid',$fid);
$smarty->assign('type',$type);
$smarty->assign('action',$action);
$smarty->assign('typeTitle',$typeTitle);
$smarty->assign('infoTypeList',$infoTypeList);
$smarty->assign('infoTypeDetail',$infoTypeDetail);
$smarty->assign('infoFatherTypeDetail',$infoFatherTypeDetail);
$html->show();
$smarty->display($tpl_name);
?>