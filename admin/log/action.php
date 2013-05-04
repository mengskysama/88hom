<?php
require 'path.inc.php';
require ECMS_PATH_LIBS.'phpexcel/PHPExcel.php';
require ECMS_PATH_LIBS.'phpexcel/PHPExcel/Writer/Excel2007.php';
require ECMS_PATH_LIBS.'phpexcel/PHPExcel/Writer/Excel5.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$areaService=new AreaService($db);
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
$statementsService=new StatementsService($db);
switch ($action){
	case 'createExcel':
		$permissionsState=sysPermissionsChecking('logManager');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$statementsService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>