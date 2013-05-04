<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'logList.tpl';
$html->title='日志报表';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('logManager');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$statementsService=new StatementsService($db);
$areaService=new AreaService($db);
$fid=0;
if(isset($_GET['areaId'])&&!empty($_GET['areaId'])){
	$areaId=$_GET['areaId'];
}else{
	$areaId='';
}
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
$user=$_SESSION['Admin_User'];
$level=$user['level'];
$shopIds=$user['shopIds'];

$fileName='';
$lines=20;
$begin=$lines*($page-1);
$where='';
$order='';
$limit='limit '.$begin.','.$lines;
if(!empty($areaId)){
	$fileName='logList.php?areaId='.$areaId.'&page';
	$areaStr=$areaService->getAllAreaChByFatherId($areaId);
	$strNum=strlen($areaStr);
	if(substr($areaStr,$strNum-1)==','){
		$areaStr=substr($areaStr,0,$strNum-1);
	}
	if($level==0){
		$where .= "where a.id in ($areaStr) and sp.state=1 and s.state=1 and p.state=1";
	}else{
		$where .= "where a.id in ($areaStr) and sp.id in ($shopIds) and sp.state=1 and s.state=1 and p.state=1";
	}
}else{
	$fileName='logList.php?page';
}

$areaList=$areaService->getAreaListByCache($fid);
$logList=$statementsService->getInfoList($where,$order,$limit);
$logCount=$statementsService->countInfo($where);

$divPage='';
if(!empty($logCount)&&$logCount['counts']>0){
	$divPage=sysAdminPageInfo($logCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('level',$level);
$smarty->assign('areaList',$areaList);
$smarty->assign('logList',$logList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>