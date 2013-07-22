<?php
require 'cf_path.inc.php';
require 'check_agent_login.php';
$tpl_name = $tpl_dir.'agent_lease_cf_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getFactoryPropertyById($userId,$propId);
if($property){

	$factoryName = $property['factoryName'];
	$factoryAddress = $property['factoryAddress'];
	$factoryNumber = $property['factoryNumber'];
	$factoryType = $property['factoryType'];
	$factorySellPrice = $property['factorySellPrice'];
	$factoryProFee = $property['factoryProFee'];
	$factoryManagentUnits = $property['factoryManagentUnits'];
	$factoryPayInfo = $property['factoryPayInfo'];
	$factoryFloorArea = $property['factoryFloorArea'];
	$factoryBuildArea = $property['factoryBuildArea'];
	$factoryOfficeArea = $property['factoryOfficeArea'];
	$factoryWorkshopArea = $property['factoryWorkshopArea'];
	$factorySpaceArea = $property['factorySpaceArea'];
	$factoryDormitory = $property['factoryDormitory'];
	$factoryBuildYear = $property['factoryBuildYear'];
	$factorySpan = $property['factorySpan'];
	$factoryAllFloor = $property['factoryAllFloor'];
	$factoryFloorHeight = $property['factoryFloorHeight'];
	$factoryLoadBearing = $property['factoryLoadBearing'];
	$factoryBuildStructure = $property['factoryBuildStructure'];
	$factoryWater = $property['factoryWater'];
	$factoryHasCapacityNow = $property['factoryHasCapacityNow'];
	$factoryHasCapacityMax = $property['factoryHasCapacityMax'];
	$factoryPrivateNumber = "";//$property['factoryPrivateNumber'];
	$factoryTraffic = $property['factoryTraffic'];
	$factoryContent = $property['factoryContent'];
	
	$factoryProvince = $property['factoryProvince'];
	$factoryCity = $property['factoryCity'];
	$factoryDistrict = $property['factoryDistrict'];
	$factoryArea = $property['factoryArea'];
	$factoryAreaId = $factoryProvince.'-'.$factoryCity.'-'.$factoryDistrict.'-'.$factoryArea;

	$factoryRentPrice = $property['factoryRentPrice'];
	$factoryIncludFee = $property['factoryIncludFee'];
	$factoryPayment = $property['factoryPayment'];
	$factoryPayDetailY = $property['factoryPayDetailY'];
	$factoryPayDetailF = $property['factoryPayDetailF'];
	$factoryLeastYear = $property['factoryLeastYear'];
	$factoryState = $property['factoryState'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 5;
	$propertyDetailPicList = $propService->getPropPhotos($photo);

	$photo['pictypeId'] = 1;
	$topPic = $propService->getPropPhotos($photo);
	if($topPic){
		$smarty->assign('topPicPath',$topPic[0]['picUrl']);
		$smarty->assign('topPicThumb',$topPic[0]['picThumb']);
	}else{
		$smarty->assign('topPicPath',"");
		$smarty->assign('topPicThumb',"");
	}

	$smarty->assign("factoryName",$factoryName);
	$smarty->assign("factoryAddress",$factoryAddress);
	$smarty->assign("factoryNumber",$factoryNumber);
	$smarty->assign("factoryType",$factoryType);
	$smarty->assign("factorySellPrice",$factorySellPrice);
	$smarty->assign("factoryProFee",$factoryProFee);
	$smarty->assign("factoryManagentUnits",$factoryManagentUnits);
	$smarty->assign("factoryPayInfo",$factoryPayInfo);
	$smarty->assign("factoryFloorArea",$factoryFloorArea);
	$smarty->assign("factoryBuildArea",$factoryBuildArea);
	$smarty->assign("factoryOfficeArea",$factoryOfficeArea);
	$smarty->assign("factoryWorkshopArea",$factoryWorkshopArea);
	$smarty->assign("factorySpaceArea",$factorySpaceArea);
	$smarty->assign("factoryDormitory",$factoryDormitory);
	$smarty->assign("factoryBuildYear",$factoryBuildYear);
	$smarty->assign("factorySpan",$factorySpan);
	$smarty->assign("factoryAllFloor",$factoryAllFloor);
	$smarty->assign("factoryFloorHeight",$factoryFloorHeight);
	$smarty->assign("factoryLoadBearing",$factoryLoadBearing);
	$smarty->assign("factoryBuildStructure",$factoryBuildStructure);
	$smarty->assign("factoryWater",$factoryWater);
	$smarty->assign("factoryHasCapacityNow",$factoryHasCapacityNow);
	$smarty->assign("factoryHasCapacityMax",$factoryHasCapacityMax);
	$smarty->assign("factoryPrivateNumber",$factoryPrivateNumber);
	$smarty->assign("factoryTraffic",$factoryTraffic);
	$smarty->assign("factoryContent",$factoryContent);
	$smarty->assign("areaIndex",$factoryAreaId);
	
	$smarty->assign("factoryRentPrice",$factoryRentPrice);
	$smarty->assign("factoryIncludFee",$factoryIncludFee);
	$smarty->assign("factoryPayment",$factoryPayment);
	$smarty->assign("factoryPayDetailY",$factoryPayDetailY);
	$smarty->assign("factoryPayDetailF",$factoryPayDetailF);
	$smarty->assign("factoryLeastYear",$factoryLeastYear);
	$smarty->assign("propState",$factoryState);
	
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("propId",$propId);
}
$picTypeList=$cfg['arr_pic']['2handFactory'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>