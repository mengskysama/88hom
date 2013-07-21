<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexOfficeSellDetail.tpl';
$html->title='信息详情';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexOfficeManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$picTypeList=$cfg['arr_pic']['2handOffice'];
$auditService=new AuditService($db);
$auditModel=new AuditModel();

$auditModel->bId=$id;
$auditModel->picBuildType=3;//1：住宅 2：商铺 3：写字楼 4：别墅 5厂房

$officeDetail=null;
$type=null;
$state=null;
$officeDetail=$auditService->getOfficeDetail($auditModel);
if(empty($officeDetail['officeId'])){
	$html->backUrl('没有找到该信息！');
}else{
	$type=$officeDetail['officeSellRentType'];
	$state=$officeDetail['officeState'];
}

$auditModel->picSellRent=$officeDetail['officeSellRentType'];
$auditModel->isSellRent=$officeDetail['officeSellRentType'];
$auditModel->state=$officeDetail['officeState'];

if($auditModel->isSellRent==1){
	$tpl_name=$tpl_dir.'complexOfficeSellDetail.tpl';
}else{
	$tpl_name=$tpl_dir.'complexOfficeRentDetail.tpl';
}

$officeDetailPicList=null;
$officeDetailPicList=$auditService->getPicList($auditModel);
$officeDetailPicTypeList=null;

if(!empty($officeDetailPicList[0]['picId'])){
	for($i=0;$i<count($officeDetailPicList);$i++){
		if($officeDetailPicList[$i]['pictypeId']==1){
			$officeDetailPicTypeList[$officeDetailPicList[$i]['pictypeId']]['name']='标题图';
			$officeDetailPicTypeList[$officeDetailPicList[$i]['pictypeId']]['list'][]=$officeDetailPicList[$i];
		}else{
			$officeDetailPicTypeList[$officeDetailPicList[$i]['pictypeId']]['name']=$picTypeList[$officeDetailPicList[$i]['pictypeId']];
			$officeDetailPicTypeList[$officeDetailPicList[$i]['pictypeId']]['list'][]=$officeDetailPicList[$i];
		}
	}
}

$smarty->assign('officeDetail',$officeDetail);
$smarty->assign('officeDetailPicList',$officeDetailPicList);
$smarty->assign('officeDetailPicTypeList',$officeDetailPicTypeList);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('auditModel',$auditModel);
$smarty->assign('type',$type);
$smarty->assign('state',$state);
$html->show();
$smarty->display($tpl_name);
?>