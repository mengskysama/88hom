<?php
require 'path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
require 'HousePropertyHandler.class.php';
require 'OfficePropertyHandler.class.php';
require 'ShopPropertyHandler.class.php';
require 'VillaPropertyHandler.class.php';
require 'FactoryPropertyHandler.class.php';

$propType = getParameter("prop_type");
$estId = getParameter("estId");
$estName = getParameter("estName");
$state = getParameter("action_to_go");
$action = getParameter("action");
$actionType = getParameter("actionType");
$propTxType = getParameter("prop_tx_type");

$propPhoto = "";
if(!empty($_POST['picPath'])){
	$len = count($_POST['picPath']);
	for($key=0; $key<$len; $key++){
		$propPhoto[$key]['pictypeId'] = $_POST['picTypeId'][$key];
		$propPhoto[$key]['picSellRent'] = $propTxType;
		$propPhoto[$key]['picUrl'] = $_POST['picPath'][$key];
		$propPhoto[$key]['picThumb'] = $_POST['picPathThumb'][$key];
		$propPhoto[$key]['picInfo'] = $_POST['picName'][$key];
		$propPhoto[$key]['picLayer'] = $_POST['picLayer'][$key];
		$propPhoto[$key]['picState'] = 1;
	}
}
$topPic['pictypeId'] = 1;
$topPic['picBuildFatherType'] = 0;
$topPic['picBuildType'] = 0;
$topPic['picSellRent'] = $propTxType;
$topPic['picUrl'] = getParameter("topPicPath");;
$topPic['picThumb'] = getParameter("topPicPathThumb");
$topPic['picInfo'] = '';
$topPic['picLayer'] = 0;
$topPic['picState'] = 1;

if($propType == "zz"){
	
	$houseNumber = getParameter("houseNumber");
	$privateHouseNumber = getParameter("privateHouseNumber");
	$housePayInfo = getParameter("housePayInfo");
	$houseType = getParameter("houseType");
	$houseSellPrice = getParameter("houseSellPrice");
	$houseRoom = getParameter("houseRoom");
	$houseHall = getParameter("houseHall");
	$houseToilet = getParameter("houseToilet");
	$houseKitchen = getParameter("houseKitchen");
	$houseBalcony = getParameter("houseBalcony");
	$houseBuildArea  = getParameter("houseBuildArea");
	$houseUseArea  = getParameter("houseUseArea");
	$houseBuildYear  = getParameter("houseBuildYear");
	$houseFloor  = getParameter("houseFloor");	
	$houseForward  = getParameter("houseForward");
	$houseFitment  = getParameter("houseFitment");
	$houseBaseService  = getParameter("houseBaseService");
	$houseLookTime  = getParameter("houseLookTime");		
	$houseTitle  = getParameter("houseTitle");	
	$houseContent  = getParameter("houseContent");
	$houseUserId  = $userId;
	$houseBuildForm  = getParameter("houseBuildForm");
	$houseAllFloor  = getParameter("houseAllFloor");
	$houseId = getParameter("propId");
	$houseRentType = getParameter("houseRentType");
	$houseRentRoomType = getParameter("houseRentRoomType");
	$houseRentDetail = getParameter("houseRentDetail");
	$housePayment = getParameter("housePayment");
	$housePayDetailY = getParameter("housePayDetailY");
	$housePayDetailF = getParameter("housePayDetailF");
	$houseRentArea = getParameter("houseRentArea");
	$topPic['picBuildType'] = 1;

	$propHandler = new HousePropertyHandler($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
											$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
											$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
											$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$propPhoto,$houseTitle,
											$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor,$state,$actionType,$houseId,
											$propTxType,$houseRentType,$houseRentRoomType,$houseRentDetail,$housePayment,$housePayDetailY,
											$housePayDetailF,$houseRentArea,$topPic);
}else if($propType == "bs"){

	$villaNumber = getParameter("villaNumber");
	$privateHouseNumber = getParameter("privateVillaNumber");
	$villaBuildForm  = getParameter("villaBuildForm");
	$villaSellPrice = getParameter("villaSellPrice");
	$villaRoom = getParameter("villaRoom");
	$villaHall = getParameter("villaHall");
	$villaToilet = getParameter("villaToilet");
	$villaKitchen = getParameter("villaKitchen");
	$villaBalcony = getParameter("villaBalcony");
	$villaBuildArea  = getParameter("villaBuildArea");
	$villaUseArea  = getParameter("villaUseArea");
	$villaBuildYear  = getParameter("villaBuildYear");
	$villaForward  = getParameter("villaForward");
	$villaAllFloor  = getParameter("villaAllFloor");
	$villaCellar  = getParameter("villaCellar");
	$villaCellarArea  = getParameter("villaCellarArea");
	$villaCellarType  = getParameter("villaCellarType");
	$villaGarden  = getParameter("villaGarden");
	$villaGardenArea  = getParameter("villaGardenArea");
	$villaGarage  = getParameter("villaGarage");
	$villaGarageCount  = getParameter("villaGarageCount");	
	$villaFitment  = getParameter("villaFitment");
	$villaBaseService  = getParameter("villaBaseService");	
	$villaLookTime  = getParameter("villaLookTime");
	
	$villaTitle  = getParameter("villaTitle");
	$villaContent  = getParameter("villaContent");
	$villaUserId  = $userId;
	$villaId = getParameter("propId");
	$villaRentPrice = getParameter("villaRentPrice");
	$villaRentType = getParameter("villaRentType");
	$villaPayment = getParameter("villaPayment");
	$villaPayDetailY = getParameter("villaPayDetailY");
	$villaPayDetailF = getParameter("villaPayDetailF");
	$topPic['picBuildType'] = 4;
	
	$propHandler = new VillaPropertyHandler($db,$estId,$estName,$villaNumber,$privateHouseNumber,$villaBuildForm,$villaSellPrice,$villaRoom,$villaHall,
											$villaToilet,$villaKitchen,$villaBalcony,$villaBuildArea,$villaUseArea,$villaBuildYear,
											$villaForward,$villaAllFloor,$villaCellar,$villaCellarArea,$villaCellarType,$villaGarden,
											$villaGardenArea,$villaGarage,$villaGarageCount,$villaFitment,$villaBaseService,$villaLookTime,
											$propPhoto,$villaTitle,$villaContent,$villaUserId,$state,$actionType,$villaId,
											$propTxType,$villaRentPrice,$villaRentType,$villaPayment,$villaPayDetailY,$villaPayDetailF,$topPic);
}else if($propType == "xzl"){

	$officeNumber = getParameter("officeNumber");
	$officeType = getParameter("officeType");
	$officeSellPrice = getParameter("officeSellPrice");
	$officeProFee = getParameter("officeProFee");
	$officeBuildArea = getParameter("officeBuildArea");
	$officeFloor = getParameter("officeFloor");	
	$officeAllFloor = getParameter("officeAllFloor");
	$officeFitment = getParameter("officeFitment");
	$officeTitle = getParameter("officeTitle");	
	$officeContent = getParameter("officeContent");
	$officeUserId = $userId;
	$officeDivision = getParameter("officeDivision");
	$officeLevel = getParameter("officeLevel");
	$officeId = getParameter("propId");
	$officeRentPrice = getParameter("officeRentPrice");
	$officeRentPriceUnit = getParameter("officeRentPriceUnit");
	$officeTraffic = getParameter("officeTraffic");
	$topPic['picBuildType'] = 3;
	$propHandler = new OfficePropertyHandler($db,$estId,$estName,$officeNumber,$officeType,$officeSellPrice,
											$officeProFee,$officeBuildArea,$officeFloor,$officeAllFloor,$officeDivision,$officeFitment,
											$officeLevel,$propPhoto,$officeTitle,$officeContent,$officeUserId,
											$state,$actionType,$officeId,$propTxType,$officeRentPrice,$officeRentPriceUnit,$officeTraffic,
											$topPic);
}else if($propType == "sp"){
	
	$shopsAddress = getParameter("shopsAddress");
	$shopsType = getParameter("shopsType");
	$shopsAreaId = getParameter("shopsAreaId");
	$shopsNumber = getParameter("shopsNumber");
	$shopsSellPrice = getParameter("shopsSellPrice");
	$shopsPropFee = getParameter("shopsPropFee");
	$shopsBuildArea = getParameter("shopsBuildArea");
	$shopsFloor = getParameter("shopsFloor");
	$shopsAllFloor = getParameter("shopsAllFloor");
	$shopsDivision = getParameter("shopsDivision");
	$shopsFitment = getParameter("shopsFitment");
	$shopsBaseService = getParameter("shopsBaseService");
	$shopsAimOperastion = getParameter("shopsAimOperastion");
	$shopsTitle = getParameter("shopsTitle");
	$shopContent = getParameter("shopsContent");
	$shopUserId = $userId;
	$shopId = getParameter("propId");
	$shopsRentPrice = getParameter("shopsRentPrice");
	$shopsRentPriceUnit = getParameter("shopsRentPriceUnit");
	$shopsTraffic = getParameter("shopsTraffic");
	$shopsSet = getParameter("shopsSet");
	
	$topPic['picBuildType'] = 2;
	
	$propHandler = new ShopPropertyHandler($db,$estId,$estName,$shopsAddress,$shopsType,$shopsAreaId,$shopsNumber,
											$shopsSellPrice,$shopsPropFee,$shopsBuildArea,$shopsFloor,$shopsAllFloor,$shopsDivision,
											$shopsFitment,$shopsBaseService,$shopsAimOperastion,$propPhoto,$shopsTitle,
											$shopContent,$shopUserId,$state,$actionType,$shopId,$propTxType,$shopsRentPrice,$shopsRentPriceUnit,
											$shopsTraffic,$shopsSet,$topPic);
}else if($propType == "cf"){
	$factory['factoryName'] = getParameter("factoryName");;
	$factory['factoryAddress'] = getParameter('factoryAddress');
	$factory['factoryNumber'] = getParameter('factoryNumber');
	$factory['factoryType'] = getParameter('factoryType');
	$factory['factorySellPrice'] = getParameter('factorySellPrice');
	$factory['factoryProFee'] = getParameter('factoryProFee');
	$factory['factoryManagentUnits'] = getParameter('factoryManagentUnits');
	$factory['factoryPayInfo'] = getParameter('factoryPayInfo');
	$factory['factoryFloorArea'] = getParameter('factoryFloorArea');
	$factory['factoryBuildArea'] = getParameter('factoryBuildArea');
	$factory['factoryOfficeArea'] = getParameter('factoryOfficeArea');
	$factory['factoryWorkshopArea'] = getParameter('factoryWorkshopArea');
	$factory['factorySpaceArea'] = getParameter('factorySpaceArea');
	$factory['factoryDormitory'] = getParameter('factoryDormitory');
	$factory['factoryBuildYear'] = getParameter('factoryBuildYear');
	$factory['factorySpan'] = getParameter('factorySpan');
	$factory['factoryAllFloor'] = getParameter('factoryAllFloor');
	$factory['factoryFloorHeight'] = getParameter('factoryFloorHeight');
	$factory['factoryLoadBearing'] = getParameter('factoryLoadBearing');
	$factory['factoryBuildStructure'] = getParameter('factoryBuildStructure');
	$factory['factoryWater'] = getParameter('factoryWater');
	$factory['factoryHasCapacityNow'] = getParameter('factoryHasCapacityNow');
	$factory['factoryHasCapacityMax'] = getParameter('factoryHasCapacityMax');
	$factory['factoryPrivateNumber'] = getParameter('factoryPrivateNumber');
	$factory['factoryTraffic'] = getParameter('factoryTraffic');
	$factory['factoryContent'] = getParameter('factoryContent');
	$factory['factoryAreaId'] = getParameter('areaIndex');
	$factory['factoryId'] = getParameter("propId");
	
	$factory['factoryRentPrice'] = getParameter("factoryRentPrice");
	$factory['factoryIncludFee'] = getParameter("factoryIncludFee");
	$factory['factoryPayment'] = getParameter("factoryPayment");
	$factory['factoryPayDetailY'] = getParameter("factoryPayDetailY");
	$factory['factoryPayDetailF'] = getParameter("factoryPayDetailF");
	$factory['factoryLeastYear'] = getParameter("factoryLeastYear");
	$factory['factoryMapX'] = "";
	$factory['factoryMapY'] = "";
	
	$factory['factorySellRentType'] = $propTxType;
	$factory['actionType'] = $actionType;
	$factory['factoryState'] = $state;
	$factory['factoryUserId'] = $userId;
	
	$topPic['picBuildType'] = 5;
	$factory['topPic'] = $topPic;
	$factory['propertyPhoto'] = $propPhoto;
	
	$propHandler = new FactoryPropertyHandler($db,$factory);
}else if($action == "delProp"){
	$propIds = getParameter("propIds");
	$secondPropService = new SecondHandPropertyService($db);
	$delResult = $secondPropService->deletePropertyList($propIds);
	//echo $delResult;return;
	if($delResult){
		echo "{\"result\":\"success\"}";
	}else{
		echo "{\"result\":\"failure\"}";
	}
	return;
}else if($action == "delPic"){
	$picId = getParameter("picId");
	$secondPropService = new SecondHandPropertyService($db);
	$delResult = $secondPropService->deletePropPic($picId);
	if($delResult){
		echo "{\"result\":\"success\"}";
	}else{
		echo "{\"result\":\"failure\"}";
	}
	return;
}else if($action == "refreshProp"){
	$propKind = getParameter("propKind");
	$propId = getParameter("propId");
	$userService = new UserService($db);
	$user = $userService->getUserById($userId);
	$propRefreshTimes = $user['propRefreshTimes'];
	if($propRefreshTimes == $cfg['arr_build']['2handConfig']['REFRESH_COUNT_AGENT']){
		echo "{\"result\":\"limited\"}";
		return;
	}
	$prop['propId'] = $propId;
	$prop['propKind'] = $propKind;
	$prop['userId'] = $userId;
	$prop['propRefreshTimes'] = $propRefreshTimes;
	$secondPropService = new SecondHandPropertyService($db);
	$result_to_refresh = $secondPropService->refreshProperty($prop);
	if($result_to_refresh){
		echo "{\"result\":\"success\",\"u_time\":\"".$result_to_refresh."\"}";
	}else{
		echo "{\"result\":\"failure\"}";
	}
	return;
}
//echo 'result->'.$propHandler->handle();return;
$userType = $_SESSION['UCUser']['userType'];
//echo 'userType->'.$userType;return;
$result = $propHandler->handle();
if($result){
	if($propTxType == 1){
		if($userType == 2){
			header("Location:agent_sell_property_list.php");
		}else{
			header("Location:sell_property_list.php");
		}
	}else{
		if($userType == 2){
			header("Location:agent_lease_property_list.php");
		}else{
			header("Location:lease_property_list.php");
		}
	}
}else{
	
}
?>