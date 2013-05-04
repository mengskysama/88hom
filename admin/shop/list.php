<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('shopModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$shopService=new ShopService($db);
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
	$where .= "where areaId in ($areaStr)";
}else{
	$fileName='list.php?page';
}

$areaList=$areaService->getAreaListByCache($fid);
$shopList=$shopService->getInfoList($where,$order,$limit);
$shopCount=$shopService->countInfo($where);

$divPage='';
if(!empty($shopCount)&&$shopCount['counts']>0){
	$divPage=sysAdminPageInfo($shopCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('areaList',$areaList);
$smarty->assign('shopList',$shopList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>