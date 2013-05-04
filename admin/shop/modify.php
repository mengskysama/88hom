<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('shopModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$shopService=new ShopService($db);
$areaService=new AreaService($db);
$shopDetail=$shopService->getInfoDetail($id,'admin');
if(empty($shopDetail)){
	$html->backUrl('没有找到该信息！');
}else{
	$shopDetail['shopId']=htmlspecialchars($shopDetail['shopId'], ENT_QUOTES, 'ISO-8859-1', true);
	$shopDetail['shopName']=htmlspecialchars($shopDetail['shopName'], ENT_QUOTES, 'ISO-8859-1', true);
	$shopDetail['shopTel']=htmlspecialchars($shopDetail['shopTel'], ENT_QUOTES, 'ISO-8859-1', true);
}
$areaDetail=$areaService->getArea($shopDetail['areaId']);
if($areaDetail['fatherId']==$fid){
	$spanArea='<span id="span_areaId" style="display: none;"><a id="a_areaId" href="">返回上一级类别</a></span>';
}else{
	$spanArea='<span id="span_areaId" style="display: block;"><a id="a_areaId" href="javascript:exeAdminBackArea('.$areaDetail['fatherId'].');">返回上一级类别</a></span>';
}
$areaList=$areaService->getAreaListByCache($areaDetail['fatherId']);
$smarty->assign('spanArea',$spanArea);
$smarty->assign('areaList',$areaList);
$smarty->assign('shopDetail',$shopDetail);
$html->show();
$smarty->display($tpl_name);
?>