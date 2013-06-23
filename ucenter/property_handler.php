<?php
require 'path.inc.php';
require 'check_login.php';
require 'HousePropertyHandler.class.php';

$propType = getParameter("prop_type");
if($propType == "zz"){
	
	$estId = getParameter("estId");
	$estName = getParameter("estName");
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
											$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor);
}
echo 'result->'.$propHandler->handle();
?>