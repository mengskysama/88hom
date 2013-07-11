<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale_xzl_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getOfficePropertyById($userId,$propId);
if($property){
	$estId = $property['officeCommunityId'];
	$estName = $property['propName'];	
	$officeNumber = $property['officeNumber'];
	$officeType = $property['officeType'];
	$officeSellPrice = $property['officeSellPrice'];
	$officeProFee = $property['officeProFee'];
	$privateofficeNumber = '';//$property['privateofficeNumber'];
	$officeBuildArea = $property['officeBuildArea'];
	$officeFloor = $property['officeFloor'];
	$officeAllFloor = $property['officeAllFloor'];
	$officeDivision = $property['officeDivision'];
	$officeFitment = $property['officeFitment'];
	$officeLevel = $property['officeLevel'];

	$picId = $property['picId'];
	$officeTitle = $property['officeTitle'];
	$officeContent = $property['officeContent'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 3;
	$propertyDetailPicList = $propService->getPropPhotos($photo);
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("officeNumber",$officeNumber);
	$smarty->assign("privateofficeNumber",$privateofficeNumber);
	$smarty->assign("officeProFee",$officeProFee);
	$smarty->assign("officeType",$officeType);
	$smarty->assign("officeSellPrice",$officeSellPrice);
	$smarty->assign("officeBuildArea",$officeBuildArea);
	$smarty->assign("officeFloor",$officeFloor);
	$smarty->assign("officeAllFloor",$officeAllFloor);
	$smarty->assign("officeDivision",$officeDivision);
	$smarty->assign("officeFitment",$officeFitment);
	$smarty->assign("officeLevel",$officeLevel);
	$smarty->assign("picId",$picId);
	$smarty->assign("officeTitle",$officeTitle);
	$smarty->assign("officeContent",$officeContent);
	$smarty->assign("propId",$propId);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
}
$smarty->display($tpl_name);
?>