<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale_zz_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getHousePropertyById($propId);
if($property){
	$estName = $property['estName'];
	$houseNumber = $property['houseNumber'];
	$privateHouseNumber = $property['privateHouseNumber'];
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
	$houseFloor = $property['houseFloor'];
	$houseAllFloor = $property['houseAllFloor'];
	$houseForward = $property['houseForward'];
	$houseFitment = $property['houseFitment'];
	$houseBaseService = $property['houseBaseService'];
	if($houseBaseService){
		for($i=1; $i<9; $i++){
			if(strpos($houseBaseService,','.$i.',')){
				$smarty->assign("houseBaseService".$i,"checked=\"checked\"");
			}else{
				$smarty->assign("houseBaseService".$i,"");
			}	
		}
	}
	$houseLookTime = $property['houseLookTime'];
	$propPhoto = $property['propPhoto'];
	$houseContent = $property['houseContent'];

	$smarty->assign("estId",$propId);
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
	$smarty->assign("houseFloor",$houseFloor);
	$smarty->assign("houseAllFloor",$houseAllFloor);
	$smarty->assign("houseForward",$houseForward);
	$smarty->assign("houseFitment",$houseFitment);
	$smarty->assign("houseLookTime",$houseLookTime);
	$smarty->assign("propPhoto",$propPhoto);
	$smarty->assign("houseContent",$houseContent);
}

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
$smarty->display($tpl_name);
?>