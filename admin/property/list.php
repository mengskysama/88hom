<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('propertyModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$propertyService=new PropertyService($db);
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
$fileName='';
$lines=20;
$begin=$lines*($page-1);
$where='';
$order='';
$limit='limit '.$begin.','.$lines;
if(!empty($areaId)){
	$fileName='list.php?areaId='.$areaId.'&page';
	$areaStr=$areaService->getAllAreaChByFatherId($areaId);
	$strNum=strlen($areaStr);
	if(substr($areaStr,$strNum-1)==','){
		$areaStr=substr($areaStr,0,$strNum-1);
	}
	$where .= "where p.areaId in ($areaStr)";
}else{
	$fileName='list.php?page';
}

$areaList=$areaService->getAreaListByCache($fid);
$propertyList=$propertyService->getInfoList($where,$order,$limit);
$propertyCount=$propertyService->countInfo($where);

$divPage='';
if(!empty($propertyCount)&&$propertyCount['counts']>0){
	$divPage=sysAdminPageInfo($propertyCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('areaList',$areaList);
$smarty->assign('propertyList',$propertyList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>