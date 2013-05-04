<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='��Ϣ�޸�';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('shopModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('��������');
}
$shopService=new ShopService($db);
$areaService=new AreaService($db);
$shopDetail=$shopService->getInfoDetail($id,'admin');
if(empty($shopDetail)){
	$html->backUrl('û���ҵ�����Ϣ��');
}else{
	$shopDetail['shopId']=htmlspecialchars($shopDetail['shopId'], ENT_QUOTES, 'ISO-8859-1', true);
	$shopDetail['shopName']=htmlspecialchars($shopDetail['shopName'], ENT_QUOTES, 'ISO-8859-1', true);
	$shopDetail['shopTel']=htmlspecialchars($shopDetail['shopTel'], ENT_QUOTES, 'ISO-8859-1', true);
}
$areaDetail=$areaService->getArea($shopDetail['areaId']);
if($areaDetail['fatherId']==$fid){
	$spanArea='<span id="span_areaId" style="display: none;"><a id="a_areaId" href="">������һ�����</a></span>';
}else{
	$spanArea='<span id="span_areaId" style="display: block;"><a id="a_areaId" href="javascript:exeAdminBackArea('.$areaDetail['fatherId'].');">������һ�����</a></span>';
}
$areaList=$areaService->getAreaListByCache($areaDetail['fatherId']);
$smarty->assign('spanArea',$spanArea);
$smarty->assign('areaList',$areaList);
$smarty->assign('shopDetail',$shopDetail);
$html->show();
$smarty->display($tpl_name);
?>