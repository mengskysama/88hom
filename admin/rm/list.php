<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='招聘信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('rmModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=1;
if(isset($_GET['typeId'])&&!empty($_GET['typeId'])){
	$typeId=$_GET['typeId'];
}else{
	$typeId='';
}
$field="*";
$where="where lang='".LANG."'";
$order="order by expired_time desc";
$limit="limit 0,1000";
if(!empty($typeId)){
	$where .= " and type_id=$typeId";
}
$rmService=new RecruitmentService($db);
$rmTypeList=$rmService->getRmTypeListByCache($fid);
$rmList=$rmService->getRmList($field,$where,$order,$limit);
if(!empty($rmList)){
	for($i=0;$i<count($rmList);$i++){
		$rmList[$i]['type']=$rmService->getRmTypeDetailById($rmList[$i]['type_id']);
	}
}
$smarty->assign('rmTypeList',$rmTypeList);
$smarty->assign('rmList',$rmList);
$html->show();
$smarty->display($tpl_name);
?>