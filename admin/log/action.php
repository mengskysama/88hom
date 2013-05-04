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
	$html->backUrl('�������,û������ ����action��');
}
$areaService=new AreaService($db);
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
$statementsService=new StatementsService($db);
switch ($action){
	case 'createExcel':
		$permissionsState=sysPermissionsChecking('logManager');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$statementsService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��������');
		}
	break;
}
?>