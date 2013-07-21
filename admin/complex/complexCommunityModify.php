<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexCommunityModify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexCommunityManage');
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
$auditModel->picBuildFatherType=1;

$communityDetail=null;
$communityDetail=$auditService->getCommunityById($auditModel);
if(empty($communityDetail)){
	$html->backUrl('没有找到该信息！');
}else{
	if($communityDetail['communityMapX']!=''&&$communityDetail['communityMapY']!=''){
		$communityDetail['communityMapXY']=$communityDetail['communityMapX'].','.$communityDetail['communityMapY'];
	}else{
		$communityDetail['communityMapXY']='';
	}
}

$FCKeditorTraffic=createCKeditor('communityTraffic',0,400,150,$communityDetail['communityTraffic']);
$FCKeditorPeriInfo=createCKeditor('communityPeriInfo',0,400,150,$communityDetail['communityPeriInfo']);
$FCKeditorBuildInfo=createCKeditor('communityBuildInfo',0,400,150,$communityDetail['communityBuildInfo']);

$communityDetailPicList=null;
$communityDetailPicCount=0;
$communityDetailPicList=$auditService->getPicList($auditModel);
if(!empty($communityDetailPicList[0]['picId'])){
	$communityDetailPicCount=count($communityDetailPicList);
}

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('communityDetail',$communityDetail);
$smarty->assign('communityDetailPicList',$communityDetailPicList);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('FCKeditorTraffic',$FCKeditorTraffic);
$smarty->assign('FCKeditorPeriInfo',$FCKeditorPeriInfo);
$smarty->assign('FCKeditorBuildInfo',$FCKeditorBuildInfo);
$smarty->assign('communityDetailPicCount',$communityDetailPicCount);
$html->show();
$smarty->display($tpl_name);
?>