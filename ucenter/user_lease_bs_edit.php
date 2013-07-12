<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_lease_bs_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getVillaPropertyById($userId,$propId);
if($property){
	$estId = $property['villaCommunityId'];
	$estName = $property['propName'];
	$villaNumber = $property['villaNumber'];
	$privateVillaNumber = '';//$property['privateHouseNumber'];
	$villaBuildForm = $property['villaBuildForm'];
	$villaRentPrice = $property['villaRentPrice'];
	$villaRoom = $property['villaRoom'];
	$villaHall = $property['villaHall'];
	$villaToilet = $property['villaToilet'];
	$villaKitchen = $property['villaKitchen'];
	$villaBalcony = $property['villaBalcony'];
	$villaBuildArea = $property['villaBuildArea'];
	$villaRentType = $property['villaRentType'];
	$villaPayment = $property['villaPayment'];
	$villaPayDetailY = $property['villaPayDetailY'];
	$villaPayDetailF = $property['villaPayDetailF'];	
	$villaForward = $property['villaForward'];
	$villaAllFloor = $property['villaAllFloor'];
	$villaCellar = $property['villaCellar'];
	if($villaCellar){
		$villaCellarArea = $property['villaCellarArea'];
		$villaCellarType = $property['villaCellarType'];		
	}else{
		$villaCellarArea = "";
		$villaCellarType = "";
	}
	$villaGarden = $property['villaGarden'];
	if($villaGarden){
		$villaGardenArea = $property['villaGardenArea'];	
	}else{
		$villaGardenArea = "";
	}
	$villaGarage = $property['villaGarage'];
	if($villaGarage){
		$villaGarageCount = $property['villaGarageCount'];	
	}else{
		$villaGarageCount = "";
	}	
	$villaFitment = $property['villaFitment'];
	$villaBaseService = $property['villaBaseService'];
	for($i=1; $i<7; $i++){
		$index = strpos($villaBaseService,','.$i.',');
		if($index !== false){
			$smarty->assign("villaBaseService".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("villaBaseService".$i,"");
		}
	}
	$villaLookTime = $property['villaLookTime'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 4;
	$propertyDetailPicList = $propService->getPropPhotos($photo);
	$villaTitle = $property['villaTitle'];
	$villaContent = $property['villaContent'];

	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("villaNumber",$villaNumber);
	$smarty->assign("privateVillaNumber",$privateVillaNumber);
	$smarty->assign("villaBuildForm",$villaBuildForm);
	$smarty->assign("villaRentPrice",$villaRentPrice);
	$smarty->assign("villaRoom",$villaRoom);
	$smarty->assign("villaHall",$villaHall);
	$smarty->assign("villaToilet",$villaToilet);
	$smarty->assign("villaKitchen",$villaKitchen);
	$smarty->assign("villaBalcony",$villaBalcony);
	$smarty->assign("villaBuildArea",$villaBuildArea);
	$smarty->assign("villaRentType",$villaRentType);
	$smarty->assign("villaPayment",$villaPayment);	
	$smarty->assign("villaPayDetailY",$villaPayDetailY);	
	$smarty->assign("villaPayDetailF",$villaPayDetailF);
	$smarty->assign("villaForward",$villaForward);
	$smarty->assign("villaAllFloor",$villaAllFloor);	
	$smarty->assign("villaCellar",$villaCellar);	
	$smarty->assign("villaCellarArea",$villaCellarArea);	
	$smarty->assign("villaCellarType",$villaCellarType);	
	$smarty->assign("villaGarden",$villaGarden);	
	$smarty->assign("villaGardenArea",$villaGardenArea);	
	$smarty->assign("villaGarage",$villaGarage);	
	$smarty->assign("villaGarageCount",$villaGarageCount);
	$smarty->assign("villaFitment",$villaFitment);
	$smarty->assign("villaLookTime",$villaLookTime);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("villaTitle",$villaTitle);
	$smarty->assign("villaContent",$villaContent);
	$smarty->assign("propId",$propId);
}
$smarty->display($tpl_name);
?>