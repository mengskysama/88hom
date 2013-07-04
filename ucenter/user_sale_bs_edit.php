<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale_bs_edit.tpl';

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getVillaPropertyById($userId,$propId);
if($property){
	$estId = $property['villaCommunityId'];
	$estName = $property['propName'];
	$villaNumber = $property['villaNumber'];
	$privateVillaNumber = '';//$property['privateHouseNumber'];
	$villaBuildForm = $property['villaBuildForm'];
	$villaSellPrice = $property['villaSellPrice'];
	$villaRoom = $property['villaRoom'];
	$villaHall = $property['villaHall'];
	$villaToilet = $property['villaToilet'];
	$villaKitchen = $property['villaKitchen'];
	$villaBalcony = $property['villaBalcony'];
	$villaBuildArea = $property['villaBuildArea'];
	$villaUseArea = $property['villaUseArea'];
	$villaBuildYear = $property['villaBuildYear'];
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
	$picId = $property['picId'];
	$propPhoto = $property['propPhoto'];
	$villaTitle = $property['villaTitle'];
	$villaContent = $property['villaContent'];

	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("villaNumber",$villaNumber);
	$smarty->assign("privateVillaNumber",$privateVillaNumber);
	$smarty->assign("villaBuildForm",$villaBuildForm);
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
	$smarty->assign("villaFitment",$villaFitment);
	$smarty->assign("villaLookTime",$villaLookTime);
	$smarty->assign("picId",$picId);
	$smarty->assign("propPhoto",$propPhoto);
	$smarty->assign("villaTitle",$villaTitle);
	$smarty->assign("villaContent",$villaContent);
	$smarty->assign("propId",$propId);
}
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
$smarty->display($tpl_name);
?>