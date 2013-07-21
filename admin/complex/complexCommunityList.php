<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexCommunityList.tpl';
$html->title='外部新增小区列表';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexCommunityManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$auditService=new AuditService($db);

if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}
$areaIndex = (!isset($_REQUEST['areaIndex'])||isset($_REQUEST['areaIndex'])&&empty($_REQUEST['areaIndex']))?'':$_REQUEST['areaIndex'];//区域下标,前台与area.js,后台与area.php对应

$fileName='';
$step=20;
$begin=$step*($page-1);

$fileName='complexCommunityList.php?search='.$search.'&areaIndex='.$areaIndex.'&page';

//echo $fileName;

$auditModel=new AuditModel();
$auditModel->begin=$begin;
$auditModel->step=$step;
$auditModel->state=0;
$auditModel->uId=0;
$auditModel->search=$search;
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

$communityList=$auditService->getCommunityList($auditModel);
$communityCount=$auditService->countCommunity($auditModel);
//
$divPage='';
if(!empty($communityCount)&&$communityCount['counts']>0){
	$divPage=sysAdminPageInfo($communityCount['counts'],$step,$page,$fileName,'');
}else{
	$divPage='';
}
$auditModel=(array)$auditModel;
$smarty->assign('communityList',$communityList);
$smarty->assign('divPage',$divPage);
$smarty->assign('auditModel',$auditModel);
$html->show();
$smarty->display($tpl_name);
?>