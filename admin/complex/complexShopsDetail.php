<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexShopsSellDetail.tpl';
$html->title='信息详情';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexShopsManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$picTypeList=$cfg['arr_pic']['2handShop'];
$auditService=new AuditService($db);
$auditModel=new AuditModel();

$auditModel->bId=$id;
$auditModel->picBuildType=2;//1：住宅 2：商铺 3：写字楼 4：别墅 5厂房

$shopsDetail=null;
$type=null;
$state=null;
$shopsDetail=$auditService->getShopsDetail($auditModel);
if(empty($shopsDetail['shopsId'])){
	$html->backUrl('没有找到该信息！');
}else{
	$type=$shopsDetail['shopsSellRentType'];
	$state=$shopsDetail['shopsState'];
}

$auditModel->picSellRent=$shopsDetail['shopsSellRentType'];
$auditModel->isSellRent=$shopsDetail['shopsSellRentType'];
$auditModel->state=$shopsDetail['shopsState'];

if($auditModel->isSellRent==1){
	$tpl_name=$tpl_dir.'complexShopsSellDetail.tpl';
}else{
	$tpl_name=$tpl_dir.'complexShopsRentDetail.tpl';
}

$shopsDetailPicList=null;
$shopsDetailPicList=$auditService->getPicList($auditModel);
$shopsDetailPicTypeList=null;

if(!empty($shopsDetailPicList[0]['picId'])){
	for($i=0;$i<count($shopsDetailPicList);$i++){
		if($shopsDetailPicList[$i]['pictypeId']==1){
			$shopsDetailPicTypeList[$shopsDetailPicList[$i]['pictypeId']]['name']='标题图';
			$shopsDetailPicTypeList[$shopsDetailPicList[$i]['pictypeId']]['list'][]=$shopsDetailPicList[$i];
		}else{
			$shopsDetailPicTypeList[$shopsDetailPicList[$i]['pictypeId']]['name']=$picTypeList[$shopsDetailPicList[$i]['pictypeId']];
			$shopsDetailPicTypeList[$shopsDetailPicList[$i]['pictypeId']]['list'][]=$shopsDetailPicList[$i];
		}
	}
}

$smarty->assign('shopsDetail',$shopsDetail);
$smarty->assign('shopsDetailPicList',$shopsDetailPicList);
$smarty->assign('shopsDetailPicTypeList',$shopsDetailPicTypeList);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('auditModel',$auditModel);
$smarty->assign('type',$type);
$smarty->assign('state',$state);
$html->show();
$smarty->display($tpl_name);
?>