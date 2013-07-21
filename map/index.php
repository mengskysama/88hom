<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';
$mapService = new MapService($db);
$action = isset($_REQUEST['action'])&&!empty($_REQUEST['action'])?$_REQUEST['action']:'';
if($action == 'getPropertyCountJson')//根据省下标，市下标，获取区域新盘数目json列表
{
	$list = $mapService->getPropertyCountJson($_REQUEST);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getPropertyJson'){
	$list = $mapService->getPropertyJson($_REQUEST);
	echo json_encode($list);
	exit(0);
}
 else if($action == 'getPropertyJsonById'){
	$property = $mapService->getPropertyJsonById($_REQUEST['id']);
	echo json_encode($property);
	exit(0);
} 
$html->show();
$smarty->display($tpl_name);

?>