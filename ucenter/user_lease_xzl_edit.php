<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_lease_xzl_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getOfficePropertyById($userId,$propId);
if($property){
	$estId = $property['officeCommunityId'];
	$estName = $property['propName'];	
	$officeNumber = $property['officeNumber'];
	$officeType = $property['officeType'];
	$officeRentPrice = $property['officeRentPrice'];
	$officeRentPriceUnit = $property['officeRentPriceUnit'];
	$officeProFee = $property['officeProFee'];
	$privateofficeNumber = '';//$property['privateofficeNumber'];
	$officeBuildArea = $property['officeBuildArea'];
	$officeFloor = $property['officeFloor'];
	$officeAllFloor = $property['officeAllFloor'];
	$officeDivision = $property['officeDivision'];
	$officeFitment = $property['officeFitment'];
	$officeLevel = $property['officeLevel'];
		
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 3;
	$propertyDetailPicList = $propService->getPropPhotos($photo);
	$officeTitle = $property['officeTitle'];
	$officeContent = $property['officeContent'];
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("officeNumber",$officeNumber);
	$smarty->assign("privateofficeNumber",$privateofficeNumber);
	$smarty->assign("officeProFee",$officeProFee);
	$smarty->assign("officeType",$officeType);
	$smarty->assign("officeRentPrice",$officeRentPrice);
	$smarty->assign("officeRentPriceUnit",$officeRentPriceUnit);	
	$smarty->assign("officeBuildArea",$officeBuildArea);
	$smarty->assign("officeFloor",$officeFloor);
	$smarty->assign("officeAllFloor",$officeAllFloor);
	$smarty->assign("officeDivision",$officeDivision);
	$smarty->assign("officeFitment",$officeFitment);
	$smarty->assign("officeLevel",$officeLevel);
	$smarty->assign("officeTitle",$officeTitle);
	$smarty->assign("officeContent",$officeContent);
	$smarty->assign("propId",$propId);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
}
$smarty->display($tpl_name);
?>