<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_lease_sp_edit.tpl';

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getShopPropertyById($userId,$propId);
if($property){
	$estId = $property['shopsCommunityId'];
	$estName = $property['propName'];
	$shopsAddress = $property['shopsAddress'];
	$shopsType = $property['shopsType'];
	$shopsRentPrice = $property['shopsRentPrice'];	
	$shopsRentPriceUnit = $property['shopsRentPriceUnit'];
	$shopsNumber = $property['shopsNumber'];
	$privateShopsNumber = '';//$property['privateshopsNumber'];
	$shopsPropFee = $property['shopsPropFee'];
	$shopsBuildArea = $property['shopsBuildArea'];
	$shopsFloor = $property['shopsFloor'];
	$shopsAllFloor = $property['shopsAllFloor'];
	$shopsDivision = $property['shopsDivision'];
	$shopsFitment = $property['shopsFitment'];
	$shopsBaseService = $property['shopsBaseService'];
	for($i=1; $i<=9; $i++){
		$index = strpos($shopsBaseService,','.$i.',');
		if($index !== false){
			$smarty->assign("shopsBaseService".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("shopsBaseService".$i,"");
		}
	}

	$shopsAimOperastion = $property['shopsAimOperastion'];
	for($i=1; $i<=9; $i++){
		$index = strpos($shopsAimOperastion,','.$i.',');
		if($index !== false){
			$smarty->assign("shopsAimOperastion".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("shopsAimOperastion".$i,"");
		}
	}
	$picId = $property['picId'];
	$propPhoto = $property['propPhoto'];
	$shopsTitle = $property['shopsTitle'];
	$shopsContent = $property['shopsContent'];
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("shopsAddress",$shopsAddress);
	$smarty->assign("shopsNumber",$shopsNumber);
	$smarty->assign("privateShopsNumber",$privateShopsNumber);
	$smarty->assign("shopsPropFee",$shopsPropFee);
	$smarty->assign("shopsType",$shopsType);
	$smarty->assign("shopsRentPrice",$shopsRentPrice);
	$smarty->assign("shopsRentPriceUnit",$shopsRentPriceUnit);
	$smarty->assign("shopsBuildArea",$shopsBuildArea);
	$smarty->assign("shopsFloor",$shopsFloor);
	$smarty->assign("shopsAllFloor",$shopsAllFloor);
	$smarty->assign("shopsDivision",$shopsDivision);
	$smarty->assign("shopsFitment",$shopsFitment);
	$smarty->assign("picId",$picId);
	$smarty->assign("propPhoto",$propPhoto);
	$smarty->assign("shopsTitle",$shopsTitle);
	$smarty->assign("shopsContent",$shopsContent);
	$smarty->assign("propId",$propId);
}
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
$smarty->display($tpl_name);
?>