<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'sell.tpl';
$mapService = new MapService($db);
$action = isset($_REQUEST['action'])&&!empty($_REQUEST['action'])?$_REQUEST['action']:'';
if($action == 'getSecondHandCountJson')//根据省下标，市下标，获取区域二手房数目json列表
{
	$list = $mapService->getSecondHandCountJson($_REQUEST);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getSecondHandJson'){//根据某经纬度范围获取小区列表
	$list = $mapService->getSecondHandJson($_REQUEST);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getSecondHandJsonById'){//根据id获取某小区
	$secondHand = $mapService->getSecondHandJsonById($_REQUEST['id']);
	echo json_encode($secondHand);
	exit(0);
}
else if($action == 'getSellHouseListByCommunityId'){//根据某小区id获取出售住宅房源
	$list = $mapService->getSellHouseListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getSellShopsListByCommunityId'){//根据某小区id获取出售商铺房源
	$list = $mapService->getSellShopsListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getSellOfficeListByCommunityId'){//根据某小区id获取出售写字楼房源
	$list = $mapService->getSellOfficeListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getSellVillaListByCommunityId'){//根据某小区id获取出售别墅房源
	$list = $mapService->getSellVillaListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
$html->show();
$smarty->display($tpl_name);

?>