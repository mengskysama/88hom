<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_sale_bs_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getVillaPropertyById($userId,$propId);
if($property){
	$estId = $property['villaCommunityId'];
	$estName = $property['propName'];
	$villaNumber = $property['villaNumber'];
	$privateVillaNumber = '';//$property['privateHouseNumber'];
	$villaBuildForm = $property['villaBuildForm'];
	$villaBuildStructure = $property['villaBuildStructure'];
	$villaSellPrice = $property['villaSellPrice'];
	$villaRoom = $property['villaRoom'];
	$villaHall = $property['villaHall'];
	$villaToilet = $property['villaToilet'];
	$villaKitchen = $property['villaKitchen'];
	$villaBalcony = $property['villaBalcony'];
	$villaBuildArea = $property['villaBuildArea'];
	$villaUseArea = $property['villaUseArea'];
	$villaUseArea = $villaUseArea == 0 ? "" : $villaUseArea;
	$villaBuildYear = $property['villaBuildYear'];
	$villaBuildYear = $villaBuildYear == 0 ? "" : $villaBuildYear;
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
	$villaParkingPlace = $property['villaParkingPlace'];
	if($villaParkingPlace){
		$villaParkingPlaceCount = $property['villaParkingPlaceCount'];	
	}else{
		$villaParkingPlaceCount = "";
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
	$picId = $property['picId'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 4;
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
	$villaTitle = $property['villaTitle'];
	$villaContent = $property['villaContent'];
	$villaState = $property['villaState'];

	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("villaNumber",$villaNumber);
	$smarty->assign("privateVillaNumber",$privateVillaNumber);
	$smarty->assign("villaBuildForm",$villaBuildForm);
	$smarty->assign("villaBuildStructure",$villaBuildStructure);
	$smarty->assign("villaSellPrice",$villaSellPrice);
	$smarty->assign("villaRoom",$villaRoom);
	$smarty->assign("villaHall",$villaHall);
	$smarty->assign("villaToilet",$villaToilet);
	$smarty->assign("villaKitchen",$villaKitchen);
	$smarty->assign("villaBalcony",$villaBalcony);
	$smarty->assign("villaBuildArea",$villaBuildArea);
	$smarty->assign("villaUseArea",$villaUseArea);
	$smarty->assign("villaBuildYear",$villaBuildYear);	
	$smarty->assign("villaForward",$villaForward);
	$smarty->assign("villaAllFloor",$villaAllFloor);	
	$smarty->assign("villaCellar",$villaCellar);	
	$smarty->assign("villaCellarArea",$villaCellarArea);	
	$smarty->assign("villaCellarType",$villaCellarType);	
	$smarty->assign("villaGarden",$villaGarden);	
	$smarty->assign("villaGardenArea",$villaGardenArea);	
	$smarty->assign("villaGarage",$villaGarage);	
	$smarty->assign("villaGarageCount",$villaGarageCount);
	$smarty->assign("villaParkingPlace",$villaParkingPlace);	
	$smarty->assign("villaParkingPlaceCount",$villaParkingPlaceCount);
	$smarty->assign("villaFitment",$villaFitment);
	$smarty->assign("villaLookTime",$villaLookTime);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("villaTitle",$villaTitle);
	$smarty->assign("villaContent",$villaContent);
	$smarty->assign("propId",$propId);
	$smarty->assign("propState",$villaState);
}
$picTypeList=$cfg['arr_pic']['2handVilla'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>