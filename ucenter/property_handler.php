<?php
require 'path.inc.php';
require 'check_login.php';
require 'HousePropertyHandler.class.php';
require 'OfficePropertyHandler.class.php';
require 'ShopPropertyHandler.class.php';
require 'VillaPropertyHandler.class.php';

$propType = getParameter("prop_type");
$estId = getParameter("estId");
$estName = getParameter("estName");
$state = getParameter("action_to_go");
$action = getParameter("action");
$actionType = getParameter("actionType");

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
	$housePhoto  = $_FILES["housePhoto"];
	$houseTitle  = getParameter("houseTitle");	
	$houseContent  = getParameter("houseContent");
	$houseUserId  = $userId;
	$houseBuildForm  = getParameter("houseBuildForm");
	$houseAllFloor  = getParameter("houseAllFloor");
	$houseId = getParameter("propId");
	
	$propHandler = new HousePropertyHandler($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
											$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
											$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
											$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$housePhoto,$houseTitle,
											$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor,$state,$actionType,$houseId);
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
	
	$villaPhoto  = $_FILES["villaPhoto"];
	$villaTitle  = getParameter("villaTitle");
	$villaContent  = getParameter("villaContent");
	$villaUserId  = $userId;
	
	$propHandler = new VillaPropertyHandler($db,$estId,$estName,$villaNumber,$privateHouseNumber,$villaBuildForm,$villaSellPrice,$villaRoom,$villaHall,
											$villaToilet,$villaKitchen,$villaBalcony,$villaBuildArea,$villaUseArea,$villaBuildYear,
											$villaForward,$villaAllFloor,$villaCellar,$villaCellarArea,$villaCellarType,$villaGarden,
											$villaGardenArea,$villaGarage,$villaGarageCount,$villaFitment,$villaBaseService,$villaLookTime,
											$villaPhoto,$villaTitle,$villaContent,$villaUserId,$state);
}else if($propType == "xzl"){
	
	$officeNumber = getParameter("officeNumber");
	$officeType = getParameter("officeType");
	$officeSellPrice = getParameter("officeSellPrice");
	$officeProFee = getParameter("officeProFee");
	$officeBuildArea = getParameter("officeBuildArea");
	$officeFloor = getParameter("officeFloor");	
	$officeAllFloor = getParameter("officeAllFloor");
	$officeFitment = getParameter("officeFitment");
	$officePhoto = $_FILES["officePhoto"];
	$officeTitle = getParameter("officeTitle");	
	$officeContent = getParameter("officeContent");
	$officeUserId = $userId;
	$officeDivision = getParameter("officeDivision");
	$officeLevel = getParameter("officeLevel");
	
	$propHandler = new OfficePropertyHandler($db,$estId,$estName,$officeNumber,$officeType,$officeSellPrice,
											$officeProFee,$officeBuildArea,$officeFloor,$officeAllFloor,$officeDivision,$officeFitment,
											$officeLevel,$officePhoto,$officeTitle,$officeContent,$officeUserId,
											$state);
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
	$shopPhoto = $_FILES["shopPhoto"];
	$shopsTitle = getParameter("shopsTitle");
	$shopContent = getParameter("shopsContent");
	$shopUserId = $userId;
	
	$propHandler = new ShopPropertyHandler($db,$estId,$estName,$shopsAddress,$shopsType,$shopsAreaId,$shopsNumber,
											$shopsSellPrice,$shopsPropFee,$shopsBuildArea,$shopsFloor,$shopsAllFloor,$shopsDivision,
											$shopsFitment,$shopsBaseService,$shopsAimOperastion,$shopPhoto,$shopsTitle,
											$shopContent,$shopUserId,$state);
}else if($propType == "cf"){
	
}else if($action == "delProp"){
	$propIds = getParameter("propIds");
	$secondPropService = new SecondHandPropertyService($db);
	$delResult = $secondPropService->deletePropertyList($propIds);
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
}
//echo 'result->'.$propHandler->handle();
$propHandler->handle();
header("Location:sell_property_list.php");
?>