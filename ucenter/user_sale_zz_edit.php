<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale_zz_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getHousePropertyById($userId,$propId);
if($property){
	$estId = $property['houseCommunityId'];
	$estName = $property['propName'];
	$houseNumber = $property['houseNumber'];
	$privateHouseNumber = '';//$property['privateHouseNumber'];
	$housePayInfo = $property['housePayInfo'];
	$houseType = $property['houseType'];
	$houseSellPrice = $property['houseSellPrice'];
	$houseRoom = $property['houseRoom'];
	$houseHall = $property['houseHall'];
	$houseToilet = $property['houseToilet'];
	$houseKitchen = $property['houseKitchen'];
	$houseBalcony = $property['houseBalcony'];
	$houseBuildForm = $property['houseBuildForm'];
	$houseBuildArea = $property['houseBuildArea'];
	$houseUseArea = $property['houseUseArea'];
	$houseUseArea = $houseUseArea == 0 ? "" : $houseUseArea;
	$houseBuildYear = $property['houseBuildYear'];
	$houseBuildYear = $houseBuildYear == 0 ? "" : $houseBuildYear;
	$houseFloor = $property['houseFloor'];
	$houseAllFloor = $property['houseAllFloor'];
	$houseForward = $property['houseForward'];
	$houseFitment = $property['houseFitment'];
	$houseBaseService = $property['houseBaseService'];
	for($i=1; $i<9; $i++){
		$index = strpos($houseBaseService,','.$i.',');
		if($index !== false){
			$smarty->assign("houseBaseService".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("houseBaseService".$i,"");
		}
	}
	$houseLookTime = $property['houseLookTime'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 1;
	$propertyDetailPicList = $propService->getPropPhotos($photo);
	
	$houseTitle = $property['houseTitle'];
	$houseContent = $property['houseContent'];

	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("houseNumber",$houseNumber);
	$smarty->assign("privateHouseNumber",$privateHouseNumber);
	$smarty->assign("housePayInfo",$housePayInfo);
	$smarty->assign("houseType",$houseType);
	$smarty->assign("houseSellPrice",$houseSellPrice);
	$smarty->assign("houseRoom",$houseRoom);
	$smarty->assign("houseHall",$houseHall);
	$smarty->assign("houseToilet",$houseToilet);
	$smarty->assign("houseKitchen",$houseKitchen);
	$smarty->assign("houseBalcony",$houseBalcony);
	$smarty->assign("houseBuildForm",$houseBuildForm);
	$smarty->assign("houseBuildArea",$houseBuildArea);
	$smarty->assign("houseUseArea",$houseUseArea);
	$smarty->assign("houseBuildYear",$houseBuildYear);	
	$smarty->assign("houseFloor",$houseFloor);
	$smarty->assign("houseAllFloor",$houseAllFloor);
	$smarty->assign("houseForward",$houseForward);
	$smarty->assign("houseFitment",$houseFitment);
	$smarty->assign("houseLookTime",$houseLookTime);
	$smarty->assign("houseTitle",$houseTitle);
	$smarty->assign("houseContent",$houseContent);
	$smarty->assign("propId",$propId);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
}
$smarty->display($tpl_name);
?>