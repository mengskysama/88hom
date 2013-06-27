<?php
require 'path.inc.php';
require 'check_login.php';
require 'HousePropertyHandler.class.php';
require 'OfficePropertyHandler.class.php';
require 'ShopPropertyHandler.class.php';

$propType = getParameter("prop_type");
$estId = getParameter("estId");
$estName = getParameter("estName");
$state = (getParameter("btn_live") == "") ? 0 : 1;
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
	
	$propHandler = new HousePropertyHandler($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
											$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
											$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
											$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$housePhoto,$houseTitle,
											$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor,$state);
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
	
}
echo 'result->'.$propHandler->handle();
?>