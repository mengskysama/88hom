<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('propertyModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$propertyService=new PropertyService($db);
$areaService=new AreaService($db);
$propertyDetail=$propertyService->getInfoDetail($id,'admin');
if(empty($propertyDetail)){
	$html->backUrl('没有找到该信息！');
}else{
	$propertyDetail['propertyId']=htmlspecialchars($propertyDetail['propertyId'], ENT_QUOTES, 'ISO-8859-1', true);
	$propertyDetail['propertyName']=htmlspecialchars($propertyDetail['propertyName'], ENT_QUOTES, 'ISO-8859-1', true);
	$propertyDetail['propertyAddress']=htmlspecialchars($propertyDetail['propertyAddress'], ENT_QUOTES, 'ISO-8859-1', true);
}
$areaDetail=$areaService->getArea($propertyDetail['areaId']);
if($areaDetail['fatherId']==$fid){
	$spanArea='<span id="span_areaId" style="display: none;"><a id="a_areaId" href="">返回上一级类别</a></span>';
}else{
	$spanArea='<span id="span_areaId" style="display: block;"><a id="a_areaId" href="javascript:exeAdminBackArea('.$areaDetail['fatherId'].');">返回上一级类别</a></span>';
}
$areaList=$areaService->getAreaListByCache($areaDetail['fatherId']);
$FCKeditor=createCKeditor('remark',1,400,200,$propertyDetail['remark']);
$smarty->assign('spanArea',$spanArea);
$smarty->assign('areaList',$areaList);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('propertyDetail',$propertyDetail);
$html->show();
$smarty->display($tpl_name);
?>