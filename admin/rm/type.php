<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'type.tpl';
$html->title='��Ƹ��Ϣ���';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('rmType');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$rmService=new RecruitmentService($db);
if(isset($_GET['fid'])){
	$fid=$_GET['fid'];
}else{
	$fid=1;
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
$action='typeRelease';
$typeTitle='����';
$rmTypeList=$rmService->getRmTypeList($fid);
$rmTypeDetail='';
if(!empty($id)){
	$rmTypeDetail=$rmService->getRmTypeDetailById($id);
	if(!empty($rmTypeDetail)){
		$rmTypeDetail['type_name']=htmlspecialchars($rmTypeDetail['type_name'], ENT_QUOTES, 'ISO-8859-1', true);
		$typeTitle='�޸�';
		$action='typeModify';
	}else{
		$id='';
	}
}
$smarty->assign('id',$id);
$smarty->assign('fid',$fid);
$smarty->assign('action',$action);
$smarty->assign('typeTitle',$typeTitle);
$smarty->assign('rmTypeList',$rmTypeList);
$smarty->assign('rmTypeDetail',$rmTypeDetail);
$html->show();
$smarty->display($tpl_name);
?>