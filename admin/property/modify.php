<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('propertyModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';

$picTypeList=$cfg['arr_pic']['propertyPicType'];

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$propertyService=new PropertyService($db);

$info['id']=$id;
$info['type']='admin';

$propertyDetail=null;
$propertyDetail=$propertyService->getPropertyById($info);
if(empty($propertyDetail)){
	$html->backUrl('没有找到该信息！');
}else{
	$propertyDetail['propertyMapXY']=$propertyDetail['propertyMapX'].','.$propertyDetail['propertyMapY'];
//	$propertyDetail['propertyId']=htmlspecialchars($propertyDetail['propertyId'], ENT_QUOTES, 'ISO-8859-1', true);
//	$propertyDetail['propertyName']=htmlspecialchars($propertyDetail['propertyName'], ENT_QUOTES, 'ISO-8859-1', true);
//	$propertyDetail['propertyAddress']=htmlspecialchars($propertyDetail['propertyAddress'], ENT_QUOTES, 'ISO-8859-1', true);
}
$picInfo['picBuildId']=$propertyDetail['propertyId'];
$picInfo['picBuildFatherType']=2;//新盘
$propertyDetailPicList=null;
$propertyDetailPicCount=0;
$propertyDetailPicList=$propertyService->getPropertyPicList($picInfo);
if(!empty($propertyDetailPicList)){
	$propertyDetailPicCount=count($propertyDetailPicList);
}
//echo $propertyDetailPicCount;
//echo $propertyDetailPicList[0]['picId'];

$FCKeditorTraffic=createCKeditor('propertyTraffic',0,400,150,$propertyDetail['propertyTraffic']);
$FCKeditorPeriInfo=createCKeditor('propertyPeriInfo',0,400,150,$propertyDetail['propertyPeriInfo']);
$FCKeditorIntroduction=createCKeditor('propertyIntroduction',0,400,150,$propertyDetail['propertyIntroduction']);

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('propertyDetailPicList',$propertyDetailPicList);
$smarty->assign('propertyDetailPicCount',$propertyDetailPicCount);
$smarty->assign('FCKeditorTraffic',$FCKeditorTraffic);
$smarty->assign('FCKeditorPeriInfo',$FCKeditorPeriInfo);
$smarty->assign('FCKeditorIntroduction',$FCKeditorIntroduction);
$smarty->assign('propertyDetail',$propertyDetail);
$html->show();
$smarty->display($tpl_name);
?>