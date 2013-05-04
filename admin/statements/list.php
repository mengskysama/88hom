<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('statementsModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$statementsService=new StatementsService($db);
$areaService=new AreaService($db);
$fid=0;
if(isset($_GET['areaId'])&&!empty($_GET['areaId'])){
	$areaId=$_GET['areaId'];
}else{
	$areaId='';
}

$where='';
$order='';
$limit='';
if(!empty($areaId)){
	$areaStr=$areaService->getAllAreaChByFatherId($areaId);
	$strNum=strlen($areaStr);
	if(substr($areaStr,$strNum-1)==','){
		$areaStr=substr($areaStr,0,$strNum-1);
	}
	$where .= "where a.id in ($areaStr)";
}

$areaList=$areaService->getAreaListByCache($fid);
$statementsList=$statementsService->getInfoList($where,$order,$limit);

$smarty->assign('areaList',$areaList);
$smarty->assign('statementsList',$statementsList);
$html->show();
$smarty->display($tpl_name);
?>