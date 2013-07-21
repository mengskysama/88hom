<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexHouseSellDetail.tpl';
$html->title='信息详情';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexHouseManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$picTypeList=$cfg['arr_pic']['2handHouse'];
$auditService=new AuditService($db);
$auditModel=new AuditModel();

$auditModel->bId=$id;
$auditModel->picBuildType=1;//1：住宅 2：商铺 3：写字楼 4：别墅 5厂房

$houseDetail=null;
$type=null;
$state=null;
$houseDetail=$auditService->getHouseDetail($auditModel);
if(empty($houseDetail['houseId'])){
	$html->backUrl('没有找到该信息！');
}else{
	$type=$houseDetail['houseSellRentType'];
	$state=$houseDetail['houseState'];
}

$auditModel->picSellRent=$houseDetail['houseSellRentType'];
$auditModel->isSellRent=$houseDetail['houseSellRentType'];
$auditModel->state=$houseDetail['houseState'];

if($auditModel->isSellRent==1){
	$tpl_name=$tpl_dir.'complexHouseSellDetail.tpl';
}else{
	$tpl_name=$tpl_dir.'complexHouseRentDetail.tpl';
}

$houseDetailPicList=null;
$houseDetailPicList=$auditService->getPicList($auditModel);
$houseDetailPicTypeList=null;

if(!empty($houseDetailPicList[0]['picId'])){
	for($i=0;$i<count($houseDetailPicList);$i++){
		if($houseDetailPicList[$i]['pictypeId']==1){
			$houseDetailPicTypeList[$houseDetailPicList[$i]['pictypeId']]['name']='标题图';
			$houseDetailPicTypeList[$houseDetailPicList[$i]['pictypeId']]['list'][]=$houseDetailPicList[$i];
		}else{
			$houseDetailPicTypeList[$houseDetailPicList[$i]['pictypeId']]['name']=$picTypeList[$houseDetailPicList[$i]['pictypeId']];
			$houseDetailPicTypeList[$houseDetailPicList[$i]['pictypeId']]['list'][]=$houseDetailPicList[$i];
		}
	}
}
//echo '<pre>';
//print_r($houseDetailPicTypeList);
//echo '</pre>';

$smarty->assign('houseDetail',$houseDetail);
$smarty->assign('houseDetailPicList',$houseDetailPicList);
$smarty->assign('houseDetailPicTypeList',$houseDetailPicTypeList);
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('auditModel',$auditModel);
$smarty->assign('type',$type);
$smarty->assign('state',$state);
$html->show();
$smarty->display($tpl_name);
?>