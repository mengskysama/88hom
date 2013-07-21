<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexHouseSellList.tpl';
$html->title='住宅房源列表';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexHouseManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$auditService=new AuditService($db);

if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['type'])&&!empty($_REQUEST['type'])){
	$type=$_REQUEST['type'];
}else{
	$type=1;//1：出售 2：出租  默认出售
}
if(isset($_REQUEST['state'])&&!empty($_REQUEST['state'])){
	$state=$_REQUEST['state'];
}else{
	$state=1;//1：发布待审核  4：违规被打回  5：审核已通过  默认为1
}
if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}
if($type==1){
	$tpl_name=$tpl_dir.'complexHouseSellList.tpl';
}else{
	$tpl_name=$tpl_dir.'complexHouseRentList.tpl';
}
$areaIndex = (!isset($_REQUEST['areaIndex'])||isset($_REQUEST['areaIndex'])&&empty($_REQUEST['areaIndex']))?'':$_REQUEST['areaIndex'];//区域下标,前台与area.js,后台与area.php对应

$fileName='';
$step=20;
$begin=$step*($page-1);

$fileName='complexHouseList.php?type='.$type.'&state='.$state.'&search='.$search.'&areaIndex='.$areaIndex.'&page';

//echo $fileName;

$auditModel=new AuditModel();
$auditModel->begin=$begin;
$auditModel->step=$step;
$auditModel->state=$state;
$auditModel->search=$search;
$auditModel->isSellRent=$type;
if(!empty($areaIndex)){
	$areaIndexArr = explode("-",$areaIndex);
	$temp = '';
	if(count($areaIndexArr)==2){
		$auditModel->p=$areaIndexArr[0];
		$auditModel->c=$areaIndexArr[1];
	}else if(count($areaIndexArr)==3){
		$auditModel->p=$areaIndexArr[0];
		$auditModel->c=$areaIndexArr[1];
		$auditModel->d=$areaIndexArr[2];
	}else{
		$auditModel->p=$areaIndexArr[0];
		$auditModel->c=$areaIndexArr[1];
		$auditModel->d=$areaIndexArr[2];
		$auditModel->a=$areaIndexArr[3];
	}
}
$auditModel->areaIndex=$areaIndex;

$houseList=$auditService->getHouseList($auditModel);
$houseCount=$auditService->countHouse($auditModel);
//
$divPage='';
if(!empty($houseCount)&&$houseCount['counts']>0){
	$divPage=sysAdminPageInfo($houseCount['counts'],$step,$page,$fileName,'');
}else{
	$divPage='';
}
$typeList=array(1=>'出售',2=>'出租');
$auditList=array(1=>'发布待审核',5=>'审核已通过',4=>'违规被退回',2=>'发布被删除');
$auditModel=(array)$auditModel;
$smarty->assign('houseList',$houseList);
$smarty->assign('divPage',$divPage);
$smarty->assign('auditModel',$auditModel);
$smarty->assign('type',$type);
$smarty->assign('state',$state);
$smarty->assign('typeList',$typeList);
$smarty->assign('auditList',$auditList);
$html->show();
$smarty->display($tpl_name);
?>
