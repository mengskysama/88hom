<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'manage.tpl';
$html->title='信息类别';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('mediaManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
$fileName='';
$fileName='manage.php?page';
$lines=20;
$begin=$lines*($page-1);
$where='';
$order='';
$limit='limit '.$begin.','.$lines;

$action='manageRelease';
$manageTitle='发布';

$manageList=null;
$manageList=$userService->getWebUserList($where, $order, $limit);
$manageCount=$userService->countWebUser($where);
if(!empty($manageList)){
	for($i=0;$i<count($manageList);$i++){
		$manageList[$i]['password']=sysAuth($manageList[$i]['password'],'DECODE',ECMS_KEY_WEB);
	}
}

$divPage='';
if(!empty($manageCount)&&$manageCount['counts']>0){
	$divPage=sysAdminPageInfo($manageCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$manageDetail=null;
if(!empty($id)){
	$manageDetail=$userService->getWebUserById($id);
	if(empty($manageDetail)){
		$html->backUrl('没有找到该信息！');
	}else{
		$manageDetail['username']=htmlspecialchars($manageDetail['username'], ENT_QUOTES, 'ISO-8859-1', true);
		$manageDetail['password']=sysAuth($manageDetail['password'],'DECODE',ECMS_KEY_WEB);
		$manageTitle='修改';
		$action='manageModify';
	}
}

$smarty->assign('id',$id);
$smarty->assign('page',$page);
$smarty->assign('action',$action);
$smarty->assign('manageTitle',$manageTitle);
$smarty->assign('manageList',$manageList);
$smarty->assign('manageDetail',$manageDetail);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>