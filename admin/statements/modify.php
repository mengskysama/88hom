<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('statementsModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
$areaService=new AreaService($db);
$statementsService=new StatementsService($db);
$statementsDetail=$statementsService->getInfoDetail("where s.id=$id");
if(empty($statementsDetail)){
	$html->backUrl('没有找到该信息！');
}else{
//	$propertyDetail['propertyId']=htmlspecialchars($propertyDetail['propertyId'], ENT_QUOTES, 'ISO-8859-1', true);
//	$propertyDetail['propertyName']=htmlspecialchars($propertyDetail['propertyName'], ENT_QUOTES, 'ISO-8859-1', true);
//	$propertyDetail['propertyAddress']=htmlspecialchars($propertyDetail['propertyAddress'], ENT_QUOTES, 'ISO-8859-1', true);
}

$areaList=$areaService->getAreaListByCache($fid);
$shopAreaFid=$areaService->getAreaFirstType($statementsDetail['shopAreaId']);
$propertyAreaFid=$areaService->getAreaFirstType($statementsDetail['propertyAreaId']);
$shopAreaStr=$areaService->getAllAreaChByFatherId($shopAreaFid);
$strNum=strlen($shopAreaStr);
if(substr($shopAreaStr,$strNum-1)==','){
	$shopAreaStr=substr($shopAreaStr,0,$strNum-1);
}
$shopList=$shopService->getInfoList("where s.areaId in ($shopAreaStr)");
$propertyAreaStr=$areaService->getAllAreaChByFatherId($propertyAreaFid);
$strNum=strlen($propertyAreaStr);
if(substr($propertyAreaStr,$strNum-1)==','){
	$propertyAreaStr=substr($propertyAreaStr,0,$strNum-1);
}
$propertyList=$propertyService->getInfoList("where p.areaId in ($propertyAreaStr)");

$FCKeditor=createCKeditor('remark',1,400,200,$statementsDetail['remark']);
$smarty->assign('areaList',$areaList);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('statementsDetail',$statementsDetail);
$smarty->assign('shopAreaFid',$shopAreaFid);
$smarty->assign('propertyAreaFid',$propertyAreaFid);
$smarty->assign('shopList',$shopList);
$smarty->assign('propertyList',$propertyList);
$html->show();
$smarty->display($tpl_name);
?>