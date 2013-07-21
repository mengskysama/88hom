<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'rent.tpl';
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
else if($action == 'getRentHouseListByCommunityId'){//根据某小区id获取出租住宅房源
	$list = $mapService->getRentHouseListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getRentShopsListByCommunityId'){//根据某小区id获取出租商铺房源
	$list = $mapService->getRentShopsListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getRentOfficeListByCommunityId'){//根据某小区id获取出租写字楼房源
	$list = $mapService->getRentOfficeListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
else if($action == 'getRentVillaListByCommunityId'){//根据某小区id获取出租别墅房源
	$list = $mapService->getRentVillaListByCommunityId($_REQUEST['id']);
	echo json_encode($list);
	exit(0);
}
$html->show();
$smarty->display($tpl_name);

?>